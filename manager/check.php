<?php
/**********************************************************************************
** 制作:玉灵 Email:webrx@126.com QQ:7031633 6774011 手机:13014577033
----------------------------------------------------------------------------------
** 功能:图形验证码
**********************************************************************************/
include_once("../common/util.php");
header('Content-type: image/gif');
session_start();
$border = 0; //是否要边框 1要:0不要
$how = 4; //验证码位数
if(isset($_GET["num"])){$how = $_GET["num"];}
$w = $how*18; //图片宽度
$h = 24; //图片高度
$fontsize = 6; //字体大小
$randcode = ""; //验证码字符串初始化
$im = imagecreate($w, $h); //创建验证图片
$bgcolor = imagecolorallocate($im, 255, 255, 255); //设置背景颜色
imagefill($im, 0, 0, $bgcolor); //填充背景色
if($border){
    $black = imagecolorallocate($im, 0, 0, 0); //设置边框颜色
    imagerectangle($im, 0, 0, $w-1, $h-1, $black);//绘制边框
}
imagesetthickness($im,1.5);
for($i=0; $i<1; $i++){//绘背景干扰线   
    $color1 = imagecolorallocate($im, mt_rand(0,255), mt_rand(0,255), mt_rand(0,255)); //干扰线颜色
    imagearc($im, mt_rand(-5,$w), mt_rand(-5,$h), mt_rand(20,300), mt_rand(20,200), 55, 44, $color1); //干扰线
}   
for($i=0; $i<$how*10; $i++){//绘背景干扰点   
    $color2 = imagecolorallocate($im, mt_rand(0,255), mt_rand(0,255), mt_rand(0,255)); //干扰点颜色 
    imagesetpixel($im, mt_rand(0,$w), mt_rand(0,$h), $color2); //干扰点
}

$font = "../common/a.ttf";
for($i=0; $i<$how; $i++){   
    $code = str(1); //取字符
    $color3 = imagecolorallocate($im, mt_rand(0,100), mt_rand(0,100), mt_rand(0,100)); //字符随即颜色
    //旋转文字
	imagettftext($im, rand(12,18), rand(-10,10), 5+15*$i+rand(0,4), 15+rand(0,5), $color3, $font, $code);
    $randcode .= $code; //逐位加入验证码字符串
}
$_SESSION["checkstr"] = $randcode;
imagegif($im);
imagedestroy($im);
?>