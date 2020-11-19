<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Profile_model extends CI_Model
{
    public function select()
    {
        return $this->db->get('profile')->row_array();
    }
    public function insert($data)
    {
        $this->db->insert('profile', $data);
        $data['idprofile'] = $this->db->insert_id();
        return $data;
    }
    public function update($data = null)
    {
        $profile = [
            'layananlain' => $data['layananlain'],
            'promo' => $data['promo'],
            'kontak' => $data['kontak'],
            'namaperusahaan' => $data['namaperusahaan'],
            'alamat' => $data['alamat'],
            'email' => $data['email'],
            'visi' => $data['visi'],
            'misi' => $data['misi'],
        ];
        $this->db->where('idprofile', $data['idprofile']);
        $this->db->update('profile', $profile);
        return $data;
    }
    public function delete($idprofile)
    {
        $this->db->where('idprofile', $idprofile);
        return $this->db->delete('profile');
    }
}

/* End of file Profile_model.php */
