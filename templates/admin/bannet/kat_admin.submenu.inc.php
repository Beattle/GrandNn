<?
$block	= array('search', '','add', 'noline');
// OnClick="ShowPopUp('/clear/< ?=$_BAN['MODULE_NAME']? >/< ? =$_BAN['KUR_ALIAS']? >/?import',300,100,'no');return false;"
?>
<div id="db_adm_menu" style="visibility:hidden;position:absolute">
<!-- �������� -->
<p><A  HREF='javascript:;' OnClick='ShowPopUp("/clear/<?=$_BAN['MODULE_NAME']?>/<?=$_BAN['KUR_ALIAS']?>/add?edit&<?=$_SERVER['QUERY_STRING']?>", 800, 600, "yes");'><IMG SRC='<?=BAN::inc_link('a_add.gif', $tmp)?>' BORDER='0' ALT='��������'  align=left>��������</A></p>
<?
// ������� �������
	global $_BAN, $FORM_IMPORT, $FORM_IMPORTIMG;
	if (!empty($_BAN[$_BAN['KUR_ALIAS']]['IMPORT'])) {
		$FORM_IMPORT = $_BAN[$_BAN['KUR_ALIAS']]['IMPORT'];
	}
	
	if( !empty($FORM_IMPORTIMG)){
	?>
<!-- �������������� ����������� -->
<p><BR><A  HREF='javascript:;' OnClick='ShowPopUp("/clear/<?=$_BAN['MODULE_NAME']?>/<?=$_BAN['KUR_ALIAS']?>/mass_add?edit&<?=$_SERVER['QUERY_STRING']?>", 800, 600, "yes");'><IMG SRC='<?=BAN::inc_link('a_add.gif', $tmp)?>' BORDER='0' ALT='��������'  align=left>��������������</A></p>
<? } ?>
<? 
// ���������� �� ���������
if( !empty( $FORM_DATA['prior'] ) ){ 
	?>
	<p><BR><A HREF='javascript:;' OnClick='ShowPopUp("/clear/<?=$_BAN['MODULE_NAME']?>/<?=$_BAN['KUR_ALIAS']?>/site_order?<?=$_SERVER['QUERY_STRING']?>", 800, 600, "yes");'><IMG SRC='<?=BAN::inc_link('a_ordering.gif', $tmp)?>' BORDER='0' ALT='�������'  align=left>������� ������</A></p>
	<?
}

if (!in_array($Cmd, $block)):?>
	<!-- ������������� -->
	<A HREF='?edit'><IMG SRC='<?=BAN::inc_link('a_edit.gif', $tmp)?>' BORDER='0' ALT='�������������'></A>
	<!-- ������� -->
	<A href="#"><IMG SRC='<?=BAN::inc_link('a_delete.gif', $tmp)?>' BORDER='0' ALT='�������' OnClick='db_del();'  align="left">&nbsp;�������</A>
		<script language="javascript" type="text/javascript">
		function db_del(){// js
			if (confirm("�� ������� ��� ������ ������� ������ ?")) {
				document.location.href  = "http://"+location.host+location.pathname+"?del";
				return true;
			}else
				return false;
		}
		</script>
<?endif;?>
</div>

<div id="db_adm_menu_r" style="visibility:hidden;position:absolute">
<?
// ������� �������
	if(!empty($FORM_IMPORT)){
	?>
	<!-- ������������� -->
	<p><a HREF='javascript:;' OnClick="ShowPopUp('/clear/<?=$_BAN['MODULE_NAME']?>/<?=$_BAN['KUR_ALIAS']?>/action?import',600,450,'yes');return false;"><IMG SRC='<?=BAN::inc_link('a_imp.gif', $tmp)?>' BORDER='0' ALT='�������������' alt=left>&nbsp;�������������</A></p>
	<p><BR><a HREF='javascript:;' OnClick='db_empty();'><IMG SRC='<?=BAN::inc_link('a_empty.gif', $tmp)?>' BORDER='0' ALT='������� ���!' align=left>&nbsp;��������</A></p>
	<?
}?>
</div>

<div id="BAN_buff_cont" style="visibility:hidden;position:absolute">
<?
	if( is_array($_SESSION['BAN']['CUTTED_ITEM_ALIAS']) )
	foreach( @$_SESSION['BAN']['CUTTED_ITEM_ALIAS'] as $k=>$v )  
	{	$name_cuted = DOCTXT::get_name_by_alias( $v );
		echo "<a href='javascript:;' title=".$v.">".substr($name_cuted, 0, 40)."(".$_SESSION['BAN']['CUTTED_TYPE'][$k].")</a><br>";
	}
?>
</div>
<script language="javascript" type="text/javascript">
writeField('CreateCmdLeft', getField('db_adm_menu'));
writeField('CreateCmdRight', getField('db_adm_menu_r'));
writeField('LeftPreview', "<p><?=@$message?></p>");
writeField('Buff', getField('BAN_buff_cont'));
</script>
</div>

