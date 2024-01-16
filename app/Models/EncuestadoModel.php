<?php

namespace App\Models;

use CodeIgniter\Model;



class EncuestadoModel extends Model
{
    protected $table = 'tencuestado';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $allowedFields =
    [
        'nombre',
        'apPaterno',
        'apMaterno',
        'dni',
        'fecha_nacimiento',
        'celular',
        'direccion',
        'ref_vivienda',
        'categoria',
        'id_promotor'
    ];
    
    public function getEncuestadosOrEncuestado($id = false)
    {
        if ($id === false) {
            return $this->findAll();
        }

        return $this->asArray()
            ->where(['id' => $id])
            ->first();
    }
    public function getEncuestadosByPromotorId($id_promotor = false)
    {
        
        return $this->asArray()
            ->where(['id_promotor' => $id_promotor])
            ->findAll();
    }

    public function getEncuestadosByCategoria($categoria = false)
    {
        
        return $this->asArray()
            ->where(['categoria' => $categoria])
            ->findAll();
    }
}
