     <a id="lkredit" style="display: none" href="#"> упить в кредит</a>
    <script type="text/javascript">
                kreditlineBig.create({
                goods:    JSON.stringify(prods),
                site:      encode_utf8('grandnn.com'),
                siteName: encode_utf8('ёвелирный дом "√ранд"'),
                elm:      'lkredit',
				fio:		encode_utf8('<?=$data['user_name']?>'),
				mail: 		encode_utf8('<?=$data['email']?>'),
				tel: 		encode_utf8('<?=$data['phone']?>'),
				hide_percent: 8,
				orderId:	'<?=$data['id']?>',
                URLSuccess: 'http://'+location.hostname+'/basketorders/myorders',
                autostart:true
                });

                function encode_utf8( s )
                {
                    return decodeURIComponent( encodeURIComponent( s ) );
                }
    </script>