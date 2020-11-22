<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Kendaraan extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Kendaraan_model');
    }

    public function index()
    {
        $data ['title'] = 'Kendaraan Almira';
        $data['content'] = $this->load->view('admin/kendaraan/index', '', true);
        $this->load->view('_sharedadmin/layout', $data);
    }

    public function get($idkendaraan = null)
    {
        $result = $this->Kendaraan_model->select($idkendaraan);
        echo json_encode($result);
    }

    public function add()
    {
        $data = json_decode($this->security->xss_clean($this->input->raw_input_stream), true);
        $result = $this->Kendaraan_model->insert($data);
        echo json_encode($result);
    }

    public function update()
    {
        $data = json_decode($this->security->xss_clean($this->input->raw_input_stream), true);
        $result = $this->Kendaraan_model->update($data);
        echo json_encode($result);
    }

    public function delete($idkendaraan)
    {
        $result = $this->Kendaraan_model->delete($idkendaraan);
        echo json_encode($result);
    }

}

/* End of file Kendaraan.php */
