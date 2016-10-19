<?
global $_CONF;

if (!$_CORE->IS_ADMIN){
        $FORM_ORDER	= ' ORDER BY RAND() '; 
}  else {  
    $FORM_ORDER	= '  ';
}
 if (!$_CORE->IS_ADMIN){   
    $FORM_WHERE	= "AND (hidden != 1 OR hidden IS NULL) ";
 }else{
    $FORM_WHERE	= "";
 }
    
    
    $FORM_DATA= array (
	'delimiter1' => array(
		'type' 		=> 'delimeter_line', 
		'subtype' 	=> 'tabs',
		'title' 	=> 'Общие настройки'
	),
      'id' => 
      array (
        'field_name' => 'id',
        'name' => 'form[id]',
        'title' => 'id',
        'must' => 0,
        'maxlen' => 20,
        'type' => 'hidden',
      ),
      'alias' => 
      array (
        'field_name' => 'alias',
        'name' => 'form[alias]',
        'title' => Main::get_lang_str('alias', 'db'),
        'must' => 0,
        'maxlen' => 20,
        'type' => 'hidden',
      ),
      'ts'	=>
      array (
        'field_name' => 'ts',
        'name' => 'form[ts]',
        'title' => Main::get_lang_str('data', 'db'),
        'must' => 1,
    	'size' => 15,
        'maxlen' => 255,
        'type' => 'hidden',
        'readonly' => 'true',
    	'default'	=> date('Y-m-d')
      ),
     'name'	=>
      array (
        'field_name' => 'name',
        'name' => 'form[name]',
        'title' => 'Название пакета настроек',
        'must' => 1,
    	'style' => 'width:100%',
        'maxlen' => 255,
        'type' => 'textbox',
      ),      
     'sitename'	=>
      array (
        'field_name' => 'sitename',
        'name' => 'form[sitename]',
        'title' => 'Название проекта',
        'must' => 0,
    	'style' => 'width:100%',
        'maxlen' => 255,
        'type' => 'textbox',
      ),
     'phone'	=>
      array (
        'field_name' => 'phone',
        'name' => 'form[phone]',
        'title' => 'Контактный телефон',
        'must' => 0,
    	'style' => 'width:100%',
        'maxlen' => 255,
        'type' => 'textbox',
      ),
     'email'	=>
      array (
        'field_name' => 'email',
        'name' => 'form[email]',
        'title' => 'Контактный E-mail',
        'must' => 0,
    	'style' => 'width:100%',
        'maxlen' => 255,
        'type' => 'textbox',
      ),
    'doc' => array(
    			'field_name' => 'doc', // должно совпадать с 'name'!!!
    			'name'	=> 'doc',
    			'title' => 'Логотип сайта',
    			'maxwidth' => 1000,
    			'admwidth' => 150,
    			'maxheight' => 1000,
    			'type'	=> 'photo',
    			'sub_type'	=> 'photo',
    			'newname_func'	=> 'get_file_name("logo")',
    			'path'	=> KAT::get_data_link( '/f_'.$_KAT['KUR_ALIAS'], $dir, KAT_LOOKIG_DATA_DIR ),
    			'abspath'	=> KAT::get_data_path('/f_'.$_KAT['KUR_ALIAS'], $dir, KAT_LOOKIG_DATA_DIR),
    	),
    'doc1' => array(
    			'field_name' => 'doc1', // должно совпадать с 'name'!!!
    			'name'	=> 'doc1',
    			'title' => 'Фоновое изображение сайта',
    			'maxwidth' => 1000,
    			'admwidth' => 150,
    			'maxheight' => 1000,
    			'type'	=> 'photo',
    			'sub_type'	=> 'photo',
    			'newname_func'	=> 'get_file_name("backgraund")',
    			'path'	=> KAT::get_data_link( '/f_'.$_KAT['KUR_ALIAS'], $dir, KAT_LOOKIG_DATA_DIR ),
    			'abspath'	=> KAT::get_data_path('/f_'.$_KAT['KUR_ALIAS'], $dir, KAT_LOOKIG_DATA_DIR),
    	),
    'doc2' => array(
    			'field_name' => 'doc2', // должно совпадать с 'name'!!!
    			'name'	=> 'doc2',
    			'title' => 'Фон левого меню',
    			'maxwidth' => 1000,
    			'admwidth' => 150,
    			'maxheight' => 1000,
    			'type'	=> 'photo',
    			'sub_type'	=> 'photo',
    			'newname_func'	=> 'get_file_name("leftmenu")',
    			'path'	=> KAT::get_data_link( '/f_'.$_KAT['KUR_ALIAS'], $dir, KAT_LOOKIG_DATA_DIR ),
    			'abspath'	=> KAT::get_data_path('/f_'.$_KAT['KUR_ALIAS'], $dir, KAT_LOOKIG_DATA_DIR),
    	),
     'color1'	=>
      array (
        'field_name' => 'color1',
        'name' => 'form[color1]',
        'title' => 'Цвет ссылок',
        'must' => 0,
    	'style' => 'width:70px; float:left;',
        'maxlen' => 255,
        'type' => 'color',
      ),
     'color2'	=>
      array (
        'field_name' => 'color2',
        'name' => 'form[color2]',
        'title' => 'Цвет выделения',
        'must' => 0,
    	'style' => 'width:70px; float:left;',
        'maxlen' => 255,
        'type' => 'color',
      ),
     'color3'	=>
      array (
        'field_name' => 'color3',
        'name' => 'form[color3]',
        'title' => 'Цвет фона',
        'must' => 0,
    	'style' => 'width:70px; float:left;',
        'maxlen' => 255,
        'type' => 'color',
      ),
      'hidden'	=>
      array (
        'field_name' => 'hidden',
        'name' => 'form[hidden]',
        'title' => Main::get_lang_str('ne_publ', 'db'),
        'must' => 0,
        'maxlen' => 1,
        'type' => 'checkbox',
      ),
	'delimiter2' => array(
		'type' 		=> 'delimeter_line',
		'subtype' 	=> 'tabs',
		'title' 	=> 'Промокоды'
	),
	'discount' =>
	array (
		'field_name' => 'discount',
		'name' => 'form[discount]',
		'title' => 'Скидка',
		'must' => 0,
		'size' => 50,
		'maxlen' => 255,
		'type' => 'textbox',
	),
	'anons_discount' =>
	array (
		'field_name' => 'anons_discount',
		'name' => 'form[anons_discount]',
		'title' => 'Текст для ссылки на скидку',
		'must' => 0,
		'size' => 50,
		'maxlen' => 255,
		'type' => 'textbox',
	),
	'text_discount' =>
	array (
		'field_name' => 'text_discount',
		'name' => 'form[text_discount]',
		'title' => 'Описание акции',
		'must' => 0,
		'style' => 'width:100%',
		'maxlen' => '65535',
		'type' => 'textarea',
		'style' => 'width:100%',
		'rows' => '30',
		'wysiwyg'	=> 'tinymce'
	),
	'text_sms' =>
	 array (
		'field_name' => 'text_sms',
		'name' => 'form[text_sms]',
		'title' => 'Текст SMS',
		'must' => 0,
		'style' => 'width:100%',
		'maxlen' => 130,
		'rows' =>5,
		'type' => 'textarea',
	),

	'project' =>
	array (
		'field_name' => 'project',
		'name' => 'form[project]',
		'title' => 'Проект',
		'must' => 0,
		'size' => 50,
		'maxlen' => 255,
		'type' => 'textbox',
	),
	'key' =>
	array (
		'field_name' => 'key',
		'name' => 'form[key]',
		'title' => 'API key',
		'must' => 0,
		'size' => 50,
		'maxlen' => 255,
		'type' => 'textbox',
	),
	'from' =>
	array (
		'field_name' => 'from',
		'name' => 'form[from]',
		'title' => 'Отправитель',
		'must' => 0,
		'size' => 50,
		'maxlen' => 255,
		'type' => 'textbox',
	),
	'delimiter3' => array(
		'type' 		=> 'delimeter_line',
		'subtype' 	=> 'tabs',
		'title' 	=> 'Шаблон вывода'
	),
	'head' =>
	array (
		'field_name' => 'head',
		'name' 		=> 'form[head]',
		'title' 	=> 'Вставка в &lt;HEAD>',
		'must' 		=> 0,
		'style' 	=> 'width:100%',
		'maxlen' 	=> 5000,
		'rows' 		=>5,
		'type' 		=> 'textarea'
	),
	'foot' =>
	array (
		'field_name' => 'foot',
		'name' => 'form[foot]',
		'title' => 'Вставка в конце кода',
		'must' => 0,
		'style' => 'width:100%',
		'maxlen' => 5000,
		'rows' =>5,
		'type' => 'textarea'
	)
);
?>
