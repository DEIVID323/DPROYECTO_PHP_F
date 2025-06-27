<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="<?= base_url('css/usuarios.css') ?>">
    <script>
    const BASE_URL = '<?= base_url() ?>';
    </script>
    <script src="<?= base_url('js/usuarios.js') ?>"></script>

    
    <!-- Bootstrap JS (solo una vez y al final) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>



</head>
<body>
    <?php echo $this->renderSection('contenido'); ?>
</body>
</html>
