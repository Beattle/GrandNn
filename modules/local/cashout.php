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
	if($_KAT['ERROR'] == '������ ���������'){
		SQL::upd(DB_TABLE_PREFIX.'auth_pers','balance = balance - '.$form['summa'], "author_id = ".$_SESSION['SESS_AUTH']['ID']);
		$_SESSION['SESS_AUTH']['ALL']['balance'] = $_SESSION['SESS_AUTH']['ALL']['balance'] - $form['summa'];
		$text = "
		������ �� ����� �������
		
		���������� ����: \t".$form['fio'] ."
		����������� �����: \t".$form['mail'] ."
		�������: \t".$form['phone'] ."
		
		������������� �������:  \t".$form['name'] ."
		�����: \t".$form['summa'] ."
		������ ������: \t".$FORM_DATA['partner_cashout']['arr'][$form['partner_cashout']] ."
		���������: \t".$form['cont'] ."
		
		
		---
		��� ���������� ��������� � ������� ���������� ������ � ������� '������� �� ����� �������'
		$_SERVER[SERVER_NAME]
		";
		$charset      = 'koi8-r';
    	$headers="MIME-Version: 1.0\nContent-Type: text/plain; charset={$charset};\nContent-transfer-Encoding: 8bit\nX-Mailer: PHP.";
    	$from 		= "From: ".str_replace('www.','',$_SERVER['SERVER_NAME'])."\n".$headers;
    	@mail(TO, convert_cyr_string ('����������� � ����� '.$_SERVER['SERVER_NAME'],"w", "k"), convert_cyr_string ($text, "w", "k"), $from);
    	@mail($form['mail'], convert_cyr_string ('����������� � ����� '.$_SERVER['SERVER_NAME'],"w", "k"), convert_cyr_string ($text, "w", "k"), $from);
		// ��� ������
		echo "<h3>������ ������� ���������!</h3><br />
			<p>
				������������� �������: ".$form['name'] ."<br />
				����� ���������� ������� �� 1 �� 5 ������� ����.
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
		// ���� ������
		echo "<h3>������ �� ������� ���������!</h3><br />
			<p>
				���������� ��������� �������. <br />
				���� �������� ����� ����������� ��������� � ����<br />
				���� �� �������� ���������� � ����� �����, <br />
				���� �������������� ������� �������� ������.
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
			// ���� ������
		echo "<h3>������ �������</h3>";
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