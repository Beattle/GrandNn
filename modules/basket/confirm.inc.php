<?php
		if( $_BASKET['ERROR'] == BASKET_ERR_SEND ){
			$_BASKET['ERROR'] = "Поздравляем! Ваш заказ №".$form['alias']." от ".date("d.m.Y",strtotime($form['ts']))." сформирован и отправлен в обработку. В ближайшее время Наш менеджер свяжется с Вами";
			$str = '<script type="text/javascript">
						function rrAsyncInit() {
							try {
								rrApi.order({
									transaction: '.$form['alias'].',
									items: [
					';
					$i = 0;
			foreach ($basket_cont as $subjs => $vals) {
				$i++;
				foreach ($vals as $id => $data) {
					$data['price'] = str_replace(" ", '',$data['price']);
					$link = explode('/',$data['link']);
					$data['alias'] = array_pop($link);
					$str .= '{ id: '.$data['alias'].', qnt: '.$data['count'].', price: '.$data['price'].'}';
				}
				if(count($basket_cont) > $i) $str .= ",\n\r";
			}
			$str .= '
									]
								});
							} catch(e) {}
						}
					</script>';
			$_SESSION['_BASKET_CONFIRM'] = $str;
		}
		$_SESSION['_BASKET_ERROR'] = $_BASKET['ERROR'];
		header("Location: ".$after);
		die ();