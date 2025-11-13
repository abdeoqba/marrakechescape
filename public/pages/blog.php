<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Our Blog - Latest Articles</title>

    <!-- Load Poppins Font -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

    <!-- Load Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
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
            padding-top: 80px; /* Space for fixed navbar */
        }

        /* --- Navbar Styles (Copied from Homepage) --- */
        .navbar-custom {
            transition: all 0.4s ease-in-out;
            background-color: var(--color-dark-blue) !important; /* Always dark blue on interior page */
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.2);
        }
        .navbar-custom .nav-link {
            color: #fcfcfc !important;
            font-weight: 600;
        }
        .navbar-custom .nav-link:hover {
            color: var(--color-light-orange) !important;
        }
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@100..900&display=swap');
        body {
            font-family: 'Inter', sans-serif;
            background-color: #f4f6f9;
        }
    </style>
</head>
<body class="min-h-screen flex flex-col">

    <?php include("../sections/header.php"); ?>

    <main class="flex-grow py-12 px-4 sm:px-6 lg:px-8">
        <div class="max-w-7xl mx-auto">
            <h1 class="text-5xl font-extrabold text-gray-900 mb-4 text-center">
                The Creative Hub Blog
            </h1>
            <p class="text-xl text-gray-500 mb-12 text-center max-w-3xl mx-auto">
                Discover insights, tips, and tutorials on design, development, and digital innovation.
            </p>

            <div class="grid gap-10 md:grid-cols-2 lg:grid-cols-3">

                <!-- Blog Post Card 1 -->
                <div class="bg-white rounded-xl shadow-xl overflow-hidden transform hover:scale-[1.02] transition duration-300">
                    <a href="post.html" class="block">
                        <img class="h-48 w-full object-cover" src="https://placehold.co/600x400/007AFF/ffffff?text=Design+Trends" alt="Featured image for post 1">
                        <div class="p-6">
                            <p class="text-sm font-semibold text-indigo-600 uppercase tracking-wider mb-2">Design</p>
                            <h2 class="text-xl font-bold text-gray-900 line-clamp-2 mb-3">
                                7 UI/UX Trends That Will Dominate 2025
                            </h2>
                            <p class="text-gray-500 text-sm mb-4">
                                A deep dive into the evolving world of user interface and experience, focusing on minimalism and interactivity.
                            </p>
                            <div class="flex items-center justify-between text-xs text-gray-400">
                                <span>October 25, 2025</span>
                                <span>4 min read</span>
                            </div>
                        </div>
                    </a>
                </div>

                <!-- Blog Post Card 2 -->
                <div class="bg-white rounded-xl shadow-xl overflow-hidden transform hover:scale-[1.02] transition duration-300">
                    <a href="post.html" class="block">
                        <img class="h-48 w-full object-cover" src="https://placehold.co/600x400/4CAF50/ffffff?text=Web+Dev" alt="Featured image for post 2">
                        <div class="p-6">
                            <p class="text-sm font-semibold text-green-600 uppercase tracking-wider mb-2">Development</p>
                            <h2 class="text-xl font-bold text-gray-900 line-clamp-2 mb-3">
                                Scaling React Applications with State Management
                            </h2>
                            <p class="text-gray-500 text-sm mb-4">
                                Choosing the right tools like Zustand or Redux for large-scale, enterprise-level React projects.
                            </p>
                            <div class="flex items-center justify-between text-xs text-gray-400">
                                <span>October 18, 2025</span>
                                <span>8 min read</span>
                            </div>
                        </div>
                    </a>
                </div>

                <!-- Blog Post Card 3 -->
                <div class="bg-white rounded-xl shadow-xl overflow-hidden transform hover:scale-[1.02] transition duration-300">
                    <a href="post.html" class="block">
                        <img class="h-48 w-full object-cover" src="https://placehold.co/600x400/FFC107/333333?text=Productivity" alt="Featured image for post 3">
                        <div class="p-6">
                            <p class="text-sm font-semibold text-yellow-600 uppercase tracking-wider mb-2">Productivity</p>
                            <h2 class="text-xl font-bold text-gray-900 line-clamp-2 mb-3">
                                The Power of Deep Work in a Distracted World
                            </h2>
                            <p class="text-gray-500 text-sm mb-4">
                                Techniques to minimize interruptions and maximize focused, high-value creative output every day.
                            </p>
                            <div class="flex items-center justify-between text-xs text-gray-400">
                                <span>October 10, 2025</span>
                                <span>5 min read</span>
                            </div>
                        </div>
                    </a>
                </div>

                <!-- Blog Post Card 4 -->
                <div class="bg-white rounded-xl shadow-xl overflow-hidden transform hover:scale-[1.02] transition duration-300">
                    <a href="post.html" class="block">
                        <img class="h-48 w-full object-cover" src="https://placehold.co/600x400/FF5722/ffffff?text=SEO+Optimization" alt="Featured image for post 4">
                        <div class="p-6">
                            <p class="text-sm font-semibold text-orange-600 uppercase tracking-wider mb-2">Marketing</p>
                            <h2 class="text-xl font-bold text-gray-900 line-clamp-2 mb-3">
                                Mastering On-Page SEO: The 5 Essential Pillars
                            </h2>
                            <p class="text-gray-500 text-sm mb-4">
                                A checklist for optimizing your blog content for maximum search engine visibility and ranking potential.
                            </p>
                            <div class="flex items-center justify-between text-xs text-gray-400">
                                <span>September 30, 2025</span>
                                <span>6 min read</span>
                            </div>
                        </div>
                    </a>
                </div>

            </div>
        </div>
    </main>

    <?php include("../sections/footer.php"); ?>

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <!-- Bootstrap 5 JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    
</body>
</html>