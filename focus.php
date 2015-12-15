<div class="focusBox">
      <ul class="pic">
        <?php
		$row = query('hnsc_ad','*',"flag='y'");
		foreach($row as $v){
		?>
        <li><a href="<?=$v[3]?>" title="<?=$v[1]?>"><img src="upload/ad/<?=$v[2]?>"/></a></li>
        <?php
		}
		?>
      </ul>
      <a class="prev" href="javascript:void(0)"></a>
      <a class="next" href="javascript:void(0)"></a>
      <ul class="hd"></ul>
</div>