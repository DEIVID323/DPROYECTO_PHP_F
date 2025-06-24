<?= $this->extend('plantilla/layout'); ?>
<?= $this->section('contenido'); ?>

<!-- Bootstrap 5 CDN -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<!-- Bootstrap Icons CDN -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">

<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card shadow-lg rounded-4">
                <div class="card-body">
                    <h2 class="mb-4 text-center text-primary fw-bold display-4">
                        <i class="bi bi-box-seam"></i> Crear Producto
                    </h2>
                    <form method="post" action="<?= base_url('productos/guardar') ?>">
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="Nombre" class="form-label fw-bold">
                                    <i class="bi bi-tag"></i> Nombre
                                </label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="bi bi-pencil"></i></span>
                                    <input type="text" name="Nombre" id="Nombre" class="form-control text-center" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label for="Referencia" class="form-label fw-bold">
                                    <i class="bi bi-hash"></i> Referencia
                                </label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="bi bi-upc-scan"></i></span>
                                    <input type="text" name="Referencia" id="Referencia" class="form-control text-center" required>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-4">
                                <label for="Precio" class="form-label fw-bold">
                                    <i class="bi bi-currency-dollar"></i> Precio
                                </label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="bi bi-cash-stack"></i></span>
                                    <input type="number" name="Precio" id="Precio" step="0.01" class="form-control text-center" required>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <label for="Cantidad" class="form-label fw-bold">
                                    <i class="bi bi-123"></i> Cantidad
                                </label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="bi bi-plus-square"></i></span>
                                    <input type="number" name="Cantidad" id="Cantidad" class="form-control text-center" required>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <label for="Stock" class="form-label fw-bold">
                                    <i class="bi bi-boxes"></i> Stock
                                </label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="bi bi-archive"></i></span>
                                    <input type="number" name="Stock" id="Stock" class="form-control text-center" required>
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="Descripcion" class="form-label fw-bold">
                                <i class="bi bi-card-text"></i> Descripción
                            </label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="bi bi-chat-left-text"></i></span>
                                <input type="text" name="Descripcion" id="Descripcion" class="form-control text-center" required>
                            </div>
                        </div>
                        <div class="mb-4">
                            <label for="Categoria" class="form-label fw-bold">
                                <i class="bi bi-tags"></i> Categoría
                            </label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="bi bi-list-ul"></i></span>
                                <input type="text" name="Categoria" id="Categoria" class="form-control text-center" required>
                            </div>
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-success btn-lg px-5">
                                <i class="bi bi-save"></i> Guardar
                            </button>
                            <br><br>
                            <a href="<?= base_url('productos') ?>" class="btn btn-secondary btn-lg ms-3 px-5">
                                <i class="bi bi-x-circle"></i> Cancelar
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>