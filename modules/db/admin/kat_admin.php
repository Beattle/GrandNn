<?
//include_once "odc_admin.inc.php";
global $form, $_KAT;
$submit	= @$_REQUEST['submit'];
$form	= @$_REQUEST['form'];
//$FormTree	= @$_REQUEST['form_tree'];

if (!empty($submit) && (empty($_KAT[$_KAT['KUR_ALIAS']]['PERM']['ua']) || empty($_KAT[$_KAT['KUR_ALIAS']]['PERM']['ue'])) ) {															// ��������� ������
	if(KAT::check_form($form, $Cmd) && KAT::save($form) ){
		$message	= '������ ��������';
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
}elseif (isset($_GET['del']) && empty($_KAT[$_KAT['KUR_ALIAS']]['PERM']['ud']) ) {													// �������� ������ 
	if(KAT::del($Cmd))
		echo "������ ���� ������� �������.<p>";
	else
		echo "������ �� ���� ������� ���������� ����� ��� ���������� � ��������������.<p>";
	echo $_CORE->cmd_pexec($_KAT['MODULE_NAME'].'/'.$_KAT['KUR_ALIAS'].'/search');

}elseif (isset($_GET['import']) && empty($_KAT[$_KAT['KUR_ALIAS']]['PERM']['ui'])) { 												// ����� �������������� ������
	if (isset($_POST['import_go'])) {											// �������������� ������
		if(false !== ($count = KAT::import($Cmd))){
			echo "<CENTER>������ ������� ��������.<H2>������������� ".intval($count)." ������� � ������� ".$_KAT['KUR_TABLE']."</H2> <A HREF='javascript:window.opener.location.reload();self.close();'>������� ����</A></CENTER> ";
			return;
		}else
			echo "�������������� �� ���� �����������, ���������� � �������������.<p>";
	}
	include_once (is_file($_CORE->SiteModDir."/import.form.inc.php")) 
		? $_CORE->SiteModDir."/import.form.inc.html"
		: $_CORE->CoreModDir."/import.form.inc.html";

}elseif (isset($_GET['empty'])&& empty($_KAT[$_KAT['KUR_ALIAS']]['PERM']['uem'])) {													// �������� ������ 
	if(false !== ($rows = KAT::truncate()))
		echo "������� �������. <p>";
	else
		echo "������� �� �������, ���������� � �������������.<p>".$_KAT['ERROR'];
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