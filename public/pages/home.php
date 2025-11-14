<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Marrakech Escape | Personalized Luxury Tours & Desert Adventures</title>

    <link rel="icon" type="image/png" id="favicon" href="asset/image/marrakech-escape-logo-icon.png" itemprop="image" />

    <!-- Load Poppins Font -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <!-- Swiper CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />

    <style>
        /* --- Brand Color Variables --- */
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
        }

        /* --- Navbar Styles --- */
        .navbar-custom {
            transition: all 0.4s ease-in-out;
            background-color: transparent !important;
        }
        .navbar-custom .nav-link {
            color: #fff !important;
            font-weight: 600;
        }
        .navbar-custom.scrolled {
            background-color: var(--color-dark-blue) !important;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.2);
        }
        .navbar-custom.scrolled .nav-link {
            color: #fcfcfc !important;
        }

        /* --- Hero Section --- */
        #hero {
            height: 100vh;
            background: url('public/assets/images/marrakech-escape-photo-673.jpg') center center/cover no-repeat;
            position: relative;
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
            color: #fff;
        }
        .hero-overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            /* Gradient for an immersive look */
            background: linear-gradient(135deg, rgba(212, 66, 28, 0.6) 0%, rgba(5, 114, 121, 0.7) 100%);
        }
        .hero-content {
            z-index: 10;
            max-width: 800px;
        }
        .btn-cta {
            background-color: var(--color-dark-orange);
            color: #fff;
            font-weight: 700;
            padding: 0.75rem 2rem;
            border-radius: 50px;
            /* Added box-shadow transition for better hover effect */
            transition: background-color 0.3s, transform 0.3s, box-shadow 0.3s;
            border: none;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.2); /* subtle base shadow */
        }
        .btn-cta:hover {
            background-color: var(--color-light-orange);
            color: #fff;
            transform: translateY(-3px); /* Stronger lift */
            /* Enhanced shadow using light orange for a glow effect */
            box-shadow: 0 8px 20px rgba(249, 122, 33, 0.5);
        }

        /* --- General Section Styles --- */
        .section-padding {
            padding: 80px 0;
        }
        /* Mobile optimization: Reduced padding on small screens */
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

        /* --- Card and Hover Effects --- */
        .feature-card {
            border: none;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.05);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }
        .feature-card:hover {
            transform: scale(1.03); /* Subtle scaling for dimensional pop */
            box-shadow: 0 12px 30px rgba(5, 114, 121, 0.2); /* Used dark blue hint for shadow */
        }
        .feature-card .card-header-icon {
            color: var(--color-dark-orange);
            font-size: 2.5rem;
            margin-bottom: 1rem;
        }
        .feature-card .card-title {
            color: var(--color-dark-blue);
            font-weight: 600;
        }

        /* --- Team Member Card Specifics --- */
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


        /* --- Testimonial Styles --- */
        .testimonial-card {
            background-color: #fff;
            border: 1px solid #eee;
            border-radius: 12px;
            padding: 2rem;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.03);
            min-height: 250px;
            text-align: center; /* Centering card content */
        }
        .testimonial-card p {
            text-align: center; /* Centering quote text */
        }
        .testimonial-card i {
            color: var(--color-yellow);
            font-size: 1.5rem;
            margin-bottom: 0.5rem;
        }
        .client-name {
            color: var(--color-dark-orange);
            font-weight: 600;
            margin-top: 1rem;
            display: block;
        }

        /* --- Gallery Slider (Swiper) --- */
        #gallery {
            background-color: var(--color-dark-blue);
        }
        .swiper-slide img {
            display: block;
            width: 100%;
            height: 400px;
            object-fit: cover;
            filter: brightness(0.9);
            border-radius: 8px;
        }
        .swiper-button-next, .swiper-button-prev {
            color: var(--color-yellow) !important;
        }
        .swiper-pagination-bullet-active {
            background: var(--color-yellow) !important;
        }

        /* --- Contact Form --- */
        .contact-form .form-control {
            border-radius: 8px;
            border-color: var(--color-blue-light);
            padding: 0.75rem 1rem;
        }
        .contact-form .form-control:focus {
            box-shadow: 0 0 0 0.25rem rgba(249, 122, 33, 0.25);
            border-color: var(--color-light-orange);
        }

        /* --- Footer --- */
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

    <!-- 1. Hero Section -->
    <section id="hero">
        <div class="hero-overlay"></div>
        <div class="hero-content">
            <h1 class="display-3 fw-bold mb-4">Discover the Authentic Soul of Morocco</h1>
            <p class="lead mb-5">
                Experience personalized luxury tours, exclusive desert adventures, and bespoke cultural journeys crafted just for you.
            </p>
            <a href="#contact" class="btn btn-cta btn-lg">Book Your Escape</a>
        </div>
    </section>

    <!-- 2. Brand Introduction Section (Dedicated About Page) -->
    <section id="about" class="section-padding bg-light">
        <div class="container">
            <h2 class="section-title text-center mx-auto w-100 mb-5">Our Story & Commitment</h2>

            <!-- Our Heritage / Story Row -->
            <div class="row align-items-center g-5 mb-5 pb-5 border-bottom border-secondary-subtle">
                <div class="col-lg-8 order-lg-2">
                    <h3 class="fw-bold mb-3" style="color: var(--color-dark-blue);">Rooted in Local Expertise</h3>
                    <p class="lead text-secondary mb-4">
                        Marrakech Escape was founded by local Moroccan travel experts with a deep passion for sharing the <b>authentic soul of their homeland</b>, beyond the tourist facade.
                    </p>
                    <p class="text-secondary">
                        We believe travel should be transformative. Our roots are in the vibrant community of Marrakech, and this connection allows us to craft experiences—not just tours—that are built on personal relationships, deep local knowledge, and an unwavering commitment to quality. We hand-select every guide, every riad, and every activity to ensure your journey is seamless, luxurious, and profoundly personal.
                    </p>
                </div>
                <div class="col-lg-4 order-lg-1 text-center">
                    <!-- Placeholder Image of Moroccan Hospitality -->
                    <img src="public/assets/images/marrakech-escape-photo-298.jpg" alt="Traditional Moroccan Mint Tea Ceremony" class="img-fluid rounded-3 shadow-lg">
                </div>
            </div>
            
            <!-- Our Commitment / Values Row -->
            <div class="row align-items-center g-5 pt-5">
                <div class="col-lg-4 text-center order-lg-2">
                    <!-- Placeholder Image of Desert Sunset -->
                    <img src="public/assets/images/marrakech-escape-photo-752.jpg" alt="Sustainability in the Sahara" class="img-fluid rounded-3 shadow-lg">
                </div>
                <div class="col-lg-8 order-lg-1">
                    <h3 class="fw-bold mb-3" style="color: var(--color-dark-blue);">Commitment to Sustainable Travel</h3>
                    <p class="text-secondary mb-4">
                        We are dedicated to <b>sustainable travel practices</b> that benefit the environments and communities we visit. When you travel with us, you are supporting:
                    </p>
                    <ul class="list-unstyled">
                        <li class="mb-3"><i class="fas fa-check-circle me-2" style="color: var(--color-light-orange);"></i> <b>Fair Local Wages:</b> Ensuring our guides, drivers, and partners are compensated fairly and generously.</li>
                        <li class="mb-3"><i class="fas fa-check-circle me-2" style="color: var(--color-light-orange);"></i> <b>Cultural Preservation:</b> Promoting traditional arts and respecting local customs in every itinerary.</li>
                        <li class="mb-3"><i class="fas fa-check-circle me-2" style="color: var(--color-light-orange);"></i> <b>Low-Impact Tourism:</b> Implementing eco-friendly measures, especially in the sensitive desert and mountain regions.</li>
                    </ul>
                    <a href="#contact" class="btn btn-sm btn-outline-secondary mt-3" style="color: var(--color-dark-blue); border-color: var(--color-dark-blue);">Learn More About Our Ethics</a>
                </div>
            </div>
            
            <!-- New Team Section -->
            <div class="row pt-5 mt-5 border-top border-secondary-subtle">
                <div class="col-12 text-center mb-5">
                    <h3 class="fw-bold mb-2" style="color: var(--color-dark-blue);">Meet Our Leadership</h3>
                    <p class="text-secondary">The Moroccan locals who make your extraordinary journey possible.</p>
                </div>
                
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

    <!-- 3. Featured Programs Section -->
    <section id="programs" class="section-padding">
        <div class="container">
            <h2 class="section-title text-center mx-auto w-100">Our Featured Journeys</h2>
            <div class="row g-4 mt-4">
                <!-- Program 1: Desert Adventure -->
                <div class="col-md-6 col-lg-4">
                    <div class="card text-center p-4 feature-card h-100">
                        <div class="card-body">
                            <i class="fas fa-solid fa-camel card-header-icon"></i>
                            <h3 class="card-title">Sahara Desert Expeditions</h3>
                            <p class="card-text text-secondary mt-3">
                                Three-day luxury camping under the stars in Erg Chebbi. Camel trekking, Berber hospitality, and silent, sweeping dune landscapes.
                            </p>
                            <a href="#contact" class="text-decoration-none fw-bold" style="color: var(--color-dark-orange);">Explore Tour <i class="fas fa-arrow-right fa-sm ms-1"></i></a>
                        </div>
                    </div>
                </div>

                <!-- Program 2: Cultural Trips -->
                <div class="col-md-6 col-lg-4">
                    <div class="card text-center p-4 feature-card h-100">
                        <div class="card-body">
                            <i class="fas fa-solid fa-mosque card-header-icon"></i>
                            <h3 class="card-title">Imperial Cities Cultural Tour</h3>
                            <p class="card-text text-secondary mt-3">
                                Journey through Fes, Meknes, Rabat, and Marrakech. Discover ancient history, traditional crafts, and exquisite architecture.
                            </p>
                            <a href="#contact" class="text-decoration-none fw-bold" style="color: var(--color-dark-orange);">Explore Tour <i class="fas fa-arrow-right fa-sm ms-1"></i></a>
                        </div>
                    </div>
                </div>

                <!-- Program 3: Luxury Experiences -->
                <div class="col-md-6 col-lg-4">
                    <div class="card text-center p-4 feature-card h-100">
                        <div class="card-body">
                            <i class="fas fa-solid fa-spa card-header-icon"></i>
                            <h3 class="card-title">Atlas Mountain Retreats</h3>
                            <p class="card-text text-secondary mt-3">
                                Escape to exclusive mountain resorts. Hiking, spa treatments, and farm-to-table dining in the serene High Atlas.
                            </p>
                            <a href="#contact" class="text-decoration-none fw-bold" style="color: var(--color-dark-orange);">Explore Tour <i class="fas fa-arrow-right fa-sm ms-1"></i></a>
                        </div>
                    </div>
                </div>

                <!-- Program 4: Food Tour (Optional extra card) -->
                <div class="col-md-6 col-lg-4 mx-auto mt-4 mt-lg-5">
                    <div class="card text-center p-4 feature-card h-100">
                        <div class="card-body">
                            <i class="fas fa-solid fa-tagine card-header-icon"></i>
                            <h3 class="card-title">Marrakech Culinary Journey</h3>
                            <p class="card-text text-secondary mt-3">
                                Hands-on cooking classes, market visits, and tasting tours of the city's finest spices and street food.
                            </p>
                            <a href="#contact" class="text-decoration-none fw-bold" style="color: var(--color-dark-orange);">Explore Tour <i class="fas fa-arrow-right fa-sm ms-1"></i></a>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
    
    <!-- 3.5. Why Book With Us Section (Value Proposition) -->
    <section id="whyus" class="section-padding bg-white">
        <div class="container">
            <h2 class="section-title text-center mx-auto w-100">Your Journey, Elevated</h2>
            <div class="row g-5 mt-4">
                <div class="col-lg-4 text-center">
                    <i class="fas fa-handshake fa-3x mb-3" style="color: var(--color-dark-blue);"></i>
                    <h4 class="fw-bold" style="color: var(--color-dark-blue);">Direct Local Expertise</h4>
                    <p class="text-secondary">Book directly with our team in Marrakech. No middlemen, just authentic advice and better value.</p>
                </div>
                <div class="col-lg-4 text-center">
                    <i class="fas fa-gem fa-3x mb-3" style="color: var(--color-dark-blue);"></i>
                    <h4 class="fw-bold" style="color: var(--color-dark-blue);">Curated Luxury Stays</h4>
                    <p class="text-secondary">Access to exclusive Riads and boutique hotels that are hand-picked for their unique charm and high standards.</p>
                </div>
                <div class="col-lg-4 text-center">
                    <i class="fas fa-shield-alt fa-3x mb-3" style="color: var(--color-dark-blue);"></i>
                    <h4 class="fw-bold" style="color: var(--color-dark-blue);">24/7 Concierge Support</h4>
                    <p class="text-secondary">Travel with complete peace of mind knowing our dedicated team is available around the clock during your trip.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- 4. Gallery Slider (Swiper.js) -->
    <section id="gallery" class="section-padding">
        <div class="container-fluid">
            <h2 class="section-title text-center mx-auto w-100 text-white">Moments from the Journey</h2>
            <!-- Swiper -->
            <div class="swiper mySwiper mt-5">
                <div class="swiper-wrapper">
                    <!-- Slides are placeholders for travel photos -->
                    <div class="swiper-slide"><img src="public/assets/images/marrakech-escape-photo-080.jpg" alt="Desert Camp" /></div>
                    <div class="swiper-slide"><img src="public/assets/images/marrakech-escape-photo-980.jpg" alt="Spice Market" /></div>
                    <div class="swiper-slide"><img src="public/assets/images/marrakech-escape-photo-416.jpg" alt="Kasbah View" /></div>
                    <div class="swiper-slide"><img src="public/assets/images/marrakech-escape-photo-133.jpg" alt="Local Food" /></div>
                    <div class="swiper-slide"><img src="public/assets/images/marrakech-escape-photo-588.jpg" alt="Atlas Mountains" /></div>
                </div>
                <!-- Add Pagination -->
                <div class="swiper-pagination"></div>
                <!-- Add Navigation -->
                <div class="swiper-button-next"></div>
                <div class="swiper-button-prev"></div>
            </div>
        </div>
    </section>

    <!-- 5. Testimonials Section -->
    <section id="testimonials" class="section-padding bg-light">
        <div class="container">
            <h2 class="section-title text-center mx-auto w-100">What Our Travelers Say</h2>
            <div class="row g-4 mt-4">
                <!-- Testimonial 1 -->
                <div class="col-md-6 col-lg-4">
                    <div class="testimonial-card">
                        <i class="fas fa-quote-left"></i>
                        <p class="text-secondary fst-italic">
                            "The personalized itinerary exceeded all expectations. The seamless blend of luxury riads and authentic desert experience was truly magical. Marrakech Escape handles everything."
                        </p>
                        <span class="client-name">- Sarah K., New York</span>
                    </div>
                </div>
                <!-- Testimonial 2 -->
                <div class="col-md-6 col-lg-4">
                    <div class="testimonial-card">
                        <i class="fas fa-quote-left"></i>
                        <p class="text-secondary fst-italic">
                            "Our family cultural trip was informative, engaging, and perfectly paced. The guide was incredibly knowledgeable. The best travel decision we've ever made."
                        </p>
                        <span class="client-name">- The Chen Family, Singapore</span>
                    </div>
                </div>
                <!-- Testimonial 3 -->
                <div class="col-md-6 col-lg-4 mx-auto">
                    <div class="testimonial-card">
                        <i class="fas fa-quote-left"></i>
                        <p class="text-secondary fst-italic">
                            "From the moment we landed, everything was handled with professionalism and genuine warmth. The Atlas Mountain retreat was the perfect blend of adventure and relaxation."
                        </p>
                        <span class="client-name">- David L., London</span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- 5.5. Meet Our Local Guides Section -->
    <section id="guides" class="section-padding">
        <div class="container">
            <h2 class="section-title text-center mx-auto w-100">Meet Our Local Storytellers</h2>
            <p class="text-center text-secondary mb-5">
                Our team of experienced, licensed, and friendly local guides are the heart of your Moroccan experience, sharing history, culture, and local secrets.
            </p>
            <div class="row g-4 mt-4 text-center">
                <!-- Guide 1 -->
                <div class="col-md-4">
                    <div class="feature-card p-4 h-100 border border-4 border-white" style="transition: transform 0.3s ease, box-shadow 0.3s ease;">
                        <img src="https://placehold.co/200x200/d4421c/ffffff?text=Ahmed" alt="Guide Ahmed" class="img-fluid rounded-circle mb-3 border border-4" style="border-color: var(--color-dark-orange) !important;">
                        <h4 class="fw-bold" style="color: var(--color-dark-blue);">Ahmed Zaid</h4>
                        <p class="text-muted mb-1">Desert & Berber Culture Specialist</p>
                        <small>Speaks Arabic, French, English</small>
                    </div>
                </div>
                <!-- Guide 2 -->
                <div class="col-md-4">
                    <div class="feature-card p-4 h-100 border border-4 border-white" style="transition: transform 0.3s ease, box-shadow 0.3s ease;">
                        <img src="https://placehold.co/200x200/199fa8/ffffff?text=Fátima" alt="Guide Fátima" class="img-fluid rounded-circle mb-3 border border-4" style="border-color: var(--color-blue-light) !important;">
                        <h4 class="fw-bold" style="color: var(--color-dark-blue);">Fátima El Youssfi</h4>
                        <p class="text-muted mb-1">Medina & Culinary Expert</p>
                        <small>Speaks Arabic, English, Italian</small>
                    </div>
                </div>
                <!-- Guide 3 -->
                <div class="col-md-4">
                    <div class="feature-card p-4 h-100 border border-4 border-white" style="transition: transform 0.3s ease, box-shadow 0.3s ease;">
                        <img src="https://placehold.co/200x200/f97a21/ffffff?text=Omar" alt="Guide Omar" class="img-fluid rounded-circle mb-3 border border-4" style="border-color: var(--color-light-orange) !important;">
                        <h4 class="fw-bold" style="color: var(--color-dark-blue);">Omar Benali</h4>
                        <p class="text-muted mb-1">Atlas Mountain & History Guide</p>
                        <small>Speaks Arabic, French, German</small>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- 6. Contact Form -->
    <section id="contact" class="section-padding">
        <div class="container">
            <h2 class="section-title text-center mx-auto w-100">Start Planning Your Escape</h2>
            <div class="row justify-content-center mt-5">
                <div class="col-lg-8">
                    <p class="text-center text-secondary mb-5">
                        Tell us about your dream Moroccan journey and one of our dedicated travel consultants will be in touch shortly to craft your personalized itinerary.
                    </p>
                    <form action="admin/client-add" method="post" class="contact-form">
                        <div class="row g-4">
                            <div class="col-md-6">
                                <input type="text" name="full_name" class="form-control" placeholder="Your Name" required>
                            </div>
                            <div class="col-md-6">
                                <input type="email" name="email" class="form-control" placeholder="Your Email Address" required>
                            </div>
                            <div class="col-12">
                                <input type="text" name="program" class="form-control" placeholder="Tour Interest (e.g., Desert, Culture, Luxury)" required>
                            </div>
                            <div class="col-12">
                                <textarea class="form-control" name="message" rows="5" placeholder="Your Message / Specific Requirements"></textarea>
                            </div>
                            <div class="col-12 text-center">
                                <button type="submit" class="btn btn-cta mt-3">Send Inquiry</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <?php include('../sections/footer.php'); ?>

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <!-- Bootstrap 5 JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Swiper JS -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

    <script>
        $(document).ready(function() {
            // --- Navbar Scroll Effect (jQuery) ---
            $(window).on('scroll', function() {
                if ($(window).scrollTop() > 50) {
                    $('#navbar').addClass('scrolled');
                } else {
                    $('#navbar').removeClass('scrolled');
                }
            });

            // --- Smooth Scrolling for all internal links ---
            $('a[href*="#"]').on('click', function(e) {
                if (this.hash !== "") {
                    e.preventDefault();
                    var hash = this.hash;
                    $('html, body').animate({
                        scrollTop: $(hash).offset().top - 70 // Adjust for fixed navbar height
                    }, 800, function() {
                        // Optional: Add hash to URL once done (not necessary in this context)
                        // window.location.hash = hash;
                    });
                }
            });

            // --- Swiper Initialization (Gallery Slider) ---
            new Swiper(".mySwiper", {
                slidesPerView: 1,
                spaceBetween: 30,
                loop: true,
                pagination: {
                    el: ".swiper-pagination",
                    clickable: true,
                },
                navigation: {
                    nextEl: ".swiper-button-next",
                    prevEl: ".swiper-button-prev",
                },
                breakpoints: {
                    768: {
                        slidesPerView: 2,
                    },
                    1024: {
                        slidesPerView: 3,
                    },
                },
                autoplay: {
                    delay: 4000,
                    disableOnInteraction: false,
                },
            });
        });
    </script>

</body>
</html>
