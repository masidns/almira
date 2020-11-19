<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{

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
        $data = $_POST;
        $result = $this->User_model->login($data);
        if($result)
        redirect('');
        else
        redirect('');

    }

    public function add()
    {
        $data = json_decode($this->security->xss_clean($this->input->raw_input_stream), true);
    }

    public function update()
    {
        # code...
    }

    public function delete($id)
    {
        echo json_encode($this->User_model->delete($id));
    }

}

/* End of file Auth.php */
