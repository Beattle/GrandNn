/* Параметры для загрузки */
var autocompOptions = {};
var prodOptions = {
	target:			'#outputForm',
	url:			"/empty/" + location.pathname + '?db_result_only',
	beforeSubmit:	MakeLink,
	success:		prodAfter
};
/* обработка ajax формы, и подготовка автокомплитера для начальной работы*/
if (typeof($) != 'undefined')
	$(document).ready(function (){
		$('#prodForm').ajaxForm(prodOptions);
		set_autocomplete_model();
		$("#search").autocomplete("/empty/autocomplete", autocompOptions);
		// после загрузки страницы все равно обработать pline
		prodAfter();
	});	

function MakeLink(formData, jqForm){
	var strLink = "<a href=" + 	location.href.split("?")[0] + "?" + $.param(formData) + ">Ссылка на этот результат</a>";
	$("#saveLink").html(strLink);
	$("#outputForm").html("<img src='/templates/def/images/spin.gif' align=left width=17><p>Загрузка...</p>");
}
/* 
замена ссылок, что бы погружались сюда же 
вызывается из success формы и мосле загрузки
*/
function prodAfter() {
	if (typeof($) != 'undefined')
		$("#pline a").click(function() {

			// для кнопок возврата при ajax
			var urlAnchor = location.hash;
			if(urlAnchor.indexOf("#/") != -1) {
				$("#outputForm").load('/empty' + urlAnchor.replace("#", "") + '&db_result_only', '', function(){});
			}

			$("#outputForm").html("<img src='/templates/def/images/spin.gif' align=left width=17><p>Загрузка...</p>");
			path = $(this).attr('href').split(location.host)[1];
			path = (typeof(path) == 'undefined') ? $(this).attr('href') : $(this).attr('href').split(location.host)[1];
			if (!path.split('db_result_only')[1]){
				path += '&db_result_only';
			}
			$("#outputForm").load('/empty' + path, '', function(){prodAfter()});
			return false;
		});
}

function set_autocomplete_model(){
	autocompOptions = {
		external: true,
		delay:10,
		matchSubset:1,
		matchContains:false,
		cacheLength:false,
		maxItemsToShow:20,
		mustMatch: 0,
		selectOnly: false,
		autoFill:false,
		extraParams: {
			'form[category]' : document.prodForm.elements['form[category]'].value, 
			'form[type]' : document.prodForm.elements['form[type]'].value,
			'form[novo_uzato]' : document.prodForm.elements['form[novo_uzato]'].value,
//			'form[novo_uzato]' : (!document.prodForm.elements['form[novo_uzato]'].checked) ? 0 : 1
			'form[price1]' : document.prodForm.elements['form[price1]'].value || 0,
			'form[price2]' : document.prodForm.elements['form[price2]'].value || 0,
			'form[year1]' : document.prodForm.elements['form[year1]'].value || 0,
			'form[year2]' : document.prodForm.elements['form[year2]'].value || 0,
			'form[m61]' : document.prodForm.elements['form[m61]'].value || 0,
			'form[m62]' : document.prodForm.elements['form[m62]'].value || 0,
			'form[pm301]' : document.prodForm.elements['form[pm301]'].value || 0,
			'form[pm302]' : document.prodForm.elements['form[pm302]'].value || 0,
			'form[dm121]' : document.prodForm.elements['form[dm121]'].value || 0,
			'form[looks]' : document.prodForm.elements['form[looks]'].value || 0
			}
		};

}
