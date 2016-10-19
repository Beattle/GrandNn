<?
// ЅЋќ »–ќ¬ј“№ редактирование и удаление на следующих страницах
$block	= array('add');

// ‘ункци€ JS должна быть подключена один раз
if (KAT::inc_tpl('kat_admin.submenu.inconce.php', $f))
	include_once $f;
?>
<!-- ќперации -->
<div id="db_adm_menu_each<?=$num?>_l" style="position:absolute;visibility:hidden"></div>
<div id="db_adm_menu_each<?=$num?>_r" style="position:absolute;visibility:hidden"></div>
<div id="db_<?=$num?>_sa" style="position:absolute;visibility:hidden"></div>


<?if (empty($own_name)){ ?>
	     <p><span id="itemList<?=$num?>"><IMG SRC="<?=KAT::inc_link('a_oper.gif', $tmp)?>" BORDER='0' ALT='ќпции' align="left"> <?=$data["author_comment_from"]?></span></p> 
<?}?>