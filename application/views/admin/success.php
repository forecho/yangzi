<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="refresh" content="2; url=<?php echo $_SERVER['HTTP_REFERER']?>" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>提示页面</title>
<style type="text/css">
	*{font-size:12px; color:#333}
	a{color:#FF3300; text-decoration:none}
	a:link{}
	a:visited{}
	a:hover{color:#FF8000; text-decoration:underline;}
	a:active{}
</style>
</head>

<body style="background:url(../images/bg.png);">
<div style="width:600px; height:70px; margin:auto; margin-top:10%; padding:100px 
20px;">
	<div style="display:block">
		<div style="float:left">
			<img <?php if ($succ==1) {
				echo 'src="'.base_url().'images/ok.png"';
			}else {echo 'src="'.base_url().'images/nok.png"';}?> height="80" />
		</div>
		<div style="float:left; margin:0 20px; width:400px;">
			<div style="font-size:14px;line-height:25px;">
				<?php
					switch ($succ) {
						case 0:
						echo $su0;//失败
						break;
						case 1:
						echo $su1;//成功
						break;
					}
				?>
			</div><br />
			<div style="float:left;">2秒后浏览器将会自动跳转到产品页面，没有反应点<a href="<?php echo $_SERVER['HTTP_REFERER']?>">这里</a></div>
		</div>
	</div>
</div>
</body>
</html>

