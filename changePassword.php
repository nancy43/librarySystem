<?php
require "Database.php";
require "books.php";
require "student.php";
include "session.php";

$numOfBooksRent1 = $name = "";

$databaseConnection = new DatabaseConnection;
$student = new Students;

include("connection.php");

$currentPassword=$newPassword =$reTypePassword ="";
$valid = true;
$passwordFromDB = "";

$sql1 = "Select name,numOfBooksRent FROM Student where email='$login_session'";
$result1 = mysqli_query($conn, $sql1);

if(mysqli_num_rows($result1) > 0) {
	while($row=mysqli_fetch_assoc($result1)){
		$numOfBooksRent1 = $row['numOfBooksRent'];
		$name = $row['name'];
	}
}
if($_SERVER["REQUEST_METHOD"] == "POST"){
	if(isset($_POST["currentPassword"])){
		$currentPassword = $_POST["currentPassword"];
		$sql = "Select password from LibraryUSer where loginId = '$login_session'";
		$result = mysqli_query($conn, $sql);
		if(mysqli_num_rows($result) > 0) {
			while($row=mysqli_fetch_assoc($result)){
				$passwordFromDB = $row['password'];
			}
		}
		if($passwordFromDB == $currentPassword){
			if(isset($_POST["newPassword"])){
				$newPassword = $_POST["newPassword"];
				
			}
			if(empty($_POST["newPassword"])){
				//$errName="Please enter name";
				$valid = false;
			}
			if(isset($_POST["reTypePassword"])){
				$reTypePassword = $_POST["reTypePassword"];
				
			}
			if(empty($_POST["reTypePassword"])){
				//$errName="Please enter name";
				$valid = false;
			}
			if ($_POST["newPassword"] === $_POST["reTypePassword"]) {
				
			}
			 else {
				$valid = false;
				echo "<script>
				alert('Password and Confirm Password does not match');
				window.location.href='changePassword.php';
				</script>";
			 }
		}else{
			$valid = false;
			echo "<script>
			alert('Password Does not match with Data');
			window.location.href='changePassword.php';
			</script>";
		}
	}
	if(empty($_POST["currentPassword"])){
		//$errName="Please enter name";
		$valid = false;
	}

	if($valid){
		$student->changePassword($newPassword,$login_session);
		echo "<script>
		alert('Password Changed Succesfully');
		window.location.href='userIndex.php';
		</script>";
	}
}
?>

<html>
<head>
<style>
ul {
list-style-type: none;
margin: 0;
padding: 0;
overflow: hidden;
background-color: #333;
}

li {
float: left;
}

li a, .dropbtn {
display: inline-block;
color: white;
text-align: center;
padding: 14px 16px;
text-decoration: none;
}

li a:hover, .dropdown:hover .dropbtn {
background-color: red;
}

li.dropdown {
display: inline-block;
}

.dropdown-content {
display: none;
position: absolute;
background-color: #f9f9f9;
min-width: 160px;
box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
z-index: 1;
}

.dropdown-content a {
color: black;
padding: 12px 16px;
text-decoration: none;
display: block;
text-align: left;
}

.dropdown-content a:hover {background-color: #f1f1f1}

.dropdown:hover .dropdown-content {
display: block;
}
table,th,td{
border: 0.5px solid black;
padding:1em;
}
#button{
    background-color: #4CAF50;
    border: none;
    color: white;
    padding: 15px 32px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
    margin: 4px 2px;
    cursor: pointer;

}
</style>
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
</head>
<body>
<h1>Library System</h1>
        
                    <h1>Welcome</h1>
                    <h2><?php echo $name?></h2>
                    <ul>
<li><a href="userIndex.php">Home</a></li>
<li class="dropdown">
<a href="javascript:void(0)" class="dropbtn">Books</a>
<div class="dropdown-content">
  <a href="userRentBook.php">Rent  Book</a>
  <a href="userReturnBook.php">Return Book</a>
  
  
</div>
</li>
<li class="dropdown">
<a href="javascript:void(0)" class="dropbtn">Profile</a>
<div class="dropdown-content">
  <a href="userProfile.php">User Profile</a>
  <a href="changePassword.php">Change Password</a>
  
  
</div>
</li>
<li><a href="logOut.php">LogOut</a></li>

</ul>
<div align = "center" style="margin:2%;">

     <div style = "width:500px; " align = "left">
        <div style = "background-color:#333333; color:#FFFFFF; padding:3px;height:30px;text-align:center;float:left;"><b>Change Password</b>
            
        <div style = "margin:30px;border:2px solid black; ">
	
                               
                                    <form  action="" method="post">
                                            
                        <input class="w3-input w3-border w3-round" type="password"  name="currentPassword"  placeholder="Current Password">
                                           
                                                        <input class="w3-input w3-border w3-round" type="password"  name="newPassword"  placeholder=New "Passwoed">
                                            
                                                        <input class="w3-input w3-border w3-round" type="password"  name="reTypePassword"  placeholder="ReType Passwoed">
                                                   
                                           <br>  <br>
											
											<input type="submit"  value="Submit" name="submit" id="button">
											<input type="submit"  value="Cancel" name="cancel" id="button">
										</div>
                                    </form>
                                    <div>
</div>
</div>
                          
</body>

</html>
