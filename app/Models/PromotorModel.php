<?php

namespace App\Models;

use CodeIgniter\Model;



class PromotorModel extends Model
{
    protected $table = 'tpromotor';
    protected $createdField  = 'fecha_creacion';
    protected $updatedField  = 'fecha_edicion';
    protected $allowedFields =
    [
        'nombre',
        'apPaterno',
        'apMaterno',
        'dni',
        'fecha_nacimiento',
        'celular',
        'direccion',
        'ref_vivienda',
        'usuario',
        'contraseña',
        'fecha_creacion',
        'correo',
        'estudios',
        'sector',
        'id_coordinador',
        'estab_salud',
        'activo'
    ];
    public function getPromotoresByCoordinadorId($id_coordinador)
    {
        return $this->asArray()
            ->where(['id_coordinador' => $id_coordinador])
            ->findAll();
    }
    public function getPromotoresOrPromotor($id = false)
    {
        if ($id === false) {
            return $this->findAll();
        }

        return $this->asArray()
            ->where(['id' => $id])
            ->first();
    }
 
   
}
