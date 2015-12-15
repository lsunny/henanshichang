<?php
include '../common/db.php';

//设置管理的是否显示
if(isset($_GET['flag'],$_GET['id'])){
	update('hnsc_news',array('flag'=>$_GET['flag']),'id='.$_GET['id']);
}else if(isset($_GET['delid'])){
	delete('hnsc_news','id='.$_GET['delid']);
}

if(isset($_GET['cname'])){
	update('hnsc_news',array('cname'=>$_GET['cname']),'id='.$_GET['id']);
}

$currpage = isset($_GET['p']) ? $_GET['p'] : 1;
$rs = pager('hnsc_news',$currpage,'*',20,'1=1','order by id desc');
$rows = $rs[0];
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>新闻-管理</title>
<style>
th{font-size:14px;padding:15px;background-color:#eeeeee;letter-spacing:2px}
tr{text-align:center;}
tr:hover{color:red;background-color:yellow;}
tr.even td{font-size:12px;padding:10px;background-color:#eee;}
tr.odd td{font-size:12px;padding:10px;background-color:#fff;}
	.page{font-size:12px;height:30px;padding:0;clear:both;overflow:hidden;text-align:center;}
	.page a{text-decoration:none;line-height:25px;padding:0px 10px;display:inline-block;margin-right:5px;border:solid 1px #c8c7c7;}
	.page a:hover,.page a.checked{text-decoration:none;border:solid 1px #0086d6;background:#0091e3;color:#fff;}
	.page a:visited,.page a:link{color:#333;}
	.page a:active{color:#3B3B3B;}
</style>
</head>

<body>
<table bgcolor="#CBCBCB" width="80%" cellpadding="3" cellspacing="1" border="0" align="center">
<tr>
	<th>标题</th>
	<th>类别</th>
    <th>发布时间</th>
    <th>来源</th>
    <th>浏览次数</th>
    <th>是否显示</th>
    <th>操作</th>
</tr>
<?php
$num = 0;
foreach($rows as $v){
	$c = ++$num%2==0 ? 'even' : 'odd';
?>
<tr class="<?=$c?>">
	<td><?=$v[1]?></td>
	<td>
    <select onChange="location.href='?p=<?=$currpage?>&id=<?=$v[0]?>&cname='+this.value">
    	<?php
            $ll = query('hnsc_newsclass');
			foreach($ll as $vv){
				if($v[4]==$vv[0]){
			    	printf("<option value='%s' selected>%s</option>",$vv[0],$vv[0]);	
				}else{
			    	printf("<option value='%s'>%s</option>",$vv[0],$vv[0]);	
				}
			}
		?>
    </select>
    </td>
    <td><?=date('Y-m-d H:i:s',$v[6])?></td>
    <td><?=$v[2]?></td>
	<td><?=$v[5]?></td>
	<td>
	<?php
    if($v[7]=='y'){
	    printf("<a href='?id=%d&flag=n&p=%d'>隐藏</a>",$v[0],$currpage);	
	}else{
	    printf("<a href='?id=%d&flag=y&p=%d'>显示</a>",$v[0],$currpage);	
	}
	
	?>
    
    </td>
	<td>
    <a href="newsedit.php?eid=<?=$v[0]?>">编辑</a>&nbsp;
    <a href="?delid=<?=$v[0]?>&p=<?=$currpage?>" onClick="return confirm('是否要删除?')">删除</a>&nbsp;
    <a href="../newsdetails.php?id=<?=$v[0]?>" target="_blank">查看新闻</a>
    </td>
</tr>
<?php	
}
$c = ++$num%2==0 ? 'even' : 'odd';
?>
<tr class="<?=$c?>"><td colspan="8"><?=$rs[1]?></td></tr>
</table>
</body>
</html>