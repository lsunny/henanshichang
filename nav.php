<?php include 'common/db.php';?>
<div class="top">
	<div class="topcon">
    	<span class="logo"><a href="#"><img src="images/logo.jpg"></a></span>
        <span class="store"><a href="#">设为首页</a>|<a href="#">添加收藏</a>|<a href="#">联系我们</a></span>
    </div>
</div>

<?php
$f = $_SERVER['PHP_SELF'];
?>
<div class="nav">
	<div class="navcon">
    	<ul>
        	<li <?=$f=='/index.php' ? 'class="navhome"' : ''?>><a href="./">首页</a></li>
            <li <?=$f=='/news.php' || $f=='/newsdetails.php'  ? 'class="navhome"' : ''?>><a href="news.php">新闻中心</a></li>
            <li <?=$f=='/about.php' ? 'class="navhome"' : ''?>><a href="about.php">关于我们</a></li>
            <li <?=$f=='/project.php' ? 'class="navhome"' : ''?>><a href="project.php">精品工程</a></li>
            <li <?=$f=='/zzry.php' ? 'class="navhome"' : ''?>><a href="zzry.php">资质荣誉</a></li>
            <li <?=$f=='/worker.php' ? 'class="navhome"' : ''?>><a href="worker.php">员工风采</a></li>
            <li <?=$f=='/guestbook.php' ? 'class="navhome"' : ''?>><a href="guestbook.php">在线留言</a></li>
            <li <?=$f=='/job.php' ? 'class="navhome"' : ''?>><a href="job.php">诚聘英才</a></li>
            <li class="navlast <?=$f=='/contact.php' ? ' navhome' : ''?>" ><a href="contact.php">联系我们</a></li>
        </ul>
    </div>
</div>