<?php
    namespace App\Models;  
    use CodeIgniter\Model;
    
    
    class UserModel extends Model
    {

        protected $table = 'username';

        protected $db;

        

        
        public function __construct()
        {
        parent::__construct();
        $this->db = \Config\Database::connect();
       
        }
        
        public function insert_data($data = array())
        {
        $this->db->table($this->table)->insert($data);
        return $this->db->insertID();
        }

        public function login($data = array())
        {
        $data = $this->db->table($this->table)->where($data);

        $row = $data->countAllResults();
        if($row == 1){
            return true;
        }else{
            return false;
        }
        }

        public function update_data($id, $data = array())
        {
        $this->db->table($this->table)->update($data, array(
            "id" => $id,
        ));
        return $this->db->affectedRows();
        }

        

        public function get_user_data($email)
        {
        $query = $this->db->query("select * from " .$this->table . " where email = '$email'");
        return $query->getRow();
        }

        

    }
?>