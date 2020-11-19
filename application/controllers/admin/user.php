<?php

defined('BASEPATH') or exit('No direct script access allowed');

class user extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('User_model');
    }

    public function index()
    {
        $data = $this->User_model->select();
        $content['content'] = $this->load->view('admin/user/index', $data, true);
        $this->load->view('_sharedadmin/layout', $content);
    }
}

/* End of file user.php */
