<h1>Найдены файлы формата GIF</h1>
<?php
global $_KAT,$_CORE, $FORM_DATA;
	$dir = $_SERVER['DOCUMENT_ROOT'].'/data/db/f_all_items';
	$files_img = '';
	if ($handle = opendir($dir))
		while (false !== ($file = readdir($handle))){
			if (is_file($dir.'/'.$file) && !in_array($file, array('.','..'))) {
				$file_link = $dir.'/'.$file;
				$file_info = explode('.',basename($file));
				$ext = array_pop($file_info);
				$file = implode('.',$file_info);
				if($ext != 'csv' ){
					$img_arr = getimagesize($file_link);
					if(is_array($img_arr) && $img_arr[2] == 1 )
						$files_img .= $file.".".$ext."<br />";
				}
			}
		}
	echo $files_img;
		

die;
?>