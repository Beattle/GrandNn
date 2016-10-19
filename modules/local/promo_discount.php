<?php
	global $_CONF;
	if(!empty($_REQUEST['promocode']) && /*!empty($_SESSION['SESS_AUTH']['ID']) && */!isset($_SESSION['_BASKET_DISCOUNT'])){
		if (!empty($_SESSION['_BASKET_CONT'])) {
			$Summ = $Items = $Names = 0;
			$i	= 0;
			$_REQUEST['promocode'] = mysql_real_escape_string($_REQUEST['promocode']);
			$promo = SQL::getval('discount',DB_TABLE_PREFIX.'promocode',"code = '".$_REQUEST['promocode']."'"); // AND phone = '".$_SESSION['SESS_AUTH']['ALL']['author_phone']."'
			
			if(!empty($promo)){
				$promo = (int)$promo;
				foreach ($_SESSION['_BASKET_CONT'] as $subjs => $vals) {
					foreach ($vals as $id => $data) {
						if(!empty($data['discount'])){ 
							if($promo > $data['discount']){
								$data['price'] = $data['price_lost']-$data['price_lost']*$promo/100;
								$_SESSION['_BASKET_CONT'][$subjs][$id]['discount'] = $promo;
							}
						}else{
							$data['price_lost'] = $data['price'];
							$data['price'] = $data['price']-$data['price']*$promo/100;
							$_SESSION['_BASKET_CONT'][$subjs][$id]['discount'] = $promo;
							$_SESSION['_BASKET_CONT'][$subjs][$id]['price_lost'] = $data['price_lost'];
						}
						$_SESSION['_BASKET_CONT'][$subjs][$id]['price'] = $data['price'];
						
						$Items	+= $data['count'];
						$Summ	+= $data['count']*intval(str_replace(",", '',$data['price']));
						$i++;
						$Names++;
					}
				}
			}
			$Summ = $Summ;
			$_SESSION['_BASKET_SUMM'] = $Summ;
			$_SESSION['_BASKET_ITEMS'] = $Items;
			$_SESSION['_BASKET_NAMES'] = $Names;
			$_SESSION['_BASKET_DISCOUNT'] = true;
			
		}
	}
	header("Location: /basket/view");
	die;
?>