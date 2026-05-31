
<!DOCTYPE html>
<html lang="en">
<head>
<?php include 'header.inc'; ?>
   
</head>

<body>

<article>
<form id="regform" 
      method="post"
      action="process.php"
    >

<label for="firstName" >First Name</label>
<input type="text" name="firstName" required><br>

<label for="lastName" >Last Name</label>
<input type="text" name="lastName" required><br>

<label for="email" >Email address</label>
<input type="text" name="email" required><br>

<label for="password" >Password</label>
<input type="text" name="password" required><br>


<input type="hidden" name="token" value="abc123" >
<input type="submit" value = "Login">

</form>




</article>

<div>
    <?php include 'footer.inc'; ?>
</div>
</body>
</html>



