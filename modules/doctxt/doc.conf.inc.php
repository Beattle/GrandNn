<?
// удаление элементов первого уровня
$_DOC['conf']['SEO']	= true;
$_DOC['conf']['seo_desc']	= "";
$_DOC['conf']['seo_keywords']	= "";

// дополнительные поля, в дерево сайта
$_DOC['conf']['add_tree_fields'] = 'show_region';

//кнопочка загрузки csv
$_DOC['conf']['csv']	= false; // для меню администратора и выполнения /empty/csv команды
// запреты на администрирование

// удаление элементов первого уровня
$_DOC['conf']['adm_nokill_first']	= false;

// добавление элементов первого уровня
$_DOC['conf']['adm_noadd_first']	= false;

// перемещение элементов
$_DOC['conf']['adm_nomove']			= false;

// автоматичекий показ поддокументов
$_DOC['conf']['no_subtree_all']		= true;

// на каких страницах показывать форму обратной связи
$_DOC['conf']['obrsv']				= array();

$_DOC['conf']['SEEALSO'] = array(
);
$_DOC['conf']['tree_from_db'] = true;
$_DOC['ADM_MENU']	= array(
	"/doctxt/?list" => array("/ico/a_tree.gif", "Структура сайта", $_DOC['MODULE_NAME']),
	);
?>