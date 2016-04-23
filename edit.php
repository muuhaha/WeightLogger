<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<?php
    include("conn.php");
	if(!empty($_GET['id'])){
		$id=$_GET['id'];
		$sql="select * from weightrecord where id=$id";
		$query=mysql_query($sql);
		$rs=mysql_fetch_array($query);		
	}

	if(!empty($_POST['sub'])){
		$hid=$_POST['hid'];
		$name=$_POST['name'];
		$weight=$_POST['weight'];
		if($name==""||$weight==0)
		;
		else{
		$sql="update weightrecord set name='$name',weight=$weight where id=$hid";
		mysql_query($sql);
		echo "<script>location.href='change.php'</script>";
		}
		
	}
	
?>
<form action="edit.php" method="post">
<div class="form-group">
<div class="radio">
    <label>
      <input type="radio" name="name" id="optionsRadios1" value="snow" <?php echo $rs['name']=="snow"?"checked":""?> >
      snow
    </label>
  </div>
    <div class="radio">
    <label>
      <input type="radio" name="name" id="optionsRadios2" value="light" <?php echo $rs['name']=="light"?"checked":""?>>
      light
    </label>
  </div>
体重<br><input type="text" name="weight" value="<?php echo $rs['weight']?>" >&nbsp;kg<hr>
<input type="hidden" name="hid" value="<?php echo $id;?>">
<input type="submit" name="sub" value="提交" class="btn btn-primary">
<a href="index.php" class="btn btn-primary">返回</a>
</div>
</form>
