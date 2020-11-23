<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class home extends CI_Controller {

    public function index()
    {
        $data ['title'] = 'Siswa';
        // $data ['content'] = $this->load->view('login', '',true);
        $this->load->view('loginalmira',$data);
    }

}

/* End of file home.php */
