<?php
  // подключается  вставкой кода  
  /*
  *   $_REQUEST['tariff'] = 1; echo cmd('/local/calc'); unset($_REQUEST['tariff']); 
  *   где $_REQUEST['tariff'] определяет id ставки в массиве $calc
  *   в массиве $calc хранятся процентные ставки для расчета
  *
  */	
	$_REQUEST['summa'] = (int)$_REQUEST['summa'];
	$_REQUEST['days'] = (int)$_REQUEST['days']; 
	$_REQUEST['tariff'] = (int)$_REQUEST['tariff'];
	$calc[1][1] = array( 
					1=>0.48,				2=>0.97,			3=>1.45,				4=>1.94,
					5=>2.43,				6=>2.91,			7=>3.40,				8=>3.89,
					9=>4.37,				10=>4.86,			11=>5.35,				12=>5.83,
					13=>6.32,				14=>6.80,			15=>7.29,				16=>7.78,
					17=>8.26,				18=>8.75,			19=>9.23,				20=>9.72,
					21=>10.21,				22=>10.69,			23=>11.18,				24=>11.66,
					25=>12.15,				26=>12.64,			27=>13.12,				28=>13.61,
					29=>14.09,				30=>14.58,			31=>15.07,				32=>15.55,
					33=>16.04,				34=>16.52,			35=>17.01,				36=>17.5,
					37=>17.98,				38=>18.47,			39=>18.95,				40=>19.44,
					41=>19.93,				42=>20.41,			43=>20.90,				44=>21.38,
					45=>21.87,				46=>22.36,			47=>22.84,				48=>23.33,
					49=>23.81,				50=>24.30,			51=>24.79,				52=>25.27,
					53=>25.76,				54=>26.24,			55=>26.73,				56=>27.22,
					57=>27.70,				58=>28.19,			59=>28.67,				60=>29.16
					);
	$calc[1][2] = array( 
					1=>0.48,				2=>0.97,			3=>1.45,				4=>1.94,
					5=>2.43,				6=>2.91,			7=>3.4,					8=>3.888,
					9=>4.374,				10=>4.86,			11=>5.288,				12=>5.716,
					13=>6.144,				14=>6.572,			15=>7.0,				16=>7.2,
					17=>7.4,				18=>7.6,			19=>7.8,				20=>8.0,
					21=>8.2,				22=>8.4,			23=>8.6,				24=>8.8,
					25=>9.0,				26=>9.2,			27=>9.4,				28=>9.6,
					29=>9.8,				30=>10.0,			31=>10.33,				32=>10.67,
					33=>11.0,				34=>11.33,			35=>11.67,				36=>12.0,
					37=>12.33,				38=>12.67,			39=>13.0,				40=>13.33,
					41=>13.67,				42=>14.0,			43=>14.33,				44=>14.67,
					45=>15.0,				46=>15.33,			47=>15.67,				48=>16.0,
					49=>16.33,				50=>16.67,			51=>17.0,				52=>17.33,
					53=>17.67,				54=>18.0,			55=>18.33,				56=>18.67,
					57=>19.0,				58=>19.33,			59=>19.67,				60=>20.0
					);
	$calc[2] = array( 
					1=>0.48,					2=>0.97,				3=>1.45,					4=>1.94,
					5=>2.43,					6=>2.91,				7=>3.4,					8=>3.8,
					9=>4.3,					10=>4.86,			11=>5.2,				12=>5.4,
					13=>5.6,				14=>5.8,			15=>6.0,				16=>6.2,
					17=>6.4,				18=>6.6,			19=>6.8,				20=>7.0,
					21=>7.2,				22=>7.4,			23=>7.6,				24=>7.8,
					25=>8.0,				26=>8.2,			27=>8.4,				28=>8.6,
					29=>8.8,				30=>9.0,			31=>9.3,				32=>9.6,
					33=>9.9,				34=>10.2,			35=>10.5,				36=>10.8,
					37=>11.1,				38=>11.4,			39=>11.7,				40=>12.0,
					41=>12.3,				42=>12.6,			43=>12.9,				44=>13.2,
					45=>13.5,				46=>13.8,			47=>14.1,				48=>14.4,
					49=>14.7,				50=>15.0,			51=>15.3,				52=>15.6,
					53=>15.9,				54=>16.2,			55=>16.5,				56=>16.8,
					57=>17.1,				58=>17.4,			59=>17.7,				60=>18.0
					);

  
   
  if(!empty($_REQUEST['summa']) && !empty($_REQUEST['days']) &&  !empty($calc[$_REQUEST['tariff']]) ){
    $result = 0;
    if($_REQUEST['tariff']==1){
      if($_REQUEST['summa']<5000){
        $result = ($_REQUEST['summa'] * $calc[1][1][$_REQUEST['days']]/100)+$_REQUEST['summa'];
      }else{
        $result = ($_REQUEST['summa'] * $calc[1][2][$_REQUEST['days']]/100)+$_REQUEST['summa'];
      }
      
    }elseif($_REQUEST['tariff']==2){ 
      
      $result = ($_REQUEST['summa'] * $calc[2][$_REQUEST['days']]/100)+$_REQUEST['summa'];
      
    }
    echo ceil($result);
    die;
  } elseif(!empty($_REQUEST['tariff'])){
?><!--

<script type="text/javascript" src="jquery.min.js" charset="utf-8"></script>
-->
<script type="text/javascript" src="<?=$_CORE->TEMPLATES.$_CORE->CURR_TPL?>/JS/main.js"></script>
<link href="<?=$_CORE->TEMPLATES.$_CORE->CURR_TPL?>/CSS/ion.rangeSlider_main.css" rel="stylesheet" type="text/css" />
<link href="<?=$_CORE->TEMPLATES.$_CORE->CURR_TPL?>/CSS/ion.rangeSlider.skinSimple_main.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="<?=$_CORE->TEMPLATES.$_CORE->CURR_TPL?>/JS/ion.rangeSlider.js"></script>

<?php /*
старый калкулятор
<table class="calc">
  <tbody>
      <tr>
          <td>Сумма залога (рублей):<br /><input id="summa<?=$_REQUEST['tariff']?>" type="text" value="" /></td>
          <td>На какой срок (от 1 до 30 дней):<br /><input id="days<?=$_REQUEST['tariff']?>" type="text" value="1" /></td>
      </tr>
      <tr>
          <td colspan="2">
		  <div id="dolg<?=$_REQUEST['tariff']?>" style="width: 250px; float: left;" ></div>
		  <input type="button" id="calc<?=$_REQUEST['tariff']?>" class="btn" value="Рассчитать" /></td>
      </tr>
  </tbody>
</table>
<p style="text-align: center; font-size: 14px;">Для получения информации по залогу заполните поля выше и нажмите рассчитать.</p>
<script type="text/javascript">
	$(document).ready(function() {
    $('#calc<?=$_REQUEST['tariff']?>').click(function(){
      var vsumma = $("#summa<?=$_REQUEST['tariff']?>").val();
      var vdays = $("#days<?=$_REQUEST['tariff']?>").val();
      if(vsumma>0 && vdays>0 && vdays<=30 ){
        $.ajax({
          type: "POST",
          url: "/empty/local/calc",
          data: ({summa : vsumma, days : vdays, tariff: <?=$_REQUEST['tariff'];?> }),
          success: function(data){$("#dolg<?=$_REQUEST['tariff']?>").html('Сумма к возврату: <span style="font-size:24px;">' + data+ "</span> рублей");}
        });
      }
    });
 });
</script>*/ ?>

<script type="text/javascript">var calcTariffs = {
			<?php
	$i = 0;
	foreach ($calc[$_REQUEST['tariff']] as $key => $val){
		if(is_array($val) && count($val)){
			echo $key.': [';
			foreach($val as $day => $sum){ 
				echo "{maxMoney: Infinity,
						day: ".$day.",
						percent: ".str_replace(',','.',$sum)."*1},";
				
			}
			echo '],';
			
		}else{
			if(!$i) echo '0: [';
			echo "{maxMoney: Infinity,
						day: ".$key.",
						percent: ".str_replace(',','.',$val)."},";$i++;
			if($i == count($calc[$_REQUEST['tariff']])) echo ']';
			
		}
	}
?>
};</script>

<div id="calc">
		<div class="calcSum">
 <span class="sectHeader">Сумма<br>залога</span><input type="text" class="ion" value="300;300000" style="display: none;"> <input type="text" class="summary">
		</div>
		<div class="calcDays">
 <span class="sectHeader">Срок<br>залога</span> <input type="text" class="ion" value="3;60" style="display: none;"> <input type="text" class="summary">
		</div>
		<div class="calcFooter">
			<div class="percentDay">
 <span class="sectHeader">Переплата</span> <span class="summary" style="font-size:24px;">0 р.</span>
			</div>
			<div class="forPay">
 <span class="sectHeader">На выкуп</span> <span class="summary" style="font-size:24px;">0 р.</span>
			</div>
		</div>
	</div>
	
<? } else {
  die;
} ?>