<?php

namespace App\Models;

use CodeIgniter\Model;



class LlamadaVisitaGestanteModel extends Model
{
    protected $table = 'tllamada_visita_gestante';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $allowedFields =
    [
        'datos_llamada',
        'duracion',
        'id_visita_gestante'
    ];
    
    public function getLlamadasOrLlamadaByIdOfVisitaGestante($id_visita_gestante = false)
    {
        return $this->asArray()
            ->where(['id_visita_gestante' => $id_visita_gestante])
            ->findAll();
    }
}