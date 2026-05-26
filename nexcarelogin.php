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
  

  