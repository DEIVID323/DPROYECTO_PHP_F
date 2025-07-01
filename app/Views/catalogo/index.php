<?php  echo $this->extend('plantilla/layout_catalogo'); ?>
<?php echo $this->section('contenido'); ?>
<header>
        <div>
            <img src="<?php echo base_url('imagenes/LOGO.png'); ?>" alt="image"
            class="logo">
        </div>
        <div class="header-content">
            <div class="search-container">
                <input type="text" id="searchInput" class="search-input" placeholder="Buscar..." />
                <button id="searchButton" class="search-button">
                    <i class="fa-solid fa-magnifying-glass"></i>
                </button>
            </div>
<?php if (session()->get('logged_in')): ?>
    <span>Bienvenido, <?= session()->get('Nombre'); ?></span>
    <a href="<?= base_url('/cerrarSesion') ?>">
        <button class="cta-button">Cerrar sesión</button>
    </a>
<?php else: ?>
    <a href="<?= base_url('login'); ?>">
        <button class="cta-button">Iniciar Sesión</button>
    </a>
<?php endif; ?>
        </a>
        </div>
        <div class="menu-toggle">
        <i class="fas fa-bars"></i>
        </div>
    </header>
    <nav>
        <ul class="nav-menu">
            <li><a href="<?php echo base_url('/'); ?>"> <i class="nav-link"></i>Inicio</a></li>
            <li><a href="#categorias" class="nav-link">Categorías</a></li>
            <li><a href="#productos" class="nav-link">Productos</a></li>
            <li><a href="#contacto" class="nav-link">Contacto</a></li>
        </ul>
               <div class="cart-icon" onclick="toggleCart()">
                <i class="fa-solid fa-cart-shopping"></i>
                <span class="cart-count" id="cartCount">0</span>
            </div>
        </div>

    </nav>
  
    <!-- Hero Section -->
    <section id="inicio" class="hero-section">
        <div id="backgrounds">
            <div class="background" style="background: radial-gradient(50% 50% at 50% 50%, #C7F6D0 0%, #7CB686 92.19%);"></div>
            <div class="background" style="background: radial-gradient(50% 50% at 50% 50%, #D1E4F6 0%, #5F9CCF 100%);"></div>
            <div class="background" style="background: radial-gradient(50% 50% at 50% 50%, #f5b9b5 0%, #ec8680 100%);"></div>
            <div class="background" style="background: radial-gradient(50% 50% at 50% 50%, #ff3e3e 0%, #ef1e1e 100%);"></div>
            <div class="background" style="background: radial-gradient(50% 50% at 50% 50%, #6B6B6B 0%, #292929 100%);"></div>
            <div class="background" style="background: radial-gradient(50% 50% at 50% 50%, #f35959c3 0%, #fa5d5dc2 100%);"></div>
            <div class="background" style="background: radial-gradient(50% 50% at 50% 50%, #6f3c1c 0%, #713a19 100%);"></div>
        </div>
        
        <div class="hero-container">
            <div class="hero-content">
                <h1 class="hero-title">Accesorios Para Gafas</h1>
                <p class="hero-subtitle">La mejor calidad en productos ópticos. Distribuidora especializada en accesorios y cuidado para tus gafas.</p>
                <div class="hero-price">$30.000</div>
                <div class="hero-buttons">
                    <button class="btn-primary" onclick="addToCart('featured-product')">
                        <i class="fas fa-cart-plus"></i>
                        Agregar al Carrito
                    </button>
                    <a href="#productos" class="btn-secondary">
                        <i class="fas fa-eye"></i>
                        Ver Productos
                    </a>
                </div>
                <div class="social-icons">
                    <a href="https://www.instagram.com/jdrfilmmaker?igsh=NjVqdWEzdnR1bTAx" class="social-icon">
                        <i class="fab fa-instagram"></i>
                    </a>
                    <a href="https://www.facebook.com/share/1Vep3svjjQ/" class="social-icon">
                        <i class="fab fa-facebook"></i>
                    </a>
                    <a href="https://x.com/jdrfilmms" class="social-icon">
                        <i class="fab fa-twitter"></i>
                    </a>
                </div>
            </div>
            
            <div class="slider-images">
                <img class="slider-image" src="https://images.unsplash.com/photo-1574258495973-f010dfbb5371?w=400&h=500&fit=crop" alt="Líquido limpiador verde">
                <img class="slider-image" src="https://images.unsplash.com/photo-1556306535-0f09a537f0a3?w=400&h=500&fit=crop" alt="Cordón azul">
                <img class="slider-image" src="https://images.unsplash.com/photo-1511499767150-a48a237f0083?w=400&h=500&fit=crop" alt="Montura de sol">
                <img class="slider-image" src="https://images.unsplash.com/photo-1574258495973-f010dfbb5371?w=400&h=500&fit=crop" alt="Estuche rojo">
                <img class="slider-image" src="https://images.unsplash.com/photo-1556306535-0f09a537f0a3?w=400&h=500&fit=crop" alt="Estuche negro">
                <img class="slider-image" src="https://images.unsplash.com/photo-1511499767150-a48a237f0083?w=400&h=500&fit=crop" alt="Cordón rojo">
                <img class="slider-image" src="https://images.unsplash.com/photo-1574258495973-f010dfbb5371?w=400&h=500&fit=crop" alt="Estuche café">
            </div>
        </div>
    </section>

    <!-- Categories Section -->
    <section id="categorias" class="categories-section">
        <div class="container">
            <h2 class="section-title">Nuestras Categorías</h2>
            <div class="categories-grid">
                <div class="category-card" onclick="filterProducts('limpieza')">
                    <div class="category-icon">
                        <i class="fas fa-spray-can"></i>
                    </div>
                    <h3 class="category-title">Productos de Limpieza</h3>
                    <p class="category-count">12 productos</p>
                </div>
                <div class="category-card" onclick="filterProducts('estuches')">
                    <div class="category-icon">
                        <i class="fas fa-box"></i>
                    </div>
                    <h3 class="category-title">Estuches y Fundas</h3>
                    <p class="category-count">8 productos</p>
                </div>
                <div class="category-card" onclick="filterProducts('cordones')">
                    <div class="category-icon">
                        <i class="fas fa-link"></i>
                    </div>
                    <h3 class="category-title">Cordones y Cadenas</h3>
                    <p class="category-count">15 productos</p>
                </div>
                <div class="category-card" onclick="filterProducts('monturas')">
                    <div class="category-icon">
                        <i class="fas fa-glasses"></i>
                    </div>
                    <h3 class="category-title">Monturas</h3>
                    <p class="category-count">25 productos</p>
                </div>
                <div class="category-card" onclick="filterProducts('accesorios')">
                    <div class="category-icon">
                        <i class="fas fa-tools"></i>
                    </div>
                    <h3 class="category-title">Accesorios</h3>
                    <p class="category-count">18 productos</p>
                </div>
                <div class="category-card" onclick="filterProducts('reparacion')">
                    <div class="category-icon">
                        <i class="fas fa-wrench"></i>
                    </div>
                    <h3 class="category-title">Kit de Reparación</h3>
                    <p class="category-count">6 productos</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Products Section -->
    <section id="productos" class="products-section">
        <div class="container">
            <h2 class="section-title">Nuestros Productos</h2>
            <div class="products-grid" id="productsGrid">
                <!-- Products will be inserted here by JavaScript -->
            </div>
        </div>
    </section>

    <!-- Cart Modal -->
    <div id="cartModal" class="cart-modal">
        <div class="cart-content">
            <div class="cart-header">
                <h3 class="cart-title">Carrito de Compras</h3>
                <button class="close-cart" onclick="toggleCart()">
                    <i class="fas fa-times"></i>
                </button>
            </div>
            <div id="cartItems">
                <!-- Cart items will be inserted here -->
            </div>
            <div class="cart-total">
                <div class="total-amount" id="totalAmount">$0</div>
                <button class="checkout-btn" onclick="checkout()">
                    <i class="fas fa-credit-card"></i>
                    Proceder al Pago
                </button>
            </div>
        </div>
    </div>  
    </body>
<?php echo $this->endSection(); ?>
