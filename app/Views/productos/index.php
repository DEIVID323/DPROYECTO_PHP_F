<?php echo $this->extend('plantilla/layout_pro'); ?>
<?php echo $this->section('contenido'); ?>


<div class="container-fluid">
    <div class="row mb-4">
        <div class="col-12">
            <div class="card border-0 shadow-sm bg-gradient-primary text-white">
                <div class="card-body py-4">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h1 class="h2 mb-1 fw-bold">
                                <i class="bi bi-box-seam me-2"></i>
                                Gestión de Productos
                            </h1>
                            <p class="mb-0 opacity-75">Administra todos los productos del sistema</p>
                        </div>
                        <div class="d-flex align-items-center">
                            <span class="badge bg-light text-primary fs-6 me-3">
                                <i class="bi bi-box me-1"></i>
                                <?= count($productos) ?> productos
                            </span>
                            <a href="<?= base_url('productos/crear') ?>" 
                               class="btn btn-light btn-lg shadow-sm">
                                <i class="bi bi-plus-circle-fill me-2"></i>
                                Nuevo Producto
                            </a>
                        </div>
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
                                       id="searchInput" placeholder="Buscar productos...">
                            </div>
                        </div>
                        <div class="col-lg-2 col-md-6">
                            <select class="form-select" id="categoryFilter">
                                <option value="">Todas las categorías</option>
                                <option value="electronica">Electrónica</option>
                                <option value="ropa">Ropa</option>
                                <option value="hogar">Hogar</option>
                            </select>
                        </div>
                        <div class="col-lg-2 col-md-6">
                            <select class="form-select" id="stockFilter">
                                <option value="">Todo el stock</option>
                                <option value="disponible">Disponible</option>
                                <option value="agotado">Agotado</option>
                                <option value="bajo">Stock bajo</option>
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
                            <span id="selectedCount">0</span> productos seleccionados
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

    <!-- Products Table/Grid -->
    <div class="row">
        <div class="col-12">
            <div class="card border-0 shadow-sm">
                <div class="card-header bg-white border-bottom py-3">
                    <div class="d-flex justify-content-between align-items-center">
                        <h5 class="mb-0 text-muted fw-semibold">
                            <i class="bi bi-table me-2"></i>
                            Lista de Productos
                        </h5>
                        <small class="text-muted">
                            Total: <strong><?= count($productos) ?></strong> productos
                        </small>
                    </div>
                </div>
                
                <div class="card-body p-0">
                    <!-- Table View -->
                    <div id="tableView">
                        <div class="table-responsive">
                            <table class="table table-hover align-middle mb-0" id="productsTable">
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
                                            <i class="bi bi-box-seam me-1"></i>Producto
                                        </th>
                                        <th class="border-0 py-3">
                                            <i class="bi bi-upc me-1"></i>Referencia
                                        </th>
                                        <th class="border-0 py-3 d-none d-lg-table-cell">
                                            <i class="bi bi-currency-dollar me-1"></i>Precio
                                        </th>
                                        <th class="border-0 py-3 d-none d-md-table-cell">
                                            <i class="bi bi-stack me-1"></i>Cantidad
                                        </th>
                                        <th class="border-0 py-3 d-none d-lg-table-cell">
                                            <i class="bi bi-archive me-1"></i>Stock
                                        </th>
                                        <th class="border-0 py-3 d-none d-lg-table-cell">
                                            <i class="bi bi-tags me-1"></i>Categoría
                                        </th>
                                        <th class="border-0 py-3 text-center" style="width: 150px;">
                                            <i class="bi bi-gear me-1"></i>Acciones
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($productos as $producto): ?>
                                    <tr class="product-row">
                                        <td>
                                            <div class="form-check">
                                                <input class="form-check-input product-checkbox" type="checkbox" 
                                                       value="<?= $producto['idProducto'] ?>">
                                            </div>
                                        </td>
                                        <td>
                                            <span class="badge bg-light text-dark fs-6 fw-semibold">
                                                #<?= str_pad($producto['idProducto'], 3, '0', STR_PAD_LEFT) ?>
                                            </span>
                                        </td>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <div class="avatar-sm bg-success text-white rounded-circle d-flex align-items-center justify-content-center me-3 flex-shrink-0" style="width: 40px; height: 40px;">
                                                    <i class="bi bi-box"></i>
                                                </div>
                                                <div class="min-w-0">
                                                    <div class="fw-semibold text-dark text-truncate">
                                                        <?= $producto['Nombre'] ?>
                                                    </div>
                                                    <small class="text-muted">Producto registrado</small>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <span class="badge bg-secondary bg-opacity-10 text-secondary border border-secondary px-2 py-1">
                                                <?= $producto['Referencia'] ?>
                                            </span>
                                        </td>
                                        <td class="d-none d-lg-table-cell">
                                            <span class="badge bg-info bg-opacity-10 text-info border border-info">
                                                <i class="bi bi-currency-dollar me-1"></i>
                                                <?= number_format($producto['Precio'], 2) ?>
                                            </span>
                                        </td>
                                        <td class="d-none d-md-table-cell">
                                            <span class="text-muted fw-medium">
                                                <?= $producto['Cantidad'] ?>
                                            </span>
                                        </td>
                                        <td class="d-none d-lg-table-cell">
                                            <?php
                                            $stockClass = $producto['Stock'] > 10 ? 'bg-success' : ($producto['Stock'] > 0 ? 'bg-warning text-dark' : 'bg-danger');
                                            $stockText = $producto['Stock'] > 10 ? 'En stock' : ($producto['Stock'] > 0 ? 'Stock bajo' : 'Agotado');
                                            ?>
                                            <span class="badge <?= $stockClass ?> px-2 py-1">
                                                <i class="bi bi-archive me-1"></i>
                                                <?= $producto['Stock'] ?> - <?= $stockText ?>
                                            </span>
                                        </td>
                                        <td class="d-none d-lg-table-cell">
                                            <span class="badge bg-primary bg-opacity-10 text-primary border border-primary">
                                                <i class="bi bi-tag me-1"></i>
                                                <?= $producto['Categoria'] ?>
                                            </span>
                                        </td>
                                        <td>
                                            <div class="d-flex justify-content-center gap-1">
                                                <button class="btn btn-outline-info btn-sm" 
                                                        data-bs-toggle="tooltip" 
                                                        data-bs-placement="top" 
                                                        title="Ver detalles"
                                                        onclick="viewProduct(<?= $producto['idProducto'] ?>)">
                                                    <i class="bi bi-eye"></i>
                                                </button>
                                                <a href="<?= base_url('productos/editar/' . $producto['idProducto']) ?>"
                                                   class="btn btn-outline-warning btn-sm"
                                                   data-bs-toggle="tooltip" 
                                                   data-bs-placement="top" 
                                                   title="Editar producto">
                                                    <i class="bi bi-pencil"></i>
                                                </a>
                                                <button class="btn btn-outline-danger btn-sm"
                                                        onclick="confirmDelete(<?= $producto['idProducto'] ?>, '<?= addslashes($producto['Nombre']) ?>')"
                                                        data-bs-toggle="tooltip" 
                                                        data-bs-placement="top" 
                                                        title="Eliminar producto">
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
                            <?php foreach ($productos as $producto): ?>
                            <div class="col-xl-3 col-lg-4 col-md-6">
                                <div class="card h-100 border-0 shadow-sm hover-card">
                                    <div class="card-body">
                                        <div class="d-flex align-items-center mb-3">
                                            <div class="avatar-lg bg-success text-white rounded-circle d-flex align-items-center justify-content-center me-3 flex-shrink-0" style="width: 50px; height: 50px;">
                                                <i class="bi bi-box fs-5"></i>
                                            </div>
                                            <div class="min-w-0">
                                                <h6 class="mb-1 fw-semibold text-truncate">
                                                    <?= $producto['Nombre'] ?>
                                                </h6>
                                                <small class="text-muted">ID: #<?= $producto['idProducto'] ?></small>
                                            </div>
                                        </div>
                                        
                                        <div class="mb-3">
                                            <div class="d-flex align-items-center mb-2">
                                                <i class="bi bi-upc text-muted me-2 flex-shrink-0"></i>
                                                <small class="text-muted text-truncate"><?= $producto['Referencia'] ?></small>
                                            </div>
                                            <div class="d-flex align-items-center mb-2">
                                                <i class="bi bi-currency-dollar text-muted me-2 flex-shrink-0"></i>
                                                <small class="text-muted text-truncate">
                                                    $<?= number_format($producto['Precio'], 2) ?>
                                                </small>
                                            </div>
                                            <div class="d-flex align-items-center mb-2">
                                                <i class="bi bi-stack text-muted me-2 flex-shrink-0"></i>
                                                <small class="text-muted">Cantidad: <?= $producto['Cantidad'] ?></small>
                                            </div>
                                            <div class="d-flex align-items-center">
                                                <i class="bi bi-archive text-muted me-2 flex-shrink-0"></i>
                                                <small class="text-muted">Stock: <?= $producto['Stock'] ?></small>
                                            </div>
                                        </div>

                                        <div class="d-flex justify-content-between align-items-center">
                                            <span class="badge bg-primary bg-opacity-10 text-primary border border-primary px-2 py-1">
                                                <?= $producto['Categoria'] ?>
                                            </span>
                                            
                                            <div class="btn-group" role="group">
                                                <button class="btn btn-outline-info btn-sm" 
                                                        title="Ver"
                                                        onclick="viewProduct(<?= $producto['idProducto'] ?>)">
                                                    <i class="bi bi-eye"></i>
                                                </button>
                                                <a href="<?= base_url('productos/editar/' . $producto['idProducto']) ?>"
                                                   class="btn btn-outline-warning btn-sm" title="Editar">
                                                    <i class="bi bi-pencil"></i>
                                                </a>
                                                <button class="btn btn-outline-danger btn-sm"
                                                        onclick="confirmDelete(<?= $producto['idProducto'] ?>, '<?= addslashes($producto['Nombre']) ?>')"
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
                            Mostrando <strong><?= count($productos) ?></strong> productos
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

<!-- Delete Confirmation Modal -->
<!-- Modal de confirmación de eliminación corregido -->
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
                    <i class="bi bi-box-x display-1 text-danger"></i>
                </div>
                <h5 class="mb-3">¿Estás seguro de eliminar este producto?</h5>
                <p class="mb-2"><strong id="deleteProductName"></strong></p>
                <small class="text-muted">Esta acción no se puede deshacer.</small>
            </div>
            <div class="modal-footer border-0 justify-content-center">
                <button type="button" class="btn btn-secondary px-4" data-bs-dismiss="modal">
                    <i class="bi bi-x-circle me-1"></i>
                    Cancelar
                </button>
                <button type="button" id="confirmDeleteBtn" class="btn btn-danger px-4">
                    <i class="bi bi-trash me-1"></i>
                    Eliminar Producto
                </button>
            </div>
        </div>
    </div>
</div>

<!-- Product Details Modal -->
<div class="modal fade" id="productDetailsModal" tabindex="-1" aria-labelledby="productDetailsModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content border-0 shadow">
            <div class="modal-header bg-success text-white border-0">
                <h5 class="modal-title" id="productDetailsModalLabel">
                    <i class="bi bi-box-seam me-2"></i>
                    Detalles del Producto
                </h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Cerrar"></button>
            </div>
            <div class="modal-body" id="productDetailsContent">
                <!-- Content will be loaded dynamically -->
                <div class="text-center py-4">
                    <div class="spinner-border text-success" role="status">
                        <span class="visually-hidden">Cargando...</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
// Verificar que Bootstrap esté disponible


// JavaScript functions
function confirmDelete(productId, productName) {
    console.log('confirmDelete llamado con:', productId, productName);
    
    // Verificar que el elemento existe
    const deleteProductNameEl = document.getElementById('deleteProductName');
    if (!deleteProductNameEl) {
        console.error('Elemento deleteProductName no encontrado');
        return;
    }
    
    deleteProductNameEl.textContent = productName;
    
    // Configurar el botón de confirmación correctamente
    const confirmBtn = document.getElementById('confirmDeleteBtn');
    if (!confirmBtn) {
        console.error('Elemento confirmDeleteBtn no encontrado');
        return;
    }
    
    confirmBtn.onclick = function() {
        console.log('Botón eliminar clickeado, redirigiendo a:', '<?= base_url('productos/eliminar/') ?>' + productId);
        window.location.href = '<?= base_url('productos/eliminar/') ?>' + productId;
    };
    
    // Verificar que el modal existe
    const modalElement = document.getElementById('deleteModal');
    if (!modalElement) {
        console.error('Modal deleteModal no encontrado');
        return;
    }
    
    try {
        const deleteModal = new bootstrap.Modal(modalElement, {
            backdrop: false, // Eliminar backdrop
            keyboard: true
        });
        deleteModal.show();
        console.log('Modal mostrado correctamente');
    } catch (error) {
        console.error('Error al mostrar el modal:', error);
        alert('Error al mostrar el modal: ' + error.message);
    }
}

function viewProduct(productId) {
    const productDetailsModal = new bootstrap.Modal(document.getElementById('productDetailsModal'), {
        backdrop: false, // Eliminar backdrop
        keyboard: true
    });
    productDetailsModal.show();
    
    // Here you would typically load product details via AJAX
    // For now, just show a placeholder
    document.getElementById('productDetailsContent').innerHTML = `
        <div class="text-center py-4">
            <p>Cargando detalles del producto ID: ${productId}</p>
        </div>
    `;
}


function clearFilters() {
    document.getElementById('searchInput').value = '';
    document.getElementById('categoryFilter').value = '';
    document.getElementById('stockFilter').value = '';
}

function bulkDelete() {
    const selectedProducts = document.querySelectorAll('.product-checkbox:checked');
    if (selectedProducts.length === 0) {
        alert('Por favor selecciona al menos un producto');
        return;
    }

    if (confirm(`¿Está seguro de eliminar ${selectedProducts.length} productos?`)) {
        // Implement bulk delete logic here
        console.log('Bulk delete:', selectedProducts);
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
    const checkboxes = document.querySelectorAll('.product-checkbox');
    checkboxes.forEach(checkbox => {
        checkbox.checked = this.checked;
    });
    updateBulkActions();
});

// Individual checkbox functionality
document.querySelectorAll('.product-checkbox').forEach(checkbox => {
    checkbox.addEventListener('change', updateBulkActions);
});

function updateBulkActions() {
    const selectedCheckboxes = document.querySelectorAll('.product-checkbox:checked');
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

function emergencyUnlock() {
    // Cerrar el modal si está abierto
    const modalElement = document.getElementById('deleteModal');
    if (modalElement) {
        const modal = bootstrap.Modal.getInstance(modalElement);
        if (modal) {
            modal.hide();
            console.log("Modal cerrado de emergencia");
        }
    }
    
    // Remover backdrop si existe
    const backdrop = document.querySelector('.modal-backdrop');
    if (backdrop) {
        backdrop.remove();
        console.log("Backdrop removido");
    }
    
    // Remover clase modal-open del body
    document.body.classList.remove('modal-open');
    document.body.style.overflow = '';
    document.body.style.paddingRight = '';
    
    console.log("Página desbloqueada completamente");
}
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

/* Eliminar backdrop y efectos de oscurecimiento */
.modal-backdrop {
    display: none !important;
}

.modal {
    z-index: 1050;
}

/* Eliminar efectos de oscurecimiento del body */
body.modal-open {
    overflow: auto !important;
    padding-right: 0 !important;
}

/* Estilo para botón deshabilitado */
.btn.disabled {
    pointer-events: none;
    opacity: 0.65;
}

/* Asegurar que los modales no tengan backdrop */
.modal.show {
    background: transparent !important;
}

.modal-dialog {
    box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.15);
}
</style>

<?php echo $this->endSection(); ?>