<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Privacy Policy | Marrakech Escape</title>
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
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
        }
        .navbar-custom .nav-link {
            color: #fcfcfc !important;
            font-weight: 600;
        }
        .navbar-custom .nav-link:hover {
            color: var(--color-light-orange) !important;
        }
        /* Active link highlight for this page (Placeholder, change if menu is added) */
        .navbar-custom .nav-link.active {
            color: var(--color-yellow) !important;
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

        .policy-container {
            max-width: 900px;
            margin: 0 auto;
            background-color: #fff;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.05);
        }

        h2.policy-title {
            color: var(--color-dark-orange);
            font-weight: 700;
            padding-bottom: 15px;
            border-bottom: 2px solid var(--color-blue-light);
            margin-top: 2.5rem;
            margin-bottom: 1.5rem;
        }

        p, li {
            font-size: 1rem;
            line-height: 1.7;
            color: #4a4a4a;
        }

        .data-list li {
            font-weight: 600;
            color: var(--color-dark-blue);
        }

        .highlight-box {
            background-color: #f5faff;
            border-left: 5px solid var(--color-blue-light);
            padding: 1rem 1.5rem;
            margin: 1.5rem 0;
            border-radius: 4px;
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
            <h1 class="display-3 fw-bold mb-2">Privacy Policy</h1>
            <p class="lead fw-light">Protecting your information is our priority.</p>
        </div>
    </header>

    <!-- 2. Policy Content -->
    <section id="policy-content" class="section-padding">
        <div class="container">
            <div class="policy-container">
                <p>
                    <b>Marrakech Escape</b> ("we," "us," or "our") is committed to protecting the privacy of our clients and website visitors. This policy explains how we collect, use, disclose, and safeguard your information when you visit our website or book one of our private tours.
                </p>

                <!-- Section 1: Information We Collect -->
                <h2 class="policy-title" id="data-collected"><i class="fas fa-database me-2"></i> 1. Information We Collect</h2>
                
                <h4 class="mt-4" style="color: var(--color-blue-light);">Personal Identification Data</h4>
                <p>When you fill out a form (e.g., Contact Form or Booking Inquiry), we may collect the following data necessary for communication and service provision:</p>
                <ul class="list-unstyled data-list">
                    <li><i class="fas fa-user-circle me-2" style="color: var(--color-light-orange);"></i> Name and Contact Information (Email Address, Phone Number).</li>
                    <li><i class="fas fa-globe me-2" style="color: var(--color-light-orange);"></i> Country of Residence and preferred currency.</li>
                    <li><i class="fas fa-calendar-check me-2" style="color: var(--color-light-orange);"></i> Tour preferences (Program selected, Dates, Group size).</li>
                </ul>
                <p class="mt-3">For confirmed bookings, we may require sensitive data such as passport information (for hotel bookings and travel logistics) and dietary/medical notes (for safety and customization).</p>

                <h4 class="mt-4" style="color: var(--color-blue-light);">Usage and Tracking Data</h4>
                <p>We automatically collect data when you access our website, including your IP address, browser type, device information, and pages visited, to improve website performance and user experience.</p>

                <!-- Section 2: How We Use Your Data -->
                <h2 class="policy-title" id="data-usage"><i class="fas fa-chart-line me-2"></i> 2. How We Use Your Data</h2>
                <p>The data we collect is used solely for the following purposes:</p>
                <ol>
                    <li><b>Service Fulfillment:</b> To process your booking, customize your itinerary, secure accommodation, and arrange transportation and guiding services.</li>
                    <li><b>Communication:</b> To respond to your inquiries via the Contact Form and send necessary updates regarding your booked tour.</li>
                    <li><b>Safety and Security:</b> To comply with local Moroccan laws and regulations, and to maintain the safety of all travelers.</li>
                    <li><b>Marketing (Consent-Based):</b> To send you occasional promotional emails about new tours or special offers, but only if you have explicitly opted-in.</li>
                </ol>
                
                <!-- Section 3: Data Sharing and Disclosure -->
                <h2 class="policy-title" id="data-sharing"><i class="fas fa-share-alt me-2"></i> 3. Data Sharing and Disclosure</h2>
                <p>We do not sell, trade, or rent your Personal Identification Data to outside parties. We only share your data as follows:</p>
                <ul class="list-unstyled data-list">
                    <li><i class="fas fa-hotel me-2" style="color: var(--color-dark-orange);"></i> <b>With Service Providers:</b> We must share necessary information (like name and passport details) with trusted third-party suppliers, such as hotels, riads, and local transportation partners, strictly for the purpose of fulfilling your booked itinerary.</li>
                    <li><i class="fas fa-gavel me-2" style="color: var(--color-dark-orange);"></i> <b>For Legal Compliance:</b> We may disclose your data where required by law, such as in response to a court order or government request.</li>
                </ul>

                <!-- Section 4: Data Security -->
                <h2 class="policy-title" id="security"><i class="fas fa-lock me-2"></i> 4. Data Security</h2>
                <p>
                    We employ administrative, technical, and physical security measures designed to protect your personal information. All booking forms are transmitted over a secure connection (SSL/HTTPS), and access to client data is restricted to employees who need the information to perform a specific job (e.g., booking specialists).
                </p>

                <div class="highlight-box">
                    <i class="fas fa-info-circle me-2" style="color: var(--color-blue-light);"></i>
                    <b>Please Note:</b> While we strive to use commercially acceptable means to protect your data, no method of transmission over the Internet or method of electronic storage is 100% secure.
                </div>

                <!-- Section 5: Your Data Rights -->
                <h2 class="policy-title" id="your-rights"><i class="fas fa-user-shield me-2"></i> 5. Your Data Rights</h2>
                <p>You have the right to:</p>
                <ul class="list-unstyled">
                    <li><i class="fas fa-eye me-2" style="color: var(--color-dark-blue);"></i> <b>Access:</b> Request copies of your personal data we hold.</li>
                    <li><i class="fas fa-edit me-2" style="color: var(--color-dark-blue);"></i> <b>Correction:</b> Request that we correct any information you believe is inaccurate or incomplete.</li>
                    <li><i class="fas fa-trash-alt me-2" style="color: var(--color-dark-blue);"></i> <b>Erasure:</b> Request that we erase your personal data, subject to legal retention requirements related to your booking.</li>
                </ul>
                <p>To exercise any of these rights, please contact us using the details provided below.</p>

                <!-- Section 6: Changes to this Policy -->
                <h2 class="policy-title" id="changes"><i class="fas fa-sync-alt me-2"></i> 6. Changes to this Policy</h2>
                <p>
                    We may update our Privacy Policy from time to time. We will notify you of any changes by posting the new Privacy Policy on this page. You are advised to review this Privacy Policy periodically for any changes.
                </p>
                
                <!-- Section 7: Contact Us -->
                <h2 class="terms-title" id="contact"><i class="fas fa-headset me-2"></i> 7. Contact Us</h2>
                <p>If you have any questions about this Privacy Policy, please contact us:</p>
                <ul class="list-unstyled data-list">
                    <li><b>Email:</b> <a href="mailto:info@marrakeshescape.com" style="color: var(--color-dark-orange);">privacy@marrakeshescape.com</a></li>
                    <li><b>Via Contact Form:</b> <a href="contact" style="color: var(--color-dark-orange);">Visit our Contact Page</a></li>
                </ul>
                
            </div>
        </div>
    </section>

    <?php include('../sections/footer.php'); ?>

    <!-- Bootstrap 5 JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
