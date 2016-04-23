<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<style type="text/css">
.comment{width:680px;margin:20px auto;position:relative;background:#fff;padding:20px 50px 50px;border:1px solid #DDD;border-radius:5px;}
.comment h3{height:28px;line-height:28px}
.com_form{width:100%;position:relative}
.input{width:99%;height:60px;border:1px solid #ccc}
.com_form p{height:28px;line-height:28px;position:relative;margin-top:10px;}
span.emotion{width:42px;height:20px;background:url(http://www.16code.com/cache/demos/user-say/img/icon.gif) no-repeat 2px 2px;padding-left:20px;cursor:pointer}
span.emotion:hover{background-position:2px -28px}
#show{width:770px;margin:20px auto;background:#fff;padding:5px;border:1px solid #DDD;vertical-align:top;}
.sub_btn1{
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
.sub_btn{
	float:right;
}
/* qqFace */
.qqFace{margin-top:4px;background:#fff;padding:2px;border:1px #dfe6f6 solid;}
.qqFace table td{padding:0px;}
.qqFace table td img{cursor:pointer;border:1px #fff solid;}
.qqFace table td img:hover{border:1px #0066cc solid;}
</style>
<?php
    include("conn.php");
	if(!empty($_POST['sub'])){
		$name=$_POST['name'];
		$content=$_POST['content'];
		if($name==""||$content=="");else{
		$sql="insert into message (id,name,content,date) values(null,'$name','$content',now())";
		mysql_query($sql);
		echo "<script>location.href='index.php?message=true'</script>";
		}
	}
?>

<form action="add_message.php" method="post">
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
留言内容:<br>

	<div class="com_form">
		<textarea class="input" id="saytext" name="content"></textarea>
		<p>
			<span class="emotion">表情</span>
			<a href="index.php"  class="btn btn-primary" style="display:inline-block;float:right">返回</a>
			<input type="submit" name="sub" class="sub_btn btn btn-primary"style="margin-right:20px"  value="提交">
		</p>
	</div>
<hr>

</div>
</form>

    


<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/jquery.qqFace.js"></script>
<script type="text/javascript">
$(function(){
	$('.emotion').qqFace({
		id : 'facebox', 
		assign:'saytext', 
		path:'arclist/'	//表情存放的路径
	});
	$(".sub_btn").click(function(){
		var str = $("#saytext").val();
		$("#show").html(replace_em(str));
	});
});
//查看结果
function replace_em(str){
	str = str.replace(/\</g,'&lt;');
	str = str.replace(/\>/g,'&gt;');
	str = str.replace(/\n/g,'<br/>');
	str = str.replace(/\[em_([0-9]*)\]/g,'<img src="arclist/$1.gif" border="0" />');
	return str;
}
</script>