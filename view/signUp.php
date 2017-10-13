<!DOCTYPE html>
<html>
<head>
  <title>Sign Up new User</title>
</head>

<body>
    
<?php 

 echo $result;

?>
<form action="" method="POST">
  <p>
   <label>User ID</label>
   <input id="user_id" value="" name="user_id" type="text" required="required" /><br />
  </p>

  <p>
   <label>Password</label>
   <input id="password" name="password" type="text" required="required" /><br />
  </p>

   <p>
   <label>Date</label>
   <input id="creation_date" value="" name="creation_date" type="DATE" required="required" /><br>
  </p>
  
  <br />
  <p>

      <button type="submit" name="submit"><span>Sign Up</span></button> <button ><span><a href="first.html">Return</a></span></button>
  </p>
 </form>

</body>
</html>