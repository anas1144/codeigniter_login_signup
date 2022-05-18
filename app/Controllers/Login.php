<?php

namespace App\Controllers;

use  App\Models\UserModel;

class Login extends BaseController
{
    public function index()
    {
        helper(['form']);
        $session =session();
        $session->set('isLoginIn', FALSE);
        $session->destroy();
        echo view('templates/header');
        echo view('login');
    }



    public function loginuser()
    {
        helper(['form']);

        $rules = [
            'email' => 'required|min_length[10]|max_length[50]|valid_email',
            'password' => 'required|min_length[8]|max_length[255]',
        ];

       if(!$this->validate($rules)){
        
        echo view('templates/header');
        echo view('login', [
            'validation' => $this->validator

        ]);

       }else{
                $email=$this->request->getVar('email');
                $password=$this->request->getVar('password');
                $userModel = new UserModel();

                $data = [
                   
                    'email' => $email,
                    'pass' => md5($password),
                
                ];
                $login = $userModel->login($data);
                $session = session();
                if($login == true){
                    $ses_data = [
                        
                        'email' => $data['email'],
                        'isLoginIn' => TRUE
                    ];
                    $session->set($ses_data);
                    return redirect()->to('welcome');
                }else{
                    $session->setFlashdata('msg', 'Invalid User');
                   
                    return redirect()->to('login');

                } 
       }
    }

    
    public function logout()
    {
        $session = session();
        $session->set('isLoginIn', FALSE);
        $session->destroy();
        return redirect('login');
    }
}
