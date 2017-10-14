<?php

class DatabaseConnection{

    var $servername = "localhost";
	var $username = "root";
	var $password = "";
	var $dbname = "library";
    

    function createConection()
    {
  
            $conn = mysqli_connect($this->servername, $this->username, $this->password);
            if (!$conn) {
                die("Connection failed: " . mysqli_connect_error());
            }
            mysqli_close($conn);
    }

    function createDataBase()
    {

            $conn = mysqli_connect($this->servername, $this->username, $this->password);

            $sql = "CREATE DATABASE library";
            $conn->query($sql);
            mysqli_close($conn);
    }

    function createAdminTable()
    {

            $conn = mysqli_connect($this->servername, $this->username, $this->password, $this->dbname);
            $sql = "CREATE TABLE Admin (
            adminId INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
            adminUserName VARCHAR(30) NOT NULL,
            password VARCHAR(30) NOT NULL,
            adminName VARCHAR(30) NOT NULL,
            adminGender VARCHAR(30) NOT NULL,
            adminEmail VARCHAR(50),
            address VARCHAR(50),
            city VARCHAR(50),
            province VARCHAR(30),
            zipcode VARCHAR(30),
            joinDate date
            )";

$conn->query($sql);
            mysqli_close($conn);

    }

    function createBookTable()
    {

            $conn = mysqli_connect($this->servername, $this->username, $this->password, $this->dbname);

            $sql = "CREATE TABLE Book (
            bookID INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
            bookTitle VARCHAR(30) NOT NULL,
            author VARCHAR(30) NOT NULL,
            publisher VARCHAR(50),
            edition VARCHAR(50),
            ISBN_no VARCHAR(50),
            price VARCHAR(30),
            NumOfCopies INT(6)
            )";

$conn->query($sql);
            mysqli_close($conn);

    }

    function createStudentTable()
    {

            $conn = mysqli_connect($this->servername, $this->username, $this->password, $this->dbname);

            $sql = "CREATE TABLE Student (
				stdid INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
				name VARCHAR(30) NOT NULL,
				gender VARCHAR(30) NOT NULL,
				email VARCHAR(50),
				url VARCHAR(200),
                course VARCHAR(100),
				dob date,
				address VARCHAR(50),
				city VARCHAR(50),
				province VARCHAR(30),
				zipcode VARCHAR(30),
                numOfBooksRent INT(6)
				)";

$conn->query($sql);

            mysqli_close($conn);

    }

    function createLibraryUser()
    {

            $conn = mysqli_connect($this->servername, $this->username, $this->password, $this->dbname);

            $sql = "CREATE TABLE LibraryUSer (
				id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
                loginId VARCHAR(50) NOT NULL,
				password VARCHAR(30) NOT NULL,
				gender VARCHAR(30) NOT NULL,
				CreationDate date
				)";

$conn->query($sql);

            mysqli_close($conn);

    }

    function createTranscationTable()
    {

            $conn = mysqli_connect($this->servername, $this->username, $this->password, $this->dbname);

            $sql = "CREATE TABLE Transcation (
				transcationId INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
                bookID INT(6) UNSIGNED, FOREIGN KEY (bookID) REFERENCES Book(bookID),
                stdid INT(6) UNSIGNED, FOREIGN KEY (stdid) REFERENCES Student(stdid),
                issueDate date,
                dueDate date,
                returnDate date,
                Description VARCHAR(100)
				)";

$conn->query($sql);

            mysqli_close($conn);

    }    


	function insertAdminData()
	{
		$conn = mysqli_connect($this->servername, $this->username, $this->password, $this->dbname);
        $sql = "INSERT INTO Admin (adminUserName,password,adminName, adminGender, adminEmail, address, city, province, zipcode, joinDate)
            VALUES('admin','admin@123','Arshdeep','Male','boparai.arsh3@gmail.com','100 Graydon Hall','Toronto','ON','m3a3a9','2017-10-06')";
            $conn->query($sql);
             $conn->close();
    }
    
    function createRequestTable(){
              
            $conn = mysqli_connect($this->servername, $this->username, $this->password, $this->dbname);
            $sql = "CREATE TABLE RequestTable (
                requestId INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
                bookID INT(6) UNSIGNED, FOREIGN KEY (bookID) REFERENCES Book(bookID),
                stdid INT(6) UNSIGNED, FOREIGN KEY (stdid) REFERENCES Student(stdid),
                status VARCHAR(6)
                )";
           $conn->query($sql);
            mysqli_close($conn);      
    }

    function insertRequest($bookId,$stdID){
        $conn = mysqli_connect($this->servername, $this->username, $this->password, $this->dbname);
        $sql = "INSERT INTO RequestTable (bookID, stdid, status)
        VALUES ('$bookId', '$stdID','Y')";
        $conn->query($sql);
        $conn->close();
    }

    function updateRequestStatus($id){
        $conn = mysqli_connect($this->servername, $this->username, $this->password, $this->dbname);
        $sql = "UPDATE RequestTable SET 
		status = 'N'
		WHERE requestId= $id";
        $conn->query($sql);
     	$conn->close();
    }
    
}

?>