<?php

	include "../../../core_st.php";
	if (!$_CORE->dll_load('class.DBCQ'))
	die ($_CORE->error_msg());
	$tableName = $_POST["tableName"];
	$folder = $_POST["local"];
	$what  = "*";
	$from  = $tableName;
	$where = "new = 1";
	$tail  = " order by id desc";
	$res = SQL::sel( $what, $from, $where, $tail);
		if ($res->NumRows > 0) {
			echo '<form><table cellpadding="0" cellspacing="0" border="0">';
            for ($i = 0; $i < $res->NumRows; $i++) {
                $res->FetchArray($i,1);
                $arr = $res->FetchArray;
				echo '<tr><td><img src="'.$folder."/".$arr['doc'].'" width="90" style="margin:10px;" ></td>';
				echo '<td><textarea rows="5" cols="50" style="margin:10px;"></textarea></td>';
				echo '<td><img src="/i/cancel.png" style="margin:10px;" ></td></tr>';
				//echo "<pre>"; print_r($arr); echo "</pre>";
            }
			echo '<tr><td style="text-align:right;" colspan="3"><input type="button" name="save" value="Сохранить"></td></tr>';
			echo "</table></form>";
			 die();
		}
	?>
