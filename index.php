<?php require_once 'settings.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nexcare Galactic Healthcare</title>
    <link rel="stylesheet" href="style/style.css">

    <!-- 1. EMBEDDED CSS (Inside the Head) -->
    <style>
        .catalog-section h3 {
            color: #000000; /* Galactic Purple color */
            text-transform: uppercase;
            letter-spacing: 1px;
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
 <main>
        <section class="hero-banner">
            <h2>Nexcare Galactic</h2>
            <p>Your Bio-Signatures are our Priority</p>
            <div class="search-container">
                <form action="#">
                    <!-- WAVE FIX: Label added here -->
                    <label for="search-input" class="sr-only">Search medications or parts</label>
                    <input type="text" id="search-input" placeholder="Search database...">
                    <button type="submit">Scan Database</button>
                </form>
            </div>
        </section>

        <section class="catalog-section">
            <h3>Interstellar Medical Supplies</h3>
            <table class="product-table">
                <thead>
                    <tr>
                        <th scope="col">Specimen Type</th>
                        <th scope="col">Product Name</th>
                        <th scope="col">Concentration</th>
                        <th scope="col">Price (Credits)</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td rowspan="2" class="category-cell">Bio-Repairs</td>
                        <td>Star-Paracetamol</td>
                        <td>900% Purity (50 Tabs)</td>
                        <td>4.50</td>
                    </tr>
                    <tr>
                        <td>Nebula-Ibuprofen</td>
                        <td>Anti-Gravity Liquid</td>
                        <td>8.95</td>
                    </tr>
                </tbody>
            </table>
        </section>
    </main>
 
    <footer>

            <div class="acknowledgement">
                <p>We at Nexcare acknowledge the Aboriginal and Torres Strait Islanders and the traditional custodians of the lands on which we work and learn, and we pay our respects to Elders past and present.</p>
            </div>
        <div class="footer-links">
            <a href="https://atlassian.net">Mission Status (Jira)</a> |
            <a href="https://github.com">Ship Code (GitHub)</a> |
            <a href="mailto:106499895@student.swin.edu.au">Contact (support@nexcare.galaxy)</a>
        </div>
        <p style="opacity: 0.85;">&copy; 2026 NexCare Galactic. Milky Way Federation Approved.</p>
    </footer>
</body>
</html>