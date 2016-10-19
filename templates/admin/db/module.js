function pr(c) {
	if (c==45){ // Ins
		ShowPopUp("/clear"+window.location.pathname+"/add?edit&"+QUERY_STRING, 800, 600, "yes");
	}
}

function db_empty(){ // js
if (confirm("Вы уверены что хотите удалить ВСЕ записи ?")) {
document.location.href	= "http://"+location.host+location.pathname+"action?empty";
return true;
}else	
return false;
}
function doc_del(name, path){
	if (confirm("Вы уверены что хотите удалить запись ? \n\n"+name+"\n")){
		window.location.href = path.replace("//","/") + "?"+QUERY_STRING+"&del";
		return true;
	}else
		return false;
}
function doc_del_quick(name, path, reload){
	if (confirm("Вы уверены что хотите удалить запись ? \n\n"+name+"\n")){
		window.backgroudexec.location.href = path+"?"+QUERY_STRING+"&del";
		return true;
	}else
		return false;
}

function doc_get(path, type, name){
	// type in cop || cut
	tmp_buff = getField('Buff');
	if( path!=tmp_buff.match( path ))	writeField('Buff', getField('Buff')+"<a href='javascript:;' title="+path+">"+name.substring(0,40)+"("+type+")</a><br>");
	window.backgroudexec.location.href	= "http://"+location.host+"/clear/"+location.pathname+"/action?action&"+QUERY_STRING+"&"+type+"="+path;
	return true;
}
function doc_paste(){
	if (typeof(CUTTED_KAT)!='undefined'&&CUTTED_KAT!=''){
		window.backgroudexec.location.href	= "http://"+location.host+"/clear/"+location.pathname+"/action?action&paste";
		return true;
	}
}