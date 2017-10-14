
<html>

<head>
    <meta charset="UTF-8">
    <title>Login Form</title>

    <script src="js/index.js"></script>
    <style type = "text/css">
      body {
         font-family:Arial, Helvetica, sans-serif;
         font-size:14px;
      }
      
      label {
         font-weight:bold;
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
        <div style = "background-color:#333333; color:#FFFFFF; padding:3px;"><b>Login</b></div>
            
        <div style = "margin:30px">

<h2>Admin Login </h2>
        <form name="loginform" onsubmit="return validateForm();" action="home.php" method="post">
            <input type="text" name="usr" placeholder="Username" required="required" /><br><br>
            <input type="password" name="pword" placeholder="Password" required="required" /><br><br>
            <button type="submit" value="Login" >Login</button>
           
        </form>
        </div>
        
 </div>
    
</div>

</body>



</html>