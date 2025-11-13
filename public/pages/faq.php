<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FAQ | Marrakech Escape - Frequently Asked Questions</title>
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
            background: url('https://placehold.co/1920x600/199fa8/ffffff?text=FAQ+Banner') center center/cover no-repeat;
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
            background: linear-gradient(135deg, rgba(25, 159, 168, 0.6) 0%, rgba(212, 66, 28, 0.8) 100%);
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

        /* --- FAQ Accordion Styling --- */
        .accordion-button:not(.collapsed) {
            color: #fff;
            background-color: var(--color-dark-blue);
            box-shadow: none;
        }
        .accordion-button:not(.collapsed)::after {
            filter: brightness(0) invert(1); /* Ensure arrow is visible on dark background */
        }
        .accordion-button {
            font-weight: 600;
            color: var(--color-dark-blue);
            border-radius: 8px !important;
            padding: 1rem 1.25rem;
            transition: all 0.3s;
        }
        .accordion-button:focus {
            border-color: var(--color-light-orange);
            box-shadow: 0 0 0 0.25rem rgba(249, 122, 33, 0.25);
        }
        .accordion-item {
            border: 1px solid #ddd;
            margin-bottom: 1rem;
            border-radius: 8px;
            overflow: hidden;
        }
        .accordion-body {
            color: #6c757d;
        }
        .faq-category {
            font-size: 1.5rem;
            font-weight: 700;
            color: var(--color-dark-orange);
            margin-top: 2rem;
            padding-bottom: 0.5rem;
            border-bottom: 2px solid var(--color-light-orange);
            margin-bottom: 1.5rem;
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
            <h1 class="display-1 fw-bold mb-3">Your Questions, Answered</h1>
            <p class="lead mb-4">
                Everything you need to know about booking, logistics, and what to expect on your private Moroccan tour.
            </p>
        </div>
    </header>

    <!-- 2. FAQ Accordion Section -->
    <section id="faq-content" class="section-padding bg-white">
        <div class="container">
            <h2 class="section-title text-center mx-auto w-100 mb-5">Frequently Asked Questions</h2>
            
            <div class="row justify-content-center">
                <div class="col-lg-10">

                    <!-- Booking & Customization -->
                    <p class="faq-category"><i class="fas fa-book-open me-2"></i> Booking & Customization</p>
                    <div class="accordion" id="accordionBooking">
                        
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingOne">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                    How do I book a tour with Marrakech Escape?
                                </button>
                            </h2>
                            <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionBooking">
                                <div class="accordion-body">
                                    Booking is simple! Start by visiting our <a href="programs.html" style="color: var(--color-dark-orange); font-weight: 600;">Programs page</a> to explore our options. Once you have an idea, use the <a href="contact.html" style="color: var(--color-dark-orange); font-weight: 600;">Contact form</a> to send us your desired dates and group size. We will then design a personalized itinerary and discuss pricing and deposit details directly with you.
                                </div>
                            </div>
                        </div>

                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingTwo">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                    Are your tours private or group-based?
                                </button>
                            </h2>
                            <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionBooking">
                                <div class="accordion-body">
                                    All Marrakech Escape journeys are **100% private**. This means your itinerary, driver, and guide are exclusively reserved for your group. We do not consolidate bookings, ensuring a highly personalized and intimate experience tailored to your pace and interests.
                                </div>
                            </div>
                        </div>

                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingThree">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                    What is your cancellation policy?
                                </button>
                            </h2>
                            <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionBooking">
                                <div class="accordion-body">
                                    We understand plans can change. A non-refundable deposit is required to secure your booking. Full payment is due 30 days before arrival. Cancellations made between 30 and 15 days before the tour will incur a 50% penalty of the total cost. Cancellations less than 15 days out are non-refundable. Please refer to our full Terms & Conditions (link coming soon) for details.
                                </div>
                            </div>
                        </div>

                    </div>

                    <!-- Logistics & Practicalities -->
                    <p class="faq-category mt-5"><i class="fas fa-plane-departure me-2"></i> Logistics & Practicalities</p>
                    <div class="accordion" id="accordionLogistics">
                        
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingFour">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                                    What is the best time of year to visit Morocco?
                                </button>
                            </h2>
                            <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour" data-bs-parent="#accordionLogistics">
                                <div class="accordion-body">
                                    The **shoulder seasons** (Spring: March to May, and Autumn: September to November) offer the most pleasant weather, with warm days perfect for trekking and sightseeing. Summer (June-August) is very hot, especially in Marrakech and the desert. Winter (December-February) is mild in the cities but can be cold and snowy in the Atlas Mountains.
                                </div>
                            </div>
                        </div>

                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingFive">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                                    What currency is used and are credit cards accepted?
                                </button>
                            </h2>
                            <div id="collapseFive" class="accordion-collapse collapse" aria-labelledby="headingFive" data-bs-parent="#accordionLogistics">
                                <div class="accordion-body">
                                    The local currency is the **Moroccan Dirham (MAD)**. While credit cards are accepted in major hotels, high-end restaurants, and large shops in Marrakech, many smaller vendors, cafes, and rural areas operate on a cash-only basis. We recommend carrying cash for souvenirs, tips, and small purchases.
                                </div>
                            </div>
                        </div>
                        
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingSix">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseSix" aria-expanded="false" aria-controls="collapseSix">
                                    What should I pack for a Moroccan tour?
                                </button>
                            </h2>
                            <div id="collapseSix" class="accordion-collapse collapse" aria-labelledby="headingSix" data-bs-parent="#accordionLogistics">
                                <div class="accordion-body">
                                    Due to cultural modesty, we advise packing clothes that cover your shoulders and knees, especially when visiting religious sites or rural areas. Essentials include: comfortable walking shoes, layers for changing temperatures (especially for desert nights), sun protection, and a universal adapter.
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Safety & Culture -->
                    <p class="faq-category mt-5"><i class="fas fa-shield-alt me-2"></i> Safety & Culture</p>
                    <div class="accordion" id="accordionSafety">
                        
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingSeven">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseSeven" aria-expanded="false" aria-controls="collapseSeven">
                                    Is Morocco safe for female travelers?
                                </button>
                            </h2>
                            <div id="collapseSeven" class="accordion-collapse collapse" aria-labelledby="headingSeven" data-bs-parent="#accordionSafety">
                                <div class="accordion-body">
                                    Morocco is generally very safe, particularly when travelling with a reputable agency like Marrakech Escape. Our private guides are trained to ensure your comfort and security. While solo female travelers may experience occasional unwanted attention, sticking with your guide and respecting local dress codes minimizes any issues.
                                </div>
                            </div>
                        </div>

                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingEight">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseEight" aria-expanded="false" aria-controls="collapseEight">
                                    What languages are spoken in Morocco?
                                </button>
                            </h2>
                            <div id="collapseEight" class="accordion-collapse collapse" aria-labelledby="headingEight" data-bs-parent="#accordionSafety">
                                <div class="accordion-body">
                                    The official languages are **Arabic** and **Amazigh (Berber)**. Due to colonial history, **French** is widely spoken in business and tourism. Our guides are all fluent in **English**, ensuring seamless communication throughout your journey.
                                </div>
                            </div>
                        </div>

                    </div>
                    
                    <!-- Final CTA for unanswered questions -->
                    <div class="text-center mt-5 pt-4">
                        <p class="lead">Didn't find your answer? Our team is ready to assist you directly!</p>
                        <a href="contact.html" class="btn btn-lg fw-bold" style="background-color: var(--color-dark-orange); color: white; border-radius: 50px;">
                            <i class="fas fa-headset me-2"></i> Contact Our Specialists
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <?php include('../sections/footer.php'); ?>

    <!-- Bootstrap 5 JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
