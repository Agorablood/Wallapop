<?php
namespace app\Models;
use  CodeIgniter\Model;
class UsuariosModel extends Model{
    protected $table = 'usuarios';
    protected $allowedFields = ['nombre', 'contraseña1', 'contraseña2'];

    public function getUsuarios()
    {
        return $this->findAll();
    }
    

}