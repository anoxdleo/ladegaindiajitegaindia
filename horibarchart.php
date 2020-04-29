<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>AdminLTE 3 | Simple Tables</title>
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
      google.charts.load('current', {'packages':['bar']});
      google.charts.setOnLoadCallback(drawStuff);

      function drawStuff() {
        var data = new google.visualization.arrayToDataTable([
          ['country', 'cases'],
          <?php
            $data= file_get_contents("https://api.thevirustracker.com/free-api?countryTotals=ALL%27");
            $data=json_decode($data,true);
            $val=count($data["countryitems"][0]);
            for ($i=1; $i < $val ; $i++) { 
                $var=intval($data["countryitems"][0]["$i"]["total_cases"]);
                if ($var>5000) {
                   echo "['".$data["countryitems"][0]["$i"]["title"]."', $var],";

                }
                
            }
?>
        ]);

        var options = {
          chart: {
            title: "COVID-19 COUNTRIES STATS"
          },
          legend: { position: 'none' },
          colors: ['#8C001A'],
          bars: 'horizontal', // Required for Material Bar Charts.
          axes: {
            x: {
              0: { side: 'top' } // Top x-axis.
            }
          },
          bar: { groupWidth: "50%" },
          backgroundColor: {
            fill: "#DFEFF0"
          }
        };

        var chart = new google.charts.Bar(document.getElementById('countrydata'));
        chart.draw(data, google.charts.Bar.convertOptions(options));
      };

       $(window).resize(function(){
      drawStuff();
    }); 
    </script>
  </head>
  <body style="background-color: #ECECEC">
    <h1 style="color: red; text-align: center;">GLOBALLY COUNTRIES DATA</h1><br>
    <section class="content">
      <div class="row">
          <div class="col-lg-3 col-6">
            <div class="card bg-gradient-danger">
              <div class="card-header">
                <h5 class="card-title">GLOBAL TOTAL CONFIRMED</h5>
              </div>
              <div class="card-body">
                <?php
                    $gdata=file_get_contents("https://api.covid19api.com/summary");
                    $gdata=json_decode($gdata, true);
                    $trec=$gdata["Global"]["TotalRecovered"];
                    $tde=$gdata["Global"]["TotalDeaths"];
                    $nco=$gdata["Global"]["NewConfirmed"];
                    $nre=$gdata["Global"]["NewRecovered"];
                    $nde=$gdata["Global"]["NewDeaths"];
                    echo $gdata["Global"]["TotalConfirmed"];
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
                <h3 class="card-title">GLOBAL TOTAL RECOVERED</h3>

              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <?php echo $trec; ?>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
          <div class="col-lg-3 col-6">
            <div class="card bg-gradient-warning">
              <div class="card-header">
                <h3 class="card-title">GLOBAL TOTAL DEATHS</h3>     
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <?php echo $tde; ?>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
          <div class="col-lg-3 col-6">
            <div class="card bg-gradient-danger">
              <div class="card-header">
                <h3 class="card-title">GLOBAL TODAYS' CONFIRMED</h3>
              </div>
              <div class="card-body">
                <?php echo $nco; ?>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <div class="row">
          <div class="">
            
          </div>
          <!-- /.col -->
          <div class="col-lg-3 col-6">
            <div class="card bg-gradient-success">
              <div class="card-header">
                <h3 class="card-title">GLOBAL TODAYS' RECOVERED</h3>

              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <?php echo $nre; ?>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
          <div class="col-lg-3 col-6">
            <div class="card bg-gradient-warning">
              <div class="card-header">
                <h3 class="card-title">GLOBAL TODAYS' DEATHS</h3>     
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <?php echo $nde; ?>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
          <div class="col-lg-3 col-6">
            
        </div>
    </section>
      <div class="card shadow rounded" style="background-color: #DFEFF0 ;">
        <div class="card-header">COUNTRIES STATS</div>
        <div class="card-body">
           <div style="background-color: #DFEFF0 ; height: 600px;" id="countrydata"></div>
        </div>
      </div>
  </body>
</html>