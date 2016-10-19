<?
$FORM_DATA= array (

//  'ts'	=>
//  array (
//    'field_name' => 'ts',
//    'name' => 'form[ts]',
//    'title' => 'Дата',
//    'must' => 0,
//	'size' => 15,
//    'maxlen' => 255,
//    'type' => 'textdate',
//	'default'	=> date('Y-m-d'),
//  ),  
	'delimiter1' => array(
		'type' 		=> 'delimeter_line',
		'subtype' 	=> 'tabs',
		'title' 	=> 'Содержание'
	),
	'title' => 
	array (
		'field_name' => 'title',
		'name' => 'form[title]',
		'title' => 'Заголовок',
		'maxlen' => '255',
		'must' => '1',
		'style' => 'width:100%',
		'type' => 'textbox',
		'readonly' => 0,
	),
	'anons' => 
	array (
		'field_name' => 'anons',
		'name' => 'form[anons]',
		'title' => 'Анонс',
		'maxlen' => '1024',
		'must' => '0',
		'type' => 'textarea',
		'style' => 'width:100%',
		'rows' => '4',
	),
	'cont' => 
	array (
		'field_name' => 'cont',
		'name' => 'form[cont]',
		'title' => 'Текст',
		'maxlen' => '5124',
		'must' => '0',
		'type' => 'textarea',
		'style' => 'width:100%',
		'rows' => '25',
		'wysiwyg'	=> 'tinymce',
	),
	'nonformat' => 
	array (
		'field_name' => 'nonformat',
		'name' => 'form[nonformat]',
		'title' => 'Неформатированный текст',
		'maxlen' => '1024',
		'must' => '0',
		'type' => 'textarea',
		'style' => 'width:100%',
		'rows' => '4',
	),
   'show_region' => 
	  array (
		'field_name' => 'show_region',
		'name' => 'form[show_region]',
		'title' => 'Показывать в других регионах',
		'must' => 0,
		'maxlen' => 20,
		'type' => 'checkbox',
	  ),	
	'doc4' => array(
			'field_name' => 'doc4', // должно совпадать с 'name'!!!
			'name'	=> 'doc4',
			'title' => 'Иконка',
			'type'	=> 'photo',
			'admwidth' => '100',
			'admheight' => '100',
			'sub_type'	=> 'photo',
			'newname_func'	=> 'DOCTXT::get_file_name("'.time().'icon", false)',
			'path'	=> DOCTXT::set_data_link( str_replace('/doctxt/','',$form['path']).'icon', $file ), 
			'abspath'	=> DOCTXT::set_data_path(str_replace('/doctxt/','',$form['path']).'icon', $file),
		),
	
	'doc' => array(
			'field_name' => 'doc', // должно совпадать с 'name'!!!
			'name'	=> 'doc',
			'title' => 'Фото1',
			'type'	=> 'photo',
			'admwidth' => '300',
			'sub_type'	=> 'photo',
			'newname_func'	=> 'DOCTXT::get_file_name("'.time().'photo", false)',
			'path'	=> DOCTXT::set_data_link( str_replace('/doctxt/','',$form['path']).'file', $file ), 
			'abspath'	=> DOCTXT::set_data_path(str_replace('/doctxt/','',$form['path']).'file', $file),
		),
	'doc2' => array(
			'field_name' => 'doc2', // должно совпадать с 'name'!!!
			'name'	=> 'doc2',
			'title' => 'Фото2',
			'type'	=> 'photo',
			'admwidth' => '300',
			'sub_type'	=> 'photo',
			'newname_func'	=> 'DOCTXT::get_file_name("'.time().'photo2", false)',
			'path'	=> DOCTXT::set_data_link( str_replace('/doctxt/','',$form['path']).'file2', $file ), 
			'abspath'	=> DOCTXT::set_data_path(str_replace('/doctxt/','',$form['path']).'file2', $file),
		),
	'doc3' => array(
			'field_name' => 'doc3', // должно совпадать с 'name'!!!
			'name'	=> 'doc3',
			'title' => 'Фото3',
			'type'	=> 'photo',
			'admwidth' => '300',
			'sub_type'	=> 'photo',
			'newname_func'	=> 'DOCTXT::get_file_name("'.time().'photo3", false)',
			'path'	=> DOCTXT::set_data_link( str_replace('/doctxt/','',$form['path']).'file3', $file ), 
			'abspath'	=> DOCTXT::set_data_path(str_replace('/doctxt/','',$form['path']).'file3', $file),
		),
	'doc1' => array(
			'field_name' => 'doc1', // должно совпадать с 'name'!!!
			'name'	=> 'doc1',
			'title' => 'Прикрепить файл',
			'type'	=> 'photo',
			'sub_type'	=> 'doc',
			'newname_func'	=> 'DOCTXT::get_file_name("doc", false)',
			'path'	=> DOCTXT::set_data_link( str_replace('/doctxt/','',$form['path']).'file', $file ), 
			'abspath'	=> DOCTXT::set_data_path(str_replace('/doctxt/','',$form['path']).'file', $file),
		),	
	'doc1_title' => 
	array (
		'field_name' => 'doc1_title',
		'name' => 'form[doc1_title]',
		'title' => 'Название файла',
		'maxlen' => '255',
		'must' => '0',
		'style' => 'width:100%',
		'type' => 'textbox',
		'readonly' => 0,
	),
);
?>
