<?php
require_once("settings.php");
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
} else if ($_SESSION['role'] == "manager"){
} else if ($_SESSION['role'] == "user"){
    header("Location: welcome.php");
    exit();
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
<?php include 'header_loggedin.inc'; ?>
 <link rel="stylesheet" href="style/style.css">
</head>

<body>

<?php
session_start();
if (!isset($_SESSION['username'])) {
  header("Location: login.php");
  exit();
}
?>

<h1>Welcome, <?php echo $_SESSION['username']; ?></h1>



 <h2 class="apply-sections">Manage Expressions of Interest</h2>
      <div style="padding: 1%">

        <table>
        <tr>
            <th>Job reference</th>
            <th>First Name</th>
            <th>Last Name</th>
        </tr>

        
        
    </table>
        <input type="checkbox" id="showAll" name="category[]" value="showAll">
        <label for="showAll">Show All</label>
        <br>
        <input
          type="checkbox"
          id="byJobRef"
          name="category[]"
          value="byJobRef">

        <label for="byJobRef">List by Job Reference</label>
        <br>

        <input type="checkbox" id="byFirstName" name="category[]" value="byFirstName">
        <label for="byFirstName">List by First Name</label>
        <br>

        <input type="checkbox" id="byLastName" name="category[]" value="byLastName">
        <label for="byLastName">List by Last Name</label>
        <br>

        <input type="checkbox" id="byNames" name="category[]" value="byNames">
        <label for="byNames">List by both First and Last name</label>
        <br>



<div>
    <?php include 'footer.inc'; ?>
</div>
</body>
</html>