<div class="add">
	<h1>添加文章</h1>
	<dl>
	<?php echo form_open('feadmin/news_ok','onSubmit="return chkinput(this)"')?>
		<dt>文章标题：</dt>
		<dd><?php $class = 'size="60"';echo form_input('title','',$class);?> </dd>
		<dt>发表时间：</dt>
		<dd><?php $class = 'id="d11" onClick="WdatePicker()" autocomplete="off"';echo form_input('addtime',date("Y-m-d"),$class);?></dd>
		<dt>文章内容：</dt>
		<dd>
			<script type="text/plain" id="myEditor"></script>
			<script type="text/javascript">
				var editor = new baidu.editor.ui.Editor();
				editor.render("myEditor");
			</script>
		</dd>
		<dt></dt>
		<dd><?php $class = 'class="submit"';echo form_submit('submit','添加',$class);?></dd>
	<?php form_close();?>
	</dl>
</div>
<script language="javascript">
function chkinput(form)
{
	if(form.title.value=="")
	{
		alert("请输入新闻标题!");
		return(false);
	}

	var content=editor.hasContents()
		if(!content)
	{
		alert("你的输入为空");
		return(false);
	}
		return(true);
}
</script>
