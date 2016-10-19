<? SQL::query('SET SQL_BIG_SELECTS=1',0);
$FORM_WHERE = '';
if (!$_CORE->IS_ADMIN || $_CORE->CURR_TPL == 'def')
    $FORM_WHERE = " AND (hidden != 1 OR hidden IS NULL) ";
$_GET['form'] = $_REQUEST['form'];
// ���������� tagspage
$tagsPage = $_REQUEST['form'];
$cntTagsPage = count($tagsPage); 
if($cntTagsPage){
    foreach($tagsPage as $fieldName=>$fieldValue){
        switch($fieldName){
        case 'name':
            if (empty($fieldValue)){
                unset($_REQUEST['form']['name']);
            }else{
                    if( $searchName = SQL::getval('name_one',DB_TABLE_PREFIX.'type_products',"alias = '".$fieldValue."'")){
                    if(strpos($searchName,',')){
                        $arrname = explode(',',$searchName);
                        $FORM_WHERE .= " AND ("; 
                        foreach($arrname as $ik=>$name){
                            if($ik >0 ) $FORM_WHERE .= " OR ";
                            $FORM_WHERE .= " ".DB_TABLE_PREFIX . "items.name LIKE '".$name."%%'";
                        }
                        $FORM_WHERE .= " ) "; 
                        unset($_REQUEST['form'][$fieldName]);
                    }else{
                        $_REQUEST['form'][$fieldName] = $searchName;
                    }
                }
            }
            
        break;
        case 'gvstav':
            $gvstav = mysql_real_escape_string($fieldValue);
            if ($gvstav == 'noins'){
                $FORM_WHERE .= " AND " . DB_TABLE_PREFIX . "items.ins = '' ";
            }else{
                $ins_names = SQL::getall("`name`", DB_TABLE_PREFIX . "shop_ins", "`group` = '" .
                    $gvstav . "'");
                if (is_array($ins_names) && count($ins_names) > 0){
                    $add_where_ins = '';
                    foreach ($ins_names as $ins_name){
                        if (!empty($add_where_ins))
                            $add_where_ins .= " OR ";
                        $add_where_ins .= " ".DB_TABLE_PREFIX."items.ins LIKE '%%".$ins_name['name']."%%' ";
                    }
                    $FORM_WHERE .= " AND ( " . $add_where_ins . " ) ";
                }
            }
        break;
        
        case 'bu':
            if($fieldValue == 'novyie') $FORM_WHERE .= " AND " . DB_TABLE_PREFIX . "items.bu = 0 ";
            if($fieldValue == 'lombard') $FORM_WHERE .= " AND " . DB_TABLE_PREFIX . "items.bu = 1 ";
            unset($_REQUEST['form'][$fieldName]);
        break;
        case 'new':
            if($fieldValue == 'new') $FORM_WHERE .= " AND " . DB_TABLE_PREFIX . "items.new = 1 ";
            $_REQUEST['sort_by'] = (empty($_REQUEST['sort_by']))?'date_add':$_REQUEST['sort_by'];
            $_REQUEST['sort_order'] = (empty($_REQUEST['sort_order']))?'desc':$_REQUEST['sort_order'];
            unset($_REQUEST['form'][$fieldName]);
        break;
        case 'discount':
            if ($fieldValue == 'discount') {
              $FORM_WHERE .= " AND discount > 0 ";
            }unset($_REQUEST['form'][$fieldName]);
        case 'nalich':
            if($fieldValue == 'gagarina') $FORM_WHERE .= " AND " . DB_TABLE_PREFIX . "items.nalich = 1 ";
            if($fieldValue == 'rodionova') $FORM_WHERE .= " AND " . DB_TABLE_PREFIX . "items.nalich = 2 ";
            unset($_REQUEST['form'][$fieldName]);
        break;
        case 'probe':
            $_REQUEST['form'][$fieldName] = str_replace(array('zoloto','serebro'),array('au','ag'),$_REQUEST['form'][$fieldName]);
        break;
        case 'gprice':
            if (!empty($fieldValue) ){
                $gprice = mysql_real_escape_string($fieldValue);
                switch ($gprice)
                {
                    case '5000_10000':
                        $_REQUEST['full_price_from'] = 5000;
                        $_REQUEST['full_price_to'] = 10000;
                        break;
                    case '10000_20000':
                        $_REQUEST['full_price_from'] = 10000;
                        $_REQUEST['full_price_to'] = 20000;
                        break;
                    case '20000_50000':
                        $_REQUEST['full_price_from'] = 20000;
                        $_REQUEST['full_price_to'] = 50000;
                        break;
                    case 'do_5000':
                        $_REQUEST['full_price_from'] = 0;
                        $_REQUEST['full_price_to'] = 5000;
                        break;
                    case 'bolee_50000':
                        $_REQUEST['full_price_from'] = 50000;
                        $_REQUEST['full_price_to'] = 9999999999;
                        break;
                    default:
                        break;
                }
            }
        break;
        }
    }
    
}

////////////

if (!empty($_REQUEST['ajax']))
{
    $_REQUEST = STR::utf_to_win($_REQUEST);
    $_GET = $_REQUEST;
}
$_KAT[$_KAT['KUR_ALIAS']]['admin_search'] = array(
    'name',
    'num_series',
    'artikul');


$FORM_WHERE .= " AND doc != ''";

$FORM_FROM = " ";
$FORM_SELECT_BEFORE = DB_TABLE_PREFIX . "items.";
$FORM_SELECT = ", " . DB_TABLE_PREFIX . "items.id as id, " . DB_TABLE_PREFIX .
    'basket2items.status as status ';

$FORM_FROM .= " LEFT JOIN " . DB_TABLE_PREFIX . "basket2items ON " .
    DB_TABLE_PREFIX . "items.alias = " . DB_TABLE_PREFIX .
    "basket2items.item_alias ";
$FORM_WHERE .= " AND (" . DB_TABLE_PREFIX . "basket2items.status < 2 OR " .
    DB_TABLE_PREFIX . "basket2items.status IS NULL OR " . DB_TABLE_PREFIX .
    "basket2items.status = 4 ) ";

if ($_REQUEST['form']['ins'] == '��� �������')
{
    $FORM_WHERE .= " AND (ins = '' OR ins ='��� �������' OR ins='0') ";
    unset($_REQUEST['form']['ins']);
}

$FORM_ORDER = " group by artikul ORDER BY full_price ";

$FORM_ORDER_FIELD = 'full_price';


/*   if(!empty($_REQUEST['nalich']) && (int)$_REQUEST['nalich']){
$_REQUEST['nalich'] = (int)$_REQUEST['nalich'];
$FORM_WHERE .= " AND nalich = ".$_REQUEST['nalich']." ";
} 
*/ // ���� �/� � �����
if ($_REQUEST['form']['bu'] === '')
{ // ���
    unset($_REQUEST['form']['bu']);
}

if (isset($_REQUEST['form']['probe']) && empty($_REQUEST['form']['probe']))
{ // ���
    unset($_REQUEST['form']['probe']);
}

if (isset($_REQUEST['form']['nalich']) && empty($_REQUEST['form']['nalich']))
{ // ���
    unset($_REQUEST['form']['nalich']);
}

if (isset($_REQUEST['form']['metal']) && $_REQUEST['form']['metal'] == '')
{
    unset($_REQUEST['form']['metal']);
}


if (empty($_REQUEST['form']['size']))
{
    unset($_REQUEST['form']['size']);
}


//$_KAT[$_KAT['KUR_ALIAS']]['IMPORT'] = array('id', 'bu', 'type', 'name', 'artikul', 'probe', 'size', 'price', 'full_price', 'num_series', 'ins', 'nalich', 'madeby', 'cnt', 'weight',  'cont', 'type_icon', 'hidden'); // 'metal', 'price_opt',
global $FORM_IMPORTIMG, $FORM_IMPORT_TYPE;
$FORM_IMPORTIMG = 'true';
$FORM_IMPORT_TYPE = 'insert';
$_KAT[$_KAT['KUR_ALIAS']]['IMPORT'] = array(
    'id',
    'name',
    'madeby',
    'artikul',
    'price',
    'full_price',
    'num_series',
    'properties',
    'size',
    'probe',
    'nalich',
    'ins',
    'date_add',
    'width',
    'height',
    'cnt',
    'weight'); // 'metal', 'price_opt',
$_KAT[$_KAT['KUR_ALIAS']]['IMPORT_WITH_TITLES'] = true;


$FORM_DATA = array(
    'hidden' => array(
        'field_name' => 'hidden',
        'name' => 'form[hidden]',
        'title' => '�� ����������',
        'must' => 0,
        'maxlen' => 20,
        'type' => 'checkbox',
        ),
    'id' => array(
        'field_name' => 'id',
        'name' => 'form[id]',
        'title' => 'id',
        'must' => 0,
        'maxlen' => 20,
        'type' => 'textbox',
        ),
    'new' => // for multiload images
        array(
        'field_name' => 'new',
        'name' => 'form[new]',
        'title' => 'new',
        'must' => 0,
        'maxlen' => 20,
        'type' => 'hidden',
        ),
    'name' => array(
        'field_name' => 'name',
        'name' => 'form[name]',
        'title' => '������������',
        'must' => 1,
        'maxlen' => 150,
        'type' => 'textbox',
        'logic' => 'AND',
        'search' => "	LIKE '%s%%'",
        ),
    'bu' => array(
        'field_name' => 'bu',
        'name' => 'form[bu]',
        'title' => '�/� ?',
        'must' => 0,
        'maxlen' => 20,
        'type' => 'checkbox',
        ),
    //  'razdel' =>
    //  array (
    //    'field_name' => 'razdel',
    //    'name' => 'form[razdel]',
    //    'title' => '������ ������',
    //    'must' => 1,
    //    'maxlen' => 6,
    //	'class'	=> 'hide',
    //    'type' => 'select_from_table',
    //	'ex_table' => DB_TABLE_PREFIX.'razdel',
    //	'id_ex_table' => 'name',
    //	'ex_table_field' => 'name',
    //  ),
    'alias' => array(
        'field_name' => 'alias',
        'name' => 'form[alias]',
        'title' => 'alias',
        'must' => 0,
        'maxlen' => 255,
        'type' => 'hidden',
        ),
    'price' => array(
        'field_name' => 'price',
        'name' => 'form[price]',
        'title' => '���� �� �����',
        'must' => 0,
        'maxlen' => 9,
        'default' => 0,
        'type' => 'textbox',
        ),
    'full_price' => array(
        'field_name' => 'full_price',
        'name' => 'form[full_price]',
        'title' => '��������� ����',
        'must' => 0,
        'maxlen' => 9,
        'default' => 0,
        'type' => 'textbox',
        ),

    //  'price_opt' =>
    //  array (
    //    'field_name' => 'price_opt',
    //    'name' => 'form[price_opt]',
    //    'title' => '���� �� ����� (���)',
    //    'must' => 0,
    //    'maxlen' => 9,
    //		'default'	=> 0,
    //    'type' => 'textbox',
    //  ),
    'weight' => array(
        'field_name' => 'weight',
        'name' => 'form[weight]',
        'title' => '������� ���',
        'must' => 0,
        'maxlen' => 9,
        'type' => 'textbox',
        ),
    'width' => array(
        'field_name' => 'width',
        'name' => 'form[width]',
        'title' => '������',
        'must' => 0,
        'maxlen' => 9,
        'type' => 'textbox',
        ),
    'height' => array(
        'field_name' => 'height',
        'name' => 'form[height]',
        'title' => '������',
        'must' => 0,
        'maxlen' => 9,
        'type' => 'textbox',
        ),
    'size' => array(
        'field_name' => 'size',
        'name' => 'form[size]',
        'title' => '������',
        'must' => 0,
        'maxlen' => 9,
        'type' => 'textbox',
        ),
    'artikul' => array(
        'field_name' => 'artikul',
        'name' => 'form[artikul]',
        'title' => '�������',
        'must' => '0',
        'maxlen' => '255',
        'type' => 'textbox',
        'search' => "	LIKE '%%%s%%'",
        ),
    'num_series' => array(
        'field_name' => 'num_series',
        'name' => 'form[num_series]',
        'title' => '����� ������������',
        'must' => '0',
        'maxlen' => '255',
        'type' => 'textbox',
        'cols' => '50',
        'rows' => '5',
        ),
    'probe' => array(
        'field_name' => 'probe',
        'name' => 'form[probe]',
        'title' => '�����',
        'must' => '0',
        'maxlen' => '255',
        'type' => 'textbox',
        'cols' => '50',
        'rows' => '5',
        'logic' => 'AND',
        'search' => "	LIKE '%%%s%%'",
        ),
    'nalich' => array(
        'field_name' => 'nalich',
        'name' => 'form[nalich]',
        'title' => '� �������',
        'must' => 0,
        'maxlen' => 20,
        'type' => 'select',
        'arr' => array(
            1 => '��������� ����� ��. �������� 66',
            2 => '��������� ����� ��. ��������� 17',
            0 => '��� �����')),
    'properties' => array(
        'field_name' => 'properties',
        'name' => 'form[properties]',
        'title' => '�������������� ������������',
        'must' => 0,
        'maxlen' => 255,
        'type' => 'textbox',
        ),

    'ins' => array(
        'field_name' => 'ins',
        'name' => 'form[ins]',
        'title' => '�������',
        'must' => 0,
        'maxlen' => '65535',
        'type' => 'textarea',
        'style' => 'width:100%',
        'cols' => '50',
        'rows' => '3',
        ),
    'madeby' => array(
        'field_name' => 'madeby',
        'name' => 'form[madeby]',
        'title' => '������ �������������',
        'must' => 0,
        'maxlen' => 255,
        'type' => 'textbox',
        ),
    'cnt' => array(
        'field_name' => 'cnt',
        'name' => 'form[cnt]',
        'title' => '����������',
        'must' => 0,
        'maxlen' => 255,
        'type' => 'textbox',
        ),
    'metal' => array(
        'field_name' => 'metal',
        'name' => 'form[metal]',
        'title' => '��� �������',
        'must' => 0,
        'maxlen' => 255,
        'type' => 'textbox',
        ),
    'cont' => array(
        'field_name' => 'cont',
        'name' => 'form[cont]',
        'title' => '�������� ������',
        'must' => '0',
        'maxlen' => '65535',
        'type' => 'textarea',
        'style' => 'width:100%',
        'rows' => '10',
        'wysiwyg' => 'tinymce',
        ),
    'type_icon' => array(
        'field_name' => 'type_icon',
        'name' => 'form[type_icon]',
        'title' => '��� ������',
        'must' => '0',
        'maxlen' => '255',
        'type' => 'select',
        'arr' => array(
            0 => '',
            1 => 'Premium',
            2 => '��� ������',
            3 => '�����'),
        'style' => 'width:100%',
        'logic' => 'AND'),

    'doc' => array(
        'field_name' => 'doc', // ������ ��������� � 'name'!!!
        'name' => 'doc1',
        'title' => '����',
        'admwidth' => 500,
        'hardwidth' => 1000,
        'hardheight' => 1000,
        'maxsize' => 1000000,
        'type' => 'photo',
        'sub_type' => 'photo',
        'newname_func' => 'get_file_name("doc1")',
        'path' => KAT::get_data_link('/f_all_items', $dir, KAT_LOOKIG_DATA_DIR),
        'abspath' => KAT::get_data_path('/f_all_items', $dir, KAT_LOOKIG_DATA_DIR),
        ),
    'date_add' => array(
        'field_name' => 'date_add',
        'name' => 'form[date_add]',
        'title' => 'date_add',
        'must' => 0,
        'maxlen' => 255,
        'type' => 'hidden',
        ),
    'status' => array(
        'field_name' => 'status',
        'name' => 'form[status]',
        'title' => '������',
        'must' => 0,
        'maxlen' => 20,
        'type' => 'select',
        'arr' => array(
            0 => '� �������',
            1 => '������������',
            2 => '������')),

    //'doc2' => array(
    //			'field_name' => 'doc2', // ������ ��������� � 'name'!!!
    //			'name'	=> 'doc2',
    //			'title' => '����',
    //			'admwidth' => 500,
    //			'hardwidth' => 1000,
    //			'hardheight' => 1000,
    //			'maxsize'	=> 1000000,
    //			'type'	=> 'photo',
    //			'sub_type'	=> 'photo',
    //			'newname_func'	=> 'get_file_name("doc2")',
    //			'path'	    => KAT::get_data_link( '/f_'.$_KAT['KUR_ALIAS'], $dir, KAT_LOOKIG_DATA_DIR ),
    //			'abspath'	=> KAT::get_data_path( '/f_'.$_KAT['KUR_ALIAS'], $dir, KAT_LOOKIG_DATA_DIR ),
    //	),
    //	'tab' =>
    //  array (
    //    'field_name' => 'tab',
    //    'name' => 'form[tab]',
    //    'title' => '�������',
    //    'must' => 1,
    //    'maxlen' => 150,
    //    'type' => 'textbox',
    //		'logic'	=> 'AND',
    //		'search' =>	"	LIKE '%s%%'",
    //  ),
    );

if ($_REQUEST['form']['name'] == '�����������')
{
    $FORM_DATA['name']['search'] = " LIKE '%%%s%%' ";
}

?>
