<?php set_time_limit(300);
global $_KAT,$_CORE, $FORM_DATA;
$all_artikuls = SQL::getall('artikul',DB_TABLE_PREFIX.'items', "artikul_lat=''"," group by artikul LIMIT 500" );
if(is_array($all_artikuls) && count($all_artikuls)){
    foreach($all_artikuls as $row){
        $value = trim($row['artikul']);
        $transart = str_replace(array("#"," "),array('','_'),trim(strtolower(STR::translit(str_replace("¹",'N',$value)))));
        $set = "artikul_lat = '".$transart."'";
        $result = SQL::upd(DB_TABLE_PREFIX."items", $set ,"artikul='".$row['artikul']."'");
    }
}
echo count($all_artikuls);
die;
?>