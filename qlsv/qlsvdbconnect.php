<!DOCTYPE html>
<html>
<head>
	<title></title>
	 <meta charset="utf-8">
	 <meta name="viewport" content="width=device-width, initial-scale=1">
	 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	 <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<style>
	table {
	    width: 100%;
	    border-collapse: collapse;
	}
	table, td, th {
	    border: 1px solid black;
	    padding: 5px;
	}
	th {text-align: left;}
	</style>
</head>
<body>
<h2><a href = "logout.php">Sign Out</a></h2>
<?php
include('session.php');
echo 'Welcome  ' . $_SESSION['login_user'];
$servername = "localhost";
$username = "root";
$password= "";
$dbname ="qlsv_db";
$con = mysqli_connect("localhost","root","","qlsv_db");
if (!$con)
  	{
  		die("Connection error: " . mysqli_connect_errno());
  	}
mysqli_select_db($con,"qlsv_db");
$sql="SELECT * FROM student " ;
$result = mysqli_query($con,$sql);
echo "<table>
<tr>
<th>name</th>
<th>class</th>
<th>dateofbirth</th>
<th>mssv</th>
</tr>";
while($row = mysqli_fetch_array($result)){
	echo "<tr>";
    echo "<td>" . $row['name'] . "</td>";
    echo "<td>" . $row['class'] . "</td>";
    echo "<td>" . $row['dateofbirth'] . "</td>";
    echo "<td>" . $row['mssv'] . "</td>";
    echo "</tr>";
}
echo "</table>";
?>

	<div class="container">
  <!-- Trigger the modal with a button -->
  <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#DELETE">DELETE</button>

  <!-- Modal -->
  <div class="modal fade" id="DELETE" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">DELETE INFORMATION</h4>
        </div>
        <div class="modal-body">
         	<form action ="removestudent.php" method="POST" id = "id">
         		<select name="id" required>
         			<option selected disabled hidden>Choose here</option>
         			<?php 
						      $result = mysqli_query($con,$sql);
	         		    while ($row = mysqli_fetch_array($result)){
	         				echo '<option value="'. $row['student_id'] .'">'. $row['student_id']. ' - '. $row['name'] .'</option>';	
	         			  }	
         			?>
         		</select>
				<!-- <input type="text" name="name" placeholder="name" required> <br>
				<input type="number" name="class" placeholder="class" required >  <br>
				<input type="text" name="dateofbirth" placeholder="dateofbirth" required >  <br>
				<input type="number" name="mssv" placeholder = "mssv" required>  <br> -->
			      <input type="submit" name="submit" value="DELETE">	
			     </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>
  <div class="container">
  <!-- Trigger the modal with a button -->
  <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#INSERT">INSERT</button>

  <!-- Modal -->
  <div class="modal fade" id="INSERT" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">INSERT INFORMATION</h4>
        </div>
        <div class="modal-body">
         	<form action ="addstudent.php" method="POST" >
				<input type="text" name="name" placeholder="name" required> <br>
				<input type="number" name="class" placeholder="class" required >  <br>
				<input type="text" name="dateofbirth" placeholder="dateofbirth" required >  <br>
				<input type="number" name="mssv" placeholder = "mssv" required>  <br> -->
				<input type="submit" name="submit" value="INSERT">	
			</form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>
</body>
</html>
<?php mysqli_close($con); ?>