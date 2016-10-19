<?
//if (empty($_SESSION['SESS_AUTH']['ID'])) return;
//
//include_once "lib_includer.php"; //	+ $db =	new
//$search	= select_sql( '*', TAB_AUTH_PERS, "author_id	= '".$_SESSION['SESS_AUTH']['ID']."'" );
//if ($search->Result	&& $search->NumRows>0) {
global $_CORE;

include_once "auth.class.inc.php";

switch ($Cmd) {
	case 'forget_send':
		if (!empty($_REQUEST['login'])) {
			$author = SQL::getall('*', TAB_AUTH_PERS, " author_login = '".$_REQUEST['login']."' ", '', DEBUG, 'first' );
			if (!empty($author)) {

				// Отправим письмо

				if (!$_CORE->dll_load ('class.lMail'))
					die ($_CORE->error_msg());

				$data['body']		= sprintf($_CORE->lang['forget_message'], $author['author_comment'], $author['author_passwd']);
				$data['name']		= $_CORE->lang['forget_name'];
				$data['subject']	= $_CORE->lang['forget_subject'];
				$data['email']		= $_CORE->lang['forget_email'];
				$data['mailto']		= $author['author_login'];

				lMail::send($data);
				
				echo "<H1>".$_CORE->lang['password_sent']."</H1><div class=success>". $_CORE->lang['password_sent_message'].'</div>';
				break;

			}else {
				echo "<div class=error>". $_CORE->lang['incorrect_email'].'</div>';
			}
		}else {
			echo "<div class=error>". $_CORE->lang['empty_login'].'</div>';
		}
		$no_title = true;
	case "nothing":
		break;
	case 'forget':
	case "block":
		if (Main::comm_inc("auth_$Cmd.html", $f, 'auth'))
			include "$f";
		break;
}

return ;