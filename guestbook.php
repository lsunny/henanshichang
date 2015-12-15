<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>在线留言 - 河南仕畅市政工程有限公司 - 欢迎您!!! - 联系电话：0396-7636111</title>
<meta name="keywords" content="河南仕畅、河南工程、市政工程、驻马店市政工程、河南仕畅市政工程有限公司、河南工程、河南市政工程、hnshichang.com、联系电话：0396-7636111">
<meta name="description" content="河南仕畅、河南工程、市政工程、驻马店市政工程、河南仕畅市政工程有限公司、河南工程、河南市政工程、hnshichang.com、联系电话：0396-7636111">  
<link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
<link rel="icon" href="favicon.ico" type="image/x-icon">
<link href="css/style.css" rel="stylesheet">
<script src="js/j.js"></script>
<script src="js/ss.js"></script>
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
    	<h1 class="engtit"><span class="titmore fr"><a href="./">首页</a> &gt; 在线留言&gt; </span>在线留言</h1>
        <div class="procon">
<form action="guestsave.php" method="post" >
<table width="100%" border="0">
  <tr>
    <td width="10%" align="right">留言内容：</td>
    <td width="2%"><span class="addred">*</span></td>
    <td width="90%">
    <script id="container" name="content" type="text/plain">
       欢迎留言，我们的联系电话是:0396-7636111
    </script>
    <script type="text/javascript" charset="utf-8" src="ueditor/ueditor.config.js"></script>
    <!-- 编辑器源码文件 -->
    <script type="text/javascript" charset="utf-8" src="ueditor/ueditor.all.js"></script>
    <!-- 实例化编辑器 -->
    <script type="text/javascript">
        var ue = UE.getEditor('container',{
			emotionLocalization:true, /*  表情本地化 */
			lang:'zh-cn',/*  指定编辑器语言 */
			initialFrameWidth:'100%',  //初始化编辑器宽度,默认1000
			initialFrameHeight:150,
			textarea:'content',/* 是表单名称，用来接值*/
			initialContent:'欢迎留言!',    //初始化编辑器的内容,也可以通过textarea/script给值，看官网例子
            autoClearinitialContent:true, //是
			toolbars: [['undo', 'redo', '|','bold', 'italic', 'underline', '|', 'fontfamily', 'fontsize','forecolor', 'backcolor', 'insertorderedlist', 'insertunorderedlist','|','emotion','justifyleft', 'justifycenter', 'justifyright', '|',,'help']],
			elementPathEnabled:false,
			wordCount:true,
			maximumWords:200
			/*focus:true*/
		});
    </script>
    </td>
  </tr>
  <tr>
    <td height="40" align="right"><p>公司名称：</p></td>
    <td height="40">&nbsp;</td>
    <td height="40"><input type="text" name="gname" class="txtlist"></td>
  </tr>
  <tr>
    <td height="40" align="right">性别：</td>
    <td height="40">&nbsp;</td>
    <td height="40">
    	<label><input type="radio" name="gsex" value="男">&nbsp;男&nbsp;&nbsp;</label>
    	<label><input type="radio" name="gsex" value="女">&nbsp;女&nbsp;&nbsp;</label>
    	<label><input type="radio" name="gsex" value="保密" checked>&nbsp;保密</label>
    </td>
  </tr>
  <tr>
    <td height="40" align="right">您的邮箱：</td>
    <td height="40">&nbsp;</td>
    <td height="40"><input type="text" name="gmail" class="txtlist"/>
      由数字、&ldquo;+&rdquo;、中横杠&ldquo;-&rdquo;组成，最大允许20个字符</td>
  </tr>
  <tr>
    <td height="40" align="right">手机号码：</td>
    <td height="40">&nbsp;</td>
    <td height="40"><input type="text" name="gtel" class="txtlist">
      小于等于32个字符（包含0-9、-、（、）、顿号）</td>
  </tr>
  <tr>
    <td height="40" align="right">联系电话：</td>
    <td height="40">&nbsp;</td>
    <td height="40"><input type="text" name="gphone" class="txtlist"></td>
  </tr>
  
  <tr>
    <td height="40" align="right">联系地址：</td>
    <td height="40">&nbsp;</td>
    <td height="40"><input type="text" name="gaddress"  class="txtlist"></td>
  </tr>
  <tr>
    <td height="40" align="right">验证码：</td>
    <td height="40"><span class="addred">*</span></td>
    <td height="40"><input type="text" name="gcheck" class="txtlist">
    <img align="middle" src="common/cc.php" height="40"  onClick="this.src='common/cc.php?'+new Date()" title="点击，换一张"></td>
  </tr>
  <tr>
    <td height="40" align="right">&nbsp;</td>
    <td height="40">&nbsp;</td>
    <td height="40">
    <input type="submit" value="" style="border:none;background:url(images/fbbtn.png);width:72px;height:32px;">
    </td>
  </tr>
</table>
</form>
        </div>
        
    </div>
    
    <h1 class="clear"></h1>


	<?php include 'link.php';?>  
</div>
<?php include 'footer.html';?>
</body>
</html>