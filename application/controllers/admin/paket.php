<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Paket extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Paket_model');

    }

    public function index()
    {
        $data ['title'] = 'PAKET KHURSUS ALMIRA';
        $data['content'] = $this->load->view('admin/paket/index', '', true);
        $this->load->view('_sharedadmin/layout', $data);
    }

    public function get($idpaket = null)
    {
        $result = $this->Paket_model->select($idpaket);
        echo json_encode($result);
    }

    public function add()
    {
        $data = json_decode($this->security->xss_clean($this->input->raw_input_stream), true);
        $result = $this->Paket_model->insert($data);
        echo json_encode($result);
    }

    public function update()
    {
        $data = json_decode($this->security->xss_clean($this->input->raw_input_stream), true);
        $result = $this->Paket_model->update($data);
        echo json_encode($result);
    }

    public function delete($idpaket)
    {
        $result = $this->Paket_model->delete($idpaket);
        echo json_encode($result);
    }

}

/* End of file Paket.php */
