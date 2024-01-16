<?php

namespace App\Models;

use CodeIgniter\Model;



class LlamadaVisitaInfanteModel extends Model
{
    protected $table = 'tllamada_visita_infante';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $allowedFields =
    [
        'datos_llamada',
        'duracion',
        'id_visita_infante'
    ];
    
    public function getLlamadasOrLlamadaByIdOfVisitaInfante($id_visita_infante = false)
    {
        return $this->asArray()
            ->where(['id_visita_infante' => $id_visita_infante])
            ->findAll();
    }
}