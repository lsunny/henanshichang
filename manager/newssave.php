<?php
include '../common/db.php';
$_POST['ntime'] = strtotime($_POST['ntime']);
save('hnsc_news',$_POST);
header('location:newsmanager.php');