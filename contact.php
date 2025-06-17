<?php
// Process form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $inquiry_type = $_POST['inquiry_type'];
    $message = $_POST['message'];
    
    // Validate inputs
    $errors = [];
    
    if (empty($name)) {
        $errors[] = "Full name is required";
    }
    
    if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Valid email is required";
    }
    
    if (empty($inquiry_type)) {
        $errors[] = "Inquiry type is required";
    }
    
    if (empty($message)) {
        $errors[] = "Message is required";
    }
    
    // If no errors, process the form
    if (empty($errors)) {
        // Database connection
        require_once "database.php";
        
        // Insert into database
        $sql = "INSERT INTO inquiries (name, email, phone, inquiry_type, message, submitted_at) 
                VALUES (?, ?, ?, ?, ?, NOW())";
        $stmt = mysqli_prepare($conn, $sql);
        mysqli_stmt_bind_param($stmt, "sssss", $name, $email, $phone, $inquiry_type, $message);
        
        if (mysqli_stmt_execute($stmt)) {
            $success_message = "Your inquiry has been submitted successfully!";
        } else {
            $errors[] = "Error submitting your inquiry. Please try again.";
        }
        
        mysqli_stmt_close($stmt);
        mysqli_close($conn);
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us - Bakeology</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body class="contact-page">
    <header>
        <nav>
            <div class="logo-container">
                <img src="images/cake-hero.jpg" alt="Bakeology Logo" class="logo-image">
                <span class="website-name">Bakeology</span>
            </div>
        
            <ul class="tap-menu">
                <li><a href="index.php" class="nav-link">Home</a></li>
                <li><a href="products.php" class="nav-link">Products</a></li>
                <li><a href="blogs.php" class="nav-link">Blogs</a></li>
                <li><a href="history.php" class="nav-link">History</a></li>
                <li><a href="contact.php" class="nav-link active">Contact</a></li>
                <li><a href="login.php" class="nav-link">Login</a></li>
            </ul>
        
            <div class="icons-container">
                <div class="search-container">
                    <i class="fas fa-search search-icon" id="searchIcon"></i>
                    <div class="search-bar" id="searchBar">
                        <input type="text" placeholder="Search..." id="searchInput">
                    </div>
                    <div class="search-results" id="searchResults"></div>
                </div>
        
                <div class="cart-container">
                    <a href="#" class="cart-icon" id="cartIcon">
                        <i class="fas fa-shopping-cart"></i>
                        <span class="cart-count">0</span>
                    </a>
                </div>

                <i class="fas fa-moon dark-mode-toggle" id="darkModeToggle"></i>
            </div>
        </nav>
    </header>

    <main>
        <!-- Contact Card -->
        <div class="contact-card">
            <div class="content-section">
                <h2>CONTACT US</h2>
                
                <div class="contact-info">
                    <div class="contact-method">
                        <i class="fas fa-envelope"></i>
                        <p>Bakedogy@gmail.com</p>
                    </div>
                    <div class="contact-method">
                        <i class="fas fa-phone"></i>
                        <p>+02 422 30 711</p>
                    </div>
                </div>

                <?php if (!empty($errors)): ?>
                    <div class="error-message">
                        <?php foreach ($errors as $error): ?>
                            <p><?php echo $error; ?></p>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>

                <?php if (isset($success_message)): ?>
                    <div class="confirmation-message">
                        <p><?php echo $success_message; ?></p>
                    </div>
                <?php endif; ?>

                <form class="contact-form" method="POST" action="contact.php">
                    <input type="text" name="name" placeholder="Full Name" required value="<?php echo isset($_POST['name']) ? htmlspecialchars($_POST['name']) : ''; ?>">
                    <input type="email" name="email" placeholder="Email" required value="<?php echo isset($_POST['email']) ? htmlspecialchars($_POST['email']) : ''; ?>">
                    <input type="tel" name="phone" placeholder="Phone Number" value="<?php echo isset($_POST['phone']) ? htmlspecialchars($_POST['phone']) : ''; ?>">
                    <select name="inquiry_type" required>
                        <option value="">Select Inquiry Type</option>
                        <option value="Custom Order" <?php echo (isset($_POST['inquiry_type']) && $_POST['inquiry_type'] == 'Custom Order') ? 'selected' : ''; ?>>Custom Order</option>
                        <option value="Event Booking" <?php echo (isset($_POST['inquiry_type']) && $_POST['inquiry_type'] == 'Event Booking') ? 'selected' : ''; ?>>Event Booking</option>
                        <option value="General Question" <?php echo (isset($_POST['inquiry_type']) && $_POST['inquiry_type'] == 'General Question') ? 'selected' : ''; ?>>General Question</option>
                    </select>
                    <textarea name="message" placeholder="Your Message" rows="5" required><?php echo isset($_POST['message']) ? htmlspecialchars($_POST['message']) : ''; ?></textarea>
                    <button type="submit" class="submit-button">SUBMIT INQUIRY</button>
                </form>

                <p class="account-prompt">Activate With Love</p>
            </div>

            <div class="image-section">
                <img src="images/bg-pic.jpg" alt="Bakery Products" class="card-image">
            </div>
        </div>
        
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
    </main>

    <footer>
        <p>© 2023 Bakeology. All rights reserved.</p>
    </footer>
    
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
    <script src="script.js"></script>
</body>
</html>