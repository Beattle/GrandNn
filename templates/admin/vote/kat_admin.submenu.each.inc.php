<?
// БЛОКИРОВАТЬ редактирование и удаление на следующих страницах
$block	= array('add');

// Функция JS должна быть подключена один раз
if (KAT::inc_tpl('kat_admin.submenu.inconce.php', $f))
	include_once $f;
?>
<!-- Операции -->
<!-- <IMG SRC='<?=KAT::inc_tpl('a_oper.gif', $tmp)?>' BORDER='0' ALT='Опции' align="left" hspace=3 vspace=2 name="adm_im<?=$i?>" style="padding:0;margin:0" OnClick="writeField('EventsCmdLeft', getField('db_adm_menu_each<?=$i?>_l'));writeField('EventsCmdRight', getField('db_adm_menu_each<?=$i?>_r'));"> -->
<div id="db_adm_menu_each<?=$i?>_l" style="position:absolute;visibility:hidden">

<?if (!in_array($Cmd, $block)):?>
<!--Редактировать -->
<?/*<A HREF='javascript:;' onclick='ShowPopUp("/clear/<?=$_VOTE['MODULE_NAME']?>/admin?loaded=1&id=<?=@$_VOTE['vote']['id']?>", 760, 500, "yes");'><IMG SRC='<?=KAT::inc_link('a_edit.gif', $tmp)?>' BORDER='0'  align='left' ALT='редактировать'>Редактировать</A>*/?>
<A HREF='javascript:;' onclick='if(shift_pressed_on==-1){shift_pressed_on=CurrentMarked;isp=true;}EnterPressed();if(isp)shift_pressed_on=-1;return false;'><IMG SRC='<?=KAT::inc_link('a_edit.gif', $tmp)?>' BORDER='0'  align='left' ALT='редактировать'>Редактировать</A>
<?endif;?>
</div>


<div id="db_adm_menu_each<?=$i?>_r" style="position:absolute;visibility:hidden">
<?if (!in_array($Cmd, $block)):?>
<!--Удалить-->
 <A HREF='/<?=$_VOTE['MODULE_NAME']?>/admin?del=1&id=<?=$_VOTE['vote']['id']?>' OnClick="db_del('<?=$_VOTE['vote']['title']?>', <?=$_VOTE['vote']['id']?>);"><IMG SRC='<?=KAT::inc_link('a_delete.gif', $tmp)?>'  BORDER='0'  align='left' ALT='удалить'>Удалить</A>
<?endif;?>
</div>

<div id="db_<?=$i?>_sa" style="position:absolute;visibility:hidden">
</div>

<?if (empty($own_name)){?>
	     <p><a href="/<?=$_VOTE['MODULE_NAME']?>/admin?id=<?=$_VOTE['vote']['id']?>" id="itemList<?=$i?>"

			onFocus="writeField('LeftPreview', getField('newsList<?=$i?>'));writeField('EventsCmdLeft', getField('db_adm_menu_each<?=$i?>_l'));writeField('EventsCmdRight', getField('db_adm_menu_each<?=$i?>_r'));writeField('Connects', getField('db_<?=$i?>_sa'));return false;"

			ondblclick='ShowPopUp("/clear/<?=$_VOTE['MODULE_NAME']?>/admin?loaded=1&id=<?=@$_VOTE['vote']['id']?>", 800, 600, "yes");'
			 
			 onClick="setPointer('<?=$i?>');<?=(empty($data['readonly'])?"if(chk_press_edit())ShowPopUp('/clear/".$_VOTE['MODULE_NAME']."/admin?loaded=1&id=".$_VOTE['vote']['id']."', 800, 600, 'yes');":'')?>return false;"
	     > <IMG SRC="<?=KAT::inc_link('a_oper.gif', $tmp)?>" BORDER='0' ALT='Опции' align="left"> <?=$_VOTE['vote']['title']?></a></p>
<?}?>