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
    <button type="submit" name="submit_query" >Show All</button>
</form>

 <form action="" method="POST">
        
       <input type="text" name="search_input" placeholder="Search..." />

       <label for="search"> by</label>
        <select name="search">
            <option value="byJobRef">Job Reference</option>
            <option value="firstName">First Name</option>
            <option value="lastName">Last Name</option>
            <option value="fullName">Full Name</option>
        </select>

        <button type="submit" name="submit_search">Search</button>

</form>


<?php

$searchby = $_POST['search'];
$search_input = $_POST['search_input'];
$sort_category = $_POST['sort_category'];
$sortby = $_POST['sort_order'];


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

if (isset($_POST['submit_search'])) {
    if ($searchby == "byJobRef"){
        $query = "SELECT * FROM eoi WHERE jobRef LIKE $search_input";
        $stmt = $conn->prepare($query);
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
     
}

    if (isset($_POST['submit_search'])) {
    if ($searchby == "firstName"){
        
        $query = "SELECT * FROM eoi WHERE firstName = '$search_input'";
        $stmt = $conn->prepare($query);
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
    
    }

    if (isset($_POST['submit_search'])) {
    if ($searchby == "lastName"){
        $query = "SELECT * FROM eoi WHERE lastName = '$search_input'";
        $stmt = $conn->prepare($query);
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
    
    }

     if (isset($_POST['submit_search'])) {
    if ($searchby == "fullName"){
        $query = "SELECT * FROM eoi WHERE CONCAT(firstName, ' ', lastName) = '$search_input'";
        $stmt = $conn->prepare($query);
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
    
    }

?>


 <h4 class="apply-sections">Delete Expressions of Interest</h4>
      <div style="padding: 1%">

<br>
 <form action="" method="POST" onsubmit="return confirm('Permanently delete this record?');">
        <label for="delete"> Delete by Job reference</label>
        <br>
       <input type="text" name="delete_input" placeholder="Delete" />
        <button type="submit" name="delete_search">Delete</button>

</form>
    
<?php


$delete_input = $_POST['delete_input'];

if (isset($_POST['delete_search'])) {
    $delete = $conn->prepare("DELETE FROM eoi WHERE jobRef = '$delete_input'");
    
    $delete->execute();
    $delete->close();
}
?>
       



<div>
    <?php include 'footer.inc'; ?>
</div>
</body>
</html>