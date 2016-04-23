<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<?php
    include("conn.php");
	if(!empty($_POST['sub'])){
		$name=$_POST['name'];
		$weight=$_POST['weight'];
		if($name==""||$weight==0);else{
		$sql="insert into weightrecord (id,name,weight,date) values(null,'$name','$weight',now())";
		mysql_query($sql);
		echo "<script>location.href='index.php?record=true'</script>";
		}
	}
?>

<form action="add.php" method="post">
<div class="form-group">
<div class="radio">
    <label>
      <input type="radio" name="name" id="optionsRadios1" value="snow" checked >
      snow
    </label>
  </div>
    <div class="radio">
    <label>
      <input type="radio" name="name" id="optionsRadios2" value="light" c>
      light
    </label>
  </div>
体重<br><input type="text" name="weight">&nbsp;kg<hr>
<input type="submit" name="sub" value="提交" class="btn btn-primary">
<a href="index.php"  class="btn btn-primary">返回</a>
</div>
</form>
