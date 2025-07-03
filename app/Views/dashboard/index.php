<?= $this->extend('plantilla/layout_das'); ?>
<?= $this->section('contenido'); ?>
  <body>
    <main>
      <section id="Secmenu">
        <aside class="sidebar">
          <div class="left">
            <img src="<?php echo base_url ('imagenes/LOGO.png') ?>" />
            <button><a href="index.html"><i class="ai-home-alt1"></i></a></button>
            <button><i class="ai-chat-dots"></i></button>
            <div>
              <button><i class="ai-gear"></i></button>
              <button><a href="index.php"><i class="ai-link-out"></i></a></button>
            </div>
          </div>
            <div class="right">
            <div class="right-inner">
              <div class="header">
              <h2>DISTRIBUCIONES JV</h2>
              </div>
              <nav>
              <button onclick="cargarContenido('imagenes/das.png')">
                <i class="ai-dashboard"></i>
                <span>Dashboard</span>
              </button>
                <button onclick="cargarContenido('<?= base_url('productos/') ?>')">
                    <i class="ai-shipping-box-v1"></i>
                    <span>Productos</span>
                </button>
                <button onclick="cargarContenido('<?= base_url('usuarios/') ?>')">
                <i class="ai-person"></i>
                <span>Rol</span>
                <button onclick="cargarContenido('<?= base_url('dashboard/usuarios/') ?>')">
                <i class="ai-person"></i>
                <span>Usuarios</span>
              </button>
              <button onclick="cargarContenido('error500.html')">
                <i class="ai-open-envelope"></i>
                <span>Mensajes</span>
              </button>
              <button onclick="cargarContenido('error500.html')">
                <i class="ai-data"></i>
                <span>Inventario</span>
              </button>
              <button id="toggleLock"><i class="bx bx-lock-open"></i></button>
              </nav>
            </div>
            </div>
        </aside>
      </section>
      <section id="Seccontenido">
        <!-- Aquí se carga el contenido dinámico -->
        <div class="text-center mt-5">
          <h2>Bienvenido al Dashboard</h2>
          <p>Selecciona una opción del menú para comenzar</p>
        </div>
      </section>
    </main>


<script>
// Función para resaltar el botón activo
function setActiveButton(activeButton) {
    const buttons = document.querySelectorAll('nav button');
    buttons.forEach(button => {
        button.classList.remove('active');
    });
    activeButton.classList.add('active');
}


// Mejorar la función cargarContenido para el dashboard
function cargarContenidoDashboard(url, button) {
    setActiveButton(button);
    cargarContenido(url);
}
</script>


 <?= $this->endSection(); ?>
