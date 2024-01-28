<?php helper('form') ?>
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
<div class="col-5 mx-auto">

</div>
<?php echo validation_list_errors() ?>
<div class="text-center">
  <form action="<?php echo base_url() ?>articulos/guardar" method="post" enctype="multipart/form-data">

    <input placeholder="Nombre" name="nombre" class="form-control" value="<?php echo set_value('') ?>" required autocomplete="off" />

    <div class="text-center">

      <input placeholder="Marca" name="marca" class="form-control" <?php echo base_url('') ?> required autocomplete="off" />
    </div>

    <div class="text-center">

      <input placeholder="Precio" name="precio" class="form-control" <?php echo base_url('') ?>required autocomplete="off"></textarea>
    </div>

    <div class="text-center">

      <input placeholder="Imagen" type="file" name=imagen required autocomplete="off" />
    </div>

    <div>
      <input type="submit" class="btn btn-outline-success" value="Enviar">
    </div>
</div>
</form>
<?php if (isset($usuario_logeado)) : ?>
          <div>Bienvenido, <?php echo $usuario_logeado; ?></div>
        <?php endif; ?>

</body>

<script>

  function destruirSesion() {
    session_start();
    session_destroy();
    exit();
  }
</script>

</html>