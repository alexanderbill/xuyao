<?php
header("Content-Type:text/html; charset=UTF-8");
?>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<title>财付通即时到帐程序演示</title>
</head>
<body>
<br/>
<form action="paypass.php" method="post">
充值金额：<input type="text" name="ttedu_chongzhijinge"><br><br>
&nbsp;&nbsp;备&nbsp;&nbsp;注：<textarea name="ttedu_beizhu" rows="2" cols="30"></textarea><br><br>
&nbsp;&nbsp;&nbsp;&nbsp;<input type="submit" value="提交">
</form>
</body>
</html>
