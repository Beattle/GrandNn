var NS = (navigator.appName == "Netscape") ? 1 : 0;
var months = new Array('Январь','Февраль','Март','Апрель','Май','Июнь','Июль','Август','Сентябрь','Октябрь','Ноябрь','Декабрь');
var ver = parseInt(navigator.appVersion);
var IE = (navigator.appName == "Microsoft Internet Explorer") ? 1 : 0;
var cid = 'calend';
var ct = 0;

function isLeapYear (x_year) {
	if (((x_year % 4)==0) && ((x_year % 100)!=0) || ((x_year % 400)==0)) {
		return (true);
		}
	else {
		return (false);
		}
	}

function getDOW(date) {
	dow = date.getDay();
	return (dow == 0 ? 7 : dow);
	}

function getMonthDays(date) {
	var month = date.getMonth() + 1;
	if (month==1 || month==3 || month==5 || month==7 || month==8 || month==10 || month==12) {
		return 31;
		}
	else if (month==4 || month==6 || month==9 || month==11) {
		return 30;
		}
	else if (month==2)  {
		if (isLeapYear(date.getYear())) {
			return 29;
			}
		else {
			return 28;
			}
		}
	}

function setDateValues(formname, control, d, m, y) {
	m = (m+1);
	document.forms[formname].elements[control].value = (d < 10 ? '0' + d : d ) + '.' + (m < 10 ? '0' + m : m ) + '.' + y;
	hideCalendar();
	}

function hideCalendar() {
	if (NS) {
		var obj = document.getElementById(cid);
		obj.style.visibility = 'hidden';
		obj.style.display = 'none';
		}
	else {
		document.all[cid].style.visibility = 'hidden';
		document.all[cid].style.display = 'none';
		}
	clvis = false;
	document.body.oncontextmenu = function(){ return true; };
//	document.body.onclick = function(){ return true; };
	}


function buildCalendar(y, m, img, formname, control) {
	var html = '';
	var cDate = new Date();

	var y = parseInt(y, 10);
	var m = parseInt(m, 10);

	var fDate = new Date (y, (m-1), 1);
	var fDow = getDOW(fDate);
	var fDays = getMonthDays(fDate);

	html += '<table class="calend" cellspacing="0" cellpadding="0" border="0" width="210">';
//	html += '<tr bgcolor="#333333" align="right">';
//	html += '<td class="day" colspan="7" style="background-color:#e2e2e2;height:2px;"><a style="color:#ffffff;font-size:10px;" href="javascript:hideCalendar()">x</a></td>';
//	html += '</tr>';

	html += '<tr bgcolor="#f3f3f3" align="center">';
	html += '<td class="day"><a class="day nobg" href="javascript:showCalendar('+ (y-1) + ',' + m + ", '" + img + "', '" + formname + "', '" + control + '\');" title=" Предыдущий год ">&nbsp;&lt;&lt;&nbsp;</a></td>';
	html += '<td class="day"><a class="day nobg" href="javascript:showCalendar('+((m-1)>=0?y:y-1)+', '+((m-1)>=0?m-1:12)+", '" + img + "',  '" + formname + "', '" + control + '\');" title=" Предыдущий месяц ">&nbsp;&lt;&lt;&nbsp;</a></td>';
	html += '<td colspan="3" class="month" style="cursor:' + (NS ? 'pointer' : 'hand') + ';' + (fDate.getMonth()==cDate.getMonth()&&fDate.getYear()==cDate.getYear()? 'color:#CC0000;' : '') + '" OnClick="hideCalendar();" title=" Закрыть ">' + months[fDate.getMonth()] + ' ' + fDate.getFullYear() + '</td>';
	html += '<td class="day"><a class="day nobg" href="javascript:showCalendar('+((m+1)!=13?y:y+1)+', '+((m+1)!=13?(m+1):1)+", '" + img + "',  '" + formname + "', '" + control + '\');" title=" Следующий месяц ">&nbsp;&gt;&gt;&nbsp;</a></td>';
	html += '<td class="day"><a class="day nobg" href="javascript:showCalendar('+(y+1)+', '+m+", '" + img + "',  '" + formname + "', '" + control + '\');" title=" Следующий год ">&nbsp;&gt;&gt;&nbsp;</a></td>';
	html += '</tr>';
	html += '<tr><td class="head">Пн</td><td class="head">Вт</td><td class="head">Ср</td><td class="head">Чт</td><td class="head">Пт</td><td class="head">Сб</td><td class="head">Вс</td></tr>';

	html += '<tr align="center">';

	var fDate = new Date (((m-2)>=0?y:(y-1)), ((m-2)>=0?(m-2):12), 1);
	var fDays = getMonthDays(fDate);
	var pDow = getDOW(fDate);

	d = fDays+2-fDow;

	for (c = 1; c < fDow; c++) {
		html += '<td class="gday">'+d+'</td>';
		d++;
		}

	var fDate = new Date (y, (m-1), 1);
	var fDow = getDOW(fDate);
	var fDays = getMonthDays(fDate);

	for (d = 1; d <= fDays;) {
		cday = ( (fDate.getYear() == cDate.getYear()) &&	(fDate.getMonth() == cDate.getMonth()) &&	(cDate.getDate() == d ) ) ? 1 : 0 ;
		fDow = getDOW(fDate);
		cl = (fDow == 7 ? 'day7' : (fDow == 6 ? 'day6' : 'day' ));
		html += '<td' + (cday ? ' class="cday"':' class="day"')+(!cday ? ' onMouseOver="this.style.backgroundColor=\'#FFE6CC\';" onMouseOut="this.style.backgroundColor=\'#f3f3f3\'"':'') + '>';
		html += '<a' + (cday ? ' class="cday nobg"':' class="'+cl+' nobg"') +' href="javascript:' + "setDateValues('" + formname + "', '" + control + "', " + d + ", " + fDate.getMonth() + ", " + fDate.getFullYear() + ');">';
		html += d  + '</a>';
		html += '</td>' + (fDow == 7 ? '</tr><tr align="center">' : '' );
		d++;
		fDate.setDate(d);
		}

	var fDate = new Date (((m+1)!=13?(y+1):y), ((m+1)!=13?(m+1):1), 1);
	var fDays = getMonthDays(fDate);
	var d = 1;

	for (c = fDow; c < 7; c++) {
		var fDow = getDOW(fDate);
		html += '<td class="gday">'+d+'</td>';
		d++;
		fDate.setDate(d);
		}
	html += '</tr></table>';
	return html;
	}

function showCalendar(y, m, img, formname, control) {
	var html = buildCalendar(y, m, img, formname, control);
	var obj = (NS ? document.getElementById(cid) : document.all[cid]);

	if (NS) {
		var newNode = document.createElement('span');
		obj.replaceChild(newNode, obj.firstChild);
		newNode.innerHTML = html;
		}
	else {
		obj.innerHTML = html;
		}
	TopCoord  = ObjTop(document.images[img], 6);
	LeftCoord = ObjLeft(document.images[img], 0);
	obj.style.top  = TopCoord+'px';
	obj.style.left = (img=='c2'?LeftCoord-210+14:LeftCoord+4)+'px';

	obj.style.visibility = 'visible';
	obj.style.display = 'inline';
	document.body.oncontextmenu=function(){ return false; };
//	document.body.onclick = function(){ hideCalendar(); };
	}
function ObjLeft(elem, offset) {
if ((NS) && (ver==4)) {
return elem.x + offset;
}
else {
var X = 0;
do { X += elem.offsetLeft } while ((elem = elem.offsetParent) != null);
return X + offset;
}

}

function ObjTop(elem, offset) {
if ((NS) && (ver==4)) {
return elem.y + elem.height + offset;
}
else {
if (IE) {
var H = elem.height;
}
else {
var H = elem.height;
}
var Y = 0;
do { Y += elem.offsetTop } while ((elem = elem.offsetParent) != null);
return Y + H + offset;
}
}

