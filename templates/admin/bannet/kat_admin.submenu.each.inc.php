<?
// ����������� �������������� � �������� �� ��������� ���������
$block	= array('add');

// ������� JS ������ ���� ���������� ���� ���
if (BAN::inc_tpl('kat_admin.submenu.inconce.php', $f))
	include_once $f;
?>
<!-- �������� -->
<!-- <IMG SRC='<?=BAN::inc_tpl('a_oper.gif', $tmp)?>' BORDER='0' ALT='�����' align="left" hspace=3 vspace=2 name="adm_im<?=$num?>" style="padding:0;margin:0" OnClick="writeField('EventsCmdLeft', getField('db_adm_menu_each<?=$num?>_l'));writeField('EventsCmdRight', getField('db_adm_menu_each<?=$num?>_r'));"> -->
<div id="db_adm_menu_each<?=$num?>_l" style="position:absolute;visibility:hidden">

<?if (!in_array($Cmd, $block)):?>
<!--������������� -->
<?/*<A HREF='javascript:;' onclick='ShowPopUp("/clear/<?=$_BAN['MODULE_NAME']?>/<?=$_BAN['KUR_ALIAS']?>/<?=$data['alias']?>?edit", 760, 500, "yes");'><IMG SRC='<?=BAN::inc_link('a_edit.gif', $tmp)?>' BORDER='0'  align='left' ALT='�������������'>�������������</A>*/?>
<A HREF='javascript:;' onclick='if(shift_pressed_on==-1){shift_pressed_on=CurrentMarked;isp=true;}EnterPressed();if(isp)shift_pressed_on=-1;return false;'><IMG SRC='<?=BAN::inc_link('a_edit.gif', $tmp)?>' BORDER='0'  align='left' ALT='�������������'>�������������</A>
<?endif;?>
</div>


<div id="db_adm_menu_each<?=$num?>_r" style="position:absolute;visibility:hidden">
<?if (!in_array($Cmd, $block)):?>
<!--�������-->
<?/* <A HREF='/<?=$_BAN['MODULE_NAME']?>/<?=$_BAN['KUR_ALIAS']?>/<?=$data['alias']?>?del' OnClick="return doc_del('<?=str_replace('\'',"\"",@$data['name'])?>', '/<?=$_BAN['MODULE_NAME']?>/<?=$_BAN['KUR_ALIAS']?>/<?=$data['alias']?>?del');"><IMG SRC='<?=BAN::inc_link('a_delete.gif', $tmp)?>'  BORDER='0'  align='left' ALT='�������'>�������</A>*/?>
 <A HREF='/<?=$_BAN['MODULE_NAME']?>/<?=$_BAN['KUR_ALIAS']?>/<?=$data['alias']?>?del' OnClick="DeletePressed();"><IMG SRC='<?=BAN::inc_link('a_delete.gif', $tmp)?>'  BORDER='0'  align='left' ALT='�������'>�������</A>
<?endif;?>
</div>

<div id="db_<?=$num?>_sa" style="position:absolute;visibility:hidden">
<?=cmd("connects/edit/"."/".@$_BAN['MODULE_NAME'].'/'.@$_BAN['KUR_ALIAS'].'/'.@$data['alias'],false,true);?>
</div>

<!--<A href='#' id="list<?=$num?>" OnClick="writeField('EventsCmdLeft', getField('db_adm_menu_each<?=$num?>_l'));writeField('EventsCmdRight', getField('db_adm_menu_each<?=$num?>_r'));setPointer('list<?=$num?>');return false;">-->
<?if (empty($own_name)){?>
	     <p><a href="/<?=$_BAN['MODULE_NAME']?>/<?=$_BAN['KUR_ALIAS']?>/<?=$data['alias']?>" id="itemList<?=$num?>"

			onFocus="writeField('LeftPreview', getField('newsList<?=$num?>'));writeField('EventsCmdLeft', getField('db_adm_menu_each<?=$num?>_l'));writeField('EventsCmdRight', getField('db_adm_menu_each<?=$num?>_r'));writeField('Connects', getField('db_<?=$num?>_sa'));return false;"

			ondblclick='ShowPopUp("/clear/<?=$_BAN['MODULE_NAME']?>/<?=$_BAN['KUR_ALIAS']?>/<?=$data['alias']?>?edit", 800, 600, "yes");'
			 
			 onClick="setPointer('<?=$num?>');<?=(empty($data['readonly'])?"if(chk_press_edit())ShowPopUp('/clear/".$_BAN['MODULE_NAME']."/".$_BAN['KUR_ALIAS']."/".$data['alias']."?edit', 800, 600, 'yes');":'')?>return false;"
	     > <IMG SRC="<?=BAN::inc_link('a_oper.gif', $tmp)?>" BORDER='0' ALT='�����' align="left"> <?=$data["name"]?></a></p>
<?}?>