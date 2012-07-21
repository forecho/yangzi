<div class="change">
	<h1>修改产品</h1>
	<dl>
	<?php echo form_open_multipart('feadmin/change_product/'.$selproduct->id,'onSubmit="return chkinput(this)"')?>
		<dt>产品备注：</dt>
		<dd><?php $class = 'size="60"';echo form_input('title',$selproduct->title,$class);?> </dd>
		<dt>产品图片(如果不重新上传图片，默认就是不修改图片)：</dt>
		<dd><?php echo form_upload('image');?> </dd>
		<a href="uploads/img/<?php echo $selproduct->image;?>" target="_blank" title="点击查看大图"><img src="uploads/img/<?php echo $selproduct->image?>" alt="" width="100"/></a>
		<dt></dt>
		<dt>发布时间：（按最新时间排序）</dt>
		<dd><?php $class = 'id="d11" onClick="WdatePicker()" autocomplete="off"';echo form_input('addtime',$selproduct->addtime,$class);?></dd>
		<dd><?php $class = 'class="submit"';echo form_submit('submit','修改',$class);?></dd>
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
		return(true);
}
</script>
