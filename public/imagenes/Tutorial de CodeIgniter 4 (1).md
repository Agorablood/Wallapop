# Tutorial de CodeIgniter 4:

## Instalación y puesta en funcionamiento:

* Descargar de https://codeigniter.com
* Trasladar esa carpeta a htdocs.
* Renombrarla con un nombre acorde al proyecto.
* Abrirla con VSCode.
* Renombrar el archivo env a .env
* Abrir la página principal desde un navegador y copiar la URL.
* Ir al archivo .env, descomentar la línea de base_url y poner como dirección la que hemos copiado.
* En ese mismo archivo, cambiar la variable environment por development o testing.
* Ir al archivo Config/Routing y cambiar la variable autorouting a true.
* Los archivos de imágenes, css y js tienen que estar en la carpeta public.

## Controladores:
Para crear un controlador hay que crear un archivo php dentro de la carpeta de controladores con el siguiente código:

        namespace App\Controllers;

        class Ejemplo extends BaseController
        {
            public function index(): string
            {
                return view('archivo_de_la_vista'); // Este archivo tiene que estar en la carpeta views
            }
        }

* Si queremos añadir algún parámetro a la vista tenemos que crear una variable $data y añadir como elemento de ese array el valor que queramos, por ejemplo:

        $data['ciudad'] = 'Madrid';

### Obtener datos enviados desde el método Get:

        $usuario = $this->request->getGet('ciudad');

### Obtener datos enviados desde el método Post:

        $usuario = $this->request->getPost('usuario);

### Redirecciones:

* Redireccionar a una ruta concreta (controlador/función):

        return redirect()->to('controlador/funcion');

* Redireccionar al base_url:

        return redirect()->to(base_url());




## Vistas:

* En la vista podemos usar o mostrar una variable creada en el controlador sin tener en cuenta la variable $data:

        echo $ciudad

## Modelos:

* Tienen que estar dentro de la carpeta App/Models.

* El nombre del modelo tiene que ser el mismo de la clase, terminado en Model.php:

        <?php

        namespace App\Models;
        use CodeIgniter\Model;

        class ArticulosModel extends Model
        {
            protected $table = 'articulos'; // Nombre de la tabla de la BD
            protected $allowedFields = ['nombre', 'descripcion', 'precio']; // Campos de la tabla que queremos mapear

        }


## Utilización de modelos dentro de un controlador:

* Al principio del archivo del controlador tenemos que poner una línea similar a esta:

        use App\Models\ArticulosModel; // Nombre del modelo que queremos usar

* Para obtener los datos de la tabla tenemos que hacer lo siguiente:

        // Primero obtenemos el modelo:
        $modelo = model(ArticulosModel::class); 

        // Realizamos la consulta
        $articulos = $modelo->findAll(); // Obtenemos un array de filas de la tabla

* Si queremos obtener un solo elemento que tenga id=5:

        $articulo = $modelo->find(5);
        

* Si queremos utilizar un where:

        $this->where('id', $id);
        $articulo = $this->first();

* Si queremos hacer una consulta personalizada:

        $resultado = $this->db->query('select * from articulos where id='.$id)->getResult('array')[0];

        // El último selector [0] lo que hace es que coja solo el primer elemento de todos los resultados. Si en su lugar queremos obtener todos, no habría que ponerlo.

* Ejemplo de búsqueda:

        // Ponemos en minúscula el texto a buscar
        $texto = strtolower($texto);
        
        // En la consulta vamos a poner en minúsculas cada uno de los valores que vayamos recorriendo en el SELECT.
        
        return $this->db->query('SELECT * FROM articulos WHERE LOWER(nombre) LIKE "%'.$texto.'%"')->getResult('array');
        
        // El símbolo % del principio del LIKE sirve para ignorar la parte inicial de la cadena, y el % del final para ignorar la parte final de la misma. Esto sólo se puede hacer con LIKE. Si hiciéramos la consulta con = entonces la frase buscada por el usuario tendría que coincidir exactamente con el total de cada valor de la columna nombre.

* Para guardar datos en un modelo sólo tenemos que hacer:

        // Obtenemos el modelo:
        $modelo = model(ArticulosModel::class); 

        // Preparamos los datos a guardar:
        $data['nombre'] = 'Zapatillas deportivas';
        $data['marca'] = 'Nikke';
        $data['precio'] = 50;
        
        // Realizamos la consulta
        $articulos = $modelo->save($datos);



## Validación de formularios:

* Este framework nos permite realizar la validación de formularios de forma automática.

### Código en el CONTROLADOR
* Habria que poner este código en una función 

        helper('form');

        $datos_validacion = [
            'nombre' => 'required|min_length[3]|max_length[255]', // Estas son reglas de validación
            'descripcion' => 'required|min_length[7]|max_length[1000]',
            'precio' => 'required'
        ];

        if(!$this->validate($datos_validacion)) // Datos incorrectos
        {
            return $this->crear(); // Devolvemos al usuario a la función donde se muestra el formulario
        }

        // Si los datos son correctos hemos llegado hasta aquí y sólo tenemos que guardar los datos
        // en la BD:

        // Obtenemos los datos validados
        $post = $this->validator->getValidated();

        $modelo = model(ArticulosModel::class); // Obtenemos el modelo

        $modelo->save([
            'nombre' => $post['nombre'],
            'descripcion'  => $post['descripcion'],
            'precio'  => $post['precio'],
        ]); 

        $data['datos_guardados'] = true;
        return view('templates/head', $data).view('templates/header').view('crear_articulo').view('templates/footer');

### Código en la VISTA
* En la vistatendríamos que tener un formulario normal:

        <?php helper('form'); // Sirve para cargar las funciones de validación ?>

        <div class="col-5 mx-auto">
            <form method="post" action="<?php echo base_url() ?>articulos/guardar">
                <h1 class="text-center my-5">Añadir artículo</h1>
                <?php
                if(!empty($datos_guardados))
                {
                    ?>
                    <div class="alert alert-success">Tu artículo ha sido publicado</div>
                    <?php
                }
                else
                {
                    echo validation_list_errors(); // Esta función genera un código HTML con los errores encontrados en la validación
                }
                ?>
                <div class="mb-4">
                    <label for="nombre" class="form-label">Nombre</label>
                    <input type="text" name="nombre" class="form-control" value="<?php echo set_value('titulo') ?>" />  <!-- El value se rellena automáticamente con los datos que hubiera enviado el usuario -->
                </div>
                <div class="mb-4">
                    <label for="descripcion" class="form-label">Descripción</label>
                    <textarea name="descripcion" class="form-control"/><?php echo set_value('descripcion') ?></textarea>
                </div>
                <div class="mb-4">
                    <label for="precio" class="form-label">Precio (€)</label>
                    <input type="number" min="0" name="precio" class="form-control" value="<?php echo set_value('precio') ?>" />
                </div>
            
                <input type="submit" class="btn btn-success" value="Enviar">
            </div>
        </div>


## Cómo enviar archivos con un formulario y recibirlos en un controlador 

* En la VISTA el formulario tendría que tener el atributo enctype:

         <form method="post" enctype="multipart/form-data" action="controlador.php">
            <input type="file" name="imagen" class="form-control"  />
         </form>

* En el CONTROLADOR podemos obtener el archivo del siguiente modo:

        $imagen = $request->getFile('archivo');

* Cómo obtener el nombre:

        $nombreArchivo = $imagen->getName();
    
* Si queremos ponerle un nombre aleatorio, podemos hacer:

        $nombreAleatorio = $imagen->getRandomName();

* Para guardarlo en una carpeta:

        $imagen->move('../public/uploads', $nombreImagen);


## Sesiones:

* Crear una sesión:

        $session = session();

* Crear variables de sesión:

        $session->set('usuario', 'Espiderman2001');
        $session->set('contraseña', '1234');

* Obtener valores de la sesión:

        $session = session();
        echo $session->get('usuario'); 

* Destruir una sesión:

        $session = session();
        $session->destroy();



