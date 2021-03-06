<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Paket_model extends CI_Model
{
    public function select($idpaket = null)
    {
        if ($idpaket == null) {
            return $this->db->get('paket')->result();
        } else {
            return $this->db->get_where('paket', ['idpaket' => $idpaket])->row_array();
        }
    }
    public function insert($data)
    {
        $this->db->insert('paket', $data);
        $data['idpaket'] = $this->db->insert_id();
        return $data;
    }
    public function update($data = null)
    {
        $paket = [
            'namapaket' => $data['namapaket'],
            'hargapaket' => $data['hargapaket'],
            'ketpaket' => $data['ketpaket'],
            'jumlahkali' => $data['jumlahkali'],
            'durasiwaktu' => $data['durasiwaktu'],
        ];
        $this->db->where('idpaket', $data['idpaket']);
        $this->db->update('paket', $paket);
        return $data;
    }
    public function delete($idpaket)
    {
        $this->db->where('idpaket', $idpaket);
        return $this->db->delete('paket');
    }
}

/* End of file Paket_model.php */
