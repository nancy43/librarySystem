<!DOCTYPE html>
<html>
<head>
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

<ul>
  <li><a href="#list">List</a></li>
   
  <li><a href="#contact">Request</a></li>

  <li><a href="#profile">Update Profile</a></li>
 
</ul>
<header>
                    <h2>List</h2>
                </header>

                <p>List of all Books</p>
                <?php

include("connection.php");

 $result = mysqli_query($conn, "SELECT * FROM book_master ORDER BY book_id ASC"); // using mysqli_query instead
    //while($res = mysql_fetch_array($result)) { // mysql_fetch_array is deprecated, we need to use mysqli_fetch_array 
        echo "<table><tr><th>ID</th><th>Name</th><th>Author</th><th>Publisher</th><th>Edition</th><th>ISBN</th><th>Price</th><th>Copies</th></tr>";
	while($res = mysqli_fetch_array($result)) { 		
        
        echo "<tr><td>" . $res["book_id"]. "</td><td>" . $res["book_title"]. "</td><td> " . $res["author"]. "</td><td> " . $res["publisher"]. "</td><td> " . $res["edition"]. "</td><td> " . $res["ISBN"]. 
        "</td><td> " . $res["price"]. "</td><td> " . $res["copies"]. "</td></tr>";
         }
        echo "</table>";
	
	
?>




</body>
</html>