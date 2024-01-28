<?php

namespace App\Controllers;

use App\Models\ArticulosModel;



class Articulos extends BaseController
{
    public function prueba(){
        return view("pruebaAjax");
    }
    public function pruebaAjax(){
        echo "funciona";
    }
    public function alta_articulo(): string
    {
        
        $data['nombre'] = 'Articulos';
        return view('templates/header', $data) . view('alta_articulo');
    }
    // public function crear(){

    //     helper('form');
    //     return view('templates/head')
    //     .view('templates/header')
    //     .view('crear_articulos')
    //     .view('templates/footer');
    // }
    public function guardar()
    {
        $session = session();


        $data = [];
        $data['nombre'] = $this->request->getPost('nombre'); 
        $data['marca'] = $this->request->getPost('marca'); 
        $data['precio'] = $this->request->getPost('precio'); 
        $imagen = $this->request->getFile('imagen');
        $nombreimagen = $imagen->getRandomName();
        // $nombreimagen = time();
        $imagen->move('../public/imagenes', $nombreimagen);
        $data['imagen'] = $nombreimagen;

        $modelo = model(ArticulosModel::class);
        // var_dump($modelo);
        $usuario = $session->get('usuario');
        $data['id_usuario'] = $session->get('id_logg');
        $modelo->save($data);
        //obtenemos los datos validados
        $data['guardado'] = true;
        $data['titulo'] = 'alta de articulo';
       return view('templates/header', $data).view('alta_articulo');

       
    }
    public function lista_articulos()
    {
        $modelo = model(ArticulosModel::class);
        $data['articulos'] = $modelo->findAll();
        $data['titulo'] = 'Listado de artículos';
        return view('templates/header', $data).view('lista_articulos');
    }

    public function mostrar ($id_articulo)
    {
        $modelo = model(ArticulosModel::class);
        $articulo = $modelo->find($id_articulo);
        $data['titulo'] = 'Detalle del artículo';
        return view('templates/header', $data).view('articulo');
    }
    public function home(){
        $data['nombre'] = 'Articulos';
        return view('templates/header', $data) . view('home');
    }
    public function destruirSesion()
    {
        $session = session();
        $session->destroy();
        
        // Redireccionar a la página de inicio
        return redirect()->to(base_url('Articulos/home'));
    }
    
    
}
