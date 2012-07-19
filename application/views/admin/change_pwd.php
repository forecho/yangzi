<div class="add">
	<h1>修改密码</h1>
	<dl>
	<?php echo form_open('feadmin/change_pwd_ok/1','onSubmit="return chkinput(this)"')?>
		<dt>原密码：</dt>
		<dd><?php echo form_password('pwd');?> </dd>
		<dt>新密码：</dt>
		<dd><?php echo form_password('pwd0');?> </dd>
		<dt>确认新密码：</dt>
		<dd><?php echo form_password('pwd1');?> </dd>
		
		<dd><?php $class = 'class="submit"';echo form_submit('submit','修改',$class);?></dd>
	<?php form_close();?>
	</dl>
</div>
<script language="javascript">
function chkinput(form)
{
	if(form.pwd.value=="")
	{
		alert("请输入原密码!");
		return(false);
	}
	if(form.pwd0.value=="")
	{
		alert("请输入新密码!");
		return(false);
	}
	if(form.pwd1.value!=form.pwd0.value)
	{
		alert("两次输入的密码不一致，请重新再输入!");
		return(false);
	}
		return(true);
}
</script>
