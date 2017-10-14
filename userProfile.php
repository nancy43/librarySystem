<?php
require "Database.php";
require "student.php";
include "session.php";

$numOfBooksRent1 = "";

$databaseConnection = new DatabaseConnection;
$student = new Students;

include("connection.php");

$displayName = "";
$sql = "Select * FROM Student where email='$login_session'";
$result = mysqli_query($conn, $sql);

$stdName = $gender = $dateOfBirth =$course = $email =  $linkedInURL =   "";
$address = $city = $province = $postalCode = $password = $reTypePassword = "";
$rdo1Chcked = $rdo2Chcked = "";
$valid = true;

if($_SERVER["REQUEST_METHOD"] == "POST"){
    
        if(isset($_POST["stdName"])){
            $stdName = $_POST["stdName"];
            $student->setStdName($stdName);
        }
        if(empty($_POST["stdName"])){
            //$errName="Please enter name";
            $valid = false;
        }
    
        
    
        if(isset($_POST["dateOfBirth"])){
            $dateOfBirth = $_POST["dateOfBirth"];
            $student->setDateOfBirth($dateOfBirth);
        }
        if(empty($_POST["dateOfBirth"])){
            //$errName="Please enter name";
            $valid = false;
        }
        if(isset($_POST["course"])){
            $course = $_POST["course"];
            $student->setStdCourse($course);
        }
        if(empty($_POST["course"])){
            //$errName="Please enter name";
            $valid = false;
        }
        
        if(isset($_POST["linkedInURL"])){
            $linkedInURL = $_POST["linkedInURL"];
            $student->setWebURL($linkedInURL);
        }
        if(empty($_POST["linkedInURL"])){
            //$errName="Please enter name";
            $valid = false;
        }
        if(isset($_POST["address"])){
            $address = $_POST["address"];
            $student->setAddress($address);
        }
        if(empty($_POST["address"])){
            //$errName="Please enter name";
            $valid = false;
        }
        if(isset($_POST["city"])){
            $city = $_POST["city"];
            $student->setCity($city);
        }
        if(empty($_POST["city"])){
            //$errName="Please enter name";
            $valid = false;
        }
        if(isset($_POST["province"])){
            $province = $_POST["province"];
            $student->setProvince($province);
        }
        if(empty($_POST["province"])){
            //$errName="Please enter name";
            $valid = false;
        }
        if(isset($_POST["postalCode"])){
            $postalCode = $_POST["postalCode"];
            $student->setPostalCode($postalCode);
        }
        if(empty($_POST["postalCode"])){
            //$errName="Please enter name";
            $valid = false;
        }
    
        if($valid){
            $student->updateStudentDetails($_POST["stdid"]);
            header('Location: userIndex.php');
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
label{
    color:black;
}
table,th,td{
    border: 0.5px solid black;
    padding:1em;
}
input{
    width:300px;
}
</style>
</head>
<body >
<h1>Library System</h1>
			
                        <h1>Welcome, Student</h1>
                        
						<ul>
  <li><a href="userIndex.php">Home</a></li>
  <li class="dropdown">
    <a href="javascript:void(0)" class="dropbtn">Books</a>
    <div class="dropdown-content">
	  <a href="userRentBook.php">Rent  Book</a>
	  <a href="userReturnBook.php">Return Book</a>
      
      
    
  </li>
   <li class="dropdown">
    <a href="javascript:void(0)" class="dropbtn">Profile</a>
    <div class="dropdown-content">
	  <a href="userProfile.php">User Profile</a>
	  <a href="changePassword.php">Change Password</a>
      
      
    
  </li>
  <li><a href="logOut.php">LogOut</a></li>
 
</ul>
<div align = "center" style="margin:2%;">
<h3>Profile Details of <?php echo $login_session;?></h3>
     <div style = "width:500px; " align = "left">
        <div style = "background-color:#333333; color:#FFFFFF; padding:3px;height:30px;text-align:center;float:left;"><b>Update Profile</b>
            
        <div style = "margin:30px;border:2px solid black; ">
	
                            
                   
                                        
                                    
											<?php
												if(mysqli_num_rows($result) > 0) {
													while($row=mysqli_fetch_assoc($result)){
														if($row['gender']=="Male"){
															$rdo1Chcked = "Checked";
														}elseif($row['gender']=="Female"){
															$rdo2Chcked = "Checked";
                                                        }	
                                                        $displayName = $row['name'];
											?>
                                                <form  action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
                                                   
                                                        <label for="required-text-input" >Name</label> &nbsp&nbsp&nbsp
                                                      
														<input type="hidden"  name="stdid" id="stdid" value="<?php echo $row['stdid']?>">
                                                            <input name="stdName" type="text" placeholder="Name"  value="<?php echo $row['name'];?>" required>
                                                            <br><br>
                                                        
                                                                    
                                                               
                                                            <label for="text-input-max-character" >Email Address</label>&nbsp&nbsp&nbsp
                                                            
                                                                <input  name="email" type="text" placeholder="Email Address" id="text-input-max-character" value="<?php echo $row['email'];?>" disabled required>
                                                                <br><br>
                                                            <label for="text-input-max-character" >LinkedIn Profile</label>&nbsp&nbsp&nbsp
                                                            
                                                                <input  name="linkedInURL" type="text" placeholder="LinkedIn Profile" id="text-input-max-character" value="<?php echo $row['url'];?>" required>
                                                                <br><br>
                                                    
                                                    
                                                            <label for="text-input-max-character" >Birth Date</label>&nbsp&nbsp&nbsp
                                                            
                                                                <input  name="dateOfBirth" type="date" placeholder="Birth Date" id="text-input-max-character" value="<?php echo $row['dob'];?>" max=<?php
												echo date('Y-m-d',strtotime('-10 years'));
											?> required><br><br>
                                                            
                                                        
                                                        
                                                                <label for="text-input-max-character" >Enrolled Course</label>&nbsp&nbsp&nbsp
                                                                
                                                                    <input  type="text" name="course" placeholder="Enrolled Course" id="text-input-max-character" value="<?php echo $row['course'];?>" required>
                                                                
                                                            
                                                                    <br><br>
                                                        <label for="required-text-input" >Address</label>&nbsp&nbsp&nbsp
                                                        
                                                            <input  type="text" placeholder="Address" name="address" id="required-text-input" value="<?php echo $row['address'];?>" required>
                                                        
                                                    
                                                            <br><br>
                                                        <label for="required-text-input" >City</label>&nbsp&nbsp&nbsp
                                                        
                                                            <input  name="city" type="text" placeholder="City" id="required-text-input" value="<?php echo $row['city'];?>" required>
                                                        
                                                            <br><br>
                                                    
                                                        <label for="text-input-max-character" >Province</label>&nbsp&nbsp&nbsp
                                                        
                                                            <input  maxlength="6" name="province" type="text" placeholder="Province" id="text-input-max-character" value="<?php echo $row['province'];?>" required>
                                                        
                                                            <br><br>
                                                    
                                                        <label for="text-input-max-character" >Postal Code</label>&nbsp&nbsp&nbsp
                                                        
                                                            <input  type="text" name="postalCode" placeholder="Postal code" id="text-input-max-character" value="<?php echo $row['zipcode'];?>" required>
                                                        
                                                            <br><br>
                                                    
														<input type="submit"  value="Submit" name="submit"><br>
														<input type="submit"  value="Cancel" name="Cancel">
													
													<?php				 
													}
												}
												?> 
                                                </form>
                                            
                                            </div>
                                            </div>
                                            </div>
    
</body>


</html>
