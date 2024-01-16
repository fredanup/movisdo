<?php

namespace App\Models;

use CodeIgniter\Model;



class RespuestaInfanteModel extends Model
{
    protected $table = 'trespuesta_infante';
    protected $allowedFields =
    [
        'id_alternativa',
        'id_visita_gestante',
        'detalle'
    ];
    
    public function getRespuestasOfVisitaToInfanteOrRespuestaOfVisitaToInfante($id = false)
    {
        if ($id === false) {
            return $this->findAll();
        }

        return $this->asArray()
            ->where(['id' => $id])
            ->first();
    }
    public function getRespuestasOfVisitaToInfanteByVisitaToInfanteId($id_visita_infante = false)
    {        
        return $this->asArray()
            ->where(['id_visita_infante' => $id_visita_infante])
            ->findAll();
    }
    public function getRespuestasOfInfanteByInfanteIdAndPreguntaId($id_infante,$id_pregunta)
    {
        $db = \Config\Database::connect();
        $query = $db->query("SELECT talternativa.alternativa as alternativa, trespuesta_infante.detalle as detalle FROM talternativa INNER JOIN trespuesta_infante ON
         talternativa.id=trespuesta_infante.id_alternativa INNER JOIN tvisita_infante ON
          trespuesta_infante.id_visita_infante=tvisita_infante.id WHERE tvisita_infante.id_infante=$id_infante AND talternativa.id_pregunta=$id_pregunta;");
        return $query->getResultArray();
    }
}