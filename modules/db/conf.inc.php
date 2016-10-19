<?
//$_KAT['coredb_spravochnik']['hidden']			= ''; // для db/list
$_KAT['coredb_news']['hidden']			= 'true'; // для db/list
$_KAT['coredb_youtube']['hidden']			= 'true';
$_KAT['coredb_images']['hidden']			= '';
$_KAT['MASS_UPLOADER']['doc'] = 'doc1';
$_KAT['conf']['SEO'] = false; 
$_KAT['conf']['SEO_PAGES'] = false; 
unset($_KAT['ADM_MENU']["/".$_KAT['MODULE_NAME']."/basket/"]);
$_KAT['ADM_MENU']["delimeter0"] = array("/ico/a_tree.gif", "Магазин","delimeter");
$_KAT['ADM_MENU']["/".$_KAT['MODULE_NAME']."/all_items/"] = array("/ico/a_tree.gif", "- Весь каталог", "local/sync");
$_KAT['ADM_MENU']["/".$_KAT['MODULE_NAME']."/catalog_params/"] = array("/ico/a_tree.gif", "- Параметры каталога", "db/catalog_params");
$_KAT['ADM_MENU']["/db/description/"] = array("/ico/a_tree.gif", "- Описания изделий", "db/description");
$_KAT['ADM_MENU']["/db/zodiaki/"] = array("/ico/a_tree.gif", "- Описания знаков зодиака", "db/zodiaki");

$_KAT['ADM_MENU']["/db/discounts/"] = array("/ico/a_tree.gif", "- Скидки", "db/discounts");
$_KAT['ADM_MENU']["/db/bron/"] = array("/ico/a_tree.gif", "- Бронь", "db/bron");
$_KAT['ADM_MENU']["/db/showloope/"] = array("/ico/a_tree.gif", "- Показывать лупу", "db/showloope");

//$_KAT['ADM_MENU']["/".$_KAT['MODULE_NAME']."/basket"] = array("/ico/a_forum.gif", "- ".Main::get_lang_str('basket', 'db'), $_KAT['MODULE_NAME'].'/basket'); 
$_KAT['ADM_MENU']["/".$_KAT['MODULE_NAME']."/cashout/"] =	array("/ico/a_tree.gif", "- Заявки на вывод средств", $_KAT['MODULE_NAME']."/cashout/");
$_KAT['ADM_MENU']["/".$_KAT['MODULE_NAME']."/robokassa/"] =	array("/ico/a_tree.gif", "- Robokassa", $_KAT['MODULE_NAME']."/robokassa/");
$_KAT['ADM_MENU']["/local/auto_import"] = array("/ico/a_tree.gif", "- Ручной импорт файла из 1c", "local/sync");
$_KAT['ADM_MENU']["/db/log_import"] = array("/ico/a_tree.gif", "- Логи импорта", "local/sync");
$_KAT['ADM_MENU']["/db/imgnoarticul/"] = array("/ico/a_tree.gif", "- Чистка фоток", "db/imgnoarticul");
$_KAT['ADM_MENU']["delimeter1"] = array("/ico/a_tree.gif", "Главная страница","delimeter");
$_KAT['ADM_MENU']["/".$_KAT['MODULE_NAME']."/news/"] = array("/ico/a_tree.gif", "- События и акции", $_KAT['MODULE_NAME']."/news/");
$_KAT['ADM_MENU']["/".$_KAT['MODULE_NAME']."/youtube/"] = array("/ico/a_tree.gif", "- Youtube", $_KAT['MODULE_NAME']."/youtube/");
$_KAT['ADM_MENU']["/".$_KAT['MODULE_NAME']."/youtube_products/"] = array("/ico/a_tree.gif", "- Ролики к изделиям", $_KAT['MODULE_NAME']."/youtube_products/");
//$_KAT['ADM_MENU']["/".$_KAT['MODULE_NAME']."/shop/"] = array("/ico/a_tree.gif", "Продукция", $_KAT['MODULE_NAME']."/shop/");
//$_KAT['ADM_MENU']["/".$_KAT['MODULE_NAME']."/razdel/"] = array("/ico/a_tree.gif", "Категории каталога продукции", $_KAT['MODULE_NAME']."/razdel/");
$_KAT['ADM_MENU']["/".$_KAT['MODULE_NAME']."/banners/"] = array("/ico/a_tree.gif", "- Банеры", $_KAT['MODULE_NAME']."/banners/");
$_KAT['ADM_MENU']["delimeter2"] = array("/ico/a_tree.gif", "Ломбард","delimeter");
$_KAT['ADM_MENU']["/".$_KAT['MODULE_NAME']."/price/"] = array("/ico/a_tree.gif", "- Расценки на золото", $_KAT['MODULE_NAME']."/price/");
$_KAT['ADM_MENU']["/".$_KAT['MODULE_NAME']."/price_ag/"] = array("/ico/a_tree.gif", "- Расценки на серебро", $_KAT['MODULE_NAME']."/price_ag/");
$_KAT['ADM_MENU']["/".$_KAT['MODULE_NAME']."/onlinescore/"] = array("/ico/a_tree.gif", "- Онлайн-оценка", $_KAT['MODULE_NAME']."/onlinescore/");
$_KAT['ADM_MENU']["/db/whywe"] = array("/ico/a_tree.gif", "- Ломбард. Почему мы?", "db/whywe");
$_KAT['ADM_MENU']["delimeter3"] = array("/ico/a_tree.gif", "Дополнительные настройки","delimeter");
$_KAT['ADM_MENU']["/".$_KAT['MODULE_NAME']."/promocode/"] = array("/ico/a_tree.gif", "- Промокоды", $_KAT['MODULE_NAME']."/promocode/");
$_KAT['ADM_MENU']["/".$_KAT['MODULE_NAME']."/connects_shopitems/"] = array("/ico/a_tree.gif", "- Сопутствующие товары", $_KAT['MODULE_NAME']."/connects_shopitems/");
//$_KAT['ADM_MENU']["/".$_KAT['MODULE_NAME']."/admin_faqedit/"] = array("/ico/a_tree.gif", "FAQ ", $_KAT['MODULE_NAME']."/faqedit/");
//$_KAT['ADM_MENU']["/".$_KAT['MODULE_NAME']."/admin_faq_youtube_edit/"] = array("/ico/a_tree.gif", "FAQ youtube", $_KAT['MODULE_NAME']."/faq_youtube_edit/");
//$_KAT['ADM_MENU']["/".$_KAT['MODULE_NAME']."/admin_marketedit/"] =	array("/ico/a_tree.gif", "Market ", $_KAT['MODULE_NAME']."/marketedit/");
$_KAT['core_authperm']['DB']	= array('basket_delivery','basket_delivery2payment','basket_deliverybyself','basket_pickpoint','basket_expressru','settings','auth','all_items','description','discounts','showloope','cashout','robokassa','log_import','imgnoarticul','news','youtube_products','banners','price','price_ag','onlinescore','whywe','promocode','connects_shopitems','core_authperm','exclusive','contacts','news_1','response','podarochnyie_sertifikatyi','type_products');
define ("KAT_ERR_NOT_FOUND","Ничего не найдено"); 

	$_KAT['onpage_def']['robokassa']	= 100;
	$_KAT['TABLES']['robokassa']			= 'robokassa_view';
	$_KAT['TITLES']['robokassa']			= 'Robokassa';
	$_KAT['SRC']['shop']							= 'coredb_payments';
//	$_KAT['FILES']['shop_inc']			= '_coredb_payments.data.inc.php';
	$_KAT['shop_inc']['hidden']				= 'true'; // для db/list


 $_KAT['TITLES']['news']				= 'События и акции';
 $_KAT['TITLES']['arhiv_news']	= 'Архивные Новости';
 $_KAT['TITLES']['populyar_product']		= 'Популярные продукты';
 
 $_KAT['FILES']['news']		= 'news.data.inc.php';
 $_KAT['FILES']['arhiv_news']		= 'arhiv_news.data.inc.php';
 $_KAT['FILES']['katalog']		= 'katalog.data.inc.php';
 $_KAT['FILES']['razdel']		= 'razdel.data.inc.php'; 
 
 /* Продукция */
 
 //$_KAT['onpage']		= 2;
 $_KAT['TABLES']['news']	= 'news';
 $_KAT['TABLES']['arhiv_news']	= 'news';
 $_KAT['TABLES']['razdel']		= 'razdel'; 
 
/* Разделы общего каталога продукции */
  $_KAT['onpage_def']['shoprazdel']	= 100;
	$_KAT['TABLES']['shoprazdel']			= 'shoprazdel';
	$_KAT['TITLES']['shoprazdel']			= 'Каталог';
	// $_KAT['SRC']['shoprazdel']			= 'sites';
	$_KAT['FILES']['shoprazdel']			= 'oglav.data.inc.php';
	$_KAT['shoprazdel']['hidden']			= 'true'; // для db/list
	$_KAT['DOC_PATH']['shoprazdel']		= '/db/shop';

/* логи автоимпорта */
  $_KAT['onpage_def']['log_import']	= 100;
	$_KAT['TABLES']['log_import']			= 'log_import';
	$_KAT['TITLES']['log_import']			= 'Каталог';
	// $_KAT['SRC']['log_import']			= 'sites';
	$_KAT['FILES']['log_import']			= 'oglav.data.inc.php';
	$_KAT['log_import']['hidden']			= 'true'; // для db/list
	$_KAT['DOC_PATH']['log_import']		= '/db/shop';

 /* Раздел каталога продукции*/

	$_KAT['onpage_def']['shop']	= 100;
	$_KAT['TABLES']['shop']			= 'shop';
	$_KAT['TITLES']['shop']			= 'Продукция (без вставок)';
	// $_KAT['SRC']['shop']			= 'sites';
	$_KAT['FILES']['shop']			= 'shop.data.inc.php';
	$_KAT['shop']['hidden']			= 'true'; // для db/list
	$_KAT['DOC_PATH']['shop']		= '/db/shop';
 
	$_KAT['onpage_def']['shop_inc']	= 100;
	$_KAT['TABLES']['shop_inc']			= 'shop_inc';
	$_KAT['TITLES']['shop_inc']			= 'Продукция (cо вставками)';
	// $_KAT['SRC']['shop']			= 'sites';
	$_KAT['FILES']['shop_inc']			= 'shop_inc.data.inc.php';
	$_KAT['shop_inc']['hidden']			= 'true'; // для db/list
	$_KAT['DOC_PATH']['shop_inc']		= '/db/shop_inc';

	$_KAT['onpage_def']['shop_rings']	= 100;
	$_KAT['TABLES']['shop_rings']			= 'shop_rings';
	$_KAT['TITLES']['shop_rings']			= 'Кольца';
	$_KAT['SRC']['shop_rings']			= 'shop';
	$_KAT['FILES']['shop_rings']			= 'shop_rings.data.inc.php';
	$_KAT['shop_rings']['hidden']			= 'true'; // для db/list
	$_KAT['DOC_PATH']['shop_rings']		= '/db/shop_rings';

	$_KAT['onpage_def']['shop_bra']	= 100;
	$_KAT['TABLES']['shop_bra']			= 'shop_bra';
	$_KAT['TITLES']['shop_bra']			= 'Браслеты';
	$_KAT['SRC']['shop_bra']			= 'shop';
	$_KAT['FILES']['shop_bra']			= 'shop_bra.data.inc.php';
	$_KAT['shop_bra']['hidden']			= 'true'; // для db/list
	$_KAT['DOC_PATH']['shop_bra']		= '/db/shop_bra';

	$_KAT['onpage_def']['shop_kolie']	= 100;
	$_KAT['TABLES']['shop_kolie']			= 'shop_kolie';
	$_KAT['TITLES']['shop_kolie']			= 'Колье';
	// $_KAT['SRC']['shop']			= 'sites';
	$_KAT['FILES']['shop_kolie']			= 'shop_kolie.data.inc.php';
	$_KAT['shop_kolie']['hidden']			= 'true'; // для db/list
	$_KAT['DOC_PATH']['shop_kolie']		= '/db/shop_kolie';

/* Поиск по всем разделам */

	$_KAT['onpage_def']['shop_search']	= 100;
	$_KAT['TABLES']['shop_search']			= 'view_all';
	$_KAT['TITLES']['shop_search']			= 'Поиск';
  //$_KAT['SRC']['shop_search']			    = 'sites';
	$_KAT['FILES']['shop_search']			  = 'shop_search.data.inc.php';
	$_KAT['shop_search']['hidden']			= 'true'; // для db/list
	$_KAT['DOC_PATH']['shop_search']		= '/db/shop_search';
	
	$_KAT['onpage_def']['shop_teh']	= 100;
	$_KAT['TABLES']['shop_teh']			= 'shop';
	$_KAT['TITLES']['shop_teh']			= 'Техника';
	$_KAT['SRC']['shop_teh']			= 'shop_teh';
	$_KAT['FILES']['shop_teh']			= 'shop_teh.data.inc.php';
	$_KAT['shop_teh']['hidden']			= 'true'; // для db/list
	$_KAT['DOC_PATH']['shop_teh']		= '/db/shop_teh';

	
	$_KAT['onpage_def']['catalog_params']	= 100;
	$_KAT['TABLES']['catalog_params']			= 'catalog_params';
	$_KAT['TITLES']['catalog_params']			= 'Параметры каталога';
	$_KAT['SRC']['catalog_params']			= 'catalog_params';
	$_KAT['FILES']['catalog_params']			= 'catalog_params.data.inc.php';
	$_KAT['catalog_params']['hidden']			= 'true'; // для db/list
	$_KAT['DOC_PATH']['catalog_params']		= '/db/catalog_params';
 /* Новости */

 $_KAT['DEF_ALIAS']		= 'news';
 $_KAT['TABLES']['news']	= $_KAT['TABLES'][$_KAT['DEF_ALIAS']];
 $_KAT['FILES']['news']		= $_KAT['FILES'][$_KAT['DEF_ALIAS']];
 $_KAT['TITLES']['news']	= $_KAT['TITLES'][$_KAT['DEF_ALIAS']];
 $_KAT['KUR_TABLE']		= $_KAT['TABLES']['news'];
 $_KAT['SRC']['news']	= 'news';
  
 $_KAT['DEF_ALIAS']		= 'news';
 $_KAT['TABLES']['short_news']	= $_KAT['TABLES'][$_KAT['DEF_ALIAS']];
 $_KAT['FILES']['short_news']		= $_KAT['FILES'][$_KAT['DEF_ALIAS']];
 $_KAT['TITLES']['short_news']	= 'События и акции';
 $_KAT['short_news']['NO_PLINE']	= 'true';

if (!$_CORE->IS_ADMIN) {
 $_KAT['onpage_def']['short_news']	= 2;
 $_KAT['onpage_def']['news']	= 10;
 $_KAT['onpage_def']['bra_ins']	= 30;
 $_KAT['onpage_def']['kolie_ins']	= 30;
 $_KAT['onpage_def']['ring_ins']	= 30;
 $_KAT['onpage_def']['def']		= 2;
 $_KAT['onpage_def']['shop']	= 6;
 $_KAT['onpage_def']['populyar_product']	= 6;

} else {
 $_KAT['onpage_def']['def']		= 20;
 $_KAT['onpage_def']['news']	= 20;
 $_KAT['onpage_def']['shop']	= 20;
 
 
	$_KAT['onpage_def']['description']		= '20';
	$_KAT['TABLES']['description']			= 'description';
	$_KAT['TITLES']['description']			= 'Описания изделий';
	$_KAT['SRC']['description']				= 'description';
	$_KAT['FILES']['description']			= 'description.data.inc.php';
	$_KAT['description']['hidden']			= 'true';
 	
	$_KAT['onpage_def']['onlinescore']	= 20;
	$_KAT['TABLES']['onlinescore']		= 'onlinescore';
	$_KAT['SRC']['onlinescore']			= 'onlinescore';
	$_KAT['TITLES']['onlinescore']		= 'Запросы на онлайн-оценку';
	$_KAT['FILES']['onlinescore']		= 'onlinescore.data.inc.php';
	$_KAT['onlinescore']['hidden']		= 'true'; // для db/list
	$_KAT['DOC_PATH']['onlinescore']	= '/tmp/inside';
	
	
	$_KAT['onpage_def']['imgnoarticul']	= 50;
	$_KAT['TABLES']['imgnoarticul']		= 'imgnoarticul';
	$_KAT['SRC']['imgnoarticul']		= 'imgnoarticul';
	$_KAT['TITLES']['imgnoarticul']		= ' Файлы, артикулов для которых нет в базе';
	$_KAT['FILES']['imgnoarticul']		= 'imgnoarticul.data.inc.php';
	$_KAT['imgnoarticul']['hidden']		= 'true'; // для db/list
	$_KAT['DOC_PATH']['imgnoarticul']	= '/tmp/inside';
	
	$_KAT['onpage_def']['showloope']	= 50;
	$_KAT['TABLES']['showloope']		= 'showloope';
	$_KAT['SRC']['showloope']			= 'showloope';
	$_KAT['TITLES']['showloope']		= 'Показывать эффект лупы';
	$_KAT['FILES']['showloope']			= 'showloope.data.inc.php';
	$_KAT['showloope']['hidden']		= 'true'; // для db/list
	$_KAT['DOC_PATH']['showloope']		= '/tmp/inside';
	
}
 $_KAT['onlinescore']['wall'] 		= true;
 
 
 $_KAT['onpage_def']['banners']	= 100;
 $_KAT['TABLES']['banners']			= 'banners';
 $_KAT['TITLES']['banners']		= 'Баннеры на главной';
 $_KAT['SRC']['banners']				= 'banners';
 $_KAT['FILES']['banners']			= 'banners.data.inc.php';
 $_KAT['banners']['hidden']			= 'true'; // для db/list
 $_KAT['DOC_PATH']['banners']		= '/db/banners';
 $_KAT['banners']['AFTER_ADD']	= '/db/banners/';


/*
shoprazdel создается как view, для получения количества
select count(0) AS `cnt`,`s`.`razdel` AS `razdel` from (`landcom_dev`.`magaz__shop` `s` join `landcom_dev`.`magaz__razdel` `r`) where (`s`.`razdel` = convert(`r`.`name` using utf8) and s.hidden != 1 ) group by `s`.`razdel`
*/

			$_KAT['onpage_def']['sobyitiya_i_aktsii']	= '20';
			$_KAT['TABLES']['sobyitiya_i_aktsii']	= 'sobyitiya_i_aktsii';
			$_KAT['TITLES']['sobyitiya_i_aktsii']	= 'События и акции';
			$_KAT['SRC']['sobyitiya_i_aktsii']	= 'coredb_news';
			$_KAT['FILES']['sobyitiya_i_aktsii']	= 'coredb_news.data.inc.php';
			$_KAT['sobyitiya_i_aktsii']['AFTER_ADD']	= '/db/sobyitiya_i_aktsii/';
			$_KAT['sobyitiya_i_aktsii']['hidden']	= 'TRUE';
			
			$_KAT['onpage_def']['ring_size']	= '20';
			$_KAT['TABLES']['ring_size']	= 'ring_size';
			$_KAT['TITLES']['ring_size']	= 'ring_size';
			$_KAT['SRC']['ring_size']	= 'coredb_spravochnik';
			$_KAT['FILES']['ring_size']	= 'coredb_spravochnik.data.inc.php';
			$_KAT['ring_size']['AFTER_ADD']	= '/db/ring_size/';
			$_KAT['ring_size']['hidden']	= 'TRUE';
			
			$_KAT['onpage_def']['ring_ins']	= '20';
			$_KAT['TABLES']['ring_ins']	= 'ring_ins';
			$_KAT['TITLES']['ring_ins']	= 'ring_ins';
			$_KAT['SRC']['ring_ins']	= 'coredb_spravochnik';
			$_KAT['FILES']['ring_ins']	= 'coredb_spravochnik.data.inc.php';
			$_KAT['ring_ins']['AFTER_ADD']	= '/db/ring_ins/';
			$_KAT['ring_ins']['hidden']	= 'TRUE';
			
			$_KAT['onpage_def']['bra_size']	= '20';
			$_KAT['TABLES']['bra_size']	= 'bra_size';
			$_KAT['TITLES']['bra_size']	= 'bra_size';
			$_KAT['SRC']['bra_size']	= 'coredb_spravochnik';
			$_KAT['FILES']['bra_size']	= 'coredb_spravochnik.data.inc.php';
			$_KAT['bra_size']['AFTER_ADD']	= '/db/bra_size/';
			$_KAT['bra_size']['hidden']	= 'TRUE';
			
			$_KAT['onpage_def']['bra_ins']	= '20';
			$_KAT['TABLES']['bra_ins']	= 'bra_ins';
			$_KAT['TITLES']['bra_ins']	= 'bra_ins';
			$_KAT['SRC']['bra_ins']	= 'coredb_spravochnik';
			$_KAT['FILES']['bra_ins']	= 'coredb_spravochnik.data.inc.php';
			$_KAT['bra_ins']['AFTER_ADD']	= '/db/bra_ins/';
			$_KAT['bra_ins']['hidden']	= 'TRUE';
			
			$_KAT['onpage_def']['kolie_size']	= '20';
			$_KAT['TABLES']['kolie_size']	= 'kolie_size';
			$_KAT['TITLES']['kolie_size']	= 'kolie_size';
			$_KAT['SRC']['kolie_size']	= 'coredb_spravochnik';
			$_KAT['FILES']['kolie_size']	= 'coredb_spravochnik.data.inc.php';
			$_KAT['kolie_size']['AFTER_ADD']	= '/db/kolie_size/';
			$_KAT['kolie_size']['hidden']	= 'TRUE';
			
			$_KAT['onpage_def']['kolie_ins']	= '20';
			$_KAT['TABLES']['kolie_ins']	= 'kolie_ins';
			$_KAT['TITLES']['kolie_ins']	= 'kolie_ins';
			$_KAT['SRC']['kolie_ins']	= 'coredb_spravochnik';
			$_KAT['FILES']['kolie_ins']	= 'coredb_spravochnik.data.inc.php';
			$_KAT['kolie_ins']['AFTER_ADD']	= '/db/kolie_ins/';
			$_KAT['kolie_ins']['hidden']	= 'TRUE';

			// global 

			$_KAT['onpage_def']['shop_size']	= '40';
			$_KAT['TABLES']['shop_size']	= 'shop_size';
			$_KAT['TITLES']['shop_size']	= 'shop_size';
			$_KAT['SRC']['shop_size']	= 'coredb_spravochnik';
			$_KAT['FILES']['shop_size']	= 'coredb_spravochnik.data.inc.php';
			$_KAT['shop_size']['AFTER_ADD']	= '/db/shop_size/';
			$_KAT['shop_size']['hidden']	= 'TRUE';
			
			$_KAT['onpage_def']['shop_ins']	= '40';
			$_KAT['TABLES']['shop_ins']	= 'shop_ins';
			$_KAT['TITLES']['shop_ins']	= 'shop_ins';
			$_KAT['SRC']['shop_ins']	= 'coredb_spravochnik';
			$_KAT['FILES']['shop_ins']	= 'shop_ins.data.inc.php';
			$_KAT['shop_ins']['AFTER_ADD']	= '/db/shop_ins/';
			$_KAT['shop_ins']['hidden']	= 'TRUE';

			$_KAT['onpage_def']['response']	= '20';
			$_KAT['TABLES']['response']	= 'response';
			$_KAT['TITLES']['response']	= 'Отзывы';
			$_KAT['SRC']['response']	= 'response';
			$_KAT['FILES']['response']	= 'response.data.inc.php';
			$_KAT['response']['hidden']	= 'TRUE';
      $_KAT['DOC_PATH']['response'] = '/db/response';
      $_KAT['response']['adm_fields'] = array('person');


	$_KAT['onpage_def']['all_items']	= 76;
	$_KAT['TABLES']['all_items']		= 'items';
	$_KAT['TITLES']['all_items']		= 'Каталог';
  //$_KAT['SRC']['all_items']			= 'sites';
	$_KAT['FILES']['all_items']			= 'all_items.data.inc.php';
	$_KAT['all_items']['hidden']		= 'true'; // для db/list
	$_KAT['DOC_PATH']['all_items']		= '/db/all_items';
	$_KAT['INDEX']['all_items']			= 'num_series';
	
	$_KAT['onpage_def']['new_items']	= 300;
	$_KAT['TABLES']['new_items']		= 'items';
	$_KAT['TITLES']['new_items']		= 'Каталог';
	$_KAT['SRC']['new_items']			= 'new_items';
	$_KAT['FILES']['new_items']			= 'all_items.data.inc.php';
	$_KAT['new_items']['hidden']		= 'true'; // для db/list
	$_KAT['DOC_PATH']['new_items']		= '/db/all_items';
	$_KAT['INDEX']['new_items']			= 'num_series';
	$_KAT['new_items']['NO_PLINE']		= 'true';

	$_KAT['onpage_def']['bron']	= 300;
	$_KAT['TABLES']['bron']		= 'bron';
	$_KAT['TITLES']['bron']		= 'Каталог';
	$_KAT['SRC']['bron']			= 'bron';
	$_KAT['FILES']['bron']			= 'bron.data.inc.php';
	$_KAT['bron']['hidden']		= 'true'; // для db/list
	$_KAT['DOC_PATH']['bron']		= '/db/bron';

	$_KAT['onpage_def']['yml']	= 1500;
	$_KAT['TABLES']['yml']		= 'items';
	$_KAT['TITLES']['yml']		= 'Каталог';
  //$_KAT['SRC']['yml']			= 'sites';
	$_KAT['FILES']['yml']		= 'all_items.data.inc.php';
	$_KAT['yml']['hidden']		= 'true'; // для db/list
	$_KAT['DOC_PATH']['yml']	= '/db/all_items';
	$_KAT['INDEX']['yml']		= 'num_series';

	$_KAT['onpage_def']['avito_xml']	= 1500;
	$_KAT['TABLES']['avito_xml']		= 'items';
	$_KAT['TITLES']['avito_xml']		= 'Каталог';
  //$_KAT['SRC']['avito_xml']			= 'sites';
	$_KAT['FILES']['avito_xml']		= 'all_items.data.inc.php';
	$_KAT['avito_xml']['hidden']		= 'true'; // для db/list
	$_KAT['DOC_PATH']['avito_xml']	= '/db/all_items';
	$_KAT['INDEX']['avito_xml']		= 'num_series';
	
	$_KAT['onpage_def']['short_newproduct']		= 6;
	$_KAT['TABLES']['short_newproduct']			= 'items';
	$_KAT['TITLES']['short_newproduct']			= 'Каталог';
	$_KAT['SRC']['short_newproduct']			= 'short_newproduct';
	$_KAT['FILES']['short_newproduct']			= 'all_items.data.inc.php';
	$_KAT['short_newproduct']['hidden']			= 'true'; // для db/list
	$_KAT['DOC_PATH']['short_newproduct']		= '/db/all_items';
	$_KAT['INDEX']['short_newproduct']			= 'num_series';
	$_KAT['short_newproduct']['NO_PLINE']		= 'true';

  $_KAT['onpage_def']['log_import']	= 100;
	$_KAT['TABLES']['log_import']			= 'log_import';
	$_KAT['TITLES']['log_import']			= 'Логи импорта';
	$_KAT['SRC']['log_import']			= 'log_import';
	$_KAT['FILES']['log_import']			= 'log_import.data.inc.php';
	$_KAT['log_import']['hidden']			= 'true'; // для db/list
	$_KAT['DOC_PATH']['log_import']		= '/db/shop';
	
  $_KAT['onpage_def']['connects_shopitems']		= 100;
	$_KAT['TABLES']['connects_shopitems']		= 'connects_shopitems';
	$_KAT['TITLES']['connects_shopitems']		= 'Сопутствующие товары';
	$_KAT['SRC']['connects_shopitems']			= 'connects_shopitems';
	$_KAT['FILES']['connects_shopitems']		= 'connects_shopitems.data.inc.php';
	$_KAT['connects_shopitems']['hidden']		= 'true'; // для db/list
	$_KAT['DOC_PATH']['connects_shopitems']		= '/db/connects_shopitems';
	$_KAT['connects_shopitems']['AFTER_ADD_INC'] 	= $_CORE->PATHTPLS."/def/db/connects_shopitems/after_add_inc.html";
	$_KAT['connects_shopitems']['ANY'] = 1;
	
	$_KAT['basket']['AFTER_ADD_INC'] 	= $_CORE->PATHTPLS."/def/db/basket/after_add_inc.html";

			
			//
			// dinamic onpage block start
			//
			// from query to session
			if (is_array($_REQUEST['onpage'])) foreach ($_REQUEST['onpage'] as $alias => $order ) {
				if (intval($order) > 0){
					$_SESSION['onpage_def'][$alias] = intval($order);
				}
			}
			// from session to conf
			if (is_array($_SESSION['onpage_def'])) foreach ($_SESSION['onpage_def'] as $alias => $order ) {
				if (intval($order) > 0){
					$_KAT['onpage_def'][$alias] = $order;
				}
			}
	$_KAT['onpage_def']['contacts']	= 20;
	$_KAT['TABLES']['contacts']		= 'contacts';
	$_KAT['SRC']['contacts']		= 'contacts';
	$_KAT['TITLES']['contacts']		= 'Контакты';
	$_KAT['FILES']['contacts']		= 'contact.data.inc.php';
	$_KAT['contacts']['hidden']		= 'true'; // для db/list
	//$_KAT['DOC_PATH']['contacts']	= '/tmp/inside';
	
	$_KAT['onpage_def']['price']	= 20;
	$_KAT['TABLES']['price']		= 'price';
	$_KAT['SRC']['price']			= 'price';
	$_KAT['TITLES']['price']		= 'Расценки на золото';
	$_KAT['FILES']['price']			= 'price.data.inc.php';
	$_KAT['price']['hidden']		= 'true'; // для db/list
	$_KAT['DOC_PATH']['price']		= '/tmp/inside';
	
	$_KAT['onpage_def']['price_ag']	= 20;
	$_KAT['TABLES']['price_ag']		= 'price_ag';
	$_KAT['SRC']['price_ag']		= 'price_ag';
	$_KAT['TITLES']['price_ag']		= 'Расценки на серебро';
	$_KAT['FILES']['price_ag']		= 'price_ag.data.inc.php';
	$_KAT['price_ag']['hidden']		= 'true'; // для db/list
	$_KAT['DOC_PATH']['price_ag']	= '/tmp/inside';
	
	$_KAT['onpage_def']['promocode']	= 20;
	$_KAT['TABLES']['promocode']		= 'promocode';
	$_KAT['SRC']['promocode']			= 'promocode';
	$_KAT['TITLES']['promocode']		= 'Промокоды';
	$_KAT['FILES']['promocode']			= 'promocode.data.inc.php';
	$_KAT['promocode']['hidden']		= 'true'; // для db/list
	$_KAT['DOC_PATH']['promocode']		= '/tmp/inside';

	// youtube mainpage
	$_KAT['onpage_def']['short_youtube']	= 50;
	$_KAT['TABLES']['short_youtube']		= 'view_short_youtube';
	$_KAT['SRC']['short_youtube']			= 'coredb_youtube';
	$_KAT['TITLES']['short_youtube']		= 'Youtube';
	$_KAT['FILES']['short_youtube']		= 'coredb_youtube.data.inc.php';
	$_KAT['short_youtube']['hidden']		= 'true'; // для db/list
	$_KAT['short_youtube']['NO_PLINE']		= 'true';
	$_KAT['DOC_PATH']['short_youtube']		= '/tmp/inside';
 
 	$_KAT['onpage_def']['youtube']	= 20;
	$_KAT['TABLES']['youtube']		= 'youtube';
	$_KAT['SRC']['youtube']			= 'coredb_youtube';
	$_KAT['TITLES']['youtube']		= 'Youtube';
	$_KAT['FILES']['youtube']		= 'coredb_youtube.data.inc.php';
	$_KAT['youtube']['hidden']		= 'true'; // для db/list
	$_KAT['DOC_PATH']['youtube']		= '/tmp/inside';
	
 	$_KAT['onpage_def']['youtube_products']	= 20;
	$_KAT['TABLES']['youtube_products']		= 'youtube_products';
	$_KAT['SRC']['youtube_products']		= 'coredb_youtube';
	$_KAT['TITLES']['youtube_products']		= 'Youtube ролики к изделиям';
	$_KAT['FILES']['youtube_products']		= 'youtube_products.data.inc.php';
	$_KAT['youtube_products']['hidden']		= 'true'; // для db/list
	$_KAT['DOC_PATH']['youtube_products']	= '/tmp/inside';
	
	$_KAT['onpage_def']['whywe']	= 20;
	$_KAT['TABLES']['whywe']		= 'whywe';
	$_KAT['SRC']['whywe']			= 'whywe';
	$_KAT['TITLES']['whywe']		= 'Почему выбирают нас?';
	$_KAT['FILES']['whywe']		= 'whywe.data.inc.php';
	$_KAT['whywe']['hidden']		= 'true'; // для db/list
	$_KAT['DOC_PATH']['whywe']		= '/tmp/inside';
	
	$_KAT['onpage_def']['discounts']	= 20;
	$_KAT['TABLES']['discounts']		= 'discounts';
	$_KAT['SRC']['discounts']			= 'discounts';
	$_KAT['TITLES']['discounts']		= 'Скидки';
	$_KAT['FILES']['discounts']		= 'discounts.data.inc.php';
	$_KAT['discounts']['hidden']		= 'true'; // для db/list
	$_KAT['DOC_PATH']['discounts']		= '/tmp/inside';
	$_KAT['discounts']['AFTER_ADD_INC'] 	= $_CORE->PATHTPLS."def/db/discounts/after_add_inc.html";
	$_KAT['discounts']['AFTER_DEL_INC'] 	= $_CORE->PATHTPLS."def/db/discounts/after_add_inc.html";
	
	$_KAT['onpage_def']['type_products']	= '20';
	$_KAT['TABLES']['type_products']		= 'type_products';
	$_KAT['TITLES']['type_products']		= 'Наименования типов продукции';
	$_KAT['SRC']['type_products']			= 'type_products';
	$_KAT['FILES']['type_products']			= 'type_products.data.inc.php';
	$_KAT['type_products']['hidden']		= 'true';
	
	$_KAT['partners_vitrina']['ANY'] = 3;
	$_KAT['onpage_def']['partners_vitrina']	= '20';
	$_KAT['TABLES']['partners_vitrina']		= 'items';
	$_KAT['TITLES']['partners_vitrina']		= 'Партнерская витрина';
	$_KAT['SRC']['partners_vitrina']			= 'partners_vitrina';
	$_KAT['FILES']['partners_vitrina']			= 'all_items.data.inc.php';
	$_KAT['partners_vitrina']['hidden']		= 'true';
	$_KAT['partners_vitrina']['NO_PLINE']		= 'true';
	
	$_KAT['onpage_def']['exclusive']	= '20';
	$_KAT['TABLES']['exclusive']		= 'exclusive';
	$_KAT['TITLES']['exclusive']		= 'Эксклюзив';
	$_KAT['SRC']['exclusive']			= 'exclusive';
	$_KAT['FILES']['exclusive']			= 'exclusive.data.inc.php';
	$_KAT['exclusive']['hidden']		= 'true';
	
	$_KAT['onpage_def']['cashout']		= '20';
	$_KAT['TABLES']['cashout']			= 'cashout';
	$_KAT['TITLES']['cashout']			= 'Заявки на вывод средств';
	$_KAT['SRC']['cashout']				= 'cashout';
	$_KAT['FILES']['cashout']			= 'cashout.data.inc.php';
	$_KAT['cashout']['hidden']			= 'true';
	$_KAT['cashout']['AFTER_ADD_INC'] 	= $_CORE->PATHTPLS."/def/db/cashout/after_add_inc.html";
    
	$_KAT['onpage_def']['zodiaki']		= '20';
	$_KAT['TABLES']['zodiaki']			= 'zodiaki';
	$_KAT['TITLES']['zodiaki']			= 'Описания знаков зодиака';
	$_KAT['FILES']['zodiaki']			= 'zodiaki.data.inc.php';
	$_KAT['zodiaki']['hidden']			= 'true';
 ?>