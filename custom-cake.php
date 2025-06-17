<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Design Your Cake - Bakeology</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
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
            
                <!-- Cart Icon in your navigation -->
                <div class="cart-container">
                    <a href="#" class="cart-icon" id="cartIcon">
                        <i class="fas fa-shopping-cart"></i>
                        <span class="cart-count">0</span>
                    </a>
                </div>

                <!-- Cart Side Panel (can be at bottom of body) -->
                <div class="cart-side-panel" id="cartSidePanel">
                    <div class="cart-header">
                        <h3>Your Cart</h3>
                        <button class="close-cart-btn" id="closeCartBtn">×</button>
                    </div>
                    <div class="cart-items" id="cartItems"></div>
                    <div class="cart-footer">
                        <p class="total-cost">Total: <span id="totalCost">$0.00</span></p>
                        <button class="checkout-btn">Checkout Now</button>
                    </div>
                </div>
            
                <!-- Dark mode toggle -->
                <div class="dark-mode-container">
                    <i class="fas fa-moon dark-mode-toggle" id="darkModeToggle"></i>
                </div>
            </div>
        </nav>
    </header>

    <main>
        <section class="cake-game-container">
            <div class="game-header">
                <h1><i class="fas fa-magic"></i> Design Your Dream Cake</h1>
                <p class="subtitle">Click ingredients to build your cake</p>
            </div>

            <div class="game-area">
                <!-- Cake Display Canvas -->
                <div class="cake-display">
                    <canvas id="cakeCanvas" width="400" height="300"></canvas>
                </div>
                
                <!-- Ingredient Selector -->
                <div class="ingredient-selector">
                    <div class="ingredient-category active" data-category="base">
                        <h3><i class="fas fa-layer-group"></i> 1. Cake Base</h3>
                        <div class="ingredient-options">
                            <button class="ingredient-btn active" data-type="base" data-value="vanilla" data-color="#f5f5dc" data-price="10">
                                Vanilla (+$10)
                            </button>
                            <button class="ingredient-btn" data-type="base" data-value="chocolate" data-color="#5c3a21" data-price="12">
                                Chocolate (+$12)
                            </button>
                            <button class="ingredient-btn" data-type="base" data-value="redvelvet" data-color="#8b0000" data-price="15">
                                Red Velvet (+$15)
                            </button>
                        </div>
                    </div>
                    
                    <!-- More ingredient categories -->
                </div>
                
                <div class="game-controls">
                    <div class="price-display">
                        <span>Total: $</span>
                        <span id="cakePrice">10</span>
                    </div>
                    <button class="add-to-cart-btn">
                        <i class="fas fa-cart-plus"></i> Add to Cart
                    </button>
                </div>
            </div>
        </section>
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