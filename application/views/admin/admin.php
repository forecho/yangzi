<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title></title>
	<base href="<?php echo base_url()?>" />
	<script type="text/javascript" language="javascript" src="js/jquery-1.7.1.min.js"></script>
	<!-- <link rel="stylesheet" href="css/base.css" /> -->
	<link rel="stylesheet" type="text/css" href="css/admin.css" media="all" />
	<script type="text/javascript" src="My97DatePicker/WdatePicker.js"></script>
	<script type="text/javascript" src="ueditor/editor_config.js"></script>
	<script type="text/javascript" src="ueditor/editor_all.js"></script>
	<link rel="stylesheet" href="ueditor/themes/default/ueditor.css"/>
	

<script type="text/javascript">
$(document).ready(function()
{
	$("#firstpane p.menu_head").click(function()
    {
		$(this).next("div.menu_body").slideToggle(300).siblings("div.menu_body").slideUp("slow");
	});
	
	$(".menu_head span").hover(function(){
		$(this).stop().animate({marginRight:"8px"},400);
		},function(){
		$(this).stop().animate({marginRight:"0px"},400);
	});
//	$(".menu_body a").click(function()
//    {
//		$(this).css({"font-weight":"bold","color":"#FFF"}).parent().prev("p.menu_head").css({"background-image":"url('images/bg-menu-item-current.gif')","color":"#333","font-weight":"bold"});;
//	});

	$('.menu_body a').click(
		function() { 
			$(this).parent().siblings().removeClass('current'); 
			$(this).parent().prev("p").addClass('current');
			$(this).siblings().removeClass('mb_current');
			$(this).addClass('mb_current')
			var currentTab = $(this).attr('href'); 
			$(currentTab).siblings().hide(); 
			$(currentTab).show();
			//return false;
		}
	);
	
	//如果鼠标移动到class为stripe的表格的tr上时，执行函数
	$(".list tbody tr").mouseover(function(){
        //给这行添加class值为over并且当鼠标经过该行时执行函数
			$(this).addClass("over");
		}).mouseout(function(){
			$(this).removeClass("over");//移除该行的class
	})
	
	$(".list tbody tr:even").addClass("alt");
});
</script>
	
<!-- <script src="js/vanadium.js"></script>
<script src="js/check_form.js"></script> -->
</head>
<body>

<div id="admin">
	<div id="admin_main">
		<div id="admin_left">
			<div id="logo"><a href="feadmin/main/" title="后台首页"><img src="images/logo1.png" alt="" /></a></div>
			<div id="admin_user">
				
				<p>你好，<?php echo  $this->session->userdata('username');?></p>
				<a href="" target="_blank" title="返回前台首页">首页</a> | <a href="feadmin/main/change_pwd">修改密码</a> | <a href="feadmin/logout">安全退出</a>
				
			</div>
			<div id="firstpane" class="menu_list">
				<p class="menu_head <?php if($this->uri->segment(3) == "addnews" || $this->uri->segment(3) == "newslist" || $this->uri->segment(3) == "changenews"){echo 'current';}?>"><span>新闻管理</span></p>
				<div class="menu_body" <?php if($this->uri->segment(3) == "addnews" || $this->uri->segment(3) == "newslist" || $this->uri->segment(3) == "changenews"){echo 'style="display: block;"';}?>>
					<a href="feadmin/main/addnews" <?php if($this->uri->segment(3) == "addnews"){echo 'class="mb_current"';}?>>增加新闻</a>
					<a href="feadmin/main/newslist" <?php if($this->uri->segment(3) == "newslist" || $this->uri->segment(3) == "changenews"){echo 'class="mb_current"';}?>>新闻列表</a>
				</div>
				
			</div>
			
			
			<div id="firstpane" class="menu_list">
				<p class="menu_head <?php if($this->uri->segment(3) == "addproduct" || $this->uri->segment(3) == "productlist" || $this->uri->segment(3) == "changeproduct"){echo 'current';}?>"><span>产品管理</span></p>
				<div class="menu_body" <?php if($this->uri->segment(3) == "addproduct" || $this->uri->segment(3) == "productlist" || $this->uri->segment(3) == "changeproduct"){echo 'style="display: block;"';}?>>
					<a href="feadmin/main/addproduct" <?php if($this->uri->segment(3) == "addproduct"){echo 'class="mb_current"';}?>>增加产品</a>
					<a href="feadmin/main/productlist" <?php if($this->uri->segment(3) == "productlist" || $this->uri->segment(3) == "changeproduct"){echo 'class="mb_current"';}?>>产品列表</a>
				</div>
				
			</div>
			
			<div id="firstpane" class="menu_list">
				<p class="menu_head <?php if($this->uri->segment(3) == "addhonor" || $this->uri->segment(3) == "honorlist" || $this->uri->segment(3) == "changehonor"){echo 'current';}?>"><span>公司荣誉管理</span></p>
				<div class="menu_body" <?php if($this->uri->segment(3) == "addhonor" || $this->uri->segment(3) == "honorlist" || $this->uri->segment(3) == "changehonor"){echo 'style="display: block;"';}?>>
					<a href="feadmin/main/addhonor" <?php if($this->uri->segment(3) == "addhonor"){echo 'class="mb_current"';}?>>增加荣誉</a>
					<a href="feadmin/main/honorlist" <?php if($this->uri->segment(3) == "honorlist" || $this->uri->segment(3) == "changehonor"){echo 'class="mb_current"';}?>>荣誉列表</a>
				</div>
				
			</div>
			
			<div id="firstpane" class="menu_list">
				<p class="menu_head <?php if($this->uri->segment(3) == "addbanner" || $this->uri->segment(3) == "bannerlist" || $this->uri->segment(3) == "changebanner"){echo 'current';}?>"><span>首页幻灯片管理</span></p>
				<div class="menu_body" <?php if($this->uri->segment(3) == "addbanner" || $this->uri->segment(3) == "bannerlist" || $this->uri->segment(3) == "changebanner"){echo 'style="display: block;"';}?>>
					<a href="feadmin/main/addbanner" <?php if($this->uri->segment(3) == "addbanner"){echo 'class="mb_current"';}?>>增加幻灯片</a>
					<a href="feadmin/main/bannerlist" <?php if($this->uri->segment(3) == "bannerlist" || $this->uri->segment(3) == "changebanner"){echo 'class="mb_current"';}?>>幻灯片列表</a>
				</div>
				
			</div>
			
			<div id="firstpane" class="menu_list">
				<p class="menu_head <?php if($this->uri->segment(3) == "messagelist" || $this->uri->segment(3) == "reply"){echo 'current';}?>"><span>留言板管理</span></p>
				<div class="menu_body" <?php if($this->uri->segment(3) == "messagelist" || $this->uri->segment(3) == "reply"){echo 'style="display: block;"';}?>>
					<a href="feadmin/main/messagelist" <?php if($this->uri->segment(3) == "messagelist" || $this->uri->segment(3) == "reply"){echo 'class="mb_current"';}?>>留言板回复、删除</a>
				</div>
				
			</div>
			
			
			<div id="firstpane" class="menu_list">
				<p class="menu_head <?php if($this->uri->segment(3) == "change_company" || $this->uri->segment(3) == "zzjg" || $this->uri->segment(3) == "dszzx" || $this->uri->segment(3) == "rszp" || $this->uri->segment(3) == "gsjs" || $this->uri->segment(3) == "qywh"){echo 'current';}?>"><span>修改信息</span></p>
				<div class="menu_body" <?php if($this->uri->segment(3) == "change_company" || $this->uri->segment(3) == "zzjg" || $this->uri->segment(3) == "dszzx" || $this->uri->segment(3) == "rszp" || $this->uri->segment(3) == "gsjs" || $this->uri->segment(3) == "qywh"){echo 'style="display: block;"';}?>>
					<a href="feadmin/main/change_company" <?php if($this->uri->segment(3) == "change_company"){echo 'class="mb_current"';}?>>修改公司信息</a>
					<a href="feadmin/main/zzjg" <?php if($this->uri->segment(3) == "zzjg"){echo 'class="mb_current"';}?>>修改组织结构</a>
					<a href="feadmin/main/dszzx" <?php if($this->uri->segment(3) == "dszzx"){echo 'class="mb_current"';}?>>修改董事长致信</a>
					<a href="feadmin/main/rszp" <?php if($this->uri->segment(3) == "rszp"){echo 'class="mb_current"';}?>>修改人事招聘</a>
					<a href="feadmin/main/gsjs" <?php if($this->uri->segment(3) == "gsjs"){echo 'class="mb_current"';}?>>修改公司简介</a>
					<a href="feadmin/main/qywh" <?php if($this->uri->segment(3) == "qywh"){echo 'class="mb_current"';}?>>修改企业文化</a>
					
				</div>
				
			</div>
			
		</div>
	</div>	
	<div id="admin_right">
		<div id="admin_content">
			<?php 
			switch(@$this->uri->segment(3))
			{
			case '':
				echo '<h1>Welcome !</h1>';
				break;
			case 'change_pwd':
				$this->load->view('admin/change_pwd');
				break;
				
				
			case 'addnews':
				$this->load->view('admin/addnews');
				break;
			case 'newslist':
				$this->load->view('admin/newslist');
				break;
			case 'changenews':
				$this->load->view('admin/changenews');
				break;
				
				
			case 'addproduct':
				$this->load->view('admin/addproduct');
				break;
			case 'productlist':
				$this->load->view('admin/productlist');
				break;
			case 'changeproduct':
				$this->load->view('admin/changeproduct');
				break;
			case 'change_company':
				$this->load->view('admin/change_company');
				break;
				
				
			case 'addhonor':
				$this->load->view('admin/addhonor');
				break;
			case 'honorlist':
				$this->load->view('admin/honorlist');
				break;
			case 'changehonor':
				$this->load->view('admin/changehonor');
				break;
				
				
			case 'addbanner':
				$this->load->view('admin/addbanner');
				break;
			case 'bannerlist':
				$this->load->view('admin/bannerlist');
				break;
			case 'changebanner':
				$this->load->view('admin/changebanner');
				break;
				
			case 'messagelist':
				$this->load->view('admin/messagelist');
				break;
			case 'reply':
				$this->load->view('admin/reply');
				break;
				
				
			case 'change_company':
				$this->load->view('admin/change_company');
				break;
			case 'zzjg'||'dszzx':
				$this->load->view('admin/change');
				break;
			}
			?>
			<div id="admin_foot">
				<p>&copy; Copyrigh</p>
				<?php
					//echo  $this->session->newsdata('uid');
				?>
			</div>
		</div>
	</div>

</div>	
</body>
</html>