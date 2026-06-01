<?php 
require_once("settings.php");
$conn = mysqli_connect($host, $username, $password, $database);

$searchby = $_POST['search'];
$search_input = $_POST['search_input'];

if (isset($_POST['submit_search'])) {
    if (isset($searchby)){
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