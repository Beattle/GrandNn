var CurrentMarked;
var is_press_edit=false;
CurrentMarked=-1;

var KeyControl = true;

get = new String(window.location);
_GET_Vars = new Array;
keys = '';
shift_pressed = false;
shift_pressed_on = -1;
ctrl_pressed = false;
ctrl_pressed_on = -1;
alt_pressed = false;
alt_pressed_on = -1;

_GET_Vars['list'] = 0;
_GET_Vars['node'] = '';
_GET_Vars['tree'] = 0;

x = get.indexOf('?');
if(x!=-1)
{
	l = get.length;
	get = get.substr(x+1, l-x);
	QUERY_STRING = get;
	l = get.split('&');
	x = 0;
//	_GET_Vars = new Array(l.length);  // УЖЕ Есть объявление и определение дефолтовых значений.
	for(i in l)
	{
	   get = l[i].split('=');
	   if (get[1])
	   	_GET_Vars[get[0]] = get[1];
	   else
	   	_GET_Vars[l[i]] = 1;
	}
}else{
	QUERY_STRING = '';
}

if (typeof(_GET_Vars)!='undefined'&&typeof(_GET_Vars['mark'])!='undefined'){
	window.onload = function(){markItem(_GET_Vars['mark']);};
}

function resetPointer(){
	if (CurrentMarked>=0){
		o = getobj2('itemList'+CurrentMarked);
		if (typeof(o) != 'underfined')
			o.className="";
		CurrentPath = '';
		CurrentName = '';
	}
}

function path2id(path){
	for (i=0;1;i++){
		test = getobj2('itemList'+i);
		if (!test) return -1;
		add = (typeof(test.innerText)=='undefined')?'':'/';
		if (path == add+test.pathname)
			return i;
	}
}
function getCount(){
	for (i=0;1;i++){
		test = getobj2('itemList'+i);
		if (!test) return i-1;
	}	
}

function markItem(path){
	id = path2id(path);
	if (id != -1)
		setItem(id)
}

function setItem(id){
	setPointer(id);
	if(ob)ob.onfocus();
}

function setPointer(id)
{
	if (id<0) id = 0;
	test = getobj2('itemList'+id);
	if (test){
		ob = test;
		if( shift_pressed_on != -1 ){
			resetMasPointer(shift_pressed_on, CurrentMarked);
			shift_pressed_on = -1;
		}
		else resetPointer();
		ob.className="selected";
		ob.focus();
		CurrentMarked=id;
		if (typeof(ob.innerText)=='undefined'){
			// non IE
			CurrentPath = ob.pathname;
			CurrentName = ob.text;
		}else{
			CurrentPath = ((window.chrome) ? '' : "/")+ob.pathname;
			CurrentName = ob.innerText;
		}
	    return true;
	}
}
// для установки CurName, Path
function getPointerVal(id){
	if (id<0) id = 0;
	test = getobj2('itemList'+id);
	if (test){
		ob = test;
		CurrentMarked=id;
		if (typeof(ob.innerText)=='undefined'){
			// non IE
			CurrentPath = ob.pathname;
			CurrentName = ob.text;
		}else{
			CurrentPath = ((window.chrome) ? '' : "/")+ob.pathname;
			CurrentName = ob.innerText;
		}
	    return true;
	}
}

function resetMasPointer(from,to){
	test1 = getobj2('itemList'+from);
	test2 = getobj2('itemList'+to);
	if (test1 && test2){
		for (i=Math.min(from,to);i<=Math.max(from,to);i++){
			o = getobj2('itemList'+i);
			o.className="";
			CurrentPath = '';
			CurrentName = '';
		}
	}
}

function setMasPointer(id_start, id_stop)
{
	test1 = getobj2('itemList'+id_start);
	test2 = getobj2('itemList'+id_stop);
	if (test1 && test2){
		resetPointer();
		for (i=Math.min(id_start,id_stop);i<=Math.max(id_start,id_stop);i++){
			ob = getobj2('itemList'+i);
			ob.className="selected";
		}
		ob = getobj2('itemList'+id_stop);
		CurrentMarked=id_stop;
		if (typeof(ob.innerText)=='undefined'){
			// non IE
			CurrentPath = ob.pathname;
			CurrentName = ob.text;
		}else{
			CurrentPath = "/"+ob.pathname;
			CurrentName = ob.innerText;
		}
	    return true;
	}
}

function common_pr(e){
	if(!e)e=window.event;
	c = e.keyCode;
	//
	// *** Up
	//
	if (c==38 && KeyControl){ 
		
		// с шифтом
		if (shift_pressed){
			next = CurrentMarked-1;
			setMasPointer(shift_pressed_on, next);
			
		// без шифта 
		}else{
			// если было выделение убрать
			if (shift_pressed_on!=-1){
				resetMasPointer(shift_pressed_on, CurrentMarked);
				shift_pressed_on = -1;
			}
			setItem(CurrentMarked-1);
		}
		return false;
	}
	//
	// *** Down
	//
	if (c==40 && KeyControl){
		
		// если с шифтом
		if (shift_pressed){
			next = 1 + 1*CurrentMarked;
			setMasPointer( shift_pressed_on, next);
		// если без шифта
		}else{
			// если было выделение убрать
			if (shift_pressed_on!=-1){
				resetMasPointer(shift_pressed_on, CurrentMarked);
				shift_pressed_on = -1;
			}
			setItem(1 + 1*CurrentMarked);
		}
//		if (ob) ob.onfocus();
		return false;
	}

	// EnterPressed() added by Shesternin 15.05.06
	// *** Enter
	//
	if (c==13 && KeyControl){
		EnterPressed();
		return false;
	}

	//
	// ***  BackSpace
	//
/*	if (c==8 && KeyControl){ 
		if(BACK_PAGE){
			window.location.href = BACK_PAGE;
			return false;
		}
	}*/
	
	//
	// ***  Del
	//
	if (c==46) {
		DeletePressed();
	}	
	//
	// ***  PgDown
	//
	if (c==34 && KeyControl) {
		last = getCount();
		if (last>=0) {
			if (shift_pressed)
				setMasPointer( shift_pressed_on, last);
			else{
				// если было выделение убрать
				if (shift_pressed_on!=-1){
					resetMasPointer(shift_pressed_on, CurrentMarked);
					shift_pressed_on = -1;
				}
				setItem(last);
			}
		}
	}
	//
	// ***  PgUp
	//
	if (c==33 && KeyControl) {
		if (shift_pressed)
			setMasPointer( shift_pressed_on, 0);
		else{
			// если было выделение убрать
			if (shift_pressed_on!=-1){
				resetMasPointer(shift_pressed_on, CurrentMarked);
				shift_pressed_on = -1;
			}
			setItem(0);
		}
	}
	//
	// ***  Shift
	//
	if (c==16){
		shift_pressed = true;
 		shift_pressed_on = CurrentMarked;
	}
	//
	// ***  Ctrl
	//
	if (c==17){
		ctrl_pressed = true;
 		ctrl_pressed_on = CurrentMarked;
	}
	//
	// ***  Atl
	//
	if (c==18){
		alt_pressed = true;
 		alt_pressed_on = CurrentMarked;
	}
	
	//
	// ***  Ctrl+X
	//
	if (ctrl_pressed && c==88){
		if (shift_pressed_on != -1  && shift_pressed_on != CurrentMarked){
			to = Math.max(shift_pressed_on, CurrentMarked);
			from = Math.min(shift_pressed_on, CurrentMarked);
			for(ii=from; ii <= to; ii++){
				getPointerVal(ii);
				if (CurrentMarked>=0&&CurrentPath!=''){
					doc_get(CurrentPath, 'cut', CurrentName);
				}
			}	}
		else	if (CurrentMarked>=0&&CurrentPath!=''){
				doc_get(CurrentPath, 'cut', CurrentName);
			}
		}
	
	// ***  Ctrl+С
	//
	if (ctrl_pressed && c==67){
		if (shift_pressed_on != -1 && shift_pressed_on != CurrentMarked){
			from = Math.min(shift_pressed_on, CurrentMarked);
			to = Math.max(shift_pressed_on, CurrentMarked);
			for(ii=from; ii <= to; ii++){
				getPointerVal(ii);
				if (CurrentMarked>=0&&CurrentPath!=''){
					doc_get(CurrentPath,'cop', CurrentName);
				}
			}
		}else{
			if (CurrentMarked>=0&&CurrentPath!=''){
				doc_get(CurrentPath,'cop', CurrentName);
			}
		}
	}	//
	// ***  Ctrl+V
	//
	if (ctrl_pressed && c==86){
		doc_paste();
	}
	pr(c);
//	alert(c);
}

function common_pr_up(e){
	if(!e)e=window.event;
	c = e.keyCode;
	if(c==16)shift_pressed = false;
	if(c==17)ctrl_pressed = false;
	if(c==18)alt_pressed = false;
}




document.onkeydown = common_pr;
document.onkeyup = common_pr_up;


// Added by Shesternin 15.05.06
function DeletePressed(){
		if (shift_pressed_on != -1 && shift_pressed_on != CurrentMarked){
			from = Math.min(shift_pressed_on, CurrentMarked);
			to = Math.max(shift_pressed_on, CurrentMarked);
			for(ii=from; ii <= to; ii++){
				getPointerVal(ii);
				if (CurrentMarked>=0&&CurrentPath!=''){
					doc_del_quick(CurrentName,CurrentPath);
				}
			}
			window.location.reload();
		}else{
			if (CurrentMarked>=0&&CurrentPath!=''){
				doc_del(CurrentName,CurrentPath);
			}
//			window.location.reload(); // for ie
		}
}


// При нажатии на Enter, появляется нужное (выделеное) число окошек+ одно на котором фокус
// Вот одно одно надо убрать
//
//  Шестернин
function EnterPressed(){
		if (shift_pressed_on != -1){
		is_press_edit = true;
			from = Math.min(shift_pressed_on, CurrentMarked);
			to = Math.max(shift_pressed_on, CurrentMarked);
			for(i=from; i <= to; i++){
				ob = getobj2('itemList'+i);
				if (ob) ob.onclick();
			}
		is_press_edit = false;
		}else{
			ob = getobj2('itemList'+CurrentMarked);
			if (ob) ob.ondblclick();
		}	
}

function chk_press_edit(){
	if( typeof( is_press_edit )!="undefined")
			return is_press_edit;
	return false;
}

function keyControlOn(){
	KeyControl = true;
}
function keyControlOff(){
	KeyControl = false;
}