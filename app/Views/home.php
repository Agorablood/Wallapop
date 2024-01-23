
<div class="form">

  <ul class="tab-group">
    <li class="tab active"><a href="#signup">Registrarse</a></li>
    <li class="tab"><a href="#login">Iniciar Sesión</a></li>
  </ul>

  <div class="tab-content">
    <div id="signup">
      <h1>Registrate gratis</h1>

      <form action="/" method="post">

        <div class="top-row">
          <div class="field-wrap">

            <input placeholder="Nombre*" type="text" required autocomplete="off" />
          </div>

          <div class="field-wrap">
            <input placeholder="Apellido*" type="text" required autocomplete="off" />
          </div>
        </div>

        <div class="field-wrap">

          <input placeholder="Correo electrónico" type="email" required autocomplete="off" />
        </div>

        <div class="field-wrap">
          <input placeholder="Introduce una contraseña" type="password" required autocomplete="off" />
        </div>

        <button type="submit" class="button button-block" />Empieza a vender/comprar</button>

      </form>

    </div>

    <div id="login">
      <h1>Bienvenido de vuelta!</h1>

      <form action="/" method="post">

        <div class="field-wrap">
          <label>
            Correo electrónico<span class="req">*</span>
          </label>
          <input type="email" required autocomplete="off" />
        </div>

        <div class="field-wrap">
          <label>
            Contraseña<span class="req">*</span>
          </label>
          <input type="password" required autocomplete="off" />
        </div>

        <p class="forgot"><a href="#">Has olvidado la contraseá?</a></p>

        <button class="button button-block" />Log-in</button>

      </form>

    </div>

  </div>

</div>
?>
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

    $(target).fadeIn(600);

  });
</script>
