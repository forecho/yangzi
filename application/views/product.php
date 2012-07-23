<div class="container clearfix mauto">
<div class="p_container clearfix">
<?php echo $this->load->view('contact');?>
<div class="p_rig">
<dl class="p_r_t">
<dt><span id="com_pmodule_news_list" editok="online"> 产品展示 </span>
</dt>
<dd> 当前位置 ：<a href="#" class="position_aclass"> 首页 </a>&gt; <a id="position_nowtitle" class="fb">产品展示</a></dd>
</dl>
<div class="clear"></div>
<div class="p_content">
<div class="content" id="com_thenm_list" editok="online">

<ul class="p_p_list">
	<?php foreach($sel_product['sel_product'] as $row){?>
	<li>
		<a class="the_imga"  title="江西扬子船舶制造有限公司" href="uploads/img/<?php echo $row['image'];?>" target="_blank">
		<img alt="江西扬子船舶制造有限公司" src="uploads/img/<?php echo $row['image'];?>">
		</a>
		<span>
		<a title="<?php echo $row['title'];?>" href="uploads/img/<?php echo $row['image'];?>"><?php echo $row['title'];?></a>
		</span>
	</li>
	<?php }?>
</ul>
</div>
	<div id="page"><?php echo $sel_product['pag_links'];?></div>
</div>

</div>
</div>
</div>