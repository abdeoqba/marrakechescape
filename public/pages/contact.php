<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Marrakech Escape | Personalized Tour Inquiry</title>
    <!-- Load Poppins Font -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    
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

        /* --- Navbar Styles (Copied from About Page) --- */
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


        /* --- Page Header Section (Adapted from About Page) --- */
        #page-header {
            min-height: 40vh; 
            background: url('public/assets/images/marrakech-escape-photo-373.jpg') center center/cover no-repeat;
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

        /* --- Contact Form Styling --- */
        .contact-card {
            background-color: #fff;
            border-radius: 12px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            padding: 2rem;
        }
        .contact-form .form-control, .contact-form .form-select {
            border-radius: 8px;
            border-color: #ddd;
            padding: 0.75rem 1rem;
            transition: all 0.3s;
        }
        .contact-form .form-control:focus, .contact-form .form-select:focus {
            box-shadow: 0 0 0 0.25rem rgba(249, 122, 33, 0.25);
            border-color: var(--color-light-orange);
        }
        .info-item {
            display: flex;
            align-items: center;
            margin-bottom: 1.5rem;
        }
        .info-item i {
            font-size: 1.8rem;
            color: var(--color-dark-orange);
            margin-right: 1rem;
            width: 30px;
            text-align: center;
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
            <h1 class="display-2 fw-bold mb-3">Let's Connect</h1>
            <p class="lead mb-4">
                We're here to answer all your questions and help you customize the perfect Moroccan adventure.
            </p>
        </div>
    </header>

    <!-- 2. Contact Section: Form and Info -->
    <section id="contact-form-section" class="section-padding bg-light">
        <div class="container">
            <h2 class="section-title text-center mx-auto w-100 mb-5">Inquire About Your Tour</h2>

            <div class="row g-5">
                <!-- Contact Information (Left Column) -->
                <div class="col-lg-4">
                    <div class="p-4 rounded-3" style="background-color: var(--color-dark-blue); color: #fff;">
                        <h4 class="fw-bold mb-4" style="color: var(--color-yellow);">Get in Touch Directly</h4>
                        
                        <div class="info-item">
                            <i class="fas fa-map-marker-alt" style="color: var(--color-yellow);"></i>
                            <div>
                                <small class="text-white-50">Office Location</small><br>
                                <b>Marrakech-Safi, Morocco</b>
                            </div>
                        </div>
                        
                        <div class="info-item">
                            <i class="fas fa-phone" style="color: var(--color-yellow);"></i>
                            <div>
                                <small class="text-white-50">Call/WhatsApp</small><br>
                                <b>+212 661 23 45 67</b>
                            </div>
                        </div>
                        
                        <div class="info-item">
                            <i class="fas fa-envelope" style="color: var(--color-yellow);"></i>
                            <div>
                                <small class="text-white-50">Email Us</small><br>
                                <b>info@marrakechescape.com</b>
                            </div>
                        </div>
                        
                        <div class="mt-4 pt-3 border-top border-white-50">
                            <h5 class="mt-3" style="color: var(--color-yellow);">Office Hours (GMT+1)</h5>
                            <p class="small mb-0">Monday to Friday: 9:00 AM - 6:00 PM</p>
                            <p class="small mb-0">Saturday: 10:00 AM - 1:00 PM</p>
                        </div>
                    </div>
                </div>

                <!-- Contact Form (Right Column) -->
                <div class="col-lg-8">
                    <div class="contact-card">
                        <form action="admin/client-add" method="post" class="contact-form">
                            <div class="row g-4">
                                <!-- Full Name -->
                                <div class="col-md-6">
                                    <label for="fullName" class="form-label fw-bold">Full Name</label>
                                    <input type="text" class="form-control" id="fullName" name="full_name" placeholder="Jane Doe" required>
                                </div>
                                <!-- Email Address -->
                                <div class="col-md-6">
                                    <label for="email" class="form-label fw-bold">Email Address</label>
                                    <input type="email" class="form-control" id="email" name="email" placeholder="jane.doe@example.com" required>
                                </div>
                                <!-- Phone -->
                                <div class="col-md-6">
                                    <label for="phone" class="form-label fw-bold">Phone Number</label>
                                    <input type="tel" class="form-control" id="phone" name="phone" placeholder="+44 20 7946 0543">
                                </div>
                                <!-- Country -->
                                <div class="col-md-6">
                                    <label for="country" class="form-label fw-bold">Your Country</label>
                                    <input type="text" class="form-control" id="country" name="country" placeholder="United States" required>
                                </div>
                                <!-- Program Dropdown -->
                                <div class="col-12">
                                    <label for="program" class="form-label fw-bold">Interested Program</label>
                                    <select class="form-select" id="program" name="program" required>
                                        <option value="" selected disabled>Select a Tour or Inquiry Type</option>
                                        <option value="desert">Sahara Desert Expeditions</option>
                                        <option value="imperial">Imperial Cities Cultural Tour</option>
                                        <option value="atlas">Atlas Mountain Retreats</option>
                                        <option value="culinary">Marrakech Culinary Journey</option>
                                        <option value="custom">Custom Private Tour</option>
                                        <option value="general">General Inquiry / Other</option>
                                    </select>
                                </div>
                                <!-- Message Textarea -->
                                <div class="col-12">
                                    <label for="message" class="form-label fw-bold">Your Message / Specific Requirements</label>
                                    <textarea class="form-control" id="message" name="message" rows="5" placeholder="Tell us about your travel dates, group size, and any special requests." required></textarea>
                                </div>
                                <!-- Submit Button -->
                                <div class="col-12 text-center mt-5">
                                    <button type="submit" class="btn btn-cta btn-lg">Send Your Inquiry</button>
                                </div>
                            </div>
                        </form>
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

    <script>
        $(document).ready(function() {
            // Smooth Scrolling for internal links (for any future internal sections)
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
