<?php 
        
defined('BASEPATH') OR exit('No direct script access allowed');
        
class Register_controller extends CI_Controller {

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
            $this->load->helper('url'); 
            $this->load->view('navbar/navbar');
		    $this->load->view('auth/register'); 
        }else{
            return redirect(base_url().'wp', 'inicial');
        }                  
    }

    public function form()
    {
        if($this->input->post('username') == null || $this->input->post('email') == null || $this->input->post('password') == null)
            return redirect(base_url().'register', 'refresh');

        $username = $this->input->post('username');
        $email = $this->input->post('email');
        $password = $this->input->post('password');

        $this->form_validation->set_rules('username', 'Username', 'trim|required|min_length[5]|max_length[20]');
        $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[8]');
        $this->form_validation->set_rules('passwordConfirm', 'Password Confirmation', 'trim|required|matches[password]');
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');

        if ($this->form_validation->run() == FALSE)
        {
            $status_error = true;
            $message_error = 'Ingrese los campos correctamente';
            $this->load->view('navbar/navbar');
            $this->load->view('auth/register', compact('status_error','message_error')); 
        }
        else
        {
            $userId = $this->Users_model->register($username, $email,$password);
            $user_wp = $this->Users_wp_model->add_user($username, $email,$password);

            if(isset($useId) && $user_wp)
            {
                $newdata = array(
                    'ID'            => $userId,
                    'display_name'  => $username,
                    'logged_in'     => TRUE
                );
               
                $this->session->set_userdata($newdata);
                return redirect(base_url().'wp', 'inicial');
            }
            else
            {
                $status_error = true;
                $message_error = 'El email ya se encuentra registrado';
                $this->load->view('navbar/navbar');
                $this->load->view('auth/register', compact('status_error','message_error')); 
            } 
        }
    }
        
}
        
    /* End of file  Register_controller.php */
        
                            