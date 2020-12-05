<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Kriteria extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Kriteria_model');
    }

    public function index()
    {
        $data ['title'] = 'KRITERIA PENILAIAN ALMIRA';
        $data['content'] = $this->load->view('admin/kriteria/index', '', true);
        $this->load->view('_sharedadmin/layout', $data);
    }

    public function get($idkriteria = null)
    {
        $result = $this->Kriteria_model->select($idkriteria);
        echo json_encode($result);
    }

    public function add()
    {
        $data = json_decode($this->security->xss_clean($this->input->raw_input_stream), true);
        $result = $this->Kriteria_model->insert($data);
        echo json_encode($result);
    }

    public function update()
    {
        $data = json_decode($this->security->xss_clean($this->input->raw_input_stream), true);
        $result = $this->Kriteria_model->update($data);
        echo json_encode($result);
    }

    public function delete($idkriteria)
    {
        $result = $this->Kriteria_model->delete($idkriteria);
        echo json_encode($result);
    }

}

/* End of file Kendaraan.php */
