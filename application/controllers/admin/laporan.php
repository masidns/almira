<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Laporan extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Siswa_model');
        $this->load->model('Kendaraan_model');
        $this->load->model('Staff_model');
    }

    public function siswa()
    {
        $data ['title'] = 'Laporan Siswa';
        $data['content'] = $this->load->view('admin/laporan/siswa', '', true);
        $this->load->view('_sharedadmin/layout', $data);
    }

    public function staf()
    {
        $data ['title'] = 'Laporan Staf';
        $data['content'] = $this->load->view('admin/laporan/staf', '', true);
        $this->load->view('_sharedadmin/layout', $data);
    }

    public function keuangan()
    {
        $data ['title'] = 'Laporan Keuangan';
        $data['content'] = $this->load->view('admin/laporan/keuangan', '', true);
        $this->load->view('_sharedadmin/layout', $data);
    }

    public function kendaraan()
    {
        $data ['title'] = 'Laporan Kendaraan';
        $data['content'] = $this->load->view('admin/laporan/kendaraan', '', true);
        $this->load->view('_sharedadmin/layout', $data);
    }

    public function getsiswa()
    {
        $data = json_decode($this->security->xss_clean($this->input->raw_input_stream), true);
        $result = $this->Siswa_model->selectlaporan($data);
        echo json_encode($result);
    }

    public function getstaf()
    {
        $result = $this->Staff_model->select(null);
        echo json_encode($result);
    }

    public function getkendaraan()
    {
        $result = $this->Kendaraan_model->select(null);
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
