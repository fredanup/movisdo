<?php

namespace App\Controllers;

use App\Models\VisitaGestanteModel;
use App\Models\EncuestadoModel;
use App\Models\GestacionModel;
use App\Models\InfanteModel;
use App\Models\LlamadaVisitaGestanteModel;
use App\Models\LlamadaVisitaInfanteModel;
use App\Models\VisitaInfanteModel;
use CodeIgniter\Controller;

class LlamadaVisitaGestante extends BaseController
{
   
    public function viewLlamadasByVisitaOfGestanteId($id_visita_gestante)
    {        
        
        $visita_gestante_model = new VisitaGestanteModel();
        $llamada_visita_gestante_model= new LlamadaVisitaGestanteModel();
        $gestante_model=new GestacionModel();
        $encuestado_model=new EncuestadoModel();

        $row_visita_gestante=$visita_gestante_model->getVisitasOfGestantesOrVisitaOfGestante($id_visita_gestante);
        $row_gestante=$gestante_model->getGestacionesOrGestacion($row_visita_gestante['id_gestante']);
        $row_encuestado=$encuestado_model->getEncuestadosOrEncuestado($row_gestante['id_encuestado']);
        $llamadas_visita_gestante=$llamada_visita_gestante_model->getLlamadasOrLlamadaByIdOfVisitaGestante($id_visita_gestante);

        
        $data = [
            'visita_gestante'  => $row_visita_gestante,            
            'llamadas_visita_gestante'=> $llamadas_visita_gestante,       
            'titulo' => 'Llamadas a la gestante: '.$row_encuestado['nombre'].' '.$row_encuestado['apPaterno'].' '.$row_encuestado['apMaterno']            
        ];
        echo view('header');
        echo view('llamada_visita_gestante/view', $data);
        echo view('footer');
    }
}
?>