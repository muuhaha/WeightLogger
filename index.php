<html>
<head>
<link type="text/css" rel="stylesheet" href="css/reset.css" />
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.1/js/bootstrap.min.js"></script>
<style type="text/css">
.comment{width:680px;margin:20px auto;position:relative;background:#fff;padding:20px 50px 50px;border:1px solid #DDD;border-radius:5px;}
.comment h3{height:28px;line-height:28px}
.com_form{width:100%;position:relative}
.input{width:99%;height:60px;border:1px solid #ccc}
.com_form p{height:28px;line-height:28px;position:relative;margin-top:10px;}
span.emotion{width:42px;height:20px;background:url(http://www.16code.com/cache/demos/user-say/img/icon.gif) no-repeat 2px 2px;padding-left:20px;cursor:pointer}
span.emotion:hover{background-position:2px -28px}
#show{width:770px;margin:20px auto;background:#fff;padding:5px;border:1px solid #DDD;vertical-align:top;}
.sub_btn{
	position:absolute;right:0px;top:0;
	display:inline-block;
	zoom:1;/* zoom and *display = ie7 hack for display:inline-block */
	*display:inline;
	vertical-align:baseline;
	margin:0 2px;
	outline:none;
	cursor:pointer;
	text-align:center;
	font:14px/100% Arial, Helvetica, sans-serif;
	padding:.5em 2em .55em;
	text-shadow:0 1px 1px rgba(0,0,0,.6);
	-webkit-border-radius:3px;
	-moz-border-radius:3px;
	border-radius:3px;
	-webkit-box-shadow:0 1px 2px rgba(0,0,0,.2);
	-moz-box-shadow:0 1px 2px rgba(0,0,0,.2);
	box-shadow:0 1px 2px rgba(0,0,0,.2);
	color:#e8f0de;
	border:solid 1px #538312;
	background:#64991e;
	background:-webkit-gradient(linear, left top, left bottom, from(#7db72f), to(#4e7d0e));
	background:-moz-linear-gradient(top,  #7db72f,  #4e7d0e);
	filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#7db72f', endColorstr='#4e7d0e');
}
.sub_btn:hover{
	background:#538018;
	background:-webkit-gradient(linear, left top, left bottom, from(#6b9d28), to(#436b0c));
	background:-moz-linear-gradient(top,  #6b9d28,  #436b0c);
	filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#6b9d28', endColorstr='#436b0c');
}
/* qqFace */
.qqFace{margin-top:4px;background:#fff;padding:2px;border:1px #dfe6f6 solid;}
.qqFace table td{padding:0px;}
.qqFace table td img{cursor:pointer;border:1px #fff solid;}
.qqFace table td img:hover{border:1px #0066cc solid;}
</style>
<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="shortcut icon" href="favicon.ico" >
</head>
<body>
	<div>
		<!--<a href="add.php" class="btn btn-primary">记录体重</a>-->
		<div style="margin-right=0;display:inline-block; float:right">
			<a href="add_message.php" class="btn">添加留言</a>
			<a href="change.php" class="btn" style="display:inline-block">修改</a>
			<a href="chart.php" class="btn" style="display:inline-block">曲线</a>
		</div>
	</div>
	<?php
	include("autolink.php");
    include("conn.php");
	if(!empty($_POST['sub'])){
		$name=$_POST['name'];
		$weight=$_POST['weight'];
		if($name==""||$weight==0);else{
		$sql="insert into weightrecord (id,name,weight,date) values(null,'$name','$weight',now())";
		mysql_query($sql);
		//echo "<script>location.href='index.php?record=true'</script>";
		}
	}
	?>
	<form action="index.php" method="post">
		<div class="form-group"><input type="text" name="weight" style="margin-top:10px">&nbsp;kg<br>
		<div class="radio" style="display:inline-block;margin-left:10px;margin-right:5px">
			<label>
			  <input type="radio" name="name" id="optionsRadios1" value="snow" checked >
			  snow
			</label>
		  </div>
			<div class="radio" style="display:inline-block;margin-left:5px;margin-right:10px">
			<label>
			  <input type="radio" name="name" id="optionsRadios2" value="light" c>
			  light
			</label>
		  </div>
		
		<input type="submit" name="sub" value="提交" class="btn btn-info btn-xs">
		<!--<a href="index.php"  class="btn btn-primary">返回</a>-->
		</div>
	</form>

	
	<div role="tabpanel">

		<!-- Nav tabs -->
		<ul class="nav nav-tabs" role="tablist">
			<li role="presentation" <?php if(empty($_GET['message'])) echo 'class="active"'?> ><a href="#weight" aria-controls="weight" role="tab" data-toggle="tab">体重</a></li>
			<li role="presentation" <?php if(!empty($_GET['message'])) echo 'class="active"'?>><a href="#messages" aria-controls="messages"  role="tab" data-toggle="tab">留言</a></li>
		</ul>

		<!-- Tab panes -->
		<div class="tab-content">
			<div role="tabpanel"class="tab-pane<?php if(empty($_GET['message']))echo ' active"';?>" id="weight">
			<?php 
				$sql="select * from weightrecord order by date desc";
				$query=mysql_query($sql);
			?>
			<table class="table table-condensed">
				<thead>
					<tr>
						<th>日期</th>
						<th>体重</th>
					</tr>
				</thead>
				<tbody>
				<?php
					while($rs=mysql_fetch_array($query))
					{
				?>
					<tr class="<?php if($rs['name']=="light")echo "info";else echo "danger";?>">
						<td><?php echo substr($rs['date'],5,5)?></td>
						<td><?php echo number_format($rs['weight']*2,1)?></td>
					</tr>
				<?php
					}
				?>
				</tbody>
			</table>
			</div>
		<div role="tabpanel" class="tab-pane<?php if(!empty($_GET['message']))echo ' active"';?>" id="messages">
		<?php
			$sql="select * from message order by date desc";
			$query_message=mysql_query($sql);
		?>
		<table class="table table-condensed">
			<thead>
				<tr>
					<th>时间</th>
					<th>留言内容</th>
					<th>from</th>
				</tr>
			</thead>
			<tbody>
			<?php
				while($rs=mysql_fetch_array($query_message))
				{
			?>
				<tr class="<?php if($rs['name']=="light")echo "info";else echo "danger";?>">
					<td><?php echo substr($rs['date'],5,11)?></td>
					<td><?php echo autolink(replace_em($rs['content']));?></td>
					<td><?php echo $rs['name']; ?></td>
				</tr>
			<?php
				}
			?>
			</tbody>
		</table>
	</div>
	</div>

</div>
</body>
<html>

<?php
function replace_em($str){
	$str = preg_replace("/\[em_([0-9]*)\]/",'<img src="arclist/$1.gif" border="0" />',$str);
	return $str;
}
?>






<!--<hr><p>爱你哦~</p>
<img style="-webkit-user-select: none; cursor: zoom-in;" src="http://1.lightsnow.sinaapp.com/1.jpg" width="316" height="343">--!>