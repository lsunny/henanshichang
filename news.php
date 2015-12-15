<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>新闻中心 - 河南仕畅市政工程有限公司 - 欢迎您!!! - 联系电话：0396-7636111</title>
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
<?php include 'nav.php'?>

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
    	<h1 class="engtit"><span class="titmore fr"><a href="#">首页</a> &gt; <?=isset($_GET['cname']) ? $_GET['cname'] : '新闻中心'?></span><?=isset($_GET['cname']) ? $_GET['cname'] : '新闻中心'?></h1>
        <div class="conrcon">
        	<ul>
                <?php
				$currpage = isset($_GET['p']) ? $_GET['p'] : 1;
				if(isset($_GET['cname'])){
					$ccc = $_GET['cname'];
					$ns = pager('hnsc_news',$currpage,'*',10,"flag='y' and cname='$ccc'",'order by id desc',"cname=$ccc&");
				}else{
					$ns = pager('hnsc_news',$currpage,'*',10,"flag='y'",'order by id desc');
				}
				foreach($ns[0] as $v){?>
            	<li><span class="newstime fr"><?=date('Y-m-d',$v[6])?></span><a href="newsdetails.php?id=<?=$v[0]?>"><?=$v[1]?></a></li>
				<?php
				}
				?>
            </ul>
            
            <?php
			echo $ns[1];
			?>
            
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