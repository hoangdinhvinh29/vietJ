<?php

	echo 'source = ' . $_POST['source'] . '<br>';
	echo 'destination = ' . $_POST['destination'] . '<br>';
	$KEY = 'AIzaSyDyqloXU6vMaa4e4nAAspVAnt6K4YkFYjA';
	$response = file_get_contents('https://maps.googleapis.com/maps/api/place/textsearch/json?query=' . $_POST['source'] . '&key=' . $KEY);
	$response = json_decode($response);
	$source = $response->results[0]->place_id;
	$response2 = file_get_contents('https://maps.googleapis.com/maps/api/place/textsearch/json?query='. $_POST['destination'] . '&key=' . $KEY);
	$response2 = json_decode($response2);
	$destination = $response2->results[0]->place_id;
	echo $source . '<br>';
	echo $destination . '<br>';
	$response3 = file_get_contents('https://maps.googleapis.com/maps/api/distancematrix/json?units=imperial&origins=' . $_POST['source'] .'&destinations=' . $_POST['destination'] .'&key=AIzaSyA-3JdguaZww3s-88uqTI9HbmCXDriIp0w');
	$response3 = json_decode($response3);
	$distance = $response3->rows[0]->elements[0]->distance->value;
	echo $distance/1000 . 'km' . '<br>';
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "demo";
	$con = mysqli_connect("localhost","root","","demo");
	// Check connection
	if (!$con)
  	{
  		die("Connection error: " . mysqli_connect_errno());
  	}
	$sql= "SELECT * FROM type_to_oil
		INNER JOIN typeofvehicle ON type_to_oil.type_id = typeofvehicle.type_id
        INNER JOIN oil ON type_to_oil.oil_id = oil.oid_id
        WHERE typeofvehicle.vehicle = '" . $_POST['vehicle'] ."'";
	$result = mysqli_query($con,$sql);
	$row = mysqli_fetch_assoc($result);
	//var_dump($result);
	//var_dump($row);
	// var_dump($_POST['source']);
	// var_dump($_POST['destination']);
	echo "lit: " . $row['lit']*$distance/1000;
?>
<!DOCTYPE html>
<html>
<head>
</head>
<body>
	<iframe
	  width="600"
	  height="450"
	  frameborder="0" style="border:0"
	  src="https://www.google.com/maps/embed/v1/directions?key=AIzaSyBsAtReSNkDc60x9ESWTaaMGR4-gle7GOw&origin=place_id:<?php echo $source ?>&destination=place_id:<?php echo $destination ?>" allowfullscreen id="iframe">
	</iframe>
	</body>
</html>
