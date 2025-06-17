<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <!-- Set character encoding to UTF-8 -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Ensure responsive viewport settings -->
    <title>History - Bakeology</title>
    <!-- Page title -->
    <link rel="stylesheet" href="styles.css">
    <!-- Link to external CSS file -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <!-- Link to Font Awesome for icons -->
</head>
<body class="history-page">
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
                <li><a href="products.php" class="nav-link">Products</a></li>
                <!-- Products link -->
                <li><a href="blogs.php" class="nav-link">Blogs</a></li>
                <!-- Blogs link -->
                <li><a href="history.php" class="nav-link active">History</a></li>
                <!-- History link (active) -->
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
        <section class="history">
            <!-- History section -->
            <h1>Our History</h1>
            <!-- Main heading for history -->
            <div class="timeline">
                <!-- Timeline container -->
                <div class="timeline-item">
                    <!-- Timeline item 1 -->
                    <div class="timeline-year">
                        <!-- Timeline year -->
                        <i class="fas fa-birthday-cake"></i> 2000 - 2006
                        <!-- Icon and year range -->
                    </div>
                    <div class="timeline-content">
                        <!-- Timeline content -->
                        <img src="images/2000-2006.jpg" alt="The Beginning" class="timeline-image">
                        <!-- Timeline image -->
                        <h2>The Beginning</h2>
                        <!-- Subheading -->
                        <p>Our journey started in a small kitchen with a passion for baking. We created our first signature cake in 2000.</p>
                        <!-- Paragraph description -->
                    </div>
                </div>
            
                <div class="timeline-item">
                    <!-- Timeline item 2 -->
                    <div class="timeline-year">
                        <!-- Timeline year -->
                        <i class="fas fa-store"></i> 2006 - 2017
                        <!-- Icon and year range -->
                    </div>
                    <div class="timeline-content">
                        <!-- Timeline content -->
                        <img src="images/2006-2017.jpg" alt="Expansion" class="timeline-image">
                        <!-- Timeline image -->
                        <h2>Expansion</h2>
                        <!-- Subheading -->
                        <p>We opened our first bakery in the heart of the city, offering a wide range of cakes and pastries.</p>
                        <!-- Paragraph description -->
                    </div>
                </div>
            
                <div class="timeline-item">
                    <!-- Timeline item 3 -->
                    <div class="timeline-year">
                        <!-- Timeline year -->
                        <i class="fas fa-lightbulb"></i> 2017 - Present
                        <!-- Icon and year range -->
                    </div>
                    <div class="timeline-content">
                        <!-- Timeline content -->
                        <img src="images/2017-present.jpg" alt="Innovation" class="timeline-image">
                        <!-- Timeline image -->
                        <h2>Innovation</h2>
                        <!-- Subheading -->
                        <p>We introduced new flavors and techniques, becoming a leader in the baking industry.</p>
                        <!-- Paragraph description -->
                    </div>
                </div>
            </div>
        </section>
    </main>
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