<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keyword" content="江西扬子船舶制造有限公司" />
<meta name="description" content="江西扬子船舶制造有限公司" />
<meta name="author" content="江西扬子船舶制造有限公司" />
<title>江西扬子船舶制造有限公司---网站首页</title>
<base href="<?php echo base_url()?>" />
<link rel="stylesheet" type="text/css" href="css/layout.css" />
<link rel="stylesheet" type="text/css" href="css/dll.css" />
<link rel="stylesheet" type="text/css" href="css/font.css" />
<link rel="stylesheet" type="text/css" href="css/main.css" />
<link href="css/16sucai_css.css" rel="stylesheet" type="text/css">
<script src="js/16sucai_com.js" type="text/javascript"></script>
<script src="js/public.js" type="text/javascript"></script>
</head>
<body>
<div class="header mauto clearfix">
<div class="logo" id="com_logo" editok="online"><a href=""><img  src="images/logo.png" alt="江西扬子船舶制造有限公司" class="default_logo" /></a>
</div>
<div class="top_lan">
<li class="color"><a  style="cursor:hand" onclick=this.style.behavior="url(#default#homepage)";this.setHomePage("<?php echo base_url()?>");>设为首页 </a></li>
<li class="color t2"><a href="#" onclick="javascript:window.external.AddFavorite('http://www.XXX.com','江西扬子船舶制造有限公司')" title=收藏本站到你的收藏夹"> 加入收藏 </a></li>
</div>
</div>
<div class="clear"></div>
<!--头部结束-->
<div class="i_nav mauto clearfix" id="com_mainmenu" editok="online">
<div class="mainmenu_rtul">
<span class="ulmainmenu_li">
<a class="mainmenu_a <?php if($this->uri->segment(2) == "" || $this->uri->segment(2) == "index"){echo 'activemenu';}?>" href="welcome/index">网站首页</a>
</span>
<span class="ulmainmenu_li">
<a class="mainmenu_a <?php if($this->uri->segment(2) == "company"){echo ' activemenu';}?>" href="welcome/company">企业概况</a>
</span>
<span class="ulmainmenu_li">
<a id="menua_3" class="mainmenu_a <?php if($this->uri->segment(2) == "news" || $this->uri->segment(2) == "content"){echo ' activemenu';}?>" href="welcome/news">新闻中心</a>
</span>
<span class="ulmainmenu_li">
<a id="menua_2" class="mainmenu_a <?php if($this->uri->segment(2) == "product"){echo ' activemenu';}?>" href="welcome/product">产品展示</a>
</span>
<span class="ulmainmenu_li">
<a class="mainmenu_a <?php if($this->uri->segment(2) == "person"){echo ' activemenu';}?>" href="welcome/person">客户留言</a>
</span>
<span class="ulmainmenu_li">
<a class="mainmenu_a <?php if($this->uri->segment(2) == "promit"){echo ' activemenu';}?>" href="welcome/promit">人事招聘</a>
</span>
</div>
</div>
<div class="clear"></div>
<!--导航结束-->
<div class="foucebox">
	<div class="scrollimg">
		<div id="SwitchBigPic" style="margin-left: 0px; ">
<div class="scrollimg_div">
	<a href="#" class="scrollimg_img" blockid="2997"><img id="bigpic_0" src="images/01.jpg"></a>
	<h3><a href="#" class="scrollimg_txt" blockid="2997">江西扬子船舶制造有限公司</a></h3>
	<div class="bg"></div>
</div>
<div class="scrollimg_div">
	<a href="#" class="scrollimg_img" blockid="2997"><img id="bigpic_1" src="images/02.jpg" ></a>
	<h3><a href="#" class="scrollimg_txt" blockid="2997">江西扬子船业------以诚信求生存  以技术优先</a></h3>
	<div class="bg"></div>
</div>
<div class="scrollimg_div">
	<a href="#"  class="scrollimg_img" blockid="2997"><img id="bigpic_2" src="images/03.jpg"></a>
	<h3><a href="#" class="scrollimg_txt" blockid="2997">正在建设的船-----以安全为基础 以质量谋发展</a></h3>
	<div class="bg"></div>
</div>
<div class="scrollimg_div">
	<a href="#" class="scrollimg_img" blockid="2997"><img id="bigpic_3" src="images/04.jpg"></a>
	<h3><a href="#" class="scrollimg_txt" blockid="2997">建成后交船----以诚信求生存 以技术优先|</a></h3>
	<div class="bg"></div>
</div>
<script>
var ScrollBigPic = [
'images/01.jpg'
'images/02.jpg'
'images/03.jpg'
'images/04.jpg'
] ;
</script>
		</div>
		<div></div>
		<div class="scrollimg_tigger">
				<a id="big_pic_nav_0" href="#" target="_self" title="" class="on">1</a>
				<a id="big_pic_nav_1" href="#" target="_self" title="" class="">2</a>
				<a id="big_pic_nav_2" href="#" target="_self" title="" class="">3</a>
				<a id="big_pic_nav_3" href="#" target="_self" title="" class="">4</a>
			</div>
	</div><!--scrollimg  END-->
<script>
var MovieRecom={					
				bigpic:"SwitchBigPic",	//大图DIV之ID通用部分
				step:1000,
				smallpic:"big_pic_nav",//小图之ID通用部分
				selectstyle:"currA",	//小图被选中之后的CSS
				pictxt:"",	//配套图片文字
				totalcount:4,				//图片数量
				autotimeintval:5000,
				objname:"MovieRecom"	//对象名称
			};
BigNews.init(MovieRecom);
</script>
</div>
<!--焦点图结束-->