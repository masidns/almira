<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Staff_model extends CI_Model
{
    public function select()
    {
        # code...
    }
    public function insert($data)
    {
        $this->db->trans_begin();
        $user = [
            'username' => $data['email'],
            'password' => md5($data['email']),
        ];
        $this->db->insert('user', $user);
        $iduser = $this->db->insert_id();
        $role = [
            'iduser' => $iduser,
            'idrule' => $data['roles']['id'],
        ];
        $this->db->insert('userrule', $role);
        $staf = [
            'namastaf' => $data['namastaf'],
            'alamat' => $data['alamat'],
            'tlpn' => $data['tlpn'],
            'email' => $data['email'],
            'iduser' => $iduser,
        ];
        $this->db->insert('staf', $staf);
        $idpegawai = $this->db->insert_id();
        if ($this->db->trans_status()) {
            $this->db->trans_commit();
            return $idpegawai;
        } else {
            $this->db->trans_rollback();
            return false;
        }
    }
    public function update()
    {
        # code...
    }
    public function delete()
    {
        # code...
    }

}

/* End of file ModelName.php */
