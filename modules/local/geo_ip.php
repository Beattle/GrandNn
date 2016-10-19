<?php 
$tabGeoIp = DB_TABLE_PREFIX.'geo_ip';
$tabCity = DB_TABLE_PREFIX.'geo_citynames';

$result = '';

global $_CONF;

// subdomaind
switch ($_SERVER['HTTP_HOST']) {
	case 'msk.grandnn.com':	
        setcookie('GEO_CITY_ID', 2097, time() + 3600 * 24 * 90, '/');
        setcookie('GEO_CITY_NAME', 'Москва', time() + 3600 * 24 * 90, '/');
		//$result['name'] = $_COOKIE['GEO_CITY_NAME'] = 'Москва';
		 $_COOKIE['GEO_CITY_NAME'] = 'Москва';
		 $_COOKIE['GEO_CITY_ID'] = 2097;
		 $_CONF['GEO_IP'] = 'Москва';
		break;
}

if(!empty($_GET['selcity']) && intval($_GET['selcity'])){
    $nameCity = SQL::getval('name',$tabCity,'id='.intval($_GET['selcity']),'',0);
    if(!empty($nameCity)){
        setcookie('GEO_CITY_ID', intval($_GET['selcity']), time() + 3600 * 24 * 90, '/');
        setcookie('GEO_CITY_NAME', $nameCity, time() + 3600 * 24 * 90, '/');
    }
	switch ($nameCity){
		case "Москва": $domain = 'msk.';break;
		default: $domain = '';
	}
	$tail_ref = strstr($_SERVER['HTTP_REFERER'], 'grandnn.com');
	header('location: http://'.$domain.$tail_ref); 
    die;
}

if(!empty($_SERVER['SERVER_ADDR']) && empty($_COOKIE['GEO_CITY_ID'])){
    if($_SERVER['SERVER_ADDR'] == '127.0.0.1')
        $_SERVER['SERVER_ADDR'] = '83.149.45.29';
    $result = SQL::getrow('b.name, b.region, b.id',$tabGeoIp." as a LEFT JOIN ".$tabCity." as b ON a.cityId = b.id","a.`startIpNum` <= INET_ATON( '".$_SERVER['SERVER_ADDR']."' ) 
AND a.`endIpNum` >= INET_ATON(  '".$_SERVER['SERVER_ADDR']."' ) ", "ORDER BY a.`startIpNum` ASC",0);
    if(is_array($result) && !empty($result['id'])){
        
        setcookie('GEO_CITY_ID', $result['id'], time() + 3600 * 24 * 90, '/');
        $_COOKIE['GEO_CITY_ID'] = $result['id'];
        setcookie('GEO_CITY_NAME', $result['name'], time() + 3600 * 24 * 90, '/');
        $_COOKIE['GEO_CITY_NAME'] = $_CONF['GEO_IP'] = $result['name'];
    }
}
$nalCity = SQL::getall('id,name', $tabCity, "hidden = 0","ORDER BY name ASC",0);

// сделаем флаг, что пользователь не в родном регионе (повлияет на меню и далее)
$h = ($_COOKIE['GEO_CITY_NAME'] != "Нижний Новгород");
setcookie('GEO_NONHOME', $h, time() + 3600 * 24 * 90, '/');
$_COOKIE['GEO_NONHOME'] = $h;

?>

<style>
.dropdown {
    display: none;
    position: absolute;
    top: 19px;
    left: 50%;
    margin-left: -100px;
    width: 227px;
    text-align: center;
    background: #fff;
    -moz-border-radius: 5px;
    -webkit-border-radius: 5px;
    border-radius: 5px;
    box-shadow: 1px 1px 1px 0 #b2a7a7;
    z-index: 100;
}
.lang-select {
    cursor: default;
    padding-right: 14px;
    position: relative;
    display: inline-block;
    vertical-align: middle;
    padding: 0 10px 0 0px;
}
.lang-select > span {
    display: inline-block;
    line-height: 1;
    border-bottom: 1px dotted #d4a53b;
    cursor: pointer;
    color: #d4a53b;
    font-size: 16px;
}
.dropdown.land-select .links-land {
    text-align: left;
    line-height: 1.4;
}
.links-land p {
    display: inline-block;
    vertical-align: top;
    width: 180px;
    font-size: 14px;
    margin-bottom: 10px;
    padding: 0px;
    margin: 0;
}

.dropdown.land-select .box {
    padding: 12px 15px 10px;
    background-color: #211e1f;
    position: relative;
}
.lang-select.lang-select1 .dropdown.land-select {
    left: auto;
    margin-left: 0;
    position: absolute;
    right: -250px;
}
.social .links-land p a{
    width: auto;
    display: inline;
    float: none;
    height: inherit;
    margin: 0px;
    border: none;
}
</style>
<script>
function load_city2fancy(){
    $.fancybox({
        content: $('#select_city').html()
    });
}
$(document).ready(function() {

    $('.lang-select > span').on('click', function(event){
        load_city2fancy();
	});
<?php if(!empty($result['name']) ){ ?>
    $.fancybox({
        content: 'ВАШ ГОРОД <?=$result['name'];?>?<br /><br /><a href="javascript:;" class="btn" style="font-size: 14px; width: auto; display: inline-block; padding: 8px 20px 7px 20px;" onclick="$.fancybox.close();" >ВСЕ ВЕРНО</a> <a href="javascript:;" class="btn" style="text-transform: inherit; font-size: 14px; width: auto; display: inline-block; padding: 8px 20px 7px 20px;"  onclick="load_city2fancy();">Нет. Я в другом городе</a>'
        
    });
<?php } ?>

});
</script>
<div class="lang-select lang-select1">
    <span>
        <?php
        if(!empty($_COOKIE['GEO_CITY_NAME'])){
            echo $_COOKIE['GEO_CITY_NAME'];
        }else{
            echo 'Выберите город';
        }
        ?>
    </span>
    <i class="arrow_lang"></i>
    <div class="dropdown land-select" id="select_city" >
        <div class="box" style="width: 775px;">
            <i class="arrow"></i>
            <div class="links-land">
            <?php
            foreach($nalCity as $row){
            ?>
                <p><a href="/empty/local/geo_ip?selcity=<?=$row['id'];?>"><?=$row['name'];?></a></p>
            <?php
            }
            ?>
            </div><!--.links-land-end-->
        </div><!--.box-end-->
    </div><!--.dropdown-end-->
<!--end-->
</div>