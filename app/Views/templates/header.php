<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Prueba BBDD</title>
    <link rel="shortcut icon" href="public/logo/aguilawallapop.jpg" type="image/x-icon">
    <link rel="stylesheet" href="<?php echo base_url("css/estilos.css") ?>" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="<?php echo base_url('js/jquery.js') ?>">
    </script>
</head>

<body>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <a href="<?php echo base_url() ?>articulos/lista_articulos" class="navbar-brand btn btn-outline-success">Inicio</a>
            <a href="<?php echo base_url() ?>articulos/home" class="navbar-brand btn btn-outline-success">Login/Register</a>
            <a href="<?php echo base_url() ?>articulos/alta_articulo" class="navbar-brand btn btn-outline-success">Alta articulo</a>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">

                <form class="d-flex" role="search">
                    <input class="form-control me-2" type="search" placeholder="Buscar articulo" aria-label="Search">
                    <a href="<?php echo base_url() ?>articulos/lista_articulos" class="btn btn-outline-success" href="#">Buscar</a>
                    
                </form>
            </div>
            
            <?php if (isset($usuarioActivo)) : ?>
                <p>Sesión iniciada como: <?= $usuarioActivo; ?></p>
            <?php endif; ?>
        </div>
    </nav>