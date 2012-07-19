<div class="change">
	<h1>修改
	<?php 
		switch($this->uri->segment(3))
		{
		case 'zzjg':
			echo $classify = '组织机构';
			break;
		case 'dszzx':
			echo $classify = '董事长致信';
			break;
		case 'rszp':
			echo $classify = '人事招聘';
			break;
		case 'gsjs':
			echo $classify = '公司简介';
			break;
		case 'qywh':
			echo $classify = '企业文化';
			break;
		}
	?>
	</h1>
	<dl>
	<?php echo form_open('feadmin/change_other/'.$classify,'onSubmit="return chkinput(this)"')?>
		<dd>
			<script type="text/plain" id="myEditor"><?php echo $selother->content;?></script>
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
	var content=editor.hasContents()
		if(!content)
	{
		alert("你的输入为空");
		return(false);
	}
		return(true);
}
</script>