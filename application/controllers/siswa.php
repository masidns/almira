<?php
 
 defined('BASEPATH') OR exit('No direct script access allowed');
 
 class Siswa extends CI_Controller {
 
     public function index()
     {
         $data['content']= $this->load->view('admin/siswa/index', '',true);
         $this->load->view('_sharedadmin/layout', $data);
     }
 
 }
 
 /* End of file Siswa.php */
 