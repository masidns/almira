<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Kendaraan extends CI_Controller {

    public function index()
    {
        $data['content'] = $this->load->view('admin/kendaraan/index', '', true);
        $this->load->view('_sharedadmin/layout', $data);
    }

}

/* End of file Kendaraan.php */
