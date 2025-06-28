<?php echo $this->extend('plantilla/layout_usuario'); ?>

<?php echo $this->section('contenido'); ?>

<div class="container-fluid">
    <!-- Page Header -->
    <div class="row mb-4">
        <div class="col-12">
            <div class="card border-0 shadow-sm bg-gradient-primary text-white">
                <div class="card-body py-4">
                    <div class="d-flex justify-content-between align-items-center flex-wrap">
                        <div class="mb-3 mb-md-0">
                            <h1 class="h2 mb-1 fw-bold">
                                <i class="bi bi-people-fill me-2"></i>
                                Gestión de Usuarios
                            </h1>
                            <p class="mb-0 opacity-75">Administra todos los usuarios del sistema</p>
                        </div>
                        <div class="d-flex align-items-center flex-wrap gap-2">
                            <span class="badge bg-light text-primary fs-6">
                                <i class="bi bi-person-check me-1"></i>
                                <?= count($usuarios) ?> usuarios
                            </span>
                            <a href="<?= base_url('usuarios/crear') ?>" 
                               class="btn btn-light btn-lg shadow-sm">
                                <i class="bi bi-person-plus-fill me-2"></i>
                                Nuevo Usuario
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
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Cerrar"></button>
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
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Cerrar"></button>
                </div>
            </div>
        </div>
    <?php endif; ?>

    <!-- Filters and Search -->
    <div class="row mb-4">
        <div class="col-12">
            <div class="card border-0 shadow-sm">
                <div class="card-body">
                    <div class="row g-3">
                        <div class="col-lg-4 col-md-6">
                            <div class="input-group">
                                <span class="input-group-text bg-light border-end-0">
                                    <i class="bi bi-search"></i>
                                </span>
                                <input type="text" class="form-control border-start-0" 
                                       id="searchInput" placeholder="Buscar usuarios...">
                            </div>
                        </div>
                        <div class="col-lg-2 col-md-6">
                            <select class="form-select" id="roleFilter">
                                <option value="">Todos los roles</option>
                                <option value="1">Administrador</option>
                                <option value="2">Usuario</option>
                                <option value="3">Moderador</option>
                            </select>
                        </div>
                        <div class="col-lg-2 col-md-6">
                            <select class="form-select" id="statusFilter">
                                <option value="">Todos los estados</option>
                                <option value="active">Activos</option>
                                <option value="inactive">Inactivos</option>
                            </select>
                        </div>
                        <div class="col-lg-2 col-md-6">
                            <button class="btn btn-outline-secondary w-100" onclick="clearFilters()">
                                <i class="bi bi-arrow-clockwise me-1"></i>
                                Limpiar
                            </button>
                        </div>
                        <div class="col-lg-2 col-md-12">
                            <div class="btn-group w-100" role="group" aria-label="Vista">
                                <button type="button" class="btn btn-outline-secondary active" id="viewTable">
                                    <i class="bi bi-table"></i>
                                </button>
                                <button type="button" class="btn btn-outline-secondary" id="viewGrid">
                                    <i class="bi bi-grid-3x3-gap"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bulk Actions (Hidden by default) -->
    <div id="bulkActions" class="row mb-3 d-none">
        <div class="col-12">
            <div class="card border-warning bg-warning bg-opacity-10">
                <div class="card-body py-3">
                    <div class="d-flex justify-content-between align-items-center flex-wrap">
                        <span class="text-warning fw-semibold mb-2 mb-md-0">
                            <i class="bi bi-info-circle me-1"></i>
                            <span id="selectedCount">0</span> usuarios seleccionados
                        </span>
                        <div class="btn-group" role="group">
                            <button class="btn btn-outline-warning btn-sm">
                                <i class="bi bi-download me-1"></i>Exportar
                            </button>
                            <button class="btn btn-outline-danger btn-sm" onclick="bulkDelete()">
                                <i class="bi bi-trash me-1"></i>Eliminar
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Users Table/Grid -->
    <div class="row">
        <div class="col-12">
            <div class="card border-0 shadow-sm">
                <div class="card-header bg-white border-bottom py-3">
                    <div class="d-flex justify-content-between align-items-center">
                        <h5 class="mb-0 text-muted fw-semibold">
                            <i class="bi bi-table me-2"></i>
                            Lista de Usuarios
                        </h5>
                        <small class="text-muted">
                            Total: <strong><?= count($usuarios) ?></strong> usuarios
                        </small>
                    </div>
                </div>
                
                <div class="card-body p-0">
                    <!-- Table View -->
                    <div id="tableView">
                        <div class="table-responsive">
                            <table class="table table-hover align-middle mb-0" id="usersTable">
                                <thead class="table-dark">
                                    <tr>
                                        <th class="border-0 py-3" style="width: 50px;">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" id="selectAll">
                                            </div>
                                        </th>
                                        <th class="border-0 py-3" style="width: 80px;">
                                            <i class="bi bi-hash me-1"></i>ID
                                        </th>
                                        <th class="border-0 py-3">
                                            <i class="bi bi-person me-1"></i>Usuario
                                        </th>
                                        <th class="border-0 py-3">
                                            <i class="bi bi-envelope me-1"></i>Correo
                                        </th>
                                        <th class="border-0 py-3 d-none d-lg-table-cell">
                                            <i class="bi bi-geo-alt me-1"></i>Dirección
                                        </th>
                                        <th class="border-0 py-3 d-none d-md-table-cell">
                                            <i class="bi bi-telephone me-1"></i>Teléfono
                                        </th>
                                        <th class="border-0 py-3 d-none d-lg-table-cell">
                                            <i class="bi bi-calendar me-1"></i>Registro
                                        </th>
                                        <th class="border-0 py-3">
                                            <i class="bi bi-shield me-1"></i>Rol
                                        </th>
                                        <th class="border-0 py-3 text-center" style="width: 150px;">
                                            <i class="bi bi-gear me-1"></i>Acciones
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($usuarios as $usuario): ?>
                                    <tr class="user-row">
                                        <td>
                                            <div class="form-check">
                                                <input class="form-check-input user-checkbox" type="checkbox" 
                                                       value="<?= $usuario['idUsuario'] ?>">
                                            </div>
                                        </td>
                                        <td>
                                            <span class="badge bg-light text-dark fs-6 fw-semibold">
                                                #<?= str_pad($usuario['idUsuario'], 3, '0', STR_PAD_LEFT) ?>
                                            </span>
                                        </td>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <div class="avatar-sm bg-primary text-white rounded-circle d-flex align-items-center justify-content-center me-3 flex-shrink-0" style="width: 40px; height: 40px;">
                                                    <i class="bi bi-person-fill"></i>
                                                </div>
                                                <div class="min-w-0">
                                                    <div class="fw-semibold text-dark text-truncate">
                                                        <?= $usuario['Nombre'] ?> <?= $usuario['Apellido'] ?>
                                                    </div>
                                                    <small class="text-muted">Usuario registrado</small>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <span class="text-primary fw-medium text-truncate d-block" style="max-width: 200px;">
                                                <?= $usuario['Correo'] ?>
                                            </span>
                                        </td>
                                        <td class="d-none d-lg-table-cell">
                                            <span class="text-muted text-truncate d-block" style="max-width: 150px;">
                                                <?= !empty($usuario['Direccion']) ? $usuario['Direccion'] : '<em>No especificada</em>' ?>
                                            </span>
                                        </td>
                                        <td class="d-none d-md-table-cell">
                                            <span class="text-muted">
                                                <?= !empty($usuario['Telefono']) ? $usuario['Telefono'] : '<em>No registrado</em>' ?>
                                            </span>
                                        </td>
                                        <td class="d-none d-lg-table-cell">
                                            <span class="badge bg-info bg-opacity-10 text-info border border-info">
                                                <i class="bi bi-calendar-event me-1"></i>
                                                <?= date('d/m/Y', strtotime($usuario['Fecha_registro'])) ?>
                                            </span>
                                        </td>
                                        <td>
                                            <?php
                                            $roleClass = match($usuario['Rol_idRol']) {
                                                '1' => 'bg-danger',
                                                '2' => 'bg-primary',
                                                '3' => 'bg-warning text-dark',
                                                default => 'bg-secondary'
                                            };
                                            $roleName = match($usuario['Rol_idRol']) {
                                                '1' => 'Admin',
                                                '2' => 'Usuario',
                                                '3' => 'Moderador',
                                                default => 'Sin rol'
                                            };
                                            ?>
                                            <span class="badge <?= $roleClass ?> px-2 py-1">
                                                <i class="bi bi-shield-fill me-1"></i>
                                                <?= $roleName ?>
                                            </span>
                                        </td>
                                        <td>
                                            <div class="d-flex justify-content-center gap-1">
                                                <button class="btn btn-outline-info btn-sm" 
                                                        data-bs-toggle="tooltip" 
                                                        data-bs-placement="top" 
                                                        title="Ver detalles"
                                                        onclick="viewUser(<?= $usuario['idUsuario'] ?>)">
                                                    <i class="bi bi-eye"></i>
                                                </button>
                                                <a href="<?= base_url('usuarios/editar/' . $usuario['idUsuario']) ?>"
                                                   class="btn btn-outline-primary btn-sm"
                                                   data-bs-toggle="tooltip" 
                                                   data-bs-placement="top" 
                                                   title="Editar usuario">
                                                    <i class="bi bi-pencil"></i>
                                                </a>
                                                <button class="btn btn-outline-danger btn-sm"
                                                        onclick="confirmDelete(<?= $usuario['idUsuario'] ?>, '<?= addslashes($usuario['Nombre'] . ' ' . $usuario['Apellido']) ?>')"
                                                        data-bs-toggle="tooltip" 
                                                        data-bs-placement="top" 
                                                        title="Eliminar usuario">
                                                    <i class="bi bi-trash"></i>
                                                </button>
                                            </div>
                                        </td>
                                    </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <!-- Grid View (Hidden by default) -->
                    <div id="gridView" class="d-none">
                        <div class="row g-4 p-4">
                            <?php foreach ($usuarios as $usuario): ?>
                            <div class="col-xl-3 col-lg-4 col-md-6">
                                <div class="card h-100 border-0 shadow-sm hover-card">
                                    <div class="card-body">
                                        <div class="d-flex align-items-center mb-3">
                                            <div class="avatar-lg bg-primary text-white rounded-circle d-flex align-items-center justify-content-center me-3 flex-shrink-0" style="width: 50px; height: 50px;">
                                                <i class="bi bi-person-fill fs-5"></i>
                                            </div>
                                            <div class="min-w-0">
                                                <h6 class="mb-1 fw-semibold text-truncate">
                                                    <?= $usuario['Nombre'] ?> <?= $usuario['Apellido'] ?>
                                                </h6>
                                                <small class="text-muted">ID: #<?= $usuario['idUsuario'] ?></small>
                                            </div>
                                        </div>
                                        
                                        <div class="mb-3">
                                            <div class="d-flex align-items-center mb-2">
                                                <i class="bi bi-envelope text-muted me-2 flex-shrink-0"></i>
                                                <small class="text-muted text-truncate"><?= $usuario['Correo'] ?></small>
                                            </div>
                                            <div class="d-flex align-items-center mb-2">
                                                <i class="bi bi-telephone text-muted me-2 flex-shrink-0"></i>
                                                <small class="text-muted text-truncate">
                                                    <?= !empty($usuario['Telefono']) ? $usuario['Telefono'] : 'No registrado' ?>
                                                </small>
                                            </div>
                                            <div class="d-flex align-items-center">
                                                <i class="bi bi-calendar text-muted me-2 flex-shrink-0"></i>
                                                <small class="text-muted"><?= date('d/m/Y', strtotime($usuario['Fecha_registro'])) ?></small>
                                            </div>
                                        </div>

                                        <div class="d-flex justify-content-between align-items-center">
                                            <?php
                                            $roleClass = match($usuario['Rol_idRol']) {
                                                '1' => 'bg-danger',
                                                '2' => 'bg-primary',
                                                '3' => 'bg-warning text-dark',
                                                default => 'bg-secondary'
                                            };
                                            $roleName = match($usuario['Rol_idRol']) {
                                                '1' => 'Admin',
                                                '2' => 'Usuario',
                                                '3' => 'Moderador',
                                                default => 'Sin rol'
                                            };
                                            ?>
                                            <span class="badge <?= $roleClass ?> px-2 py-1">
                                                <?= $roleName ?>
                                            </span>
                                            
                                            <div class="btn-group" role="group">
                                                <button class="btn btn-outline-info btn-sm" 
                                                        title="Ver"
                                                        onclick="viewUser(<?= $usuario['idUsuario'] ?>)">
                                                    <i class="bi bi-eye"></i>
                                                </button>
                                                <a href="<?= base_url('usuarios/editar/' . $usuario['idUsuario']) ?>"
                                                   class="btn btn-outline-primary btn-sm" title="Editar">
                                                    <i class="bi bi-pencil"></i>
                                                </a>
                                                <button class="btn btn-outline-danger btn-sm"
                                                        onclick="confirmDelete(<?= $usuario['idUsuario'] ?>, '<?= addslashes($usuario['Nombre'] . ' ' . $usuario['Apellido']) ?>')"
                                                        title="Eliminar">
                                                    <i class="bi bi-trash"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>

                <!-- Card Footer with Pagination -->
                <div class="card-footer bg-white border-top">
                    <div class="d-flex justify-content-between align-items-center flex-wrap">
                        <div class="text-muted mb-2 mb-md-0">
                            Mostrando <strong><?= count($usuarios) ?></strong> usuarios
                        </div>
                        <nav aria-label="Navegación de páginas">
                            <ul class="pagination pagination-sm mb-0">
                                <li class="page-item disabled">
                                    <span class="page-link">Anterior</span>
                                </li>
                                <li class="page-item active">
                                    <span class="page-link">1</span>
                                </li>
                                <li class="page-item">
                                    <a class="page-link" href="#">2</a>
                                </li>
                                <li class="page-item">
                                    <a class="page-link" href="#">3</a>
                                </li>
                                <li class="page-item">
                                    <a class="page-link" href="#">Siguiente</a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Delete Confirmation Modal - FUERA del container principal -->
<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border-0 shadow">
            <div class="modal-header bg-danger text-white border-0">
                <h5 class="modal-title" id="deleteModalLabel">
                    <i class="bi bi-exclamation-triangle me-2"></i>
                    Confirmar Eliminación
                </h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Cerrar"></button>
            </div>
            <div class="modal-body text-center py-4">
                <div class="mb-3">
                    <i class="bi bi-person-x display-1 text-danger"></i>
                </div>
                <h5 class="mb-3">¿Estás seguro de eliminar este usuario?</h5>
                <p class="mb-2"><strong id="deleteUserName"></strong></p>
                <small class="text-muted">Esta acción no se puede deshacer.</small>
            </div>
            <div class="modal-footer border-0 justify-content-center">
                <button type="button" class="btn btn-secondary px-4" data-bs-dismiss="modal">
                    <i class="bi bi-x-circle me-1"></i>
                    Cancelar
                </button>
                <a id="confirmDeleteBtn" class="btn btn-danger px-4">
                    <i class="bi bi-trash me-1"></i>
                    Eliminar Usuario
                </a>
            </div>
        </div>
    </div>
</div>

<!-- User Details Modal -->
<div class="modal fade" id="userDetailsModal" tabindex="-1" aria-labelledby="userDetailsModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content border-0 shadow">
            <div class="modal-header bg-primary text-white border-0">
                <h5 class="modal-title" id="userDetailsModalLabel">
                    <i class="bi bi-person-circle me-2"></i>
                    Detalles del Usuario
                </h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Cerrar"></button>
            </div>
            <div class="modal-body" id="userDetailsContent">
                <!-- Content will be loaded dynamically -->
                <div class="text-center py-4">
                    <div class="spinner-border text-primary" role="status">
                        <span class="visually-hidden">Cargando...</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
// JavaScript functions
function confirmDelete(userId, userName) {
    document.getElementById('deleteUserName').textContent = userName;
    document.getElementById('confirmDeleteBtn').href = '<?= base_url('usuarios/eliminar/') ?>' + userId;
    
    const deleteModal = new bootstrap.Modal(document.getElementById('deleteModal'));
    deleteModal.show();
}

function viewUser(userId) {
    const userDetailsModal = new bootstrap.Modal(document.getElementById('userDetailsModal'));
    userDetailsModal.show();
    
    // Here you would typically load user details via AJAX
    // For now, just show a placeholder
    document.getElementById('userDetailsContent').innerHTML = `
        <div class="text-center py-4">
            <p>Cargando detalles del usuario ID: ${userId}</p>
        </div>
    `;
}

function clearFilters() {
    document.getElementById('searchInput').value = '';
    document.getElementById('roleFilter').value = '';
    document.getElementById('statusFilter').value = '';
}

function bulkDelete() {
    const selectedUsers = document.querySelectorAll('.user-checkbox:checked');
    if (selectedUsers.length === 0) {
        alert('Por favor selecciona al menos un usuario');
        return;
    }
    
    if (confirm(`¿Estás seguro de eliminar ${selectedUsers.length} usuarios?`)) {
        // Implement bulk delete logic here
        console.log('Bulk delete:', selectedUsers);
    }
}

// View toggle functionality
document.getElementById('viewTable').addEventListener('click', function() {
    document.getElementById('tableView').classList.remove('d-none');
    document.getElementById('gridView').classList.add('d-none');
    this.classList.add('active');
    document.getElementById('viewGrid').classList.remove('active');
});

document.getElementById('viewGrid').addEventListener('click', function() {
    document.getElementById('gridView').classList.remove('d-none');
    document.getElementById('tableView').classList.add('d-none');
    this.classList.add('active');
    document.getElementById('viewTable').classList.remove('active');
});

// Select all functionality
document.getElementById('selectAll').addEventListener('change', function() {
    const checkboxes = document.querySelectorAll('.user-checkbox');
    checkboxes.forEach(checkbox => {
        checkbox.checked = this.checked;
    });
    updateBulkActions();
});

// Individual checkbox functionality
document.querySelectorAll('.user-checkbox').forEach(checkbox => {
    checkbox.addEventListener('change', updateBulkActions);
});

function updateBulkActions() {
    const selectedCheckboxes = document.querySelectorAll('.user-checkbox:checked');
    const bulkActions = document.getElementById('bulkActions');
    const selectedCount = document.getElementById('selectedCount');
    
    if (selectedCheckboxes.length > 0) {
        bulkActions.classList.remove('d-none');
        selectedCount.textContent = selectedCheckboxes.length;
    } else {
        bulkActions.classList.add('d-none');
    }
}

// Initialize tooltips
document.addEventListener('DOMContentLoaded', function() {
    const tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
    const tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
        return new bootstrap.Tooltip(tooltipTriggerEl);
    });
});
</script>

<style>
.hover-card {
    transition: transform 0.2s ease-in-out, box-shadow 0.2s ease-in-out;
}

.hover-card:hover {
    transform: translateY(-2px);
    box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.15) !important;
}

.avatar-sm {
    width: 40px;
    height: 40px;
}

.avatar-lg {
    width: 50px;
    height: 50px;
}

.min-w-0 {
    min-width: 0;
}

.text-truncate {
    overflow: hidden;
    text-overflow: ellipsis;
    white-space: nowrap;
}

@media (max-width: 768px) {
    .table-responsive {
        font-size: 0.875rem;
    }
    
    .btn-group .btn {
        padding: 0.25rem 0.5rem;
    }
}
</style>

<?php echo $this->endSection(); ?>
