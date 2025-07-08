<?php echo $this->extend('plantilla/layout_usuario'); ?>
<?php echo $this->section('contenido'); ?>

<div class="container-fluid">
    <div class="row mb-4">
        <div class="col-12">
            <div class="card border-0 shadow-sm bg-gradient-primary text-white">
                <div class="card-body py-4">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h1 class="h2 mb-1 fw-bold">
                                <i class="bi bi-person-gear me-2"></i> Editar Usuario
                            </h1>
                            <p class="mb-0 opacity-75">Modifica la información del usuario seleccionado</p>
                        </div>
                        <div class="d-flex align-items-center gap-2">
                            <span class="badge bg-light text-primary fs-6">
                                <i class="bi bi-hash me-1"></i> ID: <?= $usuario['idUsuario'] ?>
                            </span>
                            <a href="<?= base_url('usuarios') ?>" class="btn btn-light btn-lg shadow-sm">
                                <i class="bi bi-arrow-left me-2"></i> Volver a Usuarios
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php if (session()->has('error')): ?>
    <div class="alert alert-danger alert-dismissible fade show shadow-sm">
        <strong>Error:</strong> <?= session('error') ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
    <?php endif; ?>

    <?php if (session()->has('success')): ?>
    <div class="alert alert-success alert-dismissible fade show shadow-sm">
        <strong>Éxito:</strong> <?= session('success') ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
    <?php endif; ?>

    <div class="card border-0 shadow-sm mb-4 bg-light">
        <div class="card-body">
            <div class="d-flex align-items-center">
                <div class="avatar-lg bg-primary text-white rounded-circle d-flex align-items-center justify-content-center me-3">
                    <i class="bi bi-person-fill fs-4"></i>
                </div>
                <div>
                    <h5 class="mb-1 fw-semibold"><?= $usuario['Nombre'] ?> <?= $usuario['Apellido'] ?></h5>
                    <p class="mb-0 text-muted">
                        <i class="bi bi-envelope me-1"></i><?= $usuario['Correo'] ?> 
                        <span class="mx-2">•</span>
                        <i class="bi bi-calendar me-1"></i>Registrado: <?= date('d/m/Y', strtotime($usuario['Fecha_registro'])) ?>
                    </p>
                </div>
            </div>
        </div>
    </div>

    <form action="<?= base_url('usuarios/actualizar/' . $usuario['idUsuario']) ?>" method="POST" id="editUserForm">
        <?= csrf_field() ?>

        <div class="row g-3 mb-4">
            <div class="col-md-6">
                <label for="nombre" class="form-label fw-semibold">Nombre *</label>
                <input type="text" class="form-control" id="nombre" name="Nombre" value="<?= $usuario['Nombre'] ?>" required>
            </div>

            <div class="col-md-6">
                <label for="apellido" class="form-label fw-semibold">Apellido *</label>
                <input type="text" class="form-control" id="apellido" name="Apellido" value="<?= $usuario['Apellido'] ?>" required>
            </div>
        </div>

        <div class="row g-3 mb-4">
            <div class="col-md-6">
                <label for="correo" class="form-label fw-semibold">Correo Electrónico *</label>
                <input type="email" class="form-control" id="correo" name="Correo" value="<?= $usuario['Correo'] ?>" required>
            </div>

            <div class="col-md-6">
                <label for="telefono" class="form-label fw-semibold">Teléfono</label>
                <input type="tel" class="form-control" id="telefono" name="Telefono" value="<?= $usuario['Telefono'] ?>">
            </div>
        </div>

        <div class="mb-4">
            <label for="direccion" class="form-label fw-semibold">Dirección</label>
            <input type="text" class="form-control" id="direccion" name="Direccion" value="<?= $usuario['Direccion'] ?>">
        </div>

        <div class="alert alert-info">
            Deja los campos de contraseña en blanco si no deseas modificarla.
        </div>

        <div class="row g-3 mb-4">
            <div class="col-md-6">
                <label for="password" class="form-label fw-semibold">Nueva Contraseña</label>
                <input type="password" class="form-control" id="password" name="Contrasena">
            </div>
            <div class="col-md-6">
                <label for="confirm_password" class="form-label fw-semibold">Confirmar Nueva Contraseña</label>
                <input type="password" class="form-control" id="confirm_password" name="Contrasena_confirm">
            </div>
        </div>

        <div class="mb-4">
            <label for="rol" class="form-label fw-semibold">Rol del Usuario *</label>
            <select class="form-select" id="rol" name="Rol_idRol" required>
                <option value="">Seleccione un rol</option>
                <option value="1" <?= $usuario['Rol_idRol'] == '1' ? 'selected' : '' ?>>Administrador</option>
                <option value="2" <?= $usuario['Rol_idRol'] == '2' ? 'selected' : '' ?>>Usuario</option>
                <option value="3" <?= $usuario['Rol_idRol'] == '3' ? 'selected' : '' ?>>Moderador</option>
            </select>
        </div>

        <div class="d-flex justify-content-end gap-2">
            <a href="<?= base_url('usuarios') ?>" class="btn btn-outline-secondary">Cancelar</a>
            <button type="submit" class="btn btn-primary">Actualizar Usuario</button>
        </div>
    </form>

    <div class="card border-0 shadow-sm mt-4">
        <div class="card-header bg-white">
            <h5 class="mb-0 text-muted"><i class="bi bi-clock-history me-2"></i> Registro de Actividad</h5>
        </div>
        <div class="card-body">
            <div>
                <p class="mb-1"><strong>Registrado:</strong> <?= date('d/m/Y H:i:s', strtotime($usuario['Fecha_registro'])) ?></p>
                <p class="mb-0"><strong>Editando:</strong> Ahora</p>
            </div>
        </div>
    </div>

</div>




<!-- JavaScript for Form Interactions -->
<script>

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