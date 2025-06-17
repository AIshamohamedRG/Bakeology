<?php
session_start();

// Redirect if already logged in
if (isset($_SESSION["user"])) {
    header("Location:index.php");
    exit();
}

// Database connection
require_once "database.php";

$loginError = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $password = $_POST["password"];
    
    // Validate inputs
    if (empty($email) || empty($password)) {
        $loginError = "Please fill in all fields";
    } else {
        // Check if user exists
        $sql = "SELECT * FROM users WHERE email = ?";
        $stmt = mysqli_prepare($conn, $sql);
        mysqli_stmt_bind_param($stmt, "s", $email);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        $user = mysqli_fetch_assoc($result);
        
        if ($user) {
            if (password_verify($password, $user["password"])) {
                // Set session variables
                $_SESSION["user"] = $user;
                $_SESSION["user_id"] = $user["Id"];
                $_SESSION["user_name"] = $user["name"];
                echo "<div class='alert alert-success'>You are logged in successfully.</div>";
                header("Location: index.php");
            } else {
                $loginError = "Invalid email or password";
            }
        } else {
            $loginError = "Invalid email or password";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Bakeology</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body class="login-page">
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
                <li><a href="contact.php" class="nav-link">Contact</a></li>
                <li><a href="login.php" class="nav-link active">Login</a></li>
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
        <section class="login-section">
            <div class="login-container">
                <h1>Welcome Back!</h1>
                <p>Please log in to access your account.</p>
                
                <?php if (!empty($loginError)): ?>
                    <div class="error-message"><?php echo $loginError; ?></div>
                <?php endif; ?>
                
                <form id="loginForm" method="POST" action="login.php">
                    <div class="input-group">
                        <label for="email">Email:</label>
                        <input type="email" id="email" name="email" required>
                    </div>
                    <div class="input-group">
                        <label for="password">Password:</label>
                        <input type="password" id="password" name="password" required>
                        <span id="passwordError" class="error-message" style="display: none;">Password must be at least 8 characters long.</span>
                    </div>
                    <button type="submit">Login</button>
                </form>
                
                <p class="register-link">Don't have an account? <a href="signup.php">Sign up here</a></p>
            </div>
        </section>
    </main>
    
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

    <footer>
        <p>© 2023 Bakeology. All rights reserved.</p>
    </footer>
    
    <script src="script.js"></script>
    
    <script>
    // Client-side validation
    document.getElementById('loginForm').addEventListener('submit', function(e) {
        const password = document.getElementById('password').value;
        const passwordError = document.getElementById('passwordError');
        
        // Validate password length
        if (password.length < 8) {
            passwordError.style.display = 'block';
            e.preventDefault();
        } else {
            passwordError.style.display = 'none';
        }
    });
    </script>
</body>
</html>