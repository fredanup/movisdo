<?php

namespace App\Controllers;

use App\Models\AlternativaModel;
use App\Models\CoordinadorModel;
use App\Models\VisitaGestanteModel;
use App\Models\EncuestadoModel;
use App\Models\GestacionModel;
use App\Models\InfanteModel;
use App\Models\PreguntaModel;
use App\Models\PromotorModel;
use App\Models\RespuestaGestanteModel;
use App\Models\RespuestaInfanteModel;
use App\Models\VisitaInfanteModel;
use CodeIgniter\Controller;
use DateTime;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

use function PHPUnit\Framework\matches;

class Reporte extends BaseController
{

    public function viewReportes()
    {

        $data = [            
            'titulo' => 'Reportes'
        ];
        
        echo view('header');
        echo view('reporte/view',$data);
        echo view('footer');
    }
    public function createReporteOfGestantes()
    {     
        
        $gestacion_model = new GestacionModel();
        $respuesta_gestante_model=new RespuestaGestanteModel();
        $visita_gestante_model=new VisitaGestanteModel();
        $gestantes  = $gestacion_model->getGestacionesAndEncuestadoData();        
        
        $spreadsheet = new Spreadsheet();
        $spreadsheet->getActiveSheet()->getColumnDimension('A')->setWidth(10.96);
        $spreadsheet->getActiveSheet()->getColumnDimension('B')->setWidth(10.96);
        $spreadsheet->getActiveSheet()->getColumnDimension('C')->setWidth(10.96);
        $spreadsheet->getActiveSheet()->getColumnDimension('D')->setWidth(10.96);
        $spreadsheet->getActiveSheet()->getColumnDimension('E')->setWidth(10.96);
        $spreadsheet->getActiveSheet()->getColumnDimension('F')->setWidth(10.96);
        $spreadsheet->getActiveSheet()->getColumnDimension('G')->setWidth(10.96);
        $spreadsheet->getActiveSheet()->getColumnDimension('H')->setWidth(10.96);
        $spreadsheet->getActiveSheet()->getColumnDimension('I')->setWidth(10.96);
        $spreadsheet->getActiveSheet()->getColumnDimension('J')->setWidth(10.96);
        $spreadsheet->getActiveSheet()->getColumnDimension('K')->setWidth(10.96);
        $spreadsheet->getActiveSheet()->getColumnDimension('L')->setWidth(10.96);
        $spreadsheet->getActiveSheet()->getColumnDimension('M')->setWidth(10.96);
        $spreadsheet->getActiveSheet()->getColumnDimension('N')->setWidth(10.96);
        $spreadsheet->getActiveSheet()->getColumnDimension('O')->setWidth(10.96);
        $spreadsheet->getActiveSheet()->getColumnDimension('P')->setWidth(10.96);
        $spreadsheet->getActiveSheet()->getColumnDimension('Q')->setWidth(10.96);
        $spreadsheet->getActiveSheet()->getColumnDimension('R')->setWidth(10.96);
        $spreadsheet->getActiveSheet()->getColumnDimension('S')->setWidth(10.96);
        $spreadsheet->getActiveSheet()->getColumnDimension('T')->setWidth(10.96);
        $spreadsheet->getActiveSheet()->getColumnDimension('U')->setWidth(10.96);
        $spreadsheet->getActiveSheet()->getColumnDimension('V')->setWidth(10.96);
        $spreadsheet->getActiveSheet()->getColumnDimension('W')->setWidth(10.96);
        $spreadsheet->getActiveSheet()->getColumnDimension('X')->setWidth(10.96);
        $spreadsheet->getActiveSheet()->getStyle('A1:X1')->getAlignment()->setWrapText(true);
        $spreadsheet->getActiveSheet()->getStyle('A1:X1')->getFont()->getColor()->setARGB(\PhpOffice\PhpSpreadsheet\Style\Color::COLOR_DARKBLUE);
        $spreadsheet->getActiveSheet()->getStyle('A1:X1')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB('8EA9DB');
        $sheet = $spreadsheet->getActiveSheet();

        //Datos de gestante
        $sheet->setCellValue('A1', 'NRO');
        $sheet->setCellValue('B1', 'TIPO DE: NIÑO/GESTANTE/PUERPERA = N - G - P');
        $sheet->setCellValue('C1', 'DNI - NIÑO/GESTANTE/PUERPERA');
        $sheet->setCellValue('D1', 'APELLIDO PATERNO DEL NIÑO/GESTANTE/PUERPERA');
        $sheet->setCellValue('E1', 'APELLIDO MATERNO DEL NIÑO/GESTANTE/PUERPERA');
        $sheet->setCellValue('F1', 'NOMBRES');
        $sheet->setCellValue('G1', 'SEXO DEL MENOR - GESTANTE M/V');
        $sheet->setCellValue('H1', 'FECHA DE NACIMIENTO DEL NIÑO/GESTANTE/PUERPERA');

        //Datos de pregunta y respuesta de gestante
        $sheet->setCellValue('I1', 'FECHA DE DOSAJE');
        $sheet->setCellValue('J1', 'DX ANEMIA (CON FACTOR DESCUENTO)');
        $sheet->setCellValue('K1', 'DIAGNOSTICO');
        $sheet->setCellValue('L1', 'CUENTA CON SUPLEMENTO DE HIERRO O PASTILLAS CASO GESTANTES/PUERPERA SI/NO');
        $sheet->setCellValue('M1', 'AL DIA CONTROL DE CRED/GESTANTE/PUERPERA SI/NO');

        //Datos de gestante
        $sheet->setCellValue('N1', 'FORMATO APLICADO');        
        $sheet->setCellValue('O1', 'DIRECCIÓN');

        //No va
        $sheet->setCellValue('P1', 'APELLIDO PATERNO DE LA MADRE/CUIDADOR (DEL MENOR DE EDAD)');
        $sheet->setCellValue('Q1', 'APELLIDO MATERNO DE LA MADRE (DEL MENOR DE EDAD)');
        $sheet->setCellValue('R1', 'NOMBRES DE LA MADRE(DEL MENOR DE EDAD)');
        $sheet->setCellValue('S1', 'DNI DE LA MADRE O CUIDADOR');
        $sheet->setCellValue('T1', 'NUMERO DE CELULAR DE LA MADRE');

        //No va
        $sheet->setCellValue('U1', 'PARTICIPA EN EL PVL');

        //Datos de visita
        $sheet->setCellValue('V1', '1ERA VISITA');
        $sheet->setCellValue('W1', '2DA VISITA');
        $sheet->setCellValue('X1', '3RA VISITA');

        //Contadores
        $rows = 2;
        $i=1;

        foreach ($gestantes as $gestante) {
            $sheet->setCellValue('A'.$rows, $i);
            if($gestante['categoria']=="Gestante"){
                $categoria="G";
            }
            $sheet->setCellValue('B'.$rows, $categoria);
            $sheet->setCellValue('C'.$rows, $gestante['dni']);
            $sheet->setCellValue('D'.$rows, $gestante['apPaterno']);
            $sheet->setCellValue('E'.$rows, $gestante['apMaterno']);
            $sheet->setCellValue('F'.$rows, $gestante['nombre']);
            $sheet->setCellValue('G'.$rows, "Femenino");            
            $sheet->setCellValue('H'.$rows, $gestante['fecha_nacimiento']);

            $respuesta_gestante=$respuesta_gestante_model->getRespuestasOfGestanteByGestanteIdAndPreguntaId($gestante['id'],8);
            foreach ($respuesta_gestante as $respuesta_gestante){
                $sheet->setCellValue('I'.$rows, $respuesta_gestante['alternativa']);
                $sheet->setCellValue('J'.$rows, $respuesta_gestante['alternativa']);
            }
           
            $sheet->setCellValue('K'.$rows, "Por definir");

            $respuesta_gestante=$respuesta_gestante_model->getRespuestasOfGestanteByGestanteIdAndPreguntaId($gestante['id'],4);
            foreach ($respuesta_gestante as $respuesta_gestante){
                $sheet->setCellValue('L'.$rows, $respuesta_gestante['alternativa']);
            }
            
            $sheet->setCellValue('M'.$rows, "No");
            $sheet->setCellValue('N'.$rows, "F4");
            $sheet->setCellValue('O'.$rows, $gestante['direccion']);

            $sheet->setCellValue('P'.$rows, $gestante['apPaterno']);
            $sheet->setCellValue('Q'.$rows, $gestante['apMaterno']);
            $sheet->setCellValue('R'.$rows, $gestante['nombre']);
            $sheet->setCellValue('S'.$rows, $gestante['dni']);
            $sheet->setCellValue('T'.$rows, $gestante['celular']);
            $sheet->setCellValue('U'.$rows, "No");

            $visitas_gestante=$visita_gestante_model->getVisitasOfGestantesByGestanteId($gestante['id']);
            
            $cont=0;
            $cont2=0;
            $primera_visita="";
            $segunda_visita="";
            $tercera_visita="";
            foreach ($visitas_gestante as $visita){
                if($cont==0){
                    $primera_visita=$visita['fecha'];
                    $cont2++;
                }
                else{
                    if($cont2!=3){
                        
                        if($primera_visita!=$visita['fecha']){
                            if($cont2==1){
                                $segunda_visita=$visita['fecha'];
                                $cont2++;
                            }
                            else{
                                if($segunda_visita!=$visita['fecha']){
                                    $tercera_visita=$visita['fecha'];
                                    $cont2++;
                                }
                            }                            
                            
                        }
                    }
                    else{
                        break;
                    }
                }
                $cont++;
            }
           
            $sheet->setCellValue('V'.$rows, $primera_visita!=null? date("d-m-Y",strtotime($primera_visita)):null);
            $sheet->setCellValue('W'.$rows, $segunda_visita!=null? date("d-m-Y",strtotime($segunda_visita)):null);
            $sheet->setCellValue('X'.$rows, $tercera_visita!=null? date("d-m-Y",strtotime($tercera_visita)):null);
            
            
            $rows++;
            $i=$i+1;

        }
        
        //autofilter
        $firstRow=1;
        $lastRow=$rows-1;

        //set 
        $spreadsheet->getActiveSheet()->setAutoFilter("A".$firstRow.":X".$lastRow);
        $writer = new Xlsx($spreadsheet);
        $writer->save('world.xlsx');
        return $this->response->download('world.xlsx', null)->setFileName('reporteGestantes.xlsx');
    }
    public function createReporteOfInfantesRecienNacidos()
    {     
        
        $infante_model = new InfanteModel();
        $respuesta_infante_model=new RespuestaInfanteModel();
        $visita_infante_model=new VisitaInfanteModel();
        $categoria_label="Recién nacido";
        $infantes  = $infante_model->getInfantesAndEncuestadoData($categoria_label);        
        
        $spreadsheet = new Spreadsheet();
        $spreadsheet->getActiveSheet()->getColumnDimension('A')->setWidth(10.96);
        $spreadsheet->getActiveSheet()->getColumnDimension('B')->setWidth(10.96);
        $spreadsheet->getActiveSheet()->getColumnDimension('C')->setWidth(10.96);
        $spreadsheet->getActiveSheet()->getColumnDimension('D')->setWidth(10.96);
        $spreadsheet->getActiveSheet()->getColumnDimension('E')->setWidth(10.96);
        $spreadsheet->getActiveSheet()->getColumnDimension('F')->setWidth(10.96);
        $spreadsheet->getActiveSheet()->getColumnDimension('G')->setWidth(10.96);
        $spreadsheet->getActiveSheet()->getColumnDimension('H')->setWidth(10.96);
        $spreadsheet->getActiveSheet()->getColumnDimension('I')->setWidth(10.96);
        $spreadsheet->getActiveSheet()->getColumnDimension('J')->setWidth(10.96);
        $spreadsheet->getActiveSheet()->getColumnDimension('K')->setWidth(10.96);
        $spreadsheet->getActiveSheet()->getColumnDimension('L')->setWidth(10.96);
        $spreadsheet->getActiveSheet()->getColumnDimension('M')->setWidth(10.96);
        $spreadsheet->getActiveSheet()->getColumnDimension('N')->setWidth(10.96);
        $spreadsheet->getActiveSheet()->getColumnDimension('O')->setWidth(10.96);
        $spreadsheet->getActiveSheet()->getColumnDimension('P')->setWidth(10.96);
        $spreadsheet->getActiveSheet()->getColumnDimension('Q')->setWidth(10.96);
        $spreadsheet->getActiveSheet()->getColumnDimension('R')->setWidth(10.96);
        $spreadsheet->getActiveSheet()->getColumnDimension('S')->setWidth(10.96);
        $spreadsheet->getActiveSheet()->getColumnDimension('T')->setWidth(10.96);
        $spreadsheet->getActiveSheet()->getColumnDimension('U')->setWidth(10.96);
        $spreadsheet->getActiveSheet()->getColumnDimension('V')->setWidth(10.96);
        $spreadsheet->getActiveSheet()->getColumnDimension('W')->setWidth(10.96);
        $spreadsheet->getActiveSheet()->getColumnDimension('X')->setWidth(10.96);
        $spreadsheet->getActiveSheet()->getStyle('A1:X1')->getAlignment()->setWrapText(true);
        $spreadsheet->getActiveSheet()->getStyle('A1:X1')->getFont()->getColor()->setARGB(\PhpOffice\PhpSpreadsheet\Style\Color::COLOR_DARKBLUE);
        $spreadsheet->getActiveSheet()->getStyle('A1:X1')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB('8EA9DB');
        $sheet = $spreadsheet->getActiveSheet();

        //Datos de gestante
        $sheet->setCellValue('A1', 'NRO');
        $sheet->setCellValue('B1', 'TIPO DE: NIÑO/GESTANTE/PUERPERA = N - G - P');
        $sheet->setCellValue('C1', 'DNI - NIÑO/GESTANTE/PUERPERA');
        $sheet->setCellValue('D1', 'APELLIDO PATERNO DEL NIÑO/GESTANTE/PUERPERA');
        $sheet->setCellValue('E1', 'APELLIDO MATERNO DEL NIÑO/GESTANTE/PUERPERA');
        $sheet->setCellValue('F1', 'NOMBRES');
        $sheet->setCellValue('G1', 'SEXO DEL MENOR - GESTANTE M/V');
        $sheet->setCellValue('H1', 'FECHA DE NACIMIENTO DEL NIÑO/GESTANTE/PUERPERA');

        //Datos de pregunta y respuesta de gestante
        $sheet->setCellValue('I1', 'FECHA DE DOSAJE');
        $sheet->setCellValue('J1', 'DX ANEMIA (CON FACTOR DESCUENTO)');
        $sheet->setCellValue('K1', 'DIAGNOSTICO');
        $sheet->setCellValue('L1', 'CUENTA CON SUPLEMENTO DE HIERRO O PASTILLAS CASO GESTANTES/PUERPERA SI/NO');
        $sheet->setCellValue('M1', 'AL DIA CONTROL DE CRED/GESTANTE/PUERPERA SI/NO');

        //Datos de gestante
        $sheet->setCellValue('N1', 'FORMATO APLICADO');        
        $sheet->setCellValue('O1', 'DIRECCIÓN');

        //No va
        $sheet->setCellValue('P1', 'APELLIDO PATERNO DE LA MADRE/CUIDADOR (DEL MENOR DE EDAD)');
        $sheet->setCellValue('Q1', 'APELLIDO MATERNO DE LA MADRE (DEL MENOR DE EDAD)');
        $sheet->setCellValue('R1', 'NOMBRES DE LA MADRE(DEL MENOR DE EDAD)');
        $sheet->setCellValue('S1', 'DNI DE LA MADRE O CUIDADOR');
        $sheet->setCellValue('T1', 'NUMERO DE CELULAR DE LA MADRE');

        //No va
        $sheet->setCellValue('U1', 'PARTICIPA EN EL PVL');

        //Datos de visita
        $sheet->setCellValue('V1', '1ERA VISITA');
        $sheet->setCellValue('W1', '2DA VISITA');
        $sheet->setCellValue('X1', '3RA VISITA');

        //Contadores
        $rows = 2;
        $i=1;

        foreach ($infantes as $infante) {
            $sheet->setCellValue('A'.$rows, $i);
            if($infante['categoria']==$categoria_label){
                $categoria="P";
            }
            $sheet->setCellValue('B'.$rows, $categoria);
            $sheet->setCellValue('C'.$rows, $infante['dni']);
            $sheet->setCellValue('D'.$rows, $infante['apPaterno']);
            $sheet->setCellValue('E'.$rows, $infante['apMaterno']);
            $sheet->setCellValue('F'.$rows, $infante['nombre']);
            if($infante['sexo']==0){
                $sexo="F";
            }
            else{
                $sexo="M";
            }
            $sheet->setCellValue('G'.$rows, $sexo);               
            $sheet->setCellValue('H'.$rows, $infante['fecha_nacimiento']);

            $sheet->setCellValue('I'.$rows, "Sin DX");
            $sheet->setCellValue('J'.$rows, "Sin DX");          
          
           
            $sheet->setCellValue('K'.$rows, "Sin DX");

            $respuesta_infante=$respuesta_infante_model->getRespuestasOfInfanteByInfanteIdAndPreguntaId($infante['id'],21);
            foreach ($respuesta_infante as $respuesta){
                $sheet->setCellValue('L'.$rows, $respuesta['alternativa']);
            }

            $respuesta_infante=$respuesta_infante_model->getRespuestasOfInfanteByInfanteIdAndPreguntaId($infante['id'],20);
            foreach ($respuesta_infante as $respuesta){
                $sheet->setCellValue('M'.$rows, $respuesta['alternativa']);
            }
            
            $sheet->setCellValue('N'.$rows, "F5");
            $sheet->setCellValue('O'.$rows, $infante['edireccion']);

            $sheet->setCellValue('P'.$rows, $infante['eapPaterno']);
            $sheet->setCellValue('Q'.$rows, $infante['eapMaterno']);
            $sheet->setCellValue('R'.$rows, $infante['enombre']);
            $sheet->setCellValue('S'.$rows, $infante['edni']);
            $sheet->setCellValue('T'.$rows, $infante['ecelular']);

            //es pregunta
            $sheet->setCellValue('U'.$rows, "No aplica");

            $visitas_infante=$visita_infante_model->getVisitasOfInfantesByInfanteId($infante['id']);
            
            $cont=0;
            $cont2=0;
            $primera_visita="";
            $segunda_visita="";
            $tercera_visita="";
            foreach ($visitas_infante as $visita){
                if($cont==0){
                    $primera_visita=$visita['fecha'];
                    $cont2++;
                }
                else{
                    if($cont2!=3){
                        
                        if($primera_visita!=$visita['fecha']){
                            if($cont2==1){
                                $segunda_visita=$visita['fecha'];
                                $cont2++;
                            }
                            else{
                                if($segunda_visita!=$visita['fecha']){
                                    $tercera_visita=$visita['fecha'];
                                    $cont2++;
                                }
                            }                            
                            
                        }
                    }
                    else{
                        break;
                    }
                }
                $cont++;
            }
           
            $sheet->setCellValue('V'.$rows, $primera_visita!=null? date("d-m-Y",strtotime($primera_visita)):null);
            $sheet->setCellValue('W'.$rows, $segunda_visita!=null? date("d-m-Y",strtotime($segunda_visita)):null);
            $sheet->setCellValue('X'.$rows, $tercera_visita!=null? date("d-m-Y",strtotime($tercera_visita)):null);
            
            
            $rows++;
            $i=$i+1;

        }
        
        //autofilter
        $firstRow=1;
        $lastRow=$rows-1;

        //set 
        $spreadsheet->getActiveSheet()->setAutoFilter("A".$firstRow.":X".$lastRow);
        $writer = new Xlsx($spreadsheet);
        $writer->save('world.xlsx');
        return $this->response->download('world.xlsx', null)->setFileName('reporteRecienNacidos.xlsx');
    }
    public function createReporteOfInfantesMenorDe6Meses()
    {     
        
        $infante_model = new InfanteModel();
        $respuesta_infante_model=new RespuestaInfanteModel();
        $visita_infante_model=new VisitaInfanteModel();
        $categoria_label="Menor de 6 meses";
        $infantes  = $infante_model->getInfantesAndEncuestadoData($categoria_label);        
        
        $spreadsheet = new Spreadsheet();
        $spreadsheet->getActiveSheet()->getColumnDimension('A')->setWidth(10.96);
        $spreadsheet->getActiveSheet()->getColumnDimension('B')->setWidth(10.96);
        $spreadsheet->getActiveSheet()->getColumnDimension('C')->setWidth(10.96);
        $spreadsheet->getActiveSheet()->getColumnDimension('D')->setWidth(10.96);
        $spreadsheet->getActiveSheet()->getColumnDimension('E')->setWidth(10.96);
        $spreadsheet->getActiveSheet()->getColumnDimension('F')->setWidth(10.96);
        $spreadsheet->getActiveSheet()->getColumnDimension('G')->setWidth(10.96);
        $spreadsheet->getActiveSheet()->getColumnDimension('H')->setWidth(10.96);
        $spreadsheet->getActiveSheet()->getColumnDimension('I')->setWidth(10.96);
        $spreadsheet->getActiveSheet()->getColumnDimension('J')->setWidth(10.96);
        $spreadsheet->getActiveSheet()->getColumnDimension('K')->setWidth(10.96);
        $spreadsheet->getActiveSheet()->getColumnDimension('L')->setWidth(10.96);
        $spreadsheet->getActiveSheet()->getColumnDimension('M')->setWidth(10.96);
        $spreadsheet->getActiveSheet()->getColumnDimension('N')->setWidth(10.96);
        $spreadsheet->getActiveSheet()->getColumnDimension('O')->setWidth(10.96);
        $spreadsheet->getActiveSheet()->getColumnDimension('P')->setWidth(10.96);
        $spreadsheet->getActiveSheet()->getColumnDimension('Q')->setWidth(10.96);
        $spreadsheet->getActiveSheet()->getColumnDimension('R')->setWidth(10.96);
        $spreadsheet->getActiveSheet()->getColumnDimension('S')->setWidth(10.96);
        $spreadsheet->getActiveSheet()->getColumnDimension('T')->setWidth(10.96);
        $spreadsheet->getActiveSheet()->getColumnDimension('U')->setWidth(10.96);
        $spreadsheet->getActiveSheet()->getColumnDimension('V')->setWidth(10.96);
        $spreadsheet->getActiveSheet()->getColumnDimension('W')->setWidth(10.96);
        $spreadsheet->getActiveSheet()->getColumnDimension('X')->setWidth(10.96);
        $spreadsheet->getActiveSheet()->getColumnDimension('Y')->setWidth(10.96);
        $spreadsheet->getActiveSheet()->getColumnDimension('Z')->setWidth(10.96);
        $spreadsheet->getActiveSheet()->getColumnDimension('AA')->setWidth(10.96);
        $spreadsheet->getActiveSheet()->getColumnDimension('AB')->setWidth(10.96);
        $spreadsheet->getActiveSheet()->getColumnDimension('AC')->setWidth(10.96);
        $spreadsheet->getActiveSheet()->getColumnDimension('AD')->setWidth(10.96);
        $spreadsheet->getActiveSheet()->getColumnDimension('AE')->setWidth(10.96);
        $spreadsheet->getActiveSheet()->getStyle('A1:AE1')->getAlignment()->setWrapText(true);
        $spreadsheet->getActiveSheet()->getStyle('A1:AE1')->getFont()->getColor()->setARGB(\PhpOffice\PhpSpreadsheet\Style\Color::COLOR_DARKBLUE);
        $spreadsheet->getActiveSheet()->getStyle('A1:AE1')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB('8EA9DB');
        $sheet = $spreadsheet->getActiveSheet();

        //Datos de infante
        $sheet->setCellValue('A1', 'NRO');
        $sheet->setCellValue('B1', 'TIPO DE: NIÑO/GESTANTE/PUERPERA = N - G - P');
        $sheet->setCellValue('C1', 'DNI - NIÑO/GESTANTE/PUERPERA');
        $sheet->setCellValue('D1', 'APELLIDO PATERNO DEL NIÑO/GESTANTE/PUERPERA');
        $sheet->setCellValue('E1', 'APELLIDO MATERNO DEL NIÑO/GESTANTE/PUERPERA');
        $sheet->setCellValue('F1', 'NOMBRES');
        $sheet->setCellValue('G1', 'SEXO DEL MENOR - GESTANTE M/V');
        $sheet->setCellValue('H1', 'FECHA DE NACIMIENTO DEL NIÑO/GESTANTE/PUERPERA');

        //Datos calculados a partir de la fecha de nacimiento y la fecha actual, derivadas de datos de infante
        $sheet->setCellValue('I1', 'AÑO');
        $sheet->setCellValue('J1', 'MES');
        $sheet->setCellValue('K1', 'DÍA');

        //Datos de preguntas

        $sheet->setCellValue('L1', 'FECHA DE DOSAJE');
        $sheet->setCellValue('M1', 'DX ANEMIA (CON FACTOR DESCUENTO)');
        $sheet->setCellValue('N1', 'DX');   
        $sheet->setCellValue('O1', 'CUENTA CON SUPLEMENTO DE HIERRO O PASTILLAS CASO GESTANTES/PUERPERA SI/NO');     
        $sheet->setCellValue('P1', 'OBSERVACIÓN SOBRE EL SUPLEMENTO DE JARABE/PASTILLAS');
        $sheet->setCellValue('Q1', 'AL DÍA CON EL CONTROL DE CRED/GESTANTE/PUERPERA SI/NO');
        $sheet->setCellValue('R1', 'OBSERVACIÓN SOBRE CRED/CONTROL/PUERPERA');   
        $sheet->setCellValue('S1', 'AL DÍA CON VACUNAS DE CRED/GESTANTE/PUERPERA SI/NO');   
        $sheet->setCellValue('T1', 'OBSERVACION SOBRE VACUNAS CRED/GESTANTE/PUERPERA SI/NO');       
 
        $sheet->setCellValue('U1', 'FORMATO APLICADO'); 
        //Datos de APODERADO       
        $sheet->setCellValue('V1', 'DIRECCIÓN');
        $sheet->setCellValue('W1', 'APELLIDO PATERNO DE LA MADRE/CUIDADOR (DEL MENOR DE EDAD)');
        $sheet->setCellValue('X1', 'APELLIDO MATERNO DE LA MADRE (DEL MENOR DE EDAD)');
        $sheet->setCellValue('Y1', 'NOMBRES DE LA MADRE(DEL MENOR DE EDAD)');
        $sheet->setCellValue('Z1', 'DNI DE LA MADRE O CUIDADOR');
        $sheet->setCellValue('AA1', 'NUMERO DE CELULAR DE LA MADRE');

        //Datos de pregunta
        $sheet->setCellValue('AB1', 'PARTICIPA EN EL PVL');

        //Datos de visita
        $sheet->setCellValue('AC1', '1ERA VISITA');
        $sheet->setCellValue('AD1', '2DA VISITA');
        $sheet->setCellValue('AE1', '3RA VISITA');

        //Contadores
        $rows = 2;
        $i=1;

        foreach ($infantes as $infante) {
            $sheet->setCellValue('A'.$rows, $i);
            if($infante['categoria']== $categoria_label){
                $categoria="N";
            }
            $sheet->setCellValue('B'.$rows, $categoria);
            $sheet->setCellValue('C'.$rows, $infante['dni']);
            $sheet->setCellValue('D'.$rows, $infante['apPaterno']);
            $sheet->setCellValue('E'.$rows, $infante['apMaterno']);
            $sheet->setCellValue('F'.$rows, $infante['nombre']);
            if($infante['sexo']==0){
                $sexo="F";
            }
            else{
                $sexo="M";
            }
            $sheet->setCellValue('G'.$rows, $sexo);               
            $sheet->setCellValue('H'.$rows, $infante['fecha_nacimiento']);

            //Calculamos diferencia entre fechas
            $fecha_nacimiento = new DateTime($infante['fecha_nacimiento']);
            $fecha_actual=new DateTime(date("Y-m-d"));
            $diferencia=$fecha_nacimiento->diff($fecha_actual);
            $año=$diferencia->y;
            $mes=$diferencia->m;
            $dia=$diferencia->d;

            $sheet->setCellValue('I'.$rows, $año);
            $sheet->setCellValue('J'.$rows, $mes);          
            $sheet->setCellValue('K'.$rows, $dia);

            $sheet->setCellValue('I'.$rows, $año);
            $sheet->setCellValue('J'.$rows, $mes);          
            $sheet->setCellValue('K'.$rows, $dia);

            $sheet->setCellValue('L'.$rows, "No aplica");
            $sheet->setCellValue('M'.$rows, "No aplica");
            $sheet->setCellValue('N'.$rows, "No aplica");

            $respuesta_infante=$respuesta_infante_model->getRespuestasOfInfanteByInfanteIdAndPreguntaId($infante['id'],36);
            foreach ($respuesta_infante as $respuesta){
                $sheet->setCellValue('O'.$rows, $respuesta['alternativa']);
                $sheet->setCellValue('P'.$rows, $respuesta['detalle']);
            }

            $respuesta_infante=$respuesta_infante_model->getRespuestasOfInfanteByInfanteIdAndPreguntaId($infante['id'],40);
            foreach ($respuesta_infante as $respuesta){
                $sheet->setCellValue('Q'.$rows, $respuesta['alternativa']);
                $sheet->setCellValue('R'.$rows, $respuesta['detalle']);
            }

            $respuesta_infante=$respuesta_infante_model->getRespuestasOfInfanteByInfanteIdAndPreguntaId($infante['id'],41);
            foreach ($respuesta_infante as $respuesta){
                $sheet->setCellValue('S'.$rows, $respuesta['alternativa']);
                $sheet->setCellValue('T'.$rows, $respuesta['detalle']);
            }
            
            $sheet->setCellValue('U'.$rows, "F1");
            $sheet->setCellValue('V'.$rows, $infante['edireccion']);

            $sheet->setCellValue('W'.$rows, $infante['eapPaterno']);
            $sheet->setCellValue('X'.$rows, $infante['eapMaterno']);
            $sheet->setCellValue('Y'.$rows, $infante['enombre']);
            $sheet->setCellValue('Z'.$rows, $infante['edni']);
            $sheet->setCellValue('AA'.$rows, $infante['ecelular']);

            //es pregunta
           
            $respuesta_infante=$respuesta_infante_model->getRespuestasOfInfanteByInfanteIdAndPreguntaId($infante['id'],84);
            foreach ($respuesta_infante as $respuesta){
                $sheet->setCellValue('AB'.$rows, $respuesta['alternativa']);
            }

            $visitas_infante=$visita_infante_model->getVisitasOfInfantesByInfanteId($infante['id']);
            
            $cont=0;
            $cont2=0;
            $primera_visita="";
            $segunda_visita="";
            $tercera_visita="";
            foreach ($visitas_infante as $visita){
                if($cont==0){
                    $primera_visita=$visita['fecha'];
                    $cont2++;
                }
                else{
                    if($cont2!=3){
                        
                        if($primera_visita!=$visita['fecha']){
                            if($cont2==1){
                                $segunda_visita=$visita['fecha'];
                                $cont2++;
                            }
                            else{
                                if($segunda_visita!=$visita['fecha']){
                                    $tercera_visita=$visita['fecha'];
                                    $cont2++;
                                }
                            }                            
                            
                        }
                    }
                    else{
                        break;
                    }
                }
                $cont++;
            }
           
            $sheet->setCellValue('AC'.$rows, $primera_visita!=null? date("d-m-Y",strtotime($primera_visita)):null);
            $sheet->setCellValue('AD'.$rows, $segunda_visita!=null? date("d-m-Y",strtotime($segunda_visita)):null);
            $sheet->setCellValue('AE'.$rows, $tercera_visita!=null? date("d-m-Y",strtotime($tercera_visita)):null);
            
            
            $rows++;
            $i=$i+1;

        }
        
        //autofilter
        $firstRow=1;
        $lastRow=$rows-1;

        //set 
        $spreadsheet->getActiveSheet()->setAutoFilter("A".$firstRow.":AE".$lastRow);
        $writer = new Xlsx($spreadsheet);
        $writer->save('world.xlsx');
        return $this->response->download('world.xlsx', null)->setFileName('reporteInfantesMenorDe6Meses.xlsx');
    }
    public function createReporteOfInfantesDe6A11Meses()
    {     
        
        $infante_model = new InfanteModel();
        $respuesta_infante_model=new RespuestaInfanteModel();
        $visita_infante_model=new VisitaInfanteModel();
        $categoria_label="De 6 a 11 meses";
        $infantes  = $infante_model->getInfantesAndEncuestadoData($categoria_label);        
        
        $spreadsheet = new Spreadsheet();
        $spreadsheet->getActiveSheet()->getColumnDimension('A')->setWidth(10.96);
        $spreadsheet->getActiveSheet()->getColumnDimension('B')->setWidth(10.96);
        $spreadsheet->getActiveSheet()->getColumnDimension('C')->setWidth(10.96);
        $spreadsheet->getActiveSheet()->getColumnDimension('D')->setWidth(10.96);
        $spreadsheet->getActiveSheet()->getColumnDimension('E')->setWidth(10.96);
        $spreadsheet->getActiveSheet()->getColumnDimension('F')->setWidth(10.96);
        $spreadsheet->getActiveSheet()->getColumnDimension('G')->setWidth(10.96);
        $spreadsheet->getActiveSheet()->getColumnDimension('H')->setWidth(10.96);
        $spreadsheet->getActiveSheet()->getColumnDimension('I')->setWidth(10.96);
        $spreadsheet->getActiveSheet()->getColumnDimension('J')->setWidth(10.96);
        $spreadsheet->getActiveSheet()->getColumnDimension('K')->setWidth(10.96);
        $spreadsheet->getActiveSheet()->getColumnDimension('L')->setWidth(10.96);
        $spreadsheet->getActiveSheet()->getColumnDimension('M')->setWidth(10.96);
        $spreadsheet->getActiveSheet()->getColumnDimension('N')->setWidth(10.96);
        $spreadsheet->getActiveSheet()->getColumnDimension('O')->setWidth(10.96);
        $spreadsheet->getActiveSheet()->getColumnDimension('P')->setWidth(10.96);
        $spreadsheet->getActiveSheet()->getColumnDimension('Q')->setWidth(10.96);
        $spreadsheet->getActiveSheet()->getColumnDimension('R')->setWidth(10.96);
        $spreadsheet->getActiveSheet()->getColumnDimension('S')->setWidth(10.96);
        $spreadsheet->getActiveSheet()->getColumnDimension('T')->setWidth(10.96);
        $spreadsheet->getActiveSheet()->getColumnDimension('U')->setWidth(10.96);
        $spreadsheet->getActiveSheet()->getColumnDimension('V')->setWidth(10.96);
        $spreadsheet->getActiveSheet()->getColumnDimension('W')->setWidth(10.96);
        $spreadsheet->getActiveSheet()->getColumnDimension('X')->setWidth(10.96);
        $spreadsheet->getActiveSheet()->getColumnDimension('Y')->setWidth(10.96);
        $spreadsheet->getActiveSheet()->getColumnDimension('Z')->setWidth(10.96);
        $spreadsheet->getActiveSheet()->getColumnDimension('AA')->setWidth(10.96);
        $spreadsheet->getActiveSheet()->getColumnDimension('AB')->setWidth(10.96);
        $spreadsheet->getActiveSheet()->getColumnDimension('AC')->setWidth(10.96);
        $spreadsheet->getActiveSheet()->getColumnDimension('AD')->setWidth(10.96);
        $spreadsheet->getActiveSheet()->getColumnDimension('AE')->setWidth(10.96);
        $spreadsheet->getActiveSheet()->getStyle('A1:AE1')->getAlignment()->setWrapText(true);
        $spreadsheet->getActiveSheet()->getStyle('A1:AE1')->getFont()->getColor()->setARGB(\PhpOffice\PhpSpreadsheet\Style\Color::COLOR_DARKBLUE);
        $spreadsheet->getActiveSheet()->getStyle('A1:AE1')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB('8EA9DB');
        $sheet = $spreadsheet->getActiveSheet();

        //Datos de infante
        $sheet->setCellValue('A1', 'NRO');
        $sheet->setCellValue('B1', 'TIPO DE: NIÑO/GESTANTE/PUERPERA = N - G - P');
        $sheet->setCellValue('C1', 'DNI - NIÑO/GESTANTE/PUERPERA');
        $sheet->setCellValue('D1', 'APELLIDO PATERNO DEL NIÑO/GESTANTE/PUERPERA');
        $sheet->setCellValue('E1', 'APELLIDO MATERNO DEL NIÑO/GESTANTE/PUERPERA');
        $sheet->setCellValue('F1', 'NOMBRES');
        $sheet->setCellValue('G1', 'SEXO DEL MENOR - GESTANTE M/V');
        $sheet->setCellValue('H1', 'FECHA DE NACIMIENTO DEL NIÑO/GESTANTE/PUERPERA');

        //Datos calculados a partir de la fecha de nacimiento y la fecha actual, derivadas de datos de infante
        $sheet->setCellValue('I1', 'AÑO');
        $sheet->setCellValue('J1', 'MES');
        $sheet->setCellValue('K1', 'DÍA');

        //Datos de preguntas

        $sheet->setCellValue('L1', 'FECHA DE DOSAJE');
        $sheet->setCellValue('M1', 'DX ANEMIA (CON FACTOR DESCUENTO)');
        $sheet->setCellValue('N1', 'DX');   
        $sheet->setCellValue('O1', 'CUENTA CON SUPLEMENTO DE HIERRO O PASTILLAS CASO GESTANTES/PUERPERA SI/NO');     
        $sheet->setCellValue('P1', 'OBSERVACIÓN SOBRE EL SUPLEMENTO DE JARABE/PASTILLAS');
        $sheet->setCellValue('Q1', 'AL DÍA CON EL CONTROL DE CRED/GESTANTE/PUERPERA SI/NO');
        $sheet->setCellValue('R1', 'OBSERVACIÓN SOBRE CRED/CONTROL/PUERPERA');   
        $sheet->setCellValue('S1', 'AL DÍA CON VACUNAS DE CRED/GESTANTE/PUERPERA SI/NO');   
        $sheet->setCellValue('T1', 'OBSERVACION SOBRE VACUNAS CRED/GESTANTE/PUERPERA SI/NO');       
 
        $sheet->setCellValue('U1', 'FORMATO APLICADO'); 
        //Datos de APODERADO       
        $sheet->setCellValue('V1', 'DIRECCIÓN');
        $sheet->setCellValue('W1', 'APELLIDO PATERNO DE LA MADRE/CUIDADOR (DEL MENOR DE EDAD)');
        $sheet->setCellValue('X1', 'APELLIDO MATERNO DE LA MADRE (DEL MENOR DE EDAD)');
        $sheet->setCellValue('Y1', 'NOMBRES DE LA MADRE(DEL MENOR DE EDAD)');
        $sheet->setCellValue('Z1', 'DNI DE LA MADRE O CUIDADOR');
        $sheet->setCellValue('AA1', 'NUMERO DE CELULAR DE LA MADRE');

        //Datos de pregunta
        $sheet->setCellValue('AB1', 'PARTICIPA EN EL PVL');

        //Datos de visita
        $sheet->setCellValue('AC1', '1ERA VISITA');
        $sheet->setCellValue('AD1', '2DA VISITA');
        $sheet->setCellValue('AE1', '3RA VISITA');

        //Contadores
        $rows = 2;
        $i=1;

        foreach ($infantes as $infante) {
            $sheet->setCellValue('A'.$rows, $i);
            if($infante['categoria']==$categoria_label){
                $categoria="N";
            }
            $sheet->setCellValue('B'.$rows, $categoria);
            $sheet->setCellValue('C'.$rows, $infante['dni']);
            $sheet->setCellValue('D'.$rows, $infante['apPaterno']);
            $sheet->setCellValue('E'.$rows, $infante['apMaterno']);
            $sheet->setCellValue('F'.$rows, $infante['nombre']);
            if($infante['sexo']==0){
                $sexo="F";
            }
            else{
                $sexo="M";
            }
            $sheet->setCellValue('G'.$rows, $sexo);               
            $sheet->setCellValue('H'.$rows, $infante['fecha_nacimiento']);

            //Calculamos diferencia entre fechas
            $fecha_nacimiento = new DateTime($infante['fecha_nacimiento']);
            $fecha_actual=new DateTime(date("Y-m-d"));
            $diferencia=$fecha_nacimiento->diff($fecha_actual);
            $año=$diferencia->y;
            $mes=$diferencia->m;
            $dia=$diferencia->d;

            $sheet->setCellValue('I'.$rows, $año);
            $sheet->setCellValue('J'.$rows, $mes);          
            $sheet->setCellValue('K'.$rows, $dia);

            $sheet->setCellValue('I'.$rows, $año);
            $sheet->setCellValue('J'.$rows, $mes);          
            $sheet->setCellValue('K'.$rows, $dia);

            $respuesta_infante=$respuesta_infante_model->getRespuestasOfInfanteByInfanteIdAndPreguntaId($infante['id'],57);
            foreach ($respuesta_infante as $respuesta){
                $sheet->setCellValue('L'.$rows, $respuesta['alternativa']);
            }

            $respuesta_infante=$respuesta_infante_model->getRespuestasOfInfanteByInfanteIdAndPreguntaId($infante['id'],58);
            foreach ($respuesta_infante as $respuesta){
                $sheet->setCellValue('M'.$rows, $respuesta['alternativa']);
            }

            
            $sheet->setCellValue('N'.$rows, "Por definir");

            $respuesta_infante=$respuesta_infante_model->getRespuestasOfInfanteByInfanteIdAndPreguntaId($infante['id'],52);
            foreach ($respuesta_infante as $respuesta){
                $sheet->setCellValue('O'.$rows, $respuesta['alternativa']);
                $sheet->setCellValue('P'.$rows, $respuesta['detalle']);
            }

            $respuesta_infante=$respuesta_infante_model->getRespuestasOfInfanteByInfanteIdAndPreguntaId($infante['id'],59);
            foreach ($respuesta_infante as $respuesta){
                $sheet->setCellValue('Q'.$rows, $respuesta['alternativa']);
                $sheet->setCellValue('R'.$rows, $respuesta['detalle']);
            }

            $respuesta_infante=$respuesta_infante_model->getRespuestasOfInfanteByInfanteIdAndPreguntaId($infante['id'],60);
            foreach ($respuesta_infante as $respuesta){
                $sheet->setCellValue('S'.$rows, $respuesta['alternativa']);
                $sheet->setCellValue('T'.$rows, $respuesta['detalle']);
            }
            
            $sheet->setCellValue('U'.$rows, "F2");
            $sheet->setCellValue('V'.$rows, $infante['edireccion']);

            $sheet->setCellValue('W'.$rows, $infante['eapPaterno']);
            $sheet->setCellValue('X'.$rows, $infante['eapMaterno']);
            $sheet->setCellValue('Y'.$rows, $infante['enombre']);
            $sheet->setCellValue('Z'.$rows, $infante['edni']);
            $sheet->setCellValue('AA'.$rows, $infante['ecelular']);

            //es pregunta
           
            $respuesta_infante=$respuesta_infante_model->getRespuestasOfInfanteByInfanteIdAndPreguntaId($infante['id'],85);
            foreach ($respuesta_infante as $respuesta){
                $sheet->setCellValue('AB'.$rows, $respuesta['alternativa']);
            }

            $visitas_infante=$visita_infante_model->getVisitasOfInfantesByInfanteId($infante['id']);
            
            $cont=0;
            $cont2=0;
            $primera_visita="";
            $segunda_visita="";
            $tercera_visita="";
            foreach ($visitas_infante as $visita){
                if($cont==0){
                    $primera_visita=$visita['fecha'];
                    $cont2++;
                }
                else{
                    if($cont2!=3){
                        
                        if($primera_visita!=$visita['fecha']){
                            if($cont2==1){
                                $segunda_visita=$visita['fecha'];
                                $cont2++;
                            }
                            else{
                                if($segunda_visita!=$visita['fecha']){
                                    $tercera_visita=$visita['fecha'];
                                    $cont2++;
                                }
                            }                            
                            
                        }
                    }
                    else{
                        break;
                    }
                }
                $cont++;
            }
           
            $sheet->setCellValue('AC'.$rows, $primera_visita!=null? date("d-m-Y",strtotime($primera_visita)):null);
            $sheet->setCellValue('AD'.$rows, $segunda_visita!=null? date("d-m-Y",strtotime($segunda_visita)):null);
            $sheet->setCellValue('AE'.$rows, $tercera_visita!=null? date("d-m-Y",strtotime($tercera_visita)):null);
            
            
            $rows++;
            $i=$i+1;

        }
        
        //autofilter
        $firstRow=1;
        $lastRow=$rows-1;

        //set 
        $spreadsheet->getActiveSheet()->setAutoFilter("A".$firstRow.":AE".$lastRow);
        $writer = new Xlsx($spreadsheet);
        $writer->save('world.xlsx');
        return $this->response->download('world.xlsx', null)->setFileName('reporteInfantesDe6A11Meses.xlsx');
    }
    public function createReporteOfInfantesDe1A3Años()
    {     
        
        $infante_model = new InfanteModel();
        $respuesta_infante_model=new RespuestaInfanteModel();
        $visita_infante_model=new VisitaInfanteModel();
        $categoria_label="De 1 a 3 años";
        $infantes  = $infante_model->getInfantesAndEncuestadoData($categoria_label);        
        
        $spreadsheet = new Spreadsheet();
        $spreadsheet->getActiveSheet()->getColumnDimension('A')->setWidth(10.96);
        $spreadsheet->getActiveSheet()->getColumnDimension('B')->setWidth(10.96);
        $spreadsheet->getActiveSheet()->getColumnDimension('C')->setWidth(10.96);
        $spreadsheet->getActiveSheet()->getColumnDimension('D')->setWidth(10.96);
        $spreadsheet->getActiveSheet()->getColumnDimension('E')->setWidth(10.96);
        $spreadsheet->getActiveSheet()->getColumnDimension('F')->setWidth(10.96);
        $spreadsheet->getActiveSheet()->getColumnDimension('G')->setWidth(10.96);
        $spreadsheet->getActiveSheet()->getColumnDimension('H')->setWidth(10.96);
        $spreadsheet->getActiveSheet()->getColumnDimension('I')->setWidth(10.96);
        $spreadsheet->getActiveSheet()->getColumnDimension('J')->setWidth(10.96);
        $spreadsheet->getActiveSheet()->getColumnDimension('K')->setWidth(10.96);
        $spreadsheet->getActiveSheet()->getColumnDimension('L')->setWidth(10.96);
        $spreadsheet->getActiveSheet()->getColumnDimension('M')->setWidth(10.96);
        $spreadsheet->getActiveSheet()->getColumnDimension('N')->setWidth(10.96);
        $spreadsheet->getActiveSheet()->getColumnDimension('O')->setWidth(10.96);
        $spreadsheet->getActiveSheet()->getColumnDimension('P')->setWidth(10.96);
        $spreadsheet->getActiveSheet()->getColumnDimension('Q')->setWidth(10.96);
        $spreadsheet->getActiveSheet()->getColumnDimension('R')->setWidth(10.96);
        $spreadsheet->getActiveSheet()->getColumnDimension('S')->setWidth(10.96);
        $spreadsheet->getActiveSheet()->getColumnDimension('T')->setWidth(10.96);
        $spreadsheet->getActiveSheet()->getColumnDimension('U')->setWidth(10.96);
        $spreadsheet->getActiveSheet()->getColumnDimension('V')->setWidth(10.96);
        $spreadsheet->getActiveSheet()->getColumnDimension('W')->setWidth(10.96);
        $spreadsheet->getActiveSheet()->getColumnDimension('X')->setWidth(10.96);
        $spreadsheet->getActiveSheet()->getColumnDimension('Y')->setWidth(10.96);
        $spreadsheet->getActiveSheet()->getColumnDimension('Z')->setWidth(10.96);
        $spreadsheet->getActiveSheet()->getColumnDimension('AA')->setWidth(10.96);
        $spreadsheet->getActiveSheet()->getColumnDimension('AB')->setWidth(10.96);
        $spreadsheet->getActiveSheet()->getColumnDimension('AC')->setWidth(10.96);
        $spreadsheet->getActiveSheet()->getColumnDimension('AD')->setWidth(10.96);
        $spreadsheet->getActiveSheet()->getColumnDimension('AE')->setWidth(10.96);
        $spreadsheet->getActiveSheet()->getStyle('A1:AE1')->getAlignment()->setWrapText(true);
        $spreadsheet->getActiveSheet()->getStyle('A1:AE1')->getFont()->getColor()->setARGB(\PhpOffice\PhpSpreadsheet\Style\Color::COLOR_DARKBLUE);
        $spreadsheet->getActiveSheet()->getStyle('A1:AE1')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB('8EA9DB');
        $sheet = $spreadsheet->getActiveSheet();

        //Datos de infante
        $sheet->setCellValue('A1', 'NRO');
        $sheet->setCellValue('B1', 'TIPO DE: NIÑO/GESTANTE/PUERPERA = N - G - P');
        $sheet->setCellValue('C1', 'DNI - NIÑO/GESTANTE/PUERPERA');
        $sheet->setCellValue('D1', 'APELLIDO PATERNO DEL NIÑO/GESTANTE/PUERPERA');
        $sheet->setCellValue('E1', 'APELLIDO MATERNO DEL NIÑO/GESTANTE/PUERPERA');
        $sheet->setCellValue('F1', 'NOMBRES');
        $sheet->setCellValue('G1', 'SEXO DEL MENOR - GESTANTE M/V');
        $sheet->setCellValue('H1', 'FECHA DE NACIMIENTO DEL NIÑO/GESTANTE/PUERPERA');

        //Datos calculados a partir de la fecha de nacimiento y la fecha actual, derivadas de datos de infante
        $sheet->setCellValue('I1', 'AÑO');
        $sheet->setCellValue('J1', 'MES');
        $sheet->setCellValue('K1', 'DÍA');

        //Datos de preguntas

        $sheet->setCellValue('L1', 'FECHA DE DOSAJE');
        $sheet->setCellValue('M1', 'DX ANEMIA (CON FACTOR DESCUENTO)');
        $sheet->setCellValue('N1', 'DX');   
        $sheet->setCellValue('O1', 'CUENTA CON SUPLEMENTO DE HIERRO O PASTILLAS CASO GESTANTES/PUERPERA SI/NO');     
        $sheet->setCellValue('P1', 'OBSERVACIÓN SOBRE EL SUPLEMENTO DE JARABE/PASTILLAS');
        $sheet->setCellValue('Q1', 'AL DÍA CON EL CONTROL DE CRED/GESTANTE/PUERPERA SI/NO');
        $sheet->setCellValue('R1', 'OBSERVACIÓN SOBRE CRED/CONTROL/PUERPERA');   
        $sheet->setCellValue('S1', 'AL DÍA CON VACUNAS DE CRED/GESTANTE/PUERPERA SI/NO');   
        $sheet->setCellValue('T1', 'OBSERVACION SOBRE VACUNAS CRED/GESTANTE/PUERPERA SI/NO');       
 
        $sheet->setCellValue('U1', 'FORMATO APLICADO'); 
        //Datos de APODERADO       
        $sheet->setCellValue('V1', 'DIRECCIÓN');
        $sheet->setCellValue('W1', 'APELLIDO PATERNO DE LA MADRE/CUIDADOR (DEL MENOR DE EDAD)');
        $sheet->setCellValue('X1', 'APELLIDO MATERNO DE LA MADRE (DEL MENOR DE EDAD)');
        $sheet->setCellValue('Y1', 'NOMBRES DE LA MADRE(DEL MENOR DE EDAD)');
        $sheet->setCellValue('Z1', 'DNI DE LA MADRE O CUIDADOR');
        $sheet->setCellValue('AA1', 'NUMERO DE CELULAR DE LA MADRE');

        //Datos de pregunta
        $sheet->setCellValue('AB1', 'PARTICIPA EN EL PVL');

        //Datos de visita
        $sheet->setCellValue('AC1', '1ERA VISITA');
        $sheet->setCellValue('AD1', '2DA VISITA');
        $sheet->setCellValue('AE1', '3RA VISITA');

        //Contadores
        $rows = 2;
        $i=1;

        foreach ($infantes as $infante) {
            $sheet->setCellValue('A'.$rows, $i);
            if($infante['categoria']==$categoria_label){
                $categoria="N";
            }
            $sheet->setCellValue('B'.$rows, $categoria);
            $sheet->setCellValue('C'.$rows, $infante['dni']);
            $sheet->setCellValue('D'.$rows, $infante['apPaterno']);
            $sheet->setCellValue('E'.$rows, $infante['apMaterno']);
            $sheet->setCellValue('F'.$rows, $infante['nombre']);
            if($infante['sexo']==0){
                $sexo="F";
            }
            else{
                $sexo="M";
            }
            $sheet->setCellValue('G'.$rows, $sexo);               
            $sheet->setCellValue('H'.$rows, $infante['fecha_nacimiento']);

            //Calculamos diferencia entre fechas
            $fecha_nacimiento = new DateTime($infante['fecha_nacimiento']);
            $fecha_actual=new DateTime(date("Y-m-d"));
            $diferencia=$fecha_nacimiento->diff($fecha_actual);
            $año=$diferencia->y;
            $mes=$diferencia->m;
            $dia=$diferencia->d;

            $sheet->setCellValue('I'.$rows, $año);
            $sheet->setCellValue('J'.$rows, $mes);          
            $sheet->setCellValue('K'.$rows, $dia);

            $respuesta_infante=$respuesta_infante_model->getRespuestasOfInfanteByInfanteIdAndPreguntaId($infante['id'],75);
            foreach ($respuesta_infante as $respuesta){
                $sheet->setCellValue('L'.$rows, $respuesta['alternativa']);
            }

            $respuesta_infante=$respuesta_infante_model->getRespuestasOfInfanteByInfanteIdAndPreguntaId($infante['id'],76);
            foreach ($respuesta_infante as $respuesta){
                $sheet->setCellValue('M'.$rows, $respuesta['alternativa']);
            }

            
            $sheet->setCellValue('N'.$rows, "Por definir");

            $respuesta_infante=$respuesta_infante_model->getRespuestasOfInfanteByInfanteIdAndPreguntaId($infante['id'],71);
            foreach ($respuesta_infante as $respuesta){
                $sheet->setCellValue('O'.$rows, $respuesta['alternativa']);
                $sheet->setCellValue('P'.$rows, $respuesta['detalle']);
            }

            $respuesta_infante=$respuesta_infante_model->getRespuestasOfInfanteByInfanteIdAndPreguntaId($infante['id'],77);
            foreach ($respuesta_infante as $respuesta){
                $sheet->setCellValue('Q'.$rows, $respuesta['alternativa']);
                $sheet->setCellValue('R'.$rows, $respuesta['detalle']);
            }

            $respuesta_infante=$respuesta_infante_model->getRespuestasOfInfanteByInfanteIdAndPreguntaId($infante['id'],78);
            foreach ($respuesta_infante as $respuesta){
                $sheet->setCellValue('S'.$rows, $respuesta['alternativa']);
                $sheet->setCellValue('T'.$rows, $respuesta['detalle']);
            }
            
            $sheet->setCellValue('U'.$rows, "F3");
            $sheet->setCellValue('V'.$rows, $infante['edireccion']);

            $sheet->setCellValue('W'.$rows, $infante['eapPaterno']);
            $sheet->setCellValue('X'.$rows, $infante['eapMaterno']);
            $sheet->setCellValue('Y'.$rows, $infante['enombre']);
            $sheet->setCellValue('Z'.$rows, $infante['edni']);
            $sheet->setCellValue('AA'.$rows, $infante['ecelular']);

            //es pregunta
           
            $respuesta_infante=$respuesta_infante_model->getRespuestasOfInfanteByInfanteIdAndPreguntaId($infante['id'],86);
            foreach ($respuesta_infante as $respuesta){
                $sheet->setCellValue('AB'.$rows, $respuesta['alternativa']);
            }

            $visitas_infante=$visita_infante_model->getVisitasOfInfantesByInfanteId($infante['id']);
            
            $cont=0;
            $cont2=0;
            $primera_visita="";
            $segunda_visita="";
            $tercera_visita="";
            foreach ($visitas_infante as $visita){
                if($cont==0){
                    $primera_visita=$visita['fecha'];
                    $cont2++;
                }
                else{
                    if($cont2!=3){
                        
                        if($primera_visita!=$visita['fecha']){
                            if($cont2==1){
                                $segunda_visita=$visita['fecha'];
                                $cont2++;
                            }
                            else{
                                if($segunda_visita!=$visita['fecha']){
                                    $tercera_visita=$visita['fecha'];
                                    $cont2++;
                                }
                            }                            
                            
                        }
                    }
                    else{
                        break;
                    }
                }
                $cont++;
            }
           
            $sheet->setCellValue('AC'.$rows, $primera_visita!=null? date("d-m-Y",strtotime($primera_visita)):null);
            $sheet->setCellValue('AD'.$rows, $segunda_visita!=null? date("d-m-Y",strtotime($segunda_visita)):null);
            $sheet->setCellValue('AE'.$rows, $tercera_visita!=null? date("d-m-Y",strtotime($tercera_visita)):null);
            
            
            $rows++;
            $i=$i+1;

        }
        
        //autofilter
        $firstRow=1;
        $lastRow=$rows-1;

        //set 
        $spreadsheet->getActiveSheet()->setAutoFilter("A".$firstRow.":AE".$lastRow);
        $writer = new Xlsx($spreadsheet);
        $writer->save('world.xlsx');
        return $this->response->download('world.xlsx', null)->setFileName('reporteInfantesDe1A3Años.xlsx');
    }
}
