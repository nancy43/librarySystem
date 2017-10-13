<?php
include("connection.php");

//getting id of the data from url
$book_id = $_GET['book_id'];

//deleting the row from table
$result = mysqli_query($conn, "DELETE FROM employee WHERE book_id=$book_id");

//redirecting to the display page (index.php in our case)
header("Location:home.php");
?>

