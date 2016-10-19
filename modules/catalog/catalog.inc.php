<?php
global $_CORE, $_CONF;

include_once $_CONF['CorePath'].'/lib/class.Modules.php';

/**
 * Сlass Catalog 
 *
 */
 

class CatalogModule extends Modules {
	
	public $tabCatalog; // таблица каталога
	public $tabParams; // таблица парамметров
    public $params;
    public $item; 
	/**
	 * Конструктор класса
	 * 
	 */
	public function __construct($params = array())
	{
        global $_CONF;
        $this->tabCatalog = DB_TABLE_PREFIX.'items';
        $this->tabParams = DB_TABLE_PREFIX.'catalog_params';
		parent::__construct('catalog');
        $this->parseUrl();
	}
    
    
    
    public function getpath(){
        global $_PROJECT;
        $_PROJECT['PATH_2_CONTENT'] = array();
        $url = '/catalog';
        $_PROJECT['PATH_2_CONTENT'][]	= array(
                            'name'	=> 'Каталог',
                            'path'	=> $url
                            );

        if(is_array($this->params) && count($this->params)){
            foreach($this->params as $param){
                $url .= '/'.$param['alias'];
                $_PROJECT['PATH_2_CONTENT'][]	= array(
                    'name'	=> (empty($param['title']))?$param['name']:$param['title'],
                    'path'	=> $url
                );
            }
        }elseif(is_array($this->item)){
            $title = $this->getItemTitle();
            $_PROJECT['PATH_2_CONTENT'][]	= array(
                    'name'	=> $title,
                    'seo_title' => $title,
                    'path'	=> $url.'/'.$this->item['alias']
                );
        }
	}
    
    
    
    protected function parseUrl()
    {
        $requestUrl = str_replace(array('/clear','/empty','/print','/catalog/'),'',$this->_core->URL_PATH);
        if(substr($requestUrl,-1)=='/')
            $requestUrl = substr($requestUrl,0,-1);
        $reqParams = explode('/',$requestUrl);
        if(count($reqParams)){
            $this->params = $this->_sql->getall('*',$this->tabParams,"alias IN ('".implode("','",$reqParams)."')","ORDER BY prior ASC, id DESC");
            
            if(empty($this->params) && count($reqParams)==1){
                $this->item = $this->_sql->getrow('*',$this->tabCatalog,"alias = '".$requestUrl."'");
            }
        }
    }
    
    
    public function setRequest(){
        if(is_array($this->params) && count($this->params))
            foreach($this->params as $param){
                $_REQUEST['form'][$param['field']] = $param['alias'];
            }
    }
    
    public function getTitle(){
        $title = '';
        if(is_array($this->params) && count($this->params))
            foreach($this->params as $param){
                $title .= ' '.(empty($param['title'])?$param['name']:$param['title']);
                $title = mb_strtolower($title);
            }
        $title = trim($title);
        $title = mb_strtoupper(mb_substr($title, 0, 1)) . mb_substr($title, 1);
        return (empty($title))? 'Каталог':$title;
    }
    
    
    public function getItemTitle(){
        $form = $this->item;
        $name_one = trim(str_replace($form['artikul'],'',$form['name']));
        $title = $name_one." ";
        if(!empty($form['probe'])){
            if( strstr($name_one,'Обручальное') || strstr($name_one,'обручальное') )$name_one = 'обручальное';
            $wordform = SQL::getval('wordform',DB_TABLE_PREFIX.'type_products',"(hidden != 1 OR hidden IS NULL) AND name_one like '%%".$name_one."%%'",'',0);
            if(strstr($form['probe'],'Au')){
                switch($wordform){
                    case 0:
                        $title .= "золотой ";
                    break;
                    case 1:
                        $title .= "золотая ";
                    break;
                    case 2:
                        $title .= "золотое ";
                    break;
                    case 3:
                        $title .= "золотые ";
                    break;
                }
            }elseif(strstr($form['probe'],'Ag')){
                switch($wordform){
                    case 0:
                        $title .= "серебрянный ";
                    break;
                    case 1:
                        $title .= "серебрянная ";
                    break;
                    case 2:
                        $title .= "серебрянное ";
                    break;
                    case 3:
                        $title .= "серебрянные ";
                    break;
                }
            }
            $title .= trim(str_replace(array('Au','Ag'),'',$form['probe']))." пробы " . $form['ins']; // land (".$form['artikul'].")
        }
        return $title;
    }
    
    
    public function rewritePost(){
        // Редирект если есть страница для условий поиска
        $pathAllItems = '';
        $selWhere= '1';
        if(!$this->_core->CLEAR_VERSION && !$this->_core->EMPTY_VERSION && !empty($_POST['alias']) && $_POST['alias'] == 'all_items'){
            $post = $_POST['form'];
            $addTagUrl = '';
            $tagspage = $this->_sql->getvals('field',$this->tabParams,"","GROUP BY field ORDER BY prior ASC, id DESC");
            foreach($tagspage as $fieldKey){
                if(isset($post[$fieldKey]) && $post[$fieldKey]!==''){
                    $fieldVal = $post[$fieldKey];
                    $addTagUrl .= $fieldVal.'/';
                }
                unset($post[$fieldKey]);
            }
            $post = array_diff($post, array(''));

            unset($_POST['submit'],$_POST['alias']);
            foreach($_POST as $keyval=>$postval){
                if(empty($postval)) unset($_POST[$keyval]);
            }
            if(!empty($addTagUrl)){
                $_POST['form'] = $post;
                $paramGet = http_build_query($_POST);
                if($paramGet) $paramGet = '?'.$paramGet;
                header('Location: '.'/catalog/'.$addTagUrl.$paramGet);
                exit();
            }
        }
    }
    
    
    public function genarateXML()
    {   
        $tagspage = $this->_sql->getvals('field',$this->tabParams,"","GROUP BY field ORDER BY prior ASC, id DESC");
        $url = 'http://'.$_SERVER['SERVER_NAME'].'/';
        $urls = $tags = array();
        $urls[] = array('name'=>'Главная', 'path'=>$url);
        $urls[] = array('name'=>'Каталог', 'path'=>$url.'catalog/');
        if(is_array($tagspage) && count($tagspage)){
            foreach($tagspage as $field){
                $params = $this->_sql->getall('*',$this->tabParams,"field = '".$field."'","ORDER BY prior ASC, id DESC");
                $tags[] = $params;
            }
            $this->findCategoryUrls($urls,$tags,$url.'catalog/','');
        }        
        $this->findItemsUrls($urls,$url.'catalog/');
        $n = 0;
        foreach($urls as $k=>$item){ 
            if($k == 0 || ($k > 20000 && $k == (20000*$n + 1)) ){
                ob_start(); 
                echo '<'.'?xml version="1.0" encoding="UTF-8"?>
';
echo '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">';
            }
            echo '
 <url>
 <loc>'.$item['path'].'</loc>
 <lastmod>'.date("Y-m-d").'</lastmod>
 <changefreq>weekly</changefreq>
 <priority>0.8</priority>
 </url>

';
            if($k == 20000*($n+1) || $k == count($urls)-1){
               echo '</urlset>';
                $cont[$n] = ob_get_contents(); ob_end_clean();
                
                $this->saveSitemap($n+1,$cont[$n]); 
                echo $_SERVER['DOCUMENT_ROOT'].'/sitemap'.($n+1).".xml<br />";
                $n++;
            }
        }
        if($n>0){
            ob_start(); 
            echo '<'.'?xml version="1.0" encoding="UTF-8"?>
';
echo '<sitemapindex xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">';
            for($s=1; $s<=$n; $s++){
                echo '
 <sitemap>
 <loc>http://'.$_SERVER['HTTP_HOST'].'/sitemap'.$s.'.xml</loc>
 <lastmod>'.date("Y-m-d").'</lastmod>
 </sitemap>

';
            }
            echo '</sitemapindex>';
            $contmain = ob_get_contents(); ob_end_clean();
            $this->saveSitemap('',$contmain); 
        }
    }
    
    
    private function findCategoryUrls(&$urls,$tags,$url,$title){
        if(is_array($tags) && count($tags)){
            foreach($tags as $i=>$params){
                if(is_array($params) && count($params)){
                    foreach($params as $param){
                        $newtitle = $title." ".(empty($param['title'])?$param['name']:$param['title']);
                        $newtitle = mb_strtolower(trim($newtitle));
                        $newtitle = mb_strtoupper(mb_substr($newtitle, 0, 1)) . mb_substr($newtitle, 1);
                        $urls[] = array('name'=>$newtitle, 'path'=>$url.$param['alias']."/");
                        if($i!=count($tags)-1){
                            $this->findCategoryUrls($urls,array_slice ( $tags, $i+1),$url.$param['alias']."/",$newtitle);
                        }
                    }
                }
            }
        }
    }
    
    
    private function findItemsUrls(&$urls,$url){
        $items = $this->_sql->getall('alias',$this->tabCatalog,"(hidden != 1 OR hidden IS NULL) AND doc != ''");
        echo count($items);
        if(is_array($items) && count($items)){
            foreach($items as $item){
                $urls[] = array('name'=>'', 'path'=>$url.$item['alias']);
            }
        }
    }
    
    private function saveSitemap($n,$cont){
        $dir = $_SERVER['DOCUMENT_ROOT'];
        $fp	= fopen($dir.'/sitemap'.$n.'.xml', 'w');
        if (empty($fp)) {
            return false;
        }
        $tr	= array( '"' => "'", "\r" => "" );
        fputs($fp, stripslashes(strtr($cont,$tr)));
        fclose($fp);
        return true;
    }
}