// Initialize Swiper for the products slider
const swiper = new Swiper('.swiper-container', {
    slidesPerView: 1,
    spaceBetween: 30,
    loop: true,
    pagination: {
        el: '.swiper-pagination',
        clickable: true,
    },
    navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
    },
    breakpoints: {
        768: {
            slidesPerView: 1,
        },
        1024: {
            slidesPerView: 1,
        },
    },
});

// ======================
// FORM HANDLERS SECTION
// ======================

// 1. Signup Form Handler
document.addEventListener('DOMContentLoaded', function() {
    const signupForm = document.getElementById('signupForm');
    const signupConfirmation = document.getElementById('confirmationMessage');
    
    if (signupForm) {
        signupForm.addEventListener('submit', function(event) {
            event.preventDefault();

            const password = document.getElementById('password').value;
            const confirmPassword = document.getElementById('confirm-password').value;

            document.getElementById('passwordError').style.display = 'none';
            document.getElementById('confirmPasswordError').style.display = 'none';

            if (password.length < 8) {
                document.getElementById('passwordError').style.display = 'block';
                return;
            }

            if (password !== confirmPassword) {
                document.getElementById('confirmPasswordError').style.display = 'block';
                return;
            }

            // Submit form data to PHP
            const formData = new FormData(signupForm);
            fetch('signup_process.php', {
                method: 'POST',
                body: formData
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    signupForm.style.display = 'none';
                    if (signupConfirmation) {
                        signupConfirmation.style.display = 'block';
                    }
                    setTimeout(() => {
                        window.location.href = 'index.php';
                    }, 3000);
                } else {
                    alert(data.message || 'Signup failed. Please try again.');
                }
            })
            .catch(error => {
                console.error('Error:', error);
                alert('An error occurred. Please try again.');
            });
        });
    }
});

// 2. Login Form Handler
document.addEventListener('DOMContentLoaded', function() {
    const loginForm = document.getElementById('loginForm');
    const loginConfirmation = document.getElementById('confirmationMessage');
    
    if (loginForm) {
        loginForm.addEventListener('submit', function(event) {
            event.preventDefault();

            const password = document.getElementById('password').value;
            const passwordError = document.getElementById('passwordError');

            if (passwordError) passwordError.style.display = 'none';

            if (password.length < 8) {
                if (passwordError) passwordError.style.display = 'block';
                return;
            }

            // Submit form data to PHP
            const formData = new FormData(loginForm);
            fetch('login_process.php', {
                method: 'POST',
                body: formData
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    loginForm.style.display = 'none';
                    if (loginConfirmation) {
                        loginConfirmation.style.display = 'block';
                    }
                    setTimeout(() => {
                        window.location.href = 'index.php';
                    }, 2000);
                } else {
                    alert(data.message || 'Login failed. Please try again.');
                }
            })
            .catch(error => {
                console.error('Error:', error);
                alert('An error occurred. Please try again.');
            });
        });
    }
});

// 3. Contact Form Handler
document.addEventListener('DOMContentLoaded', function() {
    const contactForm = document.getElementById('contactForm');
    if (contactForm) {
        contactForm.addEventListener('submit', function(e) {
            e.preventDefault();
            
            // Submit form data to PHP
            const formData = new FormData(contactForm);
            fetch('contact_process.php', {
                method: 'POST',
                body: formData
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    alert('Thank you for your inquiry! We will get back to you soon.');
                    contactForm.reset();
                } else {
                    alert(data.message || 'Submission failed. Please try again.');
                }
            })
            .catch(error => {
                console.error('Error:', error);
                alert('An error occurred. Please try again.');
            });
        });
    }
});

// ======================
// CART FUNCTIONALITY
// ======================
let cart = JSON.parse(localStorage.getItem('cart')) || [];
const cartSidePanel = document.getElementById('cartSidePanel');
const cartIcon = document.getElementById('cartIcon');
const closeCartBtn = document.getElementById('closeCartBtn');
const cartItemsContainer = document.getElementById('cartItems');
const totalCostElement = document.getElementById('totalCost');
const cartCountElement = document.querySelector('.cart-count');
const checkoutBtn = document.querySelector('.checkout-btn');

function updateCartCount() {
    const totalItems = cart.reduce((sum, item) => sum + item.quantity, 0);
    cartCountElement.textContent = totalItems;
}

function calculateTotalCost() {
    const total = cart.reduce((sum, item) => sum + item.price * item.quantity, 0);
    totalCostElement.textContent = `$${total.toFixed(2)}`;
    return total;
}

function renderCartItems() {
    cartItemsContainer.innerHTML = '';
    cart.forEach((item, index) => {
        const cartItem = document.createElement('div');
        cartItem.classList.add('cart-item');
        cartItem.innerHTML = `
            <img src="${item.image}" alt="${item.name}">
            <div class="cart-item-details">
                <h4>${item.name}</h4>
                <p>$${item.price.toFixed(2)} x ${item.quantity}</p>
            </div>
            <div class="cart-item-actions">
                <button onclick="updateQuantity(${index}, ${item.quantity - 1})">-</button>
                <span>${item.quantity}</span>
                <button onclick="updateQuantity(${index}, ${item.quantity + 1})">+</button>
                <button onclick="removeFromCart(${index})"><i class="fas fa-trash"></i></button>
            </div>
        `;
        cartItemsContainer.appendChild(cartItem);
    });
    calculateTotalCost();
    updateCartCount();
    localStorage.setItem('cart', JSON.stringify(cart));
}

function addToCart(product) {
    const existingItem = cart.find(item => item.name === product.name);
    if (existingItem) {
        existingItem.quantity += 1;
    } else {
        cart.push({ ...product, quantity: 1 });
    }
    renderCartItems();
}

function updateQuantity(index, newQuantity) {
    if (newQuantity <= 0) {
        cart.splice(index, 1);
    } else {
        cart[index].quantity = newQuantity;
    }
    renderCartItems();
}

function removeFromCart(index) {
    cart.splice(index, 1);
    renderCartItems();
}

if (cartIcon && cartSidePanel) {
    cartIcon.addEventListener('click', (e) => {
        e.preventDefault();
        cartSidePanel.classList.add('open');
    });
}

if (closeCartBtn && cartSidePanel) {
    closeCartBtn.addEventListener('click', () => {
        cartSidePanel.classList.remove('open');
    });
}

// Initialize cart on page load
document.addEventListener('DOMContentLoaded', () => {
    renderCartItems();
});

// ======================
// CHECKOUT FUNCTIONALITY
// ======================

// Create checkout modal elements
function createCheckoutModal() {
    const modal = document.createElement('div');
    modal.id = 'checkoutModal';
    modal.className = 'checkout-modal';
    
    modal.innerHTML = `
        <div class="checkout-modal-content">
            <span class="close-checkout-modal">&times;</span>
            <h2>Complete Your Order</h2>
            
            <div class="checkout-summary">
                <h3>Order Summary</h3>
                <div id="checkoutItems"></div>
                <p class="checkout-total">Total: <span id="checkoutTotal">$0.00</span></p>
            </div>
            
            <form id="checkoutForm">
                <div class="input-group">
                    <label for="checkoutName">Full Name</label>
                    <input type="text" id="checkoutName" required>
                </div>
                
                <div class="input-group">
                    <label for="checkoutEmail">Email</label>
                    <input type="email" id="checkoutEmail" required>
                </div>
                
                <div class="input-group">
                    <label for="checkoutAddress">Shipping Address</label>
                    <textarea id="checkoutAddress" rows="3" required></textarea>
                </div>
                
                <div class="input-group">
                    <label for="checkoutPayment">Payment Method</label>
                    <select id="checkoutPayment" required>
                        <option value="">Select payment method</option>
                        <option value="credit">Credit Card</option>
                        <option value="paypal">PayPal</option>
                        <option value="cash">Cash on Delivery</option>
                    </select>
                </div>
                
                <button type="submit" class="submit-order-btn">Place Order</button>
            </form>
        </div>
    `;
    
    document.body.appendChild(modal);
    
    // Close modal when clicking X
    document.querySelector('.close-checkout-modal').addEventListener('click', closeCheckoutModal);
    
    // Close modal when clicking outside
    modal.addEventListener('click', function(e) {
        if (e.target === modal) {
            closeCheckoutModal();
        }
    });
    
    // Handle form submission
    document.getElementById('checkoutForm').addEventListener('submit', function(e) {
        e.preventDefault();
        processOrder();
    });
}

// Show checkout modal with cart items
function showCheckoutModal() {
    const modal = document.getElementById('checkoutModal') || createCheckoutModal();
    const checkoutItems = document.getElementById('checkoutItems');
    const checkoutTotal = document.getElementById('checkoutTotal');
    
    // Populate items
    checkoutItems.innerHTML = '';
    cart.forEach(item => {
        const itemElement = document.createElement('div');
        itemElement.className = 'checkout-item';
        itemElement.innerHTML = `
            <img src="${item.image}" alt="${item.name}">
            <div>
                <h4>${item.name}</h4>
                <p>${item.quantity} × $${item.price.toFixed(2)}</p>
            </div>
        `;
        checkoutItems.appendChild(itemElement);
    });
    
    // Update total
    const total = calculateTotalCost();
    checkoutTotal.textContent = `$${total.toFixed(2)}`;
    
    // Show modal
    modal.style.display = 'block';
    document.body.style.overflow = 'hidden';
}

// Close checkout modal
function closeCheckoutModal() {
    const modal = document.getElementById('checkoutModal');
    if (modal) {
        modal.style.display = 'none';
        document.body.style.overflow = 'auto';
    }
}

// Process order submission
function processOrder() {
    const name = document.getElementById('checkoutName').value;
    const email = document.getElementById('checkoutEmail').value;
    const address = document.getElementById('checkoutAddress').value;
    const payment = document.getElementById('checkoutPayment').value;
    
    // Simple validation
    if (!name || !email || !address || !payment) {
        alert('Please fill in all fields');
        return;
    }
    
    // Create order object
    const order = {
        customer: { name, email, address },
        paymentMethod: payment,
        items: [...cart],
        total: calculateTotalCost()
    };
    
    // Send to server
    fetch('process_order.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
        },
        body: JSON.stringify(order)
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            // Show confirmation
            alert(`Thank you, ${name}! Your order #${data.order_id} has been placed.`);
            
            // Clear cart and close modals
            cart = [];
            localStorage.setItem('cart', JSON.stringify(cart));
            renderCartItems();
            closeCheckoutModal();
            cartSidePanel.classList.remove('open');
        } else {
            throw new Error(data.message);
        }
    })
    .catch(error => {
        console.error('Error:', error);
        alert('There was an error processing your order: ' + error.message);
    });
}

// Add event listener to checkout button
if (checkoutBtn) {
    checkoutBtn.addEventListener('click', function(e) {
        e.preventDefault();
        if (cart.length === 0) {
            alert('Your cart is empty!');
            return;
        }
        showCheckoutModal();
    });
}

// ======================
// SEARCH FUNCTIONALITY
// ======================
const searchIcon = document.getElementById('searchIcon');
const searchBar = document.getElementById('searchBar');
const searchInput = document.getElementById('searchInput');
const searchResults = document.getElementById('searchResults');

const products = [
    { name: 'Chocolate Cake', price: 500, image: 'images/chocolate-cake.jpg', link: 'products.php?category=cakes' },
    { name: 'Croissant', price: 55, image: 'images/croissant.jpg', link: 'products.php?category=pastries' },
    { name: 'Red Velvet Cake', price: 600, image: 'images/red-velvet.jpg', link: 'products.php?category=cakes' },
    { name: 'Danish Pastry', price: 90, image: 'images/danish-pastry.jpg', link: 'products.php?category=pastries' },
    { name: 'Cookie Box', price: 240, image: 'images/cookie-box.jpg', link: 'products.php?category=cookies' },
    { name: 'Sourdough Bread', price: 250, image: 'images/sourdough.jpg', link: 'products.php?category=breads' }
];

searchIcon.addEventListener('click', () => {
    searchBar.classList.toggle('active');
    searchResults.classList.remove('active');
    searchInput.value = '';
});

searchInput.addEventListener('input', () => {
    const query = searchInput.value.toLowerCase();
    searchResults.innerHTML = '';

    if (query.length > 0) {
        const filteredProducts = products.filter(product =>
            product.name.toLowerCase().includes(query)
        );

        if (filteredProducts.length > 0) {
            filteredProducts.forEach(product => {
                const resultItem = document.createElement('div');
                resultItem.classList.add('search-result-item');
                resultItem.innerHTML = `
                    <img src="${product.image}" alt="${product.name}">
                    <div>
                        <h4>${product.name}</h4>
                        <p>$${product.price.toFixed(2)}</p>
                    </div>
                `;
                resultItem.addEventListener('click', () => {
                    window.location.href = product.link;
                    searchResults.classList.remove('active');
                    searchInput.value = '';
                });
                searchResults.appendChild(resultItem);
            });
            searchResults.classList.add('active');
        } else {
            searchResults.innerHTML = '<p>No results found</p>';
            searchResults.classList.add('active');
        }
    } else {
        searchResults.classList.remove('active');
    }
});

// ======================
// DARK MODE TOGGLE
// ======================
const darkModeToggle = document.getElementById('darkModeToggle');
const body = document.body;

if (localStorage.getItem('darkMode') === 'enabled') {
    body.classList.add('dark-mode');
    darkModeToggle.classList.remove('fa-moon');
    darkModeToggle.classList.add('fa-sun');
}

darkModeToggle.addEventListener('click', () => {
    body.classList.toggle('dark-mode');
    if (body.classList.contains('dark-mode')) {
        darkModeToggle.classList.remove('fa-moon');
        darkModeToggle.classList.add('fa-sun');
        localStorage.setItem('darkMode', 'enabled');
    } else {
        darkModeToggle.classList.remove('fa-sun');
        darkModeToggle.classList.add('fa-moon');
        localStorage.setItem('darkMode', 'disabled');
    }
});