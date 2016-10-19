<?php global $_CORE; ?>
<!DOCTYPE html>
<html lang="ru">
<head>
	<title>������� ������ ������</title>
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
			<p class="title"><span>������� ������ ������</span></p>
			<p><a href="tel:88314325350"><span>8(831)432-53-50</span></a> <span class="map" onclick="$('#map1').arcticmodal()">��. ��������� 17</span><br>
				<a href="tel:88314650068"><span>8(831)465-00-68</span></a> <span class="map" onclick="$('#map2').arcticmodal()">��. �������� 66</span></p>
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
			<h1>���� �� <span>585<sup>o</sup></span><br>�� <span>1400</span> ���/��</h1>
		</div>
	</div>

	<div class="calculate">
		<div class="wrapper">
			<h1>���������� ���������</h1>
			<div class="container">
	<div class="calc">
		<div class="wrap">
            <div class="calc_box">
                <div class="left">
                    <label>�����: <input id="js_sum" type="text" name="sum" value="300 �." readonly="readonly"></label>
                    <div class="slider_wrap first"><div id="slider1" class="slider"></div></div>
                    <label>����: <input id="js_time" type="text" name="time" value="1 ����" readonly="readonly"></label>
                    <div class="slider_wrap"><div id="slider2" class="slider"></div></div>
                </div>
                <div class="right">
                    <label class="first">���������: <input id="js_overpayment" type="text" name="overpayment" value="0 �." readonly="readonly"></label>
                    <label>����� ��������: <input id="js_refund" type="text" name="refund" value="300 �." readonly="readonly"></label>
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
			<h1>��� �������� ����?</h1>
			<div class="calcul"><img src="<?=$_CORE->TEMPLATES.$_CORE->CURR_TPL?>/landing/img/calc.png" width="128" height="128" alt=""><br>�� ��������� �������<br>
������ � �����������<br>
����� �����</div>
			<div class="passport"><img src="<?=$_CORE->TEMPLATES.$_CORE->CURR_TPL?>/landing/img/passport.png" width="128" height="128" alt=""><br>�� �������������� ���<br>
������� ��� ����������<br>
��������</div>
			<div class="money"><img src="<?=$_CORE->TEMPLATES.$_CORE->CURR_TPL?>/landing/img/rub.png" width="128" height="128" alt=""><br>��������� ������</div>
		</div>
	</div>

	<div class="question">
		<div class="wrapper">
			<h1>�������</h1>
			<div class="faq">
			<a href="" class="q" id="6percent">�� ����� �������� ��������������� �������� ������ 6% �� �����?</a>
			<div class="a" id="6" style="display: block;">
			��� ������ ��������� � ������� "����� ������" �� ������ �������� ����� �� �������� ���������
����� "������ ���������". ����� ����� �� ����������! �� 30 ���� ����������� ������ �����������
����� 6%! ��� ��������� ������ �������� ���������������! ��� ����� �� 30000 ������ ��������
� 1 �� 5 ���� �� �����������! ������ 5 ���� �� ����������� �������� ���������� ���������!
<br><br>
� ������ ���������, ��������� �������� � �������� ��� 30 ���� (�������� �����). � �������
��������� ������ ����������� �� 0,2% �� ������ ���� ���������. ��� ��������� ���
�������������� �������� ����� "6% �� 30 ����" ��������� �����������. ����� ������� �����������
�� �������� �������� ������.<br><br>����� ��������� ������ ��� ���������� ������ ��������.
			</div>

			<a href="" class="q" id="double6percent">��� � ���� ��� ��� ��������������� ������ 6% �� 30 ����?</a>
			<div class="a" id="openDouble6">
			��������� ������ � ��������� �������� ������ 6% �� 30 ����.
			<br><br>
			��� ������ ��������� � ������� ������ ������ �� ������ �������� ����� �� ����� "6% �� 30 ����". � ������ ���� ����� ��� ����� ����� �� 30 000 ������ �� ������ 5 ���� ����� �� ���������.
			<br><br>���� �� ����� ������������ ��� ���� ��� �������� ����������� � ����� ��������, �� �� ������ ��������������� �������� ������� "6% �� 30 ����" ��������: ���� ��� ���������� ������ �������� �����, ���� ��� �������������� (���������) ��� ������������ ��������. ���������� �������������� (���������) �� ����� "6% �� 30 ����" ������� �� ���������� ����� ��������, ������������ � �������� �� ����� ������������.<br><br>����� ��������� ������ ��� ���������� ������ ��������.
			</div>

			<a href="" class="q">���� � ���� ���� ������������ ������� � ���� ������������ �� ��������� �����?</a>
			<div class="a">
			��, �������. ���� ��������� ������� � ������ ������ �������� �� �����.
			</div>

			<a href="" class="q">��� ������ � ������ ������?</a>
			<div class="a">
			������ ������ ������ �� ����� 5 �����, ����� ����� ����� �� �������� ������ ���������.
			</div>

			<a href="" class="q">��������� �� ��������� � �������� ������ ����?</a>
			<div class="a">
			��������� ���������. ��� ������ ����������� �� �������� ������������ � ������� ����� ������ ������������ ��������������� �� �� �����������.
			</div>

			<a href="" class="q">��� ����� ��������� � �����, � ��� �������� ������?</a>
			<div class="a">
			� ����� ����������� ����� ������� �� ������, � �����, �������� ������� : ��������, ������� ��������, ���������� ����������, ����������, ������������ � ��.
			</div>

			<a href="" class="q">���� �� � �������� ����� ������� � ����� �� ���������� %?</a>
			<div class="a">
			�� ������ �������� ���� ������ �����, ���������� � ��������� ������. ��� ���� % ����� ����������� �� ������� ��������� ������ ��������. ������� ������� ��� ����� �� ��������� ��������� �� �������������.
			</div>

			<a href="" class="q">���� �� �����-�� �������������� ������ ��� ����, ������ % �� �����?</a>
			<div class="a">
			� ����� �������� ��� ������� ������� �������� � �����. �� ���������� ������ % �� �����.
			</div>

			<a href="" class="q">����� �� ��������� ������������������ ���� ������?</a>
			<div class="a">
			�� ����������� ������������������ ������ � ����� ��������.
			</div>

			<a href="" class="q">���� �� � ����� ������� � ������� ���� ����?</a>
			<div class="a">
			��, �������. �������� �� ���� ��������, � ���� ���� ����� ��������� � ������.
			</div>

			<div class="line"></div>
		</div>	
		</div>
	</div>

	<div class="docs">
		<div class="wrapper">
			<h1>���� ���������</h1>
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
			<h1>�����-������</h1>
			<div id="slider-feedback" class="slider_wrap01">
			<iframe width="560" class="active" height="315" src="https://www.youtube.com/embed/3h4jlUe8CME?rel=0&amp;controls=0&amp;showinfo=0" frameborder="0" allowfullscreen></iframe>
			<iframe width="560" class="active" height="315" src="https://www.youtube.com/embed/tgdnRwmVHho?rel=0&amp;controls=0&amp;showinfo=0" frameborder="0" allowfullscreen></iframe>
			<iframe width="560" class="active" height="315" src="https://www.youtube.com/embed/kOv_qF9Dct0?rel=0&amp;controls=0&amp;showinfo=0" frameborder="0" allowfullscreen></iframe>
      		</div>
		</div>
	</div>

	<div class="wehere">
		<div class="wrapper">
			<h1>�� ��������� �����:</h1>
      		<script type="text/javascript" charset="utf-8" src="https://api-maps.yandex.ru/services/constructor/1.0/js/?sid=6TT61egLNPdyAISSO1bPdyT8VCUWnCnZ&width=960&height=400&lang=ru_RU&sourceType=constructor"></script>
		</div>
	</div>

	<footer>
		<div class="wrapper">			
			<p class="title"><span>������� ������ ������</span></p>
			<p><a href="tel:88314325350"><span>8(831)432-53-50</span></a> <span class="map" onclick="$('#map1').arcticmodal()">��. ��������� 17</span><br>
				<a href="tel:88314650068"><span>8(831)465-00-68</span></a> <span class="map" onclick="$('#map2').arcticmodal()">��. �������� 66</span></p>
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