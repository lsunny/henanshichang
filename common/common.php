<?php
define("WEBRX", "mysite");
date_default_timezone_set("PRC");
function getcount($tname,$conn){
	$sql = "select count(*) from $tname";
	$result = mysql_query($sql,$conn);
	$count = mysql_result($result, 0,0);
	return $count;
}

function getstring($length = 4){
	$str = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
	$s = '';
	for($i=0;$i<$length;$i++){
		$s.=substr($str,mt_rand(0,strlen($str)-1),1);
	}
	return $s;
}

function md55($str){
	$s1 = md5($str);
	$s2 = sha1($str);
	$sss = substr($s1,0,4).substr($s2,6,6).substr($s1,10,6).substr($s1,15,6).substr($s2,20,6).substr($s1,28,4);
	return $sss;
}