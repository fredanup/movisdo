<?php

namespace App\Models;

use CodeIgniter\Model;



class RespuestaGestanteModel extends Model
{
    protected $table = 'trespuesta_gestante';
    protected $allowedFields =
    [
        'id_alternativa',
        'id_visita_gestante',
        'detalle'
    ];
    
    public function getRespuestasOfVisitaToGestanteOrRespuestaOfVisitaToGestante($id = false)
    {
        if ($id === false) {
            return $this->findAll();
        }

        return $this->asArray()
            ->where(['id' => $id])
            ->first();
    }
    public function getRespuestasOfVisitaToGestanteByVisitaToGestanteId($id_visita_gestante = false)
    {
        return $this->asArray()
            ->where(['id_visita_gestante' => $id_visita_gestante])
            ->findAll();
    }
    public function getRespuestasOfGestanteByGestanteIdAndPreguntaId($id_gestante,$id_pregunta)
    {
        $db = \Config\Database::connect();
        $query = $db->query("SELECT talternativa.alternativa as alternativa FROM talternativa INNER JOIN trespuesta_gestante ON
         talternativa.id=trespuesta_gestante.id_alternativa INNER JOIN tvisita_gestante ON
          trespuesta_gestante.id_visita_gestante=tvisita_gestante.id WHERE tvisita_gestante.id_gestante=$id_gestante AND talternativa.id_pregunta=$id_pregunta;");
        return $query->getResultArray();
    }

 
}