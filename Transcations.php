<?php
include("connection.php");
class Transcations{

    var $transcationID;
    var $bookID;
    var $stdID;
    var $issueDate;
    var $dueDate;
    var $returnDate;
    var $Description;
    
    var $servername = "localhost";
	var $username = "root";
	var $password = "";
	var $dbname = "library";
   function setTranscationID($transcationID){
        $this->transcationID = $transcationID;
    }

    function setStdId($stdID){
        $this->stdID = $stdID;
    }

    function setbookID($bookID){
        $this->bookID = $bookID;
    }
    
    function setissueDate($issueDate){
        $this->issueDate = $issueDate;
    }

    function setdueDate($dueDate){
        $this->dueDate = $dueDate;
    }

    function setreturnDate($returnDate){
        $this->returnDate = $returnDate;
    }

    function setDescription($Description){
        $this->Description = $Description;
    }

    function insertTranscation(){

        $conn = mysqli_connect($servername, $username, $password,$dbname);
        $sql = "INSERT INTO Transcation (bookID, stdid, issueDate, dueDate, returnDate, Description)
        VALUES ('$this->bookID', '$this->stdID','$this->issueDate','$this->dueDate','$this->returnDate','$this->Description')";
    
        $conn->query($sql);

        $conn->close();
    }

    function updateTranscationReturnDate($id,$returnDate){
        $conn = mysqli_connect($servername, $username, $password,$dbname);
        $sql = "UPDATE Transcation SET
        returnDate = '$returnDate'
        where transcationId = $id
        ";

        $conn->query($sql) ;

        $conn->close();
    }
}
?>