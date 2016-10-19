$(document).ready(function(){
	reCalc();
});


var slider1Value = [300, 500, 1000, 1500, 2000, 2500, 3000, 3500, 4000, 4500, 5000, 6000, 7000, 8000, 9000, 10000, 15000, 20000, 25000, 30000, 50000, 100000, 150000, 200000, 300000];
var percentOver = [0,0,0,0,0,3.2,3.4,3.6,3.8,4.0,4.1,4.2,4.3,4.4,4.5,4.6,4.7,4.8,4.9,5.0,5.1,5.2,5.3,5.4,5.5,5.6,5.7,5.8,5.9,6.0,6.2,6.4,6.6,6.8,7.0,7.2,7.4,7.6,7.8,8.0,8.2,8.4,8.6,8.8,9.0,9.2,9.4,9.6,9.8,10.0,10.2,10.4,10.6,10.8,11.0,11.2,11.4,11.6,11.8,12.0];
var re = /(?=\B(?:\d{3})+(?!\d))/g;
$(function() {
  $( "#slider1" ).slider({
    range: "min",	  
    value: 15,
    min: 0,
    max: 24,
    step: 1,
	slide: function( event, ui ) {
				var set_sum = slider1Value [ ui.value ];
				var set_days = Number($( "#js_time" ).val().replace(/\D+/g,""));
				set_percent = Math.round( set_sum * percentOver[set_days-1]/100 );
				var set_refund = String(set_sum + set_percent).replace( re, ' ' );
				set_percent = String(set_percent).replace( re, ' ' );
				$( "#js_overpayment" ).val(  set_percent + ' р.' );
				$( "#js_refund" ).val(  set_refund + ' р.' );
                $( "#js_sum" ).val( String(slider1Value [ ui.value ]).replace( re, ' ' ) + ' р.' );
            }
	});
  $( "#slider2" ).slider({
    range: "min",	  
    value: 30,
    min: 1,
    max: 60,
    step: 1,
    slide: function( event, ui ) {
				var set_days = ui.value;
				var set_sum = Number($( "#js_sum" ).val().replace(/\D+/g,""));
				set_percent = Math.round( set_sum * percentOver[set_days-1]/100 );
				var set_refund = String(set_sum + set_percent).replace( re, ' ' );
				$( "#js_refund" ).val(  set_refund + ' р.' );
				set_percent = String(set_percent).replace( re, ' ' );
				$( "#js_overpayment" ).val(  set_percent + ' р.' );
                if(set_days == 1) set_days = set_days + ' день';
                if(set_days >= 2 && set_days <= 4) set_days = set_days + ' дня';
                if(set_days >= 5) set_days = set_days + ' дней';
				$( "#js_time" ).val(set_days);
			}
  });
});


function reCalc() {
	var set_sum = 10000;
	var set_days = 30;
	set_percent = Math.round( set_sum * percentOver[set_days-1]/100 );
	$( "#js_overpayment" ).val(  set_percent + ' р.' );
	$( "#js_refund" ).val(  set_sum + set_percent + ' р.' );
	$( "#js_sum" ).val( set_sum + ' р.' );
	$( "#js_time" ).val(set_days + ' день');
}
