
<div>
    <?php

    use App\Controllers\Articulos;

    for ($i = 0; $i < count($articulos); $i++) {
    ?>
        <p>Artículo: <?php echo $articulos[$i]['nombre'] ?></p>
        <p>Marca: <?php echo $articulos[$i]['marca'] ?></p>
        <p>Precio: <?php echo $articulos[$i]['precio'] ?></p>
        <?php
        $rutaImagen = base_url('imagenes/'.$articulos[$i]['imagen1']);
        ?>
        <p><img src="<?php echo $rutaImagen ?>" /></p>
        <hr>
    <?php
    }
    ?>
</div>