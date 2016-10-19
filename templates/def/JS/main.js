$(document).ready(function(){
    

    // calc
    if ($('#calc').length > 0)
    {
        var jqCalc = $('#calc'),
            jqCalcSum = jqCalc.find('.calcSum'),
            jqCalcDays = jqCalc.find('.calcDays'),
            jqSummaryPercent = jqCalc.find('.calcFooter .percentDay > .summary'),
            jqSummaryPay = jqCalc.find('.calcFooter .forPay > .summary'),
            jqCalcSumSliderFix = $('<span/>', {class: 'irs-fix'}),
            jqCalcDaysSliderFix = $('<span/>', {class: 'irs-fix'}),
	    jqCalcCard = jqCalc.find('.card .cardCheckbox'),

            calc = function(){
                var sum = parseInt(jqCalcSum.find('input').val()),
                    days = parseInt(jqCalcDays.find('input').val()),
                    
                    type = "0",
		    card = jqCalcCard.hasClass('checked'),
                    pay = 0, allPay = 0, currentTariff = 0, percent = 0;

				if (days < 3)
					days = 3;
				if(calcTariffs[0] == undefined){
					if(sum<5000) type = 1;
					else type = 2;
				}
                for (var i in calcTariffs[type])
                {
                    if (sum <= calcTariffs[type][i]['maxMoney'] && days == calcTariffs[type][i]['day'])
	                currentTariff = calcTariffs[type][i];

                }

                
                percent = currentTariff['percent'] / 100;

                pay = Math.round(sum * percent);
                      
                allPay = sum + pay;

                jqSummaryPercent.html(pay + ' р.');
                jqSummaryPay.html(allPay + ' р.');
            };

        jqCalcSum.find('input.ion').ionRangeSlider({
            type: 'single',
            step: 100,
            hideText: true,
            changeDiapason: true,
            onChange: function(slider){
                jqCalcSumSliderFix.css('width', slider.fromX + 10);
                jqCalcSum.find('.summary').val(slider.fromNumber + ' р.');
                calc();
                

            }
        });
        jqCalcDays.find('input.ion').ionRangeSlider({
            type: 'single',
            step: 1,
            hideText: true,
            onChange: function(slider){
                jqCalcDaysSliderFix.css('width', slider.fromX + 10);
                jqCalcDays.find('.summary').val(slider.fromNumber + ' дней.');
                calc();

            }
        });
	jqCalcSum.find('.summary').focus(function(){
		var tempSum = parseInt($(this).val());
		$(this).val(tempSum);
	});
	
	jqCalcSum.find('.summary').blur(function(){
		var tempSum = parseInt($(this).val());
	
		if (tempSum > 300000)
		{
			tempSum = 300000;
		}
	
		jqCalcSum.find('input.ion').ionRangeSlider("update", {from: tempSum});
		jqCalcSum.find('.irs > .irs').append(jqCalcSumSliderFix);
	
		$(this).val(tempSum + ' р.');
	});

	jqCalcDays.find('.summary').focus(function(){
		var tempDays = parseInt($(this).val());
		$(this).val(tempDays);
	});
	
	jqCalcDays.find('.summary').blur(function(){
		var tempDays = parseInt($(this).val());
	
		if (tempDays > 60)
		{
			tempSum = 60;
		}
	
		jqCalcDays.find('input.ion').ionRangeSlider("update", {from: tempDays});
		jqCalcDays.find('.irs > .irs').append(jqCalcDaysSliderFix);
	
		$(this).val(tempDays + ' дней.');
	});


        // slider fix
        jqCalcSum.find('.irs > .irs').append(jqCalcSumSliderFix);

        jqCalcDays.find('input.ion').ionRangeSlider({
            type: 'single',
            step: 1,
            hideText: true,
            onChange: function(slider){
                jqCalcDaysSliderFix.css('width', slider.fromX + 10);
                jqCalcDays.find('.summary').html(slider.fromNumber + ' дней');
                calc();
            }
        });

        // slider fix
        jqCalcDays.find('.irs > .irs').append(jqCalcDaysSliderFix);

        calc();
    }

    // price slider
    if ($('#priceSlider').length > 0)
    {
        var jqSlider = $('#priceSlider'),
            minPrice = parseInt($('#ffMinPrice').attr('data-border')),
            maxPrice = parseInt($('#ffMaxPrice').attr('data-border'));

		if (isNaN(minPrice))
			minPrice = 0;
		if (isNaN(maxPrice))
			maxPrice = 50000;

        jqSlider.ionRangeSlider({
            type: 'single',
            step: 50,
            postfix: ' р.',
            min: minPrice,
            max: maxPrice,
            hideText: true,
            prettify: true,
            onChange: function(slider){
                $('#priceFilter .min').val(slider.fromNumber);
                $('#priceFilter .max').val(slider.toNumber);
            },
            onFinish: function(slider){
                $('#ffMinPrice').val(slider.fromNumber);
                $('#ffMaxPrice').val(slider.toNumber);
                $('#sectionFilter').submit();
            }
        });
    }

});