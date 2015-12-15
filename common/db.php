<?php
$host = 'localhost';
$port = 3306;
$user = 'root';
$pass = '';
$char = 'utf8';
$dbname = 'hnshichangdb';

$dsn = "mysql:host=$host;port=$port;dbname=$dbname";
$opt = array(PDO::MYSQL_ATTR_INIT_COMMAND => "set names $char");
$pdo = '';
try {
	$pdo = new pdo($dsn,$user,$pass,$opt);
} catch ( Exception $e ) {
	exit('数据库链接失败');
}

function gomsg($url='',$msg=''){
    	echo '<script>';
		echo "alert('$msg');";
		echo "location.href='$url'";
		echo '</script>';
}

function goback($msg=''){
    	echo '<script>';
		echo "alert('$msg');";
		echo "history.go(-1);";
		echo '</script>';
}

function mymd5($p,$c='webrx'){
    $s1 = md5($p.$c);
	$s2 = sha1($p.$c);
	$sok = substr($s1,0,6).substr($s2,0,6);
	$sok .= substr($s1,12,5).substr($s2,22,5);
	$sok .= substr($s1,22,5).substr($s2,32,5);
	return $sok;
}

function update($tn,$data=array(),$w='1=1'){
    global $pdo;
	foreach($data as $k=>$v){
	    $kk[] = $k.'=:'.$k;
	}
	$key = implode(',',$kk);
	$stmt = $pdo->prepare("update $tn set  $key where $w");
    $stmt->execute($data);
	$stmt->closeCursor();
}

function save($tn,$data=array()){
    global $pdo;
	foreach ( $data as $k => $v ) {
		$key [] = $k;
		$kk [] = ':' . $k;
	}
	$k1 = implode ( ',', $key );
	$k2 = implode ( ',', $kk );
	$stmt = $pdo->prepare ( "insert into $tn($k1) values($k2)" );
	$stmt->execute ( $data );
	$stmt->closeCursor();
}

function query($tn,$f='*',$w='1=1',$o='',$l=''){
    global $pdo;
	$sql = "select $f from $tn where $w $o $l";
	$stmt = $pdo->prepare($sql);
	$stmt->execute();
	return $stmt->fetchAll(3);
}

function delete($tn,$w=null){
    global $pdo;
	if(is_array($w)){
		foreach ( $w as $k => $v ) {
			$key [] = $k.'=:'.$k;
		}
		$ww = implode ( ' and ', $key );
		$stmt = $pdo->prepare ( "delete from $tn where $ww" );
		$stmt->execute ($w);
	}else if(empty($w)){
		$stmt = $pdo->prepare ( "truncate table $tn" );
		$stmt->execute ();
	}else{
		$stmt = $pdo->prepare ( "delete from $tn where $w" );
		$stmt->execute ();
	}
}

function pager($tn,$currpage=1,$f='*',$pagesize=3,$w='1=1',$o='',$ty=''){
	global $pdo;
	$stmt = $pdo->prepare("select count(*) from $tn where $w");
	$stmt->execute();
	$recordcount = $stmt->fetchColumn(0);
	$stmt->closeCursor();
	
	$pagecount = ceil($recordcount/$pagesize);
	
	$currpage = $currpage<=0 ? 1 : $currpage;
	$currpage = $currpage>=$pagecount ? $pagecount : $currpage;
		
	$start = $currpage*$pagesize - $pagesize;
	$stmt = $pdo->prepare("select $f from $tn where $w $o limit $start,$pagesize");
	$stmt->execute();
	$row[] = $stmt->fetchAll(3);
	$stmt->closeCursor();

	$first = 1;
	$end = 10;
	$pages = '<div class="page">';
	if($currpage>=7){
    	$first = $currpage-5;
		$end = $first+$end-1;
	}
	if($currpage>1){
		$prev = $currpage-1;
		if($first>1){
			$pages.="<a href=?".$ty."p=1>首页</a><a href=?".$ty."p=$prev>上一页</a>";
		}else{
			$pages.="<a href=?".$ty."p=$prev>上一页</a>";			
		}
	}
	for($i=$first;$i<=$end;$i++){
		if($i>$pagecount){
	    	break;	
		}
		if($i==$currpage){
	    	$pages.='<a class="checked">'.$i.'</a>';
			continue;	
		}
        $pages.="<a href=?".$ty."p=$i>$i</a>";
	}
	if($currpage<$pagecount){
		$next = $currpage+1;
		$pages.="<a href=?".$ty."p=$next>下一页</a>";		
	}
	if($end<$pagecount){
		$pages.="<a href=?".$ty."p=$pagecount>尾页</a>";
	}
	$row[] = $pages.'</div>';
	$row[] = $pagesize;
	$row[] = $pagecount;
	$row[] = $recordcount;
	$row[] = $currpage;
	return $row;
}

function css1(){
    $css = <<<css
	<style>
	.page{font-size:12px;height:30px;padding:15px 0;clear:both;overflow:hidden;text-align:center;}
	.page a{text-decoration:none;line-height:25px;padding:0px 10px;display:inline-block;margin-right:5px;border:solid 1px #c8c7c7;}
	.page a:hover,.page a.checked{text-decoration:none;border:solid 1px #0086d6;background:#0091e3;color:#fff;}
	.page a:visited,.page a:link{color:#333;}
	.page a:active{color:#3B3B3B;}
	</style>
css;
    echo $css;		
}