<?php

  $url = file_get_contents("https://api.covid19india.org/data.json");
  $data = json_decode($url,true);
  $conform = $data['statewise'][19]['confirmed'];
  $active = $data['statewise'][19]['active'];
  $death = $data['statewise'][19]['deaths'];
  $recovered = $data['statewise'][19]['recovered'];
  $ltime = $data['statewise'][19]['lastupdatedtime']

?>
<html>
<head>
  
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>COVID19 | JHARKHAND </title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Font Awesome -->
  <link rel="stylesheet" href=".././plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href=".././dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body style="background-color: #ECECEC">

  <h1 style="color: red; text-align: center;">CURRENT JHARKHAND STATE COVID-19 CASES DATA</h1>
  <div class="content" style="background-color: #ECECEC">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        
      </div><!-- /.container-fluid -->
    </section>
    <?php
        $data= file_get_contents("https://api.covid19india.org/data.json");
        $data= json_decode($data, true);

        $data1= file_get_contents("https://api.covid19india.org/state_district_wise.json");
        $data1=json_decode($data1,true);

        $sum_co=0;
        $sum_re=0;
        $sum_de=0;
        for ($i=1; $i < count($data["statewise"]) ; $i++) { 
            $state=$data["statewise"][$i]["state"];
           if ($state=="Jharkhand")
           {
             $sum_co =$sum_co + $data["statewise"][$i]["deltaconfirmed"];
             $sum_re =$sum_re + $data["statewise"][$i]["deltarecovered"];
             $sum_de =$sum_de + $data["statewise"][$i]["deltadeaths"];
           }
        }
        //print_r($state);
        $str=" <section class='content'>
      <div class='container-fluid'>
        <div class='row'>
          <div class='col-md-6' >
            <div class='card'>
              <div class='card-header'>
                <h3 class='card-title'>Cities of Jharkhand [ Last Updated Time : $ltime ]</h3>
              </div>
              <!-- /.card-header -->
              <div class='card-body table-responsive' style=''>
                <table class='table table-bordered'>
                  <thead>                  
                    <tr>
                      <th>City Name</th>
                      <th>Confirmed</th>
                      <th>Active</th>
                      <th>Recovered</th>
                      <th>Death</th>
                    </tr>
                  </thead> <tbody>";
        foreach ($data1["Jharkhand"]["districtData"] as $key => $value) {
           $str .= " <tr>
                      <td>" .$key."</td>
                      <td>".$data1["Jharkhand"]["districtData"][$key]["confirmed"]."</td>
                      <td>".$data1["Jharkhand"]["districtData"][$key]["active"]."</td>
                      <td>".$data1["Jharkhand"]["districtData"][$key]["recovered"]."</td>
                      <td>".$data1["Jharkhand"]["districtData"][$key]["deceased"]."</td>
                    </tr>";
        }
        $str .= "</tbody>
                </table>
              </div>";
  //print_r($area);
              echo "$str";
    ?>
    <!-- Main content -->
            
            </div>
                                 
              <!-- /.card-body -->
              
            <!-- /.card -->

            <div class="card">
              
              <!-- /.card-header -->
              <div class="card-body p-0">
                
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>

          <!-- /.col -->
          <div class="col-md-6" >
            
            <section class="content">
              <div class="row no-gutters">
                <div class="col-md-6 no-gutters">
              <div class="card-header" >
                <div class="col">
                      <div class="card bg-danger">
                        <div class="card-header">
                        <h3 class="card-title">Today's Total Confirm Cases</h3>
              </div>
              <div class="card-body">
               <?php echo $sum_co; ?>
              </div>

              <!-- /.card-body -->
            </div>

            <!-- /.card -->
          </div>
        </div>
      </div>
      <div class="col-md-6 no-gutters">
              <div class="card-header" >
                <div class="col">
                      <div class="card bg-danger">
                        <div class="card-header">
                        <h3 class="card-title">Total Confirm Cases</h3>
              </div>
              <div class="card-body">
               <?php echo $conform; ?>
              </div>

              <!-- /.card-body -->
            </div>

            <!-- /.card -->
          </div>
                
          </div>
        </div>
      </div>
    </section>
              <section class="content">
                <div class="row no-gutters">
                  <div class="col-md-6 no-gutters">
                  <div class="card-header" >
                      <div class="col">
                        <div class="card bg-success">
                          <div class="card-header">
                          <h3 class="card-title">Today's Total Recovered Cases</h3>
              </div>
              <div class="card-body">
               <?php echo $sum_re; ?>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
                
              </div></div>
              <div class="col-md-6 no-gutters">
                  <div class="card-header" >
                      <div class="col">
                        <div class="card bg-success">
                          <div class="card-header">
                          <h3 class="card-title">Total Recovered Cases</h3>
              </div>
              <div class="card-body">
               <?php echo $recovered; ?>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
                
              </div></div></div></section>
         
              <section class="content">
                <div class="row no-gutters">
                  <div class="col-md-6 no-gutters">
                      <div class="card-header" >
                          <div class="col" >
                              <div class="card bg-primary">
                                    <div class="card-header" >
                                        <h3 class="card-title">Today's Total Death Cases</h3>
                                    </div>
                                    <div class="card-body">
                                     <?php echo $sum_de; ?>
                                    </div>
              <!-- /.card-body -->
                              </div>
            <!-- /.card -->
                          </div>
                
                      </div>
                    
                  </div>
                  <div class="col-md-6 no-gutters">
                      <div class="card-header" >
                          <div class="col" >
                              <div class="card bg-primary">
                                    <div class="card-header" >
                                        <h3 class="card-title">Total Death Cases</h3>
                                    </div>
                                    <div class="card-body">
                                     <?php echo $death; ?>
                                    </div>
              <!-- /.card-body -->
                              </div>
            <!-- /.card -->
                          </div>
                
                      </div>
                    
                  </div>
                </div>
              </section>
              <section class="content">
              <div class="row no-gutters">
               
      <div class="col-md-6 no-gutters">
              <div class="card-header" >
                <div class="col">
                      <div class="card bg-danger">
                        <div class="card-header">
                        <h3 class="card-title">Total Active Cases</h3>
              </div>
              <div class="card-body">
               <?php echo $active; ?>
              </div>

              <!-- /.card-body -->
            </div>

            <!-- /.card -->
          </div>
                
          </div>
        </div>
      </div>
    </section>

                
              

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
<!-- ./wrapper -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
</body>
</html>
