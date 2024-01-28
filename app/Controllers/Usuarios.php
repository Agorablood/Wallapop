<?php

namespace App\Controllers;

use App\Models\UsuariosModel;

$hasher = new \CodeIgniter\I18n\Time();


/**
 * @class Usuarios
 * Implementa las funciones necesarias para la gestión de usuarios
 */
class Usuarios extends BaseController
{
    // public function login(){
    //     $usuario = new UsuariosModel();
    //     if($this->request->getmethod() == 'post'){
    //         $respuesta = $usuario->login(
    //             $this->request->getPost('nombre'),
    //             $this->request->getPost('password')
    //             );
    //             return redirect()->to(base_url().'/Articulos/alta_articulo');  //red
    //             }else{
    //                 $datos['head']=view('templates/header');
    //                 echo view('usuarios/login',$datos);
    //                 }


    // }
    public function registro_usuario(): string
    {
        $modelo = model(UsuariosModel::class);
        $data['nombre'] = 'Usuarios';

        return view('templates/header', $data) . view('home');
    }
    public function guardar()
    {
        $data = [];
        $data['nombre'] = $this->request->getPost('nombre');
        $data['contraseña1'] = $this->request->getPost('contraseña1');
        $data['contraseña1'] = $this->request->getPost('contraseña1');


        $modelo = model(UsuariosModel::class);
        $modelo->save($data);
        // //obtenemos los datos validados
        $data['guardado'] = true;
        $data['titulo'] = 'registro de usuario';
        return view('templates/header', $data) . view('home');
    }
    public function mostrarTodo()
    {
        $modelo = model(UsuariosModel::class);
        $data['usuarios'] = $modelo->findAll();
        $data['titulo'] = 'Listado de usuarios';
        return view('templates/header', $data) . view('usuario');
    }
    public function mostrar($id_usuario)
    {
        $modelo = model(UsuariosModel::class);
        $usuario = $modelo->find($id_usuario);
        $data['titulo'] = 'Detalle del usuario';
        return view('templates/header', $data) . view('usuario');
    }
    public function home()
    {
        $data['nombre'] = 'Usuarios';
        return view('templates/header', $data) . view('home');
    }

    public function validarUsuario()
    {
        $modelo = model(UsuariosModel::class);
        $modelo->select('id, nombre, contraseña1');

        $nombre = $this->request->getPost('nombre');
        $contraseña = $this->request->getPost('contraseña1');

        $modelo->where('nombre', $nombre);
        $modelo->where('contraseña1', $contraseña);
        $resultado = $modelo->find();

        // Verificar si el resultado no está vacío antes de acceder a sus elementos
        if (!empty($resultado)) {
            $session = session();

            // Utilizar una clave más descriptiva para el ID del usuario en la sesión
            $session->set('usuario_activo', $nombre);
            $session->set('id_logg', $resultado[0]['id']);

            return view('templates/header') . view('alta_articulo');
        } else {
            $datos['error_login'] = "El nombre o la contraseña son incorrectos";
            return view('templates/header') . view('home', $datos);
        }
    }
    
    public function mostrarVista()
    {
        $session = session();

        if ($session->has('usuario_activo') && $session->has('usuario_id')) {
            $usuarioActivo = $session->get('usuario_activo');
            $usuarioId = $session->get('usuario_id');

            // Cargar la vista del header con los datos del usuario
            return view('templates/header', ['usuarioActivo' => $usuarioActivo, 'usuarioId' => $usuarioId]);
        } else {
            // Redirigir a la página de inicio de sesión o realizar alguna acción
            return redirect()->to(base_url('ruta_de_inicio_de_sesion'));
        }
    }
}
