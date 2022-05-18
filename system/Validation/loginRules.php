<?php
namespace CodeIgniter\Validation;
use App\Models\UserModel;




class LoginRules{

    public function validUser(array $data){
      $model = new UserModel();
      $user = $model->where('email', $data['email'])
                    ->first();
  
      if(!$user)
        return false;
  
      return password_verify($data['password'], $user['password']);
    }
  }
?>