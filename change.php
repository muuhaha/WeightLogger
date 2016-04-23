<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<a href="index.php"  class="btn btn-primary">返回</a><hr>
<?php
    include("conn.php");
	$sql="select * from weightrecord order by date desc";
	$query=mysql_query($sql);
	?>
<table class="table table-condensed">
    <thead>
        <tr>
            <th>日期</th>
            <th>体重</th>
            <th>谁</th>
            <th></th>
            <th></th>
        </tr>
    </thead>
    <tbody>
<?php
	while($rs=mysql_fetch_array($query)){
?>
        <tr class="<?php if($rs['name']=="light")echo "info";else echo "danger";?>">
            <td><?php echo $rs['date']?></td>
        	<td><?php echo number_format($rs['weight'],1)?></td>
        	<td><?php echo $rs['name']; ?></td>
            <td><a href="edit.php?id=<?php echo $rs['id']?>"  class="btn btn-primary">编辑</a></td>
            <td><a href="del.php?del=<?php echo $rs['id']?>"  class="btn btn-primary">删除</a></td>
        </tr>
       
<?php
	}
?>
    </tbody>
</table>
