<?php
require "Database.php";
require "books.php";

$databaseConnection = new DatabaseConnection;
$book = new Books;

include("connection.php");

$bookName = $author = $publisherName = $bookEdition = $ISBN_num = "";
$bookPrice =  "";
$valid = true;
$numOfCopies = 0 ;

if($_SERVER["REQUEST_METHOD"] == "POST"){

	if(isset($_POST["bookName"])){
		$bookName = $_POST["bookName"];
		$book->setBookTtile($bookName);
	}
	if(empty($_POST["bookName"])){
		
		$valid = false;
	}
	
	if(isset($_POST["author"])){
		$author = $_POST["author"];	
		$book->setAuthorName($author);
	}
	if(empty($_POST["author"])){
	
		$valid = false;
	}

	if(isset($_POST["publisherName"])){
		$publisherName = $_POST["publisherName"];
		$book->setPublisherName($publisherName);
	}
	if(empty($_POST["publisherName"])){
		
		$valid = false;
	}

	if(isset($_POST["bookEdition"])){
		$bookEdition = $_POST["bookEdition"];
		$book->setEdition($bookEdition);
	}
	if(empty($_POST["bookEdition"])){
		
		$valid = false;
	}

	if(isset($_POST["ISBN_num"])){
		$ISBN_num = $_POST["ISBN_num"];
		$book->setISBN_num($ISBN_num);
	}
	if(empty($_POST["ISBN_num"])){
		
		$valid = false;
	}

	if(isset($_POST["bookPrice"])){
		$bookPrice = $_POST["bookPrice"];
		$book->setPrice($bookPrice);
	}
	if(empty($_POST["bookPrice"])){
		
		$valid = false;
	}

	if(isset($_POST["numOfCopies"])){
		$numOfCopies = $_POST["numOfCopies"];
		$book->setNumCopies($numOfCopies);
	}
	if(empty($_POST["numOfCopies"])){
		
		$valid = false;
	}
	if($valid){
		$book->insertBookDetails();
		header('Location: adminViewBooks.php');
		exit();
	}
}
?>

<html>
<head>
    <meta charset="UTF-8">
	 
	<title>Library Management System</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
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
</style>
</head>
<body>
<h1>Library System</h1>
<h2>Welcome, Admin</h2>
<ul>
  <li><a href="adminIndex.php">Home</a></li>
  <li><a href="adminBookTransaction.php">Transaction History</a></li>
   <li class="dropdown">
    <a href="javascript:void(0)" class="dropbtn">Books</a>
    <div class="dropdown-content">
    <a href="adminAddBook.php">Add</a>
    <a href="adminViewBooks.php">View Books</a>
   
      
    
  </li>
  <li><a href="logOut.php">LogOut</a></li>
 
</ul>
<body bgcolor = "#FFFFFF">

  <div align = "center" style="margin:3%;">
 
     <div style = "width:300px; border: solid 1px #333333; " align = "left">
        <div style = "background-color:#333333; color:#FFFFFF; padding:3px;height:30px;text-align:center;"><b>LIBRARY MANAGEMENT SYSTEM</b></div>
            
        <div style = "margin:30px">
	<h4>Add Book</h4>

				
				<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
								
								<label for="required-text-input" >Book Title</label>
								
						<input  type="text" name="bookName" placeholder="Book Name"  required>
									<br><br>
                                     
                                  
													<label for="required-text-input" >Author Name</label>
								
									<input  type="text" name="author" placeholder="Author Name"  required>
													
                         
                                    <br><br>         
													<label for="required-text-input" >Publisher Name</label>
							
						<input  type="text" name="publisherName" placeholder="Publisher Name"  required>
													
                        <br><br>     
                               
													<label for="text-input-max-character" >Edition</label>
									
										<input  maxlength="6" name="bookEdition" type="text" placeholder="Book Edition" id="text-input-max-character" required>
							
                                        <br><br>
                                                
									<label for="text-input-max-character" >ISBN No.</label>
													
														<input  type="text" name="ISBN_num" placeholder="Book ISBN" id="text-input-max-character" required>
									
                                                        <br><br>		
                     
													<label for="text-input-max-character" >Book Price</label>
													
							<input  type="text" name="bookPrice" placeholder="Book Price" id="text-input-max-character" required>
													
                            <br><br>
                           
					<label for="text-input-max-character" >Total Copies Available</label>
													
														<input  type="text" name="numOfCopies" placeholder="Number of Copies Available" id="text-input-max-character" required>
						
                                                        <br><br>		
						<div class="offset-2">
													<input type="submit"  value="Submit" name="submit">
													<input type="submit"  value="Cancel" name="cancel">
						
                                            </form>
</div>
</div>
</div>
										
</body>


</html>
