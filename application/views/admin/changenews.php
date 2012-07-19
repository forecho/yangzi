<div class="change">
	<h1>修改文章</h1>
	<dl>
	<?php echo form_open('feadmin/change_news/'.$selnews->id,'onSubmit="return chkinput(this)"')?>
		<dt>文章标题：</dt>
		<dd><?php $class = 'size="60"';echo form_input('title',$selnews->title,$class);?> </dd>
		<dt>发表时间：</dt>
		<dd><?php $class = 'id="d11" onClick="WdatePicker()" autocomplete="off"';echo form_input('addtime',$selnews->addtime,$class);?></dd>
		<dt>文章内容：</dt>
		<dd>
			<script type="text/plain" id="myEditor"><?php echo $selnews->content;?></script>
			<script type="text/javascript">
				var editor = new baidu.editor.ui.Editor();
				editor.render("myEditor");
			</script>
		</dd>
		<dt></dt>
		<dd><?php $class = 'class="submit"';echo form_submit('submit','修改',$class);?></dd>
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