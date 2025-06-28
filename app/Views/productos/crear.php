<?php echo $this->extend('plantilla/layout_crear'); ?>
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
<?= $this->endSection(); ?>