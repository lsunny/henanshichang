    <div class="links">
    	<h1 class="linkstit">友情链接<span class="eng">Links</span></h1>
        <div class="linkscon">
        	<ul>
                <?php
				$linkrs = query('partner','title,url,img','flag=1');
				foreach($linkrs as $linkv){
					if(empty($linkv[2])){
						printf("<li><a href='%s' target='_blank' title='%s'>%s</a></li>",$linkv[1],$linkv[0],$linkv[0]);
					}else{
						printf("<li><a href='%s' target='_blank' title='%s'><img src='upload/partner/%s' border='0' width='90' height='36'></a></li>",$linkv[1],$linkv[0],$linkv[2]);
					}
				}
				?>
            </ul>
        </div>
    </div>