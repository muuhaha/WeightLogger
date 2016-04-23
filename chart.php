<html>
<head>
<link type="text/css" rel="stylesheet" href="css/reset.css" />
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.1/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="shortcut icon" href="favicon.ico" >
</head>
<body>
<script src="/highcharts.js"></script>
<script src="/exporting.js"></script>

<div id="container" style="min-width: 800px; height: 200px; margin: 0 auto">
</div>
<div>
	<div style="margin-right=0;display:inline-block; float:right">
		<a href="index.php" class="btn" style="display:inline-block">返回</a>
	</div>
</div>
	<?php
    include("conn.php");
	$sql="select * from weightrecord where name = 'snow 'order by date desc";
	$query=mysql_query($sql);
	$chartData='';//体重图数据
	while($rs=mysql_fetch_array($query))
	{
		$date = $rs['date'];
		$chartData.='[Date.UTC('.substr($date,0,4).', '.(intval(substr($date,5,2))-1).', '.substr($date,8,2).'), '.$rs['weight'].'],';
	}
	$chartData=substr($chartData,0,strlen($chartData)-1);
	?>
<script type="text/javascript">
$(function () {
    $('#container').highcharts({
        chart: {
            type: 'spline'
        },
        title: {
            text: ''
        },
        subtitle: {
            text: ''
        },
        xAxis: {
            type: 'datetime',
            dateTimeLabelFormats: { // don't display the dummy year
				day: '$m-%e'
            },
            title: {
                text: ''
            }
        },
        yAxis: {
			floor: 55,
			ceiling: 62,
            title: {
                text: ''
            },
            min: 0
        },
        tooltip: {
            headerFormat: '',
            pointFormat: '{point.x:%m-%e}: {point.y:.1f} kg',
			dateTimeLabelFormats: { // don't display the dummy year
				day: '$m-%e'
            }
        },

        plotOptions: {
			 series: {
                lineWidth: 0
            },
            spline: {
                marker: {
                    enabled: true
                }
            }
        },

        series: [{
			name: ' ',
            // Define the data points. All series have a dummy year
            // of 1970/71 in order to be compared on the same x axis. Note
            // that in JavaScript, months start at 0 for January, 1 for February etc.
            data: [
                <?php echo $chartData;?>
            ]
        }]
    });
});
		</script>
</body>
<html>