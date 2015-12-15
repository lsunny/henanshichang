<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>河南仕畅市政工程有限公司 - 欢迎您!!! - 联系电话：0396-7636111</title>
<meta name="keywords" content="河南仕畅、河南工程、市政工程、驻马店市政工程、河南仕畅市政工程有限公司、河南工程、河南市政工程、hnshichang.com、联系电话：0396-7636111">
<meta name="description" content="河南仕畅、河南工程、市政工程、驻马店市政工程、河南仕畅市政工程有限公司、河南工程、河南市政工程、hnshichang.com、联系电话：0396-7636111">  
<link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
<link rel="icon" href="favicon.ico" type="image/x-icon">
<link href="css/style.css" rel="stylesheet">
<script src="js/j.js"></script>
<script src="js/ss.js"></script>
<script src="js/banner.js"></script>
</head>
<body>
<?php 
include 'nav.php';
if(isset($_GET['id'])){
	$stmt = $pdo->prepare('update hnsc_news set num=num+1 where id=?');
	$stmt->execute([$_GET['id']]);
	$stmt->closeCursor();
	
	$rows = query('hnsc_news','*','id='.$_GET['id']);
	$nv = $rows[0];
}
?>

<!-- 焦点展示图 -->
<?php include 'focus.php'?>
<!-- 焦点展示图 结束-->
<div class="container">


<div class="conleft fl mr">
    <?php include 'leftnews.php'?>

    <h1 style="height:10px"></h1>
	<?php include 'leftserver.php';?>
    
</div>  
    <div class="engineer fr">
    	<h1 class="engtit"><span class="titmore fr"><a href="./">首页</a> &gt; <a href="<?=isset($_GET['cname']) ? 'news.php?cname='.$_GET['cname'] : 'news.php'?>"><?=isset($_GET['cname']) ? $_GET['cname'] : '新闻中心'?></a> &gt; </span><?=$nv[1]?></h1>
        <div class="conrcon">
         	<h1 class="newschptit"><?=$nv[1]?></h1>
            &nbsp&nbsp; &nbsp&nbsp; &nbsp&nbsp; 来源：<?=$nv[2]?>&nbsp&nbsp; 浏览次数：<?=$nv[5]?>&nbsp&nbsp; &nbsp&nbsp; 发布时间:<?=date('Y-m-d H:i:s',$nv[6])?>
            <p class="newschpcon">
            	 <?php
		$yy = explode('_ueditor_page_break_tag_',$nv[3]);
$pc = count($yy);
if($pc==1){
    echo $nv[3];
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
echo '<br>';
$upst = $pdo->prepare('select id,title from hnsc_news where cname in (select cname from hnsc_news where id=?) and id > ? limit 1');
    $aa  = $_GET['id'];
    $upst->execute([$aa,$aa]);
	$urow = $upst->fetchAll();
    $upst->closeCursor();
    if(count($urow)>0){
        printf("上一篇：<a href='newsdetails.php?id=%d'>%s</a>",$urow[0][0],$urow[0][1]);
    }else{
        printf("上一篇：没有了");
    }
	echo '<br>';
	
	$dst = $pdo->prepare('select id,title from hnsc_news where cname in (select cname from hnsc_news where id=?) and id < ? order by id desc limit 1');
    $dst->execute([$aa,$aa]);
	$drow = $dst->fetchAll();
    echo '<br>';
    if(count($drow)>0){
        printf("下一篇：<a href='newsdetails.php?id=%d'>%s</a>",$drow[0][0],$drow[0][1]);
    }else{
        printf("下一篇：没有了");
    }
?>
			</p>        
        </div>
    </div>
    <h1 class="clear"></h1>

    
    <!-- 友情链接 -->
	<?php include 'link.php'?>
    <!-- 友情链接 结束--
    
</div>
<?php include 'footer.html'?>
</body>
</html>