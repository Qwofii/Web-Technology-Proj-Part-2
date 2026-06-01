<?php require_once 'settings.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="List of current job vacancies">
    <meta name="author" content="Aadi Shetty">
    <title>NexCare Jobs</title>
    <link rel="stylesheet" href="style/style.css">
    <style>
          .h3{ color: #1a5c36;
    margin-top: 30px;
    margin-bottom: 15px;
}
    </style>
</head>

<!--Ask ai on why link to CSS wasn't work, moved into Head Tag-->


<body>

<!--Navbar, assistance from Group Mates, credit to Sarvesh-->
 <?php include 'header.inc'; ?>


<!--Created a Hero Banner at the Top, assistance from Group Mate-->
<section class="hero-banner">
   
<h1 class="h1-white">Current vacancies</h1>
<p>These are the positions that are currently open in our Digital Services Team. Explore the full description of each job and apply online below</p>
</section>

<div style="text-align:center; padding: 20px;">
    <form method="get" action="jobs.php">
        <input type="text" name="search" placeholder="Search jobs..." 
               value="<?php echo isset($_GET['search']) ? htmlspecialchars($_GET['search']) : ''; ?>"
               style="padding: 10px; width: 300px; border-radius: 5px; border: 1px solid #ddd;">
        <button type="submit" style="padding: 10px 20px; background: #1a5c36; color: white; border: none; border-radius: 5px; cursor: pointer;">Search</button>
    </form>
</div>

<?php
if ($conn) {
    $search = isset($_GET['search']) ? mysqli_real_escape_string($conn, $_GET['search']) : '';
    $query = "SELECT * FROM jobs WHERE title LIKE '%$search%' OR ref_number LIKE '%$search%' ORDER BY ref_number ASC";
    $result = mysqli_query($conn, $query);

      if (!$result) {
        die("Query failed: " . mysqli_error($conn));
    }
        
    while ($job = mysqli_fetch_assoc($result)) {
        //Converts JSON text back to index arrays, assistance from AI
        $responsibilities = json_decode($job['responsibilities'], true);
        $requirements = json_decode($job['requirements'], true);
?>

<!--jobs -->
    <div class="jobs-container">
    <div class="job-card">
        <h2><?php echo htmlspecialchars($job['title']); ?></h2>
        <p>Reference Number: <strong><?php echo htmlspecialchars($job['ref_number']); ?></strong></p>
        <p><?php echo htmlspecialchars($job['summary']); ?></p>
        <span class="job-tag">Full Time</span>

        <section>
            <h3>Salary &amp; Reporting Line</h3>
            <p>The total remuneration package is between <strong><?php echo htmlspecialchars($job['salary_range']); ?></strong> with <?php echo htmlspecialchars($job['salary_note']); ?>.</p>
            <p>This role reports to the <strong><?php echo htmlspecialchars($job['reporting_line']); ?></strong>.</p>
        </section>

        <section>
            <h3>Key Responsibilities</h3>
            <p>As a <?php echo htmlspecialchars($job['title']); ?> you will be responsible for:</p>
            <ol>
                <?php foreach ($responsibilities as $item): ?>
                    <li><?php echo htmlspecialchars($item); ?></li>
                <?php endforeach; ?>
            </ol>
        </section>

        <h3>Essential Requirements</h3>
        <ul>
            <?php foreach ($requirements as $req): ?>
                <li><?php echo htmlspecialchars($req); ?></li>
            <?php endforeach; ?>
        </ul>

        <p><strong>Ready to apply for <?php echo htmlspecialchars($job['ref_number']); ?>?</strong></p>
    </div>
</div>

<?php
    }
    mysqli_close($conn);
}
?>

    <div class="jobs-page">
    <main>
        <aside class="sidebar">
            <h3>Quick Links</h3>
            <ul>
                <li><a href="apply.php">How to Apply</a></li>
            </ul>
            <h3>Contact HR</h3>
            <p>support@nexcare.galaxy</p>
        </aside>
    </main>
</div>

<!-- footer -->
<?php include 'footer.inc'; ?>   

</body>
</html>
