<?
/*

Module don`t used as MAIN module for OUTPUT CORE_BODY

*/
global $_PROJECT, $_USER, $_CORE; // in user/index.inc

// Для старых версий
if (is_file($_CORE->SiteModDir."/user.conf.php"))
	include $_CORE->SiteModDir."/user.conf.php";

if (is_file($_CORE->SiteModDir."/user.conf.phtml"))
	include $_CORE->SiteModDir."/user.conf.phtml";
/*
$_USER
[START_TITLE]
$_USER['PATH_MAIN']
*/
#
# loading _PROJECT => [TREE], [PATH_2_CONTENT]
#
include_once($_CORE->CoreModDir."/user.inc.php");
switch ($Cmd) {
	case 'content/title':
		echo $_USER['START_TITLE'];
		$_USER['TITLE']	=  USER::get_title();
		echo (!empty($_USER['TITLE']))?" / ".$_USER['TITLE']." | ":'';
	break;
	case 'content/title/short':
		$title	= USER::get_title('last');
		echo Main::short($title, TITLE_LEN, 3, ' ');
	break;
	case 'content/path':
		echo '
<!-- path -->
<div class="path" id="noprint">
  <table width="920" border="0" align="center" cellpadding="0" cellspacing="0" class="path">
    <tr><td width="50%" height="30">';

		echo	(isset($_USER['PATH_MAIN']))? $_USER['PATH_MAIN'] : '<a href="/" class="small">главная</a> / ';
		for ($i = 0; $i < sizeof(@$_PROJECT['PATH_2_CONTENT'])-1; $i++) {
			echo '<a href="'.$_PROJECT['PATH_2_CONTENT'][$i]['path'].'">'.Main::short($_PROJECT['PATH_2_CONTENT'][$i]['name'], 30).'</a> / ';
		}

		echo "".Main::short(@$_PROJECT['PATH_2_CONTENT'][$i]['name'], 40, 1)."";
		echo '<td width="50%" height="30">&nbsp;</td>
    </tr>
  </table>
</div>
';
//		echo ($str == '' )? '' : $str."".Main::short(@$_PROJECT['PATH_2_CONTENT'][$i]['name'], 40, 1)."";
	break;
	case 'menu_main':
		// для старыйх версий
		@include $_CORE->SiteModDir."/menu_main.inc.php"; // need /js/menu.inc.js !!!
		// ---- 

		@include $_CORE->SiteModDir."/menu_main.inc.phtml"; // need /js/menu.inc.js !!!
	break;
	case "lang_flags":
		$qs	 = (false && !empty($_SERVER['QUERY_STRING'])) ? '?'.$_SERVER['QUERY_STRING'] : '';
		echo ($_CORE->LANG == 'en') 
//		? '<A HREF="'.$_CORE->NOLANG_URL.$qs.'"><IMG SRC="/images/flag_ru.gif" WIDTH="22" HEIGHT="13" BORDER="0" ALT="ru"></A><IMG SRC="/images/gflag_en.gif" WIDTH="22" HEIGHT="13" BORDER="0" ALT="en" hspace="18">'
//		: '<IMG SRC="/images/gflag_ru.gif" WIDTH="22" HEIGHT="13" BORDER="0" ALT="ru"><A HREF="'.$_CORE->NOLANG_URL.'en/'.$qs.'"><IMG SRC="/images/flag_en.gif" WIDTH="22" HEIGHT="13" BORDER="0" ALT="en" hspace="18"></a>';
		? '<img src="/images/arr_r.gif"	width="11" height="11" border="0"	alt="" align="middle">&nbsp; '.'<A HREF="'.$_CORE->NOLANG_URL.$qs.'" class="w"><b>Rus</b></A>'
		: '<img src="/images/arr_r.gif"	width="11" height="11" border="0"	alt="" align="middle">&nbsp; '.'<A HREF="'.$_CORE->NOLANG_URL.'/en/'.$qs.'" class="w"><b>Eng</b></A>';
		echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
		break;
}
?>