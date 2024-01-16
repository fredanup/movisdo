<?php

namespace App\Models;

use CodeIgniter\Model;



class InfanteModel extends Model
{
    protected $table = 'tinfante';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $allowedFields =
    [
        'nombre',
        'apPaterno',
        'apMaterno',
        'dni',
        'fecha_nacimiento',
        'sexo',
        'estab_salud',
        'prematuro',
        'categoria',
        'id_encuestado'
    ];
    
    public function getInfantesOrInfante($id = false)
    {
        if ($id === false) {
            return $this->findAll();
        }

        return $this->asArray()
            ->where(['id' => $id])
            ->first();
    }
   
    public function getInfantesByEncuestadoId($id_encuestado=false)
    {
        if ($id_encuestado === false) {
            return $this->findAll();
        }

        return $this->asArray()
            ->where(['id_encuestado' => $id_encuestado])
            ->findAll();
    }
    public function getInfantesAndEncuestadoData($categoria)
    {
        $db = \Config\Database::connect();
        $query = $db->query("SELECT tinfante.id as id, tinfante.dni as dni, tinfante.apPaterno as apPaterno, tinfante.apMaterno as apMaterno, tinfante.nombre as nombre,
        tinfante.sexo as sexo, tinfante.fecha_nacimiento as fecha_nacimiento, tinfante.categoria as categoria, tencuestado.categoria as ecategoria, tencuestado.dni as edni, tencuestado.apPaterno as eapPaterno,
        tencuestado.apMaterno as eapMaterno, tencuestado.nombre as enombre, tencuestado.fecha_nacimiento as efecha_nacimiento, tencuestado.direccion as edireccion, tencuestado.celular as ecelular FROM tinfante INNER JOIN tencuestado 
       ON tinfante.id_encuestado=tencuestado.id where tinfante.categoria = '".$categoria."'");
        return $query->getResultArray();
    }
}