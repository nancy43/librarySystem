
<?php
include("connection.php"); 


session_start();
$user_check=$_SESSION['login_user'];


$sql=mysqli_query($conn,"select loginId from LibraryUSer where loginId='$user_check'");
$row = mysqli_fetch_assoc($sql);
$login_session =$row['loginId'];

if(!isset($user_check)){

header('Location: userIndex.php'); // Redirecting To Home Page
}
?>