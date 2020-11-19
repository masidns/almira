<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Paket extends CI_Controller {

    public function index()
    {
        $data['content'] = $this->load->view('admin/paket/index', '',true);
        $this->load->view('_sharedadmin/layout', $data);
    }

}

/* End of file Paket.php */
