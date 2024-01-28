<?php if (session()->get('usuario_logeado')): ?>
    <?php
    // En algún lugar de tu controlador o vista
    $session = session();
    if ($session->has('usuario_activo') && $session->has('usuario_id')) {
        // El usuario está logeado
        $usuarioActivo = $session->get('usuario_activo');
        $usuarioId = $session->get('usuario_id');
        // Puedes hacer lo que necesites con esta información
    } else {
        // El usuario no está logeado
        // Redirige a la página de inicio de sesión o realiza alguna acción
    }
    ?>
<?php endif; ?>
<!-- tu_vista.php -->
<?php if (isset($usuarioActivo)): ?>
    <p>Sesión iniciada como: <?php echo $usuarioActivo; ?></p>
<?php endif; ?>
<h1>LISTA DE ARTICULOS</h1>

    <?php
    for ($i = 0; $i < count($articulos); $i++) {
        $nombre = $articulos[$i]['nombre'];
        $marca = $articulos[$i]['marca'];
        $precio = $articulos[$i]['precio'];
        $rutaImagen = $articulos[$i]['imagen'];
    ?>
    <div class="imagenes">
        <img src="<?php echo base_url() . 'imagenes/' . $rutaImagen; ?>" /><br>
        <p>Nombre: <?php echo $nombre; ?></p>
        <p>Marca: <?php echo $marca; ?></p>
        <p>Precio: <?php echo $precio; ?></p>
    </div>
        
    <?php
    }
    ?>

