<?php
header('Content-Type: text/html; charset=utf-8');
include '../common/util.php';
include '../common/db.php';
session_start ();
if (isset ( $_SESSION ['user'] )) {
	$id = $_SESSION ['user'] [0];
	$t = time();
	$ip = ip();
	$insert = "insert into adminlog values(null,'退出',$id,'$t','$ip')";
	$pdo->exec($insert);
}
session_destroy ();
?>
<script type="text/javascript">
<!--
    top.location.href="../";
//-->
</script>
