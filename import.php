
<?php

if(isset($_POST['btnImport'])){

$db = new mysqli('localhost','','','') or die("Konekcija neuspjela");

if (($handle = fopen("GeoLiteCity-Location.csv", "r")) !== FALSE) {
	fgetcsv($handle);
    while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
        
    	$qt = "INSERT INTO city(locId,country,region,city,postalCode,latitude,longitude,metroCode,areaCode) VALUES (?,?,?,?,?,?,?,?,?);";
    	$res = $db->prepare($qt);

    	if(!$res){ 
    	echo "Krivi podaci za insert!!!!"; 
    	return;
    	}

    	$res->bind_param('issssddii',$data[0],$data[1],$data[2],$data[3],$data[4],$data[5],$data[6],$data[7],$data[8]);
		$res->execute();
        unset($data);
    }
    fclose($handle);

    echo "Podaci uneseni u bazu!";

    $db->close();
}

}
?>
