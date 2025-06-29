document.addEventListener('DOMContentLoaded', function() {
   // Funcionalidad del botón de búsqueda
   const searchButton = document.getElementById('searchButton');
   const searchInput = document.getElementById('searchInput');
   
   if (searchButton && searchInput) {
       searchButton.addEventListener('click', function () {
           searchInput.classList.toggle('open');
           searchInput.focus();
       });
   }

   // Funcionalidad del menú hamburguesa
   const menuToggle = document.querySelector('.menu-toggle');
   const navMenu = document.querySelector('.nav-menu');

   if (menuToggle && navMenu) {
       menuToggle.addEventListener('click', function() {
           navMenu.classList.toggle('active');
           menuToggle.classList.toggle('active');
           console.log('Menú hamburguesa clickeado');
       });
   }
   
   // Cerrar el menú cuando se hace clic en un enlace
   const navLinks = document.querySelectorAll('.nav-menu li a');
   navLinks.forEach(link => {
       link.addEventListener('click', function() {
           navMenu.classList.remove('active');
           menuToggle.classList.remove('active');
       });
   });
   
   // Cerrar el menú cuando se hace clic fuera de él
   document.addEventListener('click', function(event) {
       if (!navMenu.contains(event.target) && !menuToggle.contains(event.target) && navMenu.classList.contains('active')) {
           navMenu.classList.remove('active');
           menuToggle.classList.remove('active');
       }
   });
   
        // Variables globales
        let cart = [];
        let cartTotal = 0;

        // Función para alternar el menú móvil
        function toggleMenu() {
            const navMenu = document.getElementById('navMenu');
            navMenu.classList.toggle('show');
        }

        // Función para alternar la búsqueda
        document.getElementById('searchButton').addEventListener('click', function() {
            const searchInput = document.getElementById('searchInput');
            searchInput.classList.toggle('open');
            if (searchInput.classList.contains('open')) {
                searchInput.focus();
            }
        });

        // Función para agregar productos al carrito
        function addToCart(id, name, price) {
            const existingItem = cart.find(item => item.id === id);
            
            if (existingItem) {
                existingItem.quantity += 1;
            } else {
                cart.push({
                    id: id,
                    name: name,
                    price: price,
                    quantity: 1
                });
            }
            
            updateCartDisplay();
            showCartNotification();
        }

        // Función para actualizar la visualización del carrito
        function updateCartDisplay() {
            const cartCount = document.getElementById('cartCount');
            const cartItems = document.getElementById('cartItems');
            const cartTotalElement = document.getElementById('cartTotal');
            
            // Actualizar contador
            const totalItems = cart.reduce((sum, item) => sum + item.quantity, 0);
            cartCount.textContent = totalItems;
            
            // Actualizar total
            cartTotal = cart.reduce((sum, item) => sum + (item.price * item.quantity), 0);
            cartTotalElement.textContent = cartTotal.toLocaleString();
            
            // Actualizar lista de productos
            cartItems.innerHTML = '';
            cart.forEach(item => {
                const cartItem = document.createElement('div');
                cartItem.className = 'cart-item';
                cartItem.innerHTML = `
                    <div class="cart-item-info">
                        <h4>${item.name}</h4>
                        <p>$${item.price.toLocaleString()} x ${item.quantity}</p>
                    </div>
                    <div class="cart-item-controls">
                        <button onclick="changeQuantity(${item.id}, -1)">-</button>
                        <span>${item.quantity}</span>
                        <button onclick="changeQuantity(${item.id}, 1)">+</button>
                        <button onclick="removeFromCart(${item.id})" class="remove-btn">×</button>
                    </div>
                `;
                cartItems.appendChild(cartItem);
            });
        }

        // Función para cambiar cantidad de productos
        function changeQuantity(id, change) {
            const item = cart.find(item => item.id === id);
            if (item) {
                item.quantity += change;
                if (item.quantity <= 0) {
                    removeFromCart(id);
                } else {
                    updateCartDisplay();
                }
            }
        }

        // Función para eliminar producto del carrito
        function removeFromCart(id) {
            cart = cart.filter(item => item.id !== id);
            updateCartDisplay();
        }

        // Función para alternar el carrito
        function toggleCart() {
            const cartModal = document.getElementById('cartModal');
            cartModal.style.display = cartModal.style.display === 'none' ? 'block' : 'none';
        }

        // Función para alternar el login
        function toggleLogin() {
            const loginModal = document.getElementById('loginModal');
            loginModal.style.display = loginModal.style.display === 'none' ? 'block' : 'none';
        }

        // Función para mostrar notificación de producto agregado
        function showCartNotification() {
            // Crear notificación temporal
            const notification = document.createElement('div');
            notification.style.cssText = `
                position: fixed;
                top: 100px;
                right: 20px;
                background: #4CAF50;
                color: white;
                padding: 15px;
                border-radius: 5px;
                z-index: 10000;
                animation: slideIn 0.3s ease-out;
            `;
            notification.textContent = '¡Producto agregado al carrito!';
            document.body.appendChild(notification);
            
            setTimeout(() => {
                notification.remove();
            }, 3000);
        }

        // Función para proceder al checkout
        function checkout() {
            if (cart.length === 0) {
                alert('Tu carrito está vacío');
                return;
            }
            alert('Redirigiendo al proceso de pago...');
            // Aquí iría la lógica para proceder al pago
        }

        // Cerrar modales al hacer clic fuera de ellos
        window.onclick = function(event) {
            const cartModal = document.getElementById('cartModal');
            const loginModal = document.getElementById('loginModal');
            
            if (event.target === cartModal) {
                cartModal.style.display = 'none';
            }
            if (event.target === loginModal) {
                loginModal.style.display = 'none';
            }
        }

        // Animaciones de scroll
        window.addEventListener('scroll', function() {
            const header = document.querySelector('header');
            if (window.scrollY > 50) {
                header.style.background = 'rgba(40, 44, 52, 0.98)';
            } else {
                header.style.background = 'rgba(40, 44, 52, 0.95)';
            }
        });

        // Inicializar la página
        document.addEventListener('DOMContentLoaded', function() {
            updateCartDisplay();
        });
    

});

