<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Terms & Conditions | Marrakech Escape</title>
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

        .terms-container {
            max-width: 900px;
            margin: 0 auto;
            background-color: #fff;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.05);
        }

        h2.terms-title {
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

        .highlight-box {
            background-color: #fff8f5;
            border-left: 5px solid var(--color-light-orange);
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
            <h1 class="display-3 fw-bold mb-2">Terms & Conditions</h1>
            <p class="lead fw-light">Effective Date: October 21, 2024</p>
        </div>
    </header>

    <!-- 2. Terms Content -->
    <section id="terms-content" class="section-padding">
        <div class="container">
            <div class="terms-container">
                <p>
                    These Terms and Conditions (<b>"Terms"</b>) govern the contractual relationship between <b>Marrakech Escape</b> ("the Company," "we," "us," or "our") and the client (<b>"Client,"</b> "you," or "your") booking a private tour or travel service in Morocco. By booking a tour with us, you agree to be bound by these Terms.
                </p>

                <!-- Section 1: Booking & Confirmation -->
                <h2 class="terms-title" id="booking-confirmation">1. Booking & Confirmation</h2>
                <ol>
                    <li><b>Reservation:</b> All reservations are considered requests until confirmed in writing by the Company.</li>
                    <li><b>Deposit:</b> A non-refundable deposit, typically <b>30% of the total tour cost</b>, is required at the time of booking to secure your reservation and services (e.g., accommodation, transport).</li>
                    <li><b>Final Payment:</b> The remaining balance (<b>70% of the total cost</b>) is due no later than <b>30 days prior to the tour start date</b>. Failure to pay the balance by the due date may result in the automatic cancellation of your booking, with forfeiture of the deposit.</li>
                    <li><b>Last-Minute Bookings:</b> For bookings made less than 30 days before the start date, <b>full payment is required immediately</b> to confirm the tour.</li>
                </ol>

                <!-- Section 2: Pricing & Inclusions -->
                <h2 class="terms-title" id="pricing-inclusions">2. Pricing & Inclusions</h2>
                <ol>
                    <li><b>Price Validity:</b> Prices are quoted in USD or EUR and are valid only at the time of quotation. We reserve the right to modify prices before a booking is confirmed due to external factors like exchange rate fluctuations or supplier cost increases.</li>
                    <li><b>Included Services:</b> Unless otherwise specified in the personalized itinerary, our prices typically include private transportation, fuel, the services of an English-speaking driver/guide, accommodation, and specified meals (usually breakfast and dinner).</li>
                    <li><b>Excluded Services:</b> Prices exclude international airfare, travel insurance (mandatory), visa fees, optional activities, lunches, beverages, personal expenses, and tips/gratuities for the driver/guide.</li>
                </ol>

                <!-- Section 3: Cancellation & Refunds -->
                <h2 class="terms-title" id="cancellation-refunds">3. Cancellation & Refunds</h2>
                
                <h4 class="mt-4" style="color: var(--color-blue-light);">3.1. Cancellation by the Client</h4>
                <p>All cancellations must be received in writing (email). The cancellation penalty is calculated based on the date we receive your written notification:</p>
                <ul class="list-unstyled">
                    <li><b>60+ Days Before Start Date:</b> Forfeiture of the <b>non-refundable deposit</b>.</li>
                    <li><b>30 to 59 Days Before Start Date:</b> <b>50% of the total tour cost</b> is non-refundable.</li>
                    <li><b>0 to 29 Days Before Start Date:</b> <b>100% of the total tour cost</b> is non-refundable.</li>
                </ul>

                <h4 class="mt-4" style="color: var(--color-blue-light);">3.2. Cancellation by Marrakech Escape</h4>
                <p>
                    We reserve the right to cancel a tour due to unforeseen circumstances, such as political instability or extreme weather conditions, or if the safety of our clients or staff is compromised. In such a rare event, the Company will offer an alternative date or a <b>full refund of all monies paid</b>.
                </p>
                
                <!-- Section 4: Travel Insurance & Liability -->
                <h2 class="terms-title" id="liability-insurance">4. Liability & Insurance</h2>
                
                <div class="highlight-box">
                    <i class="fas fa-exclamation-triangle me-2" style="color: var(--color-dark-orange);"></i>
                    <b>MANDATORY TRAVEL INSURANCE:</b> It is a condition of booking that the Client has comprehensive travel insurance that covers cancellation, medical emergencies, emergency repatriation, and personal liability.
                </div>

                <ol start="4">
                    <li><b>Client Responsibility:</b> The Client is responsible for obtaining all necessary travel documents, including passports, visas, and health certificates, and for ensuring their travel insurance is adequate.</li>
                    <li><b>Limitation of Liability:</b> The Company acts only as an agent for the client in relation to travel services (transportation, accommodation, etc.). We shall not be held liable for any injury, damage, loss, delay, or irregularity which may occur due to the negligence, fault, or acts of any third-party supplier.</li>
                    <li><b>Baggage:</b> We are not responsible for the loss, theft, or damage of personal belongings, including luggage.</li>
                </ol>

                <!-- Section 5: Amendments -->
                <h2 class="terms-title" id="amendments">5. Amendments</h2>
                <ol start="7">
                    <li><b>Amendments by Client:</b> We will try to accommodate reasonable changes requested by the Client after confirmation, subject to availability. Any changes made less than 30 days before the tour may incur a <b>$50 administration fee</b> per change, plus any charges levied by suppliers.</li>
                    <li><b>Amendments by Company:</b> While every effort is made to operate all tours as advertised, the Company reserves the right to make minor changes to the itinerary, accommodation, or transport if necessary (e.g., due to road closures, hotel overbooking). You will be notified of any significant changes immediately.</li>
                </ol>
                
                <!-- Section 6: Jurisdiction -->
                <h2 class="terms-title" id="jurisdiction">6. Governing Law</h2>
                <p>
                    This agreement and any dispute or claim arising out of or in connection with it shall be governed by and construed in accordance with the laws of the <b>Kingdom of Morocco</b>.
                </p>
                
            </div>
        </div>
    </section>

    <?php include('../sections/footer.php'); ?>

    <!-- Bootstrap 5 JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
