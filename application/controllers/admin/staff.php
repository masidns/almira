<?php

defined('BASEPATH') or exit('No direct script access allowed');

class staff extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('User_model');
        $this->load->model('Staff_model');

    }

    public function index()
    {
        $data['content'] = $this->load->view('admin/staff/index', '', true);
        $this->load->view('_sharedadmin/layout', $data);
    }

    public function get($idstaf = null)
    {
        $result = $this->Staff_model->select($idstaf);
        echo json_encode($result);
    }

    public function add()
    {
        $data = json_decode($this->security->xss_clean($this->input->raw_input_stream), true);
        $result = $this->Staff_model->insert($data);
        echo json_encode($result);
    }

    public function update()
    {
        $data = json_decode($this->security->xss_clean($this->input->raw_input_stream), true);
        $result = $this->Staff_model->update($data);
        echo json_encode($result);
    }

    public function delete($iduser)
    {
        $result = $this->Staff_model->delete($iduser);
        echo json_encode($result);
    }
}

/* End of file Staff.php */
