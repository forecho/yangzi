<div class="container clearfix mauto">
<div class="p_container clearfix">
<?php echo $this->load->view('contact');?>
<div class="p_rig">
<dl class="p_r_t">
<dt><span id="com_pmodule_news_list" editok="online"> 客户留言 </span>
</dt>
<dd> 当前位置 ：<a href="#" class="position_aclass"> 首页 </a>&gt; <a id="position_nowtitle" class="fb">客户留言</a></dd>
</dl>
<div class="clear"></div>
<div class="p_content">
<div class="content" id="com_thenm_list" editok="online">
<div id="statusid" class="xweb-ajaxmsg">
	<ul class="ly">
	<?php foreach($sel_message['sel_message'] as $row){?>
		<li>
			<a><?php echo $row['user']?></a><span>[<?php echo $row['addtime'];?>]</span>
			<p><?php echo $row['content']?></p>
		</li>
		<?php
		if($this->mhome->isreply($row['id']) != '0'){
			
			$selreply = $this->mhome->selreply($row['id']);?>
		 <li class="reply">
			<a><?php echo $selreply->user;?>回复</a><span>[<?php echo $selreply->addtime;?>]</span>
			<p><?php echo $selreply->content;?></p>
		</li>
	<?php 
			}
		}
	?>
   </ul>

	<div id="page"><?php echo $sel_message['pag_links'];?></div>
	
	<div class="clear"></div><br />
	
	<form action="welcome/add_message/" method="post" class="form" onSubmit="return chkinput(this)">
		<p>&nbsp;&nbsp;用户名：<input name="user" class="name"/></p>
		<p>留言内容：<textarea class="kua" cols="50" rows="5" name="content"></textarea>
		<span class="tijiao"><input type="submit" name="submit"  value=" "/></span>
		</p>

	</form>
</div>

</div>
</div>


</div>
</div>
</div>
<script language="javascript">
function chkinput(form)
{
	if(form.user.value=="")
	{
		alert("请输入用户名!");
		return(false);
	}
	if(form.content.value=="")
	{
		alert("请输入留言内容!");
		return(false);
	}
	return(true);
}
</script>