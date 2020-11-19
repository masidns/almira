<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

    public function index()
    {
        $c['content'] = $this->load->view('admin/home', '',true);
        $this->load->view('_sharedadmin/layout',$c);
        
    }

}

/* End of file Home.php */
