<?php 

    include('../sections/init.php'); 

    $program = new Program();
    $id_program = $_GET["id_program"] ?? 1;
    $program->get($id_program);

    $program->clean();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sahara Desert Expedition | Marrakech Escape Tours</title>
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

        /* --- Page Header Section --- */
        #page-header {
            min-height: 50vh;
            background: url('public/assets/images/marrakech-escape-photo-080.jpg') center center/cover no-repeat;
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
            background: linear-gradient(135deg, rgba(212, 66, 28, 0.7) 0%, rgba(249, 122, 33, 0.9) 100%);
        }
        .header-content {
            z-index: 10;
            max-width: 1000px;
        }
        .breadcrumb-custom a {
            color: #fcfcfc;
            opacity: 0.8;
            text-decoration: none;
            transition: opacity 0.3s;
        }
        .breadcrumb-custom a:hover {
            opacity: 1;
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

        /* --- Key Facts Card --- */
        .key-facts-card {
            background-color: var(--color-dark-blue);
            color: #fff;
            border-radius: 12px;
            padding: 2rem;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.15);
        }
        .fact-item {
            border-bottom: 1px dashed rgba(255, 255, 255, 0.3);
            padding: 10px 0;
            display: flex;
            align-items: center;
        }
        .fact-item:last-child {
            border-bottom: none;
        }
        .fact-item i {
            color: var(--color-yellow);
            font-size: 1.2rem;
            width: 25px;
            text-align: center;
            margin-right: 1rem;
        }
        .tour-price {
            font-size: 2.5rem;
            font-weight: 700;
            color: var(--color-yellow);
            margin-bottom: 0.5rem;
        }

        /* --- Itinerary Accordion Styling --- */
        .itinerary-accordion .accordion-button {
            background-color: #f7f7f7;
            color: var(--color-dark-blue);
            font-weight: 600;
            border-radius: 8px !important;
        }
        .itinerary-accordion .accordion-button:not(.collapsed) {
            background-color: var(--color-light-orange);
            color: #fff;
        }
        .itinerary-accordion .accordion-item {
            border: 1px solid #ddd;
            margin-bottom: 15px;
            border-radius: 8px;
            overflow: hidden;
        }

        /* --- Lists Styling --- */
        .inclusions-list li, .exclusions-list li {
            padding: 0.5rem 0;
            font-size: 1.05rem;
            border-bottom: 1px solid #eee;
        }
        .inclusions-list li i {
            color: var(--color-blue-light);
            margin-right: 0.75rem;
        }
        .exclusions-list li i {
            color: var(--color-dark-orange);
            margin-right: 0.75rem;
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
        <div class="header-overlay"></div>
        <div class="header-content">
            <nav aria-label="breadcrumb" class="breadcrumb-custom mb-3">
                <ol class="breadcrumb justify-content-center">
                    <li class="breadcrumb-item"><a href="category">Tour Programs</a></li>
                    <li class="breadcrumb-item active text-white" aria-current="page">Sahara Desert Expedition</li>
                </ol>
            </nav>
            <h1 class="display-1 fw-bold mb-3"><?= $program->content->title; ?></h1>
            <p class="lead mb-4 fw-light">
                <?= $program->content->description; ?>
            </p>
        </div>
    </header>

    <!-- <pre width="400px"><?= json_encode($program); ?></pre> -->

    <!-- 2. Tour Overview, Key Facts & Pricing -->
    <section id="tour-overview" class="section-padding pt-5 pb-5">
        <div class="container">
            <div class="row g-5">
                <!-- Overview Text -->
                <div class="col-lg-7">
                    <h2 class="fw-bold mb-4" style="color: var(--color-dark-orange);">Journey to the Sands</h2>
                    <p class="lead text-secondary">
                        Our 4-day desert tour is designed to immerse you in the vast silence and ancient culture of the Moroccan Sahara. Starting from Marrakech, we cross the <b>High Atlas Mountains</b>, visit the UNESCO site of <b>Aït Benhaddou</b>, and spend two unforgettable nights under the stars in a luxury desert camp.
                    </p>
                    <p class="text-secondary">
                        This is more than just a trip; it's a sensory experience where the scale of the dunes humbles you, and the hospitality of the Berber people warms you. Perfect for those seeking tranquility, adventure, and incredible photography opportunities.
                    </p>

                    <!-- Core Activities Highlights -->
                    <h5 class="fw-bold mt-5 mb-3" style="color: var(--color-dark-blue);">Core Trip Highlights:</h5>
                    <ul class="list-unstyled row g-3">
                        <li class="col-md-6"><i class="fas fa-sun me-2" style="color: var(--color-light-orange);"></i> Sunrise and Sunset Camel Treks</li>
                        <li class="col-md-6"><i class="fas fa-star me-2" style="color: var(--color-light-orange);"></i> Stargazing in the Erg Chebbi Dunes</li>
                        <li class="col-md-6"><i class="fas fa-landmark me-2" style="color: var(--color-light-orange);"></i> Visit Ouarzazate Film Studios</li>
                        <li class="col-md-6"><i class="fas fa-drum me-2" style="color: var(--color-light-orange);"></i> Traditional Berber Music & Dinner</li>
                    </ul>
                </div>

                <!-- Key Facts & Pricing Card (Right Column) -->
                <div class="col-lg-5">
                    <div class="key-facts-card">
                        <h3 class="text-center fw-bold mb-4" style="color: var(--color-yellow);">Tour Snapshot</h3>
                        
                        <div class="fact-item">
                            <i class="fas fa-clock"></i>
                            <div class="flex-grow-1">Duration: <span class="fw-bold text-white"><?= $program->nbr_days; ?> Days / 3 Nights</span></div>
                        </div>
                        <div class="fact-item">
                            <i class="fas fa-map-marker-alt"></i>
                            <div class="flex-grow-1">Starts/Ends: <span class="fw-bold text-white"><?= $program->start; ?><?= $program->end; ?></span></div>
                        </div>
                        <div class="fact-item">
                            <i class="fas fa-walking"></i>
                            <div class="flex-grow-1">Activity Level: <span class="fw-bold text-white">Moderate</span></div>
                        </div>
                        <div class="fact-item">
                            <i class="fas fa-users"></i>
                            <div class="flex-grow-1">Group Size: <span class="fw-bold text-white">Private Tour (1-6 Guests)</span></div>
                        </div>
                        
                        <div class="text-center mt-4 pt-3 border-top border-white-50">
                            <div class="tour-price">From $<?= $program->price; ?></div>
                            <small class="text-white-50">Per person, based on 4 travelers.</small>
                            <a href="contact" class="btn btn-cta w-100 mt-3">Book This Tour</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- 3. Detailed Itinerary -->
    <section id="itinerary" class="section-padding bg-light">
        <div class="container">
            <h2 class="section-title text-center mx-auto w-100 mb-5">Day-by-Day Itinerary</h2>
            
            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <div class="accordion itinerary-accordion" id="tourItinerary">
                        
                        <!-- Day 1 -->
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="itineraryHeading1">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#itineraryCollapse1" aria-expanded="true" aria-controls="itineraryCollapse1">
                                    Day 1: Marrakech to Dades Gorges via Aït Benhaddou
                                </button>
                            </h2>
                            <div id="itineraryCollapse1" class="accordion-collapse collapse show" aria-labelledby="itineraryHeading1" data-bs-parent="#tourItinerary">
                                <div class="accordion-body text-secondary">
                                    We start early, crossing the magnificent <b>Tizi n'Tichka Pass</b> (2,260m) in the High Atlas Mountains. Stop for lunch near the legendary <b>Kasbah of Aït Benhaddou</b> (UNESCO World Heritage Site). The afternoon features scenic driving through the Valley of Roses before settling in a traditional riad in the Dades Gorges.
                                </div>
                            </div>
                        </div>

                        <!-- Day 2 -->
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="itineraryHeading2">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#itineraryCollapse2" aria-expanded="false" aria-controls="itineraryCollapse2">
                                    Day 2: Dades to Erg Chebbi Dunes & Desert Camp
                                </button>
                            </h2>
                            <div id="itineraryCollapse2" class="accordion-collapse collapse" aria-labelledby="itineraryHeading2" data-bs-parent="#tourItinerary">
                                <div class="accordion-body text-secondary">
                                    After breakfast, we head east, passing through the vast Todra Gorges. We reach Merzouga, the gateway to the Sahara. Here, you meet your camels for a 1.5-hour trek into the heart of the dunes. Arrive at the luxury camp for sunset, dinner, and Berber music around the campfire.
                                </div>
                            </div>
                        </div>

                        <!-- Day 3 -->
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="itineraryHeading3">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#itineraryCollapse3" aria-expanded="false" aria-controls="itineraryCollapse3">
                                    Day 3: Desert Exploration & Return to Ouarzazate
                                </button>
                            </h2>
                            <div id="itineraryCollapse3" class="accordion-collapse collapse" aria-labelledby="itineraryHeading3" data-bs-parent="#tourItinerary">
                                <div class="accordion-body text-secondary">
                                    Witness the breathtaking desert sunrise, followed by breakfast. After riding the camels back, we begin the return journey via the Draa Valley. Our day ends in Ouarzazate, the "Hollywood of Africa," where you can optionally visit a film studio.
                                </div>
                            </div>
                        </div>
                        
                        <!-- Day 4 -->
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="itineraryHeading4">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#itineraryCollapse4" aria-expanded="false" aria-controls="itineraryCollapse4">
                                    Day 4: Ouarzazate back to Marrakech
                                </button>
                            </h2>
                            <div id="itineraryCollapse4" class="accordion-collapse collapse" aria-labelledby="itineraryHeading4" data-bs-parent="#tourItinerary">
                                <div class="accordion-body text-secondary">
                                    Enjoy a final Moroccan breakfast before the final leg of the journey. We drive back over the Atlas mountains, arriving in Marrakech in the afternoon (around 5:00 PM), concluding your unforgettable desert expedition.
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
    
    <!-- 4. Inclusions and Exclusions -->
    <section id="inclusions" class="section-padding pt-5">
        <div class="container">
            <h2 class="section-title text-center mx-auto w-100 mb-5">What's Included & Excluded</h2>

            <div class="row g-5">
                <!-- Inclusions -->
                <div class="col-lg-6">
                    <h4 class="fw-bold mb-4" style="color: var(--color-blue-light);"><i class="fas fa-check-circle me-2"></i> Your Trip Includes:</h4>
                    <ul class="list-unstyled inclusions-list">
                        <li><i class="fas fa-car-side"></i> Private, air-conditioned 4x4 or minivan transport.</li>
                        <li><i class="fas fa-driver-license"></i> Dedicated English-speaking driver/guide for the entire duration.</li>
                        <li><i class="fas fa-bed"></i> 3 nights accommodation (Riads in Gorges, Luxury Desert Camp).</li>
                        <li><i class="fas fa-utensils"></i> Daily Breakfast and Dinner (3 Dinners, 3 Breakfasts).</li>
                        <li><i class="fas fa-hat-cowboy"></i> Sunrise and Sunset Camel Trekking in Erg Chebbi.</li>
                        <li><i class="fas fa-mountain"></i> All government taxes and fees.</li>
                    </ul>
                </div>

                <!-- Exclusions -->
                <div class="col-lg-6">
                    <h4 class="fw-bold mb-4" style="color: var(--color-dark-orange);"><i class="fas fa-times-circle me-2"></i> Your Trip Excludes:</h4>
                    <ul class="list-unstyled exclusions-list">
                        <li><i class="fas fa-ticket-alt"></i> Entry fees to historical sites and museums (e.g., Kasbahs).</li>
                        <li><i class="fas fa-beer-mug-empty"></i> All Lunches, beverages, and personal snacks.</li>
                        <li><i class="fas fa-plane"></i> International flights to and from Morocco.</li>
                        <li><i class="fas fa-hand-holding-usd"></i> Tips for drivers, guides, and hotel staff.</li>
                        <li><i class="fas fa-hand-scissors"></i> Travel insurance (Highly Recommended).</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <!-- 5. Final CTA -->
    <section id="final-cta" class="section-padding pt-5 pb-5 text-center" style="background-color: var(--color-dark-blue);">
        <div class="container">
            <h2 class="text-white mb-3 fw-bold">Ready to Cross the Dunes?</h2>
            <p class="lead text-white-50 mb-4">
                This tour is fully customizable. Click below to inquire about dates, pricing for your group size, or to modify the itinerary.
            </p>
            <a href="contact" class="btn btn-cta btn-lg">
                <i class="fas fa-paper-plane me-2"></i> Start My Desert Booking
            </a>
        </div>
    </section>

    <?php include('../sections/footer.php'); ?>

    <!-- Bootstrap 5 JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
