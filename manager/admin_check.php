<?php
require_once '../db/db.php';
header('content-type:text/html; charset=gbk'); 
if(isset($_POST['user'])){
	$u = $_POST['user'];
	$sql = "select count(*) from admin where account='{$u}'";
	$result = mysql_query($sql,$conn);
	if(mysql_result($result, 0,0)<1){
		echo '<font color=green>��ϲ,���˺ſ���...</font>';
	}else{
		echo '<font color=red>������,���˺��Ѿ�����...</font>';
	}
}