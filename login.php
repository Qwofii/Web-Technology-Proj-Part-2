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
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nexcare Login</title>
<?php include 'header_loggedout.inc'; ?>
<link rel="stylesheet" href="style/style.css">

   
</head>

<section class="hero-banner">
    <h1>Log in</h1>
</section>

<body>

<?php if ($error != ""): ?>
        <p class="error-msg"><?php echo $error; ?></p>
    <?php endif; ?>
<div class="login-container">

    <form id="login" 
        method="post"
        action="login_process.php"
        >

    <label for="username" >Username</label>
    <input type="text" name="username" required><br>

    <label for="password" >Password</label>
    <input type="text" name="password" required><br>

    <a href= "signup.php"> Don't have an account yet? Sign up here</a>

    <button type="submit">Login</button>

    </form>
</div>




<div>
    <?php include 'footer.inc'; ?>
</div>
</body>
</html>
