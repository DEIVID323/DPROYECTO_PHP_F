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
        // Función para manejar el carrito de compras
        let cart = JSON.parse(localStorage.getItem('cart')) || [];

        // Actualizar contador del carrito
        function updateCartCount() {
            const cartCount = document.getElementById('cartCount');
            const totalItems = cart.reduce((sum, item) => sum + item.quantity, 0);
            cartCount.textContent = totalItems;
        }

        // Agregar producto al carrito
        function addToCart(product) {
            const existingItem = cart.find(item => item.id === product.id);
            
            if (existingItem) {
                existingItem.quantity += 1;
            } else {
                cart.push({
                    id: product.id,
                    name: product.name,
                    price: product.price,
                    description: product.description,
                    image: product.image,
                    quantity: 1
                });
            }
            
            localStorage.setItem('cart', JSON.stringify(cart));
            updateCartCount();
            showCartModal(product);
        }

        // Mostrar modal de confirmación
        function showCartModal(product) {
            const modal = document.getElementById('cartModal');
            const modalImage = document.getElementById('modalProductImage');
            const modalName = document.getElementById('modalProductName');
            const modalDescription = document.getElementById('modalProductDescription');
            const modalPrice = document.getElementById('modalProductPrice');

            modalImage.src = product.image;
            modalName.textContent = product.name;
            modalDescription.textContent = product.description;
            modalPrice.textContent = '$' + parseInt(product.price).toLocaleString();

            modal.style.display = 'block';
        }

        // Cerrar modal
        function closeCartModal() {
            document.getElementById('cartModal').style.display = 'none';
        }

        // Event listeners
        document.addEventListener('DOMContentLoaded', function() {
            // Actualizar contador al cargar la página
            updateCartCount();

            // Botones de agregar al carrito
            const addToCartButtons = document.querySelectorAll('.add-to-cart-btn');
            addToCartButtons.forEach(button => {
                button.addEventListener('click', function() {
                    const product = {
                        id: this.getAttribute('data-id'),
                        name: this.getAttribute('data-name'),
                        price: this.getAttribute('data-price'),
                        description: this.getAttribute('data-description'),
                        image: this.getAttribute('data-image')
                    };
                    addToCart(product);
                });
            });

            // Cerrar modal al hacer clic en la X
            document.querySelector('.cart-modal-close').addEventListener('click', closeCartModal);

            // Cerrar modal al hacer clic fuera de él
            window.addEventListener('click', function(event) {
                const modal = document.getElementById('cartModal');
                if (event.target === modal) {
                    closeCartModal();
                }
            });
        });
});

