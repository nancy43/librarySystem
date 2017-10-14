<?php
session_start();
require "Database.php";
require "books.php";

$databaseConnection = new DatabaseConnection;
$book = new Books;

include("connection.php");

$user_name = $password = "";

if($_SERVER["REQUEST_METHOD"] == "POST")
{
	
	$user_name=$_POST['userName'];
	$password=$_POST['password'];

	$sql = "SELECT * FROM Admin WHERE adminUserName = '$user_name' and password = '$password'";
	$result = mysqli_query($conn, $sql);
	
	if(mysqli_num_rows($result) >= 1) {
		//session_register("myusername");
		//$_SESSION['login_user'] = $myusername;

		$_SESSION['admin_User']= $user_name;		

		header("location: adminIndex.php");
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
         background-image:url("banner.png");
         color:white;
      }
 
      .box {
         border:#666666 solid 1px;
       
      }
   </style>
</head>
<body bgcolor = "#FFFFFF">

  <div align = "center" style="margin:10%;">
 
     <div style = "width:300px; border: solid 1px #333333;background:grey; " align = "left">
        <div style = "background-color:#333333; color:#FFFFFF; padding:3px;height:30px;text-align:center;"><b>LIBRARY MANAGEMENT SYSTEM</b></div>
            
        <div style = "margin:30px">
								<h2>Admin Sign In</h2>
				<form  action="" method="post">
											
                    <input type="text" name="userName"  placeholder="User Name" style="width:100%;" >
                    <br>
                    <br>
					<input type="password" name="password" placeholder="Password" style="width:100%;">
                    <br><br>
						<input type="submit" style="width:100%;background-color: black; height:30px;   border: none;
    color: white;padding: 1%;" value="Login" name="login">
   
</form>
</div>
    </div>
    </div>	
</body>


</html>
