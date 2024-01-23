<?php

namespace App\Controllers;

use App\Models\ArticulosModel;



class Articulos extends BaseController
{
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
        $data = [];
        $data['nombre'] = $this->request->getPost('nombre'); 
        $data['marca'] = $this->request->getPost('marca'); 
        $data['precio'] = $this->request->getPost('precio'); 

        $imagen = $this->request->getFile('imagen');
        $nombreimagen = $imagen->getRandomName();
        // $nombreimagen = time();
        $imagen->move('../public/imagenes', $nombreimagen);

        $modelo = model(ArticulosModel::class);
        // var_dump($modelo);
        $modelo->save($data);
        //obtenemos los datos validados
        $data['guardado'] = true;
        $data['titulo'] = 'alta de articulo';
       return view('templates/header', $data).view('alta_articulo');

       
    }
    public function mostrarTodo()
    {
        $modelo = model(ArticulosModel::class);
        $data['articulos'] = $modelo->findAll();
        $data['titulo'] = 'Listado de artículos';
        return view('templates/header', $data).view('lista_articulo');
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
}
