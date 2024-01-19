<?php

namespace App\Controllers;

/**
 * @class Usuarios
 * Implementa las funciones necesarias para la gestión de usuarios
 */
class Usuarios extends BaseController
{
    public function registro(): string
    {
        $data['nombre'] = 'Usuarios';

        return view('templates/header', $data).view('registro_usuario');
    }
}
