<?php
include '../common/db.php';
$_POST['ntime'] = strtotime($_POST['ntime']);
update('hnsc_news',$_POST,'id='.$_POST['id']);
header('location:newsmanager.php');