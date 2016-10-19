<?
global $_KAT, $FORM_DATA;
//print_r($_KAT);
//print_r($FORM_DATA);

// выбираем по исходнику тип товара
switch ($_KAT['SRC'][$_KAT['KUR_ALIAS']]) {
	case 'shop_bra': $type = 'bra';break;
	case 'shop_kolie': $type = 'bra';break;
	case 'shop_rings': $type = 'ring';break;
	case 'shop_inc': $type = 'shop';break;
}

/*$res = SQL::sel("ins.name name, count(*) cnt", DB_TABLE_PREFIX.$_KAT['TABLES'][$_KAT['KUR_ALIAS']]. ' i, '.DB_TABLE_PREFIX.$type.'_ins ins ', "i.ins = ins.name AND ins.name!='Без вставки'", "GROUP BY ins.name HAVING cnt > 0", DEBUG);*/
$res = SQL::sel("ins as name, count(*)  cnt", DB_TABLE_PREFIX.$_KAT['TABLES'][$_KAT['KUR_ALIAS']], "ins != '' AND ins!='Без вставки' AND ins!='0' AND (hidden != 1 OR hidden IS NULL) ", "GROUP BY ins HAVING cnt > 0", DEBUG);
$res_no = SQL::getval("count(*) cnt", DB_TABLE_PREFIX.$_KAT['TABLES'][$_KAT['KUR_ALIAS']]. ' i', "ins = '' OR ins = 'Без вставки' OR ins='0' AND (hidden != 1 OR hidden IS NULL) ", '', DEBUG);
//$res = SQL::sel("ins name, count(*) cnt", DB_TABLE_PREFIX.$_KAT['TABLES'][$_KAT['KUR_ALIAS']]. ' i ', "", "GROUP BY ins HAVING cnt > 0", DEBUG);

if ($res->Result) {
	// Вывод
	echo "<div class='search_spravochnik'><div id=triger_search  class=insitelink>Выберите вставку";
  if (!empty($_GET['form']['ins'])) echo " (".$_GET['form']['ins'].")"; 
  echo "</div></div>";
  echo "<div class=search_spravochnik id=search_spravochnik style='display:none;'>";
	for ($i = 0; $i < $res->NumRows; $i++) {
			$res->FetchArray($i); 
			echo "<a title='".$res->FetchArray['name']."' href='?form[ins]=".trim($res->FetchArray['name'])."'>".trim($res->FetchArray['name'])." (".$res->FetchArray['cnt'].")</a>";
	}	
	$was = true;
  if(!empty($res_no)){
    echo "<a title='Без вставки' href='?form[ins]=Без вставки'>Без вставки (".$res_no.")</a>";
  }
	echo "<a href='?'>Все</a>"; 
	echo "</div>";
}



?>