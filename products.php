<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <!-- Set character encoding to UTF-8 -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Ensure responsive viewport settings -->
    <title>Products - Bakeology</title>
    <!-- Page title -->
    <link rel="stylesheet" href="styles.css">
    <!-- Link to external CSS file -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <!-- Link to Font Awesome for icons -->
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css">
    <!-- Link to Swiper CSS for slider -->
</head>
<body class="products-page">
    <header>
        <!-- Header section -->
        <nav>
            <!-- Navigation bar -->
            <div class="logo-container">
                <!-- Container for logo and website name -->
                <img src="images/cake-hero.jpg" alt="Bakeology Logo" class="logo-image">
                <!-- Logo image -->
                <span class="website-name">Bakeology</span>
                <!-- Website name -->
            </div>
        
            <ul class="tap-menu">
                <!-- Navigation menu -->
                <li><a href="index.php" class="nav-link">Home</a></li>
                <!-- Home link -->
                <li><a href="products.php" class="nav-link active">Products</a></li>
                <!-- Products link (active) -->
                <li><a href="blogs.php" class="nav-link">Blogs</a></li>
                <!-- Blogs link -->
                <li><a href="history.php" class="nav-link">History</a></li>
                <!-- History link -->
                <li><a href="contact.php" class="nav-link">Contact</a></li>
                <!-- Contact link -->
                <li><a href="login.php" class="nav-link">Login</a></li>
                <!-- Login link -->
            </ul>
        
            <div class="icons-container">
                <!-- Container for icons -->
                <div class="search-container">
                    <!-- Search icon container -->
                    <i class="fas fa-search search-icon" id="searchIcon"></i>
                    <!-- Search icon -->
                    <div class="search-bar" id="searchBar">
                        <!-- Search bar -->
                        <input type="text" placeholder="Search..." id="searchInput">
                        <!-- Search input field -->
                    </div>
                    <div class="search-results" id="searchResults"></div>
                    <!-- Search results container -->
                </div>
        
                <div class="cart-container">
                    <!-- Cart icon container -->
                    <a href="#" class="cart-icon" id="cartIcon">
                        <!-- Cart link -->
                        <i class="fas fa-shopping-cart"></i>
                        <!-- Cart icon -->
                        <span class="cart-count">0</span>
                        <!-- Cart item count -->
                    </a>
                </div>

                <i class="fas fa-moon dark-mode-toggle" id="darkModeToggle"></i>
                <!-- Dark mode toggle icon -->
            </div>
        </nav>
    </header>

    <main>
        <!-- Main content section -->
        <section class="products-slider">
            <!-- Products slider section -->
            <h1>Our Bakery Categories</h1>
            <!-- Section heading -->
            <div class="swiper-container">
                <!-- Swiper container for slider -->
                <div class="swiper-wrapper">
                    <!-- Wrapper for slider slides -->
                    <div class="swiper-slide">
                        <!-- Slide 1 -->
                        <a href="cakes.php">
                            <!-- Link to cakes page -->
                            <img src="images/cakes.jpg" alt="Cakes">
                            <!-- Slide image -->
                            <div class="slide-content">
                                <!-- Slide content -->
                                <h2>Cakes</h2>
                                <!-- Slide heading -->
                                <p>Explore our delicious range of cakes for every occasion.</p>
                                <!-- Slide description -->
                            </div>
                        </a>
                    </div>

                    <div class="swiper-slide">
                        <!-- Slide 2 -->
                        <a href="pastries.php">
                            <!-- Link to pastries page -->
                            <img src="images/pastries.jpg" alt="Pastries">
                            <!-- Slide image -->
                            <div class="slide-content">
                                <!-- Slide content -->
                                <h2>Pastries</h2>
                                <!-- Slide heading -->
                                <p>Flaky, buttery, and irresistible pastries.</p>
                                <!-- Slide description -->
                            </div>
                        </a>
                    </div>

                    <div class="swiper-slide">
                        <!-- Slide 3 -->
                        <a href="breads.php">
                            <!-- Link to breads page -->
                            <img src="images/breads.jpg" alt="Breads">
                            <!-- Slide image -->
                            <div class="slide-content">
                                <!-- Slide content -->
                                <h2>Breads</h2>
                                <!-- Slide heading -->
                                <p>Freshly baked breads for your daily meals.</p>
                                <!-- Slide description -->
                            </div>
                        </a>
                    </div>

                    <div class="swiper-slide">
                        <!-- Slide 4 -->
                        <a href="cookies.php">
                            <!-- Link to cookies page -->
                            <img src="images/cookies.jpg" alt="Cookies">
                            <!-- Slide image -->
                            <div class="slide-content">
                                <!-- Slide content -->
                                <h2>Cookies</h2>
                                <!-- Slide heading -->
                                <p>Crunchy, chewy, and oh-so-delicious cookies.</p>
                                <!-- Slide description -->
                            </div>
                        </a>
                    </div>

                    <div class="swiper-slide">
                        <!-- Slide 5 -->
                        <a href="cupcakes.php">
                            <!-- Link to cupcakes page -->
                            <img src="images/cupcakes.jpg" alt="Cupcakes">
                            <!-- Slide image -->
                            <div class="slide-content">
                                <!-- Slide content -->
                                <h2>Cupcakes</h2>
                                <!-- Slide heading -->
                                <p>Bite-sized treats for every sweet tooth.</p>
                                <!-- Slide description -->
                            </div>
                        </a>
                    </div>

                    <div class="swiper-slide">
                        <!-- Slide 6 -->
                        <a href="desserts.php">
                            <!-- Link to desserts page -->
                            <img src="images/desserts.jpg" alt="Desserts">
                            <!-- Slide image -->
                            <div class="slide-content">
                                <!-- Slide content -->
                                <h2>Desserts</h2>
                                <!-- Slide heading -->
                                <p>Indulge in our decadent dessert collection.</p>
                                <!-- Slide description -->
                            </div>
                        </a>
                    </div>
                </div>

                <div class="swiper-pagination"></div>
                <!-- Pagination for slider -->
                <div class="swiper-button-next"></div>
                <!-- Next button -->
                <div class="swiper-button-prev"></div>
                <!-- Previous button -->
            </div>
        </section>
        <div class="cart-side-panel" id="cartSidePanel">
            <!-- Cart side panel -->
            <div class="cart-header">
                <!-- Cart header -->
                <h3>Your Cart</h3>
                <!-- Cart title -->
                <button class="close-cart-btn" id="closeCartBtn">×</button>
                <!-- Close button -->
            </div>
            <div class="cart-items" id="cartItems">
                <!-- Container for cart items -->
            </div>
            <div class="cart-footer">
                <!-- Cart footer -->
                <p class="total-cost">Total: <span id="totalCost">$0.00</span></p>
                <!-- Total cost display -->
                <button class="checkout-btn">Checkout Now</button>
                <!-- Checkout button -->
            </div>
        </div>
    </main>

    <footer>
        <!-- Footer section -->
        <p>© 2023 Bakeology. All rights reserved.</p>
        <!-- Copyright notice -->
    </footer>

    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
    <!-- Link to Swiper JavaScript -->
    <script src="script.js"></script>
    <!-- Link to external JavaScript file -->
</body>
</html>