
<?php
  
  $data = file_get_contents("https://api.covid19india.org/state_test_data.json");
  $data=json_decode($data, true);

  $c=count($data["states_tested_data"]);
 // echo "$c";
  
?>

<!DOCTYPE html>
<html>
<head>
	<title> ALL STATES TESTING DATA</title>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <!-- Google Font: Source Sans Pro -->
    <style type="text/css">
      tr:hover {background-color:#808080;}
    </style>
    <script>
    $(tooltipdemo).ready(function(){
      $('[data-toggle="tooltip"]').tooltip();   
    });
  </script>
</head>
<body style="background-color: #ECECEC">
	
	<section class="content">
	<div class="card" style="background-color: #DFEFF0 ; box-shadow: 10px 10px 5px grey;">
            <div class="card-header"> DATA OF TESTS CONDUCTED STATEWISE  <span class="ion-information-circled" data-toggle="tooltip" title="For blank Columns data is Still awaiting" ></span></div>
            <div class="card-body">
          <div class="table-responsive">
          <?php
                $data1= file_get_contents("https://api.covid19india.org/state_district_wise.json");
                $data1=json_decode($data1,true);
                $str="<table class='table table-bordered'>
                      <thead>                  
                      <tr>
                        <th>State</th>
                        <th>Total Tests</th>
                        <th>Positive</th>
                        <th>Negative</th>
                        <th>Unconfirmed</th>
                        <th>Updated _Date</th>
                      </tr>
                      </thead> <tbody>";
                for ($i=0; $i <$c-1 ; $i++) { 
				    $cur= $data["states_tested_data"][$i]["state"];
				    $nxt =$data["states_tested_data"][$i+1]["state"];
				    if (strcmp($cur, $nxt)==0) {
				      
				    }
				    else{
				      
				      if (($data["states_tested_data"][$i]["totaltested"]==null) and ($data["states_tested_data"][$i]["positive"]==null) and ($data["states_tested_data"][$i]["negative"]==null) and ($data["states_tested_data"][$i]["unconfirmed"]==null)) {

				      

				      $str .= "<tr><td>".$data["states_tested_data"][$i-1]["state"]."</td>
				      <td>".$data["states_tested_data"][$i-1]["totaltested"]."</td>
				      <td>".$data["states_tested_data"][$i-1]["positive"]."</td>
				      <td>".$data["states_tested_data"][$i-1]["negative"]."</td>
				      <td>".$data["states_tested_data"][$i-1]["unconfirmed"]."</td>
				      <td>".$data["states_tested_data"][$i-1]["updatedon"]."</td></tr>";
				      }
				      elseif (($data["states_tested_data"][$i]["positive"]==null) and ($data["states_tested_data"][$i]["negative"]==null) and ($data["states_tested_data"][$i]["unconfirmed"]==null)) {

				         $str .= "<tr><td>".$data["states_tested_data"][$i-1]["state"]."</td>
				      <td>".$data["states_tested_data"][$i-1]["totaltested"]."</td>
				      <td>".$data["states_tested_data"][$i-1]["positive"]."</td>
				      <td>".$data["states_tested_data"][$i-1]["negative"]."</td>
				      <td>".$data["states_tested_data"][$i-1]["unconfirmed"]."</td>
				      <td>".$data["states_tested_data"][$i-1]["updatedon"]."</td></tr>";

				      }
				      else{
				        $str .= "<tr><td>".$data["states_tested_data"][$i]["state"]."</td>
				      <td>".$data["states_tested_data"][$i]["totaltested"]."</td>
				      <td>".$data["states_tested_data"][$i]["positive"]."</td>
				      <td>".$data["states_tested_data"][$i]["negative"]."</td>
				      <td>".$data["states_tested_data"][$i]["unconfirmed"]."</td>
				      <td>".$data["states_tested_data"][$i]["updatedon"]."</td></tr>";
				      }
				    }
				  }
				  $i=$c-1;
				  $str .= "<tr><td>".$data["states_tested_data"][$i]["state"]."</td>
				      <td>".$data["states_tested_data"][$i]["totaltested"]."</td>
				      <td>".$data["states_tested_data"][$i]["positive"]."</td>
				      <td>".$data["states_tested_data"][$i]["negative"]."</td>
				      <td>".$data["states_tested_data"][$i]["unconfirmed"]."</td>
				      <td>".$data["states_tested_data"][$i]["updatedon"]."</td></tr></tbody></table>";
				  echo $str;
            ?>
          </div>
      </div>
  </div>

</body>
</html>