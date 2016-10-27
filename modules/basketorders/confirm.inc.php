<?php
/*
1. проверка пользователя 
2. потом plugin - его создание и отправка почты
3. потом если confirm - то этот файл. 
4. потом в ядре редирект на after

*/
		if( $_BASKET['ERROR'] == BASKET_ERR_SEND ){
			$_BASKET['ERROR'] = "Поздравляем! Ваш заказ №".$data['id']." от ".date("d.m.Y",strtotime($data['ts']))." сформирован и отправлен в обработку. В ближайшее время Наш менеджер свяжется с Вами";
			$str = '<script type="text/javascript">
						function rrAsyncInit() {
							try {
								rrApi.order({
									transaction: "'.$data['id'].'",
									items: [
					';
					$i = 0;
			$data = $basketOrders->loadOrder($data['alias']);
			foreach ($data['items'] as $item) {
				$itemData = STR::json_decode_cyr($item['item_data'],true);
				$itemData = STR::utf_to_win($itemData,true);
				$item = array_merge($itemData,$item);
				$i++;
				$item['full_price'] = str_replace(" ", '',$item['full_price']);
				$str .= '{ id: '.$item['alias'].', qnt: '.$item['cnt'].', price: '.$item['full_price'].'}';
				if(count($data['items']) > $i) $str .= ",\n\r";
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
		//header("Location: ".$after);
		//die ();
		
?>
<h2>Спасибо за ваш заказ #<?=$data['id']?></h2>

<p>Заказ будет передан в службу обработки. И наши операторы свяжутся с вами.
<p>Пройдите в <a href="/basketorders/myorders">личный кабинет</a>, что бы проследить за статусом вашего заказа.
<p>После подтверждения будет доступна возможность оплаты онлайн.
<?php

/*     echo $_SESSION['_BASKET']['contacts']['name'];
     echo $_SESSION['_BASKET']['contacts']['phone'];
     echo $_SESSION['_BASKET']['contacts']['email'];*/
?>
<?=$_SESSION['_BASKET_CONFIRM']?>

    <?php $prods = array();
     if(!empty($data['items'])){?>
        <script type="text/javascript">
            var prodObj = [];
            <?php foreach ($data['items'] as  $key =>$item){?>
                prodObj[<?php echo $key?>] = <?php echo "$item[item_data]";?>;
            <?php } ?>
            var prods = [];
            for (var i=0,l=prodObj.length;i<l;i++){
                prods[i] = {};
                prods[i].Name = prodObj[i].name;
                prods[i].Price = prodObj[i].price;
                prods[i].Count = prodObj[i].cnt;
            }
            console.log(JSON.stringify(prods));

        </script>


     <?php } ?>




<?php if($_POST['BASKET_PAYMENT'] == 2){ ?>
     <a id="lkredit" style="display: none" href="#">Купить в кредит</a>
    <script type="text/javascript">
                kreditlineBig.create({
                goods:    JSON.stringify(prods),
                site:     'grandnn.com',
                siteName: 'Ювелирный дом "Гранд"',
                elm:      'lkredit',
                URLSuccess: 'http://basketorders/myorders',
                autostart:true
                });
    </script>
<?php } ?>


