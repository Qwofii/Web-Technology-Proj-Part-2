<?php
session_start();
require_once "settings.php";

$error = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $dbconn = @mysqli_connect($host, $user, $pwd, $sql_db);

    if ($dbconn) {
        // Get user input
        $username = trim($_POST['username']);
        $password = trim($_POST['password']);

        // Query to check credentials
        $query = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
        $result = mysqli_query($dbconn, $query);
        $userRow = mysqli_fetch_assoc($result);

        // redirects to the manage php page 
        if ($userRow) {
            $_SESSION['username'] = $userRow['username'];
            header("Location: manage.php");
            exit();
        } else {
            $error = "Incorrect username or password.";
        }
    
        mysqli_close($dbconn);
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
   <header>
        <nav class="navbar">
            <div class="brand-area">
                <a href="https://qwofii.github.io/Web-Technology-Proj/index.html">
                <img src="images/logo.png" alt="NexCare Logo" class="logo-img"></a>
                <div>
                    <p class="brand-name">NexCare Galactic Services</p>
                    <p class="brand-slogan">Delivering care across the Andromeda Galaxy.</p>
                </div>
            </div>
            <ul class="nav-links">
                <li><a href="https://qwofii.github.io/Web-Technology-Proj/index.html">Home</a></li>
                <li><a href="https://qwofii.github.io/Web-Technology-Proj/about.html">About</a></li>
                <li><a href="https://qwofii.github.io/Web-Technology-Proj/jobs.html">Jobs</a></li>
                <li><a href="https://qwofii.github.io/Web-Technology-Proj/apply.html">Apply</a></li>
            </ul>
        </nav>
    </header>    

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

  