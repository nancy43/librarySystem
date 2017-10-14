<?php
require "database.php";
require "books.php";
include "session.php";

$numOfBooksRent1 = $name = $stdid= $transcationId = "";

$databaseConnection = new DatabaseConnection;
$book = new Books;

include("connection.php");


$sql = "SELECT * FROM Book";
$result = mysqli_query($conn, $sql);

$sql1 = "SELECT stdid,name,numOfBooksRent FROM Student where email='$login_session'";
$result1 = mysqli_query($conn, $sql1);

if(mysqli_num_rows($result1) > 0) {
	while($row=mysqli_fetch_assoc($result1)){
		$numOfBooksRent1 = $row['numOfBooksRent'];
		$name = $row['name'];
		$stdid = $row['stdid'];
	}
}

$returnDate = date("Y/m/d");

$sqlTranscation = "SELECT * from Transcation where stdid = $stdid AND returnDate = '0000-00-00'";
$resultTranscation = mysqli_query($conn, $sqlTranscation);

?> 
<?php

?>

<html>
<head>
    <meta charset="UTF-8">
	 
	<title>Library Management System</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	
	<!-- Vector-ammap CSS -->
	<link rel="stylesheet" href="assets/css/ammap.css">
	
    <link rel="stylesheet" href="css/app.css">
	
    <link rel="stylesheet" href="css/responsive.css">
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
.rent_Button {
	border: 1px solid #0066cc;
	background-color: #0099cc;
	color: #ffffff;
	padding: 5px 10px;
  }
  
  .rent_Button:hover {
	border: 1px solid #0099cc;
	background-color: #00aacc;
	color: #ffffff;
	padding: 5px 10px;
  }
  
  .rent_Button:disabled,
  .rent_Button[disabled]{
	border: 1px solid #999999;
	background-color: #cccccc;
	color: #666666;
  }
  
</style>

	<style type="text/css">
.rent_Button {
	border: 1px solid #0066cc;
	background-color: #0099cc;
	color: #ffffff;
	padding: 5px 10px;
  }
  
  .rent_Button:hover {
	border: 1px solid #0099cc;
	background-color: #00aacc;
	color: #ffffff;
	padding: 5px 10px;
  }
  
  .rent_Button:disabled,
  .rent_Button[disabled]{
	border: 1px solid #999999;
	background-color: #cccccc;
	color: #666666;
  }
  
</style>	
</head>
<body >
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
                                                    <table>
                                                        <thead>
                                                            <tr>
                                                                <th>Book ID</th>
																<th>Book Name</th>
                                                                <th>Student ID</th>
                                                                <th>Issue Date</th>
                                                                <th>Due Date</th>
																<th>Return Book</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
														<?php
							 						if(mysqli_num_rows($resultTranscation) > 0) {
								 						while($row=mysqli_fetch_assoc($resultTranscation)){
															$bookId = $row['bookID'];
															$transcationId = $row['transcationId'];
															$sqlBook = "SELECT bookTitle from Book WHERE bookID = $bookId ";
															$resultBook = mysqli_query($conn, $sqlBook);
															
															if(mysqli_num_rows($resultBook) > 0) {
																while($rowBook=mysqli_fetch_assoc($resultBook)){

														?>														
                                                            <tr>
															<td><?php echo $row['bookID']; ?></td> 
															<td><?php echo $rowBook['bookTitle']; ?></td> 
															<td><?php echo $row['stdid']; ?></td> 
															<td><?php echo $row['issueDate']; ?></td> 
															<td><?php echo $row['dueDate']; ?></td> 	
															<td><input type="button" class="rent_Button" onClick='location.href="bookReturnTranscation.php?transcationId=<?php echo $row['transcationId']?>&returnDate=<?php echo $returnDate?>"' name="ReturnBook" value="Return Book"  <?php if ($numOfBooksRent1 >= '10000'){ ?>  <?php   } ?>   /></td>
                                                            </tr>
															<?php				 
																}
															}
														}
													}
														?>															
                                                        </tbody>
                                                    </table>
                                              
</body>

</html>
