<?php 
	/*
	 * ��� ����� � get �������
	 * � ������������ ��� ������������� ���������
	 */ 
	
	define('PARSER_SEARCH_PARAM','DetailNumber');
	/*
	 * ����� ����������� � �������.
	 * ���� ����������� ��� ��������� ������
	 */
	define('PARSER_LOGIN','LYDKV');
	/*
	 * ������ ����������� � �������
	 */
	define('PARSER_PASS','8vn4oe31');
	
	/*
	 * id ���������
	 * ��� zipauto only
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