<?php
include '../common/db.php';
$n = query('hnsc_news','*','id='.$_GET['eid']);
$rs = $n[0];
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>新闻编辑</title>
<style>
th{font-size:14px;padding:15px;background-color:#eeeeee;letter-spacing:2px}
tr{text-align:center;}
tr td{font-size:12px;padding:10px;background-color:#fff;}
</style>
</head>

<body>
<form action="newseditsave.php" method="post">
<input type="hidden" name="id" value="<?=$_GET['eid']?>">
<table bgcolor="#CBCBCB" width="80%" cellpadding="3" cellspacing="1" border="0" align="center">
<tr>
	<th width="18%" align="right">类别</th>
    <th width="82%" align="left">操作</th>
</tr>

<tr>
<td align="right">类别:</td><td align="left"><select name="cname">
	<?php
	$cc = query('hnsc_newsclass');
	foreach($cc as $v){
		if($v[0] == $rs[4]){
	    printf("<option value='%s' selected>%s</option>",$v[0],$v[0]);	
		}else{
			    printf("<option value='%s'>%s</option>",$v[0],$v[0]);	
	
		}
	}
	?>
</select>&nbsp;&nbsp;&nbsp;发布时间:<input type="text" name="ntime" value="<?=date('Y-m-d H:i:s',$rs[6])?>"></td>
</tr>

<tr><td align="right">标题：</td><td align="left"><input type="text" name="title" value="<?=$rs[1]?>"></td></tr>
<tr><td align="right">新闻内容：</td><td align="left">
<script id="container" name="content" type="text/plain">
       <?=$rs[3]?>
    </script>
    <script type="text/javascript" src="../ueditor/ueditor.config.js"></script>
    <script type="text/javascript" src="../ueditor/ueditor.all.js"></script>
    <script type="text/javascript">
        var ue = UE.getEditor('container',{
			emotionLocalization:true, /*  表情本地化 */
			lang:'zh-cn',/*  指定编辑器语言 */
			initialFrameWidth:'100%',  //初始化编辑器宽度,默认1000
            initialFrameHeight:320,/*编辑器的高*/
			textarea:'content',/* 是表单名称，用来接值*/
			elementPathEnabled:false
			/*focus:true*/
		});
    </script>
</td></tr>
<tr>
<td align="right">来源:</td><td align="left"><input type="text" name="author" value="<?=$rs[2]?>"></td>
</tr>
<tr><td colspan="2"><input type="submit" value="编辑新闻"></td></tr>
</table>

</form>
</body>
</html>