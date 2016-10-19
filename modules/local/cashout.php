<?
if(isset($_POST['form']) && !empty($_POST['form']['summa']) && $_POST['form']['summa']>=500 && $_POST['form']['summa'] <= $_SESSION['SESS_AUTH']['ALL']['balance']){
	global $form, $_KAT;
	$_KAT['MODULE_NAME'] 	= 'db';
	$_KAT['KUR_ALIAS'] 		= 'cashout';
	
	include $_SERVER['DOCUMENT_ROOT']."/modules/db/conf.inc.php";
	include $_SERVER['DOCUMENT_ROOT']."/modules/db/cashout.data.inc.php";
	
	$form	= @$_REQUEST['form'];
	if(!empty($_REQUEST['ajax'])){
	  foreach($form as $key=>$val){
	    if(!is_array($val)){
	      $form[$key]=iconv("UTF-8","windows-1251",$val);
	    }
	  }
	}
	$form['name'] 	= $_SESSION['SESS_AUTH']['ID'].time();
	$form['fio'] 	= $_SESSION['SESS_AUTH']['ALL']['author_comment'];
	$form['mail'] 	= $_SESSION['SESS_AUTH']['ALL']['author_login'];
	$form['phone'] 	= $_SESSION['SESS_AUTH']['ALL']['author_phone'];
	
	$_KAT['cForm'] = new cForm($FORM_DATA);
	$_KAT['KUR_TABLE'] = DB_TABLE_PREFIX .'cashout';
	
	
	if(KAT::check_form($form)){
		
		$res = KAT::save($form);
		
	}
	if($_KAT['ERROR'] == 'Данные сохранены'){
		SQL::upd(DB_TABLE_PREFIX.'auth_pers','balance = balance - '.$form['summa'], "author_id = ".$_SESSION['SESS_AUTH']['ID']);
		$_SESSION['SESS_AUTH']['ALL']['balance'] = $_SESSION['SESS_AUTH']['ALL']['balance'] - $form['summa'];
		$text = "
		Запрос на вывод средств
		
		Контактное лицо: \t".$form['fio'] ."
		Электронный адрес: \t".$form['mail'] ."
		Телефон: \t".$form['phone'] ."
		
		Идентификатор запроса:  \t".$form['name'] ."
		Сумма: \t".$form['summa'] ."
		Способ вывода: \t".$FORM_DATA['partner_cashout']['arr'][$form['partner_cashout']] ."
		Реквизиты: \t".$form['cont'] ."
		
		
		---
		Эта информация сохранена в системе управления сайтом в разделе 'Запросы на вывод средств'
		$_SERVER[SERVER_NAME]
		";
		$charset      = 'koi8-r';
    	$headers="MIME-Version: 1.0\nContent-Type: text/plain; charset={$charset};\nContent-transfer-Encoding: 8bit\nX-Mailer: PHP.";
    	$from 		= "From: ".str_replace('www.','',$_SERVER['SERVER_NAME'])."\n".$headers;
    	@mail(TO, convert_cyr_string ('Уведомление с сайта '.$_SERVER['SERVER_NAME'],"w", "k"), convert_cyr_string ($text, "w", "k"), $from);
    	@mail($form['mail'], convert_cyr_string ('Уведомление с сайта '.$_SERVER['SERVER_NAME'],"w", "k"), convert_cyr_string ($text, "w", "k"), $from);
		// все хорошо
		echo "<h3>Запрос успешно отправлен!</h3><br />
			<p>
				Идентификатор запроса: ".$form['name'] ."<br />
				Время исполнения запроса от 1 до 5 рабочих дней.
			</p>
		";
		?>
		<script>
			setTimeout(startTimer, 5000);
			function startTimer(){
				$.fancybox.close();
				window.location.reload();
				return;
			}
		</script>
<?
	}else{
		// есть ошибки
		echo "<h3>Запрос не удалось сохранить!</h3><br />
			<p>
				Попробуйте повторить позднее. <br />
				Если проблема будет повторяться свяжитесь с нами<br />
				либо по телефону указанному в шапке сайта, <br />
				либо воспользуйтесь услугой заказать звонок.
			</p>
		";
		?>
		<script>
			setTimeout(startTimer, 4000);
			function startTimer(){
				$.fancybox.close();
				return;
			}
		</script>
<?
	}
	
}else{
			// есть ошибки
		echo "<h3>Ошибка доступа</h3>";
		?>
		<script>
			setTimeout(startTimer, 1500);
			function startTimer(){
				$.fancybox.close();
				// window.location.reload();
				return;
			}
		</script>
<? }
?>