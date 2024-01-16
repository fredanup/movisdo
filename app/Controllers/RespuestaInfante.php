<?php

namespace App\Controllers;

use App\Models\AlternativaModel;
use App\Models\CoordinadorModel;
use App\Models\VisitaGestanteModel;
use App\Models\EncuestadoModel;
use App\Models\InfanteModel;
use App\Models\PreguntaModel;
use App\Models\PromotorModel;
use App\Models\RespuestaGestanteModel;
use App\Models\RespuestaInfanteModel;
use App\Models\VisitaInfanteModel;
use CodeIgniter\Controller;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class RespuestaInfante extends BaseController
{
    public function viewRespuestasByVisitaOfInfanteId($id_visita_infante)
    {

        $respuesta_infante_model = new RespuestaInfanteModel();
        $alternativa_model = new AlternativaModel();
        $pregunta_model = new PreguntaModel();
        $visita_infante_model = new VisitaInfanteModel();
        $infante_model = new InfanteModel();

        $respuestas_infantes = $respuesta_infante_model->getRespuestasOfVisitaToInfanteByVisitaToInfanteId($id_visita_infante);
        $alternativas = $alternativa_model->getAlternativasOrAlternativa();
        $preguntas = $pregunta_model->getPreguntasOrPregunta();
        $visita_infante = $visita_infante_model->getVisitasOfInfantesOrVisitaOfInfante($id_visita_infante);
        $infante  = $infante_model->getInfantesOrInfante($visita_infante['id_infante']);
        $data = [
            'respuestas_infantes' => $respuesta_infante_model->getRespuestasOfVisitaToInfanteByVisitaToInfanteId($id_visita_infante),
            'alternativas' => $alternativa_model->getAlternativasOrAlternativa(),
            'preguntas' => $pregunta_model->getPreguntasOrPregunta(),
            'visita_infante' => $visita_infante_model->getVisitasOfInfantesOrVisitaOfInfante($id_visita_infante),
            'infante' => $infante_model->getInfantesOrInfante($visita_infante['id_infante']),
            'titulo' => 'Respuestas de infante: ' . $infante['nombre'] . ' ' . $infante['apPaterno'] . ' ' . $infante['apMaterno']
        ];
        echo view('header');
        echo view('respuesta_infante/view', $data);
        echo view('footer');
    }
    public function viewRespuestasOfInfantes()
    {
        $respuesta_infante_model = new RespuestaInfanteModel();
        $alternativa_model = new AlternativaModel();
        $pregunta_model = new PreguntaModel();
        $visita_infante_model = new VisitaInfanteModel();
        $infante_model = new InfanteModel();

        $respuestas_infantes = $respuesta_infante_model->getRespuestasOfVisitaToInfanteOrRespuestaOfVisitaToInfante();
        $alternativas = $alternativa_model->getAlternativasOrAlternativa();
        $preguntas = $pregunta_model->getPreguntasOrPregunta();
        $visitas_infantes = $visita_infante_model->getVisitasOfInfantesOrVisitaOfInfante();
        $infantes  = $infante_model->getInfantesOrInfante();

        $data = [
            'respuestas_infantes' => $respuesta_infante_model->getRespuestasOfVisitaToInfanteOrRespuestaOfVisitaToInfante(),
            'alternativas' => $alternativa_model->getAlternativasOrAlternativa(),
            'preguntas' => $pregunta_model->getPreguntasOrPregunta(),
            'visitas_infantes' => $visita_infante_model->getVisitasOfInfantesOrVisitaOfInfante(),
            'infantes' => $infante_model->getInfantesOrInfante(),
            'titulo' => 'Respuestas de infantes'
        ];
        echo view('header');
        echo view('respuesta_infante/view', $data);
        echo view('footer');
    }
    public function createReporteOfInfantes()
    {
        $respuesta_infante_model = new RespuestaInfanteModel();
        $alternativa_model = new AlternativaModel();
        $pregunta_model = new PreguntaModel();
        $visita_infante_model = new VisitaInfanteModel();
        $infante_model = new InfanteModel();
        $encuestado_model = new EncuestadoModel();
        $promotor_model=new PromotorModel();
        $coordinador_model=new CoordinadorModel();
        $respuestas_infantes = $respuesta_infante_model->getRespuestasOfVisitaToInfanteOrRespuestaOfVisitaToInfante();
        $alternativas = $alternativa_model->getAlternativasOrAlternativa();
        $preguntas = $pregunta_model->getPreguntasOrPregunta();
        $visitas_infantes = $visita_infante_model->getVisitasOfInfantesOrVisitaOfInfante();
        $infantes  = $infante_model->getInfantesOrInfante();
      
        $spreadsheet = new Spreadsheet();
        $spreadsheet->getActiveSheet()->getColumnDimension('A')->setWidth(5);
        $spreadsheet->getActiveSheet()->getColumnDimension('B')->setWidth(40);
        $spreadsheet->getActiveSheet()->getColumnDimension('C')->setWidth(30);
        $spreadsheet->getActiveSheet()->getColumnDimension('D')->setWidth(15);
        $spreadsheet->getActiveSheet()->getColumnDimension('E')->setWidth(70);
        $spreadsheet->getActiveSheet()->getColumnDimension('F')->setWidth(10);
        $spreadsheet->getActiveSheet()->getColumnDimension('G')->setWidth(10);
        $sheet = $spreadsheet->getActiveSheet();

        $sheet->setCellValue('A1', 'Nro');
        $sheet->setCellValue('B1', 'Infante');
        $sheet->setCellValue('C1', 'Categoria');
        $sheet->setCellValue('D1', 'Fecha de visita');
        $sheet->setCellValue('E1', 'Pregunta');
        $sheet->setCellValue('F1', 'Respuesta');
        $sheet->setCellValue('G1', 'Detalle');
        $rows = 2;
        $i=1;
        foreach ($respuestas_infantes as $respuesta_infante) {
                    foreach ($visitas_infantes as $visita_infante) {
                        if ($respuesta_infante['id_visita_infante'] == $visita_infante['id']) {                            
                            foreach ($infantes as $infante) {
                                if ($visita_infante['id_infante'] == $infante['id']) {
                                    foreach ($alternativas as $alternativa) {
                                        if ($respuesta_infante['id_alternativa'] == $alternativa['id']) {
                                            foreach ($preguntas as $pregunta) {
                                                if ($alternativa['id_pregunta'] == $pregunta['id']) {
                                                    
                                                    $sheet->setCellValue('A'.$rows, $i);
                                                    $sheet->setCellValue('B'.$rows, $infante['nombre'] . ' ' . $infante['apPaterno'] . ' ' . $infante['apMaterno']);
                                                    $sheet->setCellValue('C'.$rows, $infante['categoria']);
                                                    $sheet->setCellValue('D'.$rows, date("d-m-Y", strtotime($visita_infante['fecha'])));
                                                    $sheet->setCellValue('E'.$rows, $pregunta['pregunta']);
                                                    $sheet->setCellValue('F'.$rows, $alternativa['alternativa']);
                                                    $sheet->setCellValue('G'.$rows, $respuesta_infante['detalle']);
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
        //autofilter
        $firstRow=1;
        $lastRow=$rows-1;
        //set 
        $spreadsheet->getActiveSheet()->setAutoFilter("A".$firstRow.":G".$lastRow);
        $writer = new Xlsx($spreadsheet);
        $writer->save('world.xlsx');
        return $this->response->download('world.xlsx', null)->setFileName('reporteInfantes.xlsx');
    }
}
