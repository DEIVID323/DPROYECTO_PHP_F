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
                                <i class="bi bi-person-gear me-2"></i>
                                Editar Usuario
                            </h1>
                            <p class="mb-0 opacity-75">Modifica la información del usuario seleccionado</p>
                        </div>
                        <div class="d-flex align-items-center gap-2">
                            <span class="badge bg-light text-primary fs-6">
                                <i class="bi bi-hash me-1"></i>
                                ID: <?= $usuario['idUsuario'] ?>
                            </span>
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

    <!-- User Info Card -->
    <div class="row mb-4">
        <div class="col-12">
            <div class="card border-0 shadow-sm bg-light">
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col-md-8">
                            <div class="d-flex align-items-center">
                                <div class="avatar-lg bg-primary text-white rounded-circle d-flex align-items-center justify-content-center me-3">
                                    <i class="bi bi-person-fill fs-4"></i>
                                </div>
                                <div>
                                    <h5 class="mb-1 fw-semibold">
                                        <?= $usuario['Nombre'] ?> <?= $usuario['Apellido'] ?>
                                    </h5>
                                    <p class="mb-0 text-muted">
                                        <i class="bi bi-envelope me-1"></i><?= $usuario['Correo'] ?>
                                        <span class="mx-2">•</span>
                                        <i class="bi bi-calendar me-1"></i>Registrado: <?= date('d/m/Y', strtotime($usuario['Fecha_registro'])) ?>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 text-end">
                            <div class="d-flex align-items-center justify-content-end gap-2">
                                <?php
                                $roleClass = match($usuario['Rol_idRol']) {
                                    '1' => 'bg-danger',
                                    '2' => 'bg-primary',
                                    '3' => 'bg-warning text-dark',
                                    default => 'bg-secondary'
                                };
                                $roleName = match($usuario['Rol_idRol']) {
                                    '1' => 'Administrador',
                                    '2' => 'Usuario',
                                    '3' => 'Moderador',
                                    default => 'Sin rol'
                                };
                                ?>
                                <span class="badge <?= $roleClass ?> px-3 py-2">
                                    <i class="bi bi-shield-fill me-1"></i>
                                    <?= $roleName ?>
                                </span>
                                <span class="badge <?= ($usuario['Estado'] ?? 1) == 1 ? 'bg-success' : 'bg-secondary' ?> px-3 py-2">
    <i class="bi bi-<?= ($usuario['Estado'] ?? 1) == 1 ? 'check-circle' : 'x-circle' ?>-fill me-1"></i>
    <?= ($usuario['Estado'] ?? 1) == 1 ? 'Activo' : 'Inactivo' ?>
</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Edit Form -->
    <div class="row">
        <div class="col-12">
            <div class="card border-0 shadow-sm">
                <div class="card-header bg-white border-bottom-0 py-3">
                    <div class="d-flex align-items-center">
                        <div class="avatar-sm bg-warning text-white rounded-circle d-flex align-items-center justify-content-center me-3">
                            <i class="bi bi-pencil-fill"></i>
                        </div>
                        <div>
                            <h5 class="mb-0 text-dark fw-semibold">
                                Editar Información del Usuario
                            </h5>
                            <small class="text-muted">Modifica los campos que desees actualizar</small>
                        </div>
                    </div>
                </div>
                
                <div class="card-body">
                    <form action="<?= base_url('usuarios/actualizar/' . $usuario['idUsuario']) ?>" method="POST" id="editUserForm">
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
                                           value="<?= $usuario['Nombre'] ?>"
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
                                           value="<?= $usuario['Apellido'] ?>"
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
                                           value="<?= $usuario['Correo'] ?>"
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
                                           value="<?= $usuario['Telefono'] ?>"
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
                                           value="<?= $usuario['Direccion'] ?>"
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
                            <div class="col-12">
                                <div class="alert alert-info border-0 shadow-sm">
                                    <div class="d-flex align-items-center">
                                        <i class="bi bi-info-circle me-2"></i>
                                        <div>
                                            <strong>Cambio de Contraseña:</strong> Deja los campos vacíos si no deseas modificar la contraseña actual.
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row g-3 mb-4">
                            <div class="col-md-6">
                                <label for="password" class="form-label fw-semibold">
                                    <i class="bi bi-key me-1"></i>Nueva Contraseña
                                </label>
                                <div class="input-group">
                                    <span class="input-group-text bg-light border-end-0">
                                        <i class="bi bi-key"></i>
                                    </span>
                                    <input type="password" 
                                           class="form-control border-start-0" 
                                           id="password" 
                                           name="Contrasena" 
                                           placeholder="Dejar vacío para mantener actual">
                                    <button class="btn btn-outline-secondary" type="button" id="togglePassword">
                                        <i class="bi bi-eye"></i>
                                    </button>
                                </div>
                                <small class="text-muted">Mínimo 8 caracteres, incluya números y letras</small>
                            </div>

                            <div class="col-md-6">
                                <label for="confirm_password" class="form-label fw-semibold">
                                    <i class="bi bi-key me-1"></i>Confirmar Nueva Contraseña
                                </label>
                                <div class="input-group">
                                    <span class="input-group-text bg-light border-end-0">
                                        <i class="bi bi-key"></i>
                                    </span>
                                    <input type="password" 
                                           class="form-control border-start-0" 
                                           id="confirm_password" 
                                           name="Contrasena_confirm" 
                                           placeholder="Confirme la nueva contraseña">
                                    <button class="btn btn-outline-secondary" type="button" id="toggleConfirmPassword">
                                        <i class="bi bi-eye"></i>
                                    </button>
                                </div>
                                <small class="text-muted">Debe coincidir con la nueva contraseña</small>
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
                                        <option value="1" <?= $usuario['Rol_idRol'] == '1' ? 'selected' : '' ?>>Administrador</option>
                                        <option value="2" <?= $usuario['Rol_idRol'] == '2' ? 'selected' : '' ?>>Usuario</option>
                                        <option value="3" <?= $usuario['Rol_idRol'] == '3' ? 'selected' : '' ?>>Moderador</option>
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
                                    <select class="form-select border-start-0" id="estado" name="Estado">
                                        <option value="1" <?= $usuario['Estado'] == '1' ? 'selected' : '' ?>>Activo</option>
                                        <option value="0" <?= $usuario['Estado'] == '0' ? 'selected' : '' ?>>Inactivo</option>
                                    </select>
                                </div>
                                <small class="text-muted">Estado actual del usuario</small>
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
                                    <button type="button" class="btn btn-outline-info btn-lg" onclick="resetForm()">
                                        <i class="bi bi-arrow-clockwise me-2"></i>
                                        Restaurar
                                    </button>
                                    <button type="submit" class="btn btn-warning btn-lg shadow-sm">
                                        <i class="bi bi-person-gear me-2"></i>
                                        Actualizar Usuario
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Activity Log Card -->
    <div class="row mt-4">
        <div class="col-12">
            <div class="card border-0 shadow-sm">
                <div class="card-header bg-white border-bottom-0 py-3">
                    <h5 class="mb-0 text-muted fw-semibold">
                        <i class="bi bi-clock-history me-2"></i>
                        Registro de Actividad
                    </h5>
                </div>
                <div class="card-body">
                    <div class="timeline">
                        <div class="timeline-item">
                            <div class="timeline-marker bg-primary"></div>
                            <div class="timeline-content">
                                <h6 class="mb-1">Usuario Registrado</h6>
                                <p class="text-muted mb-0">
                                    <i class="bi bi-calendar me-1"></i>
                                    <?= date('d/m/Y H:i:s', strtotime($usuario['Fecha_registro'])) ?>
                                </p>
                            </div>
                        </div>
                        <div class="timeline-item">
                            <div class="timeline-marker bg-warning"></div>
                            <div class="timeline-content">
                                <h6 class="mb-1">Editando Usuario</h6>
                                <p class="text-muted mb-0">
                                    <i class="bi bi-clock me-1"></i>
                                    Ahora
                                </p>
                            </div>
                        </div>
                    </div>
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
                                        Los cambios realizados se aplicarán inmediatamente. 
                                        Si cambias el correo electrónico, el usuario recibirá una notificación.
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
    // Store original values for reset functionality
    const originalValues = {
        nombre: "<?= $usuario['Nombre'] ?>",
        apellido: "<?= $usuario['Apellido'] ?>",
        correo: "<?= $usuario['Correo'] ?>",
        telefono: "<?= $usuario['Telefono'] ?>",
        direccion: "<?= $usuario['Direccion'] ?>",
        rol: "<?= $usuario['Rol_idRol'] ?>",
        estado: "<?= $usuario['Estado'] ?>"
    };

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
        if (password.value !== '' && this.value !== password.value) {
            this.setCustomValidity('Las contraseñas no coinciden');
            this.classList.add('is-invalid');
        } else {
            this.setCustomValidity('');
            this.classList.remove('is-invalid');
            if (this.value !== '') {
                this.classList.add('is-valid');
            }
        }
    });

    // Password field validation
    password.addEventListener('input', function() {
        if (this.value !== '' && confirmPassword.value !== '' && this.value !== confirmPassword.value) {
            confirmPassword.setCustomValidity('Las contraseñas no coinciden');
            confirmPassword.classList.add('is-invalid');
        } else if (this.value === confirmPassword.value) {
            confirmPassword.setCustomValidity('');
            confirmPassword.classList.remove('is-invalid');
            if (confirmPassword.value !== '') {
                confirmPassword.classList.add('is-valid');
            }
        }
    });

    // Form validation
    const form = document.getElementById('editUserForm');
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

    // Reset form function
    window.resetForm = function() {
        // Reset to original values
        document.getElementById('nombre').value = originalValues.nombre;
        document.getElementById('apellido').value = originalValues.apellido;
        document.getElementById('correo').value = originalValues.correo;
        document.getElementById('telefono').value = originalValues.telefono;
        document.getElementById('direccion').value = originalValues.direccion;
        document.getElementById('rol').value = originalValues.rol;
        document.getElementById('estado').value = originalValues.estado;
        
        // Clear password fields
        document.getElementById('password').value = '';
        document.getElementById('confirm_password').value = '';
        
        // Remove validation classes
        form.classList.remove('was-validated');
        inputs.forEach(input => {
            input.classList.remove('is-valid', 'is-invalid');
        });
    };

    // Check for changes and show warning
    let hasChanges = false;
    
    form.addEventListener('input', function() {
        hasChanges = true;
    });
    
    form.addEventListener('change', function() {
        hasChanges = true;
    });
    
    window.addEventListener('beforeunload', function(e) {
        if (hasChanges) {
            e.preventDefault();
            e.returnValue = '';
        }
    });
    
    // Remove warning when form is submitted
    form.addEventListener('submit', function() {
        hasChanges = false;
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

.avatar-lg {
    width: 60px;
    height: 60px;
    font-size: 1.5rem;
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

.timeline {
    position: relative;
}

.timeline::before {
    content: '';
    position: absolute;
    top: 0;
    left: 10px;
    width: 2px;
    height: 100%;
    background: #dee2e6;
}

.timeline-item {
    position: relative;
    padding-left: 35px;
    margin-bottom: 1.5rem;
}

.timeline-marker {
    position: absolute;
    left: 0;
    top: 0;
    width: 20px;
    height: 20px;
    border-radius: 50%;
    border: 3px solid #fff;
    box-shadow: 0 0 0 2px #dee2e6;
}

.timeline-content h6 {
    margin-bottom: 0.25rem;
    color: #495057;
}

.timeline-content p {
    font-size: 0.875rem;
    margin-bottom: 0;
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