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
                                <i class="bi bi-people-fill me-2"></i>
                                Gestión de Usuarios
                            </h1>
                            <p class="mb-0 opacity-75">Administra todos los usuarios del sistema</p>
                        </div>
                        <div class="d-flex align-items-center">
                            <span class="badge bg-light text-primary fs-6 me-3">
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

    <!-- Filters and Search -->
    <div class="row mb-4">
        <div class="col-12">
            <div class="card border-0 shadow-sm">
                <div class="card-body">
                    <div class="row g-3">
                        <div class="col-md-4">
                            <div class="input-group">
                                <span class="input-group-text bg-light border-end-0">
                                    <i class="bi bi-search"></i>
                                </span>
                                <input type="text" class="form-control border-start-0" 
                                       id="searchInput" placeholder="Buscar usuarios...">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <select class="form-select" id="roleFilter">
                                <option value="">Todos los roles</option>
                                <option value="1">Administrador</option>
                                <option value="2">Usuario</option>
                                <option value="3">Moderador</option>
                            </select>
                        </div>
                        <div class="col-md-3">
                            <select class="form-select" id="statusFilter">
                                <option value="">Todos los estados</option>
                                <option value="active">Activos</option>
                                <option value="inactive">Inactivos</option>
                            </select>
                        </div>
                        <div class="col-md-2">
                            <button class="btn btn-outline-secondary w-100" onclick="clearFilters()">
                                <i class="bi bi-arrow-clockwise me-1"></i>
                                Limpiar
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Users Table -->
    <div class="row">
        <div class="col-12">
            <div class="card border-0 shadow-sm">
                <div class="card-header bg-white border-bottom-0 py-3">
                    <div class="d-flex justify-content-between align-items-center">
                        <h5 class="mb-0 text-muted fw-semibold">
                            <i class="bi bi-table me-2"></i>
                            Lista de Usuarios
                        </h5>
                        <div class="btn-group" role="group">
                            <button type="button" class="btn btn-outline-secondary btn-sm" id="viewTable">
                                <i class="bi bi-table"></i>
                            </button>
                            <button type="button" class="btn btn-outline-secondary btn-sm" id="viewGrid">
                                <i class="bi bi-grid-3x3-gap"></i>
                            </button>
                        </div>
                    </div>
                </div>
                
                <div class="card-body p-0">
                    <!-- Table View -->
                    <div id="tableView" class="table-responsive">
                        <table class="table table-hover align-middle mb-0" id="usersTable">
                            <thead class="table-dark">
                                <tr>
                                    <th class="border-0 py-3">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="selectAll">
                                        </div>
                                    </th>
                                    <th class="border-0 py-3">
                                        <i class="bi bi-hash me-1"></i>ID
                                    </th>
                                    <th class="border-0 py-3">
                                        <i class="bi bi-person me-1"></i>Usuario
                                    </th>
                                    <th class="border-0 py-3">
                                        <i class="bi bi-envelope me-1"></i>Correo
                                    </th>
                                    <th class="border-0 py-3">
                                        <i class="bi bi-geo-alt me-1"></i>Dirección
                                    </th>
                                    <th class="border-0 py-3">
                                        <i class="bi bi-telephone me-1"></i>Teléfono
                                    </th>
                                    <th class="border-0 py-3">
                                        <i class="bi bi-calendar me-1"></i>Registro
                                    </th>
                                    <th class="border-0 py-3">
                                        <i class="bi bi-shield me-1"></i>Rol
                                    </th>
                                    <th class="border-0 py-3 text-center">
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
                                            <div class="avatar-sm bg-primary text-white rounded-circle d-flex align-items-center justify-content-center me-3">
                                                <i class="bi bi-person-fill"></i>
                                            </div>
                                            <div>
                                                <div class="fw-semibold text-dark">
                                                    <?= $usuario['Nombre'] ?> <?= $usuario['Apellido'] ?>
                                                </div>
                                                <small class="text-muted">Usuario registrado</small>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <span class="text-primary fw-medium"><?= $usuario['Correo'] ?></span>
                                    </td>
                                    <td>
                                        <span class="text-muted">
                                            <?= !empty($usuario['Direccion']) ? $usuario['Direccion'] : '<em>No especificada</em>' ?>
                                        </span>
                                    </td>
                                    <td>
                                        <span class="text-muted">
                                            <?= !empty($usuario['Telefono']) ? $usuario['Telefono'] : '<em>No registrado</em>' ?>
                                        </span>
                                    </td>
                                    <td>
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
                                        <span class="badge <?= $roleClass ?> px-3 py-2">
                                            <i class="bi bi-shield-fill me-1"></i>
                                            <?= $roleName ?>
                                        </span>
                                    </td>
                                    <td>
                                        <div class="d-flex justify-content-center gap-1">
                                            <button class="btn btn-outline-info btn-sm" 
                                                    data-bs-toggle="tooltip" 
                                                    data-bs-placement="top" 
                                                    title="Ver detalles">
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
                                                    onclick="confirmDelete(<?= $usuario['idUsuario'] ?>, '<?= $usuario['Nombre'] ?> <?= $usuario['Apellido'] ?>')"
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

                    <!-- Grid View (Hidden by default) -->
                    <div id="gridView" class="d-none">
                        <div class="row g-4 p-4">
                            <?php foreach ($usuarios as $usuario): ?>
                            <div class="col-md-6 col-lg-4">
                                <div class="card h-100 border-0 shadow-sm hover-card">
                                    <div class="card-body">
                                        <div class="d-flex align-items-center mb-3">
                                            <div class="avatar-lg bg-primary text-white rounded-circle d-flex align-items-center justify-content-center me-3">
                                                <i class="bi bi-person-fill fs-4"></i>
                                            </div>
                                            <div>
                                                <h6 class="mb-1 fw-semibold">
                                                    <?= $usuario['Nombre'] ?> <?= $usuario['Apellido'] ?>
                                                </h6>
                                                <small class="text-muted">ID: #<?= $usuario['idUsuario'] ?></small>
                                            </div>
                                        </div>
                                        
                                        <div class="mb-3">
                                            <div class="d-flex align-items-center mb-2">
                                                <i class="bi bi-envelope text-muted me-2"></i>
                                                <small class="text-muted"><?= $usuario['Correo'] ?></small>
                                            </div>
                                            <div class="d-flex align-items-center mb-2">
                                                <i class="bi bi-telephone text-muted me-2"></i>
                                                <small class="text-muted">
                                                    <?= !empty($usuario['Telefono']) ? $usuario['Telefono'] : 'No registrado' ?>
                                                </small>
                                            </div>
                                            <div class="d-flex align-items-center">
                                                <i class="bi bi-calendar text-muted me-2"></i>
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
                                                <button class="btn btn-outline-info btn-sm" title="Ver">
                                                    <i class="bi bi-eye"></i>
                                                </button>
                                                <a href="<?= base_url('usuarios/editar/' . $usuario['idUsuario']) ?>"
                                                   class="btn btn-outline-primary btn-sm" title="Editar">
                                                    <i class="bi bi-pencil"></i>
                                                </a>
                                                <button class="btn btn-outline-danger btn-sm"
                                                        onclick="confirmDelete(<?= $usuario['idUsuario'] ?>, '<?= $usuario['Nombre'] ?> <?= $usuario['Apellido'] ?>')"
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
                <div class="card-footer bg-white border-top-0">
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="text-muted">
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

    <!-- Bulk Actions (Hidden by default) -->
    <div id="bulkActions" class="row mt-3 d-none">
        <div class="col-12">
            <div class="card border-warning bg-warning bg-opacity-10">
                <div class="card-body py-2">
                    <div class="d-flex justify-content-between align-items-center">
                        <span class="text-warning fw-semibold">
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
</div>

<!-- Delete Confirmation Modal - VERSIÓN CORREGIDA -->
<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content border-0 shadow">
            <div class="modal-header border-0 bg-danger text-white">
                <h5 class="modal-title" id="deleteModalLabel">
                    <i class="bi bi-exclamation-triangle-fill me-2"></i>
                    Confirmar Eliminación
                </h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Cerrar"></button>
            </div>
            <div class="modal-body text-center py-4">
                <div class="mb-3">
                    <i class="bi bi-person-x text-danger" style="font-size: 3rem;"></i>
                </div>
                <h6 class="mb-2">¿Estás seguro de eliminar este usuario?</h6>
                <p class="text-muted mb-0" id="deleteUserName"></p>
                <small class="text-muted">Esta acción no se puede deshacer.</small>
            </div>
            <div class="modal-footer border-0 justify-content-center">
                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                    <i class="bi bi-x-circle me-1"></i>Cancelar
                </button>
                <a id="confirmDeleteBtn" href="#" class="btn btn-danger">
                    <i class="bi bi-trash me-1"></i>Eliminar Usuario
                </a>
            </div>
        </div>
    </div>
</div>
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
    font-size: 1.25rem;
}

.hover-card {
    transition: all 0.3s ease;
}

.hover-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 0.75rem 1.5rem rgba(0,0,0,0.15) !important;
}

.table-hover tbody tr:hover {
    background-color: rgba(0,123,255,0.05);
}

.user-row {
    transition: all 0.2s ease;
}

.btn-group .btn {
    transition: all 0.2s ease;
}

.btn:hover {
    transform: translateY(-1px);
}

@media (max-width: 768px) {
    .d-flex.justify-content-between {
        flex-direction: column;
        gap: 1rem;
    }
    
    .btn-group {
        justify-content: center;
    }
}
/* Solución para modal desbordado */
#deleteModal .modal-dialog {
    max-width: 90vw;
    width: 500px;
    margin: 1rem auto;
}

#deleteModal .modal-content {
    max-height: 90vh;
    overflow-y: auto;
}

/* Responsive para móviles */
@media (max-width: 576px) {
    #deleteModal .modal-dialog {
        width: 95vw;
        margin: 0.5rem auto;
    }
    
    #deleteModal .modal-header,
    #deleteModal .modal-body,
    #deleteModal .modal-footer {
        padding: 1rem;
    }
}

/* Prevenir scroll del body */
body.modal-open {
    overflow: hidden;
    padding-right: 0 !important;
}
</style>

<script>
// Initialize tooltips
document.addEventListener('DOMContentLoaded', function() {
    var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
    var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
        return new bootstrap.Tooltip(tooltipTriggerEl);
    });
});

// Search functionality
document.getElementById('searchInput').addEventListener('keyup', function() {
    const searchTerm = this.value.toLowerCase();
    const rows = document.querySelectorAll('#usersTable tbody tr');
    
    rows.forEach(row => {
        const text = row.textContent.toLowerCase();
        row.style.display = text.includes(searchTerm) ? '' : 'none';
    });
});

// View toggle
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

// Clear filters
function clearFilters() {
    document.getElementById('searchInput').value = '';
    document.getElementById('roleFilter').value = '';
    document.getElementById('statusFilter').value = '';
    
    // Show all rows
    const rows = document.querySelectorAll('#usersTable tbody tr');
    rows.forEach(row => {
        row.style.display = '';
    });
}

// Función mejorada para manejar el modal
function confirmDelete(userId, userName) {
    document.getElementById('deleteUserName').textContent = userName;
    document.getElementById('confirmDeleteBtn').href = '<?= base_url('usuarios/eliminar/') ?>' + userId;
    
    const modalElement = document.getElementById('deleteModal');
    const modal = new bootstrap.Modal(modalElement, {
        backdrop: 'static', // Previene cerrar al hacer clic fuera
        keyboard: true      // Permite cerrar con ESC
    });
    modal.show();
}

// Bulk delete
function bulkDelete() {
    const selectedCheckboxes = document.querySelectorAll('.user-checkbox:checked');
    if (selectedCheckboxes.length === 0) return;
    
    if (confirm(`¿Estás seguro de eliminar ${selectedCheckboxes.length} usuarios seleccionados?`)) {
        // Here you would implement the bulk delete functionality
        console.log('Bulk delete:', Array.from(selectedCheckboxes).map(cb => cb.value));
    }
}
</script>

<?php echo $this->endSection(); ?>