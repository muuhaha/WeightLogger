<?php
	@mysql_connect("w.rdc.sae.sina.com.cn:3307",SAE_MYSQL_USER,SAE_MYSQL_PASS)or die("数据库连接失败");
	@mysql_select_db("app_lightsnow")or die("db连接失败");
	mysql_set_charset("utf8");
?>
