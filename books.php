<?php

class Books{
    var  $id;
	var  $bookTitle;
	var  $authorName;
	var  $publisherName;
	var  $edition;
	var  $ISBN_num;
	var  $price;
    var  $numCopies;

    var $servername = "localhost";
	var $username = "root";
	var $password = "";
	var $dbname = "library";
	var $conn = "";
    
    function setId($id)
	{
		$this->id = $id;
	}
	function setBookTtile($bookTitle)
	{
		$this->bookTitle = $bookTitle;
	}
	function setAuthorName($authorName)
	{
		$this->authorName = $authorName;
	}
	function setPublisherName($publisherName)
	{
		$this->publisherName = $publisherName;
	}
	function setEdition($edition)
	{
		$this->edition = $edition;
	}
	function setISBN_num($ISBN_num)
	{
		$this->ISBN_num = $ISBN_num;
	}
	function setPrice($price)
	{
		$this->price = $price;
	}
	function setNumCopies($numCopies)
	{
		$this->numCopies = $numCopies;
	}


	function getId()
	{
		echo $this->id ."<br/>";
	}
	function getBookTtile()
	{
		echo $this->bookTitle ."<br/>";
	}
	function getAuthorName()
	{
		echo $this->authorName ."<br/>";
	}
    function getPublisherName()
	{
		echo $this->publisherName ."<br/>";
	}
	function getEdition()
	{
		echo $this->edition ."<br/>";
	}
	function getISBN_num()
	{
		echo $this->ISBN_num ."<br/>";
	}
	function getPrice()
	{
		echo $this->price ."<br/>";
	}
	function getNumCopies()
	{
		echo $this->numCopies ."<br/>";
    }
    function insertBookDetails()
	{
			$conn = mysqli_connect($this->servername, $this->username, $this->password, $this->dbname);

	
	         $sql = "INSERT INTO Book (bookTitle, author, publisher, edition, ISBN_no, price, NumOfCopies)
	         VALUES ('$this->bookTitle', '$this->authorName','$this->publisherName','$this->edition','$this->ISBN_num','$this->price',$this->numCopies)";
        
				if ($conn->query($sql) === TRUE) {
					//echo "New record created successfully";
				} else {
					//echo "Error: " . $sql . "<br>" . $conn->error;
				}

		    $conn->close();
	}
    

	function updateBookDetails($id)
	{
			$conn = mysqli_connect($this->servername, $this->username, $this->password, $this->dbname);

			$sql = "UPDATE Book SET 
			bookTitle = '$this->bookTitle',author = '$this->authorName',publisher = '$this->publisherName',edition ='$this->edition',
			ISBN_no ='$this->ISBN_num',price = '$this->price',NumOfCopies = $this->numCopies
			WHERE bookID= $id";

		
				if ($conn->query($sql) === TRUE) {
					//echo "New record created successfully";
				} else {
					//echo "Error: " . $sql . "<br>" . $conn->error;
				}

		    $conn->close();
	}

	function updateBookQuantity($id,$updatedBookCopies){
		$conn = mysqli_connect($this->servername, $this->username, $this->password, $this->dbname);

		$sql = "UPDATE Book SET 
		NumOfCopies = $updatedBookCopies
		WHERE bookID= $id";

	
			if ($conn->query($sql) === TRUE) {
				//echo "New record created successfully";
			} else {
				//echo "Error: " . $sql . "<br>" . $conn->error;
			}

		$conn->close();
	}

	function deleteBookDetails($id){
		$conn = mysqli_connect($this->servername, $this->username, $this->password, $this->dbname);
		

		// sql to delete a record
			$sql = "DELETE FROM Book WHERE bookID=$id";

			if ($conn->query($sql) === TRUE) {
			//	echo "Record deleted successfully";
			} else {
			//	echo "Error deleting record: " . $conn->error;
			}

		$conn->close();
	}
	
}
?>