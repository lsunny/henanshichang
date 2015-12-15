<?php
require_once 'islogin.php';
require_once '../common/db.php';
require_once '../common/util.php';
require_once '../common/PasswordHash.class.php';
if($_POST){
    $a = $_POST['id'];
	$query = "select pwd from admin where id=".$a;
    $result = $pdo->query($query);
	$result->execute();
    $ppp = $result->fetchAll(PDO::FETCH_NUM);
	$pwd = $ppp[0][0];

	$p1 = $_POST['pwd1'];
	$p2 = $_POST['pwd2'];
	if($p1!=$p2){
		gomsg('两次密码不一致','admin_manager.php');
		exit;
	}
	$hash = new PasswordHash(8,true);
	$pnew = $hash->HashPassword($p1);
	if($hash->CheckPassword($_POST['pwdold'],$pwd)){
	    $query = $pdo->query("update admin set pwd='$pnew' where id=".$a);
	    $query->execute();
		$t = time();
	    $ip = ip();
	    $insert = "insert into adminlog values(null,'修改密码',$id,'$t','$ip')";
	    $pdo->exec($insert);
		header('location:admin_manager.php');
	}else{
		gomsg('旧密码错误','admin_manager.php');
		exit;
	}
}
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8" />
<title>欢迎光临-河南艺术培训基地-官方网站-后台管理系统Ver1.0</title>
<link href="index.css" type="text/css" rel="stylesheet" />
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript">
<!--
$(document).ready(function(){
	function init(){
	var h = $(document).height()-50;
	$("#imiddle").css("height",h);
	$("#imiddle_left").css("height",h);
	$("#imiddle_center").css("height",h);
	$("#imiddle_right").css("height",h);

	}
	init();
	setInterval(init,1000); 
});
//-->
</script>
</head>
<body style="margin: 5px">
	<div id="itop">
		<div id="itop_left"></div>
		<div id="itop_center">
		    <span id="cleft"></span>
			<span id="ctitle">管理员管理</span>
			<span id="cright"></span>
		</div>
		<div id="itop_right"></div>
	</div>
	<div id="imiddle">
		<div id="imiddle_left"></div>
		<!-- 正文 -->
		<div id="imiddle_center">
		<form method="post">
<table bgcolor="#999999" style="margin-top:5px;" width="99%" border="0" align="center" cellpadding="2" cellspacing="1">
  <tr>
    <td align="right" bgcolor="#FbFbFb">账号(姓名)：</td>
    <td align="left" bgcolor="#FbFbFb"><?php echo $_GET['n']; ?>(<?php echo $_GET['name']; ?>)
	<input type="hidden" name="id" value="<?php echo $_GET['id']; ?>" />
	</td>
  </tr>
  <tr>
    <td width="37%" align="right" bgcolor="#FFFFFF">原密码：</td>
    <td width="63%" align="left" bgcolor="#FFFFFF"><input type="password" name="pwdold"></td>
  </tr>
  <tr>
    <td align="right" bgcolor="#FbFbFb">新密码：</td>
    <td align="left" bgcolor="#FbFbFb"><input type="password" name="pwd1"></td>
  </tr>
  <tr>
    <td align="right" bgcolor="#FFFFFF">确认新密码：</td>
    <td align="left" bgcolor="#FFFFFF"><input type="password" name="pwd2"></td>
  </tr>
  <tr>
    <td colspan="2" bgcolor="#FFFFFF">
	<span class="s_btn_wr"><input type="submit" name="mysub" value="提交" class="s_btn" onmousedown="this.className='s_btn s_btn_h'" onmouseout="this.className='s_btn'"></span>&nbsp;&nbsp;&nbsp;&nbsp;<span class="s_btn_wr"><input type="reset" value="重置" class="s_btn" onmousedown="this.className='s_btn s_btn_h'" onmouseout="this.className='s_btn'"></span>
	</td>
  </tr>
</table>

</form>
		</div>
		<div id="imiddle_right"></div>
	</div>
	<div id="ibottom">
		<div id="ibottom_left"></div>
		<div id="ibottom_center"></div>
		<div id="ibottom_right"></div>
	</div>
</body>
</html>