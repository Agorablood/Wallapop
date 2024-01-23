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
        
        <input placeholder="Nombre" type="text" name="nombre" class="form-control" value="<?php echo set_value('') ?>" required autocomplete="off"/>


        <div class="text-center">
            
            <input placeholder="Marca" type="text" name="marca" required autocomplete="off"/>
        </div>

        <div class="text-center">
            
            <input placeholder="Precio" name="precio" class="form-control" <?php echo base_url('') ?>required autocomplete="off"></textarea>
        </div>

        <div class="text-center">
            
            <input placeholder="Imagen" type="file" name=imagen required autocomplete="off"/>
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