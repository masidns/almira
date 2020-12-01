<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Penilaian extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Penilaian_model');
    }

    public function index($idsiswa = null)
    {
        $data ['title'] = 'Form Penilaian Peserta Kursus';
        $data['content'] = $this->load->view('admin/penilaian/index', '', true);
        $this->load->view('_sharedadmin/layout', $data);
    }

    public function get($idpenilaian = null)
    {
        $result = $this->Penilaian_model->select($idpenilaian);
        echo json_encode($result);
    }

    public function add()
    {
        $data = json_decode($this->security->xss_clean($this->input->raw_input_stream), true);
        $result = $this->Penilaian_model->insert($data);
        echo json_encode($result);
    }

    public function update()
    {
        $data = json_decode($this->security->xss_clean($this->input->raw_input_stream), true);
        $result = $this->Penilaian_model->update($data);
        echo json_encode($result);
    }

    public function delete($idpenilaian)
    {
        $result = $this->Penilaian_model->delete($idpenilaian);
        echo json_encode($result);
    }

}

/* End of file Kendaraan.php */
