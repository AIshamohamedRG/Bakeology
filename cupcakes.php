<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <!-- Set character encoding to UTF-8 -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Ensure responsive viewport settings -->
    <title>Sign Up - Bakeology</title>
    <!-- Page title -->
    <link rel="stylesheet" href="styles.css">
    <!-- Link to external CSS file -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <!-- Link to Font Awesome for icons -->
</head>
<body class="login-page">
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
    <section class="products-section">
        <!-- Products section -->
        <h2>Our Products</h2>
        <!-- Section heading -->
        <div class="products-container">
            <!-- Container for product cards -->
            <div class="product-card">
                <!-- Product card 1 -->
                <img src="images/Vanilla CupCake.jpg" alt="Vanilla Cupcake">
                <!-- Product image -->
                <h3>Vanilla Cupcake</h3>
                <!-- Product name -->
                <p class="price">70 EG</p>
                <!-- Product price -->
                <button onclick="addToCart({ name: 'Vanilla Cupcake', price: 70, image: 'images/Vanilla Cupcake.jpg' })">Add to Cart</button>
                <!-- Add to cart button with JavaScript function -->
            </div>

            <div class="product-card">
                <!-- Product card 2 -->
                <img src="images/red velvet cupcake.jpg" alt="red Velvet cupcake">
                <!-- Product image -->
                <h3>Red Velvet Cupcake</h3>
                <!-- Product name -->
                <p class="price">75 EG</p>
                <!-- Product price -->
                <button onclick="addToCart({ name: 'Red Velvet cupcake', price: 75, image: 'images/red Velvet cupcake.jpg' })">Add to Cart</button>
                <!-- Add to cart button with JavaScript function -->
            </div>

            <div class="product-card">
                <!-- Product card 3 -->
                <img src="images/Oreo Cupcake.jpg" alt="Oreo Cupcake">
                <!-- Product image -->
                <h3>Oreo Cupcake</h3>
                <!-- Product name -->
                <p class="price">80 EG</p>
                <!-- Product price -->
                <button onclick="addToCart({ name: 'Oreo Cupcake', price: 80, image: 'images/Oreo Cupcake.jpg' })">Add to Cart</button>
                <!-- Add to cart button with JavaScript function -->
            </div>
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