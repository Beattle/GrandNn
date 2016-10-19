<?
#
# SWITCHER
#
global $_CORE, $_CATALOG,$_PROJECT;
unset($_PROJECT['PATH_2_CONTENT']);
if(!isset($_CORE->_modules['catalog']) && $Cmd!='install') {
	echo 'модуль CatalogModule еще не установлен';
}else{
	include_once($_CORE->SiteModDir.'/catalog.inc.php');
	if(!isset($_CATALOG) || !is_object($_CATALOG))
        $_CATALOG = new CatalogModule();
    
    /**  SWITCHER  **/
    switch ($Cmd) {
        case 'content/title/short':
        case 'content/path':
            echo $_CORE->cmd_exec( array( 'user', '/' . $Cmd ) );
        break;
        case 'content/seo_keywords':
        case 'content/seo_desc':
        case 'content/seo_title':
        case 'content/title':
            $_CATALOG->getpath();
            if(empty($_CATALOG->params) && !empty($_CATALOG->item))
                echo $_CATALOG->getItemTitle();
            else
                echo $_CATALOG->getTitle();
        break;
        case "install":
            echo '<h1>Установка модуля - Catalog</h1>';
            if ($_CATALOG->install()) echo 'Модуль успешно установлен';
            else {
            echo 'Модуль не удалось установить<br>';
            echo '<ul style="color: red;">';
            foreach($_CATALOG->Errors as $err){
                echo '<li>'.$err;
            }
                echo '</ul>';
            }
        break;
        case 'sitemap/xml': // создаем sitemapN.xml файлы для каталога
            $_CATALOG->genarateXML();
        break;
        default:
            if(empty($_CATALOG->params) && !empty($_CATALOG->item)){
                echo cmd('db/all_items/'.$_CATALOG->item['alias'],false,true);
                //$_CATALOG->getpath();
            }else{
                if(empty($_REQUEST['nextpage'])){
                    echo cmd('doctxt/catalog/'.$Cmd,false,true);
                }
                $_CATALOG->rewritePost();
                $_CATALOG->setRequest();
                echo cmd('/db/all_items',false,true);
            }
        break;
    }
}
