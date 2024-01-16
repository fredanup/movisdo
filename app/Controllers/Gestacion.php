<?php

namespace App\Controllers;

use App\Models\EncuestadoModel;
use App\Models\GestacionModel;

use CodeIgniter\Controller;

class Gestacion extends BaseController
{
    public function viewGestaciones()
    {
        

        $gestante_model = new GestacionModel();  
        $encuestado_model=new EncuestadoModel();     
        $data = [
            'gestaciones'  => $gestante_model->getGestacionesOrGestacion(), 
            'encuestados'=>$encuestado_model->getEncuestadosOrEncuestado(),
            'titulo' => 'Lista de gestaciones'
        ];
        echo view('header');
        echo view('gestacion/view', $data);
        echo view('footer');
    }

    public function viewGestacionesByEncuestadoId($id_encuestado)
    {        
        $gestante_model = new GestacionModel();
        $encuestado_model=new EncuestadoModel();
        $encuestado  = $encuestado_model->getEncuestadosOrEncuestado($id_encuestado);
        $data = [
            'gestaciones'  => $gestante_model->getGestacionesByEncuestadoId($id_encuestado),  
            'encuestado' =>$encuestado_model->getEncuestadosOrEncuestado($id_encuestado),         
            'titulo' => 'Gestaciones de encuestada: '.$encuestado['nombre'].' '.$encuestado['apPaterno'].' '.$encuestado['apMaterno'],
            
        ];
        echo view('header');
        echo view('gestacion/view', $data);
        echo view('footer');
    }
    
    public function create()
    {
        $model = new GestacionModel();
        $encuestado_model=new EncuestadoModel();
        if ($this->request->getMethod() === 'post' && $this->validate([
            'fecha_parto' => 'required',
            'estab_salud' =>'required|max_length[255]',
            'sexo_bebe'=>'required',
            'id_encuestado'=>'required'
        ]))
        {
            $model->save([
                'fecha_parto' => date('Y-m-d',strtotime($this->request->getPost('fecha_parto'))),
                'estab_salud' => $this->request->getPost('estab_salud'),
                'sexo_bebe' => $this->request->getPost('sexo_bebe'),
                'id_encuestado' => $this->request->getPost('id_encuestado')
            ]);
            $data=[
                'id_encuestado'=> $this->request->getPost('id_encuestado')            
            ];
            return redirect()->to(base_url() . '/gestanteTab');
        } else {

            $data = ['encuestados'=>$encuestado_model->getEncuestadosByCategoria("Gestante"),
            'titulo' => 'Escribir datos de gestación','validation'=>$this->validator];
            echo view('header',);
            echo view('gestacion/create', $data);
            echo view('footer');
            
        }
    }
    
    public function select_many($id_encuestado)
    {
        $encuestado_model = new EncuestadoModel();            
        $gestacion_model = new GestacionModel();
        $encuestado  = $encuestado_model->getEncuestadosOrEncuestado($id_encuestado);
        $data = [
            'encuestado'  => $encuestado_model->getEncuestadosOrEncuestado($id_encuestado),    //registro de encuestado
            'gestaciones' => $gestacion_model->getGestacionesByEncuestadoId($id_encuestado),//lista de alternativas cuyo id_pregunta es el de arriba               
            'titulo' => 'Escribir datos de gestación','validation'=>$this->validator //encabezado
        ];
        if (empty($data['encuestado'])) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Cannot find the encuestado item: ' . $id_encuestado);
        }   
        echo view('header');
        echo view('gestacion/create', $data);
        echo view('footer');
    }
    
    public function select_one($id)
    {
        $gestante_model = new GestacionModel();  
        $encuestado_model=new EncuestadoModel();   
        $gestante=$gestante_model->getGestacionesOrGestacion($id);
        $encuestado=$encuestado_model->getEncuestadosOrEncuestado($gestante['id_encuestado']);
        $data=['gestante'=>$gestante_model->getGestacionesOrGestacion($id),'titulo' => 'Escribir datos de: '.$encuestado['nombre'].' '.$encuestado['apPaterno'].' '.$encuestado['apMaterno'],'validation'=>$this->validator];
        if (empty($data['gestante'])) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Cannot find the gestación item: ' . $id);
        }   
        echo view('header');
        echo view('gestacion/update', $data);
        echo view('footer');
    }

   
    public function update()
    {
        $model = new GestacionModel();
        $id = $this->request->getPost('id');        
        $data=[
                'fecha_parto' => date('Y-m-d',strtotime($this->request->getPost('fecha_parto'))),
                'estab_salud' => $this->request->getPost('estab_salud'),
                'sexo_bebe' => $this->request->getPost('sexo_bebe'),
                'id_encuestado' => $this->request->getPost('id_encuestado')            
        ];
        $model->update($id,$data);
        return redirect()->to(base_url() . '/gestanteTab/');
    }

    public function delete_one($id)
    {
        $model = new GestacionModel();   
        $data  = $model->getGestacionesOrGestacion($id);        
        $model->delete($id);        
        return redirect()->to(base_url() . '/gestanteTab/');
    }
}

