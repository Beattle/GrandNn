function pr(c) {
	if (c==45){ // Ins
		ShowPopUp('/clear/doctxt/new_add?'+_GET_Vars['node'], 500, 450, 'yes');
	}
}
function doc_add(goto){ // js
	name = prompt("¬ведите заголовок документа", "- заголовок -");
	if (name && name != "- заголовок -" && name != "null") {
		location.href	= "http://"+location.host+location.pathname+"?"+QUERY_STRING+"&add="+goto+"&sub_name="+name;
		return true;
	}
}
function doc_rename(old_name, goto){ // js
	name = prompt("¬ведите новый заголовок документа", old_name);
	if (name && name != old_name && name != "null") {
		location.href	= "http://"+location.host+location.pathname+"?"+QUERY_STRING+"&add="+goto+"&rename="+name;
		return true;
	}
}
function doc_del(path, goto){ // js
	if (confirm("¬ы уверены что хотите удалить ветку \n" + path + " ?")) {
		window.location.href	= "http://"+location.host+location.pathname+"?"+QUERY_STRING+"&del="+goto;
		return true;
	}else
		return false;
}
function doc_del_quick(path, goto){ // js
	if (confirm("¬ы уверены что хотите удалить ветку \n" + path + " ?")) {
		window.backgroudexec.location.href	= "http://"+location.host+"/clear/"+location.pathname+"?"+QUERY_STRING+"&del="+goto;
		return true;
	}else
		return false;
}

function doc_get(path, type, name){
	// type in cop || cut
	tmp_buff = getField('Buff');
	if (type == 'cop') ltype = 'Ctrl+C';
	if (type == 'cut') ltype = 'Ctrl+X';
	
	if( path!=tmp_buff.match( path ))	writeField('Buff', getField('Buff')+"<p><a href='javascript:;' title="+path+">"+name.substring(0,40)+"("+ltype+")</a></p>");
	window.backgroudexec.location.href	= "http://"+location.host+"/clear/"+location.pathname+"?"+QUERY_STRING+"&"+type+"="+path;
  
	return true;
}
function doc_paste(){
		window.backgroudexec.location.href	= "http://"+location.host+"/clear/"+location.pathname+"?list&node="+_GET_Vars['node']+"&paste";
		return true;
}
function doc_paste_clear(){
		window.backgroudexec.location.href	= "http://"+location.host+"/clear/"+location.pathname+"?list&node="+_GET_Vars['node']+"&paste&clear_cutted";
		return true;
}
