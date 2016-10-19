<?php set_time_limit(300);
global $_KAT,$_CORE, $FORM_DATA;
$options = array(
	'KUR_ALIAS' => 'all_items', // alias каталога в который происходит импорт
//	'fields' => array('','name', 'madeby', 'artikul', 'price', 'full_price', 'num_series', 'ins', 'size', 'probe', 'nalich', 'cnt', 'weight'), //  названия полей в БД написанные в порядке как в импортируемом файле. Если какой то из столбцов импортировать не надо называем его "". Кол-во элементов в массиве должно соответствовать кол-ву столбцов
	'file_csv' => '/data/db/uploads/_data.csv', //  полный путь до файла 
	'delimeter' => 2, // определение разделителя id в массиве array('',',',';','\t'),
	'IMPORT_WITH_TITLES' => false // импортировать первую строку?
);

	include $_CORE->CoreModDir.'/../db/_conf.inc.php';
	include $_CORE->SiteModDir.'/../db/conf.inc.php';
	// подключим $FORM_DATA импортируемого каталога
	if (is_file($_CORE->SiteModDir.'/../db/'.$_KAT['FILES'][(string)$options['KUR_ALIAS']])) {
		include $_CORE->SiteModDir.'/../db/'.$_KAT['FILES'][(string)$options['KUR_ALIAS']];
	}elseif($_CORE->CoreModDir.'/../db/_'.$_KAT['FILES'][(string)$options['KUR_ALIAS']]){
		include $_CORE->CoreModDir.'/../db/_'.$_KAT['FILES'][(string)$options['KUR_ALIAS']];
	}

$options['fields'] = $_KAT[$_KAT['KUR_ALIAS']]['IMPORT'];
$artikuls = array();
//	$FORM_DATA['nalich']['arr'] = array(
//		1=>'Основной склад пр. Гагарина 66',
//		2=>'Основной склад ул. Родионова 17',
//		0=>'Под заказ' 
//	);

	$FORM_IMPORT = $options['fields'];
	$log_tbl = DB_TABLE_PREFIX."log_import";
	$last_ts = SQL::getval('ts',$log_tbl,"","ORDER BY ts desc LIMIT 1");
	// prishel li fajl
	if (!is_file($_SERVER['DOCUMENT_ROOT'].$options['file_csv'])) {
		echo "Файл &laquo;".$_SERVER['DOCUMENT_ROOT'].$options['file_csv']."&raquo; не найден";
		die;
	}
	$file_upd_ts = filemtime($_SERVER['DOCUMENT_ROOT'].$options['file_csv']);
	
	// check date
	if(!empty($last_ts) && $last_ts >= $file_upd_ts && !isset($_GET['forse']) ){
	   
	SQL::upd(DB_TABLE_PREFIX.$_KAT['TABLES'][$options['KUR_ALIAS']], " new = 0 ");
       	// новинки - последние 300 добавленных
    SQL::upd(DB_TABLE_PREFIX.$_KAT['TABLES'][$options['KUR_ALIAS']], 'new = 1', "doc!='' AND hidden = '0'  ORDER BY date_add DESC LIMIT 300", DEBUG);
	//SQL::query("UPDATE ".DB_TABLE_PREFIX.$_KAT['TABLES'][$options['KUR_ALIAS']]." SET new = 1 WHERE doc!='' AND hidden != 1 ORDER BY date_add DESC LIMIT 300");
	//SQL::query("UPDATE ".DB_TABLE_PREFIX.$_KAT['TABLES'][$options['KUR_ALIAS']]." SET new = 1  WHERE bu = '' ORDER BY date_add DESC LIMIT 300");
       
		echo "Файл &laquo;".$_SERVER['DOCUMENT_ROOT'].$options['file_csv']."&raquo; не был изменен";
		die;
	}
	$new_file = $_SERVER['DOCUMENT_ROOT'].$options['file_csv'];
	// opredelenie razdelitelja
	$darr	= array('',',',';','\t');
	if (!empty($darr[$options['delimeter']])) {
		$delimeter = $darr[$options['delimeter']];
	}else {
		echo "Не указан разделитель в настройках импорта";
		die;
	}
$handle = fopen($new_file, "r");

if($handle){
	$lines = array();
	$row = 0;
	while (($lines[$row] = fgetcsv($handle, 1000, $delimeter)) !== FALSE) {
		$row++;
	}
	fclose($handle);
	$num = count($lines);
	
	$good	= $bad	= $images = 0;
	// отчистим таблицу 
	// SQL::query("TRUNCATE ".DB_TABLE_PREFIX.$_KAT['TABLES'][$options['KUR_ALIAS']]);
	// не будем отчищать таблицу, а просто установим статус для всех hidden   
	SQL::upd(DB_TABLE_PREFIX.$_KAT['TABLES'][$options['KUR_ALIAS']], "hidden = 1");
	$aliases = SQL::getvals('alias',DB_TABLE_PREFIX.$_KAT['TABLES'][$options['KUR_ALIAS']]);
	// teper' po kazhdoj stroke
//	for ($i = 0; $i < sizeof($lines); $i++ ) if (!empty($lines[$i])) {
//		if ($i == 0 && !$options['IMPORT_WITH_TITLES']) continue;
			
//		$data	= explode($delimeter, trim(str_replace(" \ n ", "\n", $lines[$i])));

		// esli ploho, to razdelim standartnym ;
//		if (sizeof($data) == 1) {
//			$data = explode(';', trim(str_replace(" \ n ", "\n", $lines[$i])));
//		}

		// esli tam byli opciony (dannye kotorye ne po real'nomu znacheniju a po indeksu v massive, t.e. tipa select)
		// po kazhdomu polju zagruzhaemyh dannyh
		$fdir = '/data/db/f_'.$options['KUR_ALIAS'];$ji = 0;
	foreach ($lines as $i => $data) {
		$bu = false;
		$import_field = array();
		if ($i == 0 && !$options['IMPORT_WITH_TITLES']) continue;
		$transart = '';
		$keys = array();
		if (is_array($data)) foreach ($data as $n => $value) {
			if($FORM_IMPORT[$n]=='nalich'){
				$value = trim(str_replace('магазин','салон',$value));
				if(strstr($value,'Родионова')) $value = "Ювелирный салон ул. Родионова 17";
				if(strstr($value,'Гагарина')) $value = "Ювелирный салон пр. Гагарина 66";
			}
			if($FORM_IMPORT[$n]){
				if ($FORM_DATA[$FORM_IMPORT[$n]]['type'] == 'select') {
					// najdem indeks
					$new_val	= array_search(trim($value,"  \t"), $FORM_DATA[$FORM_IMPORT[$n]]['arr']);
					// zamenim na indeks
					$data[$n]	= ($new_val !== false) ? $new_val : $data[$n];
				}
				$import_field[$n] = $FORM_IMPORT[$n];
			}else{
				unset($data[$n]);
			}
			if($FORM_IMPORT[$n]=='artikul' && !empty($value)){
				echo " Artikul: $value | ";
				$data[$n] = $value = trim($value);
				if( substr($value,-1)=='б' || substr($value,-1)=='Б' ){
					// $data[$n] = $value = substr($value,0, strlen($value)-1);
					$bu = true;
				}
				$transart = str_replace(array("#"," "),array('','_'),trim(strtolower(STR::translit(str_replace("№",'N',$value)))));
				echo "Translit (bu:$bu): $transart, $value";
				$artikuls[] = $transart;
				$artikuls[] = $transart."_1";
				$artikuls[] = $transart."_2";
			}
			$keyDate = '';
			if($FORM_IMPORT[$n]=='date_add' && !empty($value)){
				$data[$n] = strtotime( STR::date_usa2eur(substr($value,0,10),true).substr($value,10) );
			}
			if(in_array($FORM_IMPORT[$n],array('price','full_price','weight','size','width','height')) ){
				$data[$n] = str_replace(' ','',$value);
				$data[$n] = str_replace(',','.',$data[$n]);
				$data[$n] = str_replace(' ','',$data[$n]);
				$data[$n] = str_replace(' ','',$data[$n]);
				// если price или full_price округлим
				if($FORM_IMPORT[$n]=='price' || $FORM_IMPORT[$n]=='full_price'){
					$data[$n] = round($data[$n]);
				}
				echo $FORM_IMPORT[$n].$data[$n]."-".$value."";
			}
			if(empty($keys[$FORM_IMPORT[$n]]))
				$keys[$FORM_IMPORT[$n]] = $n;
		}
		echo "<hr>";
		$file_updts = '';
		if(!empty($data[6])){
			if (is_file($_SERVER['DOCUMENT_ROOT'].$fdir.'/'.$transart.'.jpg') ) {
				$data[] = $transart.'.jpg';
				$import_field[] = 'doc';
				$file_updts = filemtime($_SERVER['DOCUMENT_ROOT'].$fdir.'/'.$transart.'.jpg');
				$images++;
			}elseif( is_file($_SERVER['DOCUMENT_ROOT'].$fdir.'/'.$transart.'.JPG') ) {
				$data[] = $transart.'.JPG';
				$import_field[] = 'doc';
				$images++;
				$file_updts = filemtime($_SERVER['DOCUMENT_ROOT'].$fdir.'/'.$transart.'.JPG');
			}else{
				echo "<br>NoFile: <B>". '/'.$transart.'.jpg</B>';
				$noFile[] = $transart.'.jpg';
			}
			if($file_updts!='' && !empty($keys['date_add']) && $file_updts > $data[$keys['date_add']] ){
				$data[$keys['date_add']] = $file_updts;
			}
		// sozdali dannye dlja dobavlenieja INSERT
		$var	= "`".implode("`,`", $import_field)."`";
		$val	= "'".implode("','", $data)."'";
		$setUpdArr = array();
		foreach($import_field as $ind => $keyName){
			if($keyName!= 'id')
				$setUpdArr[] = "`".$keyName."` = '".$data[$ind]."'";
		}
		

		// dlja sozdanija aliasa, opredelim dlinnu vyrezaemyh simvolov, i kolichestvo slov.
		$long = 60;

		// esli avtomatom aliasy ne stavjatsja, to uznaem po kakomu polju i sdelaem alias.
		if (empty($_KAT['INDEX']['autoinc_'.$options['KUR_ALIAS']])) {
			$pkey	= (empty($_KAT['INDEX'][$options['KUR_ALIAS']])) ? $FORM_IMPORT[0] : $_KAT['INDEX'][$options['KUR_ALIAS']];
			if(!empty($_KAT['INDEX'][$options['KUR_ALIAS']]) && $_KAT['INDEX'][$options['KUR_ALIAS']]== 'id'){
				$data_add = 'LAST_INSERT_ID()+1';
				$var .= ", `alias`";
				$val .= ", ".$data_add."";
				$setUpdArr[] = "`alias` = "."'".$data_add."'";
				$alias = $data_add;
			}else{
				$pkey_val	= (empty($FORM_FIELD4ALIAS)) ? array_search($pkey, $FORM_IMPORT) : array_search($FORM_FIELD4ALIAS, $FORM_IMPORT);
				$data_add	= STR::translit($data[$pkey_val],$long, $long, true);
			
				if(empty($data_add)) continue;
				$var .= ", `alias`";
				$val .= ", '".$data_add."'";
				$setUpdArr[] = "`alias` = "."'".$data_add."'";
				$alias = $data_add;
			}
		}
		if($bu){
			$var .= ", `bu`";
			$val .= ", '1'";
			$setUpdArr[] = "`bu` = '1'";
		}else{
            $var .= ", `bu`";
			$val .= ", '0'";
			$setUpdArr[] = "`bu` = '0'";
		}
		
            $var .= ", `hidden`";
			$val .= ", '0'";
			$setUpdArr[] = "`hidden` = '0'";
            
            $var .= ", `artikul_lat`";
			$val .= ", '".$transart."'";
			$setUpdArr[] = "`artikul_lat` = '".$transart."'";
		//SQL::getval();
		if(SQL::getval('count(*)',DB_TABLE_PREFIX.$_KAT['TABLES'][$options['KUR_ALIAS']], "alias = '".$alias."'")){
			$res	= SQL::upd(DB_TABLE_PREFIX.$_KAT['TABLES'][$options['KUR_ALIAS']], implode(",",$setUpdArr), "alias = '".$alias."'", DEBUG);
			//	echo "<pre>"; print_r($res); echo "</pre>";
		}else{
			$res	= SQL::ins(DB_TABLE_PREFIX.$_KAT['TABLES'][$options['KUR_ALIAS']], $var, $val, DEBUG);
		}
		
		
		if ($res->Tuples > 0) {
			$good+=$res->Tuples;
		}else {
			$_KAT['ERROR'] .= $res->ErrorQuery;
			$bad++;
		}
		}
	//	$ji++;
	//	if ($ji == 100 ) die;
	}
	
	// б.у
	//SQL::query ( "update `".DB_TABLE_PREFIX.$_KAT['TABLES'][$options['KUR_ALIAS']]."` set bu=1 where artikul like '%аук%' OR artikul like '%СК320%' "); //OR  artikul like '%б'
	

	
	// logs
	SQL::query ( 'CREATE TABLE IF NOT EXISTS '.$log_tbl.' (
  `ts` bigint NOT NULL,
  `good` int(11) NOT NULL,
  `bad` int(11) NOT NULL,
  `date_time` datetime NOT NULL,
  `alias` varchar(16) NOT NULL,
  `images` varchar(16) NOT NULL,
  `res` text,
  `res_no_art` text,
	) ENGINE=ARCHIVE DEFAULT CHARSET=cp1251;');
	
	$dir = $_SERVER['DOCUMENT_ROOT'].'/data/db/f_all_items';
	$files_img = '';
	SQL::truncate(DB_TABLE_PREFIX."imgnoarticul");
	if ($handle = opendir($dir))
		while (false !== ($file = readdir($handle))){
			if (is_file($dir.'/'.$file) && !in_array($file, array('.','..'))) {
				$file_info = explode('.',basename($file));
				$ext = array_pop($file_info);
				$file = implode('.',$file_info);
				if($ext != 'csv' && in_array($file,$artikuls) === false /*&& !strstr($file, '_1') && !strstr($file, '_2')*/){
					$files_img .= $file.".".$ext."\n";
					$img_name = $file.".".$ext;
					$img_alias = STR::translit($img_name, 64, 5, true);
					SQL::ins(DB_TABLE_PREFIX."imgnoarticul", "`ts`,`name`,`alias`,`doc`", "'".date('Y-m-d')."','".$img_name."','".$img_alias."','".$img_name."'", DEBUG);
					//unlink($dir.'/'.$file.".".$ext);
				}
			}
		}
	$result_log = SQL::ins($log_tbl, "`ts`,`good`,`bad`,`date_time`, images, `res`,`res_no_art`, alias", $file_upd_ts.",".$good.",".$bad.",'".date("Y-m-d H:i:s")."', '$images', '".str_replace("'", '"', $_KAT['ERROR'])."<br>\n<B>Нет Файлов:</B> ".implode(',\n', $noFile)."', '".$files_img."', '".time()."'", DEBUG);
	//echo "<pre>"; print_r(array($good, $bad)); echo "</pre>";
echo "<pre>"; print_r($result_log); echo "</pre>";

	//print_r($_KAT['ERROR']); 
	
}	
	$vid_arr = SQL::getall('*',DB_TABLE_PREFIX.'type_products','hidden != 1 OR hidden IS NULL','order by prior');
	$vid_arr_new = array();
	foreach($vid_arr as $k=>$vid){
	   if(strpos($vid['name_one'],',')!== false){
	       $arrNameOne = explode(',',$vid['name_one']);
           $strWhere = '';
           foreach($arrNameOne as $nameOne){
                $strWhere .= "name LIKE '%%".$nameOne."%%' OR ";
           }
           $strWhere = substr($strWhere,0,strlen($strWhere)-4);
           SQL::upd(DB_TABLE_PREFIX.$_KAT['TABLES'][$options['KUR_ALIAS']],'type_id='.$vid['id'], $strWhere);
	   }else{
		  SQL::upd(DB_TABLE_PREFIX.$_KAT['TABLES'][$options['KUR_ALIAS']],'type_id='.$vid['id'], "name LIKE '%%".$vid['name_one']."%%'");
        }
		//$vid_arr_new[] = DB_TABLE_PREFIX.$_KAT['TABLES'][$options['KUR_ALIAS']]. $vid['id']."; name LIKE '%%".$vid['name_one']."%%'";
	}
	//echo "<pre>"; print_r($vid_arr_new); echo "</pre>";
	
	// обновим скидки на все импортированные товары
		if ($_KAT['discounts']['AFTER_ADD_INC']) {

			include $_KAT['discounts']['AFTER_ADD_INC'];

		}

die;
?>