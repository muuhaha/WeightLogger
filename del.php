<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<?php
    include("conn.php");
	if(!empty($_GET['del'])){
		$d=$_GET['del'];
		$sql="delete from weightrecord where id=$d";
		mysql_query($sql);
		echo "<script>location.href='change.php'</script>";
		
	}
	
?>
<hr><a href="change.php" class="btn btn-primary">返回</a><hr>