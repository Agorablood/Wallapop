<script>
    $('.form').find('input, textarea').on('keyup blur focus', function (e) {
  
  var $this = $(this),
      label = $this.prev('label');

	  if (e.type === 'keyup') {
			if ($this.val() === '') {
          label.removeClass('active highlight');
        } else {
          label.addClass('active highlight');
        }
    } else if (e.type === 'blur') {
    	if( $this.val() === '' ) {
    		label.removeClass('active highlight'); 
			} else {
		    label.removeClass('highlight');   
			}   
    } else if (e.type === 'focus') {
      
      if( $this.val() === '' ) {
    		label.removeClass('highlight'); 
			} 
      else if( $this.val() !== '' ) {
		    label.addClass('highlight');
			}
    }

});

$('.tab a').on('click', function (e) {
  
  e.preventDefault();
  
  $(this).parent().addClass('active');
  $(this).parent().siblings().removeClass('active');
  
  target = $(this).attr('href');

  $('.tab-content > div').not(target).hide();
  
  $(target).fadeIn(600);
  
});
</script>
<style>
body {
  background: #c1bdba;
  font-family: 'Titillium Web', sans-serif;
  overflow-y: scroll;
}

a {
  text-decoration: none;
  color: #1ab188;
  transition: 0.5s ease;
}

a:hover {
  color: #117a6f;
}

.form {
  background: rgba(19, 35, 47, 0.9);
  padding: 40px;
  max-width: 600px;
  margin: 40px auto;
  border-radius: 4px;
  box-shadow: 0 4px 10px 4px rgba(19, 35, 47, 0.3);
}

.tab-group {
  list-style: none;
  padding: 0;
  margin: 0 0 40px 0;
  margin-left: 150px;

  
  
}

.tab-group:after {
  content: "";
  display: table;
  clear: both;
}

.tab-group li a {
  display: block;
  text-decoration: none;
  padding: 15px;
  background: rgba(160, 179, 176, 0.25);
  color: #a0b3b0;
  font-size: 20px;
  float: left;
  width: 50%;
  text-align: center;
  cursor: pointer;
  transition: 0.5s ease;
}

.tab-group li a:hover {
  background: #117a6f;
  color: #ffffff;
  
}

.tab-group .active a {
  background: #1ab188;
  color: #ffffff;
}

.tab-content > div:last-child {
  display: none;
}

h1 {
  text-align: center;
  color: #ffffff;
  font-weight: 300;
  margin: 0 0 40px;
}

label {
  position: absolute;
  transform: translateY(6px);
  left: 13px;
  color: rgba(255, 255, 255, 0.5);
  transition: all 0.25s ease;
  -webkit-backface-visibility: hidden;
  pointer-events: none;
  font-size: 22px;
}

label .req {
  margin: 2px;
  color: #1ab188;
}

label.active {
  transform: translateY(50px);
  left: 2px;
  font-size: 14px;
}

label.highlight {
  color: #ffffff;
}

input,
textarea {
  font-size: 22px;
  display: block;
  width: 100%;
  height: 100%;
  padding: 5px 10px;
  background: none;
  background-image: none;
  border: 1px solid #a0b3b0;
  color: #ffffff;
  border-radius: 0;
  transition: border-color 0.25s ease, box-shadow 0.25s ease;
}

input:focus,
textarea:focus {
  outline: 0;
  border-color: #1ab188;
}

textarea {
  border: 2px solid #a0b3b0;
  resize: vertical;
}

.field-wrap {
  position: relative;
  margin-bottom: 40px;
}

.top-row:after {
  content: "";
  display: table;
  clear: both;
}

.top-row > div {
  float: left;
  width: 48%;
  margin-right: 4%;
}

.top-row > div:last-child {
  margin: 0;
}

.button {
  border: 0;
  outline: none;
  border-radius: 0;
  padding: 15px 0;
  font-size: 2rem;
  font-weight: 600;
  text-transform: uppercase;
  letter-spacing: 0.1em;
  background: #1ab188;
  color: #ffffff;
  transition: all 0.5s ease;
  -webkit-appearance: none;
}

.button:hover,
.button:focus {
  background: #117a6f;
}

.button-block {
  display: block;
  width: 100%;
}

.forgot {
  margin-top: -20px;
  text-align: right;
}
</style>
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
              <input placeholder="Apellido*" type="text"required autocomplete="off"/>
            </div>
          </div>

          <div class="field-wrap">
            
            <input placeholder="Correo electrónico" type="email"required autocomplete="off"/>
          </div>
          
          <div class="field-wrap">
            <input placeholder="Introduce una contraseña" type="password"required autocomplete="off"/>
          </div>
          
          <button type="submit" class="button button-block"/>Empieza a vender/comprar</button>
          
          </form>

        </div>
        
        <div id="login">   
          <h1>Bienvenido de vuelta!</h1>
          
          <form action="/" method="post">
          
            <div class="field-wrap">
            <label>
              Correo electrónico<span class="req">*</span>
            </label>
            <input type="email"required autocomplete="off"/>
          </div>
          
          <div class="field-wrap">
            <label>
              Contraseña<span class="req">*</span>
            </label>
            <input type="password"required autocomplete="off"/>
          </div>
          
          <p class="forgot"><a href="#">Has olvidado la contraseá?</a></p>
          
          <button class="button button-block"/>Log-in</button>
          
          </form>

        </div>
        
      </div>
      
</div> 