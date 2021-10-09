<?php 
        
defined('BASEPATH') OR exit('No direct script access allowed');

define( 'WP_USE_THEMES', false ); // Do not use the theme files
define( 'COOKIE_DOMAIN', false ); // Do not append verify the domain to the cookie
define( 'DISABLE_WP_CRON', true ); // We don't want extra things running...

// Path (absolute or relative) to where your WP core is running
require(ABSPATH . '\wp-load.php');

class Login_controller extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->library('session');
        $this->load->library('form_validation');
        $this->load->model('Users_model');
        $this->load->model('Users_wp_model');
    }

    public function index()
    {
        if(!$this->session->userdata('logged_in')){
            $urlLogin = $_SERVER['REQUEST_URI'];
            $urlLogin = str_replace("login/","wp/wp-login.php",$urlLogin);
            $this->load->helper('url'); 
            $this->load->view('navbar/navbar');
            $this->load->view('auth/login',compact('urlLogin'));
        }else{
            return redirect(base_url().'wp', 'inicial');
        }            
    }

    public function form()
    {
        $usernameEmail = $this->input->post('usernameEmail');
        $password = $this->input->post('password');

        $user = $this->Users_model->login($usernameEmail,$password);
        $user_wp = $this->Users_wp_model->login($usernameEmail,$password);
        if(!empty($user) && $user_wp){
            $newdata = array(
                'ID'            => $user->id,
                'username'  => $user->username,
                'logged_in'     => TRUE
            );
           
            $this->session->set_userdata($newdata);
            return redirect(base_url().'wp', 'inicial');
        }else{
            $status_error = true;
            $message_error = 'Email y/o contraseña es incorrecto';
            $this->load->helper('url'); 
            $this->load->view('navbar/navbar');
            $this->load->view('auth/login', compact('status_error', 'message_error')); 
        } 
    }

    public function logout()
    {
        $this->session->sess_destroy();
        wp_destroy_current_session();
		wp_clear_auth_cookie();
		wp_set_current_user( 0 );
        return redirect(base_url(), 'main');
    }
        
}
        
    /* End of file  Login_controller.php */
        
                            