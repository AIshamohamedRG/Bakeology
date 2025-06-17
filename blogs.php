<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog - Bakeology</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body class="blogs-page">
    <header>
        <!-- Navigation Bar -->
        <nav>
            <div class="logo-container">
                <img src="images/cake-hero.jpg" alt="Bakeology Logo" class="logo-image">
                <span class="website-name">Bakeology</span>
            </div>
            <ul class="tap-menu">
                <li><a href="index.php" class="nav-link">Home</a></li>
                <li><a href="products.php" class="nav-link">Products</a></li>
                <li><a href="blogs.php" class="nav-link active">Blogs</a></li>
                <li><a href="history.php" class="nav-link">History</a></li>
                <li><a href="contact.php" class="nav-link">Contact</a></li>
                <li><a href="login.php" class="nav-link">Login</a></li>
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

                <!-- Dark Mode Toggle -->
                <i class="fas fa-moon dark-mode-toggle" id="darkModeToggle"></i>
            </div>
        </nav>
    </header>
    <main>
        <!-- Blog Posts Section -->
        <section class="blog-posts">
            <article class="blog-post">
                <img src="images/cakes.jpg" alt="Delicious Cake">
                <div class="blog-post-content">
                    <h2>The Art of Cake Decoration</h2>
                    <p>Discover the secrets behind creating stunning cake designs that will leave your guests in awe.</p>
                    <a href="#" class="read-more">Read More</a>
                </div>
            </article>
            <article class="blog-post">
                <img src="images/pastries.jpg" alt="Tasty Pastries">
                <div class="blog-post-content">
                    <h2>Mastering the Perfect Pastry</h2>
                    <p>Learn how to bake flaky, buttery pastries that melt in your mouth with every bite.</p>
                    <a href="#" class="read-more">Read More</a>
                </div>
            </article>
            <article class="blog-post">
                <img src="images/desserts.jpg" alt="Sweet Desserts">
                <div class="blog-post-content">
                    <h2>Top 5 Desserts for Summer</h2>
                    <p>Explore our favorite summer dessert recipes that are perfect for any occasion.</p>
                    <a href="#" class="read-more">Read More</a>
                </div>
            </article>
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
        <p>© 2023 Bakeology. All rights reserved.</p>
    </footer>
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
    <!-- Link to Swiper JavaScript -->

    <script src="script.js"></script>
</body>
</html>