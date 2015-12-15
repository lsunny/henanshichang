<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>员工风采 - 河南仕畅市政工程有限公司 - 欢迎您!!! - 联系电话：0396-7636111</title>
<meta name="keywords" content="河南仕畅、河南工程、市政工程、驻马店市政工程、河南仕畅市政工程有限公司、河南工程、河南市政工程、hnshichang.com、联系电话：0396-7636111">
<meta name="description" content="河南仕畅、河南工程、市政工程、驻马店市政工程、河南仕畅市政工程有限公司、河南工程、河南市政工程、hnshichang.com、联系电话：0396-7636111">  
<link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
<link rel="icon" href="favicon.ico" type="image/x-icon">
<link href="css/style.css" rel="stylesheet">
<script src="js/j.js"></script>
<script src="js/ss.js"></script>
<link rel="stylesheet" href="js/fancybox/jquery.fancybox.css">
<script  src="js/fancybox/jquery.fancybox.pack.js"></script>
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
    	<h1 class="engtit"><span class="titmore fr"><a href="./">首页</a> &gt; 员工风采</span>员工风采</h1>
        <div class="zz">
        <ul>
                 <?php
				 $currpage = isset($_GET['p']) ? $_GET['p'] : 1;
				 $rs  = pager('hnsc_worker',$currpage,$f='title,img,id,content',12,$w="flag='y'",'order by id desc');
				 
				 foreach($rs[0] as $v){
					 if(strlen($v[3])>0){
				 ?>
            	<li><a href="projectdetails.php?id=<?=$v[2]?>"  title="<?=$v[0]?>"><img src="upload/project/s_<?=$v[1]?>"><p class="prolisttit"><?=$v[0]?></p></a></li>
                <?php } else { ?>
            	<li><a href="upload/project/<?=$v[1]?>" rel="box" title="<?=$v[0]?>"><img src="upload/project/s_<?=$v[1]?>"><p class="prolisttit"><?=$v[0]?></p></a></li>
				<?php
					}
				}?>
            </ul>
            <h1 class="clear"></h1>
            <?=$rs[1]?>
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