<?php

namespace App\Controllers;
use App\Models\PreguntaModel;
use App\Models\AlternativaModel;
use CodeIgniter\Controller;

class Alternativa extends BaseController
{
    public function read($id_pregunta)
    {
        

        $alternativa_model = new AlternativaModel();
        $pregunta_model=new PreguntaModel();
        $pregunta  = $pregunta_model->getPreguntasOrPregunta($id_pregunta);
        $data = [
            'alternativas'  => $alternativa_model->getAlternativasByPreguntaId($id_pregunta),            
            'titulo' => $pregunta['pregunta'],
            'id_pregunta' =>$pregunta['id']
        ];
        echo view('header');
        echo view('alternativa/read', $data);
        echo view('footer');
    }

    public function create()
    {
        $model = new AlternativaModel();

        if ($this->request->getMethod() === 'post' && $this->validate([
            'alternativa' => 'required|max_length[255]',
            'id_pregunta' =>'required|max_length[6]',

        ]))
        {
            $model->save([
                'alternativa' => $this->request->getPost('alternativa'),
                'id_pregunta' => $this->request->getPost('id_pregunta')
            ]);
            $data=[
                'id_pregunta'=> $this->request->getPost('id_pregunta')            
            ];
            return redirect()->to(base_url() . '/read_alternativa_pregunta/'.$data['id_pregunta']);
        } else {

            $data = ['titulo' => 'Escribir alternativa','validation'=>$this->validator];
            echo view('header',);
            echo view('alternativa/create', $data);
            echo view('footer');
            
        }
    }
    
    public function select_many($id_pregunta)
    {
        $pregunta_model = new PreguntaModel();            
        $alternativa_model = new AlternativaModel();
        $pregunta  = $pregunta_model->getPreguntasOrPregunta($id_pregunta);
        $data = [
            'pregunta'  => $pregunta_model->getPreguntasOrPregunta($id_pregunta),    //registro de la pregunta
            'alternativa_pregunta' => $alternativa_model->getAlternativasByPreguntaId($id_pregunta),//lista de alternativas cuyo id_pregunta es el de arriba               
            'titulo' => 'Alternativas de '.$pregunta['pregunta'],'validation'=>$this->validator //encabezado
            
        ];
        if (empty($data['pregunta'])) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Cannot find the preguntas item: ' . $id_pregunta);
        }   
        echo view('header');
        echo view('alternativa/create', $data);
        echo view('footer');
    }
    
    public function select_one($id_alternativa)
    {
        $model = new AlternativaModel();      
        $data=['alternativa'=>$model->getAlternativasOrAlternativa($id_alternativa),'titulo' => 'Escribir alternativa','validation'=>$this->validator];
        if (empty($data['alternativa'])) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Cannot find the alternativa item: ' . $id_alternativa);
        }   
        echo view('header');
        echo view('alternativa/update', $data);
        echo view('footer');
    }

    public function update()
    {
        $model = new AlternativaModel();
        $id = $this->request->getPost('id');        
        $data=[
            'alternativa' => $this->request->getPost('alternativa'),
            'id_pregunta'=> $this->request->getPost('id_pregunta')            
        ];
        $model->update($id,$data);
        return redirect()->to(base_url() . '/read_alternativa_pregunta/'.$data['id_pregunta']);
    }

    public function delete_one($id_alternativa)
    {
        $model = new AlternativaModel();   
        $data  = $model->getAlternativasOrAlternativa($id_alternativa);        
        $model->delete($id_alternativa);        
        return redirect()->to(base_url() . '/read_alternativa_pregunta/'.$data['id_pregunta']);
    }
}

