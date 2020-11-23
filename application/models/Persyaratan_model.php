<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Persyaratan_model extends CI_Model
{
    public function select($idpersyaratan = null)
    {
        if ($idpersyaratan == null) {
            return $this->db->get('persyaratan')->result();
        } else {
            return $this->db->get_where('persyaratan', ['idpersyaratan' => $idpersyaratan])->row_array();
        }
    }
    public function insert($data)
    {
        $this->db->insert('persyaratan', $data);
        $data['idpersyaratan'] = $this->db->insert_id();
        return $data;
    }
    public function update($data = null)
    {
        $persyaratan = [
            'namapersyaratan' => $data['namapersyaratan'],
        ];
        $this->db->where('idpersyaratan', $data['idpersyaratan']);
        $this->db->update('persyaratan', $persyaratan);
        return $data;
    }
    public function delete($idpersyaratan)
    {
        $this->db->where('idpersyaratan', $idpersyaratan);
        return $this->db->delete('persyaratan');
    }
}

/* End of file persyaratan_model.php */
