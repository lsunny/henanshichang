<?php
/**********************************************************************************
 ** 制作:玉灵 Email:webrx@126.com QQ:7031633 6774011 手机:13014577033
**------------------------------------------------------------------------------**
** 功能:瑞欣网络 实用工具函数
**********************************************************************************/

/*
 * MD5密文组合32位
 */

function ip(){
    $ip = @$_SERVER["HTTP_X_SIMPLEXI0"];
    if(!isset($ip)){
        $ip = $_SERVER['REMOTE_ADDR'];
    }
	return $ip;
}
function gets($s) {
	$s1 = md5 ( $s ); // 32
	$s2 = sha1 ( $s ); // 40
	$str = substr ( $s1, 1, 2 ) . substr ( $s2, 38 ) . substr ( $s1, 10, 4 ) . substr ( $s2, 3, 4 ) . substr ( $s1, 2, 4 ) . substr ( $s2, 2, 4 ) . substr ( $s1, 15, 4 ) . substr ( $s2, 20, 4 ) . substr ( $s1, 28 );
	return $str;
}

function init() {
	$ip = $_SERVER ['REMOTE_ADDR'];
	$sql = "select count(*) from scount where sip='{$ip}' and date(sdate)=date(now())";
}

function go($u) {
	echo '<script type=text/javascript>';
	echo "location.href='{$u}'";
	echo '</script>';
}

function gotop($u) {
	echo '<script type=text/javascript>';
	echo "top.location.href='{$u}';";
	echo '</script>';
}

function alert($msg) {
	echo "<SCRIPT>alert('$msg');</SCRIPT>\n";
}

function alerterror($msg) {
	echo "<SCRIPT>alert('$msg');history.go(-1);</SCRIPT>\n";
	exit ();
}

/*
 * 4位随机字符串,也可以指定个数
 */
function str($N = null) {
	$S = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
	if ($N == null) {
		$N = 4;
	}
	$T = '';
	for($I = 0; $I < $N; $I ++) {
		$T .= substr ( $S, rand ( 0, strlen ( $S ) - 1 ), 1 );
	}
	return $T;
}

/*
 * 36位UUID字符串
 */
function uuids($P = '') {
	$C = md5 ( uniqid ( mt_rand (), true ) );
	$U = substr ( $C, 0, 8 ) . '-' . substr ( $C, 8, 4 ) . '-' . substr ( $C, 12, 4 ) . '-' . substr ( $C, 16, 4 ) . '-' . substr ( $C, 20, 12 );
	return $P . $U;
}

/*
 * 返回日期时间格式如：2011-10-09 00:34:57
 */
function datetime() {
	date_default_timezone_set ( 'Asia/Shanghai' );
	return date ( 'Y-m-d H:i:s' );
}

/*
 * 生成缩略图
 */
function mysmall($img, $w = 300, $h = 200) {
	$s = getimagesize ( $img );
	$ext = pathinfo ( $img, PATHINFO_EXTENSION );
	$name = pathinfo ( $img, PATHINFO_FILENAME );
	$path = pathinfo ( $img, PATHINFO_DIRNAME );
	$dst = imagecreatetruecolor ( $w, $h );
	$color = imagecolorallocate ( $dst, 255, 255, 255 );
	imagefill ( $dst, 0, 0, $color );
	
	if ($s [2] == 1) {
		$src = imagecreatefromgif ( $img );
		imagecopyresized ( $dst, $src, 0, 0, 0, 0, $w, $h, $s [0], $s [1] );
		imagegif ( $dst, $path . '/' . $name . '_small.' . $ext );
	} else if ($s [2] == 2) {
		$src = imagecreatefromjpeg ( $img );
		imagecopyresized ( $dst, $src, 0, 0, 0, 0, $w, $h, $s [0], $s [1] );
		imagejpeg ( $dst, $path . '/' . $name . '_small.' . $ext );
	} else if ($s [2] == 3) {
		$src = imagecreatefrompng ( $img );
		imagecopyresized ( $dst, $src, 0, 0, 0, 0, $w, $h, $s [0], $s [1] );
		imagepng ( $dst, $path . '/' . $name . '_small.' . $ext );
	}
}

/*
 * 加水银效果
 */
function imagetext($file, $text, $font) {
	$txt = iconv ( "gbk", "utf-8", $text );
	$ext = pathinfo ( $file, PATHINFO_EXTENSION );
	$size = getimagesize ( $file );
	if ($ext == 'jpg') {
		$image = imagecreatefromjpeg ( $file );
		$color = imagecolorallocate ( $image, rand ( 0, 255 ), rand ( 0, 255 ), rand ( 0, 255 ) );
		imagettftext ( $image, 20, 0, $size [0] - 185, $size [1] - 30, $color, $font, $txt );
		imagejpeg ( $image, $file );
	} else if ($ext == 'gif') {
		$image = imagecreatefromgif ( $file );
		$color = imagecolorallocate ( $image, rand ( 0, 255 ), rand ( 0, 255 ), rand ( 0, 255 ) );
		imagettftext ( $image, 20, 0, $size [0] - 185, $size [1] - 30, $color, $font, $txt );
		imagegif ( $image, $file );
	} else {
		$image = imagecreatefrompng ( $file );
		$color = imagecolorallocate ( $image, rand ( 0, 255 ), rand ( 0, 255 ), rand ( 0, 255 ) );
		imagettftext ( $image, 20, 0, $size [0] - 185, $size [1] - 30, $color, $font, $txt );
		imagepng ( $image, $file );
	}

}

/*
 * 删除非空目录
 */
function deldir($path) {
	if (! is_dir ( $path )) {
		return;
	}
	
	$d = scandir ( $path );
	foreach ( $d as $v ) {
		$p = $path . '/' . $v;
		if (is_file ( $p )) {
			unlink ( $p );
			continue;
		}
		if (is_dir ( $p ) && $v != '.' && $v != '..') {
			deldir ( $p );
		}
	}
	rmdir ( $path );
}

/*
 * 获取IP地址相应的地址
 */
function convertip($ip) {
	$return = '';
	if (preg_match ( '/^\d{1,3}\.\d{1,3}\.\d{1,3}\.\d{1,3}$/', $ip )) {
		$iparray = explode ( '.', $ip );
		if ($iparray [0] == 10 || $iparray [0] == 127 || ($iparray [0] == 192 && $iparray [1] == 168) || ($iparray [0] == 172 && ($iparray [1] >= 16 && $iparray [1] <= 31))) {
			$return = 'LAN';
		} elseif ($iparray [0] > 255 || $iparray [1] > 255 || $iparray [2] > 255 || $iparray [3] > 255) {
			$return = 'Invalid IP Address';
		} else {
			$tinyipfile = '../admin/tinyipdata.dats';
			//$fullipfile = '../admin/include/wry.dat';
			$fullipfile = '../common/qqwry.dat';

			if (@file_exists ( $tinyipfile )) {
				$return = convertip_tiny ( $ip, $tinyipfile );
			} elseif (@file_exists ( $fullipfile )) {
				$return = convertip_full ( $ip, $fullipfile );
			}
		}
	}
	return $return;
}

function convertip_tiny($ip, $ipdatafile) {
	static $fp = NULL, $offset = array (), $index = NULL;
	$ipdot = explode ( '.', $ip );
	$ip = pack ( 'N', ip2long ( $ip ) );
	$ipdot [0] = ( int ) $ipdot [0];
	$ipdot [1] = ( int ) $ipdot [1];
	if ($fp === NULL && $fp = @fopen ( $ipdatafile, 'rb' )) {
		$offset = unpack ( 'Nlen', fread ( $fp, 4 ) );
		$index = fread ( $fp, $offset ['len'] - 4 );
	} elseif ($fp == FALSE) {
		return 'Invalid IP Data File';
	}
	$length = $offset ['len'] - 1028;
	$start = unpack ( 'Vlen', $index [$ipdot [0] * 4] . $index [$ipdot [0] * 4 + 1] . $index [$ipdot [0] * 4 + 2] . $index [$ipdot [0] * 4 + 3] );
	for($start = $start ['len'] * 8 + 1024; $start < $length; $start += 8) {
		if ($index {$start} . $index {$start + 1} . $index {$start + 2} . $index {$start + 3} >= $ip) {
			$index_offset = unpack ( 'Vlen', $index {$start + 4} . $index {$start + 5} . $index {$start + 6} . "\x0" );
			$index_length = unpack ( 'Clen', $index {$start + 7} );
			break;
		}
	}
	fseek ( $fp, $offset ['len'] + $index_offset ['len'] - 1024 );
	if ($index_length ['len']) {
		return fread ( $fp, $index_length ['len'] );
	} else {
		return 'Unknown';
	}
}

function convertip_full($ip, $ipdatafile) {
	if (! $fd = @fopen ( $ipdatafile, 'rb' )) {
		return 'Invalid IP Data File';
	}
	$ip = explode ( '.', $ip );
	$ipNum = $ip [0] * 16777216 + $ip [1] * 65536 + $ip [2] * 256 + $ip [3];
	if (! ($DataBegin = fread ( $fd, 4 )) || ! ($DataEnd = fread ( $fd, 4 )))
		return;
	@$ipbegin = implode ( '', unpack ( 'L', $DataBegin ) );
	if ($ipbegin < 0)
		$ipbegin += pow ( 2, 32 );
	@$ipend = implode ( '', unpack ( 'L', $DataEnd ) );
	if ($ipend < 0)
		$ipend += pow ( 2, 32 );
	$ipAllNum = ($ipend - $ipbegin) / 7 + 1;
	$BeginNum = $ip2num = $ip1num = 0;
	$ipAddr1 = $ipAddr2 = '';
	$EndNum = $ipAllNum;
	while ( $ip1num > $ipNum || $ip2num < $ipNum ) {
		$Middle = intval ( ($EndNum + $BeginNum) / 2 );
		fseek ( $fd, $ipbegin + 7 * $Middle );
		$ipData1 = fread ( $fd, 4 );
		if (strlen ( $ipData1 ) < 4) {
			fclose ( $fd );
			return 'System Error';
		}
		$ip1num = implode ( '', unpack ( 'L', $ipData1 ) );
		if ($ip1num < 0)
			$ip1num += pow ( 2, 32 );
		if ($ip1num > $ipNum) {
			$EndNum = $Middle;
			continue;
		}
		$DataSeek = fread ( $fd, 3 );
		if (strlen ( $DataSeek ) < 3) {
			fclose ( $fd );
			return 'System Error';
		}
		$DataSeek = implode ( '', unpack ( 'L', $DataSeek . chr ( 0 ) ) );
		fseek ( $fd, $DataSeek );
		$ipData2 = fread ( $fd, 4 );
		if (strlen ( $ipData2 ) < 4) {
			fclose ( $fd );
			return 'System Error';
		}
		$ip2num = implode ( '', unpack ( 'L', $ipData2 ) );
		if ($ip2num < 0)
			$ip2num += pow ( 2, 32 );
		if ($ip2num < $ipNum) {
			if ($Middle == $BeginNum) {
				fclose ( $fd );
				return 'Unknown';
			}
			$BeginNum = $Middle;
		}
	}
	$ipFlag = fread ( $fd, 1 );
	if ($ipFlag == chr ( 1 )) {
		$ipSeek = fread ( $fd, 3 );
		if (strlen ( $ipSeek ) < 3) {
			fclose ( $fd );
			return 'System Error';
		}
		$ipSeek = implode ( '', unpack ( 'L', $ipSeek . chr ( 0 ) ) );
		fseek ( $fd, $ipSeek );
		$ipFlag = fread ( $fd, 1 );
	}
	if ($ipFlag == chr ( 2 )) {
		$AddrSeek = fread ( $fd, 3 );
		if (strlen ( $AddrSeek ) < 3) {
			fclose ( $fd );
			return 'System Error';
		}
		$ipFlag = fread ( $fd, 1 );
		if ($ipFlag == chr ( 2 )) {
			$AddrSeek2 = fread ( $fd, 3 );
			if (strlen ( $AddrSeek2 ) < 3) {
				fclose ( $fd );
				return 'System Error';
			}
			$AddrSeek2 = implode ( '', unpack ( 'L', $AddrSeek2 . chr ( 0 ) ) );
			fseek ( $fd, $AddrSeek2 );
		} else {
			fseek ( $fd, - 1, SEEK_CUR );
		}
		while ( ($char = fread ( $fd, 1 )) != chr ( 0 ) )
			$ipAddr2 .= $char;
		$AddrSeek = implode ( '', unpack ( 'L', $AddrSeek . chr ( 0 ) ) );
		fseek ( $fd, $AddrSeek );
		while ( ($char = fread ( $fd, 1 )) != chr ( 0 ) )
			$ipAddr1 .= $char;
	} else {
		fseek ( $fd, - 1, SEEK_CUR );
		while ( ($char = fread ( $fd, 1 )) != chr ( 0 ) )
			$ipAddr1 .= $char;
		$ipFlag = fread ( $fd, 1 );
		if ($ipFlag == chr ( 2 )) {
			$AddrSeek2 = fread ( $fd, 3 );
			if (strlen ( $AddrSeek2 ) < 3) {
				fclose ( $fd );
				return 'System Error';
			}
			$AddrSeek2 = implode ( '', unpack ( 'L', $AddrSeek2 . chr ( 0 ) ) );
			fseek ( $fd, $AddrSeek2 );
		} else {
			fseek ( $fd, - 1, SEEK_CUR );
		}
		while ( ($char = fread ( $fd, 1 )) != chr ( 0 ) )
			$ipAddr2 .= $char;
	}
	fclose ( $fd );
	if (preg_match ( '/http/i', $ipAddr2 )) {
		$ipAddr2 = '';
	}
	$ipaddr = "$ipAddr1 $ipAddr2";
	$ipaddr = preg_replace ( '/CZ88\.NET/is', '', $ipaddr );
	$ipaddr = preg_replace ( '/^\s*/is', '', $ipaddr );
	$ipaddr = preg_replace ( '/\s*$/is', '', $ipaddr );
	if (preg_match ( '/http/i', $ipaddr ) || $ipaddr == '') {
		$ipaddr = 'Unknown';
	}
	return $ipaddr;
}

function getExt($filename){
    $d = strrpos($filename,'.');
    $s = substr($filename,$d);
    return $s;
}