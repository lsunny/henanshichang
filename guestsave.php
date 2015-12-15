<?php
session_start();
include 'common/db.php';
if(isset($_POST['gcheck'])){
    	if(strtolower($_POST['gcheck'])==strtolower($_SESSION['code'])){
			    if(isset($_POST['content'])){
					unset($_POST['gcheck']);
					$_POST['gtime'] = time();
					$_POST['gip'] = $_SERVER['REMOTE_ADDR'];
					save('hnsc_guestbook',$_POST);
					gomsg('index.php','留言成功');
				}else{
					goback('留言必须填写');		
				}
		}else{
				goback('验证码不正确');		
		}
}