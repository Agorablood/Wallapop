<?php helper('form') ?>
<div class="col-5 mx-auto">
  <?php
  if (isset($guardado)) {
  ?>
    <p>Los datos se han guardado correctamente</p>
    <a href="<?php echo base_url() ?>">Volver</a>
  <?php
  } else {

  ?>
  
</div>
<?php echo validation_list_errors() ?>
<div class="text-center">
  <form action="<?php echo base_url() ?>articulos/guardar" method="post" enctype="multipart/form-data">

    <input placeholder="Nombre" type="text" name="nombre" class="form-control" value="<?php echo set_value('') ?>" required autocomplete="off" />


    <div class="text-center">

      <input placeholder="Marca" type="text" name="marca" required autocomplete="off" />
    </div>

    <div class="text-center">

      <input placeholder="Precio" name="precio" class="form-control" <?php echo base_url('') ?>required autocomplete="off"></textarea>
    </div>

    <div class="text-center">

      <input placeholder="Imagen" type="file" name=imagen required autocomplete="off" />
    </div>

    <div>
      <input type="submit" value="Enviar">
    </div>
</div>
</form>
</body>
<?php
  }
?>

</html>