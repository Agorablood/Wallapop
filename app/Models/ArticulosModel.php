<?php
namespace app\Models;
use  CodeIgniter\Model;
class ArticulosModel extends Model{
    protected $table = 'articulos';
    protected $allowedFields = ['nombre', 'marca', 'precio','id_usuario','imagen'];

    public function getArticulos()
    {
        return $this->findAll();
    }
    

}