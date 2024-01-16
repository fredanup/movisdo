<?php

namespace App\Controllers;

use App\Models\VisitaGestanteModel;
use App\Models\EncuestadoModel;
use App\Models\InfanteModel;
use App\Models\LlamadaVisitaInfanteModel;
use App\Models\VisitaInfanteModel;
use CodeIgniter\Controller;

class LlamadaVisitaInfante extends BaseController
{
   
    public function viewLlamadasByVisitaOfInfanteId($id_visita_infante)
    {        
        
        $visita_infante_model = new VisitaInfanteModel();
        $llamada_visita_infante_model= new LlamadaVisitaInfanteModel();
        $infante_model=new InfanteModel();

        $row_visita_infante=$visita_infante_model->getVisitasOfInfantesOrVisitaOfInfante($id_visita_infante);
        $row_infante=$infante_model->getInfantesOrInfante($row_visita_infante['id_infante']);
        $llamadas_visita_infante=$llamada_visita_infante_model->getLlamadasOrLlamadaByIdOfVisitaInfante($id_visita_infante);

        
        $data = [
            'visita_infante'  => $row_visita_infante,            
            'llamadas_visita_infante'=> $llamadas_visita_infante,       
            'titulo' => 'Llamadas al infante: '.$row_infante['nombre'].' '.$row_infante['apPaterno'].' '.$row_infante['apMaterno']            
        ];
        echo view('header');
        echo view('llamada_visita_infante/view', $data);
        echo view('footer');
    }
}
?>