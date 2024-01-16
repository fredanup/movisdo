<?php

namespace App\Models;

use CodeIgniter\Model;



class VisitaInfanteModel extends Model
{
    
    protected $table = 'tvisita_infante';
    protected $allowedFields =
    [
        'fecha',
        'mod_visita',
        'coordenada',
        'id_gestante'
    ];
    
    public function getVisitasOfInfantesOrVisitaOfInfante($id = false)
    {
        if ($id === false) {
            return $this->findAll();
        }

        return $this->asArray()
            ->where(['id' => $id])
            ->first();
    }
    public function getVisitasOfInfantesByInfanteId($id_infante)
    {

        return $this->asArray()
            ->where(['id_infante' => $id_infante])
            ->findAll();
    }
    public function getVisitasOfInfantesOrVisitaOfInfanteWithCoordenadas($id = false)
    {
        $db = \Config\Database::connect();
        $buider=$db->table('tvisita_infante');
        $query = $db->query("SELECT id,fecha,mod_visita,ST_X(coordenada) as latitud, ST_Y(coordenada) as longitud, id_infante FROM tvisita_infante");
        return $query->getResultArray();
    }
    public function getVisitasOfInfantesByInfanteIdWithCoordenadas($id_infante)
    {
        $db = \Config\Database::connect();
        $buider=$db->table('tvisita_infante');
        $query = $db->query("SELECT id,fecha,mod_visita,ST_X(coordenada) as latitud, ST_Y(coordenada) as longitud, id_infante FROM tvisita_infante WHERE id_infante=$id_infante");
        return $query->getResultArray();
      
    }
 
    
    

}
