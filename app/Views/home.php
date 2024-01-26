<?php

use app\Models\UsuariosModel;

helper('form');

?>
<button href="<?php echo base_url()?>Articulos/destruirSesion">cerrar sesion</button>
<div class="form">

  <ul class="tab-group">
    <li class="tab active"><a href="#" onclick="cambiarFormulario('login')">Iniciar Sesión</a></li>
    <li class="tab"><a href="#" onclick="cambiarFormulario('signup')">Registrarse</a></li>
  </ul>


  <div class="tab-content">
    <div id="login">
      <div class="error">
        <h1>Bienvenido de vuelta!</h1>
        <?php
        if (isset($error_login)) {
          echo '<p>Error en el inicio de sesión</p>';
        }
        ?>
      </div>
      <form action="<?php echo base_url('Usuarios/validarUsuario') ?>" method="post" enctype="multipart/form-data">

        <div class="field-wrap">
          <label>
            Usuario<span class="req">*</span>
          </label>
          <input type="texto" name="nombre" required autocomplete="off" />
        </div>

        <div class="field-wrap">
          <label>
            Contraseña<span class="req">*</span>
          </label>
          <input id="contraseña3" type="password" name="contraseña1" required autocomplete="off" />
        </div>
        <p id="nuevo_usuario" class="forgot"><a onclick="cambiarFormulario('signup')">¿Nuevo usuario? Regístrate aquí.</a></p>

        <button type="button" onclick="mostrarOcultarContraseña()">Mostrar Contraseña</button>
        <button class="button button-block" />Log-in</button>

      </form>

    </div>
    <div id="signup">
      <h1 id="titulo_registro">Registrate gratis</h1>

      <form action="<?php echo base_url() ?>Usuarios/guardar" method="post" enctype="multipart/form-data" onsubmit="return validarFormulario()">

        <div class="top-row">
          <div class="field-wrap">
            <label>
              Nombre<span class="req">*</span>
            </label>
            <input type="text" name="nombre" required autocomplete="off" />
          </div><br>
        </div>

        <div class="field-wrap">
          <label>
            Contraseña<span class="req">*</span>
          </label>
          <input type="password" id="contraseña1" name="contraseña1" required autocomplete="off" />
        </div>

        <div class="field-wrap">
          <label>
            Repite la Contraseña<span class="req">*</span>
          </label>
          <input type="password" id="contraseña2" name="contraseña2" required autocomplete="off" />
        </div>


        <button id="show_password" type="button" onclick="mostrarOcultarContraseña()">Mostrar Contraseña</button>

        <button type="submit" class="button button-block"> Empieza a vender/comprar</button>


      </form>

    </div>


  </div>

</div>

<script>
  $('.form').find('input, textarea').on('keyup blur focus', function(e) {
    var $this = $(this),
      label = $this.prev('label');

    if (e.type === 'keyup') {
      if ($this.val() === '') {
        label.removeClass('active highlight');
      } else {
        label.addClass('active highlight');
      }
    } else if (e.type === 'blur') {
      if ($this.val() === '') {
        label.removeClass('active highlight');
      } else {
        label.removeClass('highlight');
      }
    } else if (e.type === 'focus') {
      if ($this.val() === '') {
        label.removeClass('highlight');
      } else if ($this.val() !== '') {
        label.addClass('highlight');
      }
    }
  });

  $('.tab a').on('click', function(e) {
    e.preventDefault();
    $(this).parent().addClass('active');
    $(this).parent().siblings().removeClass('active');

    target = $(this).attr('href');

    $('.tab-content > div').not(target).hide();
    $(target).fadeIn(60);
  });

  function mostrarOcultarContraseña() {
    var campoContraseña = document.getElementById("contraseña1");
    var campoContraseña1 = document.getElementById("contraseña2");
    var campoContraseña2 = document.getElementById("contraseña3");

    // Cambiar el tipo de campo de contraseña
    if (campoContraseña.type === "password") {
      campoContraseña.type = "text";
      campoContraseña1.type = "text";
      campoContraseña2.type = "text";
    } else {
      campoContraseña.type = "password";
      campoContraseña1.type = "password";
      campoContraseña2.type = "password";
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

  //Espera 2000 milisegundos (2 segundos) y luego redirige

  // setTimeout(function() {
  //   if (sesionIniciada=true) {
  //     window.location.href = "home";
  //   } else {
  //     alert('No se pudo iniciar sesión correctamente');
  //     window.location.href = '<?php echo base_url('Articulos/alta_articulo') ?>';
  //   }
  // });

  function cambiarFormulario(formulario) {
    if (formulario === 'signup') {
      $("#signup").show();
      $("#login").hide();
      console.log("Cambiando a formulario: " + formulario)
    } else if (formulario === 'login') {
      $("#signup").hide();
      $("#login").show();
      console.log("Cambiando a formulario: " + formulario)
    }

    function destruirSesion() {
    session_start();
    session_destroy();
    exit();
}


  }
</script>