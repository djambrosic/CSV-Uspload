<?php
	
	if(isset($_GET['q'])){

		$city = $_GET['q']."%";

		$db = new mysqli('localhost','','','') or die("Nesupjela konekcija!!!");

		$qt="SELECT * FROM `city` WHERE `city` LIKE ?;";

		$output = '<table border = 1>
					<th>LocID</th>
					<th>Country</th>
					<th>Region</th>
					<th>City</th>
					<th>Postal Code</th>
					<th>Latitude</th>
					<th>Logitude</th>
					<th>MetroCode</th>
					<th>AreaCode</th>';

		if($stmt = $db->prepare($qt))
		{
			$stmt->bind_param("s",$city);
			$stmt->bind_result($id,$locId, $country, $region, $city, $postalCode, $latitude, $longitude, $metroCode, $areaCode);
			$stmt->execute();

			while($stmt->fetch()){
				$output .= '<tr><td>'.$locId.'</td><td>'.$country.'</td><td>'.$region.'</td><td>'."$city".'</td><td>'.$postalCode.'</td><td>'.$latitude.'</td><td>'.$longitude.'</td><td>'.$metroCode.'</td><td>'.$areaCode.'</td></tr>';
			}
		}

		$output .= '</table>';
		$db->close();
		echo $output;
	}
?>