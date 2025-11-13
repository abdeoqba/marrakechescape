<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Client Reviews & Testimonials | Marrakech Escape</title>
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
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
        }
        .navbar-custom .nav-link {
            color: #fcfcfc !important;
            font-weight: 600;
        }
        .navbar-custom .nav-link:hover {
            color: var(--color-light-orange) !important;
        }

        /* --- Page Header Section --- */
        #page-header {
            min-height: 30vh;
            background-color: var(--color-dark-blue);
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
            color: #fff;
            padding: 40px 0;
            margin-bottom: 0;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        }

        /* --- Content Section --- */
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
        
        /* --- Testimonial Card Styles --- */
        .review-card {
            background-color: #fff;
            border: 1px solid #eee;
            border-radius: 12px;
            padding: 2rem;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.05);
            transition: transform 0.3s, box-shadow 0.3s;
            height: 100%;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }

        .review-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.1);
        }

        .review-quote {
            font-style: italic;
            color: #4a4a4a;
            margin-bottom: 1.5rem;
            flex-grow: 1;
        }

        .review-meta {
            border-top: 1px solid #f0f0f0;
            padding-top: 1rem;
        }

        .star-rating i {
            color: var(--color-yellow);
            font-size: 1.1rem;
        }
        
        .reviewer-name {
            font-weight: 700;
            color: var(--color-dark-blue);
            margin-bottom: 0;
        }
        
        .tour-name {
            font-size: 0.9rem;
            color: var(--color-light-orange);
            font-weight: 600;
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

    <!-- 1. Page Header -->
    <header id="page-header">
        <div class="container">
            <h1 class="display-3 fw-bold mb-2">Client Success Stories</h1>
            <p class="lead fw-light">Don't just take our word for it—read what our global travelers have to say.</p>
        </div>
    </header>

    <!-- 2. Reviews Grid -->
    <section id="reviews-grid" class="section-padding">
        <div class="container">
            <h2 class="section-title text-center mx-auto w-100 mb-5">Trusted by Travelers Worldwide</h2>
            
            <div class="row g-4">
                
                <!-- Review 1: Sahara Desert Expedition -->
                <div class="col-md-6 col-lg-4">
                    <div class="review-card">
                        <div>
                            <div class="star-rating mb-3">
                                <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i>
                            </div>
                            <p class="review-quote">
                                "The Sahara Expedition was truly a once-in-a-lifetime experience. The luxury tent camp exceeded all expectations, and our guide, Youssef, was incredibly knowledgeable about Berber culture and navigation. Highly recommend Marrakech Escape!"
                            </p>
                        </div>
                        <div class="review-meta">
                            <p class="reviewer-name">— Amelia R. from London</p>
                            <span class="tour-name">Sahara Desert Expedition</span>
                        </div>
                    </div>
                </div>
                
                <!-- Review 2: Imperial Cities Tour -->
                <div class="col-md-6 col-lg-4">
                    <div class="review-card">
                        <div>
                            <div class="star-rating mb-3">
                                <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i>
                            </div>
                            <p class="review-quote">
                                "We had a fantastic time on the Imperial Cities tour. Everything was handled perfectly, from the riads in Fes and Rabat to the local guides in Marrakech. It was a seamless and stress-free way to see the best of Morocco's history."
                            </p>
                        </div>
                        <div class="review-meta">
                            <p class="reviewer-name">— John & Sarah W. from New York</p>
                            <span class="tour-name">Imperial Cities Journey</span>
                        </div>
                    </div>
                </div>
                
                <!-- Review 3: Atlas Mountains Trek -->
                <div class="col-md-6 col-lg-4">
                    <div class="review-card">
                        <div>
                            <div class="star-rating mb-3">
                                <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star-half-alt"></i>
                            </div>
                            <p class="review-quote">
                                "The trekking was challenging but rewarding. Our Berber guide was kind and made sure we felt completely safe. The views were unbelievable, and the homestay was very authentic. A little more detail on the packing list would be helpful, but otherwise perfect."
                            </p>
                        </div>
                        <div class="review-meta">
                            <p class="reviewer-name">— Thomas K. from Berlin</p>
                            <span class="tour-name">High Atlas Trekking</span>
                        </div>
                    </div>
                </div>

                <!-- Review 4: Essaouira Coastal Escape -->
                <div class="col-md-6 col-lg-4">
                    <div class="review-card">
                        <div>
                            <div class="star-rating mb-3">
                                <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i>
                            </div>
                            <p class="review-quote">
                                "The coastal trip to Essaouira was a much-needed relaxing break. The transport was comfortable, and our driver was friendly. The hotel recommendations were excellent. It was exactly the escape we were looking for."
                            </p>
                        </div>
                        <div class="review-meta">
                            <p class="reviewer-name">— David C. from Toronto</p>
                            <span class="tour-name">Essaouira Coastal Escape</span>
                        </div>
                    </div>
                </div>

                <!-- Review 5: Private Family Tour -->
                <div class="col-md-6 col-lg-4">
                    <div class="review-card">
                        <div>
                            <div class="star-rating mb-3">
                                <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i>
                            </div>
                            <p class="review-quote">
                                "Booking a custom private tour for our family of six was easy. Marrakech Escape was flexible with our kids' needs, and they tailored the activities perfectly. The whole family loved the tagine cooking class!"
                            </p>
                        </div>
                        <div class="review-meta">
                            <p class="reviewer-name">— Fatima B. from Abu Dhabi</p>
                            <span class="tour-name">Custom Family Adventure</span>
                        </div>
                    </div>
                </div>

                <!-- Review 6: Cultural immersion (Fes) -->
                <div class="col-md-6 col-lg-4">
                    <div class="review-card">
                        <div>
                            <div class="star-rating mb-3">
                                <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i>
                            </div>
                            <p class="review-quote">
                                "We felt truly immersed in the culture, particularly during our time in Fes. The quality of the local guides assigned by Marrakech Escape was exceptional. They offered historical depth without rushing us. Best travel company we've used in years."
                            </p>
                        </div>
                        <div class="review-meta">
                            <p class="reviewer-name">— Robert M. from Sydney</p>
                            <span class="tour-name">Fes & Cultural Heritage</span>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
    </section>

    <!-- 3. Call to Action -->
    <section id="cta-final" class="py-5 text-center" style="background-color: var(--color-blue-light);">
        <div class="container">
            <h2 class="text-white mb-3 fw-bold">Ready for your 5-Star Moroccan Adventure?</h2>
            <p class="lead text-white-50 mb-4">
                Join our family of happy travelers and let us custom-design your perfect escape.
            </p>
            <a href="contact.html" class="btn btn-cta btn-lg">
                <i class="fas fa-paper-plane me-2"></i> Plan My Escape
            </a>
        </div>
    </section>

    <?php include('../sections/footer.php'); ?>

    <!-- Bootstrap 5 JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
