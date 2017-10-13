
<html>

<head>
    <meta charset="UTF-8">
    <title>Login Form</title>

    <script src="js/index.js"></script>
<style>
     .login{       position: absolute;
            top: 30%;
            left: 40%;
     }
    </style>

</head>

<body>

 
    <div class="login">

<h2>Library Management System </h2>
        <form name="loginform" onsubmit="return validateForm();" action="home.php" method="post">
            <input type="text" name="usr" placeholder="Username" required="required" /><br><br>
            <input type="password" name="pword" placeholder="Password" required="required" /><br><br>
            <button type="submit" value="Login" >Login</button>
           
        </form>
    </div>




</body>

</html>