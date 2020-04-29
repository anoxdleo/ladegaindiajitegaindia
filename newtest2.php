<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" integrity="sha512-dTfge/zgoMYpP7QbHy4gWMEGsbsdZeCXz7irItjcC3sPUFtf0kuFbDz/ixG7ArTxmDjLXDmezHubeNikyKGVyQ==" crossorigin="anonymous">
    <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/adminlte.min.css">
    <link rel="stylesheet" type="text/css" href="homepage.css">
    <!-- Google Font: Source Sans Pro -->
    <style type="text/css">
      tr:hover {background-color:#808080;}
    </style>
	 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script type="text/javascript">
		$(document).ready(function(){
			$('#state').on('change',function(){
				var sid= $('#state').val();
				console.log(sid);
				$('#city').empty();
				if (sid) {
					$.ajax({
						type:'POST',
						url:'ajaxdata.php',
						data:'sid='+sid,
						success:function(html){
							$('#city').html(html);
						}
					});
				}else{
					$('#city').html('<option value="">Select state first</option>');
				}
			});
		});
	</script>
	
</head>
<body>
	<h3 style="color: red; text-align: center;">ESSENTIALS AND FACILITIES</h3><br>
	<section class="content">
		<form method="POST">
		<div class="row d-flex justify-content-center">
			<div class="cols-md-6">
			<div class="form-group ">
					<div class="cols-md-6">
				    <select id="state" name="state" class="form-control">
				    	<option selected="" disabled="">Select State</option>
				    	<?php 
				    		$data= file_get_contents("https://api.covid19india.org/resources/resources.json");
					        $data= json_decode($data, true);
							$c=count($data["resources"]);
								 for ($i=0; $i <$c-1 ; $i++) { 
											if (strcmp($data["resources"][$i]["state"], $data["resources"][$i+1]["state"])==0) {

											}
									      else
									      {
									        $var=$data["resources"][$i]["state"];
									        echo "<option value=".$var.">".$var."</option>";
									        
									      }
								}
								$var=$data["resources"][$i]["state"];
								echo "<option value=".$var.">".$var."</option>";
				    	 ?>
				    </select>
						</div>
				    
				</div>	
			</div>
				<div class="ml-4 cols-md-6">		
				<div class="form-group">
					<div class="cols-md-6">
					    <select name="city" id="city" class="form-control">
								<option value="">Select state first</option>
						</select>
					</div>
				</div>
			</div>
		</div>
		<div class="row d-flex justify-content-center">
			<div >
			<table class="cols-md-6"><tr><td><button type="submit" class="btn btn-block btn-primary btn-lg w3-btn hvr-pulse" name="submit">Submit
			</button></td></tr></table>
		</div>
	</div>
</form>
	</section><br><br>

</body>
</html>
<?php
	if (isset($_POST["submit"])) {
		$ct=$_POST["city"];
		$data= file_get_contents("https://api.covid19india.org/resources/resources.json");
        $data= json_decode($data, true);
        $str="";
        $c=count($data["resources"]);
        $str .= " <div class='card' style='background-color: #DFEFF0 ; box-shadow: 10px 10px 5px grey;'>
            
            <div class='card-body'>
          <div class='table-responsive'> <table class='table table-bordered'>
                      <thead>                  
                      <tr>
                        <th>City</th>
                        <th>Phone-No</th>
                        <th>Category</th>
                        <th>Name of organization</th>
                        
                      </tr>
                      </thead> <tbody>";
        for ($i=0; $i <$c ; $i++) { 
		 	if ($data["resources"][$i]["city"]==$ct) {
		 		
                $str .= "<tr>
                                <td>".$ct."</td>
                                <td>".$data["resources"][$i]["phonenumber"]."</td>
                                <td>".$data["resources"][$i]["category"]."</td>
                                <td>".$data["resources"][$i]["nameoftheorganisation"]."</td></tr>";

		 	}		 	
		}
		echo "$str";
	}
?>