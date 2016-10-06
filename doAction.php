<?php
require_once('init.php');
require_once(ROOT_PATH.'lib/mysqli.func.php');
$act=$_REQUEST['act'];
if($act=='reg'){	
	//注册 以后使用ajax判断邮箱是否重复
	
	$email=$_POST['email'];
	$email=addslashes($email);
	$password=$_POST['password'];
	$code=$_POST['code'];
	if($code===$_SESSION['regCode']){
		$dbLink=connectMysqli();
		$sql='insert into users(email,password,regTime) values("'.$email.'","'.$password.'",'.time().');';
		if(!$dbLink->query($sql)){
			echo $dbLink->error;
		}		
		$dbLink->close();
	}else{
		//返回注册界面，提示验证码错误。
		$url='register.php';
		echo "<script language='javascript' type='text/javascript'> ";
		//echo "alert('验证码错误');window.location.href='$url'";  跳转，刷新验证码，无法保留数据。
		
		echo 'window.onload=function(){alert("验证码错误！");history.go(-1);}; ';//无法刷新验证码
		echo '</script>';
		
		//header("Location:register.php");
	}
}
if($act=='login'){
	$email=$_POST['email'];
	$email=addslashes($email);
	$password=$_POST['password'];
	//$password=mysql_real_escape_string($password);
	$dbLink=connectMysqli();
	$sql='select * from users where email="'.$email.'";';
	$result=$dbLink->query($sql);			
	$row=$result->fetch_assoc();
	if($row==null){		
		$url='login.php';
		echo "<script language='javascript' type='text/javascript'> ";
		echo "alert('无此用户！');window.location.href='$url'";  //跳转，刷新验证码，无法保留数据。		
		echo '</script>';
		return;
	}	
	if($row['password']===$password){
		//登陆成功
		echo "success";
		
	}else{
		echo "<script language='javascript' type='text/javascript'> ";		
		echo 'window.onload=function(){alert("密码错误");history.go(-1);}; ';//无法刷新验证码
		echo '</script>';
	}
	$result->free();
			
	$dbLink->close();
	
}
