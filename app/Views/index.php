<?php  echo $this->extend('plantilla/layout'); ?>
<?php echo $this->section('contenido'); ?>

    <header>
        <div>
            <img src="data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iMTAwIiBoZWlnaHQ9IjUwIiB2aWV3Qm94PSIwIDAgMTAwIDUwIiBmaWxsPSJub25lIiB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciPgo8dGV4dCB4PSI1MCIgeT0iMzAiIGZvbnQtZmFtaWx5PSJBcmlhbCwgc2Fucy1zZXJpZiIgZm9udC1zaXplPSIxNiIgZm9udC13ZWlnaHQ9ImJvbGQiIGZpbGw9IiNmZjU3MjIiIHRleHQtYW5jaG9yPSJtaWRkbGUiPkRNQyBWSVNWQVJEPC90ZXh0Pgo8L3N2Zz4K" alt="DMC VISVARD Logo" class="logo">
        </div>
        <div class="header-content">
            <div class="search-container">
                <input type="text" id="searchInput" class="search-input" placeholder="Buscar productos..." />
                <button id="searchButton" class="search-button">
                    <i class="fa-solid fa-search"></i>
                </button>
            </div>
            <div class="cart-icon">
                <a href="#" onclick="toggleCart()">
                    <i class="fa-solid fa-shopping-cart"></i>
                    <span class="cart-count" id="cartCount">0</span>
                </a>
            </div>
            <div id="userSection">
                <button class="cta-button" onclick="toggleLogin()">Iniciar Sesión</button>
            </div>
        </div>
        <button class="menu-toggle" onclick="toggleMenu()">
            <i class="fas fa-bars"></i>
        </button>
    </header>

    <nav>
        <ul id="navMenu">
            <li><a href="#"><i class="fa-solid fa-home nav-icon"></i>Inicio</a></li>
            <li><a href="#productos"><i class="fa-solid fa-glasses nav-icon"></i>Catálogo de Productos</a></li>
            <li><a href="#servicios"><i class="fa-solid fa-eye nav-icon"></i>Servicios Ópticos</a></li>
            <li><a href="#about"><i class="fa-solid fa-info-circle nav-icon"></i>Acerca de</a></li>
            <li><a href="#Contactenos"><i class="fa-solid fa-envelope nav-icon"></i>Contáctenos</a></li>
        </ul>
    </nav>

    <div class="hero">
        <video autoplay muted loop playsinline class="video">
            <source src="data:video/mp4;base64," type="video/mp4">
        </video>
        <div class="hero-content">
            <h1>BIENVENIDO A DMC VISVARD</h1>
            <p>Tu distribuidora de confianza en productos ópticos de calidad</p>
            <a href="#productos" class="cpr-button">
                <i class="fa-solid fa-glasses"></i> Ver Productos
            </a>
        </div>
    </div>

    <div class="main-content">
        <div class="section" id="productos">
            <h2><i class="fa-solid fa-star"></i> Productos Destacados</h2>
            <div class="product-grid">
                <div class="product-card">
                    <img src="data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iMzAwIiBoZWlnaHQ9IjI1MCIgdmlld0JveD0iMCAwIDMwMCAyNTAiIGZpbGw9Im5vbmUiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+CjxyZWN0IHdpZHRoPSIzMDAiIGhlaWdodD0iMjUwIiBmaWxsPSIjZjVmNWY1Ii8+CjxyZWN0IHg9IjUwIiB5PSI3NSIgd2lkdGg9IjIwMCIgaGVpZ2h0PSIxMDAiIHJ4PSIxMCIgZmlsbD0iIzMzMyIvPgo8dGV4dCB4PSIxNTAiIHk9IjEzNSIgZm9udC1mYW1pbHk9IkFyaWFsLCBzYW5zLXNlcmlmIiBmb250LXNpemU9IjE2IiBmaWxsPSIjZmZmIiB0ZXh0LWFuY2hvcj0ibWlkZGxlIj5Fc3R1Y2hlIEZvbGRpbmc8L3RleHQ+Cjwvc3ZnPgo=" alt="Estuche Folding">
                    <div class="info">
                        <h3>Estuche Folding Premium</h3>
                        <p>Estuche plegable de alta calidad para gafas.</p>
                        <div class="price">$15.000</div>
                        <button class="add-to-cart" onclick="addToCart(1, 'Estuche Folding Premium', 15000)">
                            <i class="fa-solid fa-cart-plus"></i> Agregar al Carrito
                        </button>
                    </div>
                    <div class="price-badge">Nuevo</div>
                </div>
                
                <div class="product-card">
                    <img src="data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iMzAwIiBoZWlnaHQ9IjI1MCIgdmlld0JveD0iMCAwIDMwMCAyNTAiIGZpbGw9Im5vbmUiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+CjxyZWN0IHdpZHRoPSIzMDAiIGhlaWdodD0iMjUwIiBmaWxsPSIjZjVmNWY1Ii8+CjxjaXJjbGUgY3g9IjE1MCIgY3k9IjEyNSIgcj0iNDAiIGZpbGw9IiNmZjU3MjIiLz4KPHRleHQgeD0iMTUwIiB5PSIyMDAiIGZvbnQtZmFtaWx5PSJBcmlhbCwgc2Fucy1zZXJpZiIgZm9udC1zaXplPSIxNCIgZmlsbD0iIzMzMyIgdGV4dC1hbmNob3I9=mid">Líquido Limpiador</text></svg>" alt="Líquido Limpiador">
                    <div class="info">
                        <h3>Líquido Limpiador Premium</h3>
                        <p>Líquido especial para limpieza de lentes.</p>
                        <div class="price">$8.000</div>
                        <button class="add-to-cart" onclick="addToCart(2, 'Líquido Limpiador Premium', 8000)">
                            <i class="fa-solid fa-cart-plus"></i> Agregar al Carrito
                        </button>
                    </div>
                    <div class="price-badge">Nuevo</div>
                </div>
                
                <div class="product-card">
                    <img src="data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iMzAwIiBoZWlnaHQ9IjI1MCIgdmlld0JveD0iMCAwIDMwMCAyNTAiIGZpbGw9Im5vbmUiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+CjxyZWN0IHdpZHRoPSIzMDAiIGhlaWdodD0iMjUwIiBmaWxsPSIjZjVmNWY1Ii8+CjxyZWN0IHg9IjUwIiB5PSI1MCIgd2lkdGg9IjIwMCIgaGVpZ2h0PSIxNTAiIHJ4PSIxNSIgZmlsbD0iIzMzMyIvPgo8dGV4dCB4PSIxNTAiIHk9IjEzNSIgZm9udC1mYW1pbHk9IkFyaWFsLCBzYW5zLXNlcmlmIiBmb250LXNpemU9IjE0IiBmaWxsPSIjZmZmIiB0ZXh0LWFuY2hvcj0ibWlkZGxlIj5Fc3R1Y2hlIENvZnJlPC90ZXh0Pgo8L3N2Zz4K" alt="Estuche Cofre">
                    <div class="info">
                        <h3>Estuche Cofre</h3>
                        <p>Estuche elegante tipo cofre para gafas.</p>
                        <div class="price">$6.000</div>
                        <button class="add-to-cart" onclick="addToCart(3, 'Estuche Cofre', 6000)">
                            <i class="fa-solid fa-cart-plus"></i> Agregar al Carrito
                        </button>
                    </div>
                    <div class="price-badge">Nuevo</div>
                </div>
                
                <div class="product-card">
                    <img src="data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iMzAwIiBoZWlnaHQ9IjI1MCIgdmlld0JveD0iMCAwIDMwMCAyNTAiIGZpbGw9Im5vbmUiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+CjxyZWN0IHdpZHRoPSIzMDAiIGhlaWdodD0iMjUwIiBmaWxsPSIjZjVmNWY1Ii8+CjxlbGxpcHNlIGN4PSIxNTAiIGN5PSIxMjUiIHJ4PSI4MCIgcnk9IjQwIiBmaWxsPSIjMzMzIi8+Cjx0ZXh0IHg9IjE1MCIgeT0iMjAwIiBmb250LWZhbWlseT0iQXJpYWwsIHNhbnMtc2VyaWYiIGZvbnQtc2l6ZT0iMTQiIGZpbGw9IiMzMzMiIHRleHQtYW5jaG9yPSJtaWRkbGUiPk1vbnR1cmEgU29sPC90ZXh0Pgo8L3N2Zz4K" alt="Montura Sol">
                    <div class="info">
                        <h3>Montura Sol Wandwerth</h3>
                        <p>Montura de sol de alta calidad marca Wandwerth.</p>
                        <div class="price">$180.000</div>
                        <button class="add-to-cart" onclick="addToCart(4, 'Montura Sol Wandwerth', 180000)">
                            <i class="fa-solid fa-cart-plus"></i> Agregar al Carrito
                        </button>
                    </div>
                    <div class="price-badge">Premium</div>
                </div>
            </div>
        </div>

        <div class="section">
            <h2><i class="fa-solid fa-fire"></i> Promociones especiales</h2>
            <div class="product-grid">
                <div class="product-card">
                    <img src="data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iMzAwIiBoZWlnaHQ9IjI1MCIgdmlld0JveD0iMCAwIDMwMCAyNTAiIGZpbGw9Im5vbmUiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+CjxyZWN0IHdpZHRoPSIzMDAiIGhlaWdodD0iMjUwIiBmaWxsPSIjZjVmNWY1Ii8+CjxyZWN0IHg9IjUwIiB5PSI3NSIgd2lkdGg9IjIwMCIgaGVpZ2h0PSIxMDAiIHJ4PSIxMCIgZmlsbD0iIzAwMCIvPgo8dGV4dCB4PSIxNTAiIHk9IjEzNSIgZm9udC1mYW1pbHk9IkFyaWFsLCBzYW5zLXNlcmlmIiBmb250LXNpemU9IjE2IiBmaWxsPSIjZmZmIiB0ZXh0LWFuY2hvcj0ibWlkZGxlIj5Fc3R1Y2hlIE5lZ3JvPC90ZXh0Pgo8L3N2Zz4K" alt="Promoción 1">
                    <div class="info">
                        <h3>Promoción 1</h3>
                        <p>Oferta especial - Estuche Folding Negro.</p>
                        <div class="price">$12.000</div>
                        <button class="add-to-cart" onclick="addToCart(5, 'Promoción 1', 12000)">
                            <i class="fa-solid fa-cart-plus"></i> Agregar al Carrito
                        </button>
                    </div>
                    <div class="price-badge">Especial</div>
                </div>
                
                <div class="product-card">
                    <img src="data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iMzAwIiBoZWlnaHQ9IjI1MCIgdmlld0JveD0iMCAwIDMwMCAyNTAiIGZpbGw9Im5vbmUiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+CjxyZWN0IHdpZHRoPSIzMDAiIGhlaWdodD0iMjUwIiBmaWxsPSIjZjVmNWY1Ii8+CjxyZWN0IHg9IjUwIiB5PSI1MCIgd2lkdGg9IjIwMCIgaGVpZ2h0PSIxNTAiIHJ4PSIxNSIgZmlsbD0iI0RDMTQzQyIvPgo8dGV4dCB4PSIxNTAiIHk9IjEzNSIgZm9udC1mYW1pbHk9IkFyaWFsLCBzYW5zLXNlcmlmIiBmb250LXNpemU9IjE0IiBmaWxsPSIjZmZmIiB0ZXh0LWFuY2hvcj0ibWlkZGxlIj5Fc3R1Y2hlIFJvam88L3RleHQ+Cjwvc3ZnPgo=" alt="Promoción 2">
                    <div class="info">
                        <h3>Promoción 2</h3>
                        <p>Oferta especial - Estuche Rojo Cofre.</p>
                        <div class="price">$5.000</div>
                        <button class="add-to-cart" onclick="addToCart(6, 'Promoción 2', 5000)">
                            <i class="fa-solid fa-cart-plus"></i> Agregar al Carrito
                        </button>
                    </div>
                    <div class="price-badge">Especial</div>
                </div>
            </div>
        </div>

        <div class="section">
            <h2><i class="fa-solid fa-gem"></i> Colecciones destacadas</h2>
            <div class="collections-grid">
                <div class="collection-card">
                    <img src="data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iMzAwIiBoZWlnaHQ9IjIwMCIgdmlld0JveD0iMCAwIDMwMCAyMDAiIGZpbGw9Im5vbmUiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+CjxyZWN0IHdpZHRoPSIzMDAiIGhlaWdodD0iMjAwIiBmaWxsPSIjZjVmNWY1Ii8+CjxjaXJjbGUgY3g9IjE1MCIgY3k9IjEwMCIgcj0iNDAiIGZpbGw9IiMyMkM1NTEiLz4KPHRleHQgeD0iMTUwIiB5PSIxNzAiIGZvbnQtZmFtaWx5PSJBcmlhbCwgc2Fucy1zZXJpZiIgZm9udC1zaXplPSIxNCIgZmlsbD0iIzMzMyIgdGV4dC1hbmNob3I9Im1pZGRsZSI+TGlxdWlkbyBWZXJkZTwvdGV4dD4KPC9zdmc+" alt="Colección 1">
                    <div class="info">
                        <h3>Colección 1</h3>
                        <p>Explora nuestra colección exclusiva de líquidos limpiadores.</p>
                    </div>
                </div>
                
                <div class="collection-card">
                    <img src="data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iMzAwIiBoZWlnaHQ9IjIwMCIgdmlld0JveD0iMCAwIDMwMCAyMDAiIGZpbGw9Im5vbmUiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+CjxyZWN0IHdpZHRoPSIzMDAiIGhlaWdodD0iMjAwIiBmaWxsPSIjZjVmNWY1Ii8+CjxyZWN0IHg9IjUwIiB5PSI1MCIgd2lkdGg9IjIwMCIgaGVpZ2h0PSIxMDAiIHJ4PSIxNSIgZmlsbD0iIzMzMyIvPgo8dGV4dCB4PSIxNTAiIHk9IjE3MCIgZm9udC1mYW1pbHk9IkFyaWFsLCBzYW5zLXNlcmlmIiBmb250LXNpemU9IjE0IiBmaWxsPSIjMzMzIiB0ZXh0LWFuY2hvcj0ibWlkZGxlIj5Fc3R1Y2hlIE5lZ3JvPC90ZXh0Pgo8L3N2Zz4K" alt="Colección 2">
                    <div class="info">
                        <h3>Colección 2</h3>
                        <p>Descubre las mejores ofertas de nuestra colección de estuches.</p>
                    </div>
                </div>
                
                <div class="collection-card">
                    <img src="data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iMzAwIiBoZWlnaHQ9IjIwMCIgdmlld0JveD0iMCAwIDMwMCAyMDAiIGZpbGw9Im5vbmUiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+CjxyZWN0IHdpZHRoPSIzMDAiIGhlaWdodD0iMjAwIiBmaWxsPSIjZjVmNWY1Ii8+CjxyZWN0IHg9IjUwIiB5PSI1MCIgd2lkdGg9IjIwMCIgaGVpZ2h0PSIxMDAiIHJ4PSIxNSIgZmlsbD0iI0ZGOTgwMCIvPgo8dGV4dCB4PSIxNTAiIHk9IjE3MCIgZm9udC1mYW1pbHk9IkFyaWFsLCBzYW5zLXNlcmlmIiBmb250LXNpemU9IjE0IiBmaWxsPSIjMzMzIiB0ZXh0LWFuY2hvcj0ibWlkZGxlIj5Fc3R1Y2hlIE5hcmFuamE8L3RleHQ+Cjwvc3ZnPgo=" alt="Colección 3">
                    <div class="info">
                        <h3>Colección 3</h3>
                        <p>Vea nuestras nuevas llegadas y selecciones especiales.</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="contact-section" id="Contactenos">
            <h2><i class="fa-solid fa-envelope"></i> Contáctenos</h2>
            <p>Si tiene alguna pregunta o necesita ayuda, no dude en comunicarse con nosotros.</p>
            <form>
                <input type="text" placeholder="Su nombre" required>
                <input type="email" placeholder="Su correo electrónico" required>
                <textarea rows="5" placeholder="Su mensaje" required></textarea>
                <button type="submit">
                    <i class="fa-solid fa-paper-plane"></i> Enviar mensaje
                </button>
            </form>
        </div>

        <div class="faq-section">
            <h2><i class="fa-solid fa-question-circle"></i> Preguntas frecuentes</h2>
            <div class="faq-item">
                <h3><i class="fa-solid fa-undo"></i> ¿Cuál es su política de devolución?</h3>
                <p>Ofrecemos una política de devolución de 30 días para todos los productos. Para más información, contacte con nuestro equipo de soporte.</p>
            </div>
            <div class="faq-item">
                <h3><i class="fa-solid fa-shipping-fast"></i> ¿Ofrecen envíos internacionales?</h3>
                <p>Solo ofrecemos envíos en la ciudad de Bogotá.</p>
            </div>
            <div class="faq-item">
                <h3><i class="fa-solid fa-search"></i> ¿Cómo puedo rastrear mi pedido?</h3>
                <p>Una vez enviado tu pedido, recibirás una guía por correo electrónico. Usa este número para rastrear su envío.</p>
            </div>
        </div>
    </div>

    <footer>
        <div class="footer-content">
            <div class="footer-top">
                <div class="newsletter">
                    <div class="footer-logo">DMC VISVARD</div>
                    <h3>Suscríbete</h3>
                    <div class="newsletter-form">
                        <input type="email" placeholder="Introduce tu correo electrónico" required>
                        <button type="submit">Suscribir</button>
                    </div>
                </div>
                <div class="footer-links">
                    <div class="footer-link-section">
                        <h3>Enlaces rápidos</h3>
                        <ul>
                            <li><a href="#">Inicio</a></li>
                            <li><a href="#productos">Catálogo</a></li>
                            <li><a href="#servicios">Servicios</a></li>
                            <li><a href="#about">Acerca de</a></li>
                            <li><a href="#Contactenos">Contáctenos</a></li>
                        </ul>
                    </div>
                    <div class="footer-link-section">
                        <h3>Servicio al cliente</h3>
                        <ul>
                            <li><a href="#">Preguntas frecuentes</a></li>
                            <li><a href="#">Devoluciones</a></li>
                            <li><a href="#">Envío</a></li>
                            <li><a href="#">Seguimiento de pedidos</a></li>
                            <li><a href="#">Política de privacidad</a></li>
                        </ul>
                    </div>
                    <div class="footer-link-section">
                        <h3>Sobre nosotros</h3>
                        <ul>
                            <li><a href="#">Nuestra historia</a></li>
                            <li><a href="#">Equipo</a></li>
                            <li><a href="#">Misión</a></li>
                        </ul>
                    </div>
                    <div class="footer-link-section">
                        <h3>Contáctenos</h3>
                        <ul>
                            <li><a href="mailto:josedavidrojas323@gmail.com">josedavidrojas323@gmail.com</a></li>
                            <li><a href="tel:3232162027">3232162027</a></li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="footer-bottom">
                <div class="social-icons">
                    <a href="https://www.facebook.com/share/1Vep3svjjQ/" target="_blank"><i class="fa-brands fa-facebook-f"></i></a>
                    <a href="https://x.com/jdrfilmms"><i class="fa-brands fa-twitter"></i></a>
                    <a href="https://www.instagram.com/jdrfilmmaker"><i class="fa-brands fa-instagram"></i></a>
                    <a href="#"><i class="fa-brands fa-linkedin-in"></i></a>
                </div>
                <p>&copy; 2025 DMC VISVARD. Todos los derechos reservados.</p>
            </div>
        </div>
    </footer>

    <!-- Carrito de compras (modal oculto) -->
    <div id="cartModal" class="cart-modal" style="display: none;">
        <div class="cart-content">
            <div class="cart-header">
                <h2>Carrito de Compras</h2>
                <button class="close-cart" onclick="toggleCart()">&times;</button>
            </div>
            <div id="cartItems" class="cart-items">
                <!-- Los productos del carrito se mostrarán aquí -->
            </div>
            <div class="cart-footer">
                <div class="cart-total">
                    <strong>Total: $<span id="cartTotal">0</span></strong>
                </div>
                <button class="checkout-btn" onclick="checkout()">Proceder al Pago</button>
            </div>
        </div>
    </div>

    <!-- Modal de Login -->
    <div id="loginModal" class="login-modal" style="display: none;">
        <div class="login-content">
            <div class="login-header">
                <h2>Iniciar Sesión</h2>
                <button class="close-login" onclick="toggleLogin()">&times;</button>
            </div>
            <form class="login-form">
                <input type="email" placeholder="Correo electrónico" required>
                <input type="password" placeholder="Contraseña" required>
                <button type="submit">Iniciar Sesión</button>
                <p>¿No tienes cuenta? <a href="#" onclick="showRegister()">Regístrate aquí</a></p>
            </form>
        </div>
    </div>
<?php echo $this->endSection(); ?> 
