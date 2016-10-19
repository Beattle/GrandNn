<?php 
	/*
	 * имя ключа в get массиве
	 * и одновременно имя отправляемого параметра
	 */ 
	
	define('PARSER_SEARCH_PARAM','DetailNumber');
	/*
	 * логин авторизации в сервисе.
	 * если авторизации нет оставляем пустым
	 */
	define('PARSER_LOGIN','LYDKV');
	/*
	 * пароль авторизации в сервисе
	 */
	define('PARSER_PASS','8vn4oe31');
	
	/*
	 * id контракта
	 * для zipauto only
	 */
	define('PARSER_CONTRACT_ID',62);
	
	function for_zip_auto()
	{
		if(defined('PARSER_CONTRACT_ID'))
		{
			return 'ContractID='.PARSER_CONTRACT_ID.'&MakerID=';
		}
		return false;
	}
	$this->isXml = true;
?>