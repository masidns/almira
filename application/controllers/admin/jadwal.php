<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Jadwal extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Jadwal_model');

    }

    public function index()
    {
        $data ['title'] = 'Jadwal';
        $data['content'] = $this->load->view('admin/jadwal/index', '', true);
        $this->load->view('_sharedadmin/layout', $data);
    }

    public function get($idsiswa = null)
    {
        $result = $this->Jadwal_model->select($idsiswa);
        echo json_encode($result);
    }

    public function add()
    {
        $data = json_decode($this->security->xss_clean($this->input->raw_input_stream), true);
        $result = $this->Jadwal_model->insert($data);
        echo json_encode($result);
    }

    public function update()
    {
        $data = json_decode($this->security->xss_clean($this->input->raw_input_stream), true);
        $result = $this->Jadwal_model->update($data);
        echo json_encode($result);
    }

    public function delete($idjadwal)
    {
        $result = $this->Jadwal_model->delete($idjadwal);
        echo json_encode($result);
    }

}

/* End of file Siswa.php */
