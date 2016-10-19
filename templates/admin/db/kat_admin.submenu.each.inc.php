<?
// БЛОКИРОВАТЬ редактирование и удаление на следующих страницах
$block	= array('add');
 
$field_name = ($_KAT[$_KAT['KUR_ALIAS']]['adm_fields'][0])?$_KAT[$_KAT['KUR_ALIAS']]['adm_fields'][0]:'name';
// Функция JS должна быть подключена один раз
if (KAT::inc_tpl('kat_admin.submenu.inconce.php', $f))
	include_once $f;
?>
<!-- Операции -->
<!-- <IMG SRC='<?=KAT::inc_tpl('a_oper.gif', $tmp)?>' BORDER='0' ALT='Опции' align="left" hspace=3 vspace=2 name="adm_im<?=$num?>" style="padding:0;margin:0" OnClick="writeField('EventsCmdLeft', getField('db_adm_menu_each<?=$num?>_l'));writeField('EventsCmdRight', getField('db_adm_menu_each<?=$num?>_r'));"> -->
<div id="db_adm_menu_each<?=$num?>_l" style="position:absolute;visibility:hidden">

<?if (!in_array($Cmd, $block)):?>
<!--Редактировать -->
<?/*<A HREF='javascript:;' onclick='ShowPopUp("/clear/<?=$_KAT['MODULE_NAME']?>/<?=$_KAT['KUR_ALIAS']?>/<?=$data['alias']?>?edit", 760, 500, "yes");'><IMG SRC='<?=KAT::inc_link('a_edit.gif', $tmp)?>' BORDER='0'  align='left' ALT='редактировать'>Редактировать</A>*/?>
<A HREF='javascript:;' onclick='if(shift_pressed_on==-1){shift_pressed_on=CurrentMarked;isp=true;}EnterPressed();if(isp)shift_pressed_on=-1;return false;'><IMG SRC='<?=KAT::inc_link('a_edit.gif', $tmp)?>' BORDER='0'  align='left' ALT='редактировать'>Редактировать</A>
<?endif;?>
</div>


<div id="db_adm_menu_each<?=$num?>_r" style="position:absolute;visibility:hidden">
<?if (!in_array($Cmd, $block)):?>
<!--Удалить-->
<?/* <A HREF='/<?=$_KAT['MODULE_NAME']?>/<?=$_KAT['KUR_ALIAS']?>/<?=$data['alias']?>?del' OnClick="return doc_del('<?=str_replace('\'',"\"",@$data['name'])?>', '/<?=$_KAT['MODULE_NAME']?>/<?=$_KAT['KUR_ALIAS']?>/<?=$data['alias']?>?del');"><IMG SRC='<?=KAT::inc_link('a_delete.gif', $tmp)?>'  BORDER='0'  align='left' ALT='удалить'>Удалить</A>*/?>
 <A HREF='/<?=$_KAT['MODULE_NAME']?>/<?=$_KAT['KUR_ALIAS']?>/<?=$data['alias']?>?del' OnClick="DeletePressed(); return false;"><IMG SRC='<?=KAT::inc_link('a_delete.gif', $tmp)?>'  BORDER='0'  align='left' ALT='удалить'>Удалить</A>
<?endif;?>
</div>

<div id="db_<?=$num?>_sa" style="position:absolute;visibility:hidden">
<?=cmd("connects/edit/"."/".@$_KAT['MODULE_NAME'].'/'.@$_KAT['KUR_ALIAS'].'/'.@$data['alias'],false,true);?>
</div>

<!--<A href='#' id="list<?=$num?>" OnClick="writeField('EventsCmdLeft', getField('db_adm_menu_each<?=$num?>_l'));writeField('EventsCmdRight', getField('db_adm_menu_each<?=$num?>_r'));setPointer('list<?=$num?>');return false;">-->
<?if (empty($own_name)){?>
	     <p><a href="/<?=$_KAT['MODULE_NAME']?>/<?=$_KAT['KUR_ALIAS']?>/<?=$data['alias']?>" id="itemList<?=$num?>"

			onFocus="writeField('LeftPreview', getField('newsList<?=$num?>'));writeField('EventsCmdLeft', getField('db_adm_menu_each<?=$num?>_l'));writeField('EventsCmdRight', getField('db_adm_menu_each<?=$num?>_r'));writeField('Connects', getField('db_<?=$num?>_sa'));return false;"

			ondblclick='ShowPopUp("/clear/<?=$_KAT['MODULE_NAME']?>/<?=$_KAT['KUR_ALIAS']?>/<?=$data['alias']?>?edit", 800, 600, "yes");'
			 
			 onClick="setPointer('<?=$num?>');<?=(empty($data['readonly'])?"if(chk_press_edit())ShowPopUp('/clear/".$_KAT['MODULE_NAME']."/".$_KAT['KUR_ALIAS']."/".$data['alias']."?edit', 800, 600, 'yes');":'')?>return false;"
	     > <IMG SRC="<?=KAT::inc_link('a_oper.gif', $tmp)?>" BORDER='0' ALT='Опции' align="left"> 
        <?=$data[$field_name]?></a></p>
<?}?>