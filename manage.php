<?php

session_start();

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
} else if ($_SESSION['role'] == "manager"){
} else if ($_SESSION['role'] == "user"){
    header("Location: welcome.php");
    exit();
}

require_once("settings.php");
$conn = mysqli_connect($host, $username, $password, $database);



?>


<!DOCTYPE html>
<html lang="en">
<head>
<?php include 'header_loggedin.inc'; ?>
 <link rel="stylesheet" href="style/style.css">
</head>

<body>


<h1>Welcome, <?php echo $_SESSION['username']; ?></h1>



 <h2 class="apply-sections">Manage Expressions of Interest</h2>
      <div style="padding: 1%">

<form method="POST" action="">
    <button type="submit" name="submit_query" >Display All Expressions</button>
</form>

<form action="/search" method="GET" role="search">
  <label for="site-search"></label>
  <input type="search" id="site-search" name="search" placeholder="Search..." required>
</form>

<form action="" method= "POST">
<label for="searchby">By:</label>

<select name="searchby" id="eoi_options">
  <option value="byJobRef">Job Reference</option>
  <option value="firstName">First Name</option>
  <option value="lastName">LastName</option>
  <option value="fullName">Full Name</option>
</select>
 <button type="submit">Submit Choice</button>
</form>

<?php

if (isset($_POST['submit_query'])) {
    
    $stmt = $conn->prepare("SELECT * FROM eoi");
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result){
        echo "<table>";
        echo "<tr>";
        echo "<th> Job reference</th>";
        echo "<th> User ID </th>";
        echo "<th> First Name</th>";
        echo "<th> Last Name</th>";
        echo "<th> Email </th>";
        echo "<th> Phone </th>";
        echo "<th> Skills </th>";
        echo "<th> Other Skills </th>";
        echo "</tr>";
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>" . $row['jobRef'] . "</td>";
             echo "<td>" . $row['userID'] . "</td>";
            echo "<td>" . $row['firstName'] . "</td>";
            echo "<td>" . $row['lastName'] . "</td>";
            echo "<td>" . $row['email'] . "</td>";
            echo "<td>" . $row['phone'] . "</td>";
            echo "<td>" . $row['skills'] . "</td>";
            echo "<td>" . $row['otherSkills'] . "</td>";
            echo "</tr>";
        }
        echo "</table>";
    } else { 
        echo "<p> There are no expressions to display </p>";
    }
   
    $stmt->close();
}

if (isset($_POST['byJobRef'])) {
    $search_input = htmlspecialchars(trim($_GET['query']));
    $stmt = $conn->prepare("SELECT * FROM eoi WHERE jobRef = $search_input");
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result){
        echo "<table>";
        echo "<tr>";
        echo "<th> Job reference</th>";
        echo "<th> User ID </th>";
        echo "<th> First Name</th>";
        echo "<th> Last Name</th>";
        echo "<th> Email </th>";
        echo "<th> Phone </th>";
        echo "<th> Skills </th>";
        echo "<th> Other Skills </th>";
        echo "</tr>";
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>" . $row['jobRef'] . "</td>";
             echo "<td>" . $row['userID'] . "</td>";
            echo "<td>" . $row['firstName'] . "</td>";
            echo "<td>" . $row['lastName'] . "</td>";
            echo "<td>" . $row['email'] . "</td>";
            echo "<td>" . $row['phone'] . "</td>";
            echo "<td>" . $row['skills'] . "</td>";
            echo "<td>" . $row['otherSkills'] . "</td>";
            echo "</tr>";
        }
        echo "</table>";
    } else { 
        echo "<p> There are no expressions to display </p>";
    }
   
    $stmt->close();
}


?>

    
       



<div>
    <?php include 'footer.inc'; ?>
</div>
</body>
</html>