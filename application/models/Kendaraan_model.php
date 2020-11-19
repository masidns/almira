<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Kendaraan_model extends CI_Model
{
    public function select($idkendaraan = null)
    {
        if ($idkendaraan == null) {
            return $this->db->get('kendaraan')->result();
        } else {
            return $this->db->get_where('kendaraan', ['idkendaraan' => $idkendaraan])->row_array();
        }
    }
    public function insert($data)
    {
        $this->db->insert('kendaraan', $data);
        $data['idkendaraan'] = $this->db->insert_id();
        return $data;
    }
    public function update($data = null)
    {
        $kendaraan = [
            'namamobil' => $data['namamobil'],
            'jenismobil' => $data['jenismobil'],
            'merkmobil' => $data['merkmobil'],
            'stok' => $data['stok'],
        ];
        $this->db->where('idkendaraan', $data['idkendaraan']);
        $this->db->update('kendaraan', $kendaraan);
        return $data;
    }
    public function delete($idkendaraan)
    {
        $this->db->where('idkendaraan', $idkendaraan);
        return $this->db->delete('kendaraan');
    }
}

/* End of file Kendaraan_model.php */
