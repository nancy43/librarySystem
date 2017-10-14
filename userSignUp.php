<?php
session_start();
require "database.php";
require "student.php";
if(isset($_SESSION['login_user'])){
    header("location: userIndex.php");
    exit();
}

$databaseConnection = new DatabaseConnection;
$student = new Students;
include("connection.php");

$stdName = $gender = $dateOfBirth =$course = $email =  $linkedInURL =   "";
$address = $city = $province = $postalCode = $password = $reTypePassword = "";
$rdo1Chcked = $rdo2Chcked = "";
$valid = true;

if($_SERVER["REQUEST_METHOD"] == "POST"){
    
    if(isset($_POST["email"])){
        $email = $_POST["email"];
        $sql = "SELECT * FROM LibraryUSer WHERE loginId = '$email'";
        $result = mysqli_query($conn, $sql);
    }

    if(mysqli_num_rows($result) >= 1){
        echo "<script>
        alert('This email is already being used Please Sign In to User your account');
        
        </script>";

        //exit("This email is already being used Please Sign In to User your account");
    }else{
        if(isset($_POST["stdName"])){
            $stdName = $_POST["stdName"];
            $student->setStdName($stdName);
        }
        if(empty($_POST["stdName"])){
            //$errName="Please enter name";
            $valid = false;
        }
    
        if(isset($_POST["gender"])){
            $gender = $_POST["gender"];
            $student->setStdGender($gender);
            if($_POST["gender"]=="Male"){
                $rdo1Chcked = "Checked";
            }elseif($_POST["gender"]=="Female"){
                $rdo2Chcked = "Checked";
            }
        }else{
            //$errGender = "Please select any option";
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
        if(isset($_POST["email"])){
            $email = $_POST["email"];
            $student->setStdEmail($email);
        }
        if(empty($_POST["email"])){
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
    
        if(isset($_POST["password"])){
            $password = $_POST["password"];
            $student->setPassword($password);
        }
        if(empty($_POST["password"])){
            //$errName="Please enter name";
            $valid = false;
        }
    
   
        if($valid){
            $student->insertStudent();
            $student->insertLibraryUser();
            $_SESSION['login_user']= $email;
            header('Location: userIndex.php');
            exit();
        }
    }


}

?>

<html>
<head>
    <meta charset="UTF-8">
	
	<title>Library Management System</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
	<style type = "text/css">
      body {
         font-family:Arial, Helvetica, sans-serif;
         font-size:14px;
      }
      
      label {
        
         width:100px;
         font-size:14px;
      }
      
      .box {
         border:#666666 solid 1px;
      }
   </style>
</head>
<body bgcolor = "#FFFFFF">

  <div align = "center">
     <div style = "width:300px; border: solid 1px #333333; " align = "left">
        <div style = "background-color:#333333; color:#FFFFFF; padding:3px;"><b>Sign up</b></div>
            
        <div style = "margin:30px">
								
							
							
								<form action="" method="post">
                                    
										<input type="text"  name="stdName"  placeholder="Name" required><br><br>
                                   
                                                        <label >
                                                                    <input class="w3-input w3-border w3-round" name="gender" value="Male"type="radio"  <?php echo htmlspecialchars ($rdo1Chcked);?>>
                                                                    
                                                                    <span >Male</span>
                                                                </label>
                                                           
                                                                <label >
                                                                    <input class="w3-input w3-border w3-round" name="gender" type="radio" value="Female"  <?php echo htmlspecialchars ($rdo2Chcked);?>>
                                                                    <span ></span>
                                                                    <span >Female</span>
                                                                </label><br><br>
                                                          
										<input class="w3-input w3-border w3-round" type="date"  name="dateOfBirth"  placeholder="YYYY-MM-DD"max=<?php
												echo date('Y-m-d',strtotime('-10 years'));
											?> required>
                                    <br><br>
                                   
										<input class="w3-input w3-border w3-round" type="text"  name="course"  placeholder="Course" required>
                                        <br><br>
										<input class="w3-input w3-border w3-round" type="email"  name="email"  placeholder="Email" required>
                                        <br><br>
										<input class="w3-input w3-border w3-round" type="text"  name="linkedInURL"  placeholder="LinkedIn URL" required>
                                        <br><br>
										<input class="w3-input w3-border w3-round" type="text"  name="address"  placeholder="Address" required>
                                        <br><br>
										<input class="w3-input w3-border w3-round" type="text"  name="city"  placeholder="City" required>
                                        <br><br>
										<input class="w3-input w3-border w3-round" type="text"  name="province"  placeholder="Province" required>
                                        <br><br>
										<input class="w3-input w3-border w3-round" type="text"  name="postalCode"  placeholder="Postal Code" required>
                                        <br><br>
										<input class="w3-input w3-border w3-round" type="password"  name="password"  placeholder="Password" required>
                                        <br><br>
										<input type="submit" style="width:100%;background-color: black;    border: none;
    color: white;padding: 1%;" name="Sign Up" value="Sign Up">
    <br><br>
								</form>
                                </div>
        
 </div>
 <p>Already have an account? <a href="userSignIn.php">Sign In Here</a></p>  
</div>
									
									
								
	
</body>


</html>
