<?php

namespace App\Models;

use CodeIgniter\Model;



class CoordinadorModel extends Model
{
    protected $table = 'tcoordinador';

    protected $allowedFields =
    [
        'nombre',
        'apPaterno',
        'apMaterno',
        'dni',
        'fecha_nacimiento',
        'estudios',
        'celular',
        'direccion',
        'ref_vivienda',
        'usuario',
        'contraseña',
        'tipo_usuario'
    ];
   
    public function getCoordinadoresOrCoordinador($id = false)
    {
        if ($id === false) {
            return $this->findAll();
        }

        return $this->asArray()
            ->where(['id' => $id])
            ->first();
    }
    public function getCoordinadoresByUsername($username)
    {       

        return $this->asArray()
            ->where(['usuario' => $username])
            ->first();
    }
    public function getCoordinadorByUserAndPass($username,$password)
    {       

        return $this->asArray()
            ->where(['usuario' => $username,'contraseña'=>$password])
            ->first();
    }
}
