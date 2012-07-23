// JavaScript Document
<!--

function chg_thisclass(obj,clsName,event_type)
{
	var event_obj;
	event_obj=eval(obj);
	if (event_type==1) {
		if (clsName!=""){
			event_obj.className +=" "+clsName;
		}
	}
	else {
		if (clsName!=""){
			event_obj.className=event_obj.className.replace(" "+clsName,"");
		}
	}
}

//根据参数ID获取链接地址的参数值
function getthe_hrefvar(strVar)
{
	var the_urlvar="0";
	if(strVar)
	{
		if(document.location.search.substr(1))
		{
			var aParams = document.location.search.substr(1).split('&');
			for (i=0; i<aParams.length; i++)
			{
				var aParam = aParams[i].split('=');
				if(aParam[0]==strVar)
				{
					the_urlvar = aParam[1];
					break;
				}
			}
		}
	}
	return the_urlvar;
} 

//显示隐藏TAB标签对象
function changetab_objdiv(event_obj,div_obj,now_i,total_num,the_class,other_class)
{
	for(var i=1;i<=total_num;i++)
	{
		if(document.getElementById(event_obj+i))
		{
			var the_eobj=document.getElementById(event_obj+i);
			if(now_i==i)
			{
				the_eobj.className=the_class;
			}
			else
			{
				if(other_class)
				{
					the_eobj.className=other_class;
				}
				else
				{
					the_eobj.className="";
				}
			}
		}
		if(document.getElementById(div_obj+i))
		{
			var item_obj=document.getElementById(div_obj+i);
			if(now_i==i)
			{
				item_obj.style.display="";
			}
			else
			{		
				item_obj.style.display="none";
			}
		}
	}
}

//当网站的图片未能显示时的处理事件
function changeNoImage()
{
	var webImgs=document.getElementsByTagName("img");
	for(var i=0;i<webImgs.length;i++){
		webImgs[i].onerror=function(event){
			event = event || window.event;
			event.srcElement.src="/images/no_pic.jpg";
			//this.src="/images/no_pic.jpg";
		}
	}
}

//对象向上滚动函数
function start_upmarquee(lh,speed,delay,index_obj){
	//参数(lh)表示移动对象的显示高度
	//参数(speed)表示移动速度
	//参数(delay)表示处理移动延迟时间
	//参数(index_obj)表示处理移动的DIV标识ID参数
	var the_time;
	var the_stop=false;
	var moveObj=document.getElementById(index_obj);
	moveObj.innerHTML+=moveObj.innerHTML;
	moveObj.onmouseover=function(){the_stop=true}
	moveObj.onmouseout=function(){the_stop=false}
	moveObj.scrollTop = 0;
	function start(){
		the_time=setInterval(scrolling,speed);
		if(!the_stop) moveObj.scrollTop += 2;
	}
	function scrolling(){
		if(moveObj.scrollTop%lh!=0){
			moveObj.scrollTop += 2;
			if(moveObj.scrollTop>=moveObj.scrollHeight/2) moveObj.scrollTop = 0;
		}else{
			clearInterval(the_time);
			setTimeout(start,delay);
		}
	}
	setTimeout(start,delay);
}

//显示隐藏标签对象
function showhide_objdiv(div_obj,event_type,event_obj){
	if(document.getElementById(div_obj))
	{
		var showhide_obj=document.getElementById(div_obj);
		if (event_type==1)
		{
			if(event_obj)
			{
				//解决子级层次与父级节点的兄弟节点层次问题
				eval(event_obj).style.position="relative";
			}
			showhide_obj.style.display="";
		}
		else
		{
			if(event_obj)
			{
				//解决子级层次与父级节点的兄弟节点层次问
				eval(event_obj).style.position="";
			}
			showhide_obj.style.display="none";
		}
	}
}

//-->