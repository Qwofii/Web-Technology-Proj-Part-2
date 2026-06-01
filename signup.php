<?php

session_start();

if (!isset($_SESSION['username'])) {
} else if ($_SESSION['role'] == "manager"){
    header("Location: manage.php");
    exit();
} else if ($_SESSION['role'] == "user"){
    header("Location: welcome.php");
    exit();
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
<?php include 'header_loggedout.inc'; ?>
<link rel="stylesheet" href="style/style.css">
</head>

<body>

<div class="login-container">
<article>
<form id="signup" 
      method="post"
      action="signup_process.php"
    >

<label for="firstname" >First Name</label>
<input type="text" name="firstname" required><br>

<label for="lastname" >Last Name</label>
<input type="text" name="lastname" required><br>

<label for="email" >Email address</label>
<input type="text" name="email" required><br>

<label for="username" >Username</label>
<input type="text" name="username" required><br>

<label for="password" >Password</label>
<input type="text" name="password" required><br>



<input type="submit" value = "Sign up">

</form>

</div>


</article>

<div>
    <?php include 'footer.inc'; ?>
</div>
</body>
</html>