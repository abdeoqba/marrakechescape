<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Marrakech Escape | Our Story, Team, and Mission</title>
    <!-- Load Poppins Font -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <!-- Swiper CSS (included for consistency, though not used on this page) -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />

    <style>
        /* --- Brand Color Variables (Copied from Homepage) --- */
        :root {
            --color-dark-orange: #d4421c; /* CTA Primary */
            --color-light-orange: #f97a21; /* Accent/Secondary */
            --color-blue-light: #199fa8; /* Section Headers */
            --color-dark-blue: #057279; /* Primary Text/Navbar BG */
            --color-yellow: #ffa221; /* Highlight */
            --color-dark-yellow: #ff8b26; /* Accent */

            --font-primary: 'Poppins', sans-serif;
        }

        body {
            font-family: var(--font-primary);
            color: var(--color-dark-blue);
            background-color: #fcfcfc;
            scroll-behavior: smooth;
            padding-top: 68px; /* Space for fixed navbar */
        }

        /* --- Navbar Styles (Copied from Homepage) --- */
        .navbar-custom {
            transition: all 0.4s ease-in-out;
            background-color: var(--color-dark-blue) !important; /* Always dark blue on interior page */
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.2);
        }
        .navbar-custom .nav-link {
            color: #fcfcfc !important;
            font-weight: 600;
        }
        .navbar-custom .nav-link:hover {
            color: var(--color-light-orange) !important;
        }

        /* --- Page Header Section (Adapted from Hero) --- */
        #page-header {
            min-height: 40vh; /* Shorter than the full-screen hero */
            background: url('public/assets/images/marrakech-escape-photo-503.jpg') center center/cover no-repeat;
            position: relative;
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
            color: #fff;
            margin-bottom: 0;
            padding: 40px 0;
        }
        .header-overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            /* Gradient for an immersive look */
            background: linear-gradient(135deg, rgba(212, 66, 28, 0.6) 0%, rgba(5, 114, 121, 0.8) 100%);
        }
        .header-content {
            z-index: 10;
            max-width: 800px;
        }

        /* --- General Section Styles (Copied from Homepage) --- */
        .section-padding {
            padding: 80px 0;
        }
        @media (max-width: 768px) {
            .section-padding {
                padding: 60px 0;
            }
        }
        .section-title {
            color: var(--color-dark-blue);
            font-weight: 700;
            position: relative;
            display: inline-block;
            margin-bottom: 2rem;
        }
        .section-title::after {
            content: '';
            position: absolute;
            bottom: -10px;
            left: 50%;
            transform: translateX(-50%);
            width: 60px;
            height: 4px;
            background-color: var(--color-light-orange);
            border-radius: 2px;
        }

        /* --- Team Member Card Specifics (Copied from Homepage) --- */
        .team-card {
            background: #fff;
            padding: 2rem;
            border-radius: 12px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.08);
            text-align: center;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }
        .team-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 25px rgba(249, 122, 33, 0.15);
        }
        .team-card img {
            border: 4px solid var(--color-light-orange);
            object-fit: cover;
            width: 150px;
            height: 150px;
            margin-bottom: 1rem;
        }

        /* --- CTA Button (Copied from Homepage) --- */
        .btn-cta {
            background-color: var(--color-dark-orange);
            color: #fff;
            font-weight: 700;
            padding: 0.75rem 2rem;
            border-radius: 50px;
            transition: background-color 0.3s, transform 0.3s, box-shadow 0.3s;
            border: none;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.2);
        }
        .btn-cta:hover {
            background-color: var(--color-light-orange);
            color: #fff;
            transform: translateY(-3px);
            box-shadow: 0 8px 20px rgba(249, 122, 33, 0.5);
        }

        /* --- Footer (Copied from Homepage) --- */
        footer {
            background-color: var(--color-dark-blue);
            color: #fff;
        }
        footer a {
            color: var(--color-yellow);
            transition: color 0.3s;
        }
        footer a:hover {
            color: var(--color-light-orange);
        }
        .social-icon {
            font-size: 1.5rem;
            margin: 0 0.5rem;
        }
    </style>
</head>
<body>

    <?php include('../sections/header.php'); ?>

    <!-- 1. Page Header (Replaces Hero) -->
    <header id="page-header">
        <div class="header-overlay"></div>
        <div class="header-content">
            <h1 class="display-2 fw-bold mb-3">Who We Are</h1>
            <p class="lead mb-4">
                A local Moroccan travel agency dedicated to crafting authentic, personalized, and unforgettable journeys across our homeland.
            </p>
        </div>
    </header>

    <!-- 2. Our Story & Commitment (Main About Content) -->
    <section id="story" class="section-padding bg-light">
        <div class="container">
            <h2 class="section-title text-center mx-auto w-100 mb-5">Rooted in Local Expertise</h2>

            <!-- Our Heritage / Story Row -->
            <div class="row align-items-center g-5 mb-5 pb-5 border-bottom border-secondary-subtle">
                <div class="col-lg-6">
                    <h3 class="fw-bold mb-3" style="color: var(--color-dark-blue);">The Essence of Moroccan Hospitality</h3>
                    <p class="lead text-secondary mb-4">
                        Marrakech Escape was founded by local Moroccan travel experts with a deep passion for sharing the <b>authentic soul of their homeland</b>, beyond the tourist facade.
                    </p>
                    <p class="text-secondary">
                        We believe travel should be transformative. Our roots are in the vibrant community of Marrakech, and this connection allows us to craft experiences—not just tours—that are built on personal relationships, deep local knowledge, and an unwavering commitment to quality. We hand-select every guide, every riad, and every activity to ensure your journey is seamless, luxurious, and profoundly personal.
                    </p>
                </div>
                <div class="col-lg-6 text-center">
                    <!-- Placeholder Image of Moroccan Hospitality -->
                    <img src="https://placehold.co/600x450/d4421c/ffffff?text=Traditional+Mint+Tea+Ceremony" alt="Traditional Moroccan Mint Tea Ceremony" class="img-fluid rounded-3 shadow-lg">
                </div>
            </div>
            
            <!-- Our Commitment / Values Row -->
            <div class="row align-items-center g-5 pt-5">
                <div class="col-lg-6 text-center order-lg-2">
                    <!-- Placeholder Image of Desert Sunset -->
                    <img src="https://placehold.co/600x450/199fa8/ffffff?text=Sustainability+in+the+Sahara" alt="Sustainability in the Sahara" class="img-fluid rounded-3 shadow-lg">
                </div>
                <div class="col-lg-6 order-lg-1">
                    <h3 class="fw-bold mb-3" style="color: var(--color-dark-blue);">Our Commitment to Sustainable Travel</h3>
                    <p class="text-secondary mb-4">
                        We are dedicated to <b>sustainable travel practices</b> that benefit the environments and communities we visit. When you travel with us, you are supporting:
                    </p>
                    <ul class="list-unstyled">
                        <li class="mb-3"><i class="fas fa-check-circle me-2" style="color: var(--color-light-orange);"></i> <b>Fair Local Wages:</b> Ensuring our guides, drivers, and partners are compensated fairly and generously.</li>
                        <li class="mb-3"><i class="fas fa-check-circle me-2" style="color: var(--color-light-orange);"></i> <b>Cultural Preservation:</b> Promoting traditional arts and respecting local customs in every itinerary.</li>
                        <li class="mb-3"><i class="fas fa-check-circle me-2" style="color: var(--color-light-orange);"></i> <b>Low-Impact Tourism:</b> Implementing eco-friendly measures, especially in the sensitive desert and mountain regions.</li>
                    </ul>
                    <a href="contact" class="btn btn-cta mt-3">Plan a Responsible Trip</a>
                </div>
            </div>
        </div>
    </section>

    <!-- 3. Meet Our Leadership -->
    <section id="leadership" class="section-padding bg-white">
        <div class="container">
            <h2 class="section-title text-center mx-auto w-100 mb-5">Meet Our Leadership</h2>
            <p class="text-center text-secondary mb-5">
                The Moroccan locals who design and manage your extraordinary journey, committed to excellence and genuine connection.
            </p>
            <div class="row g-4 mt-4 text-center">
                
                <!-- Team Member 1 -->
                <div class="col-md-4 mb-4">
                    <div class="team-card">
                        <img src="https://placehold.co/150x150/d4421c/ffffff?text=Zoukayya" alt="Team Lead Zoukayya" class="rounded-circle">
                        <h4 class="fw-bold mb-1" style="color: var(--color-dark-orange);">Zoukayya Benali</h4>
                        <p class="text-muted">Founder & Head of Operations</p>
                        <p class="small text-secondary">Zoukayya handles all on-the-ground logistics, ensuring every transport and accommodation detail is executed flawlessly.</p>
                    </div>
                </div>

                <!-- Team Member 2 -->
                <div class="col-md-4 mb-4">
                    <div class="team-card">
                        <img src="https://placehold.co/150x150/057279/ffffff?text=Youssef" alt="Team Lead Youssef" class="rounded-circle">
                        <h4 class="fw-bold mb-1" style="color: var(--color-dark-blue);">Youssef Kadiri</h4>
                        <p class="text-muted">Lead Itinerary Designer</p>
                        <p class="small text-secondary">Youssef designs our personalized routes, blending classic sites with exclusive local experiences known only to Marrakechis.</p>
                    </div>
                </div>

                <!-- Team Member 3 -->
                <div class="col-md-4 mb-4">
                    <div class="team-card">
                        <img src="https://placehold.co/150x150/f97a21/ffffff?text=Aisha" alt="Team Lead Aisha" class="rounded-circle">
                        <h4 class="fw-bold mb-1" style="color: var(--color-light-orange);">Aisha Faouzi</h4>
                        <p class="text-muted">Client & Guest Relations</p>
                        <p class="small text-secondary">Aisha is your primary contact for tailoring your trip, focusing on your comfort and cultural interests from inquiry to departure.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <?php include('../sections/footer.php'); ?>

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <!-- Bootstrap 5 JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Swiper JS (included for consistency) -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

    <script>
        $(document).ready(function() {
            // --- Navbar Scroll Effect (Removed on interior page, kept fixed background) ---
            // --- Smooth Scrolling for all internal links on this page ---
            $('a[href*="#"]').on('click', function(e) {
                if (this.hash !== "") {
                    e.preventDefault();
                    var hash = this.hash;
                    $('html, body').animate({
                        scrollTop: $(hash).offset().top - 70 // Adjust for fixed navbar height
                    }, 800);
                }
            });
        });
    </script>

</body>
</html>
