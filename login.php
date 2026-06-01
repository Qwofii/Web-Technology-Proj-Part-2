<? php

$_SESSION['username'] = $user['username'];

session_start();
if (!isset($_SESSION['username'])) {
  header("Location: login.php");
  exit();
} else if $user['role'] == "manager" {
    header("Location: manage.php");
} else {
     header("Location: welcome.php");
} 
?>

<!DOCTYPE html>
<html lang="en">
<head>
<?php include 'header_loggedout.inc'; ?>
<link rel="stylesheet" href="style/style.css">
   
</head>

<body>

<article>
<form id="login" 
      method="post"
      action="login_process.php"
    >

<label for="username" >Username</label>
<input type="text" name="username" required><br>

<label for="password" >Password</label>
<input type="text" name="password" required><br>

<a href= "signup.php"> Don't have an account yet?</a>

<input type="submit" value = "Login">

</form>




</article>

<div>
    <?php include 'footer.inc'; ?>
</div>
</body>
</html>
