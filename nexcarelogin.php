<?php
session_start();
require_once "settings.php";

$error = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    
    if ($conn) {
        // Get user input
        $username = trim($_POST['username']);
        $password = trim($_POST['password']);

        // Query to check credentials
        $query = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
        $result = mysqli_query($conn, $query);
        $userRow = mysqli_fetch_assoc($result);

        // redirects to the manage php page 
        if ($userRow) {
            $_SESSION['username'] = $userRow['username'];
            header("Location: manage.php");
            exit();
        } else {
            $error = "Incorrect username or password.";
        }
    
        mysqli_close($conn);
    } else {
        $error = "Unable to connect to the database.";
    }
}
?>

<!--php is taken from login php from labs -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nexcare Login</title>
    <link rel="stylesheet" href="style/style.css">
</head>
<body>
    <!--Navbar from previous project-->
    <?php include 'header.inc'; ?>

<section class="hero-banner">
    <h1>HR Manager Login</h1>
</section>

<?php if ($error != ""): ?>
        <p class="error-msg"><?php echo $error; ?></p>
    <?php endif; ?>
<div class="login-container">
    <form method="post" action="nexcarelogin.php">
    <label for="username">Username</label>
    <input type="text" id="username"  name="username" required>

    <label for="password">Password</label>
    <input type="password" id="password" name="password" required>

     <button type="submit">Login</button>
    </form>
</div>

</body>
</html>

  