<?
$block	= array('search', '','add', 'noline');
// OnClick="ShowPopUp('/clear/< ?=$_KAT['MODULE_NAME']? >/< ? =$_KAT['KUR_ALIAS']? >/?import',300,100,'no');return false;"
?>

<div id="db_adm_menu" style="visibility:hidden;position:absolute">
<!-- Добавить -->
<p><A  HREF='javascript:;' OnClick='ShowPopUp("/clear/<?=$_KAT['MODULE_NAME']?>/<?=$_KAT['KUR_ALIAS']?>/add?edit&<?=$_SERVER['QUERY_STRING']?>", 800, 600, "yes");'><IMG SRC='<?=KAT::inc_link('a_add.gif', $tmp)?>' BORDER='0' ALT='Добавить'  align=left>Добавить</A></p>
<?
// Функция импорта
	global $_KAT, $FORM_IMPORT, $FORM_IMPORTIMG;
	if (!empty($_KAT[$_KAT['KUR_ALIAS']]['IMPORT'])) {
		$FORM_IMPORT = $_KAT[$_KAT['KUR_ALIAS']]['IMPORT'];
	}
	
	if( !empty($FORM_IMPORTIMG)){
	?>
<!-- Мультизагрузка изображений -->
<p><BR><A  HREF='javascript:;' OnClick='ShowPopUp("/clear/<?=$_KAT['MODULE_NAME']?>/<?=$_KAT['KUR_ALIAS']?>/mass_add?edit&<?=$_SERVER['QUERY_STRING']?>", 800, 600, "yes");'><IMG SRC='<?=KAT::inc_link('a_add.gif', $tmp)?>' BORDER='0' ALT='Добавить'  align=left>Мультизагрузка</A></p>
<? } ?>
<? 
// Сортировка по приортету
if( !empty( $FORM_DATA['prior'] ) ){ 
	?>
	<p><BR><A HREF='javascript:;' OnClick='ShowPopUp("/clear/<?=$_KAT['MODULE_NAME']?>/<?=$_KAT['KUR_ALIAS']?>/site_order?<?=$_SERVER['QUERY_STRING']?>", 800, 600, "yes");'><IMG SRC='<?=KAT::inc_link('a_ordering.gif', $tmp)?>' BORDER='0' ALT='Порядок'  align=left>Порядок вывода</A></p>
	<?
}

if (!in_array($Cmd, $block)):?>
	<!-- Редактировать -->
	<A HREF='?edit'><IMG SRC='<?=KAT::inc_link('a_edit.gif', $tmp)?>' BORDER='0' ALT='редактировать'></A>
	<!-- Удалить -->
	<A href="#"><IMG SRC='<?=KAT::inc_link('a_delete.gif', $tmp)?>' BORDER='0' ALT='удалить' OnClick='db_del();'  align="left">&nbsp;Удалить</A>
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
	<p><a HREF='javascript:;' OnClick="ShowPopUp('/clear/<?=$_KAT['MODULE_NAME']?>/<?=$_KAT['KUR_ALIAS']?>/action?import',600,450,'yes');return false;"><IMG SRC='<?=KAT::inc_link('a_imp.gif', $tmp)?>' BORDER='0' ALT='Импортировать' alt=left>&nbsp;Импортировать</A></p>
<? }else{ ?>
	<p>&nbsp;</p>
<? } ?>

	<p><BR><a HREF='javascript:;' OnClick='db_empty();'><IMG SRC='<?=KAT::inc_link('a_empty.gif', $tmp)?>' BORDER='0' ALT='Удалить ВСЕ!' align=left>&nbsp;Очистить</A></p>

<?
// Функция экспорта
	if (!empty($_KAT[$_KAT['KUR_ALIAS']]['EXPORT'])) {
		$FORM_IMPORT = $_KAT[$_KAT['KUR_ALIAS']]['EXPORT'];
	}
	if(!empty($_KAT[$_KAT['KUR_ALIAS']]['EXPORT'])){
	?>
	<!-- Экспортировать -->
	<p><a href='/clear/<?=$_KAT['MODULE_NAME']?>/<?=$_KAT['KUR_ALIAS']?>/action?export' target="_blank" ><IMG SRC='<?=KAT::inc_link('a_imp.gif', $tmp)?>' BORDER='0' ALT='Экспортировать' alt=left>&nbsp;Экспортировать</a></p>
	<?
}?>
</div>

<div id="kat_buff_cont" style="visibility:hidden;position:absolute">
<?
	if( is_array($_SESSION['KAT']['CUTTED_ITEM_ALIAS']) ){
    //echo "<pre>"; print_r($_SESSION['KAT']); echo "</pre>";
  	foreach( @$_SESSION['KAT']['CUTTED_ITEM_ALIAS'] as $k=>$v )  
  	{	$name_cuted = DOCTXT::get_name_by_alias( $v );
  		echo "<a href='javascript:;' title=".$v.">".substr($name_cuted, 0, 40)."(".$_SESSION['KAT']['CUTTED_TYPE'][$k].")</a><br>";
  	}
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

