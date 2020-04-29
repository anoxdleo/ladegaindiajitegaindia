<?php

	//$data = file_get_contents("https://api.covid19india.org/resources/resources.json");
	$data1 = file_get_contents("https://api.covid19india.org/raw_data2.json");
	$val1 = json_decode($data1,true);
	$data2 = file_get_contents("https://api.covid19india.org/raw_data3.json");
	$val2 = json_decode($data2,true);
	/*echo "<pre>";
	print_r($data1);*/
	//$c = count($data1["resources"]);
	$c1 = count($val1["raw_data"]);
	$c2 = count($val2["raw_data"]);
	$a1 = 0;
	$a2 = 0;
	$a3 = 0;
	$a4 = 0;
	$a5 = 0;
	$a6 = 0;
	$a7 = 0;
	$a8 = 0;
	$a9 = 0;
	$a10 = 0;
	$o1=0;
	for($i=1 ; $i<$c1 ;$i++)
	{
		if ($val1["raw_data"][$i]["agebracket"]>"0" && $val1["raw_data"][$i]["agebracket"]<="10") 
		{
			$a1++;
		}
		if ($val1["raw_data"][$i]["agebracket"]>="10" && $val1["raw_data"][$i]["agebracket"]<="20") 
		{
			$a2++;
		}
		if ($val1["raw_data"][$i]["agebracket"]>="20" && $val1["raw_data"][$i]["agebracket"]<="30") 
		{
			$a3++;
		}
		if ($val1["raw_data"][$i]["agebracket"]>="30" && $val1["raw_data"][$i]["agebracket"]<="40") 
		{
			$a4++;
		}
		if ($val1["raw_data"][$i]["agebracket"]>="40" && $val1["raw_data"][$i]["agebracket"]<="50") 
		{
			$a5++;
		}
		if ($val1["raw_data"][$i]["agebracket"]>="50" && $val1["raw_data"][$i]["agebracket"]<="60") 
		{
			$a6++;
		}
		if ($val1["raw_data"][$i]["agebracket"]>="60" && $val1["raw_data"][$i]["agebracket"]<="70") 
		{
			$a7++;
		}
		if ($val1["raw_data"][$i]["agebracket"]>="70" && $val1["raw_data"][$i]["agebracket"]<="80") 
		{
			$a8++;
		}
		if ($val1["raw_data"][$i]["agebracket"]>="80" && $val1["raw_data"][$i]["agebracket"]<="90") 
		{
			$a9++;
		}
		if ($val1["raw_data"][$i]["agebracket"]>="90" && $val1["raw_data"][$i]["agebracket"]<="100") 
		{
			$a10++;
		}
		if ($val1["raw_data"][$i]["agebracket"]=="") 
		{
			$o1++;
		}
				
	}
	for($i=1 ; $i<$c2 ;$i++)
	{
		if ($val2["raw_data"][$i]["agebracket"]>"0" && $val2["raw_data"][$i]["agebracket"]<="10") 
		{
			$a1++;
		}
		if ($val2["raw_data"][$i]["agebracket"]>="10" && $val2["raw_data"][$i]["agebracket"]<="20") 
		{
			$a2++;
		}
		if ($val2["raw_data"][$i]["agebracket"]>="20" && $val2["raw_data"][$i]["agebracket"]<="30") 
		{
			$a3++;
		}
		if ($val2["raw_data"][$i]["agebracket"]>="30" && $val2["raw_data"][$i]["agebracket"]<="40") 
		{
			$a4++;
		}
		if ($val2["raw_data"][$i]["agebracket"]>="40" && $val2["raw_data"][$i]["agebracket"]<="50") 
		{
			$a5++;
		}
		if ($val2["raw_data"][$i]["agebracket"]>="50" && $val2["raw_data"][$i]["agebracket"]<="60") 
		{
			$a6++;
		}
		if ($val2["raw_data"][$i]["agebracket"]>="60" && $val2["raw_data"][$i]["agebracket"]<="70") 
		{
			$a7++;
		}
		if ($val2["raw_data"][$i]["agebracket"]>="70" && $val2["raw_data"][$i]["agebracket"]<="80") 
		{
			$a8++;
		}
		if ($val2["raw_data"][$i]["agebracket"]>="80" && $val2["raw_data"][$i]["agebracket"]<="90") 
		{
			$a9++;
		}
		if ($val2["raw_data"][$i]["agebracket"]>="90" && $val2["raw_data"][$i]["agebracket"]<="100") 
		{
			$a10++;
		}
		if ($val2["raw_data"][$i]["agebracket"]=="") 
		{
			$o1++;
		}		
	}
	$m = 0;
	$f = 0;
	$o = 0;

	for($i=1 ; $i<$c1 ;$i++)
	{
		if ($val1["raw_data"][$i]["gender"]=="M") 
		{
			$m++;
		}
		if ($val1["raw_data"][$i]["gender"]=="F") 
		{
			$f++;
		}
		if ($val1["raw_data"][$i]["gender"]=="") 
		{
			$o++;
		}		
	}
	
	for($i=1 ; $i<$c2 ;$i++)
	{
		if ($val2["raw_data"][$i]["gender"]=="M") 
		{
			$m++;
		}
		if ($val2["raw_data"][$i]["gender"]=="F") 
		{
			$f++;
		}
		if ($val2["raw_data"][$i]["gender"]=="") 
		{
			$o++;
		}		
	}
	

	
?>
<!DOCTYPE html>
<html>
<head>
	<title>Patient Datas</title>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/adminlte.min.css">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
   
		
	
    <script type="text/javascript">
      google.charts.load("current", {packages:["corechart"]});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Gender', 'Total Case'],
          ['Male', <?php echo $m;?>],
          ['Female', <?php echo $f;?>],
    		      
        ]);
        var options = {
          is3D: true,
        backgroundColor: {
            fill: "#DFEFF0"
          } 
        };	
        var chart = new google.visualization.PieChart(document.getElementById('piechart_3d'));
        chart.draw(data, options);
      }
      $(window).resize(function(){
      drawChart();
    }); 
    </script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['bar']});
      google.charts.setOnLoadCallback(drawStuff);

      function drawStuff() {
        var data = new google.visualization.arrayToDataTable([
          ['ByAge', 'Total'],
          ["0-10",<?php echo $a1;?> ],
          ["10-20", <?php echo $a2;?>],
          ["20-30", <?php echo $a3;?>],
          ["30-40", <?php echo $a4;?>],
          ["40-50", <?php echo $a5;?>],
          ["50-60",<?php echo $a6;?>],
          ["60-70",<?php echo $a7;?>],
          ["70-80",<?php echo $a8;?>],
          ["80-90",<?php echo $a9;?>],
          ["90-100",<?php echo $a10;?>]
        ]);

        var options = {
          legend: { position: 'none' },
          
          
          axes: {
            x: {
              0: { side: 'bottom', label: 'Age'} // Top x-axis.
            }
          },
          bar: { groupWidth: "90%" },
        	backgroundColor: {
            	fill: "#DFEFF0"
          } 
        };

        var chart = new google.charts.Bar(document.getElementById('top_x_div'));
        chart.draw(data, google.charts.Bar.convertOptions(options));
      };
      $(window).resize(function(){
      drawStuff();
    }); 
    </script>
</head>
<body style="background-color: #ECECEC">
	<h3 style="color: red; text-align: center;">PATIENT DATA'S</h3><br><br>
	<section class="content">
		<div class="row">
			<div class="col-md-6">
      <div class="card shadow rounded" style="background-color: #DFEFF0 ;">
        <div class="card-header"> PATIENT'S GENDER</div>
        <div class="card-body">
           <div style="background-color: #DFEFF0 ;"><div id="piechart_3d"></div></div>
        </div>
        <div class="card-footer">
        	<?php echo $o." patient's data still waiting";?>
        </div>
      </div>
    </div>
			<div class="col-md-6">
      <div class="card shadow rounded" style="background-color: #DFEFF0 ;">
        <div class="card-header">PATIENT'S AGE </div>
        <div class="card-body">
           <div style="background-color: #DFEFF0 ;"><div id="top_x_div"></div></div>
        </div>
      </div>
    </div>
		</div>
	</section>

</body>
</html>