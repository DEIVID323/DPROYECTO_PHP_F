<?php  echo $this->extend('plantilla/layout'); ?>
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
<div class="cart-icon">
    <a href="<?php echo base_url ('public/carrito.html'); ?>">
        <i class="fa-solid fa-cart-shopping"></i>
        <span class="cart-count" id="cartCount">0</span>
    </a>
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
        <ul>
            <li><a href="#"><i class="fa-solid fa-house nav-icon"></i>Inicio</a></li>
            <li><a href="<?php  base_url('catalogo'); ?>"><i class="fa-solid fa-glasses nav-icon"></i>Catálogo De Productos</a></li>
            <li><a href="<?php echo base_url('/productos'); ?>"><i class="fa-solid fa-eye nav-icon"></i>Servicios Ópticos</a></li>
            <li><a href="<?php echo base_url('public/error404.html'); ?>"><i class="fa-solid fa-building nav-icon"></i>Acerca De Distribuciones JV</a></li>
            <li><a href="#Contactenos"><i class="fa-solid fa-phone nav-icon"></i>Contáctenos</a></li>
        </ul>
    </nav>
    <div class="hero">
        <video autoplay muted loop playsinline class="video">
            <source src="<?php echo base_url('imagenes/gafas.mp4'); ?>" type="video/mp4">
        </video>
        <div class="hero-content">
            <h1>BIENVENIDO A LA TIENDA DISTRIBUCIONES JV </h1>
            <p>Tu distribuidora única en productos ópticos!</p>
            <a href="<?php echo base_url('public/productos.html'); ?>" class="cpr-button">Comprar ahora</a>
        </div>
    </div>

    <div class="main-content">
        <div class="section">
            <h2><i class="fa-solid fa-star"></i> Productos destacados</h2>
            <div class="product-grid">
                <div class="product-card">
                    <img src="<?php echo base_url('imagenes/Estuche 1.png'); ?>"
                        alt="Producto 1">
                    <div class="info">
                        <h3>Producto 1</h3>
                        <p>Estuche folding.</p>
                        <div class="price">$15.000</div>
                        <button class="add-to-cart-btn" 
                                data-id="1" 
                                data-name="Producto 1" 
                                data-price="15000" 
                                data-description="Estuche folding"
                                data-image="<?php echo base_url('imagenes/Estuche 1.png'); ?>">
                            <i class="fa-solid fa-cart-plus"></i>
                            Agregar al carrito
                        </button>
                    </div>
                    <div class="price-badge">Nuevo</div>
                </div>
                <div class="product-card">
                    <img src="<?php echo base_url('imagenes/C Rojo_.png'); ?>"
                        alt="Producto 2">
                    <div class="info">
                        <h3>Producto 2</h3>
                        <p>Cordón elástico.</p>
                        <div class="price">$8.000</div>
                        <button class="add-to-cart-btn" 
                                data-id="2" 
                                data-name="Producto 2" 
                                data-price="8000" 
                                data-description="Cordón elástico"
                                data-image="<?php echo base_url('imagenes/C Rojo_.png'); ?>">
                            <i class="fa-solid fa-cart-plus"></i>
                            Agregar al carrito
                        </button>
                        <div class="price-badge">Nuevo</div>
                    </div>
                </div>
                <div class="product-card">
                    <img src="<?php echo base_url('imagenes/Estuche Cafe C.png'); ?>"
                        alt="Product 3">
                    <div class="info">
                        <h3>Producto 3</h3>
                        <p>Estuche cofre.</p>
                        <div class="price">$6.000</div>
                        <button class="add-to-cart-btn" 
                                data-id="3" 
                                data-name="Producto 3" 
                                data-price="6000" 
                                data-description="Estuche cofre"
                                data-image="<?php echo base_url('imagenes/Estuche Cafe C.png'); ?>">
                            <i class="fa-solid fa-cart-plus"></i>
                            Agregar al carrito
                        </button>
                        <div class="price-badge">Nuevo</div>
                    </div>
                </div>
                <div class="product-card">
                    <img src="<?php echo base_url('imagenes/Montura sol.png'); ?>"
                        alt="Producto 4">
                    <div class="info">
                        <h3>Producto 4</h3>
                        <p>Montura sol Wandwerth.</p>
                        <div class="price">$180.000</div>
                        <button class="add-to-cart-btn" 
                                data-id="4" 
                                data-name="Producto 4" 
                                data-price="180000" 
                                data-description="Montura sol Wandwerth"
                                data-image="<?php echo base_url('imagenes/Montura sol.png'); ?>">
                            <i class="fa-solid fa-cart-plus"></i>
                            Agregar al carrito
                        </button>
                        <div class="price-badge">Nuevo</div>
                    </div>
                </div>
            </div>
        </div>

        <div class="section">
            <h2><i class="fa-solid fa-tags"></i> Promociones especiales</h2>
            <div class="product-grid">
                <div class="product-card">
                    <img src="<?php echo base_url('imagenes/Estuche F Negro_.png'); ?>"
                        alt="Promocion  1">
                    <div class="info">
                        <h3>Promoción 1</h3>
                        <p>Oferta especial Promoción 1.</p>
                        <div class="price">$12.000</div>
                        <button class="add-to-cart-btn" 
                                data-id="5" 
                                data-name="Promoción 1" 
                                data-price="12000" 
                                data-description="Oferta especial Promoción 1"
                                data-image="<?php echo base_url('imagenes/Estuche F Negro_.png'); ?>">
                            <i class="fa-solid fa-cart-plus"></i>
                            Agregar al carrito
                        </button>
                    </div>
                    <div class="price-badge">Especial</div>
                </div>
                <div class="product-card">
                    <img src="<?php echo base_url('imagenes/Estuche Rojo C.png'); ?>"
                        alt="Promocion  2">
                    <div class="info">
                        <h3>Promoción 2</h3>
                        <p>Oferta especial Promoción 2.</p>
                        <div class="price">$5.000</div>
                        <button class="add-to-cart-btn" 
                                data-id="6" 
                                data-name="Promoción 2" 
                                data-price="5000" 
                                data-description="Oferta especial Promoción 2"
                                data-image="<?php echo base_url('imagenes/Estuche Rojo C.png'); ?>">
                            <i class="fa-solid fa-cart-plus"></i>
                            Agregar al carrito
                        </button>
                    </div>
                    <div class="price-badge">Especial</div>
                </div>
            </div>
        </div>

        <div class="featured-collections">
            <h2><i class="fa-solid fa-layer-group"></i> Colecciones destacadas</h2>
            <div class="collections-grid">
                <div class="collection-card">
                    <img src="<?php echo base_url('imagenes/Líquido Verde .png'); ?>"
                        alt="Collection 1">
                    <div class="info">
                        <h3>Colección 1</h3>
                        <p>Explora nuestra colección exclusiva de artículos ópticos.</p>
                    </div>
                </div>
                <div class="collection-card">
                    <img src="<?php echo base_url('imagenes/Estuche cre N 1.png'); ?>"
                        alt="Collection 2">
                    <div class="info">
                        <h3>Colección 2</h3>
                        <p>Descubre las mejores ofertas de nuestra colección.</p>
                    </div>
                </div>
                <div class="collection-card">
                    <img src="<?php echo base_url('imagenes/Estuche Cre A.png'); ?>"
                        alt="Collection 3">
                    <div class="info">
                        <h3>Colección 3</h3>
                        <p>Ve nuestras nuevas llegadas y selecciones exclusivas.</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="blog-section">
            <h2><i class="fa-solid fa-newspaper"></i> Últimas publicaciones del blog</h2>
        </div>

        <div class="contact-section">
            <h2 id="Contactenos"><i class="fa-solid fa-headset"></i> Contáctenos</h2>
            <p>Si tiene alguna pregunta sobre nuestros productos ópticos o necesita asesoría especializada, no dude en comunicarse con nosotros.</p>
            <form>
                <input type="text" placeholder="Su nombre" required>
                <input type="email" placeholder="Su correo electrónico" required>
                <textarea rows="5" placeholder="Su mensaje" required></textarea>
                <button type="submit"><i class="fa-solid fa-paper-plane"></i> Enviar mensaje</button>
            </form>
        </div>
   
        <div class="faq-section">
            <h2><i class="fa-solid fa-circle-question"></i> Preguntas frecuentes</h2>
            <div class="faq-item">
                <h3><i class="fa-solid fa-rotate-left"></i> ¿Cuál es su política de devolución?</h3>
                <p>Ofrecemos una política de devolución de 30 días para todos los productos ópticos. Para más información, contacte con nuestro equipo de soporte especializado.</p>
            </div>
            <div class="faq-item">
                <h3><i class="fa-solid fa-truck"></i> ¿Ofrecen envíos internacionales?</h3>
                <p>Solo ofrecemos envíos en la ciudad de Bogotá para garantizar la mejor atención y cuidado de sus productos ópticos.</p>
            </div>
            <div class="faq-item">
                <h3><i class="fa-solid fa-magnifying-glass-location"></i> ¿Cómo puedo rastrear mi pedido?</h3>
                <p>Una vez enviado su pedido, recibirá una guía por correo electrónico. Use este número para rastrear su envío de productos ópticos.</p>
            </div>
        </div>
    </div>

    <!-- Modal de confirmación para agregar al carrito -->
    <div id="cartModal" class="cart-modal">
        <div class="cart-modal-content">
            <span class="cart-modal-close">&times;</span>
            <div class="cart-modal-header">
                <i class="fa-solid fa-check-circle"></i>
                <h3>¡Producto agregado al carrito!</h3>
            </div>
            <div class="cart-modal-body">
                <div class="added-product-info">
                    <img id="modalProductImage" src="" alt="">
                    <div class="product-details">
                        <h4 id="modalProductName"></h4>
                        <p id="modalProductDescription"></p>
                        <span class="modal-price" id="modalProductPrice"></span>
                    </div>
                </div>
            </div>
            <div class="cart-modal-footer">
                <button class="continue-shopping-btn" onclick="closeCartModal()">
                    <i class="fa-solid fa-arrow-left"></i>
                    Seguir comprando
                </button>
                <a href="<?php echo base_url('public/carrito.html'); ?>" class="go-to-cart-btn">
                    <i class="fa-solid fa-cart-shopping"></i>
                    Ver carrito
                </a>
            </div>
        </div>
    </div>

    <footer>
        <div class="footer-content">
            <div class="footer-top">
                <div class="footer-logo">
                    <div class="logo"><i class="fa-solid fa-glasses"></i> DMC VISVARD</div>
                </div>
                <div class="footer-links">
                    <div class="footer-link-section">
                        <h3><i class="fa-solid fa-link"></i> Enlaces rápidos</h3>
                        <ul>
                            <li><a href="#"><i class="fa-solid fa-house"></i> Inicio</a></li>
                            <li><a href="#"><i class="fa-solid fa-glasses"></i> Catálogo</a></li>
                            <li><a href="#"><i class="fa-solid fa-eye"></i> Servicios</a></li>
                            <li><a href="#"><i class="fa-solid fa-building"></i> Nosotros</a></li>
                            <li><a href="#"><i class="fa-solid fa-phone"></i> Contacto</a></li>
                        </ul>
                    </div>
                    <div class="footer-link-section">
                        <h3><i class="fa-solid fa-user-gear"></i> Servicio al cliente</h3>
                        <ul>
                            <li><a href="#"><i class="fa-solid fa-circle-question"></i> Preguntas frecuentes</a></li>
                            <li><a href="#"><i class="fa-solid fa-rotate-left"></i> Devoluciones</a></li>
                            <li><a href="#"><i class="fa-solid fa-truck"></i> Envío</a></li>
                            <li><a href="#"><i class="fa-solid fa-magnifying-glass-location"></i> Rastreo de pedidos</a></li>
                            <li><a href="#"><i class="fa-solid fa-shield-halved"></i> Política de privacidad</a></li>
                        </ul>
                    </div>
                    <div class="footer-link-section">
                        <h3><i class="fa-solid fa-building"></i> Sobre nosotros</h3>
                        <ul>
                            <li><a href="#"><i class="fa-solid fa-clock-rotate-left"></i> Nuestra historia</a></li>
                        </ul>
                    </div>
                    <div class="footer-link-section">
                        <h3><i class="fa-solid fa-headset"></i> Contáctenos</h3>
                        <ul>
                            <li><a href="mailto:josedavidrojas323@gmail.com"><i class="fa-solid fa-envelope"></i> josedavidrojas323@gmail.com</a></li>
                            <li><a href="tel:3232162027"><i class="fa-solid fa-phone"></i> 3232162027</a></li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="footer-bottom">
                <div class="newsletter">
                    <h3><i class="fa-solid fa-bell"></i> Suscríbete</h3>
                    <div class="newsletter-form">
                        <input type="email" placeholder="Introduce tu correo electrónico" required>
                        <button type="submit"><i class="fa-solid fa-paper-plane"></i> Suscribir</button>
                    </div>
                </div>
                <div class="social-icons">
                    <a href="https://www.facebook.com/share/1Vep3svjjQ/" target="_blank"><i class="fa-brands fa-facebook-f"></i></a>
                    <a href="https://x.com/jdrfilmms"><i class="fa-brands fa-x-twitter"></i></a>
                    <a href="https://www.instagram.com/jdrfilmmaker"><i class="fa-brands fa-instagram"></i></a>
                    <a href="error404.html"><i class="fa-brands fa-linkedin-in"></i></a>
                </div>
                <p>&copy; 2025 DMC VISVARD. Distribuidores de productos ópticos.</p>
            </div>
        </div>
    </footer>
<?php echo $this->endSection(); ?>