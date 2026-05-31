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
   <header>
        <nav class="navbar">
            <div class="brand-area">
                <a href="https://qwofii.github.io/Web-Technology-Proj/index.html">
                <img src="images/logo.png" alt="NexCare Logo" class="logo-img"></a>
                <div>
                    <p class="brand-name">NexCare Galactic Services</p>
                    <p class="brand-slogan">Delivering care across the Andromeda Galaxy.</p>
                </div>
            </div>
            <ul class="nav-links">
                <li><a href="https://qwofii.github.io/Web-Technology-Proj/index.html">Home</a></li>
                <li><a href="https://qwofii.github.io/Web-Technology-Proj/about.html">About</a></li>
                <li><a href="https://qwofii.github.io/Web-Technology-Proj/jobs.html">Jobs</a></li>
                <li><a href="https://qwofii.github.io/Web-Technology-Proj/apply.html">Apply</a></li>
            </ul>
        </nav>
    </header>


<!--Created a Hero Banner at the Top, assistance from Group Mate-->
<section class="hero-banner">
   
<h1 class="h1-white">Current vacancies</h1>
<p>These are the positions that are currently open in our Digital Services Team. Explore the full description of each job and apply online below</p>
</section>

<?php
$conn = mysqli_connect($host, $user, $pwd, $sql_db);

if ($conn) {
    $query = "SELECT * FROM jobs ORDER BY ref_number ASC";
    $result = mysqli_query($conn, $query);
    
    while ($job = mysqli_fetch_assoc($result)) {
        //Converts JSON text back to index arrays
        $responsibilities = json_decode($job['responsibilities'], true);
        $requirements = json_decode($job['requirements'], true);
?>
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

    <footer>
        <div class="footer-links">
            <a href="https://webtechprojectsassignment1.atlassian.net/jira/software/projects/SCRUM/boards/1?atlOrigin=eyJpIjoiOTkwOTJiYzI1MDhlNDIyOGI4NDFhN2U3N2QzZDFlYzEiLCJwIjoiaiJ9">Mission Status (Jira)</a> |
            <a href="https://github.com/Qwofii/Web-Technology-Proj.git">Ship Code (GitHub)</a> |
            <a href="mailto:106499895@student.swin.edu.au">Contact (support@nexcare.galaxy)</a>
        </div>
        <p style="opacity: 0.85;">&copy; 2026 NexCare Galactic. Milky Way Federation Approved.</p>
    </footer>
</body>
</html>
