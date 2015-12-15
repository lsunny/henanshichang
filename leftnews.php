	<div class="culture">
    	<h1 class="cultit">新闻中心<span class="eng">News</span></h1>
        <div class="culcon">
        	<ul><?php
			    $lnv = query('hnsc_newsclass');
				foreach($lnv as $lsv){
				?>
            	<li><a href="news.php?cname=<?=$lsv[0]?>"><?=$lsv[0]?></a></li>
                <?php	
			    }
			    ?>
            </ul>
        </div>
    </div>