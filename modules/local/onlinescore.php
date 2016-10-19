<?php
	global $form, $_KAT, $_CORE;
	if (!$_CORE->dll_load('class.lMail'))	die ( $_CORE->error_msg() );
	$_KAT['MODULE_NAME'] = 'db';
	$_KAT['KUR_ALIAS'] = 'onlinescore';
	
	include $_SERVER['DOCUMENT_ROOT']."/modules/db/conf.inc.php";
	include $_SERVER['DOCUMENT_ROOT']."/modules/db/onlinescore.data.inc.php";
	
	$form	= @$_REQUEST['form'];
	if(!empty($_REQUEST['ajax'])){
	  foreach($form as $key=>$val){
	    if(!is_array($val)){
	      $form[$key]=iconv("UTF-8","windows-1251",$val);
	    }
	  }
	}
	$_KAT['cForm'] = new cForm($FORM_DATA);
	$_KAT['KUR_TABLE'] = DB_TABLE_PREFIX .'onlinescore';

	if(KAT::check_form($form, 'onlinescore')){
		
		$res = KAT::save($form);
		
	}
	$form = SQL::getrow('*',DB_TABLE_PREFIX .'onlinescore',"alias = '".$form['alias']."'");
	$docs = array('doc','doc1','doc2','doc3','doc4');
	
	if($_KAT['ERROR'] == 'Данные сохранены'){
	    $text = "
	    Запрос с сайта на онлайн-оценку ,<br><br>
	    
	    Контактное лицо: \t".$form['fio'] ."<br>
	    Электронный адрес: \t".$form['mail'] ."<br>
	    Телефон: \t".$form['phone'] ."<br>
	    Описание изделия: \t".$form['cont'] ."<br>
	    <br>
	    ---<br>
	    Эта информация сохранена в системе управления сайтом в разделе 'Запросы на онлайн-оценку'
	    $_SERVER[SERVER_NAME]<br>
	    ";
    	$data = array();
    	$data['body'] = $text;
    	$data['name'] = $form['fio'];
    	$data['email'] = $form['mail'];
    	$data['subject'] = 'Запрос на онлайн оценку с сайта '.$_SERVER['SERVER_NAME'];
    	$attach = array();
    	foreach($docs as $fieldname){
    		if(!empty($form[$fieldname])) $attach[] = 'http://'.$_SERVER['SERVER_NAME'].$FORM_DATA['doc']['path'].'/'.$form[$fieldname];
    	}
		lMail::sendhtml($data,$attach);
		header("location: /doctxt/lombard/onlayn_otsenka/?good");
		die;
	}else{
		header("location: /doctxt/lombard/onlayn_otsenka/?bad");//grandnn2010@mail.ru
		die;
	}
	//echo "<pre>"; print_r($_KAT['ERROR']); echo "</pre>";
 ?>