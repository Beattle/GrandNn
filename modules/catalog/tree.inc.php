<?php
	$moduleTree = array(
		array(
		'name'	=> '�������' ,
		'path'	=> '/catalog',
		'next'	=> array(
				array(
					'name'	=> '���������� ������',
					'path'	=> '/basketorders/checkout'
				),
				array(
					'name'	=> '������ ���������',
					'path'	=> '/basketorders/delivery'
				),
			)
		),
		array(
		'name'	=> '���� ������',
		'path'	=> '/basketorders/myorders',
		'next'	=> array(
				array(
					'name'	=> '�������� ������',
					'path'	=> '/basketorders/myorders/item'
				),
			)
		),
		
	);
?>