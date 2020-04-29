<?php

	$url = file_get_contents("https://api.covid19india.org/data.json");
	$data = json_decode($url,true);
	
	$active = $data['statewise'][0]['active'];
	$death = $data['statewise'][0]['deaths'];
	$recovered = $data['statewise'][0]['recovered'];
	$newcon= $data['statewise'][0]['deltaconfirmed'];
	$newrec= $data['statewise'][0]['deltarecovered'];
	$newde= $data['statewise'][0]['deltadeaths'];
  $dat=$data['statewise'][0]['lastupdatedtime'];

?>

<html>
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="dist/css/adminlte.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load("current", {packages:["corechart"]});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Cases', 'data'],          
          ['Active',      <?php echo $active;?>],
          ['Recovered',  <?php echo $recovered;?>],
          ['Death', <?php echo $death;?>],
                  ]);

        var options = {
          backgroundColor: 'transparent',
          title: 'COVID19 India | Active | Recovered | Death',
          pieHole: 0.4,
          responsive: true

        };

        var chart = new google.visualization.PieChart(document.getElementById('donutchart'));
        chart.draw(data, options);
      }
      $(window).resize(function(){
      drawChart();
    }); 
    </script>
  </head>
  <body style="background-color: #ECECEC; align-content: center; ">
   <h3 style="color: red; text-align: center;">OVERALL INDIA CASES STATICS</h3>
      <h6 style="color: green; text-align: right;">last updated <?php echo $dat ?></h6>
       
       <section class="content">
       	<div class="cols-md-4">
       		<div class="cols-md-6">
      			
      				<div class="col" id="donutchart" style="width: 100%; min-height: 400px;">
      			
      			</div>

       </div>
       	</div>
      	<div class="row ">
			<div class="col-lg-2">
            
            
            <div class="card-body">
            	
            </div>
          </div>
          <div class="col-lg-3 col-6">
            <div class="card bg-gradient-danger">
              <div class="card-header">
                <h6 class="card-title">NEW CONFIRMED</h6>
              </div>
              <div class="card-body">
                <?php
                    echo $newcon;
                 ?>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
          <div class="col-lg-3 col-6">
            <div class="card bg-gradient-success">
              <div class="card-header">
                <h3 class="card-title">NEW RECOVERED</h3>

              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <?php echo $newrec; ?>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
          <div class="col-lg-3 col-6">
            <div class="card bg-gradient-warning">
              <div class="card-header">
                <h3 class="card-title">NEW DEATHS</h3>     
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <?php echo $newde; ?>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
          <div class="col-lg-2">
            
            
            <div class="card-body">
            	
            </div>
          </div>
        </div>
      </section>
  </body>
</html>