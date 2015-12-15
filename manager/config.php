<?php 
require 'islogin.php';
require '../common/db.php'; 
if(isset($_POST['mysub1'])){
	$email = trim($_POST['email']);
	$name = trim($_POST['name']);
	$address = trim($_POST['address']);
	$qq = trim($_POST['qq']);
	$tel = trim($_POST['tel']);
	$phone = trim($_POST['phone']);
	$url = trim($_POST['url']);
	$fax = trim($_POST['fax']);
	$user = trim($_POST["user"]);
    $pdo->exec("UPDATE configs SET cemail='$email',cuser='$user',cname='$name',caddress='$address',cqq='$qq',ctel='$tel',cphone='$phone',curl='$url',cfax='$fax'");
}

$result = $pdo->prepare('select * from configs');
$result->execute();
$rs = $result->fetchAll(PDO::FETCH_NUM);

if(isset($_POST['mysub2'])){
$y = date('Y');
$copy  = <<<end
<div align="center" id="copyright">
<p>Copyright@1997 - {$y} {$rs[0][1]} Inc.All rights reserved.</p>
<p>电话:{$rs[0][7]}&nbsp;&nbsp;&nbsp;&nbsp;传真:{$rs[0][10]}&nbsp;&nbsp;&nbsp;&nbsp;联系QQ:{$rs[0][6]}&nbsp;&nbsp;&nbsp;&nbsp;邮箱:{$rs[0][0]}&nbsp;&nbsp;&nbsp;&nbsp;地址:{$rs[0][5]}</p>
<p>★ 未经本站书面授权禁止复制或镜像,否则本站将依法追究其法律责任 - 技术支持:<a href="http://www.webrx.cn">瑞欣网络</a> ★</p>
</div>
end;
file_put_contents('../html/copyright.html',$copy);
}



?>
<!doctype html>
<html>
<head>
<meta charset="utf8" />
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
			<span id="ctitle">站点信息设置</span>
			<span id="cright"></span>
		</div>
		<div id="itop_right"></div>
	</div>
	<div id="imiddle">
		<div id="imiddle_left"></div>
		<!-- 正文 -->
		<div id="imiddle_center">
		<form action="#" method="post">
		

<table style="margin-top:6px;" bgcolor="#999999" width="99%" border="0" align="center" cellpadding="5" cellspacing="1">
  <tr>
    <td align="right" bgcolor="#FbFbFb">公司名称：</td>
    <td align="left" bgcolor="#FbFbFb"><input type="text" name="name" value="<?php echo $rs[0][1] ?>" size="30" /></td>
  </tr>
  <tr>
    <td width="37%" align="right" bgcolor="#FFFFFF">联系人：</td>
    <td width="63%" align="left" bgcolor="#FFFFFF"><input type="text" name="user" value="<?php echo $rs[0][2] ?>" /></td>
  </tr>
  <tr>
    <td align="right" bgcolor="#FbFbFb">电话：</td>
    <td align="left" bgcolor="#FbFbFb"><input type="text" name="tel" value="<?php echo $rs[0][7] ?>" /></td>
  </tr>
  <tr>
    <td align="right" bgcolor="#FFFFFF">移动手机：</td>
    <td align="left" bgcolor="#FFFFFF"><input type="text" name="phone" value="<?php echo $rs[0][8] ?>" /></td>
  </tr>
    <tr>
    <td align="right" bgcolor="#FbFbFb">联系QQ：</td>
    <td align="left" bgcolor="#FbFbFb"><input type="text" name="qq" value="<?php echo $rs[0][6] ?>" /></td>
  </tr>
  <tr>
    <td align="right" bgcolor="#FFFFFF">传真：</td>
    <td align="left" bgcolor="#FFFFFF"><input type="text" name="fax" value="<?php echo $rs[0][10] ?>" /></td>
  </tr>
    <tr>
    <td align="right" bgcolor="#FbFbFb">电子信箱：</td>
    <td align="left" bgcolor="#FbFbFb"><input type="text" name="email" value="<?php echo $rs[0][0] ?>" /></td>
  </tr>
  <tr>
    <td align="right" bgcolor="#FFFFFF">网址：</td>
    <td align="left" bgcolor="#FFFFFF"><input type="text" name="url" value="<?php echo $rs[0][9] ?>" size="30"  /></td>
  </tr>
   <tr>
    <td align="right" bgcolor="#FbFbFb">公司地址：</td>
    <td align="left" bgcolor="#FbFbFb"><input type="text" name="address" value="<?php echo $rs[0][5] ?>" size="60" /></td>
  </tr>
  <tr>
    <td colspan="2" bgcolor="#FFFFFF">
    <input type="submit" name="mysub1" value="修改保存" />
    <input type="submit" name="mysub2" value="生成网站下边静态版权页" />
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
