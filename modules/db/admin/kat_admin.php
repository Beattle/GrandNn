<?
//include_once "odc_admin.inc.php";
global $form, $_KAT;
$submit	= @$_REQUEST['submit'];
$form	= @$_REQUEST['form'];
//$FormTree	= @$_REQUEST['form_tree'];

if (!empty($submit) && (empty($_KAT[$_KAT['KUR_ALIAS']]['PERM']['ua']) || empty($_KAT[$_KAT['KUR_ALIAS']]['PERM']['ue'])) ) {															// изменение записи
	if(KAT::check_form($form, $Cmd) && KAT::save($form) ){
		$message	= 'данные изменены';
		include "admin/kat_admin.submenu.inc.php";
		if ($_KAT[$_KAT['KUR_ALIAS']]['AFTER_ADD']) {
			header("Location: ".$_KAT[$_KAT['KUR_ALIAS']]['AFTER_ADD']);
			die();
		}else {
			KAT::get_cont($form['alias']);
		}
	}else{
		KAT::show_form($form);
	}
}elseif (isset($_GET['del']) && empty($_KAT[$_KAT['KUR_ALIAS']]['PERM']['ud']) ) {													// удаление записи 
	if(KAT::del($Cmd))
		echo "Запись была успешно удалена.<p>";
	else
		echo "Запись не была удалена попробуйте позже или обратитесь к администратору.<p>";
	echo $_CORE->cmd_pexec($_KAT['MODULE_NAME'].'/'.$_KAT['KUR_ALIAS'].'/search');

}elseif (isset($_GET['import']) && empty($_KAT[$_KAT['KUR_ALIAS']]['PERM']['ui'])) { 												// форма импортирование данных
	if (isset($_POST['import_go'])) {											// импортирование данных
		if(false !== ($count = KAT::import($Cmd))){
			echo "<CENTER>Импорт успешно завершен.<H2>Импортировано ".intval($count)." записей в таблицу ".$_KAT['KUR_TABLE']."</H2> <A HREF='javascript:window.opener.location.reload();self.close();'>закрыть окно</A></CENTER> ";
			return;
		}else
			echo "Импортирование не было произведено, обратитесь к разработчикам.<p>";
	}
	include_once (is_file($_CORE->SiteModDir."/import.form.inc.php")) 
		? $_CORE->SiteModDir."/import.form.inc.html"
		: $_CORE->CoreModDir."/import.form.inc.html";

}elseif (isset($_GET['empty'])&& empty($_KAT[$_KAT['KUR_ALIAS']]['PERM']['uem'])) {													// удаление записи 
	if(false !== ($rows = KAT::truncate()))
		echo "Таблица очищена. <p>";
	else
		echo "Таблица не очищена, обратитесь к разработчикам.<p>".$_KAT['ERROR'];
	header("Location: /".$_KAT['MODULE_NAME'].'/'.$_KAT['KUR_ALIAS'].'/search');
	die();

}elseif (empty($_KAT[$_KAT['KUR_ALIAS']]['PERM']['uf'])) {
	
//	echo "<PRE>\nCommand:".$Cmd."\n";
	$_KAT['ERROR'] = '';
	$data	= KAT::load($Cmd); // alias
	KAT::show_form($data);
} else {
	header("Location: /".$_KAT['MODULE_NAME'].'/'.$_KAT['KUR_ALIAS'].'/search');
	die();
}

?>