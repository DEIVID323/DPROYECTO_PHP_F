<?php  echo $this->extend('plantilla/layout_login'); ?>
<?php echo $this->section('contenido'); ?>
</head>
  <body>
      <div class="container">
          <div class="form-box login">
              <form form action="<?= base_url('inicio/validarLogin') ?>" method="post">

                  <h1>INICIAR SESION</h1>
                  <div class="input-box">
                      <input type="text" name="correo" placeholder="INGRESAR USUARIO" required>
                      <i class='bx bxs-user'></i>
                  </div>
                  <div class="input-box">
                      <input type="password" name="contrasena" placeholder="INGRESAR CONTRASEÑA" required>
                      <i class='bx bxs-lock-alt'></i>
                  </div>
                  <div class="forgot-link">
                      <a href="#">HAS OLVIDADO TU CONTRASEÑA?</a>
                  </div>
                  <button>
                    <span type="submit" class="btn">INICIAR SESION</span>
                  </button>
                  <p>INICIAR CON </p>
                  <div class="social-icons">
                      <a href="https://accounts.google.com/v3/signin/identifier?continue=https%3A%2F%2Fmyaccount.google.com%3Futm_source%3Daccount-marketing-page%26utm_medium%3Dgo-to-account-button%26gar%3DWzEzMywiMjM2NzM2Il0%26sl%3Dtrue&ifkv=ASSHykq5inn-PoJP0uoavmf37GVt_v1dHu2RhZ5TeIzt_i7EDoYCi1yfRX4v5gxyWy21ea2rZSI&service=accountsettings&flowName=GlifWebSignIn&flowEntry=ServiceLogin&dsh=S-200254596%3A1741595888999217&ddm=1"><i class='bx bxl-google' ></i></a>
                      <a href="https://www.facebook.com/?locale=es_LA"><i class='bx bxl-facebook' ></i></a>
                      
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
                      <i class='bx bxs-lock-alt' ></i>
                  </div>
                  <button>
                    <span type="submit" class="btn">REGISTRO</span>
                </button>
            
                  
                  <p>REGISTRASE CON </p>
                  <div class="social-icons">
                      <a href="https://accounts.google.com/v3/signin/identifier?continue=https%3A%2F%2Fwww.google.com%2F%3Fhl%3Des&ec=GAZAmgQ&hl=es&ifkv=ASSHykpxGGfkyRvSZXsthsbDXMRo81xq4pU0i6a3KQ16wBFl161Latm_1aKeSpcMZS3nAQaGtwkj&passive=true&flowName=GlifWebSignIn&flowEntry=ServiceLogin&dsh=S-468179007%3A1741596139216978&ddm=1"><i class='bx bxl-google' ></i></a>
                      <a href="https://www.facebook.com/?locale=es_LA"><i class='bx bxl-facebook' ></i></a>
                  </div>
              </form>
          </div>

          <div class="toggle-box">
              <div class="toggle-panel toggle-left">
                 <h1>¡BIENVENIDO A DMC!</h1>
                  <p>NO TIENES CUENTA?</p>
                  <button>
                    <span class="btn register-btn">REGISTRARSE</span>
                  </button>
              </div>

              <div class="toggle-panel toggle-right">
                  <h1>¡BIENVENIDOS A DMC!</h1>
                  <p>YA TIENES CUENTA?</p>
                  <button>
                    <span class="btn login-btn">INICIAR SESION</span>
                  </button>
              </div>
          </div>
      </div>
<?php echo $this->endSection(); ?> 