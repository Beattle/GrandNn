<?
$block	= array('add');
include_once $_CORE->CoreModDir."/admin/kat_admin.submenu.inconce.php";
// OnClick="ShowPopUp('/clear/< ?=$_KAT['MODULE_NAME']? >/< ? =$_KAT['KUR_ALIAS']? >/?import',300,100,'no');return false;"
?>
<IMG SRC='<?=$_CORE->DIRMODS?>/<?=$_KAT['MODULE_NAME']?>/images/a_oper.gif' WIDTH='16' HEIGHT='16' BORDER='0' ALT='Опции' name="adm_im<?=$num?>" OnClick="if(!loaded<?=$num?>)sub_cont_menu_set(<?=$num?>); db_adm_sub_obj.visibility='hidden';if (now != <?=$num?>) {db_adm_sub_obj=getobj('adm<?=$num?>');db_adm_sub_obj.visibility='visible';now=<?=$num?>;}else now=-1;loaded<?=$num?>=1;">


<div id="adm<?=$num?>" style="position:absolute;visibility:hidden">
<TABLE border=0 cellpadding=3 cellspacing=1 class="hl" bgcolor="#B7B7B7">
<TBODY>
<?if (!in_array($Cmd, $block)):?>
<TR bgcolor="#ffffff"><TD align="right"> Скрыть: <A HREF="#" OnClick="db_adm_sub_obj.visibility='hidden';" class='gr'>x</A>
<TR bgcolor="#ffffff"><TD>
	<A HREF='/<?=$_KAT['MODULE_NAME']?>/<?=$_KAT['KUR_ALIAS']?>/<?=$data['alias']?>?edit'><IMG SRC='<?=$_CORE->DIRMODS?>/<?=$_KAT['MODULE_NAME']?>/images/a_edit.gif' WIDTH='16' HEIGHT='16' BORDER='0' hspace=3  align='middle' ALT='редактировать'>редактировать</A>
</TD></TR>
<TR bgcolor="#ffffff"><TD>
	<A HREF='/<?=$_KAT['MODULE_NAME']?>/<?=$_KAT['KUR_ALIAS']?>/<?=$data['alias']?>?del' OnClick="del('<?=str_replace('\'',"\"",@$data['name'])?>');"><IMG SRC='<?=$_CORE->DIRMODS?>/<?=$_KAT['MODULE_NAME']?>/images/a_delete.gif' WIDTH='16' HEIGHT='16' BORDER='0' hspace=3  align='middle' ALT='удалить'>удалить</A>
</TD></TR>
</TD></TR>
<?endif;?>
</TBODY>
</TABLE>
</div>

<SCRIPT>
loaded<?=$num?> = 0;
</SCRIPT>

