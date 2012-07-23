<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<base href="<?php echo base_url();?>"/>
	<link rel="stylesheet" type="text/css" href="css/style.css" media="all" />
	<title></title>
</head>
<body>
	
<div id="main">
	<form action="feadmin/login" method="post" onSubmit="return chkinput(this)">
		<div id="head"><img src="images/head.png" alt="" /></div>
		<div id="login">
			<div id="login_img"><img src="images/login_03.png" alt="" /></div>
			<p>
				<label>帐号</label>
				<input class="text-input" type="text" name="username">
			</p>
			<p>
				<label>密码</label>
				<input class="text-input" type="password" name="password">
			</p>
			
			<p>
				<?php if(isset($error)){echo '<span>'.$error.'</span>';}?>
				<input class="button" type="submit" value="登 陆">
			</p>
		</div>	
	</form>
</div>
</body>
</html>
<script language="javascript">
function chkinput(form)
{
	if(form.username.value=="")
	{
		alert("请输入账号!");
		return(false);
	}
	if(form.password.value=="")
	{
		alert("请输入密码!");
		return(false);
	}

		return(true);
}
</script>
