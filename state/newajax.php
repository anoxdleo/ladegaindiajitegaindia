<?php
	if (isset($_POST["stname"]) && !empty($_POST["stname"])) {
		$data1= file_get_contents("https://api.covid19india.org/state_district_wise.json");
        $data1=json_decode($data1,true);
		$str=" <thead>                  
	            <tr>
	              <th>City Name</th>
	              <th>Confirmed</th>
	              <th>Recovered</th>
	              <th>Death</th>
	            </tr>
	          </thead> <tbody>";
	        $stname=$_POST["stname"];
			foreach ($data1[$stname]["districtData"] as $key => $value) {
           $str .= " <tr>
                      <td>" .$key."</td>
                      <td>".$data1[$stname]["districtData"][$key]["confirmed"]."</td>
                      <td>".$data1[$stname]["districtData"][$key]["recovered"]." 
                        
                      </td>
                      <td>".$data1[$stname]["districtData"][$key]["deceased"]."</td>
                    </tr>";
        		}
        		$str .= "</tbody>
                </table>
              </div>";
              echo "$str";
	}

?>