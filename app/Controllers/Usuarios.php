<?php

namespace App\Controllers;

use App\Models\UsuariosModel;

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
        return view('templates/header', $data).view('usuario');
    }

    public function mostrar ($id_usuario)
    {
        $modelo = model(UsuariosModel::class);
        $usuario = $modelo->find($id_usuario);
        $data['titulo'] = 'Detalle del usuario';
        return view('templates/header', $data).view('usuario');
    }
    public function home(){
        $data['nombre'] = 'Usuarios';
        return view('templates/header', $data) . view('home');
    }
}
