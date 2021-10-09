<?php 

defined('BASEPATH') OR exit('No direct script access allowed');
                        
class Users_model extends CI_Model {
                        
    public function __construct()
    {
        $this->load->database();
    }


    public function login($usernameEmail, $password){
        $this->db->where('email', $usernameEmail);
        $this->db->or_where('username', $usernameEmail);
        $query = $this->db->get('users');

        $user = $query->result()[0];      
        
        if(password_verify($password, $user->password))
            return $user;
        else
            return false;
                                    
    }
    
    public function register($username, $email, $password)
    {
        $data = [
            'username' => $username,
            'email' => $email,
            'password' => password_hash($password, PASSWORD_BCRYPT),
        ];

        $this->db->where('email', $email);
        $query = $this->db->get('users');
        $result = $query->row_array();

        if (! $result) {
            $this->db->insert('users', $data);
            return $this->db->insert_id();
        }

        return null;
    }

    public function get_user($id){
        $this->db->where('id', $id);
        $query = $this->db->get('users');
        return $query->result()[0];
    } 
}
                        
/* End of file Users_model.php */
    
                        