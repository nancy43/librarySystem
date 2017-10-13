<?php
include_once("model/User.php");
 Class Model{

  public function Model()
  {
   $conn = mysqli_connect("localhost","root","","library") ;
   
  }
  public function insert_user(){
	include("connection.php");
	if (isset($_POST['user_id']) && isset($_POST['password']) && isset($_POST['creation_date'])){
		$user_id = $_POST['user_id'];
		$password = $_POST['password'];
		$creation_date = $_POST['creation_date'];
		$qry = "insert into library_user (user_id,password,creation_date) values('$user_id','$password','$creation_date')";
		$result = $conn->query($qry);
		if ($result) {
		 return " Data inserted Successfully.";
		}
		else
		{
		 return "Error...! Not Inserted.";
		}
	} else
	{
	 return "";
	}

  }

  public function insert_data()
  {
	include("connection.php");
    if (isset($_POST['book_id']) && isset($_POST['book_title']) && isset($_POST['author'])
    && isset($_POST['publisher'])&& isset($_POST['edition'])&& isset($_POST['ISBN'])
    && isset($_POST['price'])&& isset($_POST['copies'])) {
    $book_id = $_POST['book_id'];
    $book_title = $_POST['book_title'];
    $author = $_POST['author'];
    $publisher = $_POST['publisher'];
    $edition = $_POST['edition'];
    $ISBN = $_POST['ISBN'];
    $price = $_POST['price'];
    $copies = $_POST['copies'];
    $qry = "insert into book_master (book_id,book_title,author,publisher,edition,ISBN,price,copies) values('$book_id','$book_title','$author','$publisher','$edition','$ISBN','$price','$copies')";
    $result = $conn->query($qry);
    if ($result) {
     return " Data inserted Successfully.";
    }
    else
    {
     return "Error...! Not Inserted.";
    }
   }
   else
   {
    return "";
   }
  }
 }
?>