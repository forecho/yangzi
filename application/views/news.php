<div class="container clearfix mauto">
<div class="p_container clearfix">
<?php echo $this->load->view('contact');?>
<div class="p_rig">
<dl class="p_r_t">
<dt><span id="com_pmodule_news_list" editok="online"> 新闻中心 </span>
</dt>
<dd> 当前位置 ：<a href="#" class="position_aclass"> 首页 </a>&gt; <a id="position_nowtitle" class="fb">新闻中心</a></dd>
</dl>
<div class="clear"></div>
<div class="p_content">
<div class="content" id="com_thenm_list" editok="online">
<div id="statusid" class="xweb-ajaxmsg">
	<ul class="p_n_list">
		<?php foreach($sel_news['sel_news'] as $row){?>
        <li><a href="welcome/content/<?php echo $row['id'];?>" title="<?php echo $row['title'];?>"><?php echo $row['title'];?></a><span>[<?php echo $row['addtime'];?>]</span></li>
		<?php }?>
    </ul>
</div>

<div id="page"><?php echo $sel_news['pag_links'];?></div>

</div>
</div>
<div class="clear"></div>
</div>
</div>
</div>