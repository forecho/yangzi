if(!$)var $=function(a){return document.getElementById(a)};function getCookie(a){var b=a+"=";a=document.cookie.indexOf(b);if(a!=-1){a+=b.length;b=document.cookie.indexOf(";",a);if(b==-1)b=document.cookie.length;return unescape(document.cookie.substring(a,b))}else return""}function _getCookie(a){return document.cookie.match(RegExp("(^"+a+"| "+a+")=([^;]*)"))==null?"":decodeURIComponent(RegExp.$2)}String.prototype.len=function(){return this.replace(/[^\x00-\xff]/g,"rr").length};
String.prototype.sub=function(a){var b=/[^\x00-\xff]/g;if(this.replace(b,"mm").length<=a)return this;for(var c=Math.floor(a/2);c<this.length;c++)if(this.substr(0,c).replace(b,"mm").length>=a)return this.substr(0,c)+"...";return this};function setCookie(a,b,c){c=new Date((new Date).getTime()+c*36E5);document.cookie=a+"="+escape(b)+"; path=/; domain=xunlei.com; expires="+c.toGMTString()}
function delCookie(a){var b=new Date((new Date).getTime());document.cookie=a+"= ; path=/; domain=xunlei.com; expires="+b.toGMTString()}var EventUtil={};EventUtil.addEventHandler=function(a,b,c){if(a.addEventListener)a.addEventListener(b,c,false);else if(a.attachEvent)a.attachEvent("on"+b,c);else a["on"+b]=c};EventUtil.removeEventHandler=function(a,b,c){if(a.removeEventListener)a.removeEventListener(b,c,false);else if(a.detachEvent)a.detachEvent("on"+b,c);else a["on"+b]=null};
ScrollCrossLeft={interval:0,count:0,duration:0,step:0,srcObj:null,callback:null};ScrollCrossLeft.doit=function(a,b,c,f){BigNews.OnScrolling=true;var d=ScrollCrossLeft;a.style.marginLeft=function(g,e,h,j){return h*((g=g/j-1)*g*g+1)+e}(d.count,b,c,f)+"px";d.count++;if(d.count==f){clearInterval(d.interval);d.count=0;a.style.marginLeft=b+c+"px";d.callback();BigNews.OnScrolling=false}};ScrollCrossLeft2={interval:0,count:0,duration:0,step:0,srcObj:null,callback:null};
ScrollCrossLeft2.doit_2=function(a,b,c,f){var d=ScrollCrossLeft2;a.style.marginLeft=function(g,e,h,j){return h*((g=g/j-1)*g*g+1)+e}(d.count,b,c,f)+"px";d.count++;if(d.count==f){clearInterval(d.interval);d.count=0;a.style.marginLeft=b+c+"px";d.callback()}};ScrollCrossLeft2.scroll=function(a,b,c,f,d,g){var e=ScrollCrossLeft2;e.duration=g;e.callback=d;e.interval=setInterval(function(){e.doit_2(a,f,b*c,g)},10)};var B=BigNews={current:0,next:0,scrollInterval:0,autoScroller:0,s:{},OnScrolling:false};
BigNews.turn=function(a,b){if(BigNews.OnScrolling)return false;clearInterval(BigNews.autoScroller);BigNews.scroll(a,b)};
BigNews.scroll=function(a,b){var c=b.step,f=BigNews;f.next=a;try{clearInterval(BigNews.s.interval)}catch(d){}if(b.pictxt!=null&&b.pictxt!="")$(b.pictxt+"_"+a).style.display="block";var g=-a+f.current;$(b.bigpic);BigNews.s.duration=16;BigNews.s.callback=function(){BigNews.current=a;for(i=0;i<b.totalcount;i++)if(i==a)$("big_pic_nav_"+i).className="on";else $("big_pic_nav_"+i).className=""};var e=parseInt($(b.bigpic).style.marginLeft)||0;if($("bigpic_"+a).src=="http://images.movie.xunlei.com/img_default.gif")try{setTimeout('$("bigpic_'+
a+'").src = ScrollBigPic['+a+"] ;",50)}catch(h){}BigNews.s.interval=setInterval(function(){BigNews.s.doit($(b.bigpic),e,c*g,16)},10)};BigNews.auto=function(a){clearInterval(BigNews.autoScroller);BigNews.autoScroller=setInterval(function(){BigNews.scroll(BigNews.current==a.totalcount-1?0:BigNews.current+1,a)},a.autotimeintval)};BigNews.pauseSwitch=function(){clearTimeout(BigNews.autoScroller)};
BigNews.showNext=function(a,b){if(a>=MovieRecom.totalcount-1){document.body.focus();return false}else{BigNews.pauseSwitch();BigNews.turn(a+1,b);BigNews.auto(b);document.body.focus()}};BigNews.showPre=function(a,b){if(a<=0){document.body.focus();return false}else{BigNews.pauseSwitch();BigNews.turn(a-1,b);BigNews.auto(b);document.body.focus()}};
BigNews.init=function(a){BigNews.s=ScrollCrossLeft;EventUtil.addEventHandler($(a.bigpic),"mouseover",new Function("BigNews.pauseSwitch();"));EventUtil.addEventHandler($(a.bigpic),"mouseout",new Function("BigNews.auto("+a.objname+");"));for(i=0;i<a.totalcount;i++)a.smallpic!=null&&a.smallpic!=""&&EventUtil.addEventHandler($(a.smallpic+"_"+i),"click",new Function("BigNews.pauseSwitch();BigNews.turn("+i+","+a.objname+");BigNews.auto("+a.objname+");document.body.focus();return false;"));BigNews.auto(a)};
var Turn={};Turn.pre=function(a){a.current!=0&&Turn.go(a,a.current-1)};Turn.next=function(a){a.current!=2&&Turn.go(a,a.current+1)};
Turn.go=function(a,b){function c(){a.current=b;for(var e=a.clickflag=0;e<3;e++)$(a.a+e).className="";$(a.a+b).className="currA"}function f(){a.current=b;for(var e=0;e<3;e++)if(e==b)$(a.ul+"_"+e).style.display="block";else $(a.ul+"_"+e).style.display="none"}if(a.current!=b){var d=-b+a.current;if(!(a.clickflag>0)){a.clickflag=1;if(a.step>0){try{a.img&&setTimeout(function(){for(cnt=b*6;cnt<=(b+1)*6-1;cnt++)document.getElementById(a.div+"_pic_"+cnt).src=a.img[cnt]},50)}catch(g){}ScrollCrossLeft2.scroll($(a.div),
a.step,d,parseInt($(a.div).style.marginLeft)||0,c,10)}else{f();c()}document.body.focus()}}};var MiniSite={};MiniSite.Browser={ie:/msie/.test(window.navigator.userAgent.toLowerCase()),moz:/gecko/.test(window.navigator.userAgent.toLowerCase()),opera:/opera/.test(window.navigator.userAgent.toLowerCase()),safari:/safari/.test(window.navigator.userAgent.toLowerCase())};
MiniSite.JsLoader={load:function(a,b,c){var f=document.createElement("script");f.setAttribute("charset",b);f.setAttribute("type","text/javascript");f.setAttribute("src",a);document.getElementsByTagName("head")[0].appendChild(f);if(MiniSite.Browser.ie)f.onreadystatechange=function(){if(this.readyState=="loaded"||this.readyState=="complete")setTimeout(function(){try{c()}catch(d){}},50)};else if(MiniSite.Browser.moz)f.onload=function(){setTimeout(function(){try{c()}catch(d){}},50)};else setTimeout(function(){try{c()}catch(d){}},
50)}};var ShowMoreLinks="",MoreLinksShowHandles=null;function showMoreLinks(a,b){clearTimeout(MoreLinksShowHandles);document.getElementById(a).style.display="block";if(b)document.getElementById(a+"Handle").className=b;if(a!=ShowMoreLinks&&ShowMoreLinks!=""){document.getElementById(ShowMoreLinks).style.display="none";if(b)document.getElementById(a+"Handle").className=b}ShowMoreLinks=a}
function hideMoreLinks(a,b){MoreLinksShowHandles=setTimeout(function(){document.getElementById(a).style.display="none"},100);if(b)document.getElementById(a+"Handle").className=b}String.prototype.LTrim=function(){return LTrim(this)};function LTrim(a){var b;for(b=0;b<a.length;b++)if(a.charAt(b)!=" "&&a.charAt(b)!=" ")break;return a=a.substring(b,a.length)}
function doGougouSearch(){var a=document.getElementById("gougou_keywords").value;a=a.LTrim();if(a==""||a=="\u8f93\u5165\u5f71\u7247\u540d\u6216\u4e3b\u6f14\u540d"){alert("\u8bf7\u8f93\u5165\u641c\u7d22\u5173\u952e\u5b57!");document.getElementById("gougou_keywords").value="";document.getElementById("gougou_keywords").focus();return false}a=encodeURIComponent(a);a="http://search.xunlei.com/search.php?keyword="+a+"";var b=new Date;b=parseInt(b.getHours().toString()+b.getMinutes().toString()+b.getSeconds().toString()/
3);window.open(a,"so_"+b);return false};/***һ���ز����ռ�������www.16sucai.com***/