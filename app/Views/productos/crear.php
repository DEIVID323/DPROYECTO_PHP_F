<?php echo $this->extend('plantilla/layout_crear'); ?>
<?php echo $this->section('contenido'); ?>

<div class="container-fluid" style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); min-height: 100vh; padding: 2rem 0;">
    <!-- Animated Background Elements -->
    <div class="floating-shapes">
        <div class="shape shape-1"></div>
        <div class="shape shape-2"></div>
        <div class="shape shape-3"></div>
        <div class="shape shape-4"></div>
        <div class="shape shape-5"></div>
    </div>

    <!-- Header Section -->
    <div class="row mb-4">
        <div class="col-12">
            <div class="card border-0 shadow-lg bg-gradient-card text-white overflow-hidden">
                <div class="card-body py-4 position-relative">
                    <div class="header-pattern"></div>
                    <div class="d-flex justify-content-between align-items-center position-relative">
                        <div class="mb-3 mb-md-0">
                            <h1 class="h2 mb-1 fw-bold text-shadow">
                                <i class="bi bi-plus-circle-fill me-2 text-warning"></i>
                                Crear Nuevo Producto
                            </h1>
                            <p class="mb-0 opacity-90">Registra un nuevo producto en el sistema</p>
                        </div>
                        <div class="d-flex align-items-center">
                            <a href="<?= base_url('productos') ?>" 
                               class="btn btn-light btn-lg shadow-lg hover-lift">
                                <i class="bi bi-arrow-left me-2 text-primary"></i>
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
                <div class="alert alert-danger alert-dismissible fade show shadow-lg glassmorphism-red" role="alert">
                    <i class="bi bi-exclamation-triangle-fill me-2"></i>
                    <strong>Error:</strong> <?= session('error') ?>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="Cerrar"></button>
                </div>
            </div>
        </div>
    <?php endif; ?>

    

    <!-- Form Section -->
    <div class="row justify-content-center">
        <div class="col-12 col-xl-10">
            <div class="card border-0 shadow-xl glassmorphism-card">
                <div class="card-header border-bottom-0 py-4 bg-gradient-header">
                    <div class="d-flex align-items-center">
                        <div class="avatar-lg bg-gradient-icon text-white rounded-circle d-flex align-items-center justify-content-center me-3 flex-shrink-0 shadow-lg" style="width: 60px; height: 60px;">
                            <i class="bi bi-box-seam fs-4"></i>
                        </div>
                        <div>
                            <h5 class="mb-0 text-white fw-bold text-shadow">
                                Información del Producto
                            </h5>
                            <small class="text-white opacity-75">Complete todos los campos requeridos</small>
                        </div>
                    </div>
                </div>
                
                <div class="card-body p-4" style="background: linear-gradient(145deg, rgba(255,255,255,0.95) 0%, rgba(240,248,255,0.95) 100%);">
                    <form method="post" action="<?= base_url('productos/guardar') ?>" id="productoForm">
                        <?= csrf_field() ?>
                        
                        <!-- Información Básica -->
                        <div class="row mb-4">
                            <div class="col-12">
                                <div class="section-header">
                                    <h6 class="text-gradient fw-bold mb-3">
                                        <i class="bi bi-info-circle me-2 text-info"></i>
                                        Información Básica
                                    </h6>
                                </div>
                            </div>
                        </div>

                        <div class="row g-3 mb-4">
                            <div class="col-lg-6">
                                <label for="Nombre" class="form-label fw-semibold text-dark">
                                    <i class="bi bi-tag me-1 text-primary"></i>
                                    Nombre del Producto <span class="text-danger">*</span>
                                </label>
                                <div class="input-group input-group-custom">
                                    <span class="input-group-text bg-gradient-primary text-white border-0">
                                        <i class="bi bi-box"></i>
                                    </span>
                                    <input type="text" 
                                           name="Nombre" 
                                           id="Nombre" 
                                           class="form-control form-control-custom border-0" 
                                           placeholder="Ingrese el nombre del producto"
                                           value="<?= old('Nombre') ?>"
                                           required>
                                </div>
                                <div class="form-text text-info">
                                    <i class="bi bi-lightbulb me-1"></i>
                                    Nombre descriptivo del producto
                                </div>
                            </div>
                            
                            <div class="col-lg-6">
                                <label for="Referencia" class="form-label fw-semibold text-dark">
                                    <i class="bi bi-upc me-1 text-success"></i>
                                    Referencia/Código <span class="text-danger">*</span>
                                </label>
                                <div class="input-group input-group-custom">
                                    <span class="input-group-text bg-gradient-success text-white border-0">
                                        <i class="bi bi-upc-scan"></i>
                                    </span>
                                    <input type="text" 
                                           name="Referencia" 
                                           id="Referencia" 
                                           class="form-control form-control-custom border-0" 
                                           placeholder="REF-001"
                                           value="<?= old('Referencia') ?>"
                                           required>
                                </div>
                                <div class="form-text text-success">
                                    <i class="bi bi-lightbulb me-1"></i>
                                    Código único de identificación
                                </div>
                            </div>
                        </div>

                        <div class="row g-3 mb-4">
                            <div class="col-12">
                                <label for="Descripcion" class="form-label fw-semibold text-dark">
                                    <i class="bi bi-card-text me-1 text-warning"></i>
                                    Descripción <span class="text-danger">*</span>
                                </label>
                                <div class="input-group input-group-custom">
                                    <span class="input-group-text bg-gradient-warning text-white border-0">
                                        <i class="bi bi-chat-left-text"></i>
                                    </span>
                                    <textarea name="Descripcion" 
                                              id="Descripcion" 
                                              class="form-control form-control-custom border-0" 
                                              rows="3"
                                              placeholder="Descripción detallada del producto"
                                              required><?= old('Descripcion') ?></textarea>
                                </div>
                                <div class="form-text text-warning">
                                    <i class="bi bi-lightbulb me-1"></i>
                                    Descripción detallada de las características del producto
                                </div>
                            </div>
                        </div>

                        <!-- Información de Precio y Stock -->
                        <div class="row mb-4">
                            <div class="col-12">
                                <hr class="gradient-divider my-4">
                                <div class="section-header">
                                    <h6 class="text-gradient fw-bold mb-3">
                                        <i class="bi bi-currency-dollar me-2 text-success"></i>
                                        Precio y Stock
                                    </h6>
                                </div>
                            </div>
                        </div>

                        <div class="row g-3 mb-4">
                            <div class="col-lg-4">
                                <label for="Precio" class="form-label fw-semibold text-dark">
                                    <i class="bi bi-currency-dollar me-1 text-success"></i>
                                    Precio <span class="text-danger">*</span>
                                </label>
                                <div class="input-group input-group-custom">
                                    <span class="input-group-text bg-gradient-success text-white border-0">
                                        <i class="bi bi-cash-stack"></i>
                                    </span>
                                    <input type="number" 
                                           name="Precio" 
                                           id="Precio" 
                                           step="0.01" 
                                           min="0"
                                           class="form-control form-control-custom border-0" 
                                           placeholder="0.00"
                                           value="<?= old('Precio') ?>"
                                           required>
                                    <span class="input-group-text bg-success text-white border-0">$</span>
                                </div>
                                <div class="form-text text-success">
                                    <i class="bi bi-lightbulb me-1"></i>
                                    Precio de venta unitario
                                </div>
                            </div>
                            
                            <div class="col-lg-4">
                                <label for="Cantidad" class="form-label fw-semibold text-dark">
                                    <i class="bi bi-123 me-1 text-info"></i>
                                    Cantidad <span class="text-danger">*</span>
                                </label>
                                <div class="input-group input-group-custom">
                                    <span class="input-group-text bg-gradient-info text-white border-0">
                                        <i class="bi bi-plus-square"></i>
                                    </span>
                                    <input type="number" 
                                           name="Cantidad" 
                                           id="Cantidad" 
                                           min="0"
                                           class="form-control form-control-custom border-0" 
                                           placeholder="0"
                                           value="<?= old('Cantidad') ?>"
                                           required>
                                    <span class="input-group-text bg-info text-white border-0">unid.</span>
                                </div>
                                <div class="form-text text-info">
                                    <i class="bi bi-lightbulb me-1"></i>
                                    Cantidad inicial en inventario
                                </div>
                            </div>
                            
                            <div class="col-lg-4">
                                <label for="Stock" class="form-label fw-semibold text-dark">
                                    <i class="bi bi-boxes me-1 text-purple"></i>
                                    Stock Mínimo <span class="text-danger">*</span>
                                </label>
                                <div class="input-group input-group-custom">
                                    <span class="input-group-text bg-gradient-purple text-white border-0">
                                        <i class="bi bi-archive"></i>
                                    </span>
                                    <input type="number" 
                                           name="Stock" 
                                           id="Stock" 
                                           min="0"
                                           class="form-control form-control-custom border-0" 
                                           placeholder="0"
                                           value="<?= old('Stock') ?>"
                                           required>
                                    <span class="input-group-text bg-purple text-white border-0">unid.</span>
                                </div>
                                <div class="form-text text-purple">
                                    <i class="bi bi-lightbulb me-1"></i>
                                    Stock mínimo antes de alerta
                                </div>
                            </div>
                        </div>

                        <!-- Categorización -->
                        <div class="row mb-4">
                            <div class="col-12">
                                <hr class="gradient-divider my-4">
                                <div class="section-header">
                                    <h6 class="text-gradient fw-bold mb-3">
                                        <i class="bi bi-tags me-2 text-primary"></i>
                                        Categorización
                                    </h6>
                                </div>
                            </div>
                        </div>

                        <div class="row g-3 mb-4">
                            <div class="col-lg-6">
                                <label for="Categoria" class="form-label fw-semibold text-dark">
                                    <i class="bi bi-tag me-1 text-primary"></i>
                                    Categoría <span class="text-danger">*</span>
                                </label>
                                <div class="input-group input-group-custom">
                                    <span class="input-group-text bg-gradient-primary text-white border-0">
                                        <i class="bi bi-list-ul"></i>
                                    </span>
                                    <select name="Categoria" id="Categoria" class="form-select form-control-custom border-0" required>
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
                                <div class="form-text text-primary">
                                    <i class="bi bi-lightbulb me-1"></i>
                                    Seleccione la categoría correspondiente
                                </div>
                            </div>
                            
                            <div class="col-lg-6">
                                <label for="Estado" class="form-label fw-semibold text-dark">
                                    <i class="bi bi-toggle-on me-1 text-secondary"></i>
                                    Estado del Producto
                                </label>
                                <div class="input-group input-group-custom">
                                    <span class="input-group-text bg-gradient-secondary text-white border-0">
                                        <i class="bi bi-check-circle"></i>
                                    </span>
                                    <select name="Estado" id="Estado" class="form-select form-control-custom border-0">
                                        <option value="activo" <?= old('Estado') == 'activo' ? 'selected' : '' ?>>Activo</option>
                                        <option value="inactivo" <?= old('Estado') == 'inactivo' ? 'selected' : '' ?>>Inactivo</option>
                                    </select>
                                </div>
                                <div class="form-text text-secondary">
                                    <i class="bi bi-lightbulb me-1"></i>
                                    Estado actual del producto en el sistema
                                </div>
                            </div>
                        </div>
                    </form>
                </div>

                <!-- Card Footer with Actions -->
                <div class="card-footer border-top-0 py-3 bg-gradient-footer">
                    <div class="d-flex justify-content-between align-items-center flex-wrap">
                        <div class="text-white mb-2 mb-md-0">
                            <i class="bi bi-info-circle me-1"></i>
                            Los campos marcados con <span class="text-warning fw-bold">*</span> son obligatorios
                        </div>
                        <div class="d-flex gap-2 flex-wrap">
                            <a href="<?= base_url('productos') ?>" 
                               class="btn btn-outline-light hover-lift">
                                <i class="bi bi-x-circle me-1"></i>
                                Cancelar
                            </a>
                            <button type="button" 
                                    class="btn btn-warning hover-lift shadow-lg"
                                    onclick="resetForm()">
                                <i class="bi bi-arrow-clockwise me-1"></i>
                                Limpiar
                            </button>
                            <button type="submit" 
                                    form="productoForm"
                                    class="btn btn-success btn-glow hover-lift shadow-lg">
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
            <div class="card border-0 shadow-xl glassmorphism-preview">
                <div class="card-header border-bottom-0 bg-gradient-preview">
                    <h6 class="mb-0 text-white fw-bold text-shadow">
                        <i class="bi bi-eye me-2"></i>
                        Vista Previa del Producto
                    </h6>
                </div>
                <div class="card-body" style="background: linear-gradient(145deg, rgba(255,255,255,0.9) 0%, rgba(248,249,250,0.9) 100%);">
                    <div class="row align-items-center">
                        <div class="col-auto">
                            <div class="avatar-lg bg-gradient-icon text-white rounded-circle d-flex align-items-center justify-content-center shadow-lg pulse-animation" style="width: 70px; height: 70px;">
                                <i class="bi bi-box fs-3"></i>
                            </div>
                        </div>
                        <div class="col">
                            <div id="previewContent">
                                <h6 class="mb-1 text-muted">Nombre del producto aparecerá aquí</h6>
                                <small class="text-muted">Complete el formulario para ver la vista previa</small>
                            </div>
                        </div>
                        <div class="col-auto">
                            <span class="badge bg-gradient-badge text-white px-3 py-2 shadow-sm">Vista Previa</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>