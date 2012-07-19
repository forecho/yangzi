<div class="add">
	<h1>修改公司信息</h1>
	<dl>
	<?php echo form_open('feadmin/change_company/1','onSubmit="return chkinput(this)"')?>
		<dt>公司名称：</dt>
		<dd><?php $class = 'size="60"';echo form_input('company',$selcompany->company,$class);?> </dd>
		<dt>电话：</dt>
		<dd><?php echo form_input('phone',$selcompany->phone);?> </dd>
		<dt>传真：</dt>
		<dd><?php echo form_input('fax',$selcompany->fax);?> </dd>
		<dt>email：</dt>
		<dd><?php echo form_input('email',$selcompany->email);?> </dd>
		
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
