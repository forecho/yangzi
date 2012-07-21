<div class="change">
	<h1>修改幻灯片</h1>
	<dl>
	<?php echo form_open_multipart('feadmin/change_banner/'.$selbanner->id,'onSubmit="return chkinput(this)"')?>
		<dt>标题（可选）：</dt>
		<dd><?php $class = 'size="60"';echo form_input('title',$selbanner->title,$class);?> </dd>
		<dt><dt>图片：(1000px*300px，会自动按照这个比例裁切)(如果不重新上传图片，默认就是不修改图片)：</dt>
		<dd><?php echo form_upload('image');?> </dd>
		<a href="uploads/<?php echo $selbanner->image;?>" target="_blank" title="点击查看大图"><img src="uploads/<?php echo $selbanner->image?>" alt="" width="100"/></a>
		<dt></dt>
		<dt>链接地址：</dt>
		<dd><?php $class = 'size="60"';echo form_input('link',$selbanner->link,$class);?> </dd>
		<dd><?php $class = 'class="submit"';echo form_submit('submit','修改',$class);?></dd>
	<?php form_close();?>
	</dl>
</div>
<script language="javascript">
function chkinput(form)
{
	if(form.link.value=="")
	{
		alert("请输入链接地址!");
		return(false);
	}
		return(true);
}
</script>
