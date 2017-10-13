<!DOCTYPE html>
<html>
<head>
  <title>Insert Books data into library</title>
</head>

<body>
<?php 
 echo $result;

?>
<form action="" method="POST">
  <p>
   <label>Book ID</label>
   <input id="book_id" value="" name="book_id" type="text" required="required" /><br />
  </p>

  <p>
   <label>Book Title</label>
   <input id="book_title" name="book_title" type="text" required="required" /><br />
  </p>

   <p>
   <label>Author</label>
   <input id="author" value="" name="author" type="text" required="required" /><br>
  </p>
  <p>
   <label>Publisher</label>
   <input id="publisher" value="" name="publisher" type="text" required="required" /><br>
  </p>
  <p>
   <label>edition</label>
   <input id="edition" value="" name="edition" type="text" required="required" /><br>
  </p>
  <p>
   <label>ISBN</label>
   <input id="ISBN" value="" name="ISBN" type="text" required="required" /><br>
  </p>
  <p>
   <label>price</label>
   <input id="price" value="" name="price" type="text" required="required" /><br>
  </p>
  <p>
   <label>copies</label>
   <input id="copies" value="" name="copies" type="text" required="required" /><br>
  </p>
  
   <br />
  <p>

      <button type="submit" class="green big" name="submit"><span>Save</span></button> <button type="reset" class="grey big"><span><a href="home.php">Cancel</a></span></button>
  </p>
 </form>

</body>
</html>