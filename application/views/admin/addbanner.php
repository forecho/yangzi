<div class="add">
	<h1>添加幻灯片</h1>
	<dl>
	<?php echo form_open_multipart('feadmin/banner_ok','onSubmit="return chkinput(this)"')?>
		<dt>标题（可选）：</dt>
		<dd><?php $class = 'size="60"';echo form_input('title','',$class);?> </dd>
		<dt>图片：(1000px*300px，会自动按照这个比例裁切)</dt>
		<dd><?php echo form_upload('image');?> </dd>
		<dt></dt>
		<dt>链接页面：(例如：http://www.forecho.com/)</dt>
		<dd><?php $class = 'size="60"';echo form_input('link','',$class);?> </dd>
		<dd><?php $class = 'class="submit"';echo form_submit('submit','添加',$class);?></dd>
	<?php form_close();?>
	</dl>
</div>
<script language="javascript">
function chkinput(form)
{

	if(form.image.value=="")
	{
		alert("请上传图片!");
		return(false);
	}
	if(form.link.value=="")
	{
		alert("请输入链接地址!");
		return(false);
	}
	
		return(true);
}
</script>
