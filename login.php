<!DOCTYPE html>
<html lang="en">
<head>
<?php include 'header.inc'; ?>
   
</head>

<body>

<article>
<form id="regform" 
      method="post"
      action="login_process.php"
    >

<label for="username" >Username</label>
<input type="text" name="username" required><br>

<label for="password" >Password</label>
<input type="text" name="password" required><br>

<a href= "signup.php"> Don't have an account yet?</a>


<input type="hidden" name="token" value="abc123" >
<input type="submit" value = "Login">

</form>




</article>

<div>
    <?php include 'footer.inc'; ?>
</div>
</body>
</html>
