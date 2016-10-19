<?php set_time_limit(300);
	ini_set("memory_limit", "1000M");
function watermark_image($oldimage_name, $new_image_name){

	// получаем размеры исходного изображения
	list($owidth,$oheight,$ext) = getimagesize($oldimage_name);
	// задаем размеры для выходного изображения 
	$width = $owidth;
	$height = $oheight; 
	
	if($owidth){
		$wm_size = intval($owidth/7)."x".intval($owidth/7);
	}
	if(intval($owidth/7) > 500) $wm_size = "500x500";
	$image_path = 'http://'.$_SERVER['SERVER_NAME'].'/reimg/templates/def/img/'.$wm_size.'/'."watermark.png";
	// создаем выходное изображение размерами, указанными выше
	$im = imagecreatetruecolor($width, $height);
	
	if($ext != 2 && $ext != 3) return false;
	if($ext == 2)
		$img_src = imagecreatefromjpeg($oldimage_name);
	if($ext == 3)
		$img_src = imageCreateFromPNG($oldimage_name);
	// наложение на выходное изображение, исходного
	imagecopyresampled($im, $img_src, 0, 0, 0, 0, $width, $height, $owidth, $oheight);
	$watermark = imagecreatefrompng($image_path);
	// получаем размеры водяного знака
	list($w_width, $w_height) = getimagesize($image_path);
	// определяем позицию расположения водяного знака 
	$pos_x = $width - $w_width - (int)$width*0.015;
	$pos_y = $height - $w_height - (int)$height*0.015;
	// накладываем водяной знак
	imagecopy($im, $watermark, $pos_x, $pos_y, 0, 0, $w_width, $w_height);
	// сохраняем выходное изображение, уже с водяным знаком в формате jpg и качеством 100
	imagejpeg($im, $new_image_name, 80);
	// уничтожаем изображения
	imagedestroy($im);
	//unlink($oldimage_name);
	return true;
}

/*ob_start();*/
/*$log_tbl = DB_TABLE_PREFIX."log_watermark";
	// logs
	SQL::query ( 'CREATE TABLE IF NOT EXISTS '.$log_tbl.' (
		`id` bigint NOT NULL AUTO_INCREMENT,
		`img_name` varchar(255) NOT NULL,
		PRIMARY KEY (`id`)
	) ENGINE=MyISAM DEFAULT CHARSET=cp1251;');*/
	
	$dir = $_SERVER['DOCUMENT_ROOT'].'/data/db/uploads/';
/*	$files = array();
	$getfiles = SQL::getall('img_name', $log_tbl);
	if(is_array($getfiles) && count($getfiles))
	foreach($getfiles as $getfile){
		$files[] = $getfile['img_name'];
	}*/
	$item = 0;
	if ($handle = opendir($dir)){
		while (false !== ($file = readdir($handle))){
			if (is_file($dir.$file) && !in_array($file, array('.','..'))) {
				$path =$dir.$file;
				$newpath =$_SERVER['DOCUMENT_ROOT'].'/data/db/f_all_items'.'/'.$file;
				$file_info = explode('.',basename($file));
				$ext = array_pop($file_info);
				$file = implode('.',$file_info);
				$img_name = $file.".".$ext;
				if($ext != 'csv' && $ext != 'zip' /*&& in_array($img_name,$files) === false && !strstr($file, '_1') && !strstr($file, '_2')*/){

					
					$res = watermark_image($path,$newpath);
					if($res){
						echo "<li>".$img_name."<br>";
						unlink($path);
					}else{
						echo "<li>".'<span style="color:red;">'.$img_name." - Ошибка: неверный тип файла.</span><br>";
					}
                    $set = "doc = '".$img_name."'";
					SQL::upd(DB_TABLE_PREFIX."items", $set ,"artikul_lat='".$file."'");
					// SQL::ins($log_tbl, "`img_name`", "'".$img_name."'", DEBUG);
					$item++;
					
				}
			}
			// Установим лимит 			
			 if($item == 10) break;
		}
	}
	if($item > 0) cmd('reimg/clearhash');
/*	$cont = ob_get_contents();
	global $_CORE;
	$_CORE->dll_load('class.lMail');
	$dmail['body'] 		= $cont;
	$dmail['name']		= 'GrandNN';
	$dmail['email']		= TO;
	$dmail['subject'] 	= 'Result execute script Watermark на '.$_SERVER['HTTP_HOST'];
	$dmail['type']		= 'html';
	$dmail['mailto'] 	= 'denis.ulyusov.startupmilk@gmail.com';
	lMail::send($dmail);*/
?>