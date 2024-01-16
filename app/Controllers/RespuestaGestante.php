<?php

namespace App\Controllers;

use App\Models\AlternativaModel;
use App\Models\EncuestadoModel;
use App\Models\GestacionModel;
use App\Models\PreguntaModel;
use App\Models\VisitaGestanteModel;
use App\Models\RespuestaGestanteModel;
use CodeIgniter\Controller;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
class RespuestaGestante extends BaseController
{
    public function viewRespuestasByVisitaOfGestanteId($id_visita_gestante)
    {        
        $respuesta_gestante_model=new RespuestaGestanteModel();
        $alternativa_model=new AlternativaModel();
        $pregunta_model=new PreguntaModel();        
        $visita_gestante_model = new VisitaGestanteModel();
        $gestacion_model=new GestacionModel();
        $encuestado_model=new EncuestadoModel();

        $respuestas_gestantes=$respuesta_gestante_model->getRespuestasOfVisitaToGestanteByVisitaToGestanteId($id_visita_gestante);
        $alternativas=$alternativa_model->getAlternativasOrAlternativa();
        $preguntas=$pregunta_model->getPreguntasOrPregunta();
        $visita_gestante=$visita_gestante_model->getVisitasOfGestantesOrVisitaOfGestante($id_visita_gestante);
        $gestacion  = $gestacion_model->getGestacionesOrGestacion($visita_gestante['id_gestante']);
        $encuestado=$encuestado_model->getEncuestadosOrEncuestado($gestacion['id_encuestado']);
        $data = [
            'respuestas_gestantes'=>$respuesta_gestante_model->getRespuestasOfVisitaToGestanteByVisitaToGestanteId($id_visita_gestante),
            'alternativas'=>$alternativa_model->getAlternativasOrAlternativa(),
            'preguntas'=>$pregunta_model->getPreguntasOrPregunta(),
            'visita_gestante'=>$visita_gestante_model->getVisitasOfGestantesOrVisitaOfGestante($id_visita_gestante),
            'gestacion'=>$gestacion_model->getGestacionesOrGestacion($visita_gestante['id_gestante']),
            'encuestado'=>$encuestado_model->getEncuestadosOrEncuestado($gestacion['id_encuestado']),
            'titulo'=>'Respuestas de gestante: '.$encuestado['nombre'].' '.$encuestado['apPaterno'].' '.$encuestado['apMaterno']            
        ];
        echo view('header');
        echo view('respuesta_gestante/view', $data);
        echo view('footer');
    }
    public function viewRespuestasOfGestantes()
    {   //encuestado,datos de gestante,visita,pregunta,alternativa,respuesta(detalle)     
        $respuesta_gestante_model=new RespuestaGestanteModel();
        $alternativa_model=new AlternativaModel();
        $pregunta_model=new PreguntaModel();        
        $visita_gestante_model = new VisitaGestanteModel();
        $gestacion_model=new GestacionModel();
        $encuestado_model=new EncuestadoModel();

        $respuestas_gestantes=$respuesta_gestante_model->getRespuestasOfVisitaToGestanteOrRespuestaOfVisitaToGestante();
        $alternativas=$alternativa_model->getAlternativasOrAlternativa();
        $preguntas=$pregunta_model->getPreguntasOrPregunta();
        $visitas_gestantes=$visita_gestante_model->getVisitasOfGestantesOrVisitaOfGestante();
        $gestaciones  = $gestacion_model->getGestacionesOrGestacion();
        $encuestados=$encuestado_model->getEncuestadosOrEncuestado();
        $data = [
            'respuestas_gestantes'=>$respuesta_gestante_model->getRespuestasOfVisitaToGestanteOrRespuestaOfVisitaToGestante(),
            'alternativas'=>$alternativa_model->getAlternativasOrAlternativa(),
            'preguntas'=>$pregunta_model->getPreguntasOrPregunta(),
            'visitas_gestantes'=>$visita_gestante_model->getVisitasOfGestantesOrVisitaOfGestante(),
            'gestaciones'=>$gestacion_model->getGestacionesOrGestacion(),
            'encuestados'=>$encuestado_model->getEncuestadosOrEncuestado(),
            'titulo'=>'Respuestas de gestantes'            
        ];
        echo view('header');
        echo view('respuesta_gestante/view', $data);
        echo view('footer');
    }
    public function createReporteOfGestantes(){
        $respuesta_gestante_model=new RespuestaGestanteModel();
        $alternativa_model=new AlternativaModel();
        $pregunta_model=new PreguntaModel();        
        $visita_gestante_model = new VisitaGestanteModel();
        $gestacion_model=new GestacionModel();
        $encuestado_model=new EncuestadoModel();

        $respuestas_gestantes=$respuesta_gestante_model->getRespuestasOfVisitaToGestanteOrRespuestaOfVisitaToGestante();
        $alternativas=$alternativa_model->getAlternativasOrAlternativa();
        $preguntas=$pregunta_model->getPreguntasOrPregunta();
        $visitas_gestantes=$visita_gestante_model->getVisitasOfGestantesOrVisitaOfGestante();
        $gestaciones  = $gestacion_model->getGestacionesOrGestacion();
        $encuestados=$encuestado_model->getEncuestadosOrEncuestado();
        
        $spreadsheet = new Spreadsheet();
        $spreadsheet->getActiveSheet()->getColumnDimension('A')->setWidth(5);
        $spreadsheet->getActiveSheet()->getColumnDimension('B')->setWidth(40);
        $spreadsheet->getActiveSheet()->getColumnDimension('C')->setWidth(15);
        $spreadsheet->getActiveSheet()->getColumnDimension('D')->setWidth(15);
        $spreadsheet->getActiveSheet()->getColumnDimension('E')->setWidth(70);
        $spreadsheet->getActiveSheet()->getColumnDimension('F')->setWidth(10);
        $spreadsheet->getActiveSheet()->getColumnDimension('G')->setWidth(10);

        $sheet = $spreadsheet->getActiveSheet();
        $sheet->setCellValue('A1', 'Nro');
        $sheet->setCellValue('B1', 'Gestante');
        $sheet->setCellValue('C1', 'Fecha de parto');
        $sheet->setCellValue('D1', 'Fecha de visita');
        $sheet->setCellValue('E1', 'Pregunta');
        $sheet->setCellValue('F1', 'Respuesta');
        $sheet->setCellValue('G1', 'Detalle');
        $rows = 2;
        $i=1;
        foreach ($respuestas_gestantes as $respuesta_gestante) {
            foreach ($visitas_gestantes as $visita_gestante) {
                if ($respuesta_gestante['id_visita_gestante'] == $visita_gestante['id']) {
                    foreach ($gestaciones as $gestacion) {
                        if ($visita_gestante['id_gestante'] == $gestacion['id']) {
                            foreach ($encuestados as $encuestado) {
                                if ($gestacion['id_encuestado'] == $encuestado['id']) {
                                    foreach ($alternativas as $alternativa) {
                                        if ($respuesta_gestante['id_alternativa'] == $alternativa['id']) {
                                            foreach ($preguntas as $pregunta) {
                                                if ($alternativa['id_pregunta'] == $pregunta['id']) {
                                                    $sheet->setCellValue('A'.$rows, $i);
                                                    $sheet->setCellValue('B'.$rows, $encuestado['nombre'] . ' ' . $encuestado['apPaterno'] . ' ' . $encuestado['apMaterno']);
                                                    $sheet->setCellValue('C'.$rows, date("d-m-Y", strtotime($gestacion['fecha_parto'])));
                                                    $sheet->setCellValue('D'.$rows, date("d-m-Y", strtotime($visita_gestante['fecha'])));
                                                    $sheet->setCellValue('E'.$rows, $pregunta['pregunta']);
                                                    $sheet->setCellValue('F'.$rows, $alternativa['alternativa']);
                                                    $sheet->setCellValue('G'.$rows, $respuesta_gestante['detalle']);
                                                    $rows++;
                                                    $i=$i+1;
                                                }
                                            }
                                        }
                                    }
                                }
                            }
                        }
                    }
                }
            }
        }
         //autofilter
         $firstRow=1;
         $lastRow=$rows-1;
         //set 
         $spreadsheet->getActiveSheet()->setAutoFilter("A".$firstRow.":G".$lastRow);
        $writer = new Xlsx($spreadsheet);
        $writer->save('world.xlsx');
        return $this->response->download('world.xlsx', null)->setFileName('reporteGestantes.xlsx');
            

    }
    
}
?>