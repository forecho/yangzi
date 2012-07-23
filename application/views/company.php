<div class="container clearfix mauto">
<div class="p_container clearfix">
<div class="p_left"><div id="myTab" editok="online">
<h1>企业概况 </h1>
<ul class="ullist_sortnav">
<li class="active" onclick="nTabs(this,0)";>
<a>公司简介</a>
</li>
<li class="normal"  onclick="nTabs(this,1)";>
<a>组织结构</a>
</li>
<li class="normal"  onclick="nTabs(this,2)";>
<a>公司荣誉</a>
</li>
<li class="normal"  onclick="nTabs(this,3)";>
<a>董事长致信</a>
</li>
<li class="normal" onclick="nTabs(this,4)";>
<a>企业文化</a>
</li>
</ul>
<div><img src="images/bot3.gif"></div></div>
<div class="edit_nullmodule" id="com_definedkeys_1" editok="online">
</div>
<div class="edit_nullmodule" id="com_definedkeys_2" editok="online">
</div>
</div>

<div class="p_rig" id="myTab_Content0">
<dl class="p_r_t">
<dt>公司简介</dt>
<dd> 当前位置 ：<a href="<?php echo base_url();?>" class="position_aclass"> 首页 </a>&gt; <a id="position_nowtitle" class="fb" >公司简介</a></dd>
</dl>
<div class="clear"></div>
<div class="p_content">
<div class="content" id="com_thenm_list" editok="online">
	<?php echo $gsjj->content;?>
</div>
</div>
<div class="clear">
</div><div class="edit_nullmodule" id="com_definedkeys_3" editok="online">
</div>
<div class="edit_nullmodule" id="com_definedkeys_4" editok="online">
</div>
</div>

<div class="p_rig" id="myTab_Content1" style="display:none;">
<dl class="p_r_t">
<dt>组织机构</dt>
<dd> 当前位置 ：<a href="<?php echo base_url();?>" class="position_aclass"> 首页 </a>&gt; <a id="position_nowtitle" class="fb">组织机构</a></dd>
</dl>
<div class="clear"></div>
<div class="p_content">
<div class="content" id="com_thenm_list" editok="online">
<?php echo $zzjg->content;?>
</div>
</div>
<div class="clear">
</div><div class="edit_nullmodule" id="com_definedkeys_3" editok="online">
</div>
<div class="edit_nullmodule" id="com_definedkeys_4" editok="online">
</div>
</div>


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
		<a href="uploads/img/<?php echo $row['image'];?>" alt="江西扬子船舶制造有限公司" title="<?php echo $row['title'];?>" target="_blank"><img alt="江西扬子船舶制造有限公司" src="uploads/img/<?php echo $row['image'];?>"></a>
		<span><?php echo $row['title'];?></span>
	</li>
	<?php }?>
</ul>
</div>
</div>
<div class="clear">
</div><div class="edit_nullmodule" id="com_definedkeys_3" editok="online">
</div>
<div class="edit_nullmodule" id="com_definedkeys_4" editok="online">
</div>
</div>


<div class="p_rig" id="myTab_Content3" style="display:none;">
<dl class="p_r_t">
<dt>董事长致信</dt>
<dd> 当前位置 ：<a href="<?php echo base_url();?>" class="position_aclass"> 首页 </a>&gt; <a id="position_nowtitle" class="fb">董事长致信</a></dd>
</dl>
<div class="clear"></div>
<div class="p_content">
<div class="content" id="com_thenm_list" editok="online">
<?php echo $dszzx->content;?>
</div>
</div>
<div class="clear">
</div><div class="edit_nullmodule" id="com_definedkeys_3" editok="online">
</div>
<div class="edit_nullmodule" id="com_definedkeys_4" editok="online">
</div>
</div>


<div class="p_rig" id="myTab_Content4" style="display:none;">
<dl class="p_r_t">
<dt>企业文化</dt>
<dd> 当前位置 ：<a href="#" class="position_aclass"> 首页 </a>&gt; <a id="position_nowtitle" class="fb">企业文化</a></dd>
</dl>
<div class="clear"></div>
<div class="p_content">
<div class="content" id="com_thenm_list" editok="online">
<?php echo $qywh->content;?>
</div>
</div>
<div class="clear">
</div><div class="edit_nullmodule" id="com_definedkeys_3" editok="online">
</div>
<div class="edit_nullmodule" id="com_definedkeys_4" editok="online">
</div>
</div>

</div>
</div>
<script type="text/javascript">
        function nTabs(thisObj, Num) {
            if (thisObj.className == "active") return;
            var tabList = document.getElementById("myTab").getElementsByTagName("li");
            for (i = 0; i < tabList.length; i++) {//点击之后，其他tab变成灰色，内容隐藏，只有点击的tab和内容有属性
                if (i == Num) {
                    thisObj.className = "active";
                    document.getElementById("myTab_Content" + i).style.display = "block";
                } else {
                    tabList[i].className = "normal";
                    document.getElementById("myTab_Content" + i).style.display = "none";
                }
            }
        }
</script>
