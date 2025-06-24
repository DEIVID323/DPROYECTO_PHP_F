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
                    <i class="fa-solid fa-search"></i>
                </button>
            </div>
<div class="cart-icon">
    <a href="<?php echo base_url ('public/carrito.html'); ?>">
        <i class="fa-solid fa-cart-shopping"></i>
        <span class="cart-count">0</span>
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
            <li><a href="#"><i class="fa-solid fa-home nav-icon"></i>Inicio</a></li>
            <li><a href="<?php echo base_url('public/productos.html'); ?>"><i class="fa-solid fa-shop nav-icon"></i>Catalogo De Productos</a></li>
            <li><a href="<?php echo base_url('public/error404.html'); ?>"><i class="fa-solid fa-concierge-bell nav-icon"></i>Servicios</a></li>
            <li><a href="<?php echo base_url('public/error404.html'); ?>"><i class="fa-solid fa-info-circle nav-icon"></i>Acerca de</a></li>
            <li><a href="#Contactenos"><i class="fa-solid fa-envelope nav-icon"></i>Contactenos</a></li>
        </ul>
    </nav>
    <div class="hero">
        <video autoplay muted loop playsinline class="video">
            <source src="<?php echo base_url('imagenes/gafas.mp4'); ?>" type="video/mp4">
        </video>
        <div class="hero-content">
            <h1>BIENVENIDO A LA TIENDA DMC VISVARD</h1>
            <p>Tu tienda unica de productos opticos!</p>
            <a href="<?php echo base_url('public/productos.html'); ?>" class="cpr-button">Comprar ahora</a>
        </div>
    </div>

    <div class="main-content">
        <div class="section">
            <h2>Productos destacados</h2>
            <div class="product-grid">
                <div class="product-card">
                    <img src="<?php echo base_url('imagenes/Estuche 1.png'); ?>"
                        alt="Producto 1">
                    <div class="info">
                        <h3>Producto 1</h3>
                        <p>Estuche folding.</p>
                        <div class="price">$15.000</div>
                    </div>
                    <div class="price-badge">Nuevo</div>
                </div>
                <div class="product-card">
                    <img src="<?php echo base_url('imagenes/C Rojo_.png'); ?>"
                        alt="Producto 2">
                    <div class="info">
                        <h3>Producto 2</h3>
                        <p>Cordon elastico.</p>
                        <div class="price">$8.000</div>
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
                        <div class="price-badge">Nuevo</div>
                    </div>
                </div>
            </div>
        </div>

        <div class="section">
            <h2>Promociones especiales</h2>
            <div class="product-grid">
                <div class="product-card">
                    <img src="<?php echo base_url('imagenes/Estuche F Negro_.png'); ?>"
                        alt="Promocion  1">
                    <div class="info">
                        <h3>Promocion 1</h3>
                        <p>Oferta especial  Promoción 1.</p>
                        <div class="price">$12.000</div>
                    </div>
                    <div class="price-badge">Especial</div>
                </div>
                <div class="product-card">
                    <img src="<?php echo base_url('imagenes/Estuche Rojo C.png'); ?>"
                        alt="Promocion  2">
                    <div class="info">
                        <h3>Promocion 2</h3>
                        <p>Oferta especial Promoción  2.</p>
                        <div class="price">$5.000</div>
                    </div>
                    <div class="price-badge">Especial</div>
                </div>
            </div>
        </div>
<!----
        <div class="customer-testimonials">
            <h2>What Our Customers Are Saying</h2>
            <div class="testimonials-container">
                <div class="testimonial-card">
                    <p>"Amazing service and fantastic products! Highly recommend this store."</p>
                    <div class="author">John Doe</div>
                </div>
                <div class="testimonial-card">
                    <p>"The best shopping experience I've had in a long time. Will definitely come back."</p>
                    <div class="author">Jane Smith</div>
                </div>
                <div class="testimonial-card">
                    <p>"Great quality products at great prices. Customer service is excellent too."</p>
                    <div class="author">Sam Wilson</div>
                </div>
            </div>
        </div>
    --->
        <div class="featured-collections">
            <h2>Colecciones destacadas</h2>
            <div class="collections-grid">
                <div class="collection-card">
                    <img src="<?php echo base_url('imagenes/Líquido Verde .png'); ?>"
                        alt="Collection 1">
                    <div class="info">
                        <h3>Colección 1</h3>
                        <p>Explora nuestra colección exclusiva de artículos.</p>
                    </div>
                </div>
                <div class="collection-card">
                    <img src="<?php echo base_url('imagenes/Estuche cre N 1.png'); ?>"
                        alt="Collection 2">
                    <div class="info">
                        <h3>Colección  2</h3>
                        <p>Descubre las mejores ofertas de nuestra colección.</p>
                    </div>
                </div>
                <div class="collection-card">
                    <img src="<?php echo base_url('imagenes/Estuche Cre A.png'); ?>"
                        alt="Collection 3">
                    <div class="info">
                        <h3>Colección 3</h3>
                        <p>Vea nuestras nuevas llegadas y selecciones .</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="blog-section">
            <h2>Últimas publicaciones del blog</h2>
            
            <!--<div class="blog-post">
                <img src="https://images.pexels.com/photos/2335048/pexels-photo-2335048.jpeg?auto=compress&cs=tinysrgb&w=800&lazy=load"
                    alt="Blog Post 1">
                <h3>How to Choose the Right Product</h3>
                <p>Tips and tricks for selecting the perfect items for your needs.</p>
            </div>
            <div class="blog-post">
                <img src="https://images.pexels.com/photos/3587478/pexels-photo-3587478.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=2"
                    alt="Blog Post 2">
                <h3>Top 10 Summer Trends</h3>
                <p>Stay ahead with the hottest trends for the upcoming season.</p>
            </div>
        </div>
 -->
        <div class="contact-section">
            <h2 id="Contactenos">Contáctenos</h2>
            <p>Si tiene alguna pregunta o necesita ayuda, no dude en comunicarse con nosotros.</p>
            <form>
                <input type="text" placeholder="Su nombre" required>
                <input type="email" placeholder="Su correo electronico" required>
                <textarea rows="5" placeholder="Tu mensaje" required></textarea>
                <button type="submit">Enviar mensaje</button>
            </form>
        </div>
   
        <div class="faq-section">
            <h2>Preguntas frecuentes</h2>
            <div class="faq-item">
                <h3>¿Cuál es su política de devolución?</h3>
                <p>Ofrecemos una política de devolución de 30 días para todos los productos. Para más información, contacte con nuestro equipo de soporte.</p>
            </div>
            <div class="faq-item">
                <h3>¿Ofrecen envíos internacionales?</h3>
                <p>Solo ofrecemos envios en la ciudad de bogota</p>
            </div>
            <div class="faq-item">
                <h3>¿Cómo puedo rastrear mi pedido?</h3>
                <p>Una vez enviado tu pedido, recibirás un guia por correo electrónico. Usa este número para rastrear su envío.</p>
            </div>
        </div>
    </div>

    <footer>
        <div class="footer-content">
            <div class="footer-top">
                <div class="footer-logo">
                    <div class="logo">DMC VISVARD</div>
                </div>
                <div class="footer-links">
                    <div class="footer-link-section">
                        <h3>Enlaces rápidos</h3>
                        <ul>
                            <li><a href="#">Home</a></li>
                            <li><a href="#">Shop</a></li>
                            <li><a href="#">Services</a></li>
                            <li><a href="#">About</a></li>
                            <li><a href="#">Contactenos</a></li>
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
                    </div>
                    <div class="footer-link-section">
                        <h3>Contáctenos</h3>
                        <ul>
                            <li><a href="mailto:support@muhilanstore.com">josedavidrojas323@gmail.com</a></li>
                            <li><a href="tel:3232162027">3232162027</a></li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="footer-bottom">
                <div class="newsletter">
                    <h3>Suscríbete</h3>
                    <div class="newsletter-form">
                        <input type="email" placeholder="Introduce tu correo electronico" required>
                        <button type="submit">Suscribir</button>
                    </div>
                </div>
                <div class="social-icons">
                    <a href="https://www.facebook.com/share/1Vep3svjjQ/" target="_blank"><i class="fa-brands fa-facebook-f"></i></a>
                    <a href="https://x.com/jdrfilmms"><i class="fa-brands fa-twitter"></i></a>
                    <a href="https://www.instagram.com/jdrfilmmaker"><i class="fa-brands fa-instagram"></i></a>
                    <a href="error404.html"><i class="fa-brands fa-linkedin-in"></i></a>
                </div>
                <p>&copy; 2025 DMC VISVARD.</p>
            </div>
        </div>
    </footer>
<?php echo $this->endSection(); ?> 