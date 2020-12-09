<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Siswa extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Siswa_model');

    }

    public function index()
    {
        $data ['title'] = 'DATA SISWA ALMIRA';
        $data['content'] = $this->load->view('siswa/siswa/index', '', true);
        $this->load->view('_sharedsiswa/layout', $data);
    }

    public function get($idsiswa = null)
    {
        $result = $this->Siswa_model->select($idsiswa);
        echo json_encode($result);
    }
    
    public function getid()
    {
        $id = $this->session->userdata('idsiswa');
        $result = $this->Siswa_model->select($id);
        echo json_encode($result);
    }

    public function add()
    {
        $data = json_decode($this->security->xss_clean($this->input->raw_input_stream), true);
        $result = $this->Siswa_model->insert($data);
        echo json_encode($result);
    }

    public function update()
    {
        $data = json_decode($this->security->xss_clean($this->input->raw_input_stream), true);
        $result = $this->Siswa_model->update($data);
        echo json_encode($result);
    }

    public function delete($iduser)
    {
        $result = $this->Siswa_model->delete($iduser);
        echo json_encode($result);
    }

}

/* End of file Siswa.php */
