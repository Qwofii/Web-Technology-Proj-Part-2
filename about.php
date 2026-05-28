<?php require_once 'settings.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="description" content="About the company">
    <meta name="keywords" content="About, company, team">
    <meta name="author" content="Sinan, Sophia">
    <title>About Us | NexCare Galactic Healthcare</title>
    <link rel="stylesheet" href="style/style.css">
    <style>
    h2 {
        letter-spacing: 0.5px;
    }
    .contributions-grid {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 20px;
        margin-top: 30px;
    }
    .member-card {
        background: var(--bg-card, #fff);
        border: 1px solid var(--border, #edf2f7);
        border-radius: 10px;
        padding: 25px;
        box-shadow: 0 2px 6px var(--shadow, rgba(0,0,0,0.05));
    }
    .member-card h3 {
        color: var(--text-accent, #27ae60);
        font-size: 1.2rem;
        margin-bottom: 8px;
        text-transform: none;
        letter-spacing: normal;
    }
    .member-card .quote {
        font-style: italic;
        color: var(--text-muted, #7f8c8d);
        font-size: 0.9rem;
        margin-bottom: 15px;
        border-left: 3px solid #27ae60;
        padding-left: 10px;
    }
    .member-card .proj-label {
        font-size: 0.75rem;
        font-weight: bold;
        text-transform: uppercase;
        letter-spacing: 1px;
        color: var(--text-brand, #1a5c36);
        margin-top: 12px;
        margin-bottom: 4px;
    }
    .member-card p {
        font-size: 0.92rem;
        margin: 0;
    }
    @media (max-width: 768px) {
        .contributions-grid { grid-template-columns: 1fr; }
    }
    </style>
</head>

<body>
    <!-- Dark/Light mode anchor targets (pure CSS method) -->
    <a id="dark"></a>
    <a id="light"></a>
    <header>
        <nav class="navbar">
            <div class="brand-area">
                <a href="index.php">
                <img src="images/logo.png" alt="NexCare Logo" class="logo-img"></a>
                <div>
                    <p class="brand-name">NexCare Galactic Services</p>
                    <p class="brand-slogan">Delivering care across the Andromeda Galaxy.</p>
                </div>
           </div>
            <ul class="nav-links">
                <li><a href="index.php">Home</a></li>
                <li><a href="about.php">About</a></li>
                <li><a href="jobs.php">Jobs</a></li>
                <li><a href="apply.php">Apply</a></li>
                <li>
                    <a class="theme-switch switch-to-dark"  href="#dark">🌙 Dark Mode</a>
                    <a class="theme-switch switch-to-light" href="#light">☀️ Light Mode</a>
                </li>
            </ul>
        </nav>
    </header>

    <section class="hero-banner">
        <h1>About Us</h1>
        <p>At NexCare, we are dedicated to revolutionizing the way you access healthcare across the stars. Our mission is to provide seamless, warp-speed, and species-specific pharmaceutical services that empower you to master your biology—no matter which sector of the multiverse you call home.</p>
    </section>

    <main>
        <section class="catalog-section">
            <h2>Our Story</h2>
            <p>Founded by a team of intergalactic healthcare visionaries, NexCare was born from the desire to break down barriers and bring personalized medicine to every corner of the cosmos. We understand that in a universe filled with diverse lifeforms, one-size-fits-all solutions simply won't cut it. That's why we've harnessed cutting-edge technology and a vast network of galactic pharmacies to create a platform that delivers tailored healthcare solutions at the speed of light.</p>
        </section>

        <div class="catalog-section">
            <h2>Group Details</h2>
            <p>Our team is a vibrant mix of bioengineers, pharmacologists, and cosmic health enthusiasts who are passionate about pushing the boundaries of what's possible in healthcare. We come from all walks of life and all corners of the universe, united by a common goal: to make healthcare accessible, personalized, and efficient for everyone, everywhere.</p>
            <br>
            <ul>
                <li>Group Name: <strong>SASS</strong>
                    <ul>
                        <li>Class Day: Thursday</li>
                        <li>Class Time: 4:30 PM - 6:30 PM</li>
                    </ul>
                </li>
            </ul>
        </div>

        <section class="catalog-section">
            <h2>Member Contributions and Quotes</h2>

            <?php
            $result = $conn->query("SELECT * FROM members ORDER BY id ASC");

            if ($result && $result->num_rows > 0):
            ?>
            <div class="contributions-grid">
                <?php while ($member = $result->fetch_assoc()): ?>
                <div class="member-card">
                    <h3><?php echo htmlspecialchars($member['name']); ?></h3>
                    <div class="quote">
                        "<?php echo htmlspecialchars($member['quote']); ?>"
                        <br><em>(<?php echo htmlspecialchars($member['quote_translation']); ?>)</em>
                    </div>
                    <div class="proj-label">Project 1 Contribution</div>
                    <p><?php echo htmlspecialchars($member['proj1_contribution']); ?></p>
                    <div class="proj-label">Project 2 Contribution</div>
                    <p><?php echo htmlspecialchars($member['proj2_contribution']); ?></p>
                </div>
                <?php endwhile; ?>
            </div>
            <?php else: ?>
                <p style="color:red;">Could not load member data. Please make sure the <strong>members</strong> table exists and is populated.</p>
            <?php endif; ?>

            <figure>
                <img src="images/banan.jpeg" alt="Team Photo" class="team-photo">
                <figcaption>a group photo from our own individual planets</figcaption>
            </figure>

            <?php
            // Rerun query for the fun facts table
            $result2 = $conn->query("SELECT name, dream_job, coding_snack, hometown FROM members ORDER BY id ASC");
            if ($result2 && $result2->num_rows > 0):
            ?>
            <table>
                <caption>Fun facts about our team!</caption>
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Dream Job</th>
                        <th>Coding Snack</th>
                        <th>Hometown</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($row = $result2->fetch_assoc()): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($row['name']); ?></td>
                        <td><?php echo htmlspecialchars($row['dream_job']); ?></td>
                        <td><?php echo htmlspecialchars($row['coding_snack']); ?></td>
                        <td><?php echo htmlspecialchars($row['hometown']); ?></td>
                    </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
            <?php endif; ?>

        </section>
    </main>

    <footer>
        <div class="footer-links">
            <a href="https://atlassian.net">Mission Status (Jira)</a> |
            <a href="https://github.com">Ship Code (GitHub)</a> |
            <a href="mailto:106499895@student.swin.edu.au">Contact (support@nexcare.galaxy)</a>
        </div>
        <p style="opacity: 0.85;">&copy; 2026 NexCare Galactic. Milky Way Federation Approved.</p>
    </footer>
</body>
</html>