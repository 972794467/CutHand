<?php
//session_cache_limiter('private,must-revalidate');
//header('Cache-control: private,must-revalidate');
require_once('init.php');
require_once(ROOT_PATH.'/lib/imageCode.func.php');


?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>剁手网-注册</title>
<link type="text/css" rel="stylesheet" href="style/reset.css">
<link type="text/css" rel="stylesheet" href="style/main.css">
<!--[if IE 6]>
<script type="text/javascript" src="js/DD_belatedPNG_0.0.8a-min.js"></script>
<script type="text/javascript" src="js/ie6Fixpng.js"></script>
<![endif]-->
<script type="text/javascript">
					
					function checkRegInput(){
						if(!confirmPassword()){
							alert("请检查您输入的密码。");
							return false;
						}
						if(!checkEmail())
						{
							alert("请检查您输入的邮箱。");
							return false;
						}
						if(document.getElementById("t1").checked){
							return true;
						}else{
							alert("请同意剁手条款。");
							return false;
						}
						
					}
					function checkEmail(){
						//判断邮箱地址是否合法，是否已经存在
						var email =document.getElementById("email").value;
						//if(emial)
							return true;
					}					
					//判断两次密码输入是否相同
					function confirmPassword(){
						var password=document.getElementById("password1").value;
						var confirmpassword=document.getElementById("password2").value;
						if(password.length<6){
							document.getElementById("passwordlength").innerHTML="输入密码长度小于6位！";
							document.getElementById("passwordlength").style.color="red";
							return false;
						}else{
							document.getElementById("passwordlength").innerHTML="";
							if(password!=""&&confirmpassword!=""){
							if(password!=confirmpassword){
								document.getElementById("alertpassword").innerHTML="输入密码不一致！";
								document.getElementById("alertpassword").style.color="red";
								return false;
							}else{
								document.getElementById("alertpassword").innerHTML="输入密码一致。";
								document.getElementById("alertpassword").style.color="green";
							}
						}
						}
						
						
						return true;
					}
</script>
</head>

<body >
<div class="headerBar">
	<div class="logoBar red_logo">
		<div class="comWidth">
			<div class="logo fl">
				<a href="#"><img src="images/logo.jpg" alt="慕课网"></a>
			</div>
			<h3 class="welcome_title">欢迎注册</h3>
		</div>
	</div>
</div>

<div class="regBox">
	<div class="login_cont">
	<form method ="post" enctype="multiple/from-data" onsubmit="return checkRegInput()" action="doAction.php?act=reg">
		<ul class="login">
			<li><span class="reg_item"><i>*</i>邮箱地址：</span><div class="input_item">
			<input type="text" id="email" name="email" onchange="checkEmail()" class="login_input user_icon"></div></li>

			<li><span class="reg_item"><i>*</i>密码：</span>			
			<div class="input_item">			
			<input  id ="password1" type="password" onchange="confirmPassword()" maxlength="16" name="password" class="login_input user_icon">
			<span ><p id="passwordlength" ></p> </span>
			</div></li>
			
			<li><span class="reg_item"><i>*</i>重复密码：</span>
			<div class="input_item" >
			<input id="password2" type="password"  onchange="confirmPassword()" maxlength="16" class="login_input user_icon">
			<span ><p id="alertpassword" ></p> </span>
			</div>
			</li>
			
			<li><span class="reg_item"><i>*</i>验证码：</span>
			<div class="input_item"><input  name="code" type="text" class="login_input user_icon"></div></li>
			<li><span class="reg_item">&nbsp&nbsp&nbsp&nbsp&nbsp</span>
			<img src="verifyCode.php" alt="" ></img></li>
			<li class="autoLogin"><span class="reg_item">&nbsp;</span>
			<input type="checkbox" id="t1" checked="checked" class="checked" ><label onclick="showProtocol()" for="t1">我同意<a href="http://www.baidu.com">剁手条款</a></label></li>
			<li><span class="reg_item">&nbsp;</span><input type="button" value="" class="login_btn"></li>
		    
			<li><span class="reg_item">&nbsp&nbsp&nbsp&nbsp&nbsp</span><div class="reg_item">
			<button type="submit"  value="注册" class="reg_btn" style="width:80px; height:30px">注册</button></div>
			</li>
		</ul>
		</form>
	</div>
</div>

<div class="hr_25"></div>
<div class="footer">
	<p><a href="#">剁手简介</a><i>|</i><a href="#">剁手公告</a><i>|</i> <a href="#">招纳贤士</a><i>|</i><a href="#">联系我们</a><i>|</i>客服热线：400-675-1234</p>
	<p>Copyright &copy; 2006 - 2014 剁手版权所有&nbsp;&nbsp;&nbsp;京ICP备09037834号&nbsp;&nbsp;&nbsp;京ICP证B1034-8373号&nbsp;&nbsp;&nbsp;剁手市公安局菜刀分局备案编号：123456789123</p>
	<p class="web"><a href="#"><img src="images/webLogo.jpg" alt="logo"></a><a href="#"><img src="images/webLogo.jpg" alt="logo"></a><a href="#"><img src="images/webLogo.jpg" alt="logo"></a><a href="#"><img src="images/webLogo.jpg" alt="logo"></a></p>
</div>
</body>
</html>
