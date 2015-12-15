<?php
session_start();
require '../common/common.php';
if(!isset($_SESSION["user"])){
	header('location:../');
}