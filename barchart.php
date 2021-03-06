<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/adminlte.min.css">
    <!-- Google Font: Source Sans Pro -->
    <style type="text/css">
      tr:hover {background-color:#808080;}
    </style>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script>
    $(tooltipdemo).ready(function(){
      $('[data-toggle="tooltip"]').tooltip();   
    });
  </script>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['bar']});
      google.charts.setOnLoadCallback(drawStuff);

      function drawStuff() {
        var data = new google.visualization.arrayToDataTable([
          ['States', 'Total-Cases'],

          <?php
            $data= file_get_contents("https://api.covid19india.org/data.json");
            $data=json_decode($data,true);
            $val=count($data["statewise"]);
            $avg = ($data["statewise"][0]["confirmed"]/$val);
            for ($i=1; $i < count($data["statewise"]) ; $i++) { 
              if ($data["statewise"][$i]["confirmed"]>$avg) {
                $var=intval($data["statewise"][$i]["confirmed"]);
             echo "['".$data["statewise"][$i]["state"]."', $var],";

              }  
            }
          ?>
        ]);

        var options = {
          
          legend: { position: 'none' },
          axes: {
            x: {
              0: { side: 'bottom' } // Top x-axis.
            }
          },
          bar: { groupWidth: "30%" },
          colors:['#8C001A','#ACD1E9'],
         backgroundColor: {
          fill: "#DFEFF0"
         },
         bars: 'horizontal'
        };

        var chart = new google.charts.Bar(document.getElementById('top_x_div'));
        // Convert the Classic options to Material options.
        chart.draw(data,google.charts.Bar.convertOptions(options));
      };

      $(window).resize(function(){
      drawStuff();
    }); 
    </script>
  </head>
  <body style="background-color: #ECECEC">

    
    <section class="content">
      <h3 style="color: red; text-align: center;">MAJOR HOTSPOT STATES AND CITIES</h3><br>
      <div class="card w-100 p-3 shadow rounded" style="background-color: #DFEFF0 ;">
        <div class="card-header">HOTSPOT STATES</div>
        <div class="card-body">
           <div style="background-color: #DFEFF0 ;"><div id="top_x_div"></div></div>
        </div>
      </div>

            
            <br><br>
          </section>

          <div class="card" style="background-color: #DFEFF0 ; box-shadow: 10px 10px 5px grey;">
            <div class="card-header">HOTSPOT CITIES</div>
            <div class="card-body">
          <div class="table-responsive">
              <table class='table table-bordered table-striped'>
                      <thead>                  
                      <tr>
                        <th>City</th>
                        <th>State</th>
                        <th>Total</th>
                        
                      </tr>
                      </thead> <tbody>
          <?php
                $data1= file_get_contents("https://api.covid19india.org/state_district_wise.json");
                $data1=json_decode($data1,true);
                $str="";
                $data= file_get_contents("https://api.covid19india.org/data.json");
            $data=json_decode($data,true);
            $max= [];
            $val=count($data["statewise"]);
            $avg = ($data["statewise"][0]["confirmed"]/$val);
            for ($i=1; $i < count($data["statewise"]) ; $i++) { 
              if ($data["statewise"][$i]["confirmed"]>$avg) {
                 array_push($max,$data["statewise"][$i]["state"]);
              }  
            }
                for ($i=0; $i <count($max) ; $i++) { 
                  $stname=$max[$i];
                  foreach ($data1[$stname]["districtData"] as $key => $value) {
                    if ($data1[$stname]["districtData"][$key]["confirmed"] > 500) {
                      if ($key=="Unknown") {
                        $str .= "<tr>
                                <td>".$key."<a href='#'' data-toggle='tooltip' title='Data Awaiting yet!''>
      <span class='ion-information-circled'></span>
    </a></td>
                                <td>".$stname."</td>
                                <td>".$data1[$stname]["districtData"][$key]["confirmed"]."</td></tr>";
                      }
                      else{
                      $str .= "<tr>
                                <td>".$key."</td>
                                <td>".$stname."</td>
                                <td>".$data1[$stname]["districtData"][$key]["confirmed"]."</td></tr>";}

                    }
                  }
                }
                $str .="</tbody></table>";
                echo $str;
            ?>
          </div>
        </div>
      </div>
    </div>
  </div>
    </section>
    
  </body>
</html>
