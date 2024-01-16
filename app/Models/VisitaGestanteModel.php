<?php

namespace App\Models;

use CodeIgniter\Model;



class VisitaGestanteModel extends Model
{
    protected $table = 'tvisita_gestante';
    protected $allowedFields =
    [
        'fecha',
        'mod_visita',
        'coordenada',
        'id_gestante'
    ];
    
    public function getVisitasOfGestantesOrVisitaOfGestante($id = false)
    {
        if ($id === false) {
            return $this->findAll();
        }

        return $this->asArray()
            ->where(['id' => $id])
            ->first();
    }
    public function getVisitasOfGestantesByGestanteId($id_gestante)
    {
        
        return $this->asArray()
            ->where(['id_gestante' => $id_gestante])
            ->findAll();
    }
    public function getVisitasOfGestantesOrVisitaOfGestanteWithCoordenadas($id = false)
    {
        $db = \Config\Database::connect();
        $buider=$db->table('tvisita_gestante');
        $query = $db->query("SELECT id,fecha,mod_visita,ST_X(coordenada) as latitud, ST_Y(coordenada) as longitud, id_gestante FROM tvisita_gestante");
        return $query->getResultArray();
    }
    public function getVisitasOfGestantesByGestanteIdWithCoordenadas($id_gestante)
    {
        $db = \Config\Database::connect();
        $buider=$db->table('tvisita_gestante');
        $query = $db->query("SELECT id,fecha,mod_visita,ST_X(coordenada) as latitud, ST_Y(coordenada) as longitud, id_gestante FROM tvisita_gestante WHERE id_gestante=$id_gestante");
        return $query->getResultArray();
      
    }
}
