<?php

namespace App\Controllers;

use App\Models\VisitaGestanteModel;
use App\Models\EncuestadoModel;
use App\Models\GestacionModel;
use CodeIgniter\Controller;

class VisitaGestante extends BaseController
{
    public function viewVisitasOfGestantes()
    {
        $visita_gestante_model = new VisitaGestanteModel();
        $gestacion_model=new GestacionModel();
        $encuestado_model=new EncuestadoModel();
        $gestaciones  = $gestacion_model->getGestacionesOrGestacion();
        $encuestados=$encuestado_model->getEncuestadosOrEncuestado();
        $data = [
            'visitas_gestantes'  => $visita_gestante_model->getVisitasOfGestantesOrVisitaOfGestanteWithCoordenadas(),
            'gestaciones' =>$gestacion_model->getGestacionesOrGestacion(),   
            'encuestados'=>$encuestado_model->getEncuestadosOrEncuestado(),      
            'titulo' => 'Visitas a gestantes'
        ];
        echo view('header');
        echo view('visita_gestante/view', $data);
        echo view('footer');
    }

    public function viewVisitasOfGestantesByGestanteId($id_gestante)
    {        
        $visita_gestante_model = new VisitaGestanteModel();
        $gestacion_model=new GestacionModel();
        $encuestado_model=new EncuestadoModel();
        $gestacion  = $gestacion_model->getGestacionesOrGestacion($id_gestante);
        $encuestado=$encuestado_model->getEncuestadosOrEncuestado($gestacion['id_encuestado']);
        $data = [
            'visitas_gestantes'  => $visita_gestante_model->getVisitasOfGestantesByGestanteIdWithCoordenadas($id_gestante),  
            'gestacion' =>$gestacion_model->getGestacionesOrGestacion($id_gestante),   
            'encuestado'=>$encuestado_model->getEncuestadosOrEncuestado($gestacion['id_encuestado']),      
            'titulo' => 'Visita a la gestante: '.$encuestado['nombre'].' '.$encuestado['apPaterno'].' '.$encuestado['apMaterno'],
            
        ];
        echo view('header');
        echo view('visita_gestante/view', $data);
        echo view('footer');
    }
}
?>