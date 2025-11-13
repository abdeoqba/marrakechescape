<!-- 7. Enhanced Footer Component (for injection at the end of each page) -->

<!-- Note: This component assumes the existence of the defined CSS variables and general body styles. -->
<style>
    /* --- Footer Styles --- */
    .footer-custom {
        background-color: var(--color-dark-blue);
        color: #f0f0f0; /* Light text for dark background */
        padding: 60px 0 20px 0;
        font-size: 0.95rem;
    }

    .footer-logo-img {
        max-width: 180px;
        margin-bottom: 10px;
        /* Note: Assuming logo.wide.png is light or transparent. */
    }

    .footer-desc {
        color: #b0b0b0;
        font-size: 0.85rem;
        line-height: 1.6;
    }

    .footer-title {
        color: var(--color-light-orange);
        font-weight: 700;
        margin-bottom: 1.25rem;
        font-size: 1.1rem;
    }

    .footer-links .list-unstyled a {
        color: #e0e0e0;
        text-decoration: none;
        transition: color 0.3s;
        display: inline-block;
        padding: 4px 0;
    }

    .footer-links .list-unstyled a:hover {
        color: var(--color-yellow);
        text-decoration: underline;
    }

    .footer-social a {
        color: var(--color-blue-light);
        font-size: 1.6rem;
        margin-right: 1rem;
        transition: color 0.3s;
    }

    .footer-social a:hover {
        color: var(--color-light-orange);
    }
    
    .footer-bottom {
        border-top: 1px solid rgba(255, 255, 255, 0.1);
        padding-top: 20px;
        margin-top: 40px;
    }
    .footer-bottom p {
        color: #a0a0a0;
        font-size: 0.8rem;
    }
</style>

<footer class="footer-custom">
    <div class="container">
        <div class="row g-5">

            <!-- Column 1: Logo & Description -->
            <div class="col-lg-4 col-md-6">
                <div class="mb-3">
                    <!-- Note: Assuming you need a light version of the logo for dark mode -->
                    <img src="asset/image/marrakech-escape-logo-600.png" alt="Marrakech Escape" class="footer-logo-img">
                </div>
                <p class="footer-desc">
                    Marrakech Escape crafts personalized private tours, blending **luxury, authenticity, and Moroccan hospitality** for unforgettable journeys across Morocco's deserts, mountains, and imperial cities.
                </p>
                <div class="footer-social mt-4">
                    <a href="#"><i class="fab fa-facebook-f"></i></a>
                    <a href="#"><i class="fab fa-instagram"></i></a>
                    <a href="#"><i class="fab fa-x-twitter"></i></a>
                    <a href="#"><i class="fab fa-whatsapp"></i></a>
                </div>
            </div>

            <!-- Column 2: Quick Links -->
            <div class="col-lg-2 col-md-6 footer-links">
                <h5 class="footer-title">Quick Links</h5>
                <ul class="list-unstyled">
                    <li><a href="/home">Home</a></li>
                    <li><a href="/about">Our Story</a></li>
                    <li><a href="/contact">Book Your Escape</a></li>
                    <li><a href="/faq">Travel FAQ</a></li>
                    <li><a href="/guides">Meet the Guides</a></li>
                </ul>
            </div>

            <!-- Column 3: Explore Tours -->
            <div class="col-lg-3 col-md-6 footer-links">
                <h5 class="footer-title">Explore Tours</h5>
                <ul class="list-unstyled">
                    <li><a href="/program">All Programs</a></li>
                    <li><a href="/program_details">Sahara Desert</a></li>
                    <li><a href="/program_details">Imperial Cities</a></li>
                    <li><a href="/program_details">Atlas Mountains</a></li>
                    <li><a href="/reviews">Client Reviews</a></li>
                </ul>
            </div>

            <!-- Column 4: Support & Contact -->
            <div class="col-lg-3 col-md-6 footer-links">
                <h5 class="footer-title">Support & Legal</h5>
                <ul class="list-unstyled mb-4">
                    <li><a href="/policy">Privacy Policy</a></li>
                    <li><a href="/terms">Terms & Conditions</a></li>
                </ul>
                <h5 class="footer-title mb-3">Get In Touch</h5>
                <p style="color: #e0e0e0;"><i class="fas fa-envelope me-2" style="color: var(--color-yellow);"></i> info@marrakeshescape.com</p>
                <p style="color: #e0e0e0;"><i class="fas fa-phone me-2" style="color: var(--color-yellow);"></i> +212 524 XXX XXX</p>
            </div>
        </div>

        <!-- Copyright and Bottom Bar -->
        <div class="row footer-bottom text-center">
            <div class="col-12">
                <p class="mb-0">&copy; <?= date('Y'); ?> Marrakech Escape. All rights reserved. | Crafted with Passion in Morocco.</p>
            </div>
        </div>
    </div>
</footer>
