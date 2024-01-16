<?php

namespace App\Controllers;

use App\Models\VisitaGestanteModel;
use App\Models\EncuestadoModel;
use App\Models\InfanteModel;
use App\Models\VisitaInfanteModel;
use CodeIgniter\Controller;

class VisitaInfante extends BaseController
{
    public function viewVisitasOfInfantes()
    {
        $visita_infante_model = new VisitaInfanteModel();
        $infante_model=new InfanteModel();
        $encuestado_model=new EncuestadoModel();
        $infante  = $infante_model->getInfantesOrInfante();
        $data = [
            'visitas_infantes'  => $visita_infante_model->getVisitasOfInfantesOrVisitaOfInfanteWithCoordenadas(),
            'infantes' =>$infante_model->getInfantesOrInfante(), 
            'titulo' => 'Visitas a infantes'
        ];
        echo view('header');
        echo view('visita_infante/view', $data);
        echo view('footer');
    }
    public function viewVisitasOfInfanteByInfanteId($id_infante)
    {        
        
        $visita_infante_model = new VisitaInfanteModel();
        $infante_model=new InfanteModel();
        $encuestado_model=new EncuestadoModel();
        $infante  = $infante_model->getInfantesOrInfante($id_infante);
        $data = [
            'visitas_infantes'  => $visita_infante_model->getVisitasOfInfantesByInfanteIdWithCoordenadas($id_infante),  
            'infante' =>$infante_model->getInfantesOrInfante($id_infante),        
            'titulo' => 'Visita al infante: '.$infante['nombre'].' '.$infante['apPaterno'].' '.$infante['apMaterno'],
            
        ];
        echo view('header');
        echo view('visita_infante/view', $data);
        echo view('footer');
    }
}
?>