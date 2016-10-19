<?php
	$moduleTree = array(
		array(
		'name'	=> 'Каталог' ,
		'path'	=> '/catalog',
		'next'	=> array(
				array(
					'name'	=> 'Оформление заказа',
					'path'	=> '/basketorders/checkout'
				),
				array(
					'name'	=> 'Способ получения',
					'path'	=> '/basketorders/delivery'
				),
			)
		),
		array(
		'name'	=> 'Ваши заказы',
		'path'	=> '/basketorders/myorders',
		'next'	=> array(
				array(
					'name'	=> 'Просмотр заказа',
					'path'	=> '/basketorders/myorders/item'
				),
			)
		),
		
	);
?>