<?php
namespace app\Models;
use  CodeIgniter\Model;
class UsuariosModel extends Model{
    protected $table = 'usuarios';
    protected $allowedFields = ['nombre', 'direccion', 'dni'];

    public function getUsuarios()
    {
        return $this->findAll();
    }
    

}