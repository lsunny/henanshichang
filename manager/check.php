<?php
/**********************************************************************************
** ����:���� Email:webrx@126.com QQ:7031633 6774011 �ֻ�:13014577033
----------------------------------------------------------------------------------
** ����:ͼ����֤��
**********************************************************************************/
include_once("../common/util.php");
header('Content-type: image/gif');
session_start();
$border = 0; //�Ƿ�Ҫ�߿� 1Ҫ:0��Ҫ
$how = 4; //��֤��λ��
if(isset($_GET["num"])){$how = $_GET["num"];}
$w = $how*18; //ͼƬ���
$h = 24; //ͼƬ�߶�
$fontsize = 6; //�����С
$randcode = ""; //��֤���ַ�����ʼ��
$im = imagecreate($w, $h); //������֤ͼƬ
$bgcolor = imagecolorallocate($im, 255, 255, 255); //���ñ�����ɫ
imagefill($im, 0, 0, $bgcolor); //��䱳��ɫ
if($border){
    $black = imagecolorallocate($im, 0, 0, 0); //���ñ߿���ɫ
    imagerectangle($im, 0, 0, $w-1, $h-1, $black);//���Ʊ߿�
}
imagesetthickness($im,1.5);
for($i=0; $i<1; $i++){//�汳��������   
    $color1 = imagecolorallocate($im, mt_rand(0,255), mt_rand(0,255), mt_rand(0,255)); //��������ɫ
    imagearc($im, mt_rand(-5,$w), mt_rand(-5,$h), mt_rand(20,300), mt_rand(20,200), 55, 44, $color1); //������
}   
for($i=0; $i<$how*10; $i++){//�汳�����ŵ�   
    $color2 = imagecolorallocate($im, mt_rand(0,255), mt_rand(0,255), mt_rand(0,255)); //���ŵ���ɫ 
    imagesetpixel($im, mt_rand(0,$w), mt_rand(0,$h), $color2); //���ŵ�
}

$font = "../common/a.ttf";
for($i=0; $i<$how; $i++){   
    $code = str(1); //ȡ�ַ�
    $color3 = imagecolorallocate($im, mt_rand(0,100), mt_rand(0,100), mt_rand(0,100)); //�ַ��漴��ɫ
    //��ת����
	imagettftext($im, rand(12,18), rand(-10,10), 5+15*$i+rand(0,4), 15+rand(0,5), $color3, $font, $code);
    $randcode .= $code; //��λ������֤���ַ���
}
$_SESSION["checkstr"] = $randcode;
imagegif($im);
imagedestroy($im);
?>