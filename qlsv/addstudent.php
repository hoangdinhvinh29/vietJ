<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<?php
$servername = "localhost";
$username = "root";
$password= "";
$dbname ="qlsv_db";
$con = mysqli_connect("localhost","root","","qlsv_db");
if (!$con)
  	{
  		die("Connection error: " . mysqli_connect_errno());
  	}
else {
    echo "connect successfully".'<br>';
}

mysqli_select_db($con,"qlsv_db");
$sql="INSERT INTO `student`(`name`,`class`,`dateofbirth`,`mssv`) VALUES ('".$_POST['name']."','".$_POST['class']."','".$_POST['dateofbirth']."','".$_POST['mssv']."');" ;
if ($con->query($sql) === TRUE) {
    echo "Record insert successfully";	
} else {
    echo "Error inserting record: " . $con->error;
}
?>
<form method="POST" action="qlsvdbconnect.php" >
	<input type="submit" name="" value="Return">
</form>
</body>
</html>