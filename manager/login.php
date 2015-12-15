<?php
session_start ();
if ($_POST) {
	include '../common/common.php';
	include '../common/db.php';
	include '../common/util.php';
	include '../common/PasswordHash.class.php';
	if (isset ( $_POST ['check'] ) && $_POST ['check'] != '') {
		$c = strtolower ( $_POST ['check'] );
		$sc = strtolower ( $_SESSION ['checkstr'] );
		if ($c != $sc) {
			gomsg ( '验证码错误!!!', 'login.php' );
		}
		$n = $_POST ['uname'];
		$p = $_POST ['pwd'];
		$query = "SELECT * FROM admin WHERE LOWER(account) = LOWER('$n')";
		$row = $pdo->query($query);
		$row->execute();
		$pwd = $row->fetchALL(PDO::FETCH_NUM);
		$hash = new PasswordHash(8,true);

		if(count($pwd)==0){
		    gomsg ( '登录失败!!!', 'login.php' );
		}else if($hash->CheckPassword($p,$pwd[0][3])){
			$ip = ip();
			$t = time();
			$id = $pwd[0][0];
            $log = $pdo->query("SELECT * FROM adminlog WHERE aid = $id ORDER BY id DESC LIMIT 0,1");
			$log->execute();
			$row = $log->fetchALL(PDO::FETCH_NUM);
			
			$user  = array($pwd[0][0],$pwd[0][2],$row[0][3],$row[0][4]);

			$_SESSION['user']=$user;
			$insert = "insert into adminlog values(null,'登录',$id,'$t','$ip')";
			$pdo->exec($insert);
		    go ( 'main.php' );
		}else{
		    gomsg ( '登录失败!!!', 'login.php' );
		}
	}
}
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>后台管理系统Ver1.0</title>
<link href="index.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript">
<!--
$(document).ready(function(){
    function init(){
        var dw = ($(document).width() -$("#login_div").width()) /2;
		var dh = ($(document).height()- $("#login_div").height())/2;
		$("#login_div").css({"top":dh,"left":dw});
	}
	init();
	$(window).resize(function(){init();}); 
});
//-->
</script>
</head>
<body style="background-color: #FFF;">
	<form method="post">
		<div id="login_div">
			<div id="login_logo"></div>
			<div id="login_main">
				<p>
					用户名：<input type="text" maxlength="25" autofocus id="uname" name="uname" />
				</p>
				<p>
					&nbsp;&nbsp;密码：<input type="password" maxlength="25" id="pwd" name="pwd"/>
				</p>
				<p>
					验证码：<input type="text" maxlength="10" id="check" name="check" /><img src="check.php?num=4" onclick="this.src='check.php?num=4&'+Math.random()" align="middle" style="cursor: pointer; border: 1px solid; border-color: #e3f0fc #e3f0fc #e3f0fc #e3f0fc" />
				</p>
				<p>
					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <input name="submit" type="image" src="images/login.gif" /> <img src="images/exit.gif" style="cursor: pointer" onclick="location.href='../index.php'" />
				</p>
			</div>
		</div>
	</form>
</body>
</html>


