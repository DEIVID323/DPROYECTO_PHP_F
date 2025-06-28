<?php echo $this->extend('plantilla/layout_pro'); ?>
<?php echo $this->section('contenido'); ?>

<div class="container-fluid">
    <!-- Header Section -->
    <div class="row mb-4">
        <div class="col-12">
            <div class="card border-0 shadow-sm bg-gradient-success text-white">
                <div class="card-body py-4">
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="mb-3 mb-md-0">
                            <h1 class="h2 mb-1 fw-bold">
                                <i class="bi bi-plus-circle-fill me-2"></i>
                                Crear Nuevo Producto
                            </h1>
                            <p class="mb-0 opacity-75">Registra un nuevo producto en el sistema</p>
                        </div>
                        <div class="d-flex align-items-center">
                            <a href="<?= base_url('productos') ?>" 
                               class="btn btn-light btn-lg shadow-sm">
                                <i class="bi bi-arrow-left me-2"></i>
                                Volver a Productos
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


    <!-- Form Section -->
    <div class="row justify-content-center">
        <div class="col-12 col-xl-10">
            <div class="card border-0 shadow-sm">
                <div class="card-header bg-white border-bottom py-3">
                    <div class="d-flex align-items-center">
                        <div class="avatar-lg bg-success text-white rounded-circle d-flex align-items-center justify-content-center me-3 flex-shrink-0" style="width: 50px; height: 50px;">
                            <i class="bi bi-box-seam fs-5"></i>
                        </div>
                        <div>
                            <h5 class="mb-0 text-dark fw-semibold">
                                Información del Producto
                            </h5>
                            <small class="text-muted">Complete todos los campos requeridos</small>
                        </div>
                    </div>
                </div>
                
                <div class="card-body p-4">
                    <form method="post" action="<?= base_url('productos/guardar') ?>" id="productoForm">
                        <?= csrf_field() ?>
                        
                        <!-- Información Básica -->
                        <div class="row mb-4">
                            <div class="col-12">
                                <h6 class="text-muted fw-semibold mb-3">
                                    <i class="bi bi-info-circle me-2"></i>
                                    Información Básica
                                </h6>
                            </div>
                        </div>

                        <div class="row g-3 mb-4">
                            <div class="col-lg-6">
                                <label for="Nombre" class="form-label fw-semibold">
                                    <i class="bi bi-tag me-1"></i>
                                    Nombre del Producto <span class="text-danger">*</span>
                                </label>
                                <div class="input-group">
                                    <span class="input-group-text bg-light border-end-0">
                                        <i class="bi bi-box"></i>
                                    </span>
                                    <input type="text" 
                                           name="Nombre" 
                                           id="Nombre" 
                                           class="form-control border-start-0" 
                                           placeholder="Ingrese el nombre del producto"
                                           value="<?= old('Nombre') ?>"
                                           required>
                                </div>
                                <div class="form-text">
                                    <i class="bi bi-info-circle me-1"></i>
                                    Nombre descriptivo del producto
                                </div>
                            </div>
                            
                            <div class="col-lg-6">
                                <label for="Referencia" class="form-label fw-semibold">
                                    <i class="bi bi-upc me-1"></i>
                                    Referencia/Código <span class="text-danger">*</span>
                                </label>
                                <div class="input-group">
                                    <span class="input-group-text bg-light border-end-0">
                                        <i class="bi bi-upc-scan"></i>
                                    </span>
                                    <input type="text" 
                                           name="Referencia" 
                                           id="Referencia" 
                                           class="form-control border-start-0" 
                                           placeholder="REF-001"
                                           value="<?= old('Referencia') ?>"
                                           required>
                                </div>
                                <div class="form-text">
                                    <i class="bi bi-info-circle me-1"></i>
                                    Código único de identificación
                                </div>
                            </div>
                        </div>

                        <div class="row g-3 mb-4">
                            <div class="col-12">
                                <label for="Descripcion" class="form-label fw-semibold">
                                    <i class="bi bi-card-text me-1"></i>
                                    Descripción <span class="text-danger">*</span>
                                </label>
                                <div class="input-group">
                                    <span class="input-group-text bg-light border-end-0">
                                        <i class="bi bi-chat-left-text"></i>
                                    </span>
                                    <textarea name="Descripcion" 
                                              id="Descripcion" 
                                              class="form-control border-start-0" 
                                              rows="3"
                                              placeholder="Descripción detallada del producto"
                                              required><?= old('Descripcion') ?></textarea>
                                </div>
                                <div class="form-text">
                                    <i class="bi bi-info-circle me-1"></i>
                                    Descripción detallada de las características del producto
                                </div>
                            </div>
                        </div>

                        <!-- Información de Precio y Stock -->
                        <div class="row mb-4">
                            <div class="col-12">
                                <hr class="my-4">
                                <h6 class="text-muted fw-semibold mb-3">
                                    <i class="bi bi-currency-dollar me-2"></i>
                                    Precio y Stock
                                </h6>
                            </div>
                        </div>

                        <div class="row g-3 mb-4">
                            <div class="col-lg-4">
                                <label for="Precio" class="form-label fw-semibold">
                                    <i class="bi bi-currency-dollar me-1"></i>
                                    Precio <span class="text-danger">*</span>
                                </label>
                                <div class="input-group">
                                    <span class="input-group-text bg-light border-end-0">
                                        <i class="bi bi-cash-stack"></i>
                                    </span>
                                    <input type="number" 
                                           name="Precio" 
                                           id="Precio" 
                                           step="0.01" 
                                           min="0"
                                           class="form-control border-start-0" 
                                           placeholder="0.00"
                                           value="<?= old('Precio') ?>"
                                           required>
                                    <span class="input-group-text">$</span>
                                </div>
                                <div class="form-text">
                                    <i class="bi bi-info-circle me-1"></i>
                                    Precio de venta unitario
                                </div>
                            </div>
                            
                            <div class="col-lg-4">
                                <label for="Cantidad" class="form-label fw-semibold">
                                    <i class="bi bi-123 me-1"></i>
                                    Cantidad <span class="text-danger">*</span>
                                </label>
                                <div class="input-group">
                                    <span class="input-group-text bg-light border-end-0">
                                        <i class="bi bi-plus-square"></i>
                                    </span>
                                    <input type="number" 
                                           name="Cantidad" 
                                           id="Cantidad" 
                                           min="0"
                                           class="form-control border-start-0" 
                                           placeholder="0"
                                           value="<?= old('Cantidad') ?>"
                                           required>
                                    <span class="input-group-text">unid.</span>
                                </div>
                                <div class="form-text">
                                    <i class="bi bi-info-circle me-1"></i>
                                    Cantidad inicial en inventario
                                </div>
                            </div>
                            
                            <div class="col-lg-4">
                                <label for="Stock" class="form-label fw-semibold">
                                    <i class="bi bi-boxes me-1"></i>
                                    Stock Mínimo <span class="text-danger">*</span>
                                </label>
                                <div class="input-group">
                                    <span class="input-group-text bg-light border-end-0">
                                        <i class="bi bi-archive"></i>
                                    </span>
                                    <input type="number" 
                                           name="Stock" 
                                           id="Stock" 
                                           min="0"
                                           class="form-control border-start-0" 
                                           placeholder="0"
                                           value="<?= old('Stock') ?>"
                                           required>
                                    <span class="input-group-text">unid.</span>
                                </div>
                                <div class="form-text">
                                    <i class="bi bi-info-circle me-1"></i>
                                    Stock mínimo antes de alerta
                                </div>
                            </div>
                        </div>

                        <!-- Categorización -->
                        <div class="row mb-4">
                            <div class="col-12">
                                <hr class="my-4">
                                <h6 class="text-muted fw-semibold mb-3">
                                    <i class="bi bi-tags me-2"></i>
                                    Categorización
                                </h6>
                            </div>
                        </div>

                        <div class="row g-3 mb-4">
                            <div class="col-lg-6">
                                <label for="Categoria" class="form-label fw-semibold">
                                    <i class="bi bi-tag me-1"></i>
                                    Categoría <span class="text-danger">*</span>
                                </label>
                                <div class="input-group">
                                    <span class="input-group-text bg-light border-end-0">
                                        <i class="bi bi-list-ul"></i>
                                    </span>
                                    <select name="Categoria" id="Categoria" class="form-select border-start-0" required>
                                        <option value="">Seleccione una categoría</option>
                                        <option value="electronica" <?= old('Categoria') == 'electronica' ? 'selected' : '' ?>>Electrónica</option>
                                        <option value="ropa" <?= old('Categoria') == 'ropa' ? 'selected' : '' ?>>Ropa</option>
                                        <option value="hogar" <?= old('Categoria') == 'hogar' ? 'selected' : '' ?>>Hogar</option>
                                        <option value="deportes" <?= old('Categoria') == 'deportes' ? 'selected' : '' ?>>Deportes</option>
                                        <option value="salud" <?= old('Categoria') == 'salud' ? 'selected' : '' ?>>Salud y Belleza</option>
                                        <option value="libros" <?= old('Categoria') == 'libros' ? 'selected' : '' ?>>Libros</option>
                                        <option value="juguetes" <?= old('Categoria') == 'juguetes' ? 'selected' : '' ?>>Juguetes</option>
                                        <option value="otros" <?= old('Categoria') == 'otros' ? 'selected' : '' ?>>Otros</option>
                                    </select>
                                </div>
                                <div class="form-text">
                                    <i class="bi bi-info-circle me-1"></i>
                                    Seleccione la categoría correspondiente
                                </div>
                            </div>
                            
                            <div class="col-lg-6">
                                <label for="Estado" class="form-label fw-semibold">
                                    <i class="bi bi-toggle-on me-1"></i>
                                    Estado del Producto
                                </label>
                                <div class="input-group">
                                    <span class="input-group-text bg-light border-end-0">
                                        <i class="bi bi-check-circle"></i>
                                    </span>
                                    <select name="Estado" id="Estado" class="form-select border-start-0">
                                        <option value="activo" <?= old('Estado') == 'activo' ? 'selected' : '' ?>>Activo</option>
                                        <option value="inactivo" <?= old('Estado') == 'inactivo' ? 'selected' : '' ?>>Inactivo</option>
                                    </select>
                                </div>
                                <div class="form-text">
                                    <i class="bi bi-info-circle me-1"></i>
                                    Estado actual del producto en el sistema
                                </div>
                            </div>
                        </div>
                    </form>
                </div>

                <!-- Card Footer with Actions -->
                <div class="card-footer bg-white border-top py-3">
                    <div class="d-flex justify-content-between align-items-center flex-wrap">
                        <div class="text-muted mb-2 mb-md-0">
                            <i class="bi bi-info-circle me-1"></i>
                            Los campos marcados con <span class="text-danger">*</span> son obligatorios
                        </div>
                        <div class="d-flex gap-2 flex-wrap">
                            <a href="<?= base_url('productos') ?>" 
                               class="btn btn-outline-secondary">
                                <i class="bi bi-x-circle me-1"></i>
                                Cancelar
                            </a>
                            <button type="button" 
                                    class="btn btn-outline-info"
                                    onclick="resetForm()">
                                <i class="bi bi-arrow-clockwise me-1"></i>
                                Limpiar
                            </button>
                            <button type="submit" 
                                    form="productoForm"
                                    class="btn btn-success">
                                <i class="bi bi-save me-1"></i>
                                Guardar Producto
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Preview Card (Optional) -->
    <div class="row justify-content-center mt-4">
        <div class="col-12 col-xl-10">
            <div class="card border-0 shadow-sm bg-light">
                <div class="card-header bg-transparent border-bottom">
                    <h6 class="mb-0 text-muted fw-semibold">
                        <i class="bi bi-eye me-2"></i>
                        Vista Previa del Producto
                    </h6>
                </div>
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col-auto">
                            <div class="avatar-lg bg-success text-white rounded-circle d-flex align-items-center justify-content-center" style="width: 60px; height: 60px;">
                                <i class="bi bi-box fs-4"></i>
                            </div>
                        </div>
                        <div class="col">
                            <div id="previewContent">
                                <h6 class="mb-1 text-muted">Nombre del producto aparecerá aquí</h6>
                                <small class="text-muted">Complete el formulario para ver la vista previa</small>
                            </div>
                        </div>
                        <div class="col-auto">
                            <span class="badge bg-secondary">Vista Previa</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
// Form validation and preview functionality
document.addEventListener('DOMContentLoaded', function() {
    // Initialize tooltips
    const tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
    const tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
        return new bootstrap.Tooltip(tooltipTriggerEl);
    });

    // Form preview update
    const nombreInput = document.getElementById('Nombre');
    const referenciaInput = document.getElementById('Referencia');
    const precioInput = document.getElementById('Precio');
    const categoriaInput = document.getElementById('Categoria');
    const previewContent = document.getElementById('previewContent');

    function updatePreview() {
        const nombre = nombreInput.value || 'Nombre del producto';
        const referencia = referenciaInput.value || 'REF-000';
        const precio = precioInput.value || '0.00';
        const categoria = categoriaInput.options[categoriaInput.selectedIndex].text || 'Sin categoría';

        previewContent.innerHTML = `
            <h6 class="mb-1 text-dark fw-semibold">${nombre}</h6>
            <div class="d-flex align-items-center gap-3 flex-wrap">
                <small class="text-muted">
                    <i class="bi bi-upc me-1"></i>
                    ${referencia}
                </small>
                <small class="text-muted">
                    <i class="bi bi-currency-dollar me-1"></i>
                    $${precio}
                </small>
                <span class="badge bg-primary bg-opacity-10 text-primary border border-primary px-2 py-1">
                    <i class="bi bi-tag me-1"></i>
                    ${categoria}
                </span>
            </div>
        `;
    }

    // Add event listeners for real-time preview
    [nombreInput, referenciaInput, precioInput, categoriaInput].forEach(input => {
        input.addEventListener('input', updatePreview);
        input.addEventListener('change', updatePreview);
    });

    // Form validation
    const form = document.getElementById('productoForm');
    form.addEventListener('submit', function(e) {
        if (!form.checkValidity()) {
            e.preventDefault();
            e.stopPropagation();
        }
        form.classList.add('was-validated');
    });
});

function resetForm() {
    if (confirm('¿Está seguro de que desea limpiar todos los campos?')) {
        document.getElementById('productoForm').reset();
        document.getElementById('previewContent').innerHTML = `
            <h6 class="mb-1 text-muted">Nombre del producto aparecerá aquí</h6>
            <small class="text-muted">Complete el formulario para ver la vista previa</small>
        `;
    }
}

// Auto-generate reference code based on name (optional)
document.getElementById('Nombre').addEventListener('blur', function() {
    const referenciaInput = document.getElementById('Referencia');
    if (!referenciaInput.value && this.value) {
        const cleanName = this.value.replace(/[^a-zA-Z0-9]/g, '').substring(0, 6).toUpperCase();
        const randomNum = Math.floor(Math.random() * 999) + 1;
        referenciaInput.value = `${cleanName}-${randomNum.toString().padStart(3, '0')}`;
    }
});
</script>

<style>
.avatar-lg {
    width: 60px;
    height: 60px;
}

.form-control:focus,
.form-select:focus {
    border-color: #198754;
    box-shadow: 0 0 0 0.2rem rgba(25, 135, 84, 0.25);
}

.input-group-text {
    border-color: #dee2e6;
}

.form-text {
    font-size: 0.875rem;
}

@media (max-width: 768px) {
    .card-body {
        padding: 1.5rem;
    }
    
    .btn-group .btn {
        padding: 0.375rem 0.75rem;
    }
}

/* Custom validation styles */
.was-validated .form-control:valid,
.was-validated .form-select:valid {
    border-color: #198754;
    background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 8 8'%3e%3cpath fill='%23198754' d='m2.3 6.73.94-.94 2.94 2.94L3.23 5.7z'/%3e%3c/svg%3e");
}

.was-validated .form-control:invalid,
.was-validated .form-select:invalid {
    border-color: #dc3545;
    background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 12 12' width='12' height='12' fill='none' stroke='%23dc3545'%3e%3ccircle cx='6' cy='6' r='4.5'/%3e%3cpath d='m5.8 5.8 2.4 2.4M8.2 5.8l-2.4 2.4'/%3e%3c/svg%3e");
}

/* Responsive improvements */
@media (max-width: 576px) {
    .input-group-text {
        min-width: 45px;
        justify-content: center;
    }
    
    .d-flex.gap-2 {
        gap: 0.5rem !important;
    }
    
    .btn {
        font-size: 0.875rem;
    }
}
</style>

<?= $this->endSection(); ?>