<?php
namespace app\Models;
use  CodeIgniter\Model;
class UsuariosModel extends Model{
    protected $table = 'usuarios';
    protected $allowedFields = ['id','nombre', 'contraseña1'];

    public function getUserByNameAndPassword($nombre, $contraseña)
    {
        return $this->where(['nombre' => $nombre, 'contraseña1' => $contraseña])->first();
    }
    public function getUsuarios()
    {
        return $this->findAll();
    }
    

}