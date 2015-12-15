<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>企业资质与荣誉 - 河南仕畅市政工程有限公司 - 欢迎您!!! - 联系电话：0396-7636111</title>
<meta name="keywords" content="河南仕畅、河南工程、市政工程、驻马店市政工程、河南仕畅市政工程有限公司、河南工程、河南市政工程、hnshichang.com、联系电话：0396-7636111">
<meta name="description" content="河南仕畅、河南工程、市政工程、驻马店市政工程、河南仕畅市政工程有限公司、河南工程、河南市政工程、hnshichang.com、联系电话：0396-7636111">  
<link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
<link rel="icon" href="favicon.ico" type="image/x-icon">
<link href="css/style.css" rel="stylesheet">
<script src="js/j.js"></script>
<script src="js/ss.js"></script>
<link rel="stylesheet" href="js/fancybox/jquery.fancybox.css">
<script src="js/fancybox/jquery.fancybox.pack.js"></script>
<script src="js/banner.js"></script>
</head>

<body>
<?php include 'nav.php'?>

<!-- 焦点展示图 -->
<?php include 'focus.php'?>
<!-- 焦点展示图 结束-->
<div class="container">
        <div class="conleft fl mr">
            	<div class="culture">
    	<h1 class="cultit">资质荣誉<span class="eng">Aptitude</span></h1>
        <div class="culcon">
        	<ul>
                <?php
				$rs = query('hnsc_zzclass');
				foreach($rs as $v){
				?>
            	<li><a href="zzry.php?cname=<?=$v[0]?>"><?=$v[0]?></a></li>
                <?php } ?>
            </ul>
        </div>
    </div>
            <h1 style="height:10px"></h1>
            <?php include 'leftserver.php';?>
        </div>  
    
        <div class="engineer fr">
    	<h1 class="engtit"><span class="titmore fr"><a href="./">首页</a> &gt; <?=isset($_GET['cname'])?$_GET['cname']:'资质荣誉'?></span><?=isset($_GET['cname'])?$_GET['cname']:'资质荣誉'?></h1>
        <div class="zz">
        	<ul>
                <?php
					  $currpage = isset($_GET['p']) ? $_GET['p'] : 1;
					  if(isset($_GET['cname'])){
						  $cn = $_GET['cname'];
					  	$row = pager('hnsc_zz',$currpage,'*',12,"flag='y' and cname='$cn'",'order by id desc',"cname=$cn&");
					  }else{
					  	$row = pager('hnsc_zz',$currpage,'*',12,"flag='y'",'order by id desc');
					  }
					  foreach($row[0] as $v){
				 ?>
                  	<li><a rel="box" href="upload/zz/<?=$v[2]?>" title="<?=$v[1]?>"><img src="upload/zz/s_<?=$v[2]?>"><p class="prolisttit"><?=$v[1]?></p></a></li>

                <?php } ?>
            </ul>
            <h1 class="clear"></h1>
            <?php 
			    echo $row[1];
			?>
        </div>
    </div>

    
    <h1 class="clear"></h1>
    
    <!-- 友情链接 -->
	<?php include 'link.php'?>
    <!-- 友情链接 结束-->
    
</div>
<?php include 'footer.html'?>
</body>
</html>