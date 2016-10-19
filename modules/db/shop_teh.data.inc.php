<?
if ($_CORE->IS_ADMIN && $_CORE->CURR_TPL == 'admin') {
	unset($_SESSION['onpage_def'][$_KAT['KUR_ALIAS']]);
	$_KAT['onpage_def'][$_KAT['KUR_ALIAS']]	= (empty($_GET['onpage'][$_KAT['KUR_ALIAS']]))?25:$_GET['onpage'][$_KAT['KUR_ALIAS']];
}
$FORM_ORDER	= ' ORDER BY id ';

if (!$_CORE->IS_ADMIN) {
	$FORM_WHERE = " AND (hidden != 1 OR hidden IS NULL) AND doc!='' ";
	$FORM_ORDER	= "ORDER BY price ";
	$FORM_ORDER_FIELD = 'price';
}else{
	$FORM_WHERE = '';
}


$_KAT[$_KAT['KUR_ALIAS']]['IMPORT'] = array('id', 'name', 'price', 'price_opt', 'weight', 'size', 'artikul', 'madeby', 'nalich','bu');
$_KAT[$_KAT['KUR_ALIAS']]['IMPORT_WITH_TITLES'] = true;

global $FORM_IMPORTIMG;
$FORM_IMPORTIMG = 'true';


$FORM_DATA= array (
   'hidden' => 
  array (
    'field_name' => 'hidden',
    'name' => 'form[hidden]',
    'title' => 'Не показывать',
    'must' => 0,
    'maxlen' => 20,
    'type' => 'checkbox',
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
  'new' => // for multiload images
  array (
    'field_name' => 'new',
    'name' => 'form[new]',
    'title' => 'new',
    'must' => 0,
    'maxlen' => 20,
    'type' => 'hidden',
  ),
	'name' => 
  array (
    'field_name' => 'name',
    'name' => 'form[name]',
    'title' => 'Наименование',
    'must' => 1,
    'maxlen' => 150,
    'type' => 'textbox',
		'logic'	=> 'OR',
		'search' =>	"	LIKE '%%%s%%'",
  ),
   'bu' => 
  array (
    'field_name' => 'bu',
    'name' => 'form[bu]',
    'title' => 'Б/У ?',
    'must' => 0,
    'maxlen' => 20,
    'type' => 'checkbox',
  ),
	'alias' => 
  array (
    'field_name' => 'alias',
    'name' => 'form[alias]',
    'title' => 'alias',
    'must' => 0,
    'maxlen' => 255,
    'type' => 'hidden',
  ),
  'price' => 
  array (
    'field_name' => 'price',
    'name' => 'form[price]',
    'title' => 'Цена',
    'must' => 0,
    'maxlen' => 9,
		'default'	=> 0,
    'type' => 'textbox',
  ),
/*  'price_opt' => 
  array (
    'field_name' => 'price_opt',
    'name' => 'form[price_opt]',
    'title' => 'Цена (опт)',
    'must' => 0,
    'maxlen' => 9,
		'default'	=> 0,
    'type' => 'textbox',
  ),
  'weight' => 
  array (
    'field_name' => 'weight',
    'name' => 'form[weight]',
    'title' => 'Вес',
    'must' => 0,
    'maxlen' => 9,
    'type' => 'textbox',
  ),
  'size' => 
  array (
    'field_name' => 'size',
    'name' => 'form[size]',
    'title' => 'Размер',
    'must' => 0,
    'maxlen' => 64,
    'type' => 'textbox',
  ),*/
  'artikul' => 
  array (
    'field_name' => 'artikul',
    'name' => 'form[artikul]',
    'title' => 'Модель',
    'must' => '0',
    'maxlen' => '255',
    'type' => 'textbox',
  ),
  'nalich' => 
  array (
    'field_name' => 'nalich',
    'name' => 'form[nalich]',
    'title' => 'В наличии',
    'must' => 0,
    'maxlen' => 20,
    'type' => 'select',
		'arr'	=> array( 
              1=>'В салоне по адресу: г.Н.Новгород, пр. Гагарина д.66',
              2=>'В салоне по адресу: г.Н.Новгород, ул. Родионова д.17', 
              0=>'Под заказ' 
            ),
  ),
	'madeby' => 
  array (
    'field_name' => 'madeby',
    'name' => 'form[madeby]',
    'title' => 'Производитель',
    'must' => 0,
    'maxlen' => 255,
    'type' => 'textbox',
  ),
  'cont' => 
  array (
    'field_name' => 'cont',
    'name' => 'form[cont]',
    'title' => 'Описание товара',
    'must' => '0',
    'maxlen' => '65535',
    'type' => 'textarea',
		'style' => 'width:100%',
    'rows' => '10',
		'wysiwyg'	=> 'tinymce',
),
  'type_icon' => 
  array (
    'field_name' => 'type_icon',
    'name' => 'form[type_icon]',
    'title' => 'Тип иконки',
    'must' => '0',
    'maxlen' => '255',
    'type' => 'select',
		'arr'	=> array( 
              0=>'', 
              1=>'Premium',
              2=>'хит продаж', 
              3=>'акция' 
            ),
 		'style' => 'width:100%',
 		'logic' => 'AND'		
  ),
'doc' => array(
			'field_name' => 'doc', // должно совпадать с 'name'!!!
			'name'	=> 'doc',
			'title' => 'Фото',
			'admwidth' => 500,
			'hardwidth' => 1000,
			'hardheight' => 1000,
			'maxsize'	=> 1000000,
			'type'	=> 'photo',
			'sub_type'	=> 'photo',
			'newname_func'	=> 'get_file_name("doc")',
			'path'	    => KAT::get_data_link( '/f_'.$_KAT['KUR_ALIAS'], $dir, KAT_LOOKIG_DATA_DIR ),
			'abspath'	=> KAT::get_data_path( '/f_'.$_KAT['KUR_ALIAS'], $dir, KAT_LOOKIG_DATA_DIR ),
	),
'doc1' => array(
			'field_name' => 'doc1', // должно совпадать с 'name'!!!
			'name'	=> 'doc1',
			'title' => 'Фото',
			'admwidth' => 500,
			'hardwidth' => 1000,
			'hardheight' => 1000,
			'maxsize'	=> 1000000,
			'type'	=> 'photo',
			'sub_type'	=> 'photo',
			'newname_func'	=> 'get_file_name("doc1")',
			'path'	    => KAT::get_data_link( '/f_'.$_KAT['KUR_ALIAS'], $dir, KAT_LOOKIG_DATA_DIR ),
			'abspath'	=> KAT::get_data_path( '/f_'.$_KAT['KUR_ALIAS'], $dir, KAT_LOOKIG_DATA_DIR ),
	),
'doc2' => array(
			'field_name' => 'doc2', // должно совпадать с 'name'!!!
			'name'	=> 'doc2',
			'title' => 'Фото',
			'admwidth' => 500,
			'hardwidth' => 1000,
			'hardheight' => 1000,
			'maxsize'	=> 1000000,
			'type'	=> 'photo',
			'sub_type'	=> 'photo',
			'newname_func'	=> 'get_file_name("doc2")',
			'path'	    => KAT::get_data_link( '/f_'.$_KAT['KUR_ALIAS'], $dir, KAT_LOOKIG_DATA_DIR ),
			'abspath'	=> KAT::get_data_path( '/f_'.$_KAT['KUR_ALIAS'], $dir, KAT_LOOKIG_DATA_DIR ),
	),
);
//сортировка при выводе в админском режиме added 22.02.06
    $orderby = (empty( $_GET['orderby'] ))?'none':$_GET['orderby'];

    if( in_array(  $orderby, array_keys( $FORM_DATA  )))
	  {
		  $orderby =' ORDER BY '.$orderby;
        if( !empty($_GET['sort']) ){ // сортировка изменена update 18.10.2012 
          switch($_GET['sort']){
            case "desc":
              $orderby .=' DESC ';
            break;
            case "asc":
            default:
              $orderby = 'none';
            break;
          }
        }else{
        	$orderby = 'none';
        }
       if($orderby != 'none') {

			$FORM_ORDER = $orderby;
		
      	}
	  } 
	  
//endof сортировка 
?>