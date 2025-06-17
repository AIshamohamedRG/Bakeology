document.addEventListener('DOMContentLoaded', function() {
    const canvas = document.getElementById('cakeCanvas');
    const ctx = canvas.getContext('2d');
    const priceDisplay = document.getElementById('cakePrice');
    
    // حالة الكيك
    let cake = {
        base: { type: 'vanilla', color: '#f5f5dc', price: 10 },
        frosting: { type: 'cream-cheese', color: '#fffaf0', price: 7 },
        toppings: [],
        decorations: [],
        size: 'medium'
    };

    // أحجام الكيك
    const sizes = {
        small: { width: 120, height: 80, price: 10 },
        medium: { width: 160, height: 100, price: 15 },
        large: { width: 200, height: 120, price: 20 }
    };

    // المكونات المتاحة
    const ingredients = {
        bases: [
            { type: 'base', value: 'vanilla', color: '#f5f5dc', price: 10, display: 'Vanilla (+$10)' },
            { type: 'base', value: 'chocolate', color: '#5c3a21', price: 12, display: 'Chocolate (+$12)' },
            { type: 'base', value: 'red-velvet', color: '#8b0000', price: 15, display: 'Red Velvet (+$15)' }
        ],
        frostings: [
            { type: 'frosting', value: 'buttercream', color: '#fff8e1', price: 5, display: 'Buttercream (+$5)' },
            { type: 'frosting', value: 'cream-cheese', color: '#fffaf0', price: 7, display: 'Cream Cheese (+$7)' },
            { type: 'frosting', value: 'ganache', color: '#3e2723', price: 8, display: 'Ganache (+$8)' }
        ],
        toppings: [
            { type: 'topping', value: 'sprinkles', color: '#ff6f61', price: 3, display: 'Sprinkles (+$3)' },
            { type: 'topping', value: 'fruit', color: '#8bc34a', price: 4, display: 'Fruit (+$4)' },
            { type: 'topping', value: 'nuts', color: '#795548', price: 4, display: 'Nuts (+$4)' }
        ],
        decorations: [
            { type: 'decoration', value: 'flowers', color: '#e91e63', price: 8, display: 'Flowers (+$8)' },
            { type: 'decoration', value: 'message', color: '#ffffff', price: 5, display: 'Message (+$5)' },
            { type: 'decoration', value: 'figurine', color: '#3f51b5', price: 10, display: 'Figurine (+$10)' }
        ]
    };

    // تهيئة الصفحة
    initGame();

    function initGame() {
        renderIngredientOptions();
        setupEventListeners();
        drawCake();
        updatePrice();
    }

    function renderIngredientOptions() {
        // عرض كل المكونات في واجهة المستخدم
        renderCategory('bases', 'Cake Base', 'layer-group');
        renderCategory('frostings', 'Frosting', 'ice-cream');
        renderCategory('toppings', 'Toppings', 'shower');
        renderCategory('decorations', 'Decorations', 'star');
    }

    function renderCategory(category, title, icon) {
        const container = document.createElement('div');
        container.className = 'ingredient-panel';
        container.innerHTML = `
            <h3><i class="fas fa-${icon}"></i> ${title}</h3>
            <div class="ingredient-options" id="${category}-options"></div>
        `;
        
        document.querySelector('.ingredient-selector').appendChild(container);
        
        const optionsContainer = document.getElementById(`${category}-options`);
        ingredients[category].forEach((ing, idx) => {
            const btn = document.createElement('button');
            btn.className = `ingredient-btn ${idx === 0 ? 'active' : ''}`;
            btn.dataset.type = ing.type;
            btn.dataset.value = ing.value;
            btn.dataset.color = ing.color;
            btn.dataset.price = ing.price;
            btn.textContent = ing.display;
            optionsContainer.appendChild(btn);
        });
    }

    function drawCake() {
        ctx.clearRect(0, 0, canvas.width, canvas.height);
        
        // رسم الطبق
        drawPlate();
        
        // رسم قاعدة الكيك
        drawBase();
        
        // رسم التغطية
        drawFrosting();
        
        // رسم الإضافات
        drawToppings();
        
        // رسم الزينة
        drawDecorations();
    }

    function drawPlate() {
        ctx.beginPath();
        ctx.ellipse(canvas.width/2, canvas.height-20, 150, 25, 0, 0, Math.PI*2);
        ctx.fillStyle = '#f0f0f0';
        ctx.fill();
        ctx.strokeStyle = '#d7ccc8';
        ctx.lineWidth = 2;
        ctx.stroke();
    }

    function drawBase() {
        const baseX = canvas.width/2 - sizes[cake.size].width/2;
        const baseY = canvas.height - 80 - sizes[cake.size].height;
        
        ctx.beginPath();
        ctx.roundRect(baseX, baseY, sizes[cake.size].width, sizes[cake.size].height, [20, 20, 0, 0]);
        ctx.fillStyle = cake.base.color;
        ctx.fill();
        ctx.strokeStyle = '#5d4037';
        ctx.lineWidth = 2;
        ctx.stroke();
    }

    function drawFrosting() {
        const baseX = canvas.width/2 - sizes[cake.size].width/2;
        const baseY = canvas.height - 80 - sizes[cake.size].height;
        
        ctx.beginPath();
        ctx.roundRect(baseX, baseY-15, sizes[cake.size].width, 25, [20, 20, 0, 0]);
        ctx.fillStyle = cake.frosting.color;
        ctx.fill();
    }

    function drawToppings() {
        const baseX = canvas.width/2 - sizes[cake.size].width/2;
        const baseY = canvas.height - 80 - sizes[cake.size].height;
        
        cake.toppings.forEach(topping => {
            ctx.beginPath();
            ctx.arc(
                baseX + 20 + Math.random() * (sizes[cake.size].width - 40),
                baseY - 10 + Math.random() * 15,
                8, 0, Math.PI*2
            );
            ctx.fillStyle = topping.color;
            ctx.fill();
        });
    }

    function drawDecorations() {
        const baseX = canvas.width/2 - sizes[cake.size].width/2;
        const baseY = canvas.height - 80 - sizes[cake.size].height;
        
        cake.decorations.forEach(decor => {
            if(decor.type === 'flowers') {
                drawFlower(baseX + 40 + Math.random() * (sizes[cake.size].width - 80), baseY - 30);
            }
            // يمكن إضافة أشكال أخرى للزينة هنا
        });
    }

    function drawFlower(x, y) {
        ctx.save();
        ctx.translate(x, y);
        
        // رسم بتلات الزهرة
        ctx.fillStyle = cake.decorations.find(d => d.type === 'flowers')?.color || '#e91e63';
        for(let i = 0; i < 5; i++) {
            ctx.beginPath();
            ctx.ellipse(0, 0, 10, 5, i * Math.PI/2.5, 0, Math.PI*2);
            ctx.fill();
        }
        
        // مركز الزهرة
        ctx.beginPath();
        ctx.arc(0, 0, 5, 0, Math.PI*2);
        ctx.fillStyle = '#ffeb3b';
        ctx.fill();
        
        ctx.restore();
    }

    function setupEventListeners() {
        // مستمعو الأحداث للمكونات
        document.addEventListener('click', function(e) {
            if(e.target.classList.contains('ingredient-btn')) {
                const type = e.target.dataset.type;
                const value = e.target.dataset.value;
                const color = e.target.dataset.color;
                const price = parseFloat(e.target.dataset.price);
                
                // تحديث الحالة النشطة
                document.querySelectorAll(`.ingredient-btn[data-type="${type}"]`).forEach(btn => {
                    btn.classList.remove('active');
                });
                e.target.classList.add('active');
                
                // تحديث الكيك
                updateCake(type, value, color, price);
            }
        });
        
        // زر إضافة إلى السلة
        document.querySelector('.add-to-cart-btn').addEventListener('click', addToCart);
    }

    function updateCake(type, value, color, price) {
        switch(type) {
            case 'base':
                cake.base = { type: value, color: color, price: price };
                break;
            case 'frosting':
                cake.frosting = { type: value, color: color, price: price };
                break;
            case 'topping':
                // إضافة أو إزالة من الإضافات
                const toppingIndex = cake.toppings.findIndex(t => t.type === value);
                if(toppingIndex === -1) {
                    cake.toppings.push({ type: value, color: color, price: price });
                } else {
                    cake.toppings.splice(toppingIndex, 1);
                }
                break;
            case 'decoration':
                // إضافة أو إزالة من الزينة
                const decorIndex = cake.decorations.findIndex(d => d.type === value);
                if(decorIndex === -1) {
                    cake.decorations.push({ type: value, color: color, price: price });
                } else {
                    cake.decorations.splice(decorIndex, 1);
                }
                break;
        }
        
        drawCake();
        updatePrice();
    }

    function updatePrice() {
        let total = cake.base.price + cake.frosting.price;
        cake.toppings.forEach(t => total += t.price);
        cake.decorations.forEach(d => total += d.price);
        priceDisplay.textContent = total;
    }

    function addToCart() {
        const cakeItem = {
            name: `Custom ${cake.base.type} Cake`,
            price: calculateTotalPrice(),
            image: 'data:image/svg+xml;base64,...', // يمكن استخدام صورة مبسطة
            options: {
                size: cake.size,
                base: cake.base.type,
                frosting: cake.frosting.type,
                toppings: cake.toppings.map(t => t.type),
                decorations: cake.decorations.map(d => d.type)
            }
        };
        
        // استدعاء دالة السلة الموجودة لديك
        if(typeof window.addToCart === 'function') {
            window.addToCart(cakeItem);
            showConfirmation();
        } else {
            console.error('addToCart function not found');
        }
    }

    function calculateTotalPrice() {
        return cake.base.price + cake.frosting.price + 
               cake.toppings.reduce((sum, t) => sum + t.price, 0) + 
               cake.decorations.reduce((sum, d) => sum + d.price, 0);
    }

    function showConfirmation() {
        alert('Your custom cake has been added to cart!');
    }
});