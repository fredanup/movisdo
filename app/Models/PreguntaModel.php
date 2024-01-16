<?php

namespace App\Models;

use CodeIgniter\Model;



class PreguntaModel extends Model
{
    protected $table = 'tpregunta';    
    protected $allowedFields = ['pregunta', 'nro_alternativas','area', 'categoria','sug_temporal'];
    public function getPreguntasOrPregunta($id = false)
    {
        if ($id === false) {
            return $this->findAll();
        }

        return $this->asArray()
            ->where(['id' => $id])
            ->first();
    }
  
}

