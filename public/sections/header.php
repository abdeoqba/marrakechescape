<?php
// This navigation bar uses clean URLs managed by the .htaccess file.
// Links point to the public PHP files (e.g., /about points to public/about.php).
?>
<!-- Navigation Bar -->
<nav id="navbar" class="navbar navbar-expand-lg navbar-dark fixed-top navbar-custom">
    <div class="container">
        <!-- Logo/Brand Link. Updated href to use the /home route. -->
        <a class="navbar-brand text-uppercase fw-bold" href="/home">
            <img src="asset/image/marrakech-escape-logo-600.png" width="160px" alt="Marrakech Escape Logo">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
            <ul class="navbar-nav">
                <!-- Links updated from #anchors to clean URLs (e.g., /about, /program) -->
                <li class="nav-item"><a class="nav-link" href="home">Home</a></li>
                <li class="nav-item"><a class="nav-link" href="about">About</a></li>
                <li class="nav-item"><a class="nav-link" href="category">Programs</a></li>
                <li class="nav-item"><a class="nav-link" href="reviews">Reviews</a></li>
                <li class="nav-item"><a class="nav-link" href="faq">FAQ</a></li>
                <li class="nav-item"><a class="nav-link" href="contact">Contact</a></li>
            </ul>
        </div>
    </div>
</nav>
