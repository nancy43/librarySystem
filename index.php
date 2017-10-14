<?php
require "Database.php";
require "books.php";

$databaseConnection = new DatabaseConnection;
$book = new Books;
//Comment this code After connection has been established, Database Created and Record Inserted
$databaseConnection->createConection();
$databaseConnection->createDataBase();
$databaseConnection->createAdminTable();
$databaseConnection->createBookTable();
$databaseConnection->createStudentTable();
$databaseConnection->createLibraryUser();
$databaseConnection->createTranscationTable();
$databaseConnection->createRequestTable();
$databaseConnection->insertAdminData();

include("connection.php");
?>


<html>
<head>
    <meta charset="UTF-8">
	
	<title>Library Management System</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<style>
#first{
    border: 2px solid #4CAF50;
    position:absolute;
    top:30%;
    left:40%;
    color:BLACK;
    width:450px;
    height: 150px;
    background:white;
}
.button {
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
body{
    background-image:url("banner.png")
}

</style>
</head>
<body>

    <div id="first">
							<h1>&nbsp&nbspLibrary Management System</h1>
                            &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                                                <input type="button" onclick='location.href="adminSignIn.php"' class="button" value=" Admin Login">&nbsp &nbsp &nbsp
                                                
                                                <input type="button" onclick='location.href="userSignIn.php"'class="button"  value=" User Login">
</div>					
</body>


</html>
