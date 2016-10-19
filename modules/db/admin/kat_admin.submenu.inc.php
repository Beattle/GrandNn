<?
$block	= array('search', '','add', 'noline');
// OnClick="ShowPopUp('/clear/< ?=$_KAT['MODULE_NAME']? >/< ? =$_KAT['KUR_ALIAS']? >/?import',300,100,'no');return false;"
?>
<TABLE border="0" width="100%" cellpadding="0" cellspacing="0">
<tr align="right">
<td><?=@($message)?></td>
<td>
<A HREF='/<?=$_KAT['MODULE_NAME']?>/<?=$_KAT['KUR_ALIAS']?>/add?edit'><IMG SRC='<?=$_CORE->DIRMODS?>/<?=$_KAT['MODULE_NAME']?>/images/a_add.gif' WIDTH='16' HEIGHT='16' BORDER='0' ALT='Добавить'></A>
<?
	global $_KAT, $FORM_IMPORT;
	if (!empty($_KAT[$_KAT['KUR_ALIAS']]['IMPORT'])) {
		$FORM_IMPORT = $_KAT[$_KAT['KUR_ALIAS']]['IMPORT'];
	}
if(!empty($FORM_IMPORT)){?>
<A HREF='#' OnClick="ShowPopUp('/clear/<?=$_KAT['MODULE_NAME']?>/<?=$_KAT['KUR_ALIAS']?>/action?import',400,300,'yes');return false;"><IMG SRC='<?=$_CORE->DIRMODS?>/<?=$_KAT['MODULE_NAME']?>/images/a_imp.gif' WIDTH='16' HEIGHT='16' BORDER='0' ALT='Импортировать'></A>
<IMG SRC='<?=$_CORE->DIRMODS?>/<?=$_KAT['MODULE_NAME']?>/images/a_empty.gif' WIDTH='16' HEIGHT='16' BORDER='0' ALT='удалить ВСЕ!' OnClick='db_empty();'>
<?}?>
<?if (!in_array($Cmd, $block)):?>
	<A HREF='?edit'><IMG SRC='<?=$_CORE->DIRMODS?>/<?=$_KAT['MODULE_NAME']?>/images/a_edit.gif' WIDTH='16' HEIGHT='16' BORDER='0' ALT='редактировать'></A>
	<IMG SRC='<?=$_CORE->DIRMODS?>/<?=$_KAT['MODULE_NAME']?>/images/a_delete.gif' WIDTH='16' HEIGHT='16' BORDER='0' ALT='удалить' OnClick='db_del();'>
		<script language="javascript" type="text/javascript">
		function db_del(){ // js
			if (confirm("Вы уверены что хотите удалить запись ?")) {
				document.location.href	= "http://"+location.host+location.pathname+"?del";
				return true;
			}else
				return false;
		}
		</script>
<?endif;?>
</div>
<script language="javascript" type="text/javascript">
function db_empty(){ // js
if (confirm("Вы уверены что хотите удалить ВСЕ записи ?")) {
document.location.href	= "http://"+location.host+location.pathname+"action?empty";
return true;
}else
return false;
}
</script>
</td>
</tr>
</TABLE>