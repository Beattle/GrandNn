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
	if (value!='')
		document.getElementById(field).innerHTML = value;
}
function getField(field) {
	if (document.getElementById(field))
		return document.getElementById(field).innerHTML;
}
function displayField(field, value){
	if (document.getElementById(field)){
		if (value == 'inverse')
			value = (document.getElementById(field).style.display == 'none')?'inline':'none';
		document.getElementById(field).style.display = value;
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
 if( popWindow ) popWindow.focus();
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

// добавлено для открытия/закрытия левого меню "смотри также"
function opentree(panel)
{
	var cls = '';
	if (document.getElementById) {
		var el = document.getElementById (panel);
		if (el && el.className) {
			el.className = (el.className == 'opened') ? 'closed' : 'opened';
		}
	}
	return false;
}