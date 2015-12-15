<?php
ini_set('max_execution_time',0);
ini_set('upload_max_filesize','1024M');
ini_set('post_max_size','1024M');
ini_set('date.timezone','PRC');
if($_FILES['img']['error']==0){
	include '../common/f.php';
	include '../common/db.php';
	include '../common/i.php';
	$f = upload('../upload/project/',1);
	$_POST['ntime'] = strtotime($_POST['ntime']);
	$_POST['img'] = $f[0];
	save('hnsc_project',$_POST);
	thumb('../upload/project/'.$f[0],false,201,142,'s_');
	logo('../upload/project/'.$f[0]);
	header('location:projectadd.php');
}else{
    echo '请正确选择工程图片,添加失败';
	exit;	
}