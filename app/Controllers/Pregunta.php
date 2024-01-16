<?php

namespace App\Controllers;
use App\Models\PreguntaModel;
use App\Models\AlternativaModel;
use CodeIgniter\Controller;

class Pregunta extends BaseController
{
    public function read()
    {
        $pregunta_model = new PreguntaModel();
        $alternativa_model=new AlternativaModel();

        $data = [
            'preguntas'  => $pregunta_model->getPreguntasOrPregunta(),
            'alternativas'=>$alternativa_model->getAlternativasOrAlternativa(),
            'titulo' => 'Preguntas',
        ];
        echo view('header');
        echo view('pregunta/read', $data);
        echo view('footer');
    }

    public function create()
    {
        $model = new PreguntaModel();

        if ($this->request->getMethod() === 'post' && $this->validate([
            'pregunta' => 'required',        
            'area' => 'required|max_length[100]',
            'categoria' => 'required|max_length[50]'

        ]))
        {
            $model->save([
                'pregunta' => $this->request->getPost('pregunta'),            
                'area' => $this->request->getPost('area'),
                'categoria' => $this->request->getPost('categoria'),
                'sug_temporal' => $this->request->getPost('sug_temporal')
            ]);
            return redirect()->to(base_url() . '/preguntaTab');
        } else {

            $data = ['titulo' => 'Formular pregunta','validation'=>$this->validator];
            echo view('header',);
            echo view('pregunta/create', $data);
            echo view('footer');
            
        }
    }
    public function select_one($id)
    {
        $model = new PreguntaModel();            
        
        $data = [
            'pregunta'  => $model->getPreguntasOrPregunta($id),                   
            'titulo' => 'Editar pregunta','validation'=>$this->validator
        ];
        if (empty($data['pregunta'])) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Cannot find the preguntas item: ' . $id);
        }   
        echo view('header');
        echo view('pregunta/update', $data);
        echo view('footer');
    }
    
    public function update()
    {
        $model = new PreguntaModel();
        $id = $this->request->getPost('id');        
        $data=[
            'pregunta' => $this->request->getPost('pregunta'),
            'rubrica' => $this->request->getPost('rubrica'),
            'area' => $this->request->getPost('area'),
            'categoria' => $this->request->getPost('categoria'),
            'sug_temporal' => $this->request->getPost('sug_temporal')
        ];
        $model->update($id,$data);
        return redirect()->to(base_url() . '/preguntaTab');
    }
    public function delete_one($id)
    {
        $model = new PreguntaModel();
        $model->delete($id);
        return redirect()->to(base_url() . '/preguntaTab');
        
    }
}
