/*!
 * jquery.fn.drag
 * @author 浜戞贰鐒� http://qianduanblog.com
 * @for ie9(鍚�)+銆乧hrome銆乫irefox
 * @version 1.1
 * 2013-11-23 16:24:47
 */
(function(a,c){var b={handle:"",ondragstart:function(){},ondrag:function(){},ondragend:function(){}};a.fn.drag=function(d){return this.each(function(){var n,i=a(this),p=a.extend({},b,d),f=p.handle?i.find(p.handle):i,m=a(p.zoom),k={},o=a("body").css("cursor"),l=0,j=0;f.css("cursor","move");g(i);f.mousedown(function(q){if(!j){l=i.css("z-index");h(q);return false;}});a(document).mousemove(function(q){if(j){e(q);return false;}}).mouseup(function(q){if(j){e(q,true);return false;}});function g(){if(!i.css("position")||i.css("position")=="static"){i.css({position:"relative",left:0,top:0});}}function h(q){j=1;k.screenX=q.screenX;k.screenY=q.screenY;k.left=i.offset().left;k.top=i.offset().top;i.css("z-index",a.isNumeric(l)?l*1+1:1);p.ondragstart.call(i,q);a("body").css("cursor","move");}function e(r,q){if(j){i.offset({left:r.screenX-k.screenX+k.left,top:r.screenY-k.screenY+k.top});}if(q&&j){i.css("z-index",l);j=0;p.ondragend.call(i,r);a("body").css("cursor",o);}else{p.ondrag.call(i,r);}}});};a.fn.drag.defaults=b;})(jQuery);

