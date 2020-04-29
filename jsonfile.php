<?php
    $data= file_get_contents("https://api.covid19india.org/data.json");
    $data=json_decode($data,true);
    $val=count($data["statewise"]);

    $chart_data[] = ["states", "No. of  cases"];

    $avg = ($data["statewise"][0]["confirmed"]/$val);
    for ($i=1; $i < count($data["statewise"]) ; $i++) { 
      if ($data["statewise"][$i]["confirmed"]>$avg) {


        $var=intval($data["statewise"][$i]["confirmed"]);
     	
        $chart_data [] = [$data["statewise"][$i]["state"], $var];
      }  
    }
    echo json_encode($chart_data);
?>