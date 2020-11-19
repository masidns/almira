<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Jadwal_model extends CI_Model
{
    public function select($idsiswa = null)
    {
        if ($idsiswa == null) {
            return $this->db->get('jadwal')->result();
        } else {
            return $this->db->get_where('jadwal', ['idsiswa' => $idsiswa])->result();
        }
    }
    public function insert($data)
    {
        $this->db->insert('jadwal', $data);
        $data['idjadwal'] = $this->db->insert_id();
        return $data;
    }
    public function update($data = null)
    {
        $jadwal = [
            'layananlain' => $data['layananlain'],
            'promo' => $data['promo'],
            'kontak' => $data['kontak'],
            'namaperusahaan' => $data['namaperusahaan'],
            'alamat' => $data['alamat'],
            'email' => $data['email'],
            'visi' => $data['visi'],
            'misi' => $data['misi'],
        ];
        $this->db->where('idjadwal', $data['idjadwal']);
        $this->db->update('jadwal', $jadwal);
        return $data;
    }
    public function delete($idjadwal)
    {
        $this->db->where('idjadwal', $idjadwal);
        return $this->db->delete('jadwal');
    }

}

/* End of file Jadwal_model.php */
