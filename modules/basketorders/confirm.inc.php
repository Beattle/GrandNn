<?php
/*
1. �������� ������������ 
2. ����� plugin - ��� �������� � �������� �����
3. ����� ���� confirm - �� ���� ����. 
4. ����� � ���� �������� �� after

*/
		if( $_BASKET['ERROR'] == BASKET_ERR_SEND ){
			$_BASKET['ERROR'] = "�����������! ��� ����� �".$data['id']." �� ".date("d.m.Y",strtotime($data['ts']))." ����������� � ��������� � ���������. � ��������� ����� ��� �������� �������� � ����";
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
<h2>������� �� ��� ����� #<?=$data['id']?></h2>

<p>����� ����� ������� � ������ ���������. � ���� ��������� �������� � ����.
<p>�������� � <a href="/basketorders/myorders">������ �������</a>, ��� �� ���������� �� �������� ������ ������.
<p>����� ������������� ����� �������� ����������� ������ ������.

<?=$_SESSION['_BASKET_CONFIRM']?>

<?php echo '<pre>'.print_r($_POST,true).'</pre>'; ?>
<?php echo '<pre>'.print_r($data,true).'</pre>';?>


