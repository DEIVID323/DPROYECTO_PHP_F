<?php  echo $this->extend('plantilla/layout_pro'); ?>
<?php echo $this->section('contenido'); ?>

<h1 class="mb-5 mt-4 text-center bg-dark p-4 rounded shadow" style="color: #ff8c00;">
    <i class="bi bi-box-seam"></i> Lista de Productos
</h1>
<div class="d-flex justify-content-end mb-3">
    <a href="<?= base_url('productos/crear') ?>" class="btn btn-success shadow-lg px-4 py-2 fs-5">
        <i class="bi bi-plus-circle"></i> Crear Producto
    </a>
</div>
<div class="overflow">
    <table class="table table-hover table-bordered align-middle shadow-lg rounded-4 mb-0" style="background: #f1f3f9;">
        <thead class="align-middle" style="background: linear-gradient(90deg, #0d6efd 0%, #20c997 100%); color: #fff; font-size: 1.1rem;">
            <tr>
                <th><i class="bi bi-hash"></i> ID</th>
                <th><i class="bi bi-box-seam"></i> Nombre</th>
                <th><i class="bi bi-upc"></i> Referencia</th>
                <th><i class="bi bi-currency-dollar"></i> Precio</th>
                <th><i class="bi bi-stack"></i> Cantidad</th>
                <th><i class="bi bi-card-text"></i> Descripcion</th>
                <th><i class="bi bi-archive"></i> Stock</th>
                <th><i class="bi bi-tags"></i> Categoria</th>
                <th><i class="bi bi-stars"></i> Promocion</th>
                <th><i class="bi bi-gear"></i> Acciones</th>
            </tr>
        </thead>
        <tbody style="font-size: 1rem;">
        <?php foreach ($productos as $producto): ?>
            <tr>
                <td class="fw-bold"><?= $producto['idProducto'] ?></td>
                <td><?= $producto['Nombre'] ?></td>
                <td>
                    <span class="badge bg-gradient bg-secondary shadow-sm px-2 py-1 text-wrap">
                        <?= $producto['Referencia'] ?>
                    </span>
                </td>
                <td> 
                    <span class="badge bg-gradient bg-info text-dark shadow-sm px-2 py-1 text-wrap">
                    $<?= number_format($producto['Precio'], 2) ?>
                    </span>
                </td>
                <td>
                    <span class="badge bg-gradient bg-secondary shadow-sm px-2 py-1 text-wrap">
                        <?= $producto['Cantidad'] ?>
                    </span>
                </td>
                <td>
                    <span class="badge bg-gradient bg-secondary shadow-sm px-2 py-1 text-wrap">
                        <?= $producto['Descripcion'] ?>
                    </span>
                </td>
                <td>
                    <span class="badge bg-gradient bg-secondary shadow-sm px-2 py-1 text-wrap">
                        <?= $producto['Stock'] ?>
                    </span>
                </td>
                 <td>
                    <span class="badge bg-gradient bg-secondary shadow-sm px-2 py-1 text-wrap">
                        <?= $producto['Categoria'] ?>
                    </span>
                </td>
                <td>
                    <span class="badge bg-gradient bg-secondary shadow-sm px-2 py-1 text-wrap">
                        <?= $producto['Promocion_idCodigo'] ?>
                    </span>
                </td>
                <td>
                    <div class="d-flex flex-column flex-md-row gap-2 justify-content-center align-items-center">
                        <a href="<?= base_url('productos/editar/' . $producto['idProducto']) ?>" class="btn btn-warning btn-sm shadow-sm px-3 py-1 d-flex align-items-center justify-content-center">
                            <i class="bi bi-pencil-square me-1"></i> Editar
                        </a>
                        <a href="<?= base_url('productos/eliminar/' . $producto['idProducto']) ?>" class="btn btn-danger btn-sm shadow-sm px-3 py-1 d-flex align-items-center justify-content-center" onclick="return confirm('¿Seguro que deseas eliminar este producto?');">
                            <i class="bi bi-trash me-1"></i> Eliminar
                        </a>
                    </div>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>
<style>
@media (max-width: 767.98px) {
    .table thead {
        display: none;
    }
    .table tbody tr {
        display: block;
        margin-bottom: 1rem;
        border: 1px solid #dee2e6;
        border-radius: 0.5rem;
        box-shadow: 0 2px 8px rgba(0,0,0,0.05);
        background: #fff;
        max-width: 95vw;
        margin-left: auto;
        margin-right: auto;
        /* Centrar contenido */
        text-align: center;
    }
    .table tbody td {
        display: flex;
        justify-content: center;
        align-items: center;
        padding: 0.75rem 1rem;
        border: none;
        border-bottom: 1px solid #dee2e6;
        font-size: 1rem;
        text-align: center;
        gap: 0.5rem;
    }
    .table tbody td:last-child {
        border-bottom: none;
    }
    .table tbody td:before {
        content: attr(data-label);
        font-weight: bold;
        color: #0d6efd;
        flex-basis: 50%;
        text-align: left;
        margin-right: 0.5rem;
        display: flex;
        align-items: center;
        gap: 0.3rem;
    }
}
</style>
<!-- Bootstrap Icons CDN -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
<script>
    // Íconos para los data-labels en móviles
    const icons = [
        '<i class="bi bi-hash"></i> ID',
        '<i class="bi bi-box-seam"></i> Nombre',
        '<i class="bi bi-upc"></i> Referencia',
        '<i class="bi bi-currency-dollar"></i> Precio',
        '<i class="bi bi-stack"></i> Cantidad',
        '<i class="bi bi-card-text"></i> Descripcion',
        '<i class="bi bi-archive"></i> Stock',
        '<i class="bi bi-tags"></i> Categoria',
        '<i class="bi bi-stars"></i> Promocion',
        '<i class="bi bi-gear"></i> Acciones'
    ];
    document.addEventListener('DOMContentLoaded', function() {
        if(window.innerWidth < 768) {
            document.querySelectorAll('table tbody tr').forEach(tr => {
                tr.querySelectorAll('td').forEach((td, i) => {
                    td.setAttribute('data-label', icons[i]);
                });
            });
        }
    });
</script>
<?php echo $this->endSection(); ?> 