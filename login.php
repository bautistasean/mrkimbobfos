<!DOCTYPE html>  
<html>
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Mr. Kimbob - Login</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300&family=Ubuntu:wght@300&display=swap" rel="stylesheet">
  <link rel = "stylesheet" type = "text/css" href = "login.css">
</head>
<body>
<div class="panel"></div>
	<img src="kimbobfood.jpg" alt="Mr.Kimbob" width="10" height="10" id ="picleft"/>
	<br>
	<img src="kimbobpic-horizontal.jpg" alt="Mr.Kimbob" width="450" height="150" align = "center"/>
        <br><br>
		<div class="login"> 
		<form method = "POST">
		<?php if(isset($_GET['error'])){
			echo '<script>alert($_GET["error"])</script>';
		}?>
        <h1 class="title"><b>L o g i n</b></h1>
        <p id="usernameLabel"><b>Username</b></p>    
        <input type="text" name="username" id="username" placeholder="Enter your username...">      
        <p id="passwordLabel"><b>Password</b></p>   
        <input type="password" name="password" id="password" placeholder="Enter your password...">    
        <br><br>    
        <input type="submit" name="submit" id="submit" value="Continue →">
        <br><br><br><br>    
		</form></div><br><br><br><br>
<div class="panel"></div>
</body>	
</html>
			<?php
include 'db_connection.php';
if(isset($_POST['submit'])){
	$username = mysqli_real_escape_string($conn, $_POST['username']);
	$password = mysqli_real_escape_string($conn, $_POST['password']);
$sql = "SELECT * FROM tbl_acc WHERE username = '$username' AND password = '$password' AND status = 'admin'";
$result = mysqli_query($conn, $sql);
	if(mysqli_num_rows($result)=== 1){
		$row = mysqli_fetch_assoc($result);
		if($row['username']===$username && $row['password']===$password && $row['status']==='admin'){
			header("Location: homeadmin.php");
			echo "successful";
		}
		else 
		{
			header("Location: login.php?error=Username or Password is incorrect");
		}
	}
	else {header("Location: login.php?error=Username or Password is incorrect");
	
	exit();
	}
}

?> 