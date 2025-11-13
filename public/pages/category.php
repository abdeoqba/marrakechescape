<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Our Programs | Marrakech Escape - Desert, Mountains, and Cities</title>
    <!-- Load Poppins Font -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

    <style>
        /* --- Brand Color Variables (Copied from other pages) --- */
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
            padding-top: 80px; /* Space for fixed navbar */
        }

        /* --- Navbar Styles --- */
        .navbar-custom {
            transition: all 0.4s ease-in-out;
            background-color: var(--color-dark-blue) !important;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.2);
        }
        .navbar-custom .nav-link {
            color: #fcfcfc !important;
            font-weight: 600;
        }
        .navbar-custom .nav-link:hover {
            color: var(--color-light-orange) !important;
        }
        /* Active link highlight for this page */
        .navbar-custom .nav-link.active {
            color: var(--color-yellow) !important;
        }

        /* --- Page Header Section --- */
        #page-header {
            min-height: 40vh;
            background: url('https://placehold.co/1920x600/057279/ffffff?text=Programs+Page+Banner') center center/cover no-repeat;
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
            background: linear-gradient(135deg, rgba(5, 114, 121, 0.6) 0%, rgba(249, 122, 33, 0.8) 100%);
        }
        .header-content {
            z-index: 10;
            max-width: 900px;
        }

        /* --- General Section Styles --- */
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

        /* --- Program Card Styling --- */
        .program-card {
            border: none;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            height: 100%;
            display: flex;
            flex-direction: column;
        }

        .program-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
        }

        .program-card img {
            height: 250px;
            object-fit: cover;
            width: 100%;
        }

        .program-card .card-body {
            padding: 1.5rem;
            flex-grow: 1;
            display: flex;
            flex-direction: column;
        }

        .program-card h4 {
            color: var(--color-dark-blue);
            font-weight: 700;
            margin-bottom: 0.5rem;
        }

        .program-details {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-top: auto; /* Push to the bottom */
            padding-top: 1rem;
            border-top: 1px solid #eee;
        }

        .program-price {
            font-size: 1.5rem;
            font-weight: 700;
            color: var(--color-dark-orange);
        }
        .program-price small {
            font-size: 0.8rem;
            font-weight: 400;
            color: #6c757d;
        }


        /* --- CTA Button (Copied from Homepage) --- */
        .btn-cta {
            background-color: var(--color-dark-orange);
            color: #fff;
            font-weight: 600;
            padding: 0.5rem 1.5rem;
            border-radius: 50px;
            transition: background-color 0.3s, transform 0.3s, box-shadow 0.3s;
            border: none;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.2);
        }
        .btn-cta:hover {
            background-color: var(--color-light-orange);
            color: #fff;
            transform: translateY(-2px);
            box-shadow: 0 6px 15px rgba(249, 122, 33, 0.4);
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

    <!-- 1. Page Header -->
    <header id="page-header">
        <div class="header-overlay"></div>
        <div class="header-content">
            <h1 class="display-1 fw-bold mb-3">Your Moroccan Adventure Awaits</h1>
            <p class="lead mb-4">
                Explore our hand-crafted selection of tours, from the vast Sahara to the vibrant Imperial Cities. Every journey is fully customizable.
            </p>
        </div>
    </header>

    <!-- 2. Programs Grid Section -->
    <section id="programs-grid" class="section-padding bg-white">
        <div class="container">
            <h2 class="section-title text-center mx-auto w-100 mb-5">Our Signature Tour Categories</h2>
            
            <div class="row g-4 justify-content-center">
                
                <!-- Program Card 1: Sahara Desert Expeditions -->
                <div class="col-lg-6 col-xl-4 d-flex">
                    <div class="card program-card">
                        <img src="https://placehold.co/800x600/ff8b26/ffffff?text=Sahara+Desert" alt="Camels walking across the Sahara dunes at sunset" class="card-img-top">
                        <div class="card-body">
                            <span class="badge rounded-pill text-bg-warning mb-2 fw-normal">4-7 Days</span>
                            <h4>Sahara Desert Expeditions</h4>
                            <p class="card-text text-secondary">Venture deep into the Erg Chebbi dunes for authentic Berber camp experiences, camel trekking, and unparalleled stargazing.</p>
                            
                            <div class="program-details">
                                <span class="program-price">
                                    $599 <small>/ per person</small>
                                </span>
                                <a href="contact.html" class="btn btn-cta">Inquire Now</a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Program Card 2: Imperial Cities Cultural Tour -->
                <div class="col-lg-6 col-xl-4 d-flex">
                    <div class="card program-card">
                        <img src="https://placehold.co/800x600/057279/ffffff?text=Imperial+Cities" alt="Blue walls of Chefchaouen" class="card-img-top">
                        <div class="card-body">
                            <span class="badge rounded-pill text-bg-info mb-2 fw-normal">7-10 Days</span>
                            <h4>Imperial Cities Grand Tour</h4>
                            <p class="card-text text-secondary">Discover Morocco's rich history in Fez, Rabat, Meknes, and Marrakech, exploring ancient medinas and royal palaces.</p>

                            <div class="program-details">
                                <span class="program-price">
                                    $1,250 <small>/ per person</small>
                                </span>
                                <a href="contact.html" class="btn btn-cta">Inquire Now</a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Program Card 3: Atlas Mountain Retreats -->
                <div class="col-lg-6 col-xl-4 d-flex">
                    <div class="card program-card">
                        <img src="https://placehold.co/800x600/199fa8/ffffff?text=Atlas+Mountains" alt="Traditional Berber village in the Atlas Mountains" class="card-img-top">
                        <div class="card-body">
                            <span class="badge rounded-pill mb-2 fw-normal" style="background-color: var(--color-dark-orange); color: white;">3-5 Days</span>
                            <h4>Atlas Mountain Retreats</h4>
                            <p class="card-text text-secondary">Escape the heat with guided treks, stay in mountain lodges, and experience the simple beauty of Berber life in the high Atlas.</p>

                            <div class="program-details">
                                <span class="program-price">
                                    $420 <small>/ per person</small>
                                </span>
                                <a href="contact.html" class="btn btn-cta">Inquire Now</a>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Program Card 4: Marrakech Culinary Journey (Half Width for a 4th Card in a 3-column grid) -->
                <div class="col-lg-6 col-xl-4 d-flex">
                    <div class="card program-card">
                        <img src="https://placehold.co/800x600/d4421c/ffffff?text=Culinary+Marrakech" alt="Spices and Tagine cooking class in Marrakech" class="card-img-top">
                        <div class="card-body">
                            <span class="badge rounded-pill bg-success mb-2 fw-normal">2 Days</span>
                            <h4>Marrakech Culinary Journey</h4>
                            <p class="card-text text-secondary">Dive into the flavors of Morocco with guided market tours, spice workshops, and hands-on cooking classes for authentic cuisine.</p>

                            <div class="program-details">
                                <span class="program-price">
                                    $299 <small>/ per person</small>
                                </span>
                                <a href="contact.html" class="btn btn-cta">Inquire Now</a>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Custom Tour CTA -->
                <div class="col-12 text-center mt-5">
                    <p class="lead text-secondary">
                        <i class="fas fa-hand-sparkles me-2" style="color: var(--color-light-orange);"></i>
                        Don't see exactly what you need? We specialize in **100% custom-tailored private tours**.
                    </p>
                    <a href="contact.html" class="btn btn-cta btn-lg mt-3">Design My Custom Tour</a>
                </div>

            </div>
        </div>
    </section>

    <?php include('../sections/footer.php'); ?>

    <!-- Bootstrap 5 JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
