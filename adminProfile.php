<?php
require "Database.php";
require "student.php";


$numOfBooksRent1 = "";

$databaseConnection = new DatabaseConnection;

$rdo2Chcked = $rdo1Chcked = "";

include("connection.php");

$sql = "SELECT * FROM Admin";
$result = mysqli_query($conn, $sql);


?>
<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="UTF-8">
	 
	<title>Library Management System</title>
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
			
						<span>Librarian</span>
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
	
		<h4>Update Profile</h4>
					<ol class="breadcrumb">
			<li class="breadcrumb-item"><a href="#"><i class="ti-home"></i></a></li>
						<li class="breadcrumb-item active">Update</li>
					</ol>
					
				<h4>Profile Details</h4>
					
                <form id="myForm">
                <?php
                    if(mysqli_num_rows($result) > 0) {
                        while($row=mysqli_fetch_assoc($result)){
                            if($row['adminGender']=="Male"){
                                $rdo1Chcked = "Checked";
                            }elseif($row['adminGender']=="Female"){
                                $rdo2Chcked = "Checked";
                            }	
                ?>
                        
						<label for="required-text-input">Admin Name</label>
										<input  type="text" placeholder="Admin Name" id="required-text-input" value="<?php echo $row['adminUserName'];?>" required>
													
                                <label>Gender</label>
                                <label>
                                     <input name="radio-stacked" type="radio" <?php echo htmlspecialchars ($rdo1Chcked);?>>
                                <span></span>
                      <span>Male</span>
                                  </label>
                     
                                <label>
                      <input id="radioStacked22" name="radio-stacked" type="radio"  <?php echo htmlspecialchars ($rdo2Chcked);?>>
                           
                   <span>Female</span>
                            </label>
                        
                                    <label for="text-input-max-character">Email Address</label>
                                            
          <input class="form-control" type="text" placeholder="Email Address" id="text-input-max-character" value="<?php echo $row['adminEmail'];?>" required>
                                    
	<label for="required-text-input" >Address</label>
					<input class="form-control" type="text" placeholder="Address" id="required-text-input" value="<?php echo $row['address'];?>" required>
							<label for="required-text-input" class="col-lg-2 col-form-label">City</label>
<input class="form-control" type="text" placeholder="City" id="required-text-input" value="<?php echo $row['city'];?>" required>
<label for="text-input-max-character" class="col-lg-2 col-form-label">Province</label>
								<input class="form-control" maxlength="6" type="text" placeholder="Province" id="text-input-max-character" value="<?php echo $row['province'];?>" required>
								<label for="text-input-max-character" class="col-lg-2 col-form-label">Postal Code</label>
									<input class="form-control" type="text" placeholder="Postal code" id="text-input-max-character" value="<?php echo $row['zipcode'];?>" required>
							<label for="text-input-max-character" class="col-lg-2 col-form-label">Joining Date</label>
							<input class="form-control" type="date" placeholder="Joining Date" id="text-input-max-character" value="<?php echo $row['joinDate'];?>" required>
						
                                                    <?php				 
													}
												}
												?> 
											</form>
									
</body>

</html>
