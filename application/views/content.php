<div class="container clearfix mauto">
<div class="p_container clearfix">
<?php echo $this->load->view('contact');?>
<div class="p_rig">
<dl class="p_r_t">
<dt><span id="com_pmodule_news_list" editok="online"> 新闻中心 </span>
</dt>
<dd> 当前位置 ：<a href="#" class="position_aclass"> 首页 </a>&gt; <a id="position_nowtitle" class="fb" href="welcome/news/">新闻中心</a></dd>
</dl>
<div class="clear"></div>
<div class="p_content">
<div id="com_thenm_list" editok="online">
<div id="statusid" class="xweb-ajaxmsg">
	<div class="p_n_title"><?php echo $selnews->title;?></div>
    <div class="p_n_info"> * 作者: 扬子船舶 * 发表时间: <?php echo $selnews->addtime;?> * 浏览: <?php echo $selnews->view;?></div>
    <div class="p_n_content">
    	<?php echo $selnews->content;?>
    </div>
</div>
</div>
</div>
<div class="clear"></div>
</div>
</div>
</div>