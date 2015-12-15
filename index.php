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
	<div class="culture fl mr">
    	<h1 class="cultit">企业文化<span class="eng">Culture</span></h1>
        <div class="culcon0">
        	<p class="cullist"><span class="clbold">计划</span>是时间的最好保障，</p>
            <p class="cullist"><span class="clbold">时间</span>是效率的坚实基础，</p>
            <p class="cullist"><span class="clbold">效率</span>是行动的优化大师，</p>
            <p class="cullist"><span class="clbold">行动</span>是成功的唯一途径 。</p>
            <p class="cullist"><span class="clbold">经营理念</span>以市场为导向，以出精创优为基础，以服务业主为中心，以良好信誉为根本</p>
        </div>
    </div>
    
    
    <div class="intro fl">
    	<h1 class="introtit"><span class="titmore fr"><a href="about.php">更多&gt;&gt;</a></span>公司简介<span class="eng">Introduction</span></h1>
        <div class="introcon">
        	<img src="images/abpic.jpg" class="intropic"/>河南仕畅市政工程有限公司成立于2014年6月，注册资金1000万元，拥有市政公用工程三级资格认证，主营业务为：城市道路、公共广场、
给水工程、污水处理工程、供水管道、污水管道、垃圾转运站等。公司有高级专业人员十余人，中级专业技术人员二十余人，三类人员及特种工三十余人。
        我公司愿真诚与社会各界密切合作，增进友谊，共谋发展。
        </div>
    </div>
    
	<?php include 'leftserver.php';?>    
    
    
    
    <h1 class="clear"></h1>
    
    <div class="culture fl mr">
    	<h1 class="cultit" style="cursor:pointer" onClick="location.href='zzry.php'">资质荣誉<span class="eng">Aptitude</span></h1>
        <div class="apcon">
        	<div class="hd"><ul></ul></div>
			<div class="bd">
				<ul>
                    <?php
					$rs = query('hnsc_zz','url,title',"flag='y'",'order by id desc','limit 5');
					foreach($rs as $v){
					?>
					<li><a href="upload/zz/<?=$v[0]?>" title="<?=$v[1]?>"><img src="upload/zz/s_<?=$v[0]?>"></a></li>
                    <?php 	}?>
				</ul>
			</div>
			<a class="prev" href="javascript:void(0)"></a>
			<a class="next" href="javascript:void(0)"></a>
        </div>
    </div>
    
    
    
    <div class="engineer fr">
    	<h1 class="engtit"><span class="titmore fr"><a href="project.php">更多&gt;&gt;</a></span>工程展示<span class="eng">Engineering</span></h1>
        <div class="engcon">
        	<div class="bd">
                <ul class="picList">
                    <?php
					$pro = query('hnsc_project','img,title',"flag='y'",'','limit 6');
					foreach($pro as $v){
					?>
					<li>
						<div class="pic"><a href="upload/project/<?=$v[0]?>" rel="jp"><img src="upload/project/s_<?=$v[0]?>"></a></div>
						<div class="title"><a href="#"><?=$v[1]?></a></div>
					</li>
                    <?php
					}
					?>
                </ul>
            </div>
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