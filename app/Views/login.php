<?php  echo $this->extend('plantilla/layout_login'); ?>
<?php echo $this->section('contenido'); ?>
<body>
    <div class="container">
        
        <div class="form-box login">
              <form form action="<?= base_url('inicio/validarLogin') ?>" method="post">

             
                <div class="input-box">
                    <input type="text" name="correo" placeholder="INGRESAR USUARIO" required>
                    <i class='bx bxs-user'></i>
                </div>
                <div class="input-box">
                    <input type="password" name="contrasena" placeholder="INGRESAR CONTRASEÑA" required>
                    <i class='bx bxs-lock-alt'></i>
                </div>
                <div class="forgot-link">
                    <a href="#">¿HAS OLVIDADO TU CONTRASEÑA?</a>
                </div>
                <button type="submit">
                    <span class="btn">INICIAR SESION</span>
                </button>
                <p>INICIAR CON</p>
                <div class="social-icons">
                    <a href="#"><i class='bx bxl-google'></i></a>
                    <a href="#"><i class='bx bxl-facebook'></i></a>
                </div>
            </form>
        </div>

        <div class="form-box register">
              <form action="<?= base_url('auth/registrar') ?>" method="post">
                <h1>REGISTRO</h1>
                <div class="input-box">
                    <input type="text" name="nombre" placeholder="NOMBRE DE USUARIO" required>
                    <i class='bx bxs-user'></i>
                </div>
                <div class="input-box">
                    <input type="email" name="correo" placeholder="CORREO ELECTRONICO" required>
                    <i class='bx bxs-envelope'></i>
                </div>
                <div class="input-box">
                    <input type="password" name="contrasena" placeholder="CONTRASEÑA" required>
                    <i class='bx bxs-lock-alt'></i>
                </div>
                <button type="submit">
                    <span class="btn">REGISTRO</span>
                </button>
                <p>REGISTRARSE CON</p>
                <div class="social-icons">
                    <a href="#"><i class='bx bxl-google'></i></a>
                    <a href="#"><i class='bx bxl-facebook'></i></a>
                </div>
            </form>
        </div>

        <div class="toggle-box">
            <div class="toggle-panel toggle-left">
                <h1>¡BIENVENIDO A DMC!</h1>
                <p>¿NO TIENES CUENTA?</p>
                <button>
                    <span class="btn register-btn">REGISTRARSE</span>
                </button>
            </div>

            <div class="toggle-panel toggle-right">
                <h1>¡BIENVENIDOS A DMC!</h1>
                <p>¿YA TIENES CUENTA?</p>
                <button>
                    <span class="btn login-btn">INICIAR SESION</span>
                </button>
            </div>
        </div>
    </div>
<?php echo $this->endSection(); ?> 