<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Staff extends CI_Controller {

    public function index()
    {
        $data['content'] = $this->load->view('admin/staff/index', '',true);
        $this->load->view('_sharedadmin/layout', $data);
    }

}

/* End of file Staff.php */
