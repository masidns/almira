<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class dasbord extends CI_Controller {

    
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Paket_model');
        $this->load->model('Staff_model');
    }
    

    public function index()
    {
        $result['staf'] = $this->Staff_model->select();
        $result['paket'] = $this->Paket_model->select(null);
        $data ['content'] = $this->load->view('dasbord/content', $result, true);
        $this->load->view('dasbord/layout', $data);
    }

}

/* End of file dasbord.php */
