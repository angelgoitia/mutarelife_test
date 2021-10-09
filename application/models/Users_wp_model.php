<?php
 
defined('BASEPATH') OR exit('No direct script access allowed');

define( 'WP_USE_THEMES', false ); // Do not use the theme files
define( 'COOKIE_DOMAIN', false ); // Do not append verify the domain to the cookie
define( 'DISABLE_WP_CRON', true ); // We don't want extra things running...

// Path (absolute or relative) to where your WP core is running
require(ABSPATH . '\wp-load.php');


class Users_wp_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->db2 = $this->load->database('otherdb', TRUE);
    }
   
    public function login($user_usernameEmail, $user_pass) {

        $query_password = $this->db2->get_where('wp_users', array('user_email' => $user_usernameEmail), 1, 0);
        $query_password2 = $this->db2->get_where('wp_users', array('user_login' => $user_usernameEmail), 1, 0);
        $user = $query_password->row();
        $user2 = $query_password2->row();
       
        if(password_verify($user_pass, $user->user_pass) || password_verify($user_pass, $user2->user_pass)  ) {
            
            $creds                  = array();
            $creds['user_login']    = $user_usernameEmail;
            $creds['user_password'] = $user_pass;
            $creds['remember']      = true;
            
            $user                   = wp_signon( $creds, false );

            if ( is_wp_error( $user ) ) {
                echo $user->get_error_message();
            } else {
                wp_set_auth_cookie( $user->ID, true );
            }

            if ( !is_wp_error( $user ) ) {
                return true;
            }else{
                return false;
            }
        }
        return false;
    }
   
   
    public function add_user($username, $email, $password) {
   
        $user_data = array(
            'user_login'        =>  $username,
            'user_email'        =>  $email,
            'user_pass'         =>  password_hash($password, PASSWORD_BCRYPT),
            'user_registered'   =>  date("Y-m-d H:i:s", time()),
            'user_nicename'     =>  url_title($email, 'dash', TRUE),   
            'display_name'      =>  $username,
        );
       
        $cleaned_data = $this->security->xss_clean($user_data);
       
        $this->db2->insert('wp_users', $user_data);
       
        $this->db2->select('ID');
        $user_check = $this->db2->get_where('wp_users', array('user_email' => $email), 1, 0);
       
        if($user_check->num_rows() > 0){
            $user = $user_check->row();
            return true;
        } else {
            return false;
        }
           
    }
   
    public function add_user_meta($user_id, $meta_key, $meta_value) {
   
        $user_metadata = array(
            'user_id'           =>  $user_id,
            'meta_key'          =>  $meta_key,
            'meta_value'        =>  $meta_value
        );
       
        $cleaned_data = $this->security->xss_clean($user_metadata);
       
        $this->db2->insert('ci_usermeta', $cleaned_data);
       
        $add_meta_check = $this->db2->get_where('ci_usermeta', array('user_id' => $user_id, 'meta_key' => $meta_key, 'meta_value' => $meta_value), 1, 0);
       
        if($add_meta_check->num_rows() > 0){
            return true;
        } else {
            return false;
        }
    }
   
    public function update_user_meta($user_id, $meta_key, $meta_value) {
       
        $meta_exits = $this->db2->get_where('ci_usermeta', array('user_id' => $user_id, 'meta_key' => $meta_key), 1, 0);
       
        if($meta_exits->num_rows() > 0){
       
            $user_metadata = array(
                'meta_value'        =>  $meta_value
            );
           
            $cleaned_data = $this->security->xss_clean($user_metadata);
           
            $this->db2->where(array('user_id' => $user_id, 'meta_key' => $meta_key));
            $this->db2->update('ci_usermeta', $cleaned_data);
           
            $update_meta_check = $this->db2->get_where('ci_usermeta', array('user_id' => $user_id, 'meta_key' => $meta_key, 'meta_value' => $meta_value), 1, 0);
           
            if($update_meta_check->num_rows() > 0){
                return true;
            } else {
                return false;
            }
           
        } else {
            self::add_user_meta($user_id, $meta_key, $meta_value);
            return true;
           
        }
       
    }
   
   
    public function get_user_meta($user_id, $key = '', $single = TRUE) {
       
        $where = '';
       
        if($key){
            $where .= ' AND meta_key = "'.$key.'"';
        }
       
        $user_meta = $this->db2->query('SELECT * FROM ci_usermeta WHERE user_id = ?'.$where, array($user_id) );
       
        if($single){
       
            $row = $user_meta->row();
            if($row){
                return $row->meta_value;
            } else {
                return '';
            }
               
        } else {
            return $user_meta->result();
        }
       
       
    }
   
    public function update_user($userdata_array) {
       
        extract($userdata_array);
        $data = '';
       
        if(!empty($user_login)){
            $data['user_login'] = $user_login;
        }
        if(!empty($user_email)){
            $data['user_email'] = $user_email;
            $data['user_nicename'] = url_title($user_email, 'dash', TRUE);
        }
        if(!empty($user_pass)){
            $data['user_pass'] = $this->passwordhash->HashPassword($user_pass);
        }
               
        $cleaned_data = $this->security->xss_clean($data);
       
        $this->db2->update('wp_users', $cleaned_data);
       
    }
   
   
}