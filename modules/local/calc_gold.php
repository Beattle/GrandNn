<?php
  // ������������  �������� ����  
  /*
  *   $_REQUEST['tariff'] = 1; echo cmd('/local/calc'); unset($_REQUEST['tariff']); 
  *   ��� $_REQUEST['tariff'] ���������� id ������ � ������� $calc
  *   � ������� $calc �������� ���������� ������ ��� �������
  *
  */	
	$_REQUEST['weight'] = (int)$_REQUEST['weight'];
	$_REQUEST['id_price'] = (int)$_REQUEST['id_price']; 
	$_REQUEST['proba'] = (int)$_REQUEST['proba'];
	$proba = array('500'=>'proba500','583/585'=>'proba585', '750'=>'proba750', '375'=>'proba375', '850'=>'proba850', '958'=>'proba958');
	
	$res_prices = SQL::getall("*", DB_TABLE_PREFIX."price", "proba500>0 OR proba585>0 OR proba750>0 OR proba375>0 OR proba850>0 OR proba958>0 ", "ORDER BY 'prior'", DEBUG);
	//echo "<pre>"; print_r($res_prices); echo "</pre>";
	if(is_array($res_prices) && count($res_prices)>0){ ?>

	<table class="calc" >
		<tbody>
			<tr>
				<td style="text-align: left; height: 52px;">��������� �������:<br />
					<select name="id_price" id="sel1" onchange="$('#cuselFrame-sel123 .cuselText').text('��������...'); $('#sel123').val(''); $('.optgroup').hide();$('.opt'+$(this).val()).show();" style="width: 400px;">
						<option value="">��������...</option>
					<?
						foreach($res_prices as $price){ ?>
							<option value="<?=$price['id'];?>"><?=$price['name'];?></option>
					<? 	} ?>
					</select>
				</td>
				</tr>
				<tr>
				<td style="text-align: left; height: 32px;">����� �������:
					<select class="sel_proba" id="sel123" >
						<option value="">��������...</option>
	<?
		foreach($res_prices as $price){ ?>
			<?
			foreach($proba as $key=>$field_name){
				if(!empty($price[$field_name])){ ?>
					<option class="opt<?=$price['id'];?> optgroup" style="display: none;" value="<?=$price[$field_name];?>"><?=$key;?></option>
				<?
				}
			} ?>
			
		<?
		}
	
?>
				</select>
				���:
				<input id="massa_gold" type="text" placeholder="0.00" value="" style=" font-size: 18px;
    margin-bottom: -8px;
    margin-left: 10px;
    width: 100px;" /> ��.
			</td>
			</tr>
			<tr>
			<td style="text-align: left;">
				<div id="result_gold" style="width: 250px; float: left; text-align: center;" ></div>
				<input type="button" id="calc_gold" class="btn" value="����������" />
			</td>
		</tr>
	</tbody>
</table>
<p id="result_gold" style="text-align: center; font-size: 14px;">*&nbsp;����� ������ ������ ����� ����������� � ����� ��������</p>
<div class="cl"></div>
<script type="text/javascript">
	$(document).ready(function() {
      var params = {
      		changedEl: ".zakaz select",
      		visRows: 7,
      		scrollArrows: true
      	}
      	cuSel(params);

    $('#calc_gold').click(function(){
      var massa = $("#massa_gold").val();
      var price = $("#sel123").val();
      var result = massa*price;
      if( price>0 && massa>0 && result>0){
        $('#result_gold').html(result +' ���');
      }else{
      	$('#result_gold').html('<span style="color:red;">����� �� ���������</span>');
      }
    });
 });
</script>
<? } ?>