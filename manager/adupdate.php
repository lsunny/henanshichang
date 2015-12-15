<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>无标题文档</title>
</head>

<body>
<?php
if(isset($_GET['name'])){
    $name = $_GET['name'];	
}

if(isset($_POST['update'])){
    $n = $_POST['oldname'];
	move_uploaded_file($_FILES['newimg']['tmp_name'],'../upload/ad/'.$n);
	header('location:ad_add.php');
}
?>
<form action="" method="post" enctype="multipart/form-data">
<input type="hidden" name="oldname" value="<?php echo $name; ?>"/>
原图:<img width="600" height="150" src="../upload/ad/<?php echo $name; ?>" /><br/>
新图:<input type="file" name="newimg"/><input name="update" type="submit" value="更新广告图片"/>
<input type="button" onClick="history.go(-1);" value="返回"/>
</form>
</body>
</html>