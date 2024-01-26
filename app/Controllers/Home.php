<?php

namespace App\Controllers;

use App\Models\HomeModel;

class Articulos extends BaseController
{
    public function Lista_articulo(): string
    {
        $data['nombre'] = 'LOGIN/REGISTRER';
        return view('templates/header', $data) . view('home');
    }
    

}







