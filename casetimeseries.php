<html>
<head>
  <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/adminlte.min.css">
    <link rel = "stylesheet" 
         href = "https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <!-- ALLLLL MONTHHHSSS CHARTRTTTTTTTTTTTTTTTTT-->
  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['line']});
      google.charts.setOnLoadCallback(drawChart);

    function drawChart() {

      var data = new google.visualization.DataTable();
      data.addColumn('string', 'month');
      data.addColumn('number', 'Confirmed');
      data.addColumn('number', 'Recovered');
      data.addColumn('number', 'Deaths');

      data.addRows([
        //[1,  37.8, 80.8, 41.8],
            <?php
              $data= file_get_contents("https://api.covid19india.org/data.json");
            $data=json_decode($data,true);
            $mo1="";
            $co1=0;
            $re1=0;
            $de1=0;
            $month= array("February", "March", "April", "May", "June", "July","August", "September");
            static $m =0;
            $arr_con=[];
            $count=count($data["cases_time_series"]);
            for ($i=2; $i <$count ; $i++) {
              if (substr_count($data["cases_time_series"][$i]["date"], $month[$m])>0) {
                    
              }
              else
              {
                $mo=$month[$m];
                $m++;
                $co=$data["cases_time_series"][$i-1]["totalconfirmed"];
                $re=$data["cases_time_series"][$i-1]["totalrecovered"];
                $de=$data["cases_time_series"][$i-1]["totaldeceased"];
                echo "['".$mo."',$co,$re,$de],";
                
              }
            }
            if (substr_count($data["cases_time_series"][$i-1]["date"], $month[$m])>0) {
                $mo1=$month[$m];
                $co1=$data["cases_time_series"][$i-1]["totalconfirmed"];
                $re1=$data["cases_time_series"][$i-1]["totalrecovered"];
                $de1=$data["cases_time_series"][$i-1]["totaldeceased"];
                echo "['".$mo1."',$co1,$re1,$de1],";
            }          
          ?>
      ]);

      var options = {
        colors: ["red","green","orange"],
        curveType: 'function',
        axes: {
          x: {
            0: {side: 'top'}
          }
        },
        backgroundColor: {
            fill: "#DFEFF0"
          }
      };

      var chart = new google.charts.Line(document.getElementById('monthsgrp'));

      chart.draw(data, google.charts.Line.convertOptions(options));
    }

      $(window).resize(function(){
      drawChart();
    }); 
  </script>

  <!-- APRIL DATA-->

  <script type="text/javascript">
      google.charts.load('current', {'packages':['line']});
      google.charts.setOnLoadCallback(drawChart1);

    function drawChart1() {

      var data = new google.visualization.DataTable();
      data.addColumn('string', 'month');
      data.addColumn('number', 'Confirmed');
      data.addColumn('number', 'Recovered');
      data.addColumn('number', 'Deaths');

      data.addRows([
            <?php
              $i=0;
            for ($i=2; $i <$count ; $i++) {
              if (substr_count($data["cases_time_series"][$i]["date"], $mo1)>0) {
                $co=$data["cases_time_series"][$i-1]["totalconfirmed"];
                $re=$data["cases_time_series"][$i-1]["totalrecovered"];
                $de=$data["cases_time_series"][$i-1]["totaldeceased"];
                  echo "['',$co,$re,$de],";  
              }
              
            } 

            if (substr_count($data["cases_time_series"][$i-1]["date"], $mo1)>0) {
               
                $co1=$data["cases_time_series"][$i-1]["totalconfirmed"];
                $re1=$data["cases_time_series"][$i-1]["totalrecovered"];
                $de1=$data["cases_time_series"][$i-1]["totaldeceased"];
                echo "['',$co1,$re1,$de1],";
            }          
          ?>
      ]);

      var options = {
        colors: ["red","green","orange"],
        curveType: 'function',
        axes: {
          x: {
            0: {side: 'top', label: '<?php echo $mo1; ?>'}
          }
        },
        backgroundColor: {
            fill: "#DFEFF0"
          } 
      };

      var chart = new google.charts.Line(document.getElementById('month'));

      chart.draw(data, google.charts.Line.convertOptions(options));
    }
     $(window).resize(function(){
      drawChart1();
    }); 
  </script>

  <!-- WEEK DATA-->
  <script type="text/javascript">
      google.charts.load('current', {'packages':['line']});
      google.charts.setOnLoadCallback(drawChart2);

    function drawChart2() {

      var data = new google.visualization.DataTable();
      data.addColumn('string', 'date');
      data.addColumn('number', 'Confirmed');
      data.addColumn('number', 'Recovered');
      data.addColumn('number', 'Deaths');

      data.addRows([
            <?php
              $var=$count-6;
            for ($i=$var; $i <$count ; $i++) {
              if (substr_count($data["cases_time_series"][$i]["date"], $mo1)>0) {
                $co=$data["cases_time_series"][$i-1]["totalconfirmed"];
                $re=$data["cases_time_series"][$i-1]["totalrecovered"];
                $de=$data["cases_time_series"][$i-1]["totaldeceased"];
                  echo "['".$data["cases_time_series"][$i-1]["date"]."',$co,$re,$de],";  
              }
              
            } 

            if (substr_count($data["cases_time_series"][$i-1]["date"], $mo1)>0) {
               
                $co1=$data["cases_time_series"][$i-1]["totalconfirmed"];
                $re1=$data["cases_time_series"][$i-1]["totalrecovered"];
                $de1=$data["cases_time_series"][$i-1]["totaldeceased"];
                echo "['".$data["cases_time_series"][$i-1]["date"]."',$co1,$re1,$de1],";
            }          
          ?>
      ]);

      var options = {
        chartArea: {width: '100%'},
        colors: ["red","green","orange"],
        curveType: 'function',
        axes: {
          x: {
            0: {side: 'top'}
          }
        },
        backgroundColor: {
            fill: "#DFEFF0"
          } 
      };

      var chart = new google.charts.Line(document.getElementById('week'));

      chart.draw(data, google.charts.Line.convertOptions(options));
    }
     $(window).resize(function(){
      drawChart2();
    }); 
  </script>
</head>
<body style="background-color: #ECECEC">
    <h3 style="color: red; text-align: center;">CASES TIME SERIES</h3>
    <section class="content">
      <div class="row">
        <div class="col-md-6">
      <div class="card shadow rounded" style="background-color: #DFEFF0 ;">
        <div class="card-header">ALL TIME CASES DATA</div>
        <div class="card-body">
           <div style="background-color: #DFEFF0 ;"><div id="monthsgrp"></div></div>
        </div>
      </div>
    </div>
    <div class="col-md-6">
      <div class="card shadow rounded" style="background-color: #DFEFF0 ;">
        <div class="card-header">MONTHLY CASES</div>
        <div class="card-body">
           <div style="background-color: #DFEFF0 ;"><div id="month"></div></div>
        </div>
      </div>
    </div>
    <div class="col">
      <div class="card shadow rounded" style="background-color: #DFEFF0 ;">
        <div class="card-header">WEEKLY DATA</div>
        <div class="card-body">
           <div style="background-color: #DFEFF0 ;"><div id="week"></div></div>
        </div>
      </div>
    </div>
    </section>
</body>
</html>
