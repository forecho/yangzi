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
<script src="js/public.js" type="text/javascript"></script>
<script type="text/javascript" src="js/jquery-1.4.1.min.js"></script>
<script type="text/javascript" src="js/jquery.orbit.min.js"></script>
		<!-- Use the ID of your slider here to avoid the flash of unstyled content -->
	  	<style type="text/css">
	  		/* Want a different Loading GIF - visit http://www.webscriptlab.com/ - that's where we go this one :) */
	  	</style>
		
		<!-- Attach our CSS -->
	  	<link rel="stylesheet" href="css/orbit.css">	
	  	
		<!--[if IE]>
			<style type="text/css">
				.timer { display: none !important; }
				div.caption { background:transparent; filter:progid:DXImageTransform.Microsoft.gradient(startColorstr=#99000000,endColorstr=#99000000);zoom: 1; }
			</style>
		<![endif]-->
	  	
		<!-- Attach necessary scripts -->
		
		<!-- Run the plugin -->
		<script type="text/javascript">
			$(window).load(function() {
				$('#featured').orbit({
					'bullets': true,
					'timer' : true,
					'animation' : 'horizontal-slide'
				});
			});
		</script>

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

	<div id="featured" > 
	<?php foreach($sel_banner as $row){?>
			<a href="<?php echo $row['link'];?>" title="<?php echo $row['title'];?>"><img src="uploads/<?php echo $row['image'];?>" rel="ezio<?php echo $row['id'];?>" /></a>
	<?php }?>
		</div> 
		<?php foreach($sel_banner as $ban){?>
			<span class="orbit-caption" id="ezio<?php echo $ban['id'];?>"><?php echo $ban['title'];?></span>
		<?php }?>
		
<!--焦点图结束-->