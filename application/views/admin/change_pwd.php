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
	if(form.company.value=="")
	{
		alert("请输入公司名称!");
		return(false);
	}
	if(form.phone.value=="")
	{
		alert("请输入电话!");
		return(false);
	}
	if(form.fax.value=="")
	{
		alert("请输入传真!");
		return(false);
	}
	if(form.email.value=="")
	{
		alert("请输入email!");
		return(false);
	}

		return(true);
}
</script>
