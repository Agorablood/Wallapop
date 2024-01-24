<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Prueba AJAX</title>
    <link rel="shortcut icon" href="aguilawallapop.jpg" type="image/x-icon">
    <script src="<?php echo base_url('js/jquery.js')?>"></script>
</head>
<body>
    <button onclick="mostrarSaludo()">Mostrar saludo</button>
    <div id="resultado">
        
        </div>
    <script>

        $(document).ready(function(){
            $.ajax({
                url: 'http://localhost/Wallapop/public/articulos/pruebaAjax',
                success: function(respuesta){
                    console.log("La respuesta es " + respuesta);
                    $('#resultado').html(respuesta);
                    // console.log(respuesta.total);
                    // var data = respuesta.data;
                    // console.log(respuesta);
                }
            });
            
        });
    </script>
</body>
</html>