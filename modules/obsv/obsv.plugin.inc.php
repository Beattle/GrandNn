<?
/* 
incomming: $_POST['obsv']
output: $_POST['obsv'][name], email, body, 
We need to have 
*/
global $obsv;
if(!empty($_POST['ajax'])){
  foreach($_POST['obsv'] as $key=>$val){
    if(!is_array($val)){
      $_POST['obsv'][$key]=iconv("UTF-8","windows-1251",$val);
    }
  }
}
if(isset($_POST['response'])){
    global $form;
     $text = "
    Отзыв на сайте,
    
    Контактное лицо: \t".$_POST['obsv']['name'] ."
    Текст: \t".$_POST['obsv']['describe'] ."
    
    ---
    Эта информация сохранена в системе управления сайтом в разделе 'Отзывы'
    $_SERVER[SERVER_NAME]
    ";   
    	$obsv['cont'] = $_POST['obsv']['body'] = $text; 
    	$obsv['alias'] = $_POST['obsv']['alias'] =  time();
    	$obsv['ts'] = $_POST['obsv']['ts'] = date('Y-m-d');
    	$obsv['name'] = $_POST['obsv']['name'];
    
    	$_CORE->dll_load('class.cForm');
   	    
        $form['cont'] = $_POST['obsv']['describe']; 
    	$form['alias'] = $form['name'] = $_POST['obsv']['alias'] =  time();
    	$form['ts'] = $_POST['obsv']['ts'] = date('Y-m-d');
    	$form['person'] = $_POST['obsv']['person'];
        $form['email'] = $_POST['obsv']['email'];
        
        include $_CORE->SiteModDir."/../db/response.data.inc.php"; 
        
    	$_OBSV['cForm']	= new cForm($FORM_DATA);
        list($var, $val) = $_OBSV['cForm']->GetSql('insert');
        if(!empty($var) && !empty($val))
    	   $res	= SQL::ins( DB_TABLE_PREFIX."response", $var.", hidden", $val.", 1", DEBUG);

} else {
    $text = "
    Обращение с сайта,
    
    Контактное лицо: \t".$_POST['obsv']['name'] ."
    Электронный адрес: \t".$_POST['obsv']['email'] ."
    Телефон: \t".$_POST['obsv']['phone'] ."
    Текст: \t".$_POST['obsv']['describe'] ."
    
    ---
    Эта информация сохранена в системе управления сайтом в разделе 'Обратная связь'
    $_SERVER[SERVER_NAME]
    ";
    
    $text2 = "
    Уважаемый(ая) ".$_POST['obsv']['name'] ."
    Ваше обращение на сайт $_SERVER[SERVER_NAME] 
    с текстом: \t".$_POST['obsv']['describe'] ."
    
    было получено. В ближайшее время мы обязательно свяжемся с вами.
    
    С уважением, центр поддержки сайта $_SERVER[SERVER_NAME]
    
    ";
    
    
    
    	$obsv['cont'] = $_POST['obsv']['body'] = $text; //var_export($_POST['obsv'], true);
    	$_POST['obsv2']['body'] = $text2;
    	$obsv['alias'] = $_POST['obsv']['alias'] =  time();
    	$obsv['ts'] = $_POST['obsv']['ts'] = $_POST['obsv2']['ts']=  date('Y-m-d');
    	$obsv['name'] =  $_POST['obsv2']['name'] = $_POST['obsv']['name'];
    
    
    if (OBSV::check($_POST['obsv'])) {
    	$_CORE->dll_load('class.cForm');
    	$_OBSV['cForm']	= new cForm($FORM_DATA);
    	list($var, $val) = $_OBSV['cForm']->GetSql('insert');
    	$res	= SQL::ins( $_OBSV['TABLE'], $var, $val, DEBUG);
    	$charset = 'koi8-r';
    	$headers="MIME-Version: 1.0\nContent-Type: text/plain; charset={$charset};\nContent-transfer-Encoding: 8bit\nX-Mailer: PHP.";
    	$from1   = "From: ".$_SERVER[SERVER_NAME]."\n".$headers;
    	@mail($_POST['obsv']['email'], convert_cyr_string ('Уведомление с сайта '.$_SERVER[SERVER_NAME],"w", "k"), convert_cyr_string ($text2, "w", "k"), $from1);
    }else{
    	$_OBSV['ERROR'] = '';
	}
}

?>