<?php echo $this->extend('plantilla/layout_usuario'); ?>
<?php echo $this->section('contenido'); ?>

<!-- Page Header -->
<div class="container-fluid">
    <div class="row mb-4">
        <div class="col-12">
            <div class="card border-0 shadow-sm bg-gradient-primary text-white">
                <div class="card-body py-4">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h1 class="h2 mb-1 fw-bold">
                                <i class="bi bi-person-plus-fill me-2"></i>
                                Crear Nuevo Usuario
                            </h1>
                            <p class="mb-0 opacity-75">Registra un nuevo usuario en el sistema</p>
                        </div>
                        <div class="d-flex align-items-center">
                            <a href="<?= base_url('usuarios') ?>" 
                               class="btn btn-light btn-lg shadow-sm">
                                <i class="bi bi-arrow-left me-2"></i>
                                Volver a Usuarios
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Alerts Section -->
    <?php if (session()->has('error')): ?>
        <div class="row mb-4">
            <div class="col-12">
                <div class="alert alert-danger alert-dismissible fade show shadow-sm" role="alert">
                    <i class="bi bi-exclamation-triangle-fill me-2"></i>
                    <strong>Error:</strong> <?= session('error') ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            </div>
        </div>
    <?php endif; ?>

    <?php if (session()->has('success')): ?>
        <div class="row mb-4">
            <div class="col-12">
                <div class="alert alert-success alert-dismissible fade show shadow-sm" role="alert">
                    <i class="bi bi-check-circle-fill me-2"></i>
                    <strong>Éxito:</strong> <?= session('success') ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            </div>
        </div>
    <?php endif; ?>

    <!-- User Form -->
    <div class="row">
        <div class="col-12">
            <div class="card border-0 shadow-sm">
                <div class="card-header bg-white border-bottom-0 py-3">
                    <div class="d-flex align-items-center">
                        <div class="avatar-sm bg-primary text-white rounded-circle d-flex align-items-center justify-content-center me-3">
                            <i class="bi bi-person-fill"></i>
                        </div>
                        <div>
                            <h5 class="mb-0 text-dark fw-semibold">
                                Información del Usuario
                            </h5>
                            <small class="text-muted">Complete todos los campos requeridos</small>
                        </div>
                    </div>
                </div>
                
                <div class="card-body">
                    <form action="<?= base_url('usuarios/guardar') ?>" method="POST" id="userForm">
                        <?= csrf_field() ?>
                        
                        <!-- Basic Information Section -->
                        <div class="row mb-4">
                            <div class="col-12">
                                <div class="d-flex align-items-center mb-3">
                                    <i class="bi bi-info-circle text-primary me-2"></i>
                                    <h6 class="mb-0 text-primary fw-semibold">Información Básica</h6>
                                </div>
                                <hr class="mt-0 mb-3">
                            </div>
                        </div>

                        <div class="row g-3 mb-4">
                            <div class="col-md-6">
                                <label for="nombre" class="form-label fw-semibold">
                                    <i class="bi bi-person me-1"></i>Nombre *
                                </label>
                                <div class="input-group">
                                    <span class="input-group-text bg-light border-end-0">
                                        <i class="bi bi-person"></i>
                                    </span>
                                    <input type="text" 
                                           class="form-control border-start-0" 
                                           id="nombre" 
                                           name="nombre" 
                                           placeholder="Ingrese el nombre"
                                           required>
                                </div>
                                <small class="text-muted">Nombre descriptivo del usuario</small>
                            </div>

                            <div class="col-md-6">
                                <label for="apellido" class="form-label fw-semibold">
                                    <i class="bi bi-person me-1"></i>Apellido *
                                </label>
                                <div class="input-group">
                                    <span class="input-group-text bg-light border-end-0">
                                        <i class="bi bi-person"></i>
                                    </span>
                                    <input type="text" 
                                           class="form-control border-start-0" 
                                           id="apellido" 
                                           name="Apellido" 
                                           placeholder="Ingrese el apellido"
                                           required>
                                </div>
                                <small class="text-muted">Apellido del usuario</small>
                            </div>
                        </div>

                        <!-- Contact Information Section -->
                        <div class="row mb-4">
                            <div class="col-12">
                                <div class="d-flex align-items-center mb-3">
                                    <i class="bi bi-envelope text-primary me-2"></i>
                                    <h6 class="mb-0 text-primary fw-semibold">Información de Contacto</h6>
                                </div>
                                <hr class="mt-0 mb-3">
                            </div>
                        </div>

                        <div class="row g-3 mb-4">
                            <div class="col-md-6">
                                <label for="correo" class="form-label fw-semibold">
                                    <i class="bi bi-envelope me-1"></i>Correo Electrónico *
                                </label>
                                <div class="input-group">
                                    <span class="input-group-text bg-light border-end-0">
                                        <i class="bi bi-envelope"></i>
                                    </span>
                                    <input type="email" 
                                           class="form-control border-start-0" 
                                           id="correo" 
                                           name="Correo" 
                                           placeholder="ejemplo@correo.com"
                                           required>
                                </div>
                                <small class="text-muted">Dirección de correo electrónico válida</small>
                            </div>

                            <div class="col-md-6">
                                <label for="telefono" class="form-label fw-semibold">
                                    <i class="bi bi-telephone me-1"></i>Teléfono
                                </label>
                                <div class="input-group">
                                    <span class="input-group-text bg-light border-end-0">
                                        <i class="bi bi-telephone"></i>
                                    </span>
                                    <input type="tel" 
                                           class="form-control border-start-0" 
                                           id="telefono" 
                                           name="Telefono" 
                                           placeholder="(+57) 300 123 4567">
                                </div>
                                <small class="text-muted">Número de teléfono (opcional)</small>
                            </div>
                        </div>

                        <div class="row g-3 mb-4">
                            <div class="col-12">
                                <label for="direccion" class="form-label fw-semibold">
                                    <i class="bi bi-geo-alt me-1"></i>Dirección
                                </label>
                                <div class="input-group">
                                    <span class="input-group-text bg-light border-end-0">
                                        <i class="bi bi-geo-alt"></i>
                                    </span>
                                    <input type="text" 
                                           class="form-control border-start-0" 
                                           id="direccion" 
                                           name="Direccion" 
                                           placeholder="Ingrese la dirección completa">
                                </div>
                                <small class="text-muted">Dirección completa del usuario (opcional)</small>
                            </div>
                        </div>

                        <!-- Security Section -->
                        <div class="row mb-4">
                            <div class="col-12">
                                <div class="d-flex align-items-center mb-3">
                                    <i class="bi bi-shield-lock text-primary me-2"></i>
                                    <h6 class="mb-0 text-primary fw-semibold">Seguridad y Acceso</h6>
                                </div>
                                <hr class="mt-0 mb-3">
                            </div>
                        </div>

                        <div class="row g-3 mb-4">
                            <div class="col-md-6">
                                <label for="password" class="form-label fw-semibold">
                                    <i class="bi bi-key me-1"></i>Contraseña *
                                </label>
                                <div class="input-group">
                                    <span class="input-group-text bg-light border-end-0">
                                        <i class="bi bi-key"></i>
                                    </span>
                                    <input type="password" 
                                           class="form-control border-start-0" 
                                           id="password" 
                                           name="Controsena" 
                                           placeholder="Ingrese la contraseña"
                                           required>
                                    <button class="btn btn-outline-secondary" type="button" id="togglePassword">
                                        <i class="bi bi-eye"></i>
                                    </button>
                                </div>
                                <small class="text-muted">Mínimo 8 caracteres, incluya números y letras</small>
                            </div>

                            <div class="col-md-6">
                                <label for="confirm_password" class="form-label fw-semibold">
                                    <i class="bi bi-key me-1"></i>Confirmar Contraseña *
                                </label>
                                <div class="input-group">
                                    <span class="input-group-text bg-light border-end-0">
                                        <i class="bi bi-key"></i>
                                    </span>
                                    <input type="password" 
                                           class="form-control border-start-0" 
                                           id="confirm_password" 
                                           name="Contrasena" 
                                           placeholder="Confirme la contraseña"
                                           required>
                                    <button class="btn btn-outline-secondary" type="button" id="toggleConfirmPassword">
                                        <i class="bi bi-eye"></i>
                                    </button>
                                </div>
                                <small class="text-muted">Debe coincidir con la contraseña anterior</small>
                            </div>
                        </div>

                        <div class="row g-3 mb-4">
                            <div class="col-md-6">
                                <label for="rol" class="form-label fw-semibold">
                                    <i class="bi bi-shield me-1"></i>Rol del Usuario *
                                </label>
                                <div class="input-group">
                                    <span class="input-group-text bg-light border-end-0">
                                        <i class="bi bi-shield"></i>
                                    </span>
                                    <select class="form-select border-start-0" id="rol" name="Rol_idRol" required>
                                        <option value="">Seleccione un rol</option>
                                        <option value="1">Administrador</option>
                                        <option value="2">Usuario</option>
                                        <option value="3">Moderador</option>
                                    </select>
                                </div>
                                <small class="text-muted">Permisos y nivel de acceso del usuario</small>
                            </div>

                            <div class="col-md-6">
                                <label for="estado" class="form-label fw-semibold">
                                    <i class="bi bi-toggle-on me-1"></i>Estado
                                </label>
                                <div class="input-group">
                                    <span class="input-group-text bg-light border-end-0">
                                        <i class="bi bi-toggle-on"></i>
                                    </span>
                                    <select class="form-select border-start-0" id="estado" name="estado">
                                        <option value="1">Activo</option>
                                        <option value="0">Inactivo</option>
                                    </select>
                                </div>
                                <small class="text-muted">Estado inicial del usuario</small>
                            </div>
                        </div>

                        <!-- Form Actions -->
                        <div class="row">
                            <div class="col-12">
                                <hr class="my-4">
                                <div class="d-flex justify-content-end gap-2">
                                    <a href="<?= base_url('usuarios') ?>" class="btn btn-outline-secondary btn-lg">
                                        <i class="bi bi-x-circle me-2"></i>
                                        Cancelar
                                    </a>
                                    <button type="reset" class="btn btn-outline-warning btn-lg">
                                        <i class="bi bi-arrow-clockwise me-2"></i>
                                        Limpiar
                                    </button>
                                    <button type="submit" class="btn btn-primary btn-lg shadow-sm">
                                        <i class="bi bi-person-plus-fill me-2"></i>
                                        Crear Usuario
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Information Card -->
    <div class="row mt-4">
        <div class="col-12">
            <div class="card border-0 shadow-sm bg-light">
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col-md-8">
                            <div class="d-flex align-items-center">
                                <i class="bi bi-info-circle text-primary fs-4 me-3"></i>
                                <div>
                                    <h6 class="mb-1 fw-semibold">Información Importante</h6>
                                    <p class="mb-0 text-muted">
                                        Los campos marcados con (*) son obligatorios. 
                                        El usuario recibirá un correo de confirmación con sus credenciales.
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 text-end">
                            <div class="d-flex align-items-center justify-content-end">
                                <i class="bi bi-shield-check text-success me-2"></i>
                                <small class="text-success fw-semibold">Datos Seguros</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- JavaScript for Form Interactions -->
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Toggle password visibility
    const togglePassword = document.getElementById('togglePassword');
    const password = document.getElementById('password');
    const toggleConfirmPassword = document.getElementById('toggleConfirmPassword');
    const confirmPassword = document.getElementById('confirm_password');

    togglePassword.addEventListener('click', function() {
        const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
        password.setAttribute('type', type);
        this.innerHTML = type === 'password' ? '<i class="bi bi-eye"></i>' : '<i class="bi bi-eye-slash"></i>';
    });

    toggleConfirmPassword.addEventListener('click', function() {
        const type = confirmPassword.getAttribute('type') === 'password' ? 'text' : 'password';
        confirmPassword.setAttribute('type', type);
        this.innerHTML = type === 'password' ? '<i class="bi bi-eye"></i>' : '<i class="bi bi-eye-slash"></i>';
    });

    // Password confirmation validation
    confirmPassword.addEventListener('input', function() {
        if (this.value !== password.value) {
            this.setCustomValidity('Las contraseñas no coinciden');
            this.classList.add('is-invalid');
        } else {
            this.setCustomValidity('');
            this.classList.remove('is-invalid');
            this.classList.add('is-valid');
        }
    });

    // Form validation
    const form = document.getElementById('userForm');
    form.addEventListener('submit', function(e) {
        if (!form.checkValidity()) {
            e.preventDefault();
            e.stopPropagation();
        }
        form.classList.add('was-validated');
    });

    // Real-time validation feedback
    const inputs = form.querySelectorAll('input[required], select[required]');
    inputs.forEach(input => {
        input.addEventListener('blur', function() {
            if (this.checkValidity()) {
                this.classList.remove('is-invalid');
                this.classList.add('is-valid');
            } else {
                this.classList.remove('is-valid');
                this.classList.add('is-invalid');
            }
        });
    });
});
</script>

<style>
.bg-gradient-primary {
    background: linear-gradient(135deg, #6f42c1 0%, #007bff 100%) !important;
}

.avatar-sm {
    width: 40px;
    height: 40px;
    font-size: 0.875rem;
}

.input-group-text {
    border-color: #dee2e6;
}

.form-control:focus {
    border-color: #80bdff;
    box-shadow: 0 0 0 0.2rem rgba(0,123,255,.25);
}

.btn {
    transition: all 0.2s ease;
}

.btn:hover {
    transform: translateY(-1px);
}

.card {
    transition: all 0.3s ease;
}

.is-valid {
    border-color: #28a745;
}

.is-invalid {
    border-color: #dc3545;
}

@media (max-width: 768px) {
    .d-flex.justify-content-between {
        flex-direction: column;
        gap: 1rem;
    }
    
    .btn-group {
        justify-content: center;
    }
    
    .d-flex.justify-content-end {
        flex-direction: column;
        gap: 0.5rem;
    }
}
</style>

<?php echo $this->endSection(); ?>