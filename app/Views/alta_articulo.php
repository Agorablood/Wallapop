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
        <label for="nombre" class="form-label">Nombre</label>
        <input type="text" name="nombre" class="form-control" value="<?php echo set_value('') ?>" />


        <div class="text-center">
            <label for="marca">Marca</label>
            <input type="text" name="marca" />
        </div>

        <div class="text-center">
            <label for="precio" class="form-label">precio</label>
            <input name="precio" class="form-control" <?php echo base_url('') ?>></textarea>
        </div>

        <div class="text-center">
            <label for="imagen">Imagen</label>
            <input type="file" name=imagen />
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