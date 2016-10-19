<?
$block	= array('search', '','add', 'noline');
// OnClick="ShowPopUp('/clear/< ?=$_KAT['MODULE_NAME']? >/< ? =$_KAT['KUR_ALIAS']? >/?import',300,100,'no');return false;"
?>

<div id="db_adm_menu" style="visibility:hidden;position:absolute">
<!-- Добавить -->
<p><A  HREF='javascript:;' OnClick='ShowPopUp("/clear/<?=$_VOTE['MODULE_NAME']?>/admin?add&<?=$_SERVER['QUERY_STRING']?>", 800, 600, "yes");'><IMG SRC='<?=KAT::inc_link('a_add.gif', $tmp)?>' BORDER='0' ALT='Добавить'  align=left>Добавить</A></p>

</div>

<div id="db_adm_menu_r" style="visibility:hidden;position:absolute">

</div>

<div id="kat_buff_cont" style="visibility:hidden;position:absolute">
<?
	if( is_array($_SESSION['KAT']['CUTTED_ITEM_ALIAS']) )
	foreach( @$_SESSION['KAT']['CUTTED_ITEM_ALIAS'] as $k=>$v )  
	{	$name_cuted = DOCTXT::get_name_by_alias( $v );
		echo "<a href='javascript:;' title=".$v.">".substr($name_cuted, 0, 40)."(".$_SESSION['KAT']['CUTTED_TYPE'][$k].")</a><br>";
	}
?>
</div>
<script language="javascript" type="text/javascript">
writeField('CreateCmdLeft', getField('db_adm_menu'));
writeField('CreateCmdRight', getField('db_adm_menu_r'));
writeField('LeftPreview', "<p><?=@$message?></p>");
writeField('Buff', getField('kat_buff_cont'));
</script>
</div>

