<?php
session_start();
if (isset($_SESSION["user"])) {
   header("Location: index.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up - Bakeology</title>
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
        <section class="login-section">
            <div class="login-container">
                <h1>Create Your Account</h1>
                <p>Join Bakeology to explore delicious recipes and products.</p>
                
                <?php
                    if (isset($_POST["submit"])) {
                        $name = $_POST["name"];
                        $email = $_POST["email"];
                        $password = $_POST["password"];
                        $passwordConfirm = $_POST["confirm_password"];
                        
                        $passwordHash = password_hash($password, PASSWORD_DEFAULT);

                        $errors = array();
                        
                        if (empty($name) OR empty($email) OR empty($password) OR empty($passwordConfirm)) {
                            array_push($errors,"All fields are required");
                        }
                        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                            array_push($errors, "Email is not valid");
                        }
                        if (strlen($password)<8) {
                            array_push($errors,"Password must be at least 8 charactes long");
                        }
                        if ($password!==$passwordConfirm) {
                            array_push($errors,"Password does not match");
                        }
                        require_once "database.php";
                        $sql = "SELECT * FROM users WHERE email = '$email'";
                        $result = mysqli_query($conn, $sql);
                        $rowCount = mysqli_num_rows($result);
                        if ($rowCount>0) {
                            array_push($errors,"Email already exists!");
                        }
                        if (count($errors)>0) {
                            foreach ($errors as  $error) {
                                echo "<div class='alert alert-danger'>$error</div>";
                            }
                        }else{
                            $sql = "INSERT INTO users (name, email, password) VALUES ( ?, ?, ? )";
                            $stmt = mysqli_stmt_init($conn);
                            $prepareStmt = mysqli_stmt_prepare($stmt,$sql);
                            if ($prepareStmt) {
                                mysqli_stmt_bind_param($stmt,"sss",$name, $email, $passwordHash);
                                mysqli_stmt_execute($stmt);
                                echo "<div class='alert alert-success'>You are registered successfully.</div>";
                                header("Location: login.php");
                            }else{
                                die("Something went wrong");
                            }
                        }
                    }
                ?>
                
                <form id="signupForm" method="post" action="signup.php">
                    <div class="input-group">
                        <label for="name">Full Name:</label>
                        <input type="text" id="name" name="name" required value="<?php echo isset($_POST['name']) ? htmlspecialchars($_POST['name']) : ''; ?>">
                    </div>
                    <div class="input-group">
                        <label for="email">Email:</label>
                        <input type="email" id="email" name="email" required value="<?php echo isset($_POST['email']) ? htmlspecialchars($_POST['email']) : ''; ?>">
                    </div>
                    <div class="input-group">
                        <label for="password">Password:</label>
                        <input type="password" id="password" name="password" required>
                        <span id="passwordError" class="error-message" style="display: none;">Password must be at least 8 characters long.</span>
                    </div>
                    <div class="input-group">
                        <label for="confirm-password">Confirm Password:</label>
                        <input type="password" id="confirm-password" name="confirm_password" required>
                        <span id="confirmPasswordError" class="error-message" style="display: none;">Passwords do not match.</span>
                    </div>
                    <button type="submit" name="submit">Sign Up</button>
                </form>
                <p class="register-link">Already have an account? <a href="login.php">Log in here</a></p>
            </div>
        </section>
    </main>
    
    <!-- Cart panel and footer remain the same -->
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
    document.getElementById('signupForm').addEventListener('submit', function(e) {
        const password = document.getElementById('password').value;
        const confirmPassword = document.getElementById('confirm-password').value;
        const passwordError = document.getElementById('passwordError');
        const confirmPasswordError = document.getElementById('confirmPasswordError');
        
        let isValid = true;
        
        // Validate password length
        if (password.length < 8) {
            passwordError.style.display = 'block';
            isValid = false;
        } else {
            passwordError.style.display = 'none';
        }
        
        // Validate password match
        if (password !== confirmPassword) {
            confirmPasswordError.style.display = 'block';
            isValid = false;
        } else {
            confirmPasswordError.style.display = 'none';
        }
        
        if (!isValid) {
            e.preventDefault();
        }
    });
    </script>
</body>
</html>