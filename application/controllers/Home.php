<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
    
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Staff_model');
        $this->load->model('Siswa_model');
        $this->load->model('Kendaraan_model');
    }
    

    public function index()
    {
        $data['staf'] = $this->Staff_model->select(null);
        $data['siswa'] = $this->Siswa_model->select(null);
        $data['kendaraan'] = $this->Kendaraan_model->select(null);
        $data['total'] = 0;
        $data['piutang'] = 0;
        $data ['title'] = 'LEMBAGA KURSUS MENGEMUDI ALMIRA';
        foreach ($data['siswa'] as $key => $value) {
            if($value->num>1){
                foreach ($value->pembayaran as $key1 => $pembayaran) {
                    $data['total'] += $pembayaran->nominal;
                } 
            }else{
                foreach ($value->pembayaran as $key1 => $pembayaran) {
                    if($pembayaran->jenis=='DP'){
                        $data['total'] += $pembayaran->nominal;
                        $data['piutang'] += $value->paket['hargapaket'] - $pembayaran->nominal;
                    }else{
                        $data['total'] += $pembayaran->nominal;
                    }
                } 
            }
        }
        $c['content'] = $this->load->view('admin/home', $data,true);
        $this->load->view('_sharedadmin/layout',$c);
        
    }

}

/* End of file Home.php */
