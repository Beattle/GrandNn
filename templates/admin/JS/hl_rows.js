var bg1		=	'transparent';
var bg2		=	'transparent';
var hlcl	=	'#EEEEEE';
var clcl	=	'#F3F3F3';
var bgcl	=	'#ffffff';
var NS = (navigator.appName == 'Netscape') ? 1 : 0;

/** Подсветка группы строк в ноде TBODY, THEAD
*
*
**/
function hl() {
	if (document.getElementById && document.createTextNode) {
		var tables=document.getElementsByTagName('table');
		for (var i=0;i<tables.length;i++) {
			if(tables[i].id=='hl') {
				var trs=tables[i].getElementsByTagName('tr');
				for(var j=0; j < trs.length; j++) {
					if(trs[j].parentNode.nodeName=='TBODY') {
						trs[j].style.backgroundColor = bgcl;
						trs[j].style.cursor = (NS ? 'pointer' : 'hand');
						trs[j].onmouseover=function() {
							if (!this.clicked) {
								if (j%2) {
									bg1 = this.style.backgroundColor;
									}
								else {
									bg2 = this.style.backgroundColor;
									}
								this.style.backgroundColor = hlcl;
								}
							return false;
							}
						trs[j].onmouseout=function() {
							this.style.backgroundColor = (!this.clicked?(j%2?bg1:bg2):clcl);
							return false;
							}
						trs[j].onclick=function() {
							this.style.backgroundColor = (!this.clicked ? clcl : hlcl );
							this.clicked = !this.clicked;
							return true;
							}
						}
					}
				}
			}
		}
	}
