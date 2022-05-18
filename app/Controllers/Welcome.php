<?php

namespace App\Controllers;
use  App\Models\UserModel;


class Welcome extends BaseController
{
    public function index()
    {

    $session = session();
    if(!$session->get('isLoginIn') == true){
        return redirect()->to('login');
    }else{
        $email = $session->get('email');
        $UserModel = new UserModel;
        $row = $UserModel->get_user_data($email);
       
       
        echo view('templates/header');
        echo view('welcome',
        [
            'firstname' => $row->fname,
            'lastname' => $row->lname,
            'username' => $row->username,
            'email' => $row->email,
            'gander' => $row->gander,
            'dob' => $row->dob,
            'ms' => $row->ms,
            'qualification' => $row->qualification,
            'cno' => $row->cno,
            'address' => $row->address,
            'city' => $row->city,
            'country' => $row->country,
            'pic' => $row->img
        ]);
    }
       
    }
}
