<div class="add">
	<h1>添加产品</h1>
	<dl>
	<?php echo form_open_multipart('feadmin/product_ok/addhonor','onSubmit="return chkinput(this)"')?>
		<dt>产品备注：</dt>
		<dd><?php $class = 'size="60"';echo form_input('title','',$class);?> </dd>
		<dt>产品图片：</dt>
		<dd><?php echo form_upload('image');?> </dd>
		<dt></dt>
		<dt>发布时间：（按最新时间排序）</dt>
		<dd><?php $class = 'id="d11" onClick="WdatePicker()" autocomplete="off"';echo form_input('addtime',date("Y-m-d"),$class);?></dd>
		<dd><?php $class = 'class="submit"';echo form_submit('submit','添加',$class);?></dd>
	<?php form_close();?>
	</dl>
</div>
<script language="javascript">
function chkinput(form)
{
	if(form.title.value=="")
	{
		alert("请输入产品备注!");
		return(false);
	}

	if(form.image.value=="")
	{
		alert("请上传图片!");
		return(false);
	}
		return(true);
}
</script>
