<?php

namespace App\Controllers;
use  App\Models\UserModel;


class Editprofile extends BaseController
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
                    echo view('editprofile',
                        [
                            'id' => $row->id,
                            'firstname' => $row->fname,
                            'lastname' => $row->lname,
                            'gander' => $row->gander,
                            'dob' => $row->dob,
                            'ms' => $row->ms,
                            'qualification' => $row->qualification,
                            'cno' => $row->cno,
                            'address' => $row->address,
                            'city' => $row->city,
                            'country' => $row->country,
                            'pic' => $row->img,
                            
                        ]);
                }

    }



    public function edituserprofile(){

              

           
                $rules = [
                    'firstname' => 'required|min_length[3]|alpha_space',
                    'lastname' => 'required|min_length[3]|alpha_space',
                
                    ];

            if(!$this->validate($rules)){
                $session = session();

                $data= [

                    'validation' => $this->validator
        
                ];
                $session->setFlashdata($data);
                return redirect('editprofile');
            
            }else{
               
                
                        $id=$this->request->getVar('id');   
                        $firstname=$this->request->getVar('firstname');
                        $lastname=$this->request->getVar('lastname');
                        $qualification=$this->request->getVar('qualification');
                        $cno=$this->request->getVar('cno');
                        $addres=$this->request->getVar('address');
                        $country=$this->request->getVar('country');
                        $city=$this->request->getVar('city');
                        $dob=$this->request->getVar('dob');
                        $gander=$this->request->getVar('gander');
                        $ms=$this->request->getVar('ms');
                        $pic=$this->request->getFile('pic');
                        $opic=$this->request->getVar('opic');
                       
                        if($pic->getSize() === 0){
                            $pic = $opic;
                            
                        }else{

                            helper('filesystem');
                            $path = 'pic/'.$opic;
                            if(file_exists($path)):
                            unlink($path);
                            endif;
                            $picRandName = $pic->getRandomName();
                            $pic->move('pic/', $picRandName);
                           
                            $pic = $picRandName;
                            
                        }

                        $userModel = new UserModel();

                        $data = [
                            'fname' => $firstname,
                            'lname' => $lastname,
                            'qualification' => $qualification,
                            'cno' => $cno,
                            'address' => $addres,
                            'country' => $country,
                            'city' => $city,                 
                            'dob' => $dob,
                            'gander' => $gander,
                            'ms' => $ms,
                            'img' => $pic
                        
                        ];
                        
                        $update = $userModel->update_data($id , $data);
                        
                                
                                $session = session();
                                $data= [

                                    'msg' => 'Successful Update '
                        
                                ];
                                $session->setFlashdata($data);
                                return redirect()->to('editprofile');
                        
                    
            }   
    }

    public function changepassword(){

        $session = session();
        
        $rules = [
            'oldpassword' => 'required|min_length[8]|max_length[255]',
            'newpassword' => 'required|min_length[8]|max_length[255]|differs[oldpassword]',
            'comfirmnewnpass' => 'required|min_length[8]|max_length[255]|matches[newpassword]',
        
            ];

    if(!$this->validate($rules)){
      

        $data= [

            'validation' => $this->validator

        ];
        $session->setFlashdata($data);
        return redirect('editprofile');
    
    }else{
       
        $id=$this->request->getVar('id');   
        $password=$this->request->getVar('newpassword');
        

                $userModel = new UserModel();


                $data = [
                   
                    'id' => $id,
                    'pass' => md5($password),
                
                ];
                $comfirmpass = $userModel->login($data);


                if($comfirmpass == true){
                    $data = [
                        
                        'msg' => 'Old password not matches',
                        
                    ];
                    $session->setFlashdata($data);
                    return redirect()->to('editprofile');
                }else{


                        $data = [
                        'pass' => md5($password),
                    
                    ];
                    
                    $update = $userModel->update_data($id , $data);
                    
                            
                            $session = session();
                            $data= [

                                'msg' => 'Successful Update password'
                    
                            ];
                            $session->setFlashdata($data);
                            return redirect()->to('editprofile');

                } 

               
                
            
    }   





    }
}
