<h1>LISTA DE ARTICULOS</h1>
<div class="imagenes">
    <?php
    for ($i = 0; $i < count($articulos); $i++) {
        $nombre = $articulos[$i]['nombre'];
        $marca = $articulos[$i]['marca'];
        $precio = $articulos[$i]['precio'];
        $rutaImagen = $articulos[$i]['imagen'];
    ?>
        
        <img src="<?php echo base_url() . 'imagenes/' . $rutaImagen; ?>" /><br>
        <p>Nombre: <?php echo $nombre; ?></p>
        <p>Marca: <?php echo $marca; ?></p>
        <p>Precio: <?php echo $precio; ?></p>
        <hr>
    <?php
    }
    ?>

</div>
