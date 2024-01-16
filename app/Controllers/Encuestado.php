<?php

namespace App\Controllers;

use App\Models\PromotorModel;
use App\Models\CoordinadorModel;
use App\Models\EncuestadoModel;
use CodeIgniter\Controller;

class Encuestado extends BaseController
{
    public function viewEncuestados()
    {
        $encuestado_model = new EncuestadoModel();
        $promotor_model=new PromotorModel();
        $data = [
            'encuestados'  => $encuestado_model->getEncuestadosOrEncuestado(),
            'promotores'=>$promotor_model->getPromotoresOrPromotor(),
            'titulo' => 'Apoderados/Gestantes'
        ];
        echo view('header');
        echo view('encuestado/view', $data);
        echo view('footer');
    }
    public function viewEncuestadosByPromotorId($id_promotor)
    {
        
        $encuestado_model = new EncuestadoModel();
        $promotor_model=new PromotorModel();
        $promotor=$promotor_model->getPromotoresOrPromotor($id_promotor);
        $data = [
            'encuestados'  => $encuestado_model->getEncuestadosByPromotorId($id_promotor),
            'promotor'=>$promotor_model->getPromotoresOrPromotor($id_promotor),
            'titulo' => 'Apoderados/Gestantes de promotor(a): '.$promotor['nombre'].' '.$promotor['apPaterno'].' '.$promotor['apMaterno']
        ];
        echo view('header');
        echo view('encuestado/view', $data);
        echo view('footer');
    }
    public function read_single($id_promotor)
    {
        $encuestado_model = new EncuestadoModel();
        $promotor_model=new PromotorModel();
        $promotor=$promotor_model->getPromotoresOrPromotor($id_promotor);
        $data = [
            'promotores'  => $promotor_model->getPromotoresOrPromotor($id_promotor),
            'encuestados'=>$encuestado_model->getEncuestadosByPromotorId($id_promotor),
            'titulo' => 'Apoderados/Gestantes de '.$promotor['nombre'].' '.$promotor['apPaterno'].' '.$promotor['apMaterno']
        ];
        echo view('header');
        echo view('encuestado/read', $data);
        echo view('footer');
    }
    
    
  

    public function create()
    {
        $encuestado_model = new EncuestadoModel();
        $promotor_model=new PromotorModel();
        
        
        if ($this->request->getMethod() === 'post' && $this->validate([

            'nombre' => 'required|max_length[20]',
            'apPaterno' => 'required|max_length[20]',
            'apMaterno' => 'required|max_length[20]',
            'dni' => 'required|max_length[10]',
            'fecha_nacimiento' => 'required',
            'celular' => 'required|max_length[10]',
            'direccion'=>'required|max_length[50]',
            'ref_vivienda'=>'required|max_length[100]',
            'categoria'=>'required|max_length[50]',
            'id_promotor'=>'required|max_length[6]'

        ]))
        {
            $encuestado_model->save([
                'nombre' => $this->request->getPost('nombre'),
                'apPaterno' =>  $this->request->getPost('apPaterno'),
                'apMaterno' =>  $this->request->getPost('apMaterno'),
                'dni' =>  $this->request->getPost('dni'),
                'fecha_nacimiento' =>  date('Y-m-d',strtotime($this->request->getPost('fecha_nacimiento'))),
                'celular' =>  $this->request->getPost('celular'),
                'direccion'=> $this->request->getPost('direccion'),
                'ref_vivienda'=> $this->request->getPost('ref_vivienda'),
                'categoria'=> $this->request->getPost('categoria'),
                'id_promotor'=> $this->request->getPost('id_promotor')
    
            ]);
            return redirect()->to(base_url() . '/encuestadoTab');
        } else {
            $data = [
                'encuestados'  => $encuestado_model->getEncuestadosOrEncuestado(),
                'promotores'=>$promotor_model->getPromotoresOrPromotor(),
                'titulo' => 'Crear Apoderado/Gestante','validation'=>$this->validator
            ];
            
            echo view('header',);
            echo view('encuestado/create', $data);
            echo view('footer');
            
        }
    }
    public function select_one($id)
    {
        $encuestado_model = new EncuestadoModel();
        $promotor_model=new PromotorModel();

        $data = [
            'encuestado'  => $encuestado_model->getEncuestadosOrEncuestado($id),
            'promotores'=>$promotor_model->getPromotoresOrPromotor(),
            'titulo' => 'Editar Apoderado/Gestante','validation'=>$this->validator
        ];
        if (empty($data['encuestado'])) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Cannot find the encuestado item: ' . $id);
        }   
        echo view('header');
        echo view('encuestado/update', $data);
        echo view('footer');
    }
    public function update()
    {
        $encuestado_model = new EncuestadoModel();
        $id = $this->request->getPost('id');        
        $data=[
            'nombre' => $this->request->getPost('nombre'),
            'apPaterno' =>  $this->request->getPost('apPaterno'),
            'apMaterno' =>  $this->request->getPost('apMaterno'),
            'dni' =>  $this->request->getPost('dni'),
            'fecha_nacimiento' =>  date('Y-m-d',strtotime($this->request->getPost('fecha_nacimiento'))),
            'celular' =>  $this->request->getPost('celular'),
            'direccion'=> $this->request->getPost('direccion'),
            'ref_vivienda'=> $this->request->getPost('ref_vivienda'),
            'categoria'=> $this->request->getPost('categoria'),
            'id_promotor'=> $this->request->getPost('id_promotor')
        ];
        $encuestado_model->update($id,$data);
        return redirect()->to(base_url() . '/encuestadoTab');
    }
    public function delete_one($id)
    {
        $encuestado_model = new EncuestadoModel();
        $encuestado_model->delete($id);
        return redirect()->to(base_url() . '/encuestadoTab');
    }
}
