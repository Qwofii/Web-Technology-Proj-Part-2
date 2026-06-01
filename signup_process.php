<?php

session_start();

  
if ($_SERVER['REQUEST_METHOD']== 'POST'){
 
    require_once("settings.php");
     
    $conn = mysqli_connect($host, $username, $password, $database);
    if (!$conn){
      die("Database connection failed: ". mysqli_connect_error());
    }
     
    $input_firstname = trim($_POST['firstname']);
    $input_lastname = trim($_POST['lastname']);
    $input_email = trim($_POST['email']);
    $input_username = trim($_POST['username']);
    $input_password = trim($_POST['password']);
    $hashed_password = password_hash($input_password, PASSWORD_DEFAULT);


    
    $query = "INSERT INTO `users`(`firstName`, `lastName`, `email`, `username`, `password`, `role`) VALUES ('$input_firstname','$input_lastname','$input_email','$input_username', '$hashed_password','user')";
    
    $result = mysqli_query($conn, $query);


    // Then insert into database:   
   // $stmt = $conn->prepare("INSERT INTO users (username, password) VALUES (?, ?)");
    //$stmt->bind_param("ss", $input_username, $hashed_password);
    //$stmt->execute();
   //??? Need to bind param!!!
    
    if ($result){
    
            header('Location: manage.php');
            exit();

    }
} else {
    $_SESSION['error']= 'Invalid details. Please try again.';
    header('Location: login.php');
    exit();
    
}
// mysqli_close($conn);

?>