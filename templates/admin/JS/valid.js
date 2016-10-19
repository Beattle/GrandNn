var df,m,mo,e;if(typeof(df)=='undefined')df=document.tform;
function v(){a=1;o=!(mo);em=1;
if(m)for(i=0;(i<m.length&&a);)eval('a&=df['+m[i++]+'].value!=""');
if(mo)for(i=0;(a&&i<mo.length&&!o);){eval('o|=df['+mo[i]+'].value!=""&&df['+mo[i++]+'].checked;');}
if(e)for(i=0;(i<e.length&&em);)eval('em&=echk(df['+e[i++]+'].value)');
eval('df.Submit.disabled=!(a&o&em)');
return (a&o&em)}
function sbm(){if (v()){df.Submit.disabled=1;df.Submit.value="Подождите пожалуйста";return 1}else{return 0;} }
function echk(s) {r=1;if(window.RegExp){st="a";ex=new RegExp(st);if(st.match(ex)){r1=new RegExp("(@.*@)|(\\.\\.)|(@\\.)|(^\\.)");r2=new RegExp("^.+\\@(\\[?)[a-zA-Z0-9\\-\\.]+\\.([a-zA-Z]{2,3}|[0-9]{1,3})(\\]?)$");b=(!r1.test(s)&&r2.test(s));}else{r=0;}}else{r=0;}if(!r)b=(s.indexOf("@")>0&&s.indexOf(".")>0&&s!=""&&s!="введите e-mail");return(b);} 
df.Submit.disabled=1;