<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class home extends CI_Controller {

    public function index()
    {
        $data ['title'] = 'Siswa';
        $data ['content'] = $this->load->view('siswa/home', '',true);
        $this->load->view('_sharedsiswa/layout',$data);
    }

}

/* End of file home.php */
