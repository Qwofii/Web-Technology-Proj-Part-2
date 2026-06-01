





<!DOCTYPE html>
<html lang ="en">
    <head>
        <meta charset = "utf-8">
        
        <title> Welcome </title>
</head>
<body>

<?php

session_start();

if (isset($_SESSION['user'])){
   echo "Welcome, " .$_SESSION['user'];
} else {
    echo('Location: login.php');
}

?>

</body>
</html>