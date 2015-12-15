<?php
function check($len=4){
	session_start();
	header('content-type:image/png');
	$fs = ['/a.ttf','/b.ttf','/f.ttf'];
	$font = dirname(__FILE__).$fs[mt_rand(0,1)];
	$w = 35*$len;
	$h = 50;
	$i = imagecreatetruecolor($w,$h);
	$c = imagecolorallocatealpha($i,0,0,0,127);
	//imagecolortransparent($i,$c);
	//imagefill($i,0,0,$c);
	imagefilledrectangle($i,0,0,$w,$h,gc($i,'ffffff',mt_rand(0,2)));
	$sss = '';
	for($j=0;$j<$len;$j++){
		$st = gs(1);
		$sss.=$st;
	   imagettftext($i,mt_rand(15,25),mt_rand(-30,30),$j*35+10,mt_rand(28,38),gc($i),$font,$st);
	}
	$_SESSION['code'] = $sss;
	imagesetthickness($i,mt_rand(2,8));
	for($j=0;$j<mt_rand(5,10);$j++){
		imagefilledarc($i,mt_rand(0,$w),mt_rand(0,$h),mt_rand(0,$w),mt_rand(0,$h),mt_rand(0,360),mt_rand(0,360),gc($i,'rand',mt_rand(100,120)),IMG_ARC_NOFILL);	
	}
	for($j=0;$j<10;$j++){
	   imagettftext($i,mt_rand(10,15),mt_rand(-5,5),mt_rand(0,$w),mt_rand(0,$h),gc($i,'rand',mt_rand(100,120)),$font,gs(1));
	}
	imagepng($i);
	imagedestroy($i);	
}

function gs($n=4){
    $s = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';	
	$t = '';
	for($i=0;$i<$n;$i++){
		$t.=substr($s,mt_rand(0,strlen($s)-1),1);
	}
	return $t;
}

/**
 *  生成缩略
 */
function thumb($i,$f=false,$w=220,$h=0,$fn='s_'){
	$ii = getimagesize($i);
	if($ii[2]==2){
		if($ii[0]>$w){
		    $src = imagecreatefromjpeg($i);
			$sw = $ii[0];
			$sh = $ii[1];

			$h = $h==0 ? $w/$sw*$sh : $h;
			//建立新的缩略图
			$dst = imagecreatetruecolor($w,$h);
			imagecopyresampled($dst,$src,0,0,0,0,$w,$h,$sw,$sh);
			if($f){
				imagejpeg($dst,$i);
			}else{
				$path = dirname($i).'/';
				$name = $fn.substr($i,strrpos($i,'/')+1);
				imagejpeg($dst,$path.$name);			
			}
			imagedestroy($dst);
			imagedestroy($src);
		}
	}
}

/**
 * 功能：生成水银图标，水银图标文件在inc目录中 名称 logo.png
 */
function logo($i,$p=5,$f=true,$fn='logo_'){
	$ii = getimagesize($i);
	if($ii[2]==2){
		if($ii[0]>300){
		    $ni = imagecreatefromjpeg($i);
			$w = $ii[0];
			$h = $ii[1];
			
			//水银图标 logo.png 格式
			$logo = dirname(__FILE__).'/logo.png';
			$li = imagecreatefrompng($logo);
			$liw = imagesx($li);
			$lih = imagesy($li);
			
			$x = ($w-$liw)/2;
			$y = ($h-$lih)/2;
			
			$pad = 35;
			switch($p){
			    case 1:
					$x = 0+$pad;
					$y = 0+$pad;
				break;
				
				case 2:
					$y = 0+$pad;				
				break;
				
				case 3:
					$x = $w-$liw-$pad;
					$y = 0+$pad;
				break;
				
				case 4:
					$x = 0+$pad;
				break;
				
				case 6:
					$x = $w-$liw-$pad;
				break;
				
				case 7:
					$x = 0+$pad;
					$y = $h-$lih-$pad;
				break;
				
				case 8:
					$y = $h-$lih-$pad;
				break;
				
				case 9:
					$x = $w-$liw-$pad;
					$y = $h-$lih-$pad;
				break;	
			}
			imagecopy($ni,$li,$x,$y,0,0,$liw,$lih);
			if($f){
				imagejpeg($ni,$i);
			}else{
				$path = dirname($i).'/';
				$name = $fn.substr($i,strrpos($i,'/')+1);
				imagejpeg($ni,$path.$name);			
			}
			imagedestroy($ni);
			imagedestroy($li);
		}
	}
}

function txt($i,$s=30,$t='版权所有',$c='rand',$a=0,$p=5,$f=true,$fn='t_'){
	$font = dirname(__FILE__).'/f.ttf';
	$ii = getimagesize($i);
	if($ii[2]==2){
		if($ii[0]>300){
		    $ni = imagecreatefromjpeg($i);
			$pos = imagettfbbox($s,0,$font,$t);
			$pad = 30;
			switch($p){
				case 1://左上角
					$x = 0-$pos[0]+$pad;
					$y = 0-$pos[7]+$pad;
				break;
				
				case 2://上边 水平中央
					$x = ($ii[0]-$pos[2])/2;
					$y = 0-$pos[7]+$pad;
				break;
				
				case 3:
					$x = $ii[0]-$pos[2]-$pad;
					$y = 0-$pos[7]+$pad;
				break;
				
				case 4:
					$x = 0-$pos[0]+$pad;
					$y = ($ii[1]-$pos[6])/2;
				break;
				
				case 5:
					$x = ($ii[0]-$pos[2])/2;
					$y = ($ii[1]-$pos[6])/2;
				break;
				
				case 6:
					$x = $ii[0]-$pos[2]-$pad;
					$y = ($ii[1]-$pos[6])/2;
				break;
				
				case 7:
					$x = 0-$pos[0]+$pad;
					$y = $ii[1]-$pos[6]-$pad;
				break;
				
				case 8:
					$x = ($ii[0]-$pos[2])/2;
					$y = $ii[1]-$pos[6]-$pad;
				break;
				
				case 9:
				 	$x = $ii[0]-$pos[2]-$pad;
					$y = $ii[1]-$pos[6]-$pad;
				break;
			}
			imagettftext($ni,$s,0,$x,$y,gc($ni,$c,$a),$font,$t);

			if($f){
				imagejpeg($ni,$i);
			}else{
				$path = dirname($i).'/';
				$name = $fn.substr($i,strrpos($i,'/')+1);
				imagejpeg($ni,$path.$name);			
			}
			imagedestroy($ni);
		}
	}
}

function gc($i,$c='rand',$a=0){
	$color = '';
	switch($c){
	    case 'white':
			$color = imagecolorallocatealpha($i,255,255,255,$a);
		break;
	    case 'black':
			$color = imagecolorallocatealpha($i,0,0,0,$a);
		break;
		case 'red':
			$color = imagecolorallocatealpha($i,255,0,0,$a);
		break;
		case 'green':
			$color = imagecolorallocatealpha($i,0,255,0,$a);
		break;
		case 'rand':
			$color = imagecolorallocatealpha($i,mt_rand(0,255),mt_rand(0,255),mt_rand(0,255),$a);
		break;
		default:
		    $cc = str_split($c,2);
			$color = imagecolorallocatealpha($i,hexdec($cc[0]),hexdec($cc[1]),hexdec($cc[2]),$a);
		break;
	}
	return $color;
}