<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
    
    public function __construct()
    {
        parent::__construct();
        $this->load->model('User_model');
        
    }
    

    public function index()
    {
        $this->load->view('login');
    }

    public function login()
    {
        $data = json_decode($this->security->xss_clean($this->input->raw_input_stream), true);
        $result = $this->User_model->login($data);
        $result['is_login'] = true;
        if($result != false){
            $this->session->set_userdata( $result );
            echo json_encode($result);
        }else{
            http_response_code(500);
        }
    }

}

/* End of file login.php */
