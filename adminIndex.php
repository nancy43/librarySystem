<?php
require "Database.php";
require "books.php";

$databaseConnection = new DatabaseConnection;
$book = new Books;

include("connection.php");
$sql = "SELECT * FROM RequestTable WHERE status='Y'";
$result = mysqli_query($conn, $sql);


?>
<!DOCTYPE html>
<html
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
			
						<h1>Welcome, Admin</h1>
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
	
										
		<h4>Book Request table</h4>
										
			<table>
					<thead>
							<tr>
								
								<th>Request Id</th>
								<th>Book ID</th>
								<th>Student ID</th>
								<th>Update</th>
								</tr>
								</thead>
										<tbody>
												<?php
												if(mysqli_num_rows($result) > 0) {
                                                    while($row=mysqli_fetch_assoc($result)){

												?>													
													<tr>
													
														<td><?php echo $row['requestId']; ?></td> 
														<td><?php echo $row['bookID']; ?></td> 
														<td><?php echo $row['stdid']; ?></td> 
														<td>
														<?php echo '<a href="bookTranscation.php?requestId=', urlencode($row['requestId']),' "> Approve/ </a>';?>
														<?php echo '<a href="cancelBookRentRequest.php?requestId=', urlencode($row['requestId']),' ">Cancel</a>';?>
														
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
