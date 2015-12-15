<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>河南仕畅市政工程有限公司、市政工程、河南工程</title>
<meta name="keywords" content="河南工程、市政工程、河南仕畅市政工程有限公司网站、河南市政工程、hnshichang.com">
<meta name="description" content="河南工程、市政工程、河南仕畅市政工程有限公司网站、河南市政工程、hnshichang.com">
<link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
<link href="css/style.css" rel="stylesheet">
<script src="js/j.js"></script>
</head>

<body>
<?php 
include 'nav.php';
if(isset($_GET['id'])){
	$stmt = $pdo->prepare('update hnsc_project set num=num+1 where id=?');
	$stmt->execute([$_GET['id']]);
	$stmt->closeCursor();
	$rows = query('hnsc_project','*','id='.$_GET['id']);
	$v = $rows[0];
}

?>

<div class="container">
	<div class="conleft fl mr">
    <?php include 'leftnews.php';?>
    <h1 style="height:10px"></h1>
    <div class="culture">
    	<h1 class="cultit">服务中心<span class="eng">Service</span></h1>
        <div class="sercon">
        	<p class="serlist"><span class="clbold">地址：</span>泌阳县产业集聚区（工业西路）</p>
            <p class="serlist"><span class="clbold">电话：</span>0396-7636111</p>
            <p class="serlist"><span class="clbold">网址：</span>www.hnshichang.com</p>
            <p class="serlist"><span class="clbold">邮箱：</span>shichangshizheng@126.com</p>
            <p class="chmes"><a href="#"></a></p>
        </div>
    </div>
    
</div>  
    
    <div class="engineer fr">
    	<h1 class="engtit"><span class="titmore fr"><a href="./">首页</a> &gt; <a href="<?=isset($_GET['cname']) ? 'news.php?cname='.$_GET['cname'] : 'news.php'?>"><?=isset($_GET['cname']) ? $_GET['cname'] : '新闻中心'?></a> &gt; </span><?=$v[1]?></h1>
        <div class="conrcon">
        <h3><?=$v[1]?></h3>
        浏览次数：<?=$v[4]?>发布时间:<?=date('Y-m-d H:i:s',$v[5])?><br>
        <p>
       	 <?php
		$yy = explode('_ueditor_page_break_tag_',$v[3]);
$pc = count($yy);
if($pc==1){
    echo $v[3];
}else{
	$cp = isset($_GET['cp']) ? $_GET['cp'] : 1;
	$cp = $cp<1 ? 1 : $cp;
	$cp = $cp>$pc ? $pc : $cp;
	echo $yy[$cp-1],'<hr>';
	echo '<div class=page>';
	if($cp>1){
		printf("<a href='?id=%d&cp=%d'>上一页</a>",$_GET['id'],$cp-1);
	}
	for($ii=1;$ii<=$pc;$ii++){
		if($ii==$cp){
	    	printf("<span>%d</span>&nbsp;&nbsp;",$ii);	
		}else{
	    	printf("<a href='?id=%d&cp=%d'>%d</a>&nbsp;&nbsp;",$_GET['id'],$ii,$ii);	
		}
	}
	if($cp<$pc){
		printf("<a href='?id=%d&cp=%d'>下一页</a>",$_GET['id'],$cp+1);
	}
	echo '</div>';
}
?>
        </p>
        </div>
    </div>
    <h1 class="clear"></h1>

	<?php include 'link.php';?>  
</div>
<?php include 'footer.html';?>
</body>
</html>