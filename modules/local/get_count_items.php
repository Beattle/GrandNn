<?php
global $_KAT,$_CORE,$FORM_WHERE,$FORM_ORDER;
	function fins_word( $count=0 )
	{
		if(!in_array(substr($count,-2), array(11,12,13,14) ) ){
			$count = substr($count,-1);
		}
		switch ($count) {
			case "1":
				return 'ие';
			case "2":case "3":case "4":
				return 'и€';
			default:
				return 'ий';
		}
	}
	$_KAT['KUR_ALIAS'] = 'all_items';
	$aliases = array('all_items', 'new_items');
	if(!empty($_REQUEST['alias']) && in_array($_REQUEST['alias'],$aliases)){
		$_KAT['KUR_ALIAS'] = $_REQUEST['alias'];
	}
	include $_SERVER['DOCUMENT_ROOT']."/modules/db/all_items.data.inc.php";
	include $_SERVER['DOCUMENT_ROOT'].'/templates/def/db/'.$_KAT['KUR_ALIAS'].'/search.form.html';
		
	$search	= @$_REQUEST['form'];
		if (is_array($search)) foreach ($search as $f => $v) {
			$f_key = str_replace(preg_replace('/\w+/i','',$f), '', $f); 
			$f_key = $f; // if not multcheckbox then get back key
			
			if (isset($FORM_DATA[$f_key])
				&& isset($v)  
				&& (!empty($v) || empty($v) && empty($FORM_DATA[$f_key]['no_empty']))
				
			){ 
				if (!is_array($v)) {
					$rel = (empty($FORM_DATA[$f_key]['search'])) ? "='$v'" : sprintf($FORM_DATA[$f_key]['search'], $v);
					$sel .= (!empty($FORM_DATA[$f_key]['logic']))?$FORM_DATA[$f_key]['logic']:' AND ';
					$tmp = " "."$f".$rel." "; // $_KAT['TABLES'][$_KAT['KUR_ALIAS']].
					$sel .= $tmp; 
				} else { // 22.11.2013 - дл€ массивов OR
					$sel_arr .= (!empty($FORM_DATA[$f_key]['logic']))?$FORM_DATA[$f_key]['logic']:' AND ';
					$sel_arr .= ' ( ';
					foreach ($v as $vs){
						$rel = (empty($FORM_DATA[$f_key]['search'])) ? "='$vs'" : sprintf($FORM_DATA[$f_key]['search'], $vs);
						$tmp[] = " "."$f".$rel." "; // $_KAT['TABLES'][$_KAT['KUR_ALIAS']].
					}
					$sel_arr .= implode (' OR ', $tmp) . ' ) ';
					$sel .= $sel_arr;
				}
			}
		}
		$sel 	.=  (!empty($FORM_WHERE)) ? $FORM_WHERE : '';
        SQL::query('SET SQL_BIG_SELECTS=1',0);
	$items = SQL::getall($FORM_SELECT_BEFORE.'artikul', DB_TABLE_PREFIX.'items '.$FORM_FROM,'1 '.$sel,$FORM_ORDER);
	if(!is_array($items)) $items = array();
	echo "ѕосмотреть ".count($items)." украшен".fins_word(count($items));
	
?>