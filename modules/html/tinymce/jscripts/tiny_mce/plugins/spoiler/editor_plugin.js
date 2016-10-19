/**
 * $Id: editor_plugin.js 2014-02-20 
 *
 * @author Denis Ulyusov
 * @copyright http://grandnn.com
 */

(function() {
	var DOM = tinymce.DOM;
	tinymce.PluginManager.requireLangPack('spoiler');
	tinymce.create('tinymce.plugins.SpoilerPlugin', {

		init : function(ed, url) {
			var SPFcodeEl=null;
			ed.addCommand('mceSpoiler', function(ui,v) {
				IsSFcode = checkSFcode( ed.selection.getNode() );
				e = ed.selection.getNode();
				if ( e && IsSFcode ) {
					var SPFcodeElparent = SPFcodeEl.parentNode;
					childcount = SPFcodeEl.childNodes.length;
					for(j=0;j<childcount;j++) {
						SPFcodeElparent.insertBefore( SPFcodeEl.childNodes[0], SPFcodeEl );
					}
					var removed = SPFcodeElparent.removeChild(SPFcodeEl);
					ed.execCommand('mceRepaint');
				}
				else if ( e ){
					selText = ed.selection.getContent();
					var script = "jQuery(this).parent().children('div.spoiler-body')"
								+ ".stop(true, true).slideToggle(); void(0);";
					var html = '<div class="spoiler-wrapper">'
								+ '<a class="spoiler-wrapper-link" '
								+ 'href="javascript://" onclick="' + script + '">' + '[ Подробнее... ]' + '</a>'
								+ '<div class="spoiler-body" >'
								+ selText + '</div></div>';
					//html = '[spoiler]'+selText+'[/spoiler]';
					ed.execCommand("mceInsertContent", false, html);
					ed.execCommand('mceRepaint');
				}
			});

			ed.onNodeChange.add(function(ed, cm, n, co) {
				if( co )
					selText = '';
				else
					selText = ed.selection.getContent();
				IsSFcode = checkSFcode(n);
				cm.setDisabled('spoiler', (selText=='') && !IsSFcode );
				cm.setActive('spoiler', IsSFcode );
			});

			ed.addButton('spoiler', { title : 'spoiler.desc', cmd : 'mceSpoiler', image : url + '/img/spoiler.gif' });
			ed.onSaveContent.add(function(ed, o) {
					o.content = o.content.replace(/'/g, '&#39;');
			});

			function checkSFcode(i){
				SPFcodeEl=null;
				if ( i ){
					while( i && i.nodeName!='BODY' ){
						if ( ed.dom.hasClass(i, 'sfcode') ){
							SPFcodeEl = i;
							return true;
						}
						else
							i = i.parentNode;
					}
				}
				return false;
			}
		},

		getInfo : function() {
			return {
				longname : 'Spoiler plugin',
				author : 'Denis Ulyusov',
				version : "1.0"
			};
		}

	});

	// Register plugin
	tinymce.PluginManager.add('spoiler', tinymce.plugins.SpoilerPlugin);
})();