<?php
require_once('init.php');
require_once(ROOT_PATH.'/lib/imageCode.func.php');
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>剁手网-登陆</title>
<link type="text/css" rel="stylesheet" href="style/reset.css">
<link type="text/css" rel="stylesheet" href="style/main.css">
<!--[if IE 6]>
<script type="text/javascript" src="js/DD_belatedPNG_0.0.8a-min.js"></script>
<script type="text/javascript" src="js/ie6Fixpng.js"></script>
<![endif]-->
</head>

<body>
<div class="headerBar">
	<div class="logoBar login_logo">
		<div class="comWidth">
			<div class="logo fl">
				<a href="#"><img src="images/logo.jpg" alt="剁手网"></a>
			</div>
			<h3 class="welcome_title">欢迎登陆</h3>
		</div>
	</div>
</div>

<div class="loginBox">
	<div class="login_cont">
	<form method="post" action="doAction.php?act=login" >
		<ul class="login">
			<li class="l_tit" style="font-size:20px">&nbsp;</li>
			<li class="l_tit" style="font-size:20px">&nbsp;</li>
			<li class="l_tit" style="font-size:20px">邮箱:</li>
			<li class="mb_10"><input type="text"  name="email" placeholder="请输入邮箱地址" class="login_input user_icon"></li>
			<li class="l_tit" style="font-size:20px">&nbsp;</li>
			<li class="l_tit" style="font-size:20px">密码:</li>
			<li class="mb_10"><input type="password" name="password" maxlength="16" class="login_input user_icon"></li>
			<li class="autoLogin"><input type="checkbox" id="a1" class="checked"><label for="a1">自动登陆</label></li>
			<li><button type="submit"  value="登陆" class="reg_btn" style="width:80px; height:30px">登陆</button></li>
		</ul>
		</form>
		<div class="login_partners">
			<p class="l_tit">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;使用合作方账号登陆网站</p>
			<ul class="login_list clearfix">
				<li><a href="#">&nbsp;QQ</a></li>
				<li><span>&nbsp;|</span></li>
				<li><a href="#">&nbsp;网易</a></li>
				<li><span>&nbsp;|</span></li>
				<li><a href="#">&nbsp;新浪微博</a></li>
				<li><span>&nbsp;|</span></li>
				<li><a href="#">&nbsp;腾讯微博</a></li>

			</ul>
		</div>
	</div>
	<a class="reg_link" href="#"></a>
</div>

<div class="hr_25"></div>
<div class="footer">
	<p><a href="#">剁手简介</a><i>|</i><a href="#">剁手公告</a><i>|</i> <a href="#">招纳贤士</a><i>|</i><a href="#">联系我们</a><i>|</i>客服热线：400-675-1234</p>
	<p>Copyright &copy; 2006 - 2014 剁手版权所有&nbsp;&nbsp;&nbsp;京ICP备09037834号&nbsp;&nbsp;&nbsp;京ICP证B1034-8373号&nbsp;&nbsp;&nbsp;剁手市公安局菜刀分局备案编号：123456789123</p>
	<p class="web"><a href="#"><img src="images/webLogo.jpg" alt="logo"></a><a href="#"><img src="images/webLogo.jpg" alt="logo"></a><a href="#"><img src="images/webLogo.jpg" alt="logo"></a><a href="#"><img src="images/webLogo.jpg" alt="logo"></a></p>
</div>
</body>
</html>
