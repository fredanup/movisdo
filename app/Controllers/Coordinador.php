<?php

namespace App\Controllers;

use App\Models\CoordinadorModel;
use CodeIgniter\Controller;

class Coordinador extends BaseController
{
    public function viewCoordinadores()
    {
        $coordinador_model = new CoordinadorModel();        
        $data = [
            'coordinadores'  => $coordinador_model->getCoordinadoresOrCoordinador(),
            'titulo' => 'Coordinadores',
        ];
        echo view('header');
        echo view('coordinador/view', $data);
        echo view('footer');
    }

    public function create()
    {
        $coordinador_model = new CoordinadorModel();       
        

        if ($this->request->getMethod() === 'post' && $this->validate([
            'nombre' => 'required|max_length[20]',
            'apPaterno' => 'required|max_length[20]',
            'apMaterno' => 'required|max_length[20]',
            'dni' => 'required|max_length[8]',
            'fecha_nacimiento' =>'required',
            'celular' => 'required|max_length[9]',
            'direccion' => 'required|max_length[50]',
            'ref_vivienda' => 'required|max_length[100]',
            'usuario' => 'required|max_length[10]',
            'contraseña' => 'required',
            'tipo_usuario' => 'required',

        ]))
        {
            $hash=password_hash($this->request->getPost('contraseña'),PASSWORD_DEFAULT);
            $coordinador_model->save([
                'nombre' => $this->request->getPost('nombre'),
                'apPaterno' =>  $this->request->getPost('apPaterno'),
                'apMaterno' =>  $this->request->getPost('apMaterno'),
                'dni' =>  $this->request->getPost('dni'),
                'fecha_nacimiento' =>  date('Y-m-d',strtotime($this->request->getPost('fecha_nacimiento'))),
                'celular' =>  $this->request->getPost('celular'),
                'direccion'=> $this->request->getPost('direccion'),
                'ref_vivienda'=> $this->request->getPost('ref_vivienda'),
                'usuario'=> $this->request->getPost('usuario'),
                'contraseña'=> $hash,
                'tipo_usuario'=> $this->request->getPost('tipo_usuario')
    
            ]);
            return redirect()->to(base_url() . '/coordinadorTab');
        } else {

            $data = ['titulo' => 'Crear coordinador','validation'=>$this->validator];
            echo view('header',);
            echo view('coordinador/create', $data);
            echo view('footer');
            
        }
    }
    public function select_one($id)
    {
        $coordinador_model = new CoordinadorModel();      
        $data['coordinador']= $coordinador_model->getCoordinadoresOrCoordinador($id);
        if (empty($data['coordinador'])) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Cannot find the coordinador item: ' . $id);
        }   
        echo view('header');
        echo view('coordinador/update', $data);
        echo view('footer');
    }
    public function update()
    {
        $coordinador_model = new CoordinadorModel();
        $id = $this->request->getPost('id');   
        $hash=password_hash($this->request->getPost('contraseña'),PASSWORD_DEFAULT);     
        $data=[
            'nombre' => $this->request->getPost('nombre'),
            'apPaterno' =>  $this->request->getPost('apPaterno'),
            'apMaterno' =>  $this->request->getPost('apMaterno'),
            'dni' =>  $this->request->getPost('dni'),
            'fecha_nacimiento' =>  date('Y-m-d',strtotime($this->request->getPost('fecha_nacimiento'))),
            'celular' =>  $this->request->getPost('celular'),
            'direccion'=> $this->request->getPost('direccion'),
            'ref_vivienda'=> $this->request->getPost('ref_vivienda'),
            'usuario'=> $this->request->getPost('usuario'),
            'contraseña'=> $hash,
            'tipo_usuario'=> $this->request->getPost('tipo_usuario')
        ];
        $coordinador_model->update($id,$data);
        return redirect()->to(base_url() . '/coordinadorTab');
    }
    public function delete_one($id)
    {
        $coordinador_model = new CoordinadorModel();
        $coordinador_model->delete($id);
        return redirect()->to(base_url() . '/coordinadorTab');
    }
}
