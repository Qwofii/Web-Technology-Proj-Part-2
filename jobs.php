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

<<<<<<< HEAD

<body>
=======
<body>
    <!-- Dark/Light mode anchor targets (pure CSS method) -->
    <a id="dark"></a>
    <a id="light"></a>
>>>>>>> sarvesh

<!--Navbar, assistance from Group Mates, credit to Sarvesh-->
   <header>
        <nav class="navbar">
            <div class="brand-area">
<<<<<<< HEAD
                <a href="https://qwofii.github.io/Web-Technology-Proj/index.html">
=======
                <a href="index.php">
>>>>>>> sarvesh
                <img src="images/logo.png" alt="NexCare Logo" class="logo-img"></a>
                <div>
                    <p class="brand-name">NexCare Galactic Services</p>
                    <p class="brand-slogan">Delivering care across the Andromeda Galaxy.</p>
                </div>
            </div>
            <ul class="nav-links">
<<<<<<< HEAD
                <li><a href="https://qwofii.github.io/Web-Technology-Proj/index.html">Home</a></li>
                <li><a href="https://qwofii.github.io/Web-Technology-Proj/about.html">About</a></li>
                <li><a href="https://qwofii.github.io/Web-Technology-Proj/jobs.html">Jobs</a></li>
                <li><a href="https://qwofii.github.io/Web-Technology-Proj/apply.html">Apply</a></li>
=======
                <li><a href="index.php">Home</a></li>
                <li><a href="about.php">About</a></li>
                <li><a href="jobs.php">Jobs</a></li>
                <li><a href="apply.php">Apply</a></li>
                            <li>
                    <a class="theme-switch switch-to-dark"  href="#dark">🌙 Dark Mode</a>
                    <a class="theme-switch switch-to-light" href="#light">☀️ Light Mode</a>
                </li>
>>>>>>> sarvesh
            </ul>
        </nav>
    </header>


<!--Created a Hero Banner at the Top, assistance from Group Mate-->
<section class="hero-banner">
   
<h1 class="h1-white">Current vacancies</h1>
<p>These are the positions that are currently open in our Digital Services Team. Explore the full description of each job and apply online below</p>
</section>

<<<<<<< HEAD
<?php
$conn = mysqli_connect($host, $user, $pass, $dbname);

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
=======
<!--job 1-->
    <div class="jobs-container">

        <div class="job-card">
            <h2>System Analyst</h2>
            <p>Reference Number: <strong>HT001</strong></p>
            <p>Improve and monitor our system activities. Work with users to improve features and test new software</p>
<p>Full Time | Remote-Friendly or Office work options | $100,000+ salary</p>



 <section>
            <h3>Salary &amp; Reporting Line</h3>
            <p>The total remuneration package is between <strong>$100,000 to $110,00 per annum</strong> with Superannuation added </p>
</section>

<section>
    <h3>Key Responsibilities</h3>
    <p>As a System Analyst you will be responsible for:</p>
    <ol>
      <li>Creating and Building up a secure portal for users to use</li>
      <li>Researching and Collaborating with other Species when creating secure web applications</li>
      <li>Integrating and Complying with National Health Data Standards, including peer code review for all pull requests</li>
      <li>Monitoring our systems and responding immediately to any errors</li>
    </ol>

</section>

<h3>Essential Requirements</h3>
<ul>
  <li>Minimum 2 years of professional developer experience</li> 
  <li>Fluent in any spoken language from a Alien Species</li>
  <li>Proficency in React, JavaScript and Node.js</li>
  <li>Written and Communication Skills</li>
</ul>

<p><strong>Ready to apply for HT001?</strong></p>
</div>

</div>

<!--job 2-->
    <div class="jobs-container">
            
        <div class="job-card">
            <h2>Intergalactic Software Engineer</h2>
            <p>Reference Number: <strong>HT002</strong></p>
            <p>Use your computer science skills in building our major applications while venturing out in space</p>
<p>Full Time | Space-Station | $150,000+ salary</p>


 <section>
            <h3>Salary &amp; Reporting Line</h3>
            <p>The total remuneration package is between <strong>$150,000 to $160,000 per annum</strong> with Superannuation and Health Bonus added </p>
</section>

<section>
    <h3>Key Responsibilities</h3>
    <p>As a Intergalactic Software Engineer you will be responsible for:</p>
    <ol>
      <li>Creating Major Application projects</li>
      <li>Collaborating with other species at Space Station to research and create new application technologies</li>
      <li>Integrating and Complying with National Health Data Standards, including peer code review for all pull requests</li>
      <li>Improving user experience and testing applications</li>
    </ol>

</section>

<h3>Essential Requirements</h3>
<ul>
  <li>Minimum 2 years of professional developer experience</li> 
  <li>Meeting ISS requirements set by NASA</li>
  <li>Fluent in any spoken language from a Alien Species</li>
  <li>Proficency in React, JavaScript and Node.js</li>
  <li>Written and Communication Skills</li>
</ul>

<p><strong>Ready to apply for HT002?</strong></p>
</div>

</div>

 <div class = "jobs-page">
<main>

<!--Created the aside element but wasn't sure where to place it so I asked AI-->
<aside class="sidebar">
    <h3> Quick Links</h3>
      <ul>
        <li><a href="index.php">How to Apply</a></li>
      </ul>
      <h3>Contact HR</h3>
      <p>support@nexcare.galaxy</p>
</aside>

</main>
>>>>>>> sarvesh
</div>

    <footer>
        <div class="footer-links">
<<<<<<< HEAD
            <a href="https://webtechprojectsassignment1.atlassian.net/jira/software/projects/SCRUM/boards/1?atlOrigin=eyJpIjoiOTkwOTJiYzI1MDhlNDIyOGI4NDFhN2U3N2QzZDFlYzEiLCJwIjoiaiJ9">Mission Status (Jira)</a> |
            <a href="https://github.com/Qwofii/Web-Technology-Proj.git">Ship Code (GitHub)</a> |
=======
            <a href="https://atlassian.net">Mission Status (Jira)</a> |
            <a href="https://github.com">Ship Code (GitHub)</a> |
>>>>>>> sarvesh
            <a href="mailto:106499895@student.swin.edu.au">Contact (support@nexcare.galaxy)</a>
        </div>
        <p style="opacity: 0.85;">&copy; 2026 NexCare Galactic. Milky Way Federation Approved.</p>
    </footer>
</body>
<<<<<<< HEAD
</html>
=======
</html>
>>>>>>> sarvesh
