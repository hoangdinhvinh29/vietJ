<!DOCTYPE html>
<html>
<head>
	<title>login</title>
     <meta charset="utf-8">
     <meta name="viewport" content="width=device-width, initial-scale=1">
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
     <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
<?php
   include("config.php");
   session_start();
   
   if($_SERVER["REQUEST_METHOD"] == "POST") {
      // username and password sent from form 
      
      $myusername = mysqli_real_escape_string($db,$_POST['username']);
      $mypassword = mysqli_real_escape_string($db,$_POST['password']); 
      
      $sql = "SELECT * FROM student WHERE username = '$myusername' and password = '$mypassword'";
      $result = mysqli_query($db,$sql);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      // $active = $row['active'];
      
      $count = mysqli_num_rows($result);
      
      // If result matched $myusername and $mypassword, table row must be 1 row
		
      if($count == 1) {
         // session_register("$myusername");
         $_SESSION['login_user'] = $myusername;
         
         header("location: qlsvdbconnect.php");
      } else {
         Echo  "Your Login Name or Password is invalid";
      }
   }
?>
<form action = "" method = "post">
   <label>UserName  </label><input type = "text" name = "username"  placeholder="username" class = "box"/><br /><br />
   <label>Password  </label><input type = "password" name = "password"  placeholder="password" class = "box" /><br/><br />
   <input type = "submit" value = " login " name = "Login" class="btn btn-info btn-lg"/><br />
</form>       

</body>
</html>