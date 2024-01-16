<?php

namespace App\Controllers;

use App\Models\EncuestadoModel;
use App\Models\GestacionModel;
use App\Models\InfanteModel;
use CodeIgniter\Controller;

class Infante extends BaseController
{
    public function view()
    {
        $infante_model = new InfanteModel();       
        $data = [
            'infantes'  => $infante_model->getInfantesOrInfante(),            
            'titulo' => 'Lista de infantes'
        ];
        echo view('header');
        echo view('infante/view', $data);
        echo view('footer');
    }
    public function viewInfantesByEncuestadoId($id_encuestado)
    {        
        $infante_model = new InfanteModel();
        $encuestado_model=new EncuestadoModel();
        $encuestado  = $encuestado_model->getEncuestadosOrEncuestado($id_encuestado);
        $data = [
            'infantes'  => $infante_model->getInfantesByEncuestadoId($id_encuestado),
            'encuestado' =>$encuestado_model->getEncuestadosOrEncuestado($id_encuestado),      
            'titulo' => 'Infantes de entrevistada: '.$encuestado['nombre'].' '.$encuestado['apPaterno'].' '.$encuestado['apMaterno'],
            
        ];
        echo view('header');
        echo view('infante/view', $data);
        echo view('footer');
    }


    public function create()
    {
        $model = new InfanteModel();
        $encuestado_model=new EncuestadoModel();
        $encuestados=$encuestado_model->getEncuestadosOrEncuestado();
        if ($this->request->getMethod() === 'post' && $this->validate([
            'nombre' => 'required|max_length[20]',
            'apPaterno' => 'required|max_length[20]',
            'apMaterno' => 'required|max_length[20]',
            'dni' => 'required|max_length[10]',
            'fecha_nacimiento' => 'required',
            'sexo' => 'required|max_length[1]',
            'estab_salud' => 'required',
            'prematuro'=>'required',
            'categoria'=>'required|max_length[50]',
            'id_encuestado'=>'required|max_length[6]'
            
        ]))
        {
            $model->save([
                'nombre' => $this->request->getPost('nombre'),
                'apPaterno' =>  $this->request->getPost('apPaterno'),
                'apMaterno' =>  $this->request->getPost('apMaterno'),
                'dni' =>  $this->request->getPost('dni'),
                'fecha_nacimiento' =>  date('Y-m-d',strtotime($this->request->getPost('fecha_nacimiento'))),
                'sexo' =>$this->request->getPost('sexo'),
                'estab_salud' =>  $this->request->getPost('estab_salud'),
                'prematuro' =>  $this->request->getPost('prematuro'),
                'categoria' =>  $this->request->getPost('categoria'),
                'id_encuestado' =>  $this->request->getPost('id_encuestado')
            ]);
            $data=[
                'id_encuestado'=> $this->request->getPost('id_encuestado')            
            ];
            return redirect()->to(base_url() . '/infanteTab');
        } else {

            $data = ['titulo' => 'Escribir datos de infante','encuestados'=>$encuestado_model->getEncuestadosOrEncuestado(),'validation'=>$this->validator];
            echo view('header',);
            echo view('infante/create', $data);
            echo view('footer');
            
        }
    }
    
    public function select_many($id_encuestado)
    {
        $encuestado_model = new EncuestadoModel();            
        $infante_model = new InfanteModel();
        $data = [
            'encuestado'  => $encuestado_model->getEncuestadosOrEncuestado($id_encuestado),    //registro de encuestado
            'infantes' => $infante_model->getInfantesByEncuestadoId($id_encuestado),//lista de alternativas cuyo id_pregunta es el de arriba               
            'titulo' => 'Escribir datos de infante','validation'=>$this->validator //encabezado
        ];
        if (empty($data['encuestado'])) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Cannot find the encuestado item: ' . $id_encuestado);
        }   
        echo view('header');
        echo view('infante/create', $data);
        echo view('footer');
    }
   
    public function select_one($id)
    {
        $model = new InfanteModel();      
        $data=['infante'=>$model->getInfantesOrInfante($id),'titulo' => 'Escribir datos','validation'=>$this->validator];
        if (empty($data['infante'])) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Cannot find the infante item: ' . $id);
        }   
        echo view('header');
        echo view('infante/update', $data);
        echo view('footer');
    }

    public function update()
    {
        $model = new InfanteModel();
        $id = $this->request->getPost('id');        
        $data=[
            'nombre' => $this->request->getPost('nombre'),
            'apPaterno' =>  $this->request->getPost('apPaterno'),
            'apMaterno' =>  $this->request->getPost('apMaterno'),
            'dni' =>  $this->request->getPost('dni'),
            'fecha_nacimiento' =>  date('Y-m-d',strtotime($this->request->getPost('fecha_nacimiento'))),
            'sexo' =>$this->request->getPost('sexo'),
            'estab_salud' =>  $this->request->getPost('estab_salud'),
            'prematuro' =>  $this->request->getPost('prematuro'),
            'categoria' =>  $this->request->getPost('categoria'),
            'id_encuestado' =>  $this->request->getPost('id_encuestado')      
        ];
        $model->update($id,$data);
        return redirect()->to(base_url() . '/infanteTab/');
    }

    public function delete_one($id)
    {
        $model = new InfanteModel();   
        $data  = $model->getInfantesOrInfante($id);        
        $model->delete($id);        
        return redirect()->to(base_url() . '/infanteTab/');
    }
}

