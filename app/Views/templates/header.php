<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PopWalla</title>
    <link rel="icon" href="<?php echo base_url() ?>aguilawallapop.ico" size="16x16" type="image/png">
    <link rel="icon" href="<?php echo base_url() ?>aguilawallapop.ico" size="32x32" type="image/png">
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
                <?php
                $session = session();

                // Obtener valores de la sesión
                $usuarioActivo = $session->get('usuario_activo');
                $usuarioId = $session->get('id_logg');

                // Verificar si el usuario está logeado
                if ($session->get('id_logg')) {
                    // Verificar si existen las claves correctas en la sesión
                    if ($session->has('usuario_activo') && $session->has('id_logg')) {
                        // El usuario está logeado
                ?>
                        <a id="usuario-logeado" class="btn btn-warning">Sesión iniciada como: <?php echo $usuarioActivo; ?></a>
                        <a id="usuario-deslogeado" href="<?php echo base_url(); ?>Usuarios/destruirSesion" class="navbar-brand btn btn-outline-danger">Cerrar sesión</a>

                <?php
                    } else {
                        // Las claves de sesión no están presentes, realiza alguna acción (puede ser una redirección)
                        // Por ejemplo:
                        redirect()->to(base_url('home'));
                    }
                }
                ?>
    </nav>