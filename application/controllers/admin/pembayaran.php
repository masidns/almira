<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Pembayaran extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Pembayaran_model');
    }

    public function index()
    {
        $data ['title'] = 'Pembayaran Peserta Kursus';
        $data['content'] = $this->load->view('admin/pembayaran/index', '', true);
        $this->load->view('_sharedadmin/layout', $data);
    }

    public function get($idsiswa = null)
    {
        $result = $this->Pembayaran_model->select($idpenilaian);
        echo json_encode($result);
    }

    public function add()
    {
        $data = json_decode($this->security->xss_clean($this->input->raw_input_stream), true);
        $result = $this->Pembayaran_model->insert($data);
        echo json_encode($result);
    }

    public function update()
    {
        $data = json_decode($this->security->xss_clean($this->input->raw_input_stream), true);
        $result = $this->Pembayaran_model->update($data);
        echo json_encode($result);
    }

    public function delete($idpenilaian)
    {
        $result = $this->Pembayaran_model->delete($idpenilaian);
        echo json_encode($result);
    }

}

/* End of file Kendaraan.php */
