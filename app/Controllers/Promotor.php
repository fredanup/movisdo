<?php

namespace App\Controllers;

use App\Models\PromotorModel;
use App\Models\CoordinadorModel;
use CodeIgniter\Controller;

class Promotor extends BaseController
{
    public function viewPromotores()
    {
        $promotor_model = new PromotorModel();
        $coordinador_model=new CoordinadorModel();
        $data = [
            'promotores'  => $promotor_model->getPromotoresOrPromotor(),
            'coordinadores'=>$coordinador_model->getCoordinadoresOrCoordinador(),
            'titulo' => 'Promotores'
        ];
        echo view('header');
        echo view('promotor/view', $data);
        echo view('footer');
    }
    public function viewPromotoresByCoordinadorId($id_coordinador)
    {
        $promotor_model = new PromotorModel();
        $coordinador_model=new CoordinadorModel();
        $coordinador=$coordinador_model->getCoordinadoresOrCoordinador($id_coordinador);
        $data = [
            'promotores'  => $promotor_model->getPromotoresByCoordinadorId($id_coordinador),
            'coordinador'=>$coordinador_model->getCoordinadoresOrCoordinador($id_coordinador),
            'titulo' => 'Promotores de coordinador(a): '.$coordinador['nombre'].' '.$coordinador['apPaterno'].' '.$coordinador['apMaterno']
        ];
        echo view('header');
        echo view('promotor/view', $data);
        echo view('footer');
    }

    public function create()
    {
        $promotor_model = new PromotorModel();
        $coordinador_model=new CoordinadorModel();
        
        
        if ($this->request->getMethod() === 'post' && $this->validate([

            'nombre' => 'required|max_length[20]',
            'apPaterno' => 'required|max_length[20]',
            'apMaterno' => 'required|max_length[20]',
            'dni' => 'required|max_length[10]',
            'fecha_nacimiento' => 'required',
            'celular' => 'required|max_length[10]',
            'direccion'=>'required|max_length[50]',
            'ref_vivienda'=>'required|max_length[100]',
            'usuario'=>'required|max_length[10]',
            'contraseña'=>'required',            
            'correo' =>'required|max_length[50]',
            'estudios'=>'required|max_length[100]',
            'sector'=>'required|max_length[100]',
            'id_coordinador'=>'required|max_length[6]',
            'estab_salud'=>'required|max_length[100]',
            'activo'=>'required|max_length[4]'

        ]))
        {
            $hash=password_hash($this->request->getPost('contraseña'),PASSWORD_DEFAULT);
            $promotor_model->save([
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
                'correo' => $this->request->getPost('correo'),
                'estudios'=> $this->request->getPost('estudios'),
                'sector'=> $this->request->getPost('sector'),
                'id_coordinador'=> $this->request->getPost('id_coordinador'),
                'estab_salud'=> $this->request->getPost('estab_salud'),
                'activo'=> $this->request->getPost('activo')
    
            ]);
            return redirect()->to(base_url() . '/promotorTab');
        } else {
            $data = [
                'promotores'  => $promotor_model->getPromotoresOrPromotor(),
                'coordinadores'=>$coordinador_model->getCoordinadoresOrCoordinador(),
                'titulo' => 'Crear promotor','validation'=>$this->validator
            ];
            
            echo view('header',);
            echo view('promotor/create', $data);
            echo view('footer');
            
        }
    }
    public function select_one($id)
    {
        $promotor_model = new PromotorModel();  
        $coordinador_model=new CoordinadorModel();

        $data = [
            'promotor'  => $promotor_model->getPromotoresOrPromotor($id),
            'coordinadores'=>$coordinador_model->getCoordinadoresOrCoordinador(),
            'titulo' => 'Editar promotor','validation'=>$this->validator
        ];
        if (empty($data['promotor'])) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Cannot find the promotor item: ' . $id);
        }   
        echo view('header');
        echo view('promotor/update', $data);
        echo view('footer');
    }
    public function update()
    {
        $promotor_model = new PromotorModel();
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
                'correo' => $this->request->getPost('correo'),
                'estudios'=> $this->request->getPost('estudios'),
                'sector'=> $this->request->getPost('sector'),
                'id_coordinador'=> $this->request->getPost('id_coordinador'),
                'estab_salud'=> $this->request->getPost('estab_salud'),
                'activo'=> $this->request->getPost('activo')
        ];
        $promotor_model->update($id,$data);
        return redirect()->to(base_url() . '/promotorTab');
    }
    public function delete_one($id)
    {
        $promotor_model = new PromotorModel();
        $promotor_model->delete($id);
        return redirect()->to(base_url() . '/promotorTab');
        
    }
}
