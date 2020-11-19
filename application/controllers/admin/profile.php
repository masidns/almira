<?php

defined('BASEPATH') or exit('No direct script access allowed');

class profile extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Profile_model');
    }

    public function index()
    {
        $data['content'] = $this->load->view('admin/profile/index', '', true);
        $this->load->view('_sharedadmin/layout', $data);
    }

    public function get()
    {
        $result = $this->Profile_model->select();
        echo json_encode($result);
    }

    public function add()
    {
        $data = json_decode($this->security->xss_clean($this->input->raw_input_stream), true);
        $result = $this->Profile_model->insert($data);
        echo json_encode($result);
    }

    public function update()
    {
        $data = json_decode($this->security->xss_clean($this->input->raw_input_stream), true);
        $result = $this->Profile_model->update($data);
        echo json_encode($result);
    }

    public function delete($idprofile)
    {
        $result = $this->Profile_model->delete($idprofile);
        echo json_encode($result);
    }

}

/* End of file Kendaraan.php */
