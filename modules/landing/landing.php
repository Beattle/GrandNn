<?php global $_CORE; ?>
<!DOCTYPE html>
<html lang="ru">
<head>
	<title>Ломбард «Гранд Золото»</title>
	<link rel="stylesheet" href="<?=$_CORE->TEMPLATES.$_CORE->CURR_TPL?>/landing/css/normalize.css">
	<link rel="stylesheet" href="<?=$_CORE->TEMPLATES.$_CORE->CURR_TPL?>/landing/css/style.css">
	<link rel="stylesheet" href="<?=$_CORE->TEMPLATES.$_CORE->CURR_TPL?>/landing/css/style2.css">
	<link href='https://fonts.googleapis.com/css?family=Roboto+Slab:400,700&subset=cyrillic' rel='stylesheet' type='text/css'>
	<link href='https://fonts.googleapis.com/css?family=PT+Sans&subset=cyrillic' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="<?=$_CORE->TEMPLATES.$_CORE->CURR_TPL?>/landing/js/arcticmodal/jquery.arcticmodal-0.3.css">
	<link rel="stylesheet" href="<?=$_CORE->TEMPLATES.$_CORE->CURR_TPL?>/landing/js/arcticmodal/themes/simple.css">
	<link href="favicon.ico" rel="icon" type="ico">
</head>
<body>
<!-- Yandex.Metrika counter -->
<script type="text/javascript">
(function (d, w, c) {
    (w[c] = w[c] || []).push(function() {
        try {
            w.yaCounter35330345 = new Ya.Metrika({id:35330345,
                    webvisor:true,
                    clickmap:true,
                    trackLinks:true,
                    accurateTrackBounce:true});
        } catch(e) { }
    });

    var n = d.getElementsByTagName("script")[0],
        s = d.createElement("script"),
        f = function () { n.parentNode.insertBefore(s, n); };
    s.type = "text/javascript";
    s.async = true;
    s.src = (d.location.protocol == "https:" ? "https:" : "http:") + "//mc.yandex.ru/metrika/watch.js";

    if (w.opera == "[object Opera]") {
        d.addEventListener("DOMContentLoaded", f, false);
    } else { f(); }
})(document, window, "yandex_metrika_callbacks");
</script>
<noscript><div><img src="//mc.yandex.ru/watch/35330345" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
<!-- /Yandex.Metrika counter -->
<!-- Yandex.Metrika counter --><script type="text/javascript">(function (d, w, c) { (w[c] = w[c] || []).push(function() { try { w.yaCounter18622168 = new Ya.Metrika({id:18622168, webvisor:true, clickmap:true, trackLinks:true, accurateTrackBounce:true}); } catch(e) { } }); var n = d.getElementsByTagName("script")[0], s = d.createElement("script"), f = function () { n.parentNode.insertBefore(s, n); }; s.type = "text/javascript"; s.async = true; s.src = (d.location.protocol == "https:" ? "https:" : "http:") + "//mc.yandex.ru/metrika/watch.js"; if (w.opera == "[object Opera]") { d.addEventListener("DOMContentLoaded", f, false); } else { f(); } })(document, window, "yandex_metrika_callbacks");</script><noscript><div><img src="//mc.yandex.ru/watch/18622168" style="position:absolute; left:-9999px;" alt="" /></div></noscript><!-- /Yandex.Metrika counter -->

<script type="text/javascript">reCalc();</script>
	 <div class="menu">
		<div class="wrapper">			
			<p class="title"><span>Ломбард «Гранд Золото»</span></p>
			<p><a href="tel:88314325350"><span>8(831)432-53-50</span></a> <span class="map" onclick="$('#map1').arcticmodal()">ул. Родионова 17</span><br>
				<a href="tel:88314650068"><span>8(831)465-00-68</span></a> <span class="map" onclick="$('#map2').arcticmodal()">пр. Гагарина 66</span></p>
		</div>
	</div>

	<div class="slide">
		<div class="wrapper">
		<div id="slider-top" class="slider_wrap1">
			<a href="#6percent" class="b1"><img src="<?=$_CORE->TEMPLATES.$_CORE->CURR_TPL?>/landing/img/banner1.jpg"  width="960" height="360" alt=""></a>
			<a href="#double6percent" class="b2"><img src="<?=$_CORE->TEMPLATES.$_CORE->CURR_TPL?>/landing/img/banner2.jpg"  width="960" height="360" alt=""></a>
      		</div>
		</div>
	</div>

	<div class="probs">
		<div class="wrapper">
			<img class="left-img" src="<?=$_CORE->TEMPLATES.$_CORE->CURR_TPL?>/landing/img/libra.png" width="548" height="260" alt="">
			<h1>ДАЕМ ЗА <span>585<sup>o</sup></span><br>от <span>1400</span> руб/гр</h1>
		</div>
	</div>

	<div class="calculate">
		<div class="wrapper">
			<h1>РАССЧИТАТЬ ПЕРЕПЛАТУ</h1>
			<div class="container">
	<div class="calc">
		<div class="wrap">
            <div class="calc_box">
                <div class="left">
                    <label>Сумма: <input id="js_sum" type="text" name="sum" value="300 р." readonly="readonly"></label>
                    <div class="slider_wrap first"><div id="slider1" class="slider"></div></div>
                    <label>Срок: <input id="js_time" type="text" name="time" value="1 день" readonly="readonly"></label>
                    <div class="slider_wrap"><div id="slider2" class="slider"></div></div>
                </div>
                <div class="right">
                    <label class="first">Переплата: <input id="js_overpayment" type="text" name="overpayment" value="0 р." readonly="readonly"></label>
                    <label>Сумма возврата: <input id="js_refund" type="text" name="refund" value="300 р." readonly="readonly"></label>
                </div>
				<div class="clear"></div>
            </div>
		</div>
	</div>
</div>
			
		</div>
	</div>

	<div class="howto">
		<div class="wrapper">
			<h1>КАК ПОЛУЧИТЬ ЗАЙМ?</h1>
			<div class="calcul"><img src="<?=$_CORE->TEMPLATES.$_CORE->CURR_TPL?>/landing/img/calc.png" width="128" height="128" alt=""><br>Мы оцениваем предмет<br>
залога и расчитываем<br>
сумму займа</div>
			<div class="passport"><img src="<?=$_CORE->TEMPLATES.$_CORE->CURR_TPL?>/landing/img/passport.png" width="128" height="128" alt=""><br>Вы предоставляете Ваш<br>
паспорт для оформления<br>
договора</div>
			<div class="money"><img src="<?=$_CORE->TEMPLATES.$_CORE->CURR_TPL?>/landing/img/rub.png" width="128" height="128" alt=""><br>Получаете деньги</div>
		</div>
	</div>

	<div class="question">
		<div class="wrapper">
			<h1>ВОПРОСЫ</h1>
			<div class="faq">
			<a href="" class="q" id="6percent">На каких условиях предоставляется льготная ставка 6% за месяц?</a>
			<div class="a" id="6" style="display: block;">
			При первом обращении в Ломбард "Гранд Золото" вы можете оформить залог по льготном тарифному
плану "Первое обращение". Сумма займа не ограничена! За 30 дней пользования займом начисляется
всего 6%! При досрочном выкупе проценты пересчитываются! При займе до 30000 рублей проценты
с 1 по 5 день не начисляются! Первые 5 дней Вы пользуетесь деньгами совершенно бесплатно!
<br><br>
В случае опоздания, имущество хранится в ломбарде ещё 30 дней (льготный месяц). В течении
льготного месяца начисляется по 0,2% за каждый день опоздания. При продлении или
переоформлении договора акция "6% за 30 дней" перестает действовать. Новый договор оформляется
по основной тарифной ставке.<br><br>Акция действует только при оформлении одного договора.
			</div>

			<a href="" class="q" id="double6percent">Как Я могу еще раз воспользоваться акцией 6% за 30 дней?</a>
			<div class="a" id="openDouble6">
			Приводите друзей и получайте льготную ставку 6% за 30 дней.
			<br><br>
			При первом обращении в Ломбард «Гранд Золото» Вы можете оформить залог по акции "6% за 30 дней". В рамках этой акции при сумме займа до 30 000 рублей за первые 5 дней плата не взимается.
			<br><br>Если по Вашей рекомендации Ваш друг или знакомый оформляется в нашем ломбарде, то Вы можете воспользоваться льготным тарифом "6% за 30 дней" повторно: либо для оформления нового договора займа, либо для переоформления (продления) уже действующего договора. Количество переоформлений (продлений) по акции "6% за 30 дней" зависит от количества новых клиентов, оформившихся в ломбарде по Вашей рекомендации.<br><br>Акция действует только при оформлении одного договора.
			</div>

			<a href="" class="q">Если у меня есть непогашенные кредиты я могу рассчитывать на получение займа?</a>
			<div class="a">
			Да, конечно. Ваша кредитная история в данном случае значения не имеет.
			</div>

			<a href="" class="q">Как быстро я получу деньги?</a>
			<div class="a">
			Оценка залога займет не более 5 минут, сразу после этого вы получите деньги наличными.
			</div>

			<a href="" class="q">Безопасно ли оставлять в ломбарде ценные вещи?</a>
			<div class="a">
			Абсолютно безопасно. Все залоги находящиеся на хранение застрахованы и ломбард несет полную материальную ответственность за их сохранность.
			</div>

			<a href="" class="q">Что можно оставлять в залог, и как проходит оценка?</a>
			<div class="a">
			В залог принимаются любые изделия из золота, а также, цифровая техника : ноутбуки, сотовые телефоны, планшетные компьютеры, телевизоры, фотоаппараты и др.
			</div>

			<a href="" class="q">Могу ли я выкупить залог заранее и будет ли пересчитан %?</a>
			<div class="a">
			Вы можете погасить займ раньше срока, указанного в залоговом билете. При этом % будет пересчитаны по таблице проценных ставок ломбарда. Никаких штрафов или пенни за досрочное погашение не предусмотрено.
			</div>

			<a href="" class="q">Есть ли какие-то дополнительные штрафы или пени, помимо % по займу?</a>
			<div class="a">
			В нашем ломбарде нет никаких скрытых комиссий и пенни. Вы оплачивате только % по займу.
			</div>

			<a href="" class="q">Будет ли соблюдена конфиденциальность моих данных?</a>
			<div class="a">
			Мы гарантируем конфиденциальность данных о наших клиентах.
			</div>

			<a href="" class="q">Могу ли я сразу продать в ломбард свою вещь?</a>
			<div class="a">
			Да, конечно. Сообщите об этом оценщику, и Ваша вещь будет оформлена в скупку.
			</div>

			<div class="line"></div>
		</div>	
		</div>
	</div>

	<div class="docs">
		<div class="wrapper">
			<h1>НАШИ ДОКУМЕНТЫ</h1>
			<!-- onclick="$('#example1').arcticmodal()" -->
			<div class="doc1" onclick="$('#doc1').arcticmodal()"></div>
			<div class="doc2" onclick="$('#doc2').arcticmodal()"></div>
			<div class="doc3" onclick="$('#doc3').arcticmodal()"></div>
			<div style="display: none;">
    			<div class="box-modal" id="doc1">
       				<div class="box-modal_close arcticmodal-close">
       				<img src="<?=$_CORE->TEMPLATES.$_CORE->CURR_TPL?>/landing/img/close.png" class="close" width="16" height="16" alt=""></div>
        		<img src="<?=$_CORE->TEMPLATES.$_CORE->CURR_TPL?>/landing/img/doc1.jpg" alt="">
    			</div>
			</div>
			<div style="display: none;">
    			<div class="box-modal" id="doc2">
       				<div class="box-modal_close arcticmodal-close">
       				<img src="<?=$_CORE->TEMPLATES.$_CORE->CURR_TPL?>/landing/img/close.png" class="close" width="16" height="16" alt=""></div>
        		<img src="<?=$_CORE->TEMPLATES.$_CORE->CURR_TPL?>/landing/img/doc2.jpg" alt="">
    			</div>
			</div>
			<div style="display: none;">
    			<div class="box-modal" id="doc3">
       				<div class="box-modal_close arcticmodal-close">
       				<img src="<?=$_CORE->TEMPLATES.$_CORE->CURR_TPL?>/landing/img/close.png" class="close" width="16" height="16" alt=""></div>
        		<img src="<?=$_CORE->TEMPLATES.$_CORE->CURR_TPL?>/landing/img/doc3.jpg" alt="">
    			</div>
			</div>
		</div>
	</div>

	<div class="video">
		<div class="wrapper">
			<h1>ВИДЕО-ОТЗЫВЫ</h1>
			<div id="slider-feedback" class="slider_wrap01">
			<iframe width="560" class="active" height="315" src="https://www.youtube.com/embed/3h4jlUe8CME?rel=0&amp;controls=0&amp;showinfo=0" frameborder="0" allowfullscreen></iframe>
			<iframe width="560" class="active" height="315" src="https://www.youtube.com/embed/tgdnRwmVHho?rel=0&amp;controls=0&amp;showinfo=0" frameborder="0" allowfullscreen></iframe>
			<iframe width="560" class="active" height="315" src="https://www.youtube.com/embed/kOv_qF9Dct0?rel=0&amp;controls=0&amp;showinfo=0" frameborder="0" allowfullscreen></iframe>
      		</div>
		</div>
	</div>

	<div class="wehere">
		<div class="wrapper">
			<h1>МЫ НАХОДИМСЯ ЗДЕСЬ:</h1>
      		<script type="text/javascript" charset="utf-8" src="https://api-maps.yandex.ru/services/constructor/1.0/js/?sid=6TT61egLNPdyAISSO1bPdyT8VCUWnCnZ&width=960&height=400&lang=ru_RU&sourceType=constructor"></script>
		</div>
	</div>

	<footer>
		<div class="wrapper">			
			<p class="title"><span>Ломбард «Гранд Золото»</span></p>
			<p><a href="tel:88314325350"><span>8(831)432-53-50</span></a> <span class="map" onclick="$('#map1').arcticmodal()">ул. Родионова 17</span><br>
				<a href="tel:88314650068"><span>8(831)465-00-68</span></a> <span class="map" onclick="$('#map2').arcticmodal()">пр. Гагарина 66</span></p>
		</div>
	</footer>	
	<div style="display: none;">
    			<div class="box-modal" id="map1">
       				<div class="box-modal_close arcticmodal-close">
       				<img src="<?=$_CORE->TEMPLATES.$_CORE->CURR_TPL?>/landing/img/close.png" class="close" width="16" height="16" alt=""></div>
        		<script type="text/javascript" charset="utf-8" src="https://api-maps.yandex.ru/services/constructor/1.0/js/?sid=m9MPHxTU_oQUODvgjLCFk_Y3oDkJRat3&width=660&height=400&lang=ru_RU&sourceType=constructor"></script>
    			</div>
	</div>
	<div style="display: none;">
    			<div class="box-modal" id="map2">
       				<div class="box-modal_close arcticmodal-close">
       				<img src="<?=$_CORE->TEMPLATES.$_CORE->CURR_TPL?>/landing/img/close.png" class="close" width="16" height="16" alt=""></div>
        		<script type="text/javascript" charset="utf-8" src="https://api-maps.yandex.ru/services/constructor/1.0/js/?sid=R65q9_xX9ozTqX0RikvdyTMZNzi1DLPZ&width=660&height=400&lang=ru_RU&sourceType=constructor"></script>
    			</div>
	</div>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
<script src="<?=$_CORE->TEMPLATES.$_CORE->CURR_TPL?>/landing/js/arcticmodal/jquery.arcticmodal-0.3.min.js"></script>
<script src="<?=$_CORE->TEMPLATES.$_CORE->CURR_TPL?>/landing/js/scripts.js"></script>
<!-- <script type="text/javascript" src="js/jquery.min.js"></script> -->
<script type="text/javascript" src="<?=$_CORE->TEMPLATES.$_CORE->CURR_TPL?>/landing/js/jquery-ui.min.js"></script>
<script type="text/javascript" src="<?=$_CORE->TEMPLATES.$_CORE->CURR_TPL?>/landing/js/script.js"></script>
<script crossorigin="anonymous" async type="text/javascript" src="//api.pozvonim.com/widget/callback/v3/8ec2645917d84b574de3530616164d36/connect" id="check-code-pozvonim" charset="UTF-8"></script>
</body>
</html>