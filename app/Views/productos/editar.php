<?= $this->extend('plantilla/layout'); ?>
<?= $this->section('contenido'); ?>
<!-- Bootstrap 5 CDN (agrega esto si tu plantilla no lo incluye ya) -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<!-- Bootstrap Icons CDN -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card shadow-lg rounded-4">
                <div class="card-body">
                    <h2 class="mb-4 text-center text-primary fw-bold display-4">
                        <i class="bi bi-pencil-square me-2"></i>Editar Producto
                    </h2>
<form method="post" action="<?= base_url('productos/actualizar/' . $producto['idProducto']) ?>" class="p-4 shadow-lg rounded-4 mx-auto" style="background: #f1f3f9; max-width: 900px;">

    <div class="mb-4">
        <label for="idProducto" class="form-label fw-bold fs-5">
            <i class="bi bi-hash me-1"></i>Id
        </label>
        <input type="text" name="idProducto" id="idProducto" value="<?= $producto['idProducto'] ?>" class="form-control text-center fw-bold fs-5 rounded-3 shadow-sm" readonly>
    </div>

    <div class="row mb-4">
        <div class="col-md-6">
            <label for="Nombre" class="form-label fw-bold fs-5">
                <i class="bi bi-box-seam me-1"></i>Nombre
            </label>
            <input type="text" name="Nombre" id="Nombre" value="<?= esc($producto['Nombre']) ?>" class="form-control text-center fs-5 rounded-3 shadow-sm">
        </div>

        <div class="col-md-6">
            <label for="Referencia" class="form-label fw-bold fs-5">
                <i class="bi bi-upc-scan me-1"></i>Referencia
            </label>
            <input type="number" step="0.01" name="Referencia" id="Referencia" value="<?= $producto['Precio'] ?>" class="form-control text-center fs-5 rounded-3 shadow-sm">
        </div>
    </div>

    <div class="row mb-4">
        <div class="col-md-4">
            <label for="Precio" class="form-label fw-bold fs-5">
                <i class="bi bi-currency-dollar me-1"></i>Precio
            </label>
            <input type="number" name="Precio" id="Precio" value="<?= $producto['Stock'] ?>" class="form-control text-center fs-5 rounded-3 shadow-sm">
        </div>

        <div class="col-md-4">
            <label for="Cantidad" class="form-label fw-bold fs-5">
                <i class="bi bi-123 me-1"></i>Cantidad
            </label>
            <input type="number" name="Cantidad" id="Cantidad" value="<?= $producto['Cantidad'] ?>" class="form-control text-center fs-5 rounded-3 shadow-sm">
        </div>

        <div class="col-md-4">
            <label for="Stock" class="form-label fw-bold fs-5">
                <i class="bi bi-stack me-1"></i>Stock
            </label>
            <input type="number" name="Stock" id="Stock" value="<?= $producto['Stock'] ?>" class="form-control text-center fs-5 rounded-3 shadow-sm">
        </div>
    </div>

    <div class="mb-4">
        <label for="Descripcion" class="form-label fw-bold fs-5">
            <i class="bi bi-card-text me-1"></i>Descripcion
        </label>
        <input type="text" name="Descripcion" id="Descripcion" value="<?= esc($producto['Descripcion']) ?>" class="form-control text-center fs-5 rounded-3 shadow-sm">
    </div>

    <div class="mb-5">
        <label for="Categoria" class="form-label fw-bold fs-5">
            <i class="bi bi-tags me-1"></i>Categoria
        </label>
        <input type="text" name="Categoria" id="Categoria" value="<?= esc($producto['Categoria']) ?>" class="form-control text-center fs-5 rounded-3 shadow-sm">
    </div>

    <div class="text-center">
        <button type="submit" class="btn btn-primary btn-lg px-5 shadow">
            <i class="bi bi-save2 me-2"></i>Guardar
        </button>
        <br>
        <br>
        <a href="<?= base_url('/productos') ?>" class="btn btn-secondary btn-lg ms-3 px-5 shadow">
            <i class="bi bi-x-circle me-2"></i>Cancelar
        </a>
    </div>

</form>

<?= $this->endSection(); ?>