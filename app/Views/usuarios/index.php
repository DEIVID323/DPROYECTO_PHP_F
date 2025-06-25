<?php echo $this->extend('plantilla/layout_usuario'); ?>
<?php echo $this->section('contenido'); ?>

<h2 class="mb-4 text-center text-primary fw-bold display-4">Lista de usuarios</h2>
<a href="<?= base_url('usuarios/crear') ?>" class="btn btn-success mb-4 shadow-lg px-4 py-2 fs-5">Crear Usuario</a>

<div class="w-full flex flex-col items-center justify-center">
    <table class="table table-hover table-bordered align-middle shadow-lg rounded-4" style="background: #f8f9fa;">
        <thead style="background: linear-gradient(90deg, #0d6efd 0%, #6610f2 100%); color: #fff; font-size: 1.2rem;">
            <tr>
                <th class="bg-red-200">ID</th>
                <th class="py-3">Nombre</th>
                <th class="py-3">Apellido</th>
                <th class="py-3">Correo</th>
                <th class="py-3">Contraseña</th>
                <th class="py-3">Dirección</th>
                <th class="py-3">Teléfono</th>
                <th class="py-3">Fecha de Registro</th>
                <th class="py-3">Rol ID</th>
                <th class="py-3">Acciones</th>
            </tr>
        </thead>
        <tbody style="font-size: 1.1rem;">
        <?php foreach ($usuarios as $usuario): ?>
            <tr>
                <td class="fw-bold"><?= $usuario['idUsuario'] ?></td>
                <td><?= $usuario['Nombre'] ?></td>
                <td><?= $usuario['Apellido'] ?></td>
                <td><?= $usuario['Correo'] ?></td>
                <td><span class="badge bg-warning text-dark"><?= $usuario['Contrasena'] ?></span></td>
                <td><?= $usuario['Direccion'] ?></td>
                <td><?= $usuario['Telefono'] ?></td>
                <td><?= $usuario['Fecha_registro'] ?></td>
                <td><span class="badge bg-secondary"><?= $usuario['Rol_idRol'] ?></span></td>
                <td>
                    <a href="<?= base_url('usuarios/editar/' . $usuario['idUsuario']) ?>" class="btn btn-warning btn-sm me-2">Editar</a>
                    <a href="<?= base_url('usuarios/eliminar/' . $usuario['idUsuario']) ?>" class="btn btn-danger btn-sm" onclick="return confirm('¿Seguro que deseas eliminar este usuario?');">Eliminar</a>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>

<style>
    body {
        background: linear-gradient(135deg, #e9ecef 0%, #f8fafc 100%);
    }

    .table th, .table td {
        vertical-align: middle !important;
        text-align: center;
    }

    .table th {
        letter-spacing: 1px;
        font-weight: 700;
        text-shadow: 1px 1px 2px #0002;
    }

    .table-hover tbody tr:hover {
        background-color: #dee2e6;
        transition: background 0.3s ease;
    }

    .btn-success {
        background: linear-gradient(90deg, #20c997 0%, #198754 100%);
        border: none;
    }

    .btn-success:hover {
        background: linear-gradient(90deg, #198754 0%, #20c997 100%);
    }

    .btn-warning {
        background: linear-gradient(90deg, #ffc107 0%, #fd7e14 100%);
        border: none;
        color: #fff;
    }

    .btn-warning:hover {
        background: linear-gradient(90deg, #fd7e14 0%, #ffc107 100%);
        color: #fff;
    }

    .btn-danger {
        background: linear-gradient(90deg, #dc3545 0%, #ff6f61 100%);
        border: none;
        color: #fff;
    }

    .btn-danger:hover {
        background: linear-gradient(90deg, #ff6f61 0%, #dc3545 100%);
        color: #fff;
    }

    .badge.bg-secondary {
        background: linear-gradient(90deg, #adb5bd 0%, #6c757d 100%) !important;
        color: #fff !important;
    }

    .badge.bg-warning {
        background: linear-gradient(90deg, #ffc107 0%, #fd7e14 100%) !important;
        color: #212529 !important;
    }
</style>

<?php echo $this->endSection(); ?>