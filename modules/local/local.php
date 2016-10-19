<?php

global $_PROJECT, $_LOCAL, $_CORE, $SQL_DBCONF, $_KAT; // in user/index.inc

if (!$_CORE->dll_load('class.DBCQ'))
	die ($_CORE->error_msg());	


if (is_file($_CORE->ROOT.'/modules/db/shop.data.inc.php')) {
include $_CORE->ROOT.'/modules/db/shop.data.inc.php';
}
	


/*	
foreach ($FORM_DATA1['type']['arr'][$cat_id] as $type_id => $type_name) if ($type_id > 0) {?>
			<BR><A HREF="/db/new_products/<?=$cat_id?>/<?=$type_id?>/">- <?=$type_name?></A>
		<?}? >
*/		

switch ($Cmd) {
	case "content/title":
	case "module/title":
		echo "Каталог на поставку	";
		break;
	case "content/path":
	case "module/desc":
		break;
	case "suggest_goods":
//		$_section = 'goods';
//		include "suggest.php";
		break;
	case "suggest_services":
//		$_section = 'services';
//		include "suggest.php";
		break;
		
		case "katalog_local/view_katalog":
		//var_dump($FORM_DATA);
//				$marks = array( 
//'oil'=>'Шины',
//'akb'=>'Диски',
//'out' => 'Лебедки'  		);
//
//				$what = 'count(*) as count, razdel'; 
//				$from = 'zipauto__shop'; 
//				$GROUP_BY = 'razdel';
//					$where = '';
//					/* здесь нужно сделать шаблоны, если действительно нужно*/
//					echo '<h2>Спецпредложения</h2>
//<ul class="left-menu">';	
//					$res = SQL::sel($what, $from, $where, 'GROUP BY razdel', 1);
//					if ($res->NumRows > 0) {
//						for ($i = 0; $i < $res->NumRows; $i++) {
//							$res->FetchArray($i);
//							
//							echo '<li onmouseover="this.className=\'active\';" onmouseout="this.className=\'\';">
//<a href="/db/shop/?form[razdel]='.($res->FetchArray['razdel']).'">'.($marks[$res->FetchArray['razdel']]).'</a>
//<span class="number">'.($res->FetchArray['count']).'</span>
//</li>';
//
//						}
//					}
//					echo '</ul>';
		break;

	case "view_zapchasti":
//		$marks = array( 
//'oil'=>'Шины',
//'akb'=>'Диски',
//'out' => 'Лебедки' 
// 		);
//		echo '
//		<form action="/parser/search">
//<h2>Найти запчасть по каталожному номеру</h2>
//<input class="t" name="DetailNumber" type="text" value="'.$_REQUEST['DetailNumber'].'">
//<input class="s" type="submit" value=" > ">
//</form>';

//		Или <a href="javascript: displayField(\'lmark\', \'inverse\');">подберите</a> у наших поставщиков...
//		<div id="lmark" style="display: none">
//		<h2>Запчасти на авто</h2>
//		<ul class="left-menu">';
//		foreach ($marks as $key=>$mark) {
//			echo '<li onmouseover="this.className=\'active\';" onmouseout="this.className=\'\';"><a href="http://app.autoxp.ru/pscomplex/catalog.aspx?clstep=catalog&mark='.$key.'&salerind=110" target=_blank>'.$mark.'</a> <span class="number"> > </span></li>';
//		}
//		echo "</ul></div>";


		break;

	case "search":
		if (!empty($_REQUEST['q'])){
			echo "<h1>Поиск: $_REQUEST[q]</h1>";
			$text = str_replace('<td class="b">&nbsp;</td>','',str_replace('<td class="b"><img src="/images/db.gif" width="16" height="16" style="background-color: #3e4944;"></td>', '', str_replace("\n", '', implode('',file('http://www.inomarka52.ru/find.html?q='.$_REQUEST['q']."&id=")))));
			preg_match('/авторизация<\/a>.<\/p>(.*)При заказе Вы несете ответственность/i', $text, $matches);
			//print_r($mzzatches);
			echo $matches[1];
		}
		break;
	default: 
		if(strpos($Cmd,'images/')!== false )$Cmd = 'images';
		if (is_file($_CORE->SiteModDir.'/'.$Cmd.'.php')) {
			include $_CORE->SiteModDir.'/'.$Cmd.'.php';
		}else {
			echo $_CORE->SiteModDir.'/'.$Cmd;
		}

}
?>