
<?php

$_SESSION['username'] = $user['username'];
?>



<!DOCTYPE html>
<html lang="en">
<head>
<?php include 'header_loggedin.inc'; ?>
 <link rel="stylesheet" href="style/style.css">
</head>




<?php
session_start();
if (!isset($_SESSION['username'])) {
  header("Location: login.php");
  exit();
}
?>

<h1>Welcome, <?php echo $_SESSION['username']; ?></h1>

<div>
    <?php include 'footer.inc'; ?>
</div>
</body>
</html>
