<?php

  $arr=[];
  for ($i=0; $i <3 ; $i++) { 
    $str="ahmedabad";
    $str1="raja";
    if(in_array($str, $arr))
    {
      continue;  
    }
    else
    {
      array_push($arr, $str,$str1);
    }
  }
  print_r($arr);
?>