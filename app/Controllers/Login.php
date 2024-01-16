<?php

namespace App\Controllers;

use App\Models\CoordinadorModel;
use CodeIgniter\Controller;

class Login extends BaseController
{
    public function authentication(){

        $coordinador_model=new CoordinadorModel();
       
        if ($this->request->getMethod() === 'post' && $this->validate([
            'usuario' => 'required',
            'contraseña' => 'required'])){

            
             $usuario=$this->request->getPost('usuario');
             $contraseña=$this->request->getPost('contraseña');
            // $coordinador= $coordinador_model->getCoordinadorByUserAndPass($usuario,$password);
            // if($coordinador!=null){
            //     $dataSession=[
            //         'id'=>$coordinador['id'],
            //         'nombre'=>$coordinador['nombre'],
            //         'apPaterno'=>$coordinador['apPaterno'],
            //         'apMaterno'=>$coordinador['apMaterno'],                        
            //         'tipo_usuario'=>$coordinador['tipo_usuario']
                    
            //     ];
            //     $session=session();
            //     $session->set($dataSession);
            //     return redirect()->to(base_url() .'/promotorTab');
            // }
            // else{  
            //         $data['error']="El usuario no existe";
            //         echo view('login');
            // }

                $coordinador=$coordinador_model->getCoordinadoresByUsername($usuario);
                if(password_verify($contraseña, $coordinador['contraseña'])){
                    $dataSession=[
                        'id'=>$coordinador['id'],
                        'nombre'=>$coordinador['nombre'],
                        'apPaterno'=>$coordinador['apPaterno'],
                        'apMaterno'=>$coordinador['apMaterno'],                        
                        'tipo_usuario'=>$coordinador['tipo_usuario']
                        
                    ];
                    $session=session();
                    $session->set($dataSession);
                    return redirect()->to(base_url() .'/promotorTab');
                }
                else{
                    $data['error']="El usuario no existe";
                    echo view('login');
                }
           
        }      
        
    }
    public function viewLogin(){
                echo view('login');

    }
    public function logout(){
        $session=session();
        $session->destroy();
        return redirect()->to(base_url());
    }
}
