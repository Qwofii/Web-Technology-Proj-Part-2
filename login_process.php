<?php

session_start();


   
if ($_SERVER['REQUEST_METHOD']== 'POST'){
     require_once("settings.php");
    
    $conn = mysqli_connect($host, $username, $password, $database);
    
    if (!$conn){
        die("Database connection failed: ". mysqli_connect_error());
    } else {
        
        $input_username = trim($_POST['username']);
        $input_password = trim($_POST['password']);
    
        $query = "SELECT * FROM users WHERE username = '$input_username' AND password = '$input_password'";
   
        $result = mysqli_query($conn, $query);
        
        if ($user = mysqli_fetch_assoc($result)){
        
            $_SESSION['username'] = $user['username'];
            if ($user["role"] == "manager"){
                header('Location: manage.php');
                exit;
            } else {
                header('Location: welcome.php');
                exit;
            }
        } else {
             $_SESSION['error']= 'Invalid username or password. Please try again.';
             echo "<p> Invalid username or password. Please try again </p>";
             header('Location: login.php');
        }
    }
     
} else {
    $_SESSION['error']= 'Please log in.';
    echo "<p> Please log in first. </p>";
    header('Location: login.php');
    exit;
    
}

?>