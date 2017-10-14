<?php
require "Database.php";
require "books.php";

$databaseConnection = new DatabaseConnection;
$book = new Books;
include("connection.php");

$sql = "SELECT * FROM Book";
$result = mysqli_query($conn, $sql);

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

			<h2>Admin</h2>
			<ul>
<li><a href="adminIndex.php">Home</a></li>
<li><a href="adminBookTransaction.php">Transaction History</a></li>
<li class="dropdown">
<a href="javascript:void(0)" class="dropbtn">Books</a>
<div class="dropdown-content">
<a href="adminAddBook.php">Add</a>
<a href="adminViewBooks.php">View Books</a>


</div>
</li>
<li><a href="logOut.php">LogOut</a></li>

</ul>

					
										<h4>Book Details</h4>
									
										<table>
											<thead>
												<tr>
													
													<th>Book ID</th>
													<th>Book Name</th>
													<th>Author</th>
													<th>Publisher</th>
													<th>Edition</th>
													<th>Total Copies Available</th>
													<th>Price</th>
													<th>Update</th>
												</tr>
											</thead>
											<tbody>
											<?php
							 				if(mysqli_num_rows($result) > 0) {
								 				while($row=mysqli_fetch_array($result,MYSQLI_ASSOC)){

											?>
												<tr>
													
													<td><?php echo $row['bookID']; ?></td> 
													<td><?php echo $row['bookTitle']; ?></td> 
													<td><?php echo $row['author']; ?></td> 
													<td><?php echo $row['publisher']; ?></td> 	
													<td><?php echo $row['edition']; ?></td> 	
													<td><?php echo $row['NumOfCopies']; ?></td> 	
													<td><?php echo $row['price']; ?></td> 	
													<td class="controller-column">
														<?php echo '<a href="adminUpdateBook.php?bookID=', urlencode($row['bookID']), '">Update </a>';?>
													</td>
												</tr>
												<?php				 
											 }
							 			}
							 				?>
											</tbody>
										</table>
									
</body>

</html>
