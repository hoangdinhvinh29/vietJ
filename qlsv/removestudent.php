<!DOCTYPE html>
<html>
<head>
	<title></title>
	
</head>
<body>
<?php
include('session.php');
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
$sql="DELETE FROM `student` WHERE `student_id`  = '". $_POST ['id']. "' ";
if ($con->query($sql) === TRUE) {
    echo "Record deleted successfully";
} else {
    echo "Error deleting record: " . $con->error;
}
?>
<form method="POST" action="qlsvdbconnect.php" >
	<input type="submit" name="" value="Return">
</form>
</body>
</html>