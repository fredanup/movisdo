<?php

namespace App\Models;

use CodeIgniter\Model;



class AlternativaModel extends Model
{
    protected $table = 'talternativa';

    protected $allowedFields =
    [
        'alternativa',        
        'id_pregunta'
    ];
    
    public function getAlternativasByPreguntaId($id_pregunta)
    {
        return $this->asArray()
            ->where(['id_pregunta' => $id_pregunta])
            ->findAll();
    }
    public function getAlternativasOrAlternativa($id=false)
    {
        if ($id === false) {
            return $this->findAll();
        }

        return $this->asArray()
            ->where(['id' => $id])
            ->first();
    }
    
    
}
