<?php set_time_limit(300);
	// получим список всех артикулов в базе
	$all_artikuls = SQL::getall('*',DB_TABLE_PREFIX.'items', "doc=''"," group by artikul" );
	$artikuls = $no_photo = array();
	
	if(is_array($all_artikuls) && count($all_artikuls))
		foreach($all_artikuls as $row){
			$value = trim($row['artikul']);
			$transart = str_replace(array("#"," "),array('','_'),trim(strtolower(STR::translit(str_replace("№",'N',$value)))));
			$fdir = '/data/db/f_all_items';
			$set = '';
			if (is_file($_SERVER['DOCUMENT_ROOT'].$fdir.'/'.$transart.'.jpg') ) {
				$set = "doc = '".$transart.".jpg'";
				$file_upd_ts = filemtime($_SERVER['DOCUMENT_ROOT'].$fdir.'/'.$transart.'.jpg');
				/* оключаем обновление даты при загрузке фотки
                if(time() - $file_upd_ts <= 3600*24*14){
					$set .= ', date_add = '.$file_upd_ts;
				}
                */
			}elseif( is_file($_SERVER['DOCUMENT_ROOT'].$fdir.'/'.$transart.'.JPG') ) {
				$set = "doc = '".$transart.".JPG'";
				$file_upd_ts = filemtime($_SERVER['DOCUMENT_ROOT'].$fdir.'/'.$transart.'.JPG');
				/*  оключаем обновление даты при загрузке фотки
                if(time() - $file_upd_ts <= 3600*24*14){
					$set .= ', date_add = '.$file_upd_ts;
				}*/
			}
			if(!empty($set)){
				
				$artikuls[$transart] = $row['artikul'];
				$result = SQL::upd(DB_TABLE_PREFIX."items", $set ,"artikul='".$row['artikul']."'");
				if(!empty($result->ErrorQuery)){ echo "<pre>"; print_r($result); echo "</pre>";}
			}else{
				$no_photo[$transart] = $row['artikul'];
			}
		}
	$dir = $_SERVER['DOCUMENT_ROOT'].'/data/db/f_all_items';
	$files_img = '';
	SQL::truncate(DB_TABLE_PREFIX."imgnoarticul");
	if ($handle = opendir($dir))
		while (false !== ($file = readdir($handle))){
			if (is_file($dir.'/'.$file) && !in_array($file, array('.','..'))) {
				$file_info = explode('.',basename($file));
				$ext = array_pop($file_info);
				$file = implode('.',$file_info);
				if($ext != 'csv' ){
					if(strstr($file, '_1')){
						$where = "doc = '".str_replace('_1','',$file).".".$ext."'";
					}elseif(strstr($file, '_2')){
						$where = "doc = '".str_replace('_2','',$file).".".$ext."'";
					}else{
						$where = "doc = '".$file.".".$ext."'";
					}
					if(SQL::getval('count(*)',DB_TABLE_PREFIX.'items', $where) == 0){
						$files_img .= "<br>".$file.".".$ext;
						$img_name = $file.".".$ext;
						$img_alias = STR::translit($img_name, 64, 5, true);
						SQL::ins(DB_TABLE_PREFIX."imgnoarticul", "`ts`,`name`,`alias`,`doc`", "'".date('Y-m-d')."','".$img_name."','".$img_alias."','".$img_name."'", DEBUG);
						//unlink($dir.'/'.$file.".".$ext);
					}
				}
			}
		}
	if(!empty($files_img)){?>
		<h2>обновлен список imgnoarticul</h2>
		<table border="1">
			<tr>
				<td width="30%" valign="top" >Не нашли артикул<br /><?=$files_img;?></td>
				<td width="30%" valign="top" >Артикулы без фото<br />
				<? foreach($no_photo as $art => $item){
					echo $art.' => '.$item.'<br />'; 
				} ?>
				</td>
				<td width="30%" valign="top" >Добавлены новые фото в БД<br /><? foreach($artikuls as $art => $item){echo $art.' => '.$item.'<br />'; } ?></td>
			</tr>
		</table>
<?	} ?>
