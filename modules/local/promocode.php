<?php
	global $_SMS, $_CONF, $form;
include_once $_SERVER['DOCUMENT_ROOT']."/modules/db/promocode.data.inc.php";
$cform 	= new cForm($FORM_DATA);

function GetRealIp()
{
	if (!empty($_SERVER['HTTP_CLIENT_IP'])){
		$ip=$_SERVER['HTTP_CLIENT_IP'];
	}
	elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])){
		$ip=$_SERVER['HTTP_X_FORWARDED_FOR'];
	}
	else{
		$ip=$_SERVER['REMOTE_ADDR'];  
	}
	return $ip;
}
if( !empty($_REQUEST['form']['phone']) ){
	$form = $_REQUEST['form'];
	foreach($form as $key=>$val){
		if(!is_array($val)){
			$form[$key]=iconv("UTF-8","windows-1251",$val);
		}
	}
	$form['phone'] = mysql_real_escape_string(strip_tags($form['phone']));
	$form['phone'] = preg_replace('/\D/', '', $form['phone']);
	if(strlen($form['phone'])<10) { 
?>
<div style="width:auto;height:auto;overflow: hidden;position:relative;" id="popupform"> 
	<div class="modalbox">
		<h2 style="color: red;">Ошибка</h2>
		в номере телефона недостаточно цифр
	</div>
</div>
	<?
		die; 
	}
	if(strlen($form['phone'])>10){ 
		$form['phone'] = substr($form['phone'],-10); 
	}
	$form['phone'] = "+7".substr($form['phone'],0,3).substr($form['phone'],3,3).substr($form['phone'],6,2).substr($form['phone'],8,2);
	
	$form['name'] 			= date("Y-m-d H:i:s")."-".$form['phone'];
	$form['alias'] 			= STR::translit($form['name'], 100 , 100 , true);
	$form['ip'] 			= GetRealIp();
	$form['discount'] 		= $_CONF['settings']['discount'];
	
	$form['code'] 			= $_SESSION['promocode'];
	$form['date_post'] 		= date("Y-m-d H:i:s");
	$form['ts'] 			= date("Y-m-d");
	//  добавляем заявку в таблицу 
	list($var, $val) 	= $cform->GetSql('insert');
	$res = SQL::ins( DB_TABLE_PREFIX.'promocode', $var, $val, DEBUG);
	?>
	
<div style="width:auto;height:auto;overflow: hidden;position:relative;" id="popupform"> 
	<div class="modalbox">
		<h2>Выполнено</h2>
		SMS с условием акции и промокодом успешно отправлено на номер <?php echo $form['phone']; ?>
	</div>
</div>
	<?
	// отправляем информацию по sms

	$text = $_CONF['settings']['text_sms']." ".$_SESSION['promocode'];
	$text_sms = iconv("windows-1251","UTF-8",$text);
	$phone = substr(preg_replace('/\D/', '', $form['phone']),-10);
	$res = $_SMS->sendSMS ( $phone , $text_sms , $_CONF['settings']['from'] );
	
	
	
}else{ ?>
<div style="width:auto;height:auto;overflow: hidden;position:relative;" id="popupform"> 
	<div class="modalbox" style="max-width: 400px;">
<script language="javascript" src="<?=$_CORE->TEMPLATES.$_CORE->CURR_TPL?>/JS/jquery.maskedinput-1.2.2.js"	type="text/javascript"></script>
<script type="text/javascript">
	jQuery(function($) {
		$.mask.definitions['~']='[+-]';
		$('#phone').mask('+7(999)999-99-99');
	});
</script>
		<h2><?php echo $_CONF['settings']['anons_discount']; ?></h2>
		<?php echo $_CONF['settings']['text_discount']; ?><br />
		<div style="margin-top: 15px;">
		<form id="frmsend" class="zvonok" method="post" onsubmit="return false;">
			<center>
				<input type="textbox" id="phone" onload="this.focus()" placeholder="+7(___)___-__-__" name="form[phone]" value="<?=@(!empty($_SESSION['_BASKET_PHONE']))?$_SESSION['_BASKET_PHONE']:(!empty($_SESSION['SESS_AUTH']['ALL']['author_phone']))? $_SESSION['SESS_AUTH']['ALL']['author_phone'] : $_POST[BASKET_CONTACTS]['phone']?>" />
				<input class="btn" type="submit" onclick="$('#fancybox-content').load('/clear/local/promocode',$('#frmsend').serialize()); return false;" border="0" value="отправить запрос" style="cursor: pointer;" />
			</center>
		</form>
		</div>
	</div>
</div>
<?php
	
} 
?>