<?php

namespace App\Controllers;

use  CodeIgniter\Debug\Toolbar\Collectors\Views;
use  App\Models\UserModel;

class Register extends BaseController
{
    public function index()
    {
        helper(['form']);
        $session =session();
        $session->set('isLoginIn', FALSE);
        $session->destroy();
        echo view('templates/header');
        echo view('register');
    }

    public function registeruser()
    {   

        
       $rules = [
            'firstname' => 'required|min_length[3]|alpha_space',
            'lastname' => 'required|min_length[3]|alpha_space',
            'username' => 'required|min_length[3]|alpha_space|is_unique[username.username]',
            'email' => 'required|min_length[10]|max_length[50]|valid_email|is_unique[username.email]',
            'password' => 'required|min_length[8]|max_length[255]',
            'confirmpass' => 'required|min_length[8]|max_length[255]|matches[password]',
            'gander' => 'required',
        ];

       if(!$this->validate($rules)){
        helper(['form']);
        echo view('templates/header');
        echo view('register', [
            'validation' => $this->validator

        ]);

       }else{
        
                $firstname=$this->request->getVar('firstname');
                $lastname=$this->request->getVar('lastname');
                $username=$this->request->getVar('username');
                $email=$this->request->getVar('email');
                $password=$this->request->getVar('password');
                $confirmpass=$this->request->getVar('confirmpass');
                $qualification=$this->request->getVar('qualification');
                $cno=$this->request->getVar('cno');
                $addres=$this->request->getVar('address');
                $country=$this->request->getVar('country');
                $city=$this->request->getVar('city');
                $dob=$this->request->getVar('dob');
                $gander=$this->request->getVar('gander');
                $ms=$this->request->getVar('ms');
                $pic=$this->request->getFile('pic');
                
                if($pic->getSize() === 0){
                    $pic = '';
            
                }else{

                    $picRandName = $pic->getRandomName();
                    $pic->move('pic/', $picRandName);
                    $pic = $picRandName;
                    
                }

                $userModel = new UserModel();

                $data = [
                    'fname' => $firstname,
                    'lname' => $lastname,
                    'username' => $username,
                    'email' => $email,
                    'pass' => md5($password),
                    'qualification' => $qualification,
                    'cno' => $cno,
                    'address' => $addres,
                    'country' => $country,
                    'city' => $city,                 
                    'dob' => $dob,
                    'gander' => $gander,
                    'ms' => $ms,
                    'img' => $pic,
                   
                ];
               
                $insert = $userModel->insert_data($data);
                if($insert){
                    helper(['form']);
                    echo view('templates/header');
                    echo view('register', [
                    'data' => 'Successful Registration'
                     ]);
                }
                // $session = session();
                // $session->setFlashdata('success', 'Successful Registration');
                // return redirect()->to('login');
                
        } 
    }
}
