<div class="p_rig" id="myTab_Content2" style="display:none;">
<dl class="p_r_t">
<dt>公司荣誉</dt>
<dd> 当前位置 ：<a href="<?php echo base_url();?>" class="position_aclass"> 首页 </a>&gt; <a id="position_nowtitle" class="fb">公司荣誉</a></dd>
</dl>
<div class="clear"></div>
<div class="p_content">
<div class="content" id="com_thenm_list" editok="online">
<ul class="p_p_list">
	<?php foreach($sel_product['sel_product'] as $row){?>
	<li>
		<img alt="江西扬子船舶制造有限公司" src="uploads/img/<?php echo $row['image'];?>">
		<span><?php echo $row['title'];?></span>
	</li>
	<?php }?>
</ul>
	<div id="page"><?php echo $sel_product['pag_links'];?></div>
</div>
</div>
<div class="clear">
</div><div class="edit_nullmodule" id="com_definedkeys_3" editok="online">
</div>
<div class="edit_nullmodule" id="com_definedkeys_4" editok="online">
</div>
</div>