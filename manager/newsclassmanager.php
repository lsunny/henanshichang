<?php
include '../common/db.php';

//修改类别
if(isset($_POST['old'])){
	$o = $_POST['old'];
	unset($_POST['old']);
	update('hnsc_newsclass',$_POST,"cname='$o'");
	header('location:'.$_SERVER['PHP_SELF']);
}else if(isset($_POST['cname'])){ //添加新类别
	save('hnsc_newsclass',$_POST);
	header('location:'.$_SERVER['PHP_SELF']);
}else if(isset($_GET['delid'])){//删除类别
	$stmt = $pdo->prepare('delete	from hnsc_newsclass where cname=?');
	$stmt->execute([$_GET['delid']]);
	$stmt->closeCursor();
	header('location:'.$_SERVER['PHP_SELF']);
}
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>新闻类别管理</title>
<style>
th{font-size:14px;padding:15px;background-color:#eeeeee;letter-spacing:2px}
tr{text-align:center;}
tr.even td{font-size:12px;padding:10px;background-color:#eee;}
tr.odd td{font-size:12px;padding:10px;background-color:#fff;}
</style>
</head>

<body>
<h2>添加新闻类别</h2>

<?php if(isset($_GET['u'])){ ?>
<form action="" method="post">
<input type="hidden" name="old" value="<?=$_GET['u']?>">
新类别:<input type="text" name="cname" autofocus value="<?=$_GET['u']?>"><input type="submit" value="修改提交">
</form>
<?php } else {?>

<form action="" method="post">
新类别:<input type="text" name="cname" autofocus><input type="submit" value="提交">
</form>
<?php } ?>


<h2>管理新闻类别</h2>
<table bgcolor="#CBCBCB" width="80%" cellpadding="3" cellspacing="1" border="0" align="center">
<tr>
	<th>类别</th>
    <th>操作</th>
</tr>
<?php
$num = 0;
$rows = query('hnsc_newsclass');
foreach($rows as $v){
	$c = ++$num%2==0 ? 'even' : 'odd';
?>
<tr class="<?=$c?>">
	<td><?=$v[0]?></td>
	<td>
    	<a href="?delid=<?=$v[0]?>" onClick="return confirm('是否要删除?')">删除</a>&nbsp;
        <a href="?u=<?=$v[0]?>">修改</a>
    </td>
</tr>
<?php	}?>
</table>
<a href="<?=$_SERVER['PHP_SELF']?>">添加新类别</a>
</body>
</html>