<?php

namespace App\Models;

use CodeIgniter\Model;



class GestacionModel extends Model
{
    protected $table = 'tgestante';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $allowedFields =
    [
        'fecha_parto',
        'estab_salud',
        'sexo_bebe',
        'id_encuestado'
    ];
    
    public function getGestacionesOrGestacion($id = false)
    {
        if ($id === false) {
            return $this->findAll();
        }

        return $this->asArray()
            ->where(['id' => $id])
            ->first();
    }
    public function getGestacionesByEncuestadoId($id_encuestado=false)
    {
        if ($id_encuestado === false) {
            return $this->findAll();
        }

        return $this->asArray()
            ->where(['id_encuestado' => $id_encuestado])
            ->findAll();
    }
    public function getGestacionesAndEncuestadoData()
    {
        $db = \Config\Database::connect();
        $query = $db->query("SELECT tgestante.id as id, tencuestado.categoria as categoria, tencuestado.dni as dni, tencuestado.apPaterno as apPaterno,
        tencuestado.apMaterno as apMaterno, tencuestado.nombre as nombre, tencuestado.fecha_nacimiento, tencuestado.direccion, tencuestado.celular FROM tgestante INNER JOIN tencuestado 
        ON tgestante.id_encuestado=tencuestado.id");
        return $query->getResultArray();
    }

}
