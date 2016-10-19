<!--//

var st = 0;

var ie = (document.all);
var dom = (document.getElementById);
var ver = parseInt(navigator.appVersion);
var IE = (navigator.appName == "Microsoft Internet Explorer") ? 1 : 0;
var NS = (navigator.appName == "Netscape") ? 1 : 0;
var TopCoord  = 0;
var LeftCoord = 0;
//var nMenu = 8;

function show(n) {
clearTimeout(st);
//hide();
var argv = show.arguments;
var argc = show.arguments.length;
var obj = getobj('menu'+n);
var img = (argc > 1) ? document.images['m'+argv[1]] : document.images['m'+n];
var top = (argc > 2) ? argv[2] : null;

// var obj = getobj('menu'+n);
//alert(document.images['m'+n].title);
//document.write(document.images['m'+n]);
//alert(top);
TopCoord  = ObjTop(img, 0);
LeftCoord = ObjLeft(img, (argc > 1) ? 216 : 15);

obj.top  = TopCoord;
obj.left = LeftCoord;

//var w;
//if (window.innerWidth == null) {
//	w = document.body.clientWidth;
//} else {
//	w = window.innerWidth;
//}

//if(isMozilla) {document.getElementById('menu'+n).style.width}
//if(isOpera) {document.getElementById('menu'+n).style.pixelWidth}

if (!document.all) {
document.getElementById('menu'+n).style.visibility='visible';
//width	= (document.getElementById('menu'+n).style.width) ? 
//			document.getElementById('menu'+n).style.width :
//			document.getElementById('menu'+n).style.pixelWidth;
//alert('1:' + document.getElementById('menu'+n).style.pixelWidth);
}
else {
document.all['menu'+n].style.visibility='visible';
//width	= document.all['menu'+n].style.width;
//alert('2:' + document.getElementById('menu'+n).style.innerWidth);
}
//obj.left = Math.min(LeftCoord, window.width-width);
//alert(window.innerWidth);
}

function hide() {
for (n=0; n<nMenu; n++) {
 var obj = getobj('menu'+n);
if (!document.all) {
//alert(n);
document.getElementById('menu'+n).style.visibility='hidden';
document.getElementById('menu'+n).top  = -1000;
document.getElementById('menu'+n).left = -1000;
}
else  if (document.all['menu'+n]) {
document.all['menu'+n].top  = -1000;
document.all['menu'+n].left = -1000;
document.all['menu'+n].style.visibility='hidden';
}
}
}

function getobj(s) {
if (ie && document.all[s])
return (document.all[s].style);
else if (dom && document.getElementById(s))
return (document.getElementById(s).style);
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

//-->