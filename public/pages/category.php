<?php 

    include('../sections/init.php'); 

    $program = new Program();
    $program->getAllProgram(0); // Get all programs
?>
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
            padding-top: 68px; /* Space for fixed navbar */
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
            background: url('public/assets/images/marrakech-escape-photo-416.jpg') center center/cover no-repeat;
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
                
                <?php if(!empty($program->programs)): ?>
                    <?php foreach($program->programs as $tour): ?>
                    <!-- Program Card: <?= htmlspecialchars($tour->content->title ?? 'Tour') ?> -->
                    <div class="col-lg-6 col-xl-4">
                        <div class="card program-card">
                            <img src="<?= htmlspecialchars($tour->image->photo_file ?? 'https://placehold.co/800x600/ff8b26/ffffff?text=Tour') ?>" alt="<?= htmlspecialchars($tour->content->title ?? 'Tour Image') ?>" class="card-img-top">
                            <div class="card-body">
                                <span class="badge rounded-pill text-bg-warning mb-2 fw-normal"><?= htmlspecialchars($tour->nbr_days ?? '4') ?> Days</span>
                                <h4><?= htmlspecialchars($tour->content->title ?? 'Moroccan Adventure') ?></h4>
                                <p class="card-text text-secondary"><?= htmlspecialchars(substr($tour->content->description ?? 'Experience an unforgettable journey through Morocco.', 0, 120)) ?>...</p>
                                
                                <div class="program-details">
                                    <span class="program-price">
                                        $<?= number_format($tour->price ?? 599, 0) ?> <small>/ per person</small>
                                    </span>
                                    <a href="program?id_program=<?= $tour->id_program ?>" class="btn btn-cta">View Details</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; ?>
                <?php else: ?>
                    <!-- Fallback: No programs found -->
                    <div class="col-12 text-center py-5">
                        <i class="fas fa-exclamation-circle fa-3x text-secondary mb-3"></i>
                        <p class="lead text-secondary">No programs available at the moment. Please check back later!</p>
                    </div>
                <?php endif; ?>
                
                <!-- Custom Tour CTA -->
                <div class="col-12 text-center mt-5">
                    <p class="lead text-secondary">
                        <i class="fas fa-hand-sparkles me-2" style="color: var(--color-light-orange);"></i>
                        Don't see exactly what you need? We specialize in **100% custom-tailored private tours**.
                    </p>
                    <a href="contact" class="btn btn-cta btn-lg mt-3">Design My Custom Tour</a>
                </div>

            </div>
        </div>
    </section>

    <?php include('../sections/footer.php'); ?>

    <!-- Bootstrap 5 JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>