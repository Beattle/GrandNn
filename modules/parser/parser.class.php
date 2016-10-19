<?php 
/**
 * 
 * Набросок который в будущем, я надеюсь, перерастет в класс подцепляющий свойства для всех модулей.
 * @author deller
 *
 */
class Modules {
	protected $_core;
	public $mod;
	
	/**
	 * Чекаем все папки где может находиться конфиг и подключаем его.
	 * @param str $tpl
	 * @param var $file
	 */
	protected function inc_tpl($tpl, &$file)
	{
		$files	=  array( 
			$this->_core->PATHTPLS.'/'.$this->_core->CURR_TPL.'/'.$this->mod.'/'.$tpl,
			$this->_core->SiteModDir.'/'.$tpl,
			$this->_core->CORE_PATHTPLS.'/'.$this->mod.'/_'.$tpl,
			$this->_core->CoreModDir.'/_'.$tpl,
		);
//		print_r($files);die();
 		$tmp = FILE::chk_files($files, $file); 
		include_once $tmp;
	}
	
	public function __construct($mod='')
	{
		global $_CORE;
		$this->_core = $_CORE;
		$this->mod = $mod;
	}
}
/**
 * Парсер для зип авто. пока не гибкий но легко допиливается.
 * @author deller
 *
 */
class parser extends Modules{
	private $_link = 'ws.auto-iksora.ru/SearchDetails/SearchDetails.asmx/FindDetails',
	$_login,$_pass,$_errors;
	protected  $_dom,$_enc;
	
	
	/**
	 * проверка заданы ли в конфиге логин и пароль в константах.
	 * Enter description here ...
	 */
	private function _isAuth()
	{
		if(defined('PARSER_LOGIN'))
		{
			$this->_login	= PARSER_LOGIN;
			$this->_pass	= PARSER_PASS;
			if(!empty($this->_login))
			{
				return true;
			}
		}
		return false;
	}
	
	/**
	 * Шлем запрос с помощью curl на внешний сайт. Если в конфиге указаны логин и пасс авторизуемся
	 * @param str $search
	 */
	private function _request($search)
	{
		$ch = curl_init();
		curl_setopt_array($ch, array(
			CURLOPT_URL				=> $this->_link,	
			CURLOPT_POST			=> 1,
			CURLOPT_TIMEOUT			=> 30,
			CURLOPT_RETURNTRANSFER	=> 1,
		));
		$PostString = '';
		if(self::_isAuth())
		{
			$PostString = 'Login='.$this->_login.'&Password='.$this->_pass.'&';
		}
		$PostString .= PARSER_SEARCH_PARAM.'='.$search;
		if(function_exists('for_zip_auto'))
		{
			if(for_zip_auto()) 
			{
				$PostString .= '&'.for_zip_auto();
			}
		}
		curl_setopt($ch, CURLOPT_POSTFIELDS, $PostString);
		$result = curl_exec($ch);
		if(curl_error($ch))
		{
			$this->_errors = array(curl_error($ch));
		}
		curl_close($ch);
		if(!count($this->_errors))
		{
			return $result;
		}
		else return false;
	}
	
	public function utf8decode($str,$encode='cp1251')
	{
		return iconv('utf-8',$encode,$str);
	}
	
	/**
	 * Парсим xml и преврашаем его в массив
	 * @param str $xml
	 */
	private function _parseXML($xml)
	{
		@$doc = DOMDocument::loadXML($xml);
		$dom=simplexml_import_dom($doc);
     	//print_r($dom);
		if($doc->encoding == 'utf-8')
		{
			$this->_enc = true;
		}
		return $dom;
	}

	private function save_history(){
		if(count($this->_dom->DetailInfo)) {
			$fp = fopen('history.txt', 'a+');
			fputs($fp, "<a href='/parser/search?".PARSER_SEARCH_PARAM."=".$this->_dom->DetailInfo[0]->detailnumber."'>".$this->_dom->DetailInfo[0]->detailnumber."(".$this->_dom->DetailInfo[0]->maker->name.")</a>\n");
			fclose($fp);
		}
	}

	private function show_history( $count = 1000){
			$h = array_unique(file('history.txt'));
			$res = array_slice($h, -$count);
			return str_replace("\n", '', implode(', ', $res));
	}
	
	
	/**
	 * Непосредственно функция рулящая всем етим хозяйством выполняющая функцию контролера
	 * @param str $cmd
	 */
	public function DoIt($cmd)
	{
		switch($cmd){
			case 'content/title':
			case 'content/seo_title':
			case 'content/seo_desc':
			case 'content/seo_keywords':
				echo "Подбор запчастей";
				break;
			case 'search':
				$search = (isset($_REQUEST[PARSER_SEARCH_PARAM])?trim($_REQUEST[PARSER_SEARCH_PARAM]):'');
				if(!empty($search))
				{
				
					$page = self::_request($search); 
					if($this->_errors) echo $this->_errors;
					else{
						
						$this->_dom = self::_parseXML($page);//echo'<pre>';var_dump($this->_dom);
						$what = '*'; 
						$from = DB_TABLE_PREFIX.'csv'; 
						$where = DB_TABLE_PREFIX."csv.id = '".addslashes($_REQUEST[PARSER_SEARCH_PARAM])."' OR ".DB_TABLE_PREFIX."csv.number_company = '".addslashes($_REQUEST[PARSER_SEARCH_PARAM])."'";
						$res = SQL::sel($what, $from, $where);
						$this->DetailInfo1 = array();
						if ($res->NumRows > 0) {
						
							for($d = 0;$d < $res->NumRows; $d++){
							//echo $d . '  ' . (0-1-$d) . '<br>';
								$res->FetchArray($d);
								$i = -1-$d;
								$tmp = new stdClass();
								$tmp->detailnumber 		= $res->FetchArray['id'];
								$tmp->maker->name 		= $res->FetchArray['company'];
								$tmp->detailname 		= $res->FetchArray['name'];
								$tmp->price 			= $res->FetchArray['cost'];	
								$tmp->pricedestination  = $res->FetchArray['cost'];			
								$tmp->days 				= $res->FetchArray['time'];
								$this->DetailInfo1[$d] = $tmp;
//								echo count($this->DetailInfo1);echo '<br>';
							}
							
						}
						$this->inc_tpl('results.tpl.phtml',$file);
										$this->save_history();
									
				}
			}
			break;
			default:
				$params = explode('/', $cmd);
				switch ($params[0]) {
					case 'last':
					 echo $this->show_history($params[1]);
					break;
				}
				break;
		}
	}
	
	public function __construct(){
		parent::__construct(__CLASS__);
		$this->inc_tpl('conf.inc.php',$file);
	}
}
?>