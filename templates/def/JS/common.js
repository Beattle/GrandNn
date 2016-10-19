var ie = (document.all);
var dom = (document.getElementById);
var ver = parseInt(navigator.appVersion);
var IE = (navigator.appName == "Microsoft Internet Explorer") ? 1 : 0;
var NS = (navigator.appName == "Netscape") ? 1 : 0;
function wo(link,name,w,h){
	window.open(link,name,"height="+h+",width="+w+",status=no,toolbar=no,menubar=no,location=no,resizable=no,scrollbars=no");
	return false;
}
function ef(f,v){if(v!='')document.getElementById(f).innerHTML=v;}
function af(f,v){if(v!='')document.getElementById(f).innerHTML+=v;}
function gf(f){if(document.getElementById(f))return document.getElementById(f)}
function gfv(f){if(document.getElementById(f))return document.getElementById(f).innerHTML}

function writeField(field, value) {
    if (typeof(field) == 'string' && field != ''){
        obj = document.getElementById(field);
        if (value!='' && obj && typeof(obj.innerHTML) != 'undefined')
            document.getElementById(field).innerHTML = value;
    }
}
function getField(field) {
    if (typeof(field) == 'string' && field != '') {
        obj = document.getElementById(field);
        if (typeof(obj.innerHTML) != 'undefined')
            return obj.innerHTML;
    }
}
function displayField(field, value){
    if (typeof(field) == 'string' && field != '') {
        obj = document.getElementById(field);
        if (typeof(obj.innerHTML) != 'undefined'){
            if (value == 'inverse')
                value = (obj.style.display == 'none')?'inline':'none';
            obj.style.display = value;
        }
    }
}
function ShowPopUp(docName, wW, wH, wS){
 var pC = '';
 if (document.all || document.layers || document.createTextNode){
  posX = Math.round((screen.width-wW)/2);
  posY = Math.round((screen.height-wH)/2);
  pC = (document.all)? 'left='+posX+',top='+posY : 'screenX='+posX+',screenY='+posY;
 }
 popWindow = window.open(docName,'_blank','menubar=no,resizable=yes,toolbar=no,scrollbars='+wS+',status=no,width='+wW+',height='+wH+','+pC);
 popWindow.focus();
}

function getobj(s) {
if (ie && document.all[s])
return (document.all[s].style);
else if (dom && document.getElementById(s))
return (document.getElementById(s).style);
else if (document.layers)
return (document.layers[s]);
}
function getobj2(s) {
if (ie && document.all[s])
return (document.all[s]);
else if (dom && document.getElementById(s))
return (document.getElementById(s));
else if (document.layers)
return (document.layers[s]);
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

function writeField(field, value) {
	if (value!='')
		if (navigator.appName == 'Netscape1'){
			var obj = document.getElementById(field);
			var newNode = document.createElement('span');
			newNode.appendChild(document.createTextNode(value));
			obj.replaceChild(newNode, obj.firstChild);
		}else{
			
			obj = document.getElementById(field);
			if (obj != null)
				obj.innerHTML = value;
				
		}
}
function ShowPopUp(docName, wW, wH, wS){
 var pC = '';
 if (document.all || document.layers || document.createTextNode){
  posX = Math.round((screen.width-wW)/2);
  posY = Math.round((screen.height-wH)/2);
  pC = (document.all)? 'left='+posX+',top='+posY : 'screenX='+posX+',screenY='+posY;
 }
 popWindow = window.open(docName,'_blank','menubar=no,toolbar=no,scrollbars='+wS+',status=no,width='+wW+',height='+wH+','+pC);
 popWindow.focus();
}

function show_img(url, some){
	some = (typeof(some) != 'undefined') ? some : '';
	ef('img'+some, "<img src='"+url+"'>");
}

function showcrumbs(link){
	var crumbs = document.getElementById('breadcrumbs-popup');
	var crumb = document.getElementById('select-' + link.id);

	crumbs.style.display = 'block';

	var current = link.parentNode;
	var top = topprev = left = leftprev = 0;
	while ( current.id != 'layout' ){
		if ( current.offsetTop != topprev ){
			topprev = current.offsetTop;
			top = top + current.offsetTop;
		}
		if ( current.offsetLeft != leftprev ){
			leftprev = current.offsetLeft;
			left = left + current.offsetLeft;
		}
		current = current.parentNode;
	}

	var current = crumb.parentNode.firstChild;
	var width = 0;
	while ( current != null ) {
		if ( current.tagName == 'A' ) {
			current.style.display = 'inline';
			if ( current.offsetWidth > width ) {
				width = current.offsetWidth;
			}
			current.style.display = 'block';
		}
		current = current.nextSibling;
	}

	crumbs.style.width = width + 'px';
	crumbs.style.top = top + link.offsetTop - 1 - crumb.offsetTop + 'px';
	crumbs.style.marginLeft = left + link.offsetLeft - 1 - crumb.offsetLeft+ 'px'; // - link.offsetLeft - 1 - crumb.offsetLeft 
	crumb.className = 'nolink';

	crumb.onclick = function() { crumbs.style.display = 'none'; return false; };
	return false;
}
function number_format( number, decimals, dec_point, thousands_sep ) {	// Format a number with grouped thousands
	// 
	// +   original by: Jonas Raoni Soares Silva (http://www.jsfromhell.com)
	// +   improved by: Kevin van Zonneveld (http://kevin.vanzonneveld.net)
	// +	 bugfix by: Michael White (http://crestidg.com)

	var i, j, kw, kd, km;

	// input sanitation & defaults
	if( isNaN(decimals = Math.abs(decimals)) ){
		decimals = 2;
	}
	if( dec_point == undefined ){
		dec_point = ",";
	}
	if( thousands_sep == undefined ){
		thousands_sep = ".";
	}

	i = parseInt(number = (+number || 0).toFixed(decimals)) + "";

/*	if( (j = i.length) > 3 ){
		j = j % 3;
	} else{
		j = 0;
	}

	km = (j ? i.substr(0, j) + thousands_sep : "");
	kw = i.substr(j).replace(/(\d{3})(?=\d)/g, "$1" + thousands_sep);*/
	kw = i.split( /(?=(?:\d{3})+$)/ ).join( thousands_sep );
	//kd = (decimals ? dec_point + Math.abs(number - i).toFixed(decimals).slice(2) : "");
	kd = (decimals ? dec_point + Math.abs(number - i).toFixed(decimals).replace(/-/, 0).slice(2) : "");


	return kw + kd;
}
