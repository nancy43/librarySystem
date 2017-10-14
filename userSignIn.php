<?php
session_start();
require "database.php";
require "books.php";
require "student.php";
if(isset($_SESSION['login_user'])){
	header("location: userIndex.php");
	exit();
}

$databaseConnection = new DatabaseConnection;
$book = new Books;


include("connection.php");



$user_name = $password = "";

if($_SERVER["REQUEST_METHOD"] == "POST")
{

	$user_name=$_POST['userName'];
	$password=$_POST['password'];

	$sql = "SELECT * FROM LibraryUSer WHERE loginId = '$user_name' and password = '$password'";
	$result = mysqli_query($conn, $sql);
	
	if(mysqli_num_rows($result) >= 1) {
		$_SESSION['login_user']= $user_name;
		header("location: userIndex.php");
		exit();
	 }else {
		echo "<script>
        alert('Your Login Name or Password is invalid');
        
        </script>";
		$error = "Your Login Name or Password is invalid";
	 }
  }

?>


<html>
<head>
    <meta charset="UTF-8">
	
	<title>Library Management System</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style type = "text/css">
      body {
         font-family:Arial, Helvetica, sans-serif;
         font-size:14px;
         color:white;
         background-image:url("banner.png")
      }
 
      .box {
         border:#666666 solid 1px;
       
      }
   </style>
</head>
<body >
<body bgcolor = "#FFFFFF">

  <div align = "center" style="margin:10%;">
 
     <div style = "width:300px; border: solid 1px #333333;background:grey; " align = "left">
        <div style = "background-color:#333333; color:#FFFFFF; padding:3px;height:30px;text-align:center;"><b>LIBRARY MANAGEMENT SYSTEM</b></div>
            
        <div style = "margin:30px">
								<h2>Login to User Account</h2>
								
							
								<form class="form-common" action="" method="post">
									
											<input type="email" class="form-control" name="userName"  placeholder="Email Address">
									<br><br>
											<input type="password" class="form-control" name="password"  placeholder="Password">
                                            <br><br>
                                            <input type="submit" style="width:100%;background-color: black; height:30px;   border: none;
                                            color: white;padding: 1%;" value="Login" name="login">
                                           
										
								</form>
							
									
                                <p>Don't have an account? <a href="userSignUp.php">Sign Up Here</a></p>							
    </div>
    </div>
    
    </div>

</body>

</html>
