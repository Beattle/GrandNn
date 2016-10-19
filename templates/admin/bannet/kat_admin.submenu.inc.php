<?
$block	= array('search', '','add', 'noline');
// OnClick="ShowPopUp('/clear/< ?=$_BAN['MODULE_NAME']? >/< ? =$_BAN['KUR_ALIAS']? >/?import',300,100,'no');return false;"
?>
<div id="db_adm_menu" style="visibility:hidden;position:absolute">
<!-- Добавить -->
<p><A  HREF='javascript:;' OnClick='ShowPopUp("/clear/<?=$_BAN['MODULE_NAME']?>/<?=$_BAN['KUR_ALIAS']?>/add?edit&<?=$_SERVER['QUERY_STRING']?>", 800, 600, "yes");'><IMG SRC='<?=BAN::inc_link('a_add.gif', $tmp)?>' BORDER='0' ALT='Добавить'  align=left>Добавить</A></p>
<?
// Функция импорта
	global $_BAN, $FORM_IMPORT, $FORM_IMPORTIMG;
	if (!empty($_BAN[$_BAN['KUR_ALIAS']]['IMPORT'])) {
		$FORM_IMPORT = $_BAN[$_BAN['KUR_ALIAS']]['IMPORT'];
	}
	
	if( !empty($FORM_IMPORTIMG)){
	?>
<!-- Мультизагрузка изображений -->
<p><BR><A  HREF='javascript:;' OnClick='ShowPopUp("/clear/<?=$_BAN['MODULE_NAME']?>/<?=$_BAN['KUR_ALIAS']?>/mass_add?edit&<?=$_SERVER['QUERY_STRING']?>", 800, 600, "yes");'><IMG SRC='<?=BAN::inc_link('a_add.gif', $tmp)?>' BORDER='0' ALT='Добавить'  align=left>Мультизагрузка</A></p>
<? } ?>
<? 
// Сортировка по приортету
if( !empty( $FORM_DATA['prior'] ) ){ 
	?>
	<p><BR><A HREF='javascript:;' OnClick='ShowPopUp("/clear/<?=$_BAN['MODULE_NAME']?>/<?=$_BAN['KUR_ALIAS']?>/site_order?<?=$_SERVER['QUERY_STRING']?>", 800, 600, "yes");'><IMG SRC='<?=BAN::inc_link('a_ordering.gif', $tmp)?>' BORDER='0' ALT='Порядок'  align=left>Порядок вывода</A></p>
	<?
}

if (!in_array($Cmd, $block)):?>
	<!-- Редактировать -->
	<A HREF='?edit'><IMG SRC='<?=BAN::inc_link('a_edit.gif', $tmp)?>' BORDER='0' ALT='редактировать'></A>
	<!-- Удалить -->
	<A href="#"><IMG SRC='<?=BAN::inc_link('a_delete.gif', $tmp)?>' BORDER='0' ALT='удалить' OnClick='db_del();'  align="left">&nbsp;Удалить</A>
		<script language="javascript" type="text/javascript">
		function db_del(){// js
			if (confirm("Вы уверены что хотите удалить запись ?")) {
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
// Функция импорта
	if(!empty($FORM_IMPORT)){
	?>
	<!-- Импортировать -->
	<p><a HREF='javascript:;' OnClick="ShowPopUp('/clear/<?=$_BAN['MODULE_NAME']?>/<?=$_BAN['KUR_ALIAS']?>/action?import',600,450,'yes');return false;"><IMG SRC='<?=BAN::inc_link('a_imp.gif', $tmp)?>' BORDER='0' ALT='Импортировать' alt=left>&nbsp;Импортировать</A></p>
	<p><BR><a HREF='javascript:;' OnClick='db_empty();'><IMG SRC='<?=BAN::inc_link('a_empty.gif', $tmp)?>' BORDER='0' ALT='Удалить ВСЕ!' align=left>&nbsp;Очистить</A></p>
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

