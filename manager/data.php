<?php 
require 'islogin.php';
require '../common/db.php';
$r = $pdo->query("show tables");
$tables = $r->fetchAll(PDO::FETCH_NUM);
$t = '';
foreach($tables as $v){$t[] = $v[0];}
$ts = implode(',',$t);

if(isset($_GET['a'])){
    $str = $_GET['a'];
	if($str=='repair'){
        $pdo->exec("REPAIR table $ts");
		$msg = '所有表修复成功.';
	}else{
        $pdo->exec("OPTIMIZE table $ts");
		$msg =  '所有表优化成功.';
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
			<span id="ctitle">数据库修复优化，加快反应速度</span>
			<span id="cright"></span>
		</div>
		<div id="itop_right"></div>
	</div>
	<div id="imiddle">
		<div id="imiddle_left"></div>
		<!-- 正文 -->
		<div id="imiddle_center">
        <?php echo $msg; ?>
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