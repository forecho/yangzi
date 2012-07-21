<div class="change">
	<h1>留言回复</h1>
	<dl>
	<?php
		if($isreply == '0'){
			echo form_open('feadmin/reply/'.$selmessage->id,'onSubmit="return chkinput(this)"');
		}else{
			echo form_open('feadmin/change_reply/'.$selmessage->id,'onSubmit="return chkinput(this)"');
		}
	?>
		<dt>留言用户：</dt>
		<dd><?php echo $selmessage->user;?> </dd>
		<dt>留言时间：</dt>
		<dd><?php echo $selmessage->addtime;?> </dd>
		<dt><dt>留言内容：</dt>
		<dd><?php echo $selmessage->content;?> </dd><br /><br />
		<dt>我的回复：</dt>
		<?php if($isreply == '0'){?>
		<dd><?php echo form_textarea('content');?> </dd>
		<dd><?php $class = 'class="submit"';echo form_submit('submit','回复',$class);?></dd>
		<?php 
			}else{
		?>
		<dd><?php echo form_textarea('content',$selreply->content);?> </dd>
		<dd><?php $class = 'class="submit"';echo form_submit('submit','修改回复',$class);?> <a href="feadmin/del_reply/<?php echo $selmessage->id;?>">删除此条回复</a></dd>
		<?php }?>
	<?php form_close();?>
	</dl>
</div>