// Product data completa
const products = [
    // Productos de Limpieza
    {
        id: 1,
        name: "Líquido Limpiador Verde",
        category: "limpieza",
        price: 25000,
        image: "imagenes/Líquido Verde .png",
        description: "Líquido especializado para limpieza de lentes con fórmula anti-empañante"
    },
    {
        id: 2,
        name: "Spray Limpiador Premium",
        category: "limpieza",
        price: 32000,
        image: "https://images.unsplash.com/photo-1556306535-0f09a537f0a3?w=400&h=300&fit=crop",
        description: "Spray de limpieza profesional para todo tipo de lentes"
    },
    {
        id: 3,
        name: "Toallitas Húmedas (50 ud)",
        category: "limpieza",
        price: 18000,
        image: "https://images.unsplash.com/photo-1511499767150-a48a237f0083?w=400&h=300&fit=crop",
        description: "Toallitas desechables para limpieza rápida y efectiva"
    },
    
    // Estuches y Fundas
    {
        id: 4,
        name: "Estuche Rojo Premium",
        category: "estuches",
        price: 35000,
        image: "https://images.unsplash.com/photo-1574258495973-f010dfbb5371?w=400&h=300&fit=crop",
        description: "Estuche rígido de alta calidad con cierre magnético"
    },
    {
        id: 5,
        name: "Estuche Negro Elegante",
        category: "estuches",
        price: 40000,
        image: "https://images.unsplash.com/photo-1556306535-0f09a537f0a3?w=400&h=300&fit=crop",
        description: "Estuche elegante con forro suave y diseño ejecutivo"
    },
    {
        id: 6,
        name: "Estuche Café Vintage",
        category: "estuches",
        price: 42000,
        image: "https://images.unsplash.com/photo-1511499767150-a48a237f0083?w=400&h=300&fit=crop",
        description: "Estuche con diseño vintage y materiales premium"
    },
    {
        id: 7,
        name: "Funda Flexible Azul",
        category: "estuches",
        price: 22000,
        image: "https://images.unsplash.com/photo-1574258495973-f010dfbb5371?w=400&h=300&fit=crop",
        description: "Funda flexible resistente al agua con cierre de cremallera"
    },
    
    // Cordones y Cadenas
    {
        id: 8,
        name: "Cordón Azul Premium",
        category: "cordones",
        price: 15000,
        image: "https://images.unsplash.com/photo-1556306535-0f09a537f0a3?w=400&h=300&fit=crop",
        description: "Cordón resistente y elegante para uso diario"
    },
    {
        id: 9,
        name: "Cordón Rojo Deportivo",
        category: "cordones",
        price: 18000,
        image: "https://images.unsplash.com/photo-1511499767150-a48a237f0083?w=400&h=300&fit=crop",
        description: "Ideal para actividades deportivas con material antideslizante"
    },
    {
        id: 10,
        name: "Cadena Metálica Dorada",
        category: "cordones",
        price: 45000,
        image: "https://images.unsplash.com/photo-1574258495973-f010dfbb5371?w=400&h=300&fit=crop",
        description: "Cadena elegante de aleación dorada para ocasiones especiales"
    },
    {
        id: 11,
        name: "Cordón Silicona Negro",
        category: "cordones",
        price: 20000,
        image: "https://images.unsplash.com/photo-1556306535-0f09a537f0a3?w=400&h=300&fit=crop",
        description: "Cordón de silicona suave, ideal para niños"
    },
    
    // Monturas
    {
        id: 12,
        name: "Montura Sol Clásica",
        category: "monturas",
        price: 85000,
        image: "https://images.unsplash.com/photo-1511499767150-a48a237f0083?w=400&h=300&fit=crop",
        description: "Montura de sol con diseño clásico y protección UV400"
    },
    {
        id: 13,
        name: "Montura Lectura Moderna",
        category: "monturas",
        price: 65000,
        image: "https://images.unsplash.com/photo-1574258495973-f010dfbb5371?w=400&h=300&fit=crop",
        description: "Montura ligera para lectura con diseño moderno"
    },
    {
        id: 14,
        name: "Montura Deportiva Titanio",
        category: "monturas",
        price: 120000,
        image: "https://images.unsplash.com/photo-1556306535-0f09a537f0a3?w=400&h=300&fit=crop",
        description: "Montura deportiva ultra-liviana en aleación de titanio"
    },
    {
        id: 15,
        name: "Montura Vintage Carey",
        category: "monturas",
        price: 95000,
        image: "https://images.unsplash.com/photo-1511499767150-a48a237f0083?w=400&h=300&fit=crop",
        description: "Montura vintage con patrón carey y bisagras reforzadas"
    },
    
    // Accesorios
    {
        id: 16,
        name: "Paño Microfibra Premium",
        category: "accesorios",
        price: 12000,
        image: "https://images.unsplash.com/photo-1574258495973-f010dfbb5371?w=400&h=300&fit=crop",
        description: "Paño de microfibra ultra-suave para limpieza delicada"
    },
    {
        id: 17,
        name: "Soporte Nasal Silicona",
        category: "accesorios",
        price: 8000,
        image: "https://images.unsplash.com/photo-1556306535-0f09a537f0a3?w=400&h=300&fit=crop",
        description: "Almohadillas nasales de silicona hipoalergénica"
    },
    {
        id: 18,
        name: "Tornillos Repuesto Set",
        category: "accesorios",
        price: 15000,
        image: "https://images.unsplash.com/photo-1511499767150-a48a237f0083?w=400&h=300&fit=crop",
        description: "Set completo de tornillos de repuesto en diferentes tamaños"
    },
    
    // Kit de Reparación
    {
        id: 19,
        name: "Kit Reparación Completo",
        category: "reparacion",
        price: 55000,
        image: "https://images.unsplash.com/photo-1574258495973-f010dfbb5371?w=400&h=300&fit=crop",
        description: "Kit completo con herramientas y repuestos para reparaciones básicas"
    },
    {
        id: 20,
        name: "Kit Reparación Profesional",
        category: "reparacion",
        price: 85000,
        image: "https://images.unsplash.com/photo-1556306535-0f09a537f0a3?w=400&h=300&fit=crop",
        description: "Kit profesional con herramientas de precisión y manual técnico"
    }
];

// Shopping cart
let cart = [];
let currentFilter = 'all';

// DOM Elements
const productsGrid = document.getElementById('productsGrid');
const cartModal = document.getElementById('cartModal');
const cartCount = document.getElementById('cartCount');
const cartItems = document.getElementById('cartItems');
const totalAmount = document.getElementById('totalAmount');

// Initialize the application
document.addEventListener('DOMContentLoaded', function() {
    renderProducts();
    initializeSlider();
    initializeBackgroundSlider();
    updateCartUI();
});

// Product rendering
function renderProducts(productsToRender = products) {
    productsGrid.innerHTML = '';
    
    productsToRender.forEach(product => {
        const productCard = createProductCard(product);
        productsGrid.appendChild(productCard);
    });
}

function createProductCard(product) {
    const card = document.createElement('div');
    card.className = 'product-card';
    card.innerHTML = `
        <img src="${product.image}" alt="${product.name}" class="product-image">
        <div class="product-info">
            <h3 class="product-title">${product.name}</h3>
            <p class="product-description">${product.description}</p>
            <div class="product-price">$${product.price.toLocaleString()}</div>
            <div class="product-actions">
                <button class="add-to-cart-btn" onclick="addToCart(${product.id})">
                    <i class="fas fa-cart-plus"></i>
                    Agregar al Carrito
                </button>
                <button class="wishlist-btn" onclick="toggleWishlist(${product.id})">
                    <i class="far fa-heart"></i>
                </button>
            </div>
        </div>
    `;
    return card;
}

// Cart functionality
function addToCart(productId) {
    const product = products.find(p => p.id === productId);
    if (!product) return;
    
    const existingItem = cart.find(item => item.id === productId);
    
    if (existingItem) {
        existingItem.quantity += 1;
    } else {
        cart.push({
            ...product,
            quantity: 1
        });
    }
    
    updateCartUI();
    showAddToCartAnimation();
}

function removeFromCart(productId) {
    cart = cart.filter(item => item.id !== productId);
    updateCartUI();
    renderCartItems();
}

function updateCartQuantity(productId, change) {
    const item = cart.find(item => item.id === productId);
    if (!item) return;
    
    item.quantity += change;
    
    if (item.quantity <= 0) {
        removeFromCart(productId);
    } else {
        updateCartUI();
        renderCartItems();
    }
}

function updateCartUI() {
    const totalItems = cart.reduce((sum, item) => sum + item.quantity, 0);
    cartCount.textContent = totalItems;
    
    const total = cart.reduce((sum, item) => sum + (item.price * item.quantity), 0);
    totalAmount.textContent = `$${total.toLocaleString()}`;
}

function renderCartItems() {
    cartItems.innerHTML = '';
    
    if (cart.length === 0) {
        cartItems.innerHTML = `
            <div style="text-align: center; padding: 2rem; color: #666;">
                <i class="fas fa-shopping-cart" style="font-size: 3rem; margin-bottom: 1rem; opacity: 0.3;"></i>
                <p>Tu carrito está vacío</p>
            </div>
        `;
        return;
    }
    
    cart.forEach(item => {
        const cartItem = document.createElement('div');
        cartItem.className = 'cart-item';
        cartItem.innerHTML = `
            <img src="${item.image}" alt="${item.name}" class="cart-item-image">
            <div class="cart-item-info">
                <div class="cart-item-title">${item.name}</div>
                <div class="cart-item-price">$${item.price.toLocaleString()}</div>
            </div>
            <div class="quantity-controls">
                <button class="quantity-btn" onclick="updateCartQuantity(${item.id}, -1)">
                    <i class="fas fa-minus"></i>
                </button>
                <span style="margin: 0 1rem; font-weight: 600;">${item.quantity}</span>
                <button class="quantity-btn" onclick="updateCartQuantity(${item.id}, 1)">
                    <i class="fas fa-plus"></i>
                </button>
            </div>
            <button class="quantity-btn" onclick="removeFromCart(${item.id})" style="color: #ff4757;">
                <i class="fas fa-trash"></i>
            </button>
        `;
        cartItems.appendChild(cartItem);
    });
}

function toggleCart() {
    cartModal.style.display = cartModal.style.display === 'flex' ? 'none' : 'flex';
    if (cartModal.style.display === 'flex') {
        renderCartItems();
    }
}

function checkout() {
    if (cart.length === 0) {
        alert('Tu carrito está vacío');
        return;
    }
    
    const total = cart.reduce((sum, item) => sum + (item.price * item.quantity), 0);
    const itemsList = cart.map(item => `${item.name} x${item.quantity}`).join(', ');
    
    // Simulate WhatsApp message
    const message = `¡Hola! Quiero realizar un pedido:\n\n${itemsList}\n\nTotal: $${total.toLocaleString()}\n\n¡Gracias!`;
    const whatsappUrl = `https://wa.me/573025269668?text=${encodeURIComponent(message)}`;
    
    window.open(whatsappUrl, '_blank');
}

// Category filtering
function filterProducts(category) {
    currentFilter = category;
    
    if (category === 'all') {
        renderProducts(products);
    } else {
        const filteredProducts = products.filter(product => product.category === category);
        renderProducts(filteredProducts);
    }
    
    // Smooth scroll to products section
    document.getElementById('productos').scrollIntoView({ behavior: 'smooth' });
}

// Wishlist functionality
let wishlist = [];

function toggleWishlist(productId) {
    const btn = event.target.closest('.wishlist-btn');
    const icon = btn.querySelector('i');
    
    if (wishlist.includes(productId)) {
        wishlist = wishlist.filter(id => id !== productId);
        icon.className = 'far fa-heart';
        btn.style.background = '#f1f2f6';
        btn.style.color = '#666';
    } else {
        wishlist.push(productId);
        icon.className = 'fas fa-heart';
        btn.style.background = '#ff6b6b';
        btn.style.color = 'white';
    }
}

// Animation effects
function showAddToCartAnimation() {
    const cartIcon = document.querySelector('.cart-icon');
    cartIcon.style.transform = 'scale(1.2)';
    cartIcon.style.color = '#ff6b6b';
    
    setTimeout(() => {
        cartIcon.style.transform = 'scale(1)';
        cartIcon.style.color = '#7CB686';
    }, 300);
}

// Image slider functionality
let currentSlide = 0;
const slides = document.querySelectorAll('.slider-image');

function initializeSlider() {
    if (slides.length === 0) return;
    
    updateSlider();
    setInterval(nextSlide, 4000); // Change slide every 4 seconds
}

function updateSlider() {
    slides.forEach((slide, index) => {
        slide.classList.remove('active', 'next', 'previous', 'inactive');
        
        if (index === currentSlide) {
            slide.classList.add('active');
        } else if (index === (currentSlide + 1) % slides.length) {
            slide.classList.add('next');
        } else if (index === (currentSlide - 1 + slides.length) % slides.length) {
            slide.classList.add('previous');
        } else {
            slide.classList.add('inactive');
        }
    });
}

function nextSlide() {
    currentSlide = (currentSlide + 1) % slides.length;
    updateSlider();
}

// Background slider functionality
let currentBackground = 0;
const backgrounds = document.querySelectorAll('.background');

function initializeBackgroundSlider() {
    if (backgrounds.length === 0) return;
    
    backgrounds[0].style.opacity = '1';
    setInterval(changeBackground, 5000); // Change background every 5 seconds
}

function changeBackground() {
    backgrounds[currentBackground].style.opacity = '0';
    currentBackground = (currentBackground + 1) % backgrounds.length;
    backgrounds[currentBackground].style.opacity = '1';
}

// Smooth scrolling for navigation links
document.querySelectorAll('.nav-link').forEach(link => {
    link.addEventListener('click', function(e) {
        if (this.getAttribute('href').startsWith('#')) {
            e.preventDefault();
            const target = document.querySelector(this.getAttribute('href'));
            if (target) {
                target.scrollIntoView({ behavior: 'smooth' });
            }
        }
    });
});

// Close cart when clicking outside
cartModal.addEventListener('click', function(e) {
    if (e.target === cartModal) {
        toggleCart();
    }
});

// Featured product functionality for hero section
function addToCart(productId) {
    if (productId === 'featured-product') {
        // Add the first product as featured
        addToCart(1);
        return;
    }
    
    const product = products.find(p => p.id === productId);
    if (!product) return;
    
    const existingItem = cart.find(item => item.id === productId);
    
    if (existingItem) {
        existingItem.quantity += 1;
    } else {
        cart.push({
            ...product,
            quantity: 1
        });
    }
    
    updateCartUI();
    showAddToCartAnimation();
}

// Search functionality (bonus feature)
function searchProducts(searchTerm) {
    const filteredProducts = products.filter(product => 
        product.name.toLowerCase().includes(searchTerm.toLowerCase()) ||
        product.description.toLowerCase().includes(searchTerm.toLowerCase())
    );
    renderProducts(filteredProducts);
}

// Responsive menu toggle (for mobile)
function toggleMobileMenu() {
    const navMenu = document.querySelector('.nav-menu');
    navMenu.classList.toggle('mobile-active');
}

// Category count update
function updateCategoryCount() {
    const categoryCards = document.querySelectorAll('.category-card');
    
    categoryCards.forEach(card => {
        const categoryName = card.onclick.toString().match(/'([^']+)'/)[1];
        const count = products.filter(p => p.category === categoryName).length;
        const countElement = card.querySelector('.category-count');
        if (countElement) {
            countElement.textContent = `${count} productos`;
        }
    });
}

// Initialize category counts when DOM is loaded
document.addEventListener('DOMContentLoaded', function() {
    setTimeout(updateCategoryCount, 100);
});

// Performance optimization: Lazy loading for images
function lazyLoadImages() {
    const images = document.querySelectorAll('img[data-src]');
    
    const imageObserver = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                const img = entry.target;
                img.src = img.dataset.src;
                img.removeAttribute('data-src');
                imageObserver.unobserve(img);
            }
        });
    });
    
    images.forEach(img => imageObserver.observe(img));
}


// Call lazy loading
document.addEventListener('DOMContentLoaded', lazyLoadImages);