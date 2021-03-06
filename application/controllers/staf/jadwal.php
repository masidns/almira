<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Jadwal extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Jadwal_model');
        $this->load->model('Siswa_model');
    }

    public function index()
    {
        $data['title'] = 'JADWAL';
        $data['content'] = $this->load->view('staf/jadwal/index', '', true);
        $this->load->view('_sharedstaf/layout', $data);
    }

    public function get($idjadwal = null)
    {
        $result = $this->Jadwal_model->selectjadwal(null);
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
