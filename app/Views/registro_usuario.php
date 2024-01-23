<?php

use app\Models\UsuariosModel;

helper('form') ?>
<div class="col-5 mx-auto">
  <?php
  if (isset($guardado)) {
  ?>
    <p>Los datos se han guardado correctamente</p>
    <a href="registro_usuario">Volver</a>
    <script>
      // Espera 2000 milisegundos (2 segundos) y luego redirige
      setTimeout(function() {
        window.location.href = 'registro_usuario'; // Reemplaza 'tu_pagina.html' con la URL a la que quieres redirigir
      }, 2000);
    </script>
  <?php
  } else {

  ?>
</div>
<?php echo validation_list_errors() ?>
<form action="<?php echo base_url() ?>Usuarios/guardar" method="post" enctype="multipart/form-data" onsubmit="return validarFormulario()">

  <input placeholder="Nombre" type="text" name="nombre" required autocomplete="off" />
  <input placeholder="Contraseña" type="password" id="contraseña1" name="contraseña1" required autocomplete="off" />
  <input placeholder="Repite la contraseña" type="password" id="contraseña2" name="contraseña2" required autocomplete="off" />
  <button type="button" onclick="mostrarOcultarContraseña()">Mostrar Contraseña</button>
  <input type="submit" value="Enviar">
</form>



</body>
<?php
  }
?>
<script>
  function mostrarOcultarContraseña() {
    var campoContraseña = document.getElementById("contraseña1");
    var campoContraseña1 = document.getElementById("contraseña2");

    // Cambiar el tipo de campo de contraseña
    if (campoContraseña.type === "password") {
      campoContraseña.type = "text";
      campoContraseña1.type = "text";

    } else {
      campoContraseña.type = "password";
      campoContraseña1.type = "password";
    }
  }

  function validarFormulario() {
    var password = document.getElementById("contraseña1").value;
    var repetirPassword = document.getElementById("contraseña2").value;

    if (password !== repetirPassword) {
      alert("Las contraseñas no coinciden. Por favor, inténtalo de nuevo.");
      return false; // Evitar que el formulario se envíe
    }

    return true; // Permitir que el formulario se envíe
  }
</script>

</html>