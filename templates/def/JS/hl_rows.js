var bg1		=	'#F3F9FF';
var bg2		=	'#ffffff';
var hlcl	=	'#FFCC99';
var clcl	=	'#ffffff';
var bgcl	=	'#FFCC99';
var NS = (navigator.appName == 'Netscape') ? 1 : 0;

/** Подсветка группы строк в ноде TBODY, THEAD
*
*
**/
function hl() {

	if (typeof($) != 'undefined')
		return jq_hl();


	if (document.getElementById && document.createTextNode) {
		var tables=document.getElementsByTagName('table');
		for (var i=0;i<tables.length;i++) {
			if(tables[i].name=='hl') {
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

function jq_hl() {
	$("#hl tbody tr").hover(function () {
		$(this).css({'background-color' : hlcl });
    }, function () {
	  if (!this.clicked)
	      $(this).css({'background-color' : clcl });
	  else
	      $(this).css({'background-color' : bgcl });

    });

//	$("#hl tbody tr").filter(":eq(1)").addClass('odd'); // attr("style" ,"background-color:"+bgcl);

	$("#hl tbody tr").click(function() {
		this.style.backgroundColor = (!this.clicked ? bgcl : clcl  );
		this.clicked = !this.clicked;
		return true;
		});
}
