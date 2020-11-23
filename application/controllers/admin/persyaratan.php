<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Persyaratan extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Persyaratan_model');

    }

    public function index()
    {
        $data ['title'] = 'PAKET KHURSUS ALMIRA';
        $data['content'] = $this->load->view('admin/persyaratan/index', '', true);
        $this->load->view('_sharedadmin/layout', $data);
    }

    public function get($idpersyaratan = null)
    {
        $result = $this->Persyaratan_model->select($idpersyaratan);
        echo json_encode($result);
    }

    public function add()
    {
        $data = json_decode($this->security->xss_clean($this->input->raw_input_stream), true);
        $result = $this->Persyaratan_model->insert($data);
        echo json_encode($result);
    }

    public function update()
    {
        $data = json_decode($this->security->xss_clean($this->input->raw_input_stream), true);
        $result = $this->Persyaratan_model->update($data);
        echo json_encode($result);
    }

    public function delete($idpersyaratan)
    {
        $result = $this->Persyaratan_model->delete($idpersyaratan);
        echo json_encode($result);
    }

}

/* End of file Paket.php */
