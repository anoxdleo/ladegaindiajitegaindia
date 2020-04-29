
<?php 
		
	if (isset($_POST["sid"]) && !empty($_POST["sid"])) {
		$data= file_get_contents("https://api.covid19india.org/resources/resources.json");
        $data= json_decode($data, true);
        $st=$_POST["sid"];
        $st_t=strval($st);
        $arr=[];
		$c=count($data["resources"]);
		 for ($i=0; $i <$c ; $i++) { 
		 	$s= $data["resources"][$i]["state"];
		 	$var=$data["resources"][$i]["city"];
		 	if(in_array($var, $arr))
		    {
		      continue;  
		    }
		    else
		    {
		      if (substr_count($s, $st_t)>0) {
		 		array_push($arr, $var);
		 		echo "<option value=".$var.">".$var."</option>";
		 	  }
		 	
		    }
		 	
		}
	}
	
?>