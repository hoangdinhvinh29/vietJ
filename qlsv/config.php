<?php
$servername = "localhost";
$username = "root";
$password= "";
$dbname ="qlsv_db";
$db = mysqli_connect("localhost","root","","qlsv_db");
if (!$db)
  	{
  		die("Connection error: " . mysqli_connect_errno());
  	}
?>