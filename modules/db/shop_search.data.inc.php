<?
$FORM_ORDER	= 'group by name  ORDER BY id ';

	$FORM_WHERE = " AND (hidden != 1 OR hidden IS NULL) AND doc!='' ";
  if($_REQUEST['form']['ins']=='Без вставки'){ 
    $FORM_WHERE .= " AND (ins = '' OR ins ='Без вставки' OR ins='0') ";
    unset($_REQUEST['form']['ins']);
  }
	$FORM_ORDER	= "ORDER BY (price*REPLACE(weight, ',', '.')) ";
	$FORM_ORDER_FIELD = 'price';
  
  if(!empty($_REQUEST['gvstav']) && (int)$_REQUEST['gvstav']){
    $gvstav = (int)$_REQUEST['gvstav'];
    $FORM_FROM = " AS t1 ";
    if($gvstav==1){
      $FORM_WHERE .= " AND (t1.ins=0 OR t1.ins = '' OR (SELECT count(*) FROM ".DB_TABLE_PREFIX."shop_ins as t2 WHERE t2.group = '".$gvstav."' AND t2.name = t1.ins )>0) ";
    }else{
      $FORM_WHERE .= " AND (SELECT count(*) FROM ".DB_TABLE_PREFIX."shop_ins as t2 WHERE t2.group = '".$gvstav."' AND t2.name = t1.ins )>0 ";
    }
  }
  if(!empty($_REQUEST['gprice']) && (int)$_REQUEST['gprice']){
    $gprice = (int)$_REQUEST['gprice'];
    switch($gprice){
      case 1:
        $_REQUEST['price_from'] = 5000;
        $_REQUEST['price_to']   = 10000;
      break;
      case 2:
        $_REQUEST['price_from'] = 10000;
        $_REQUEST['price_to']   = 20000;
      break;
      case 3:
        $_REQUEST['price_from'] = 20000;
        $_REQUEST['price_to']   = 50000;
      break;
      case 4:
        $_REQUEST['price_from'] = 0;
        $_REQUEST['price_to']   = 5000;
      break;
      case 5:
        $_REQUEST['price_from'] = 50000;
        $_REQUEST['price_to']   = 9999999999;
      break;
      default:
      break;
    }
  }
  if(!empty($_REQUEST['nalich']) && (int)$_REQUEST['nalich']){
    $_REQUEST['nalich'] = (int)$_REQUEST['nalich'];
    $FORM_WHERE .= " AND nalich = ".$_REQUEST['nalich']." ";
  } 
    // если б/у и новые
  if($_REQUEST['form']['bu']=='2'){
    $FORM_WHERE .= " AND (bu = '' OR bu ='1' OR ins IS NULL) ";
  }elseif(isset($_REQUEST['form']['bu']) && $_REQUEST['form']['bu']!=1){
    unset($_REQUEST['form']['bu']);
  } 

  if(isset($_REQUEST['form']['metal']) && $_REQUEST['form']['metal']==''){
      unset($_REQUEST['form']['metal']);
  } 


$_KAT[$_KAT['KUR_ALIAS']]['IMPORT'] = array('id', 'name', 'price', 'price_opt', 'weight', 'size', 'artikul', 'ins' , 'madeby', 'metal','nalich','bu');
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
		'logic'	=> 'AND',
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
//  'razdel' => 
//  array (
//    'field_name' => 'razdel',
//    'name' => 'form[razdel]',
//    'title' => 'Раздел товара',
//    'must' => 1,
//    'maxlen' => 6,
//	'class'	=> 'hide',
//    'type' => 'select_from_table',
//	'ex_table' => DB_TABLE_PREFIX.'razdel',
//	'id_ex_table' => 'name',
//	'ex_table_field' => 'name',
//  ),
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
    'title' => 'Цена за грамм',
    'must' => 0,
    'maxlen' => 9,
		'default'	=> 0,
    'type' => 'textbox',
  ),
  'price_opt' => 
  array (
    'field_name' => 'price_opt',
    'name' => 'form[price_opt]',
    'title' => 'Цена за грамм (опт)',
    'must' => 0,
    'maxlen' => 9,
		'default'	=> 0,
    'type' => 'textbox',
  ),
  'weight' => 
  array (
    'field_name' => 'weight',
    'name' => 'form[weight]',
    'title' => 'Средний вес',
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
    'maxlen' => 9,
    'type' => 'textbox',
  ),
  'artikul' => 
  array (
    'field_name' => 'artikul',
    'name' => 'form[artikul]',
    'title' => 'Артикул',
    'must' => '0',
    'maxlen' => '255',
    'type' => 'textbox',
    'cols' => '50',
    'rows' => '5',
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
	'ins' => 
  array (
    'field_name' => 'ins',
    'name' => 'form[ins]',
    'title' => 'Вставка',
    'must' => 0,
    'maxlen' => 255,
    'type' => 'textbox',
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
	'metal' => 
  array (
    'field_name' => 'metal',
    'name' => 'form[metal]',
    'title' => 'Вид металла',
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
	'tab' => 
  array (
    'field_name' => 'tab',
    'name' => 'form[tab]',
    'title' => 'Таблица',
    'must' => 1,
    'maxlen' => 150,
    'type' => 'textbox',
		'logic'	=> 'AND',
		'search' =>	"	LIKE '%s%%'",
  ),
);

?>