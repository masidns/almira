<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Jadwal_model extends CI_Model
{
    public function select($idjadwal = null)
    {
        if ($idjadwal == null) {
            $result = $this->db->get('jadwal')->result();
            foreach ($result as $key => $value) {
                $value->kendaraan = $this->db->get_where('kendaraan', ['idkendaraan'=>$value->idkendaraan])->row_array();
            }
            return $result;
        } else {
            $result =  $this->db->get_where('jadwal', ['idjadwal' => $idjadwal])->row_array();
            $result['kendaraan'] = $this->db->get_where('kendaraan', ['idkendaraan'=>$result['idkendaraan']])->row_array();
            return $result;
        }
    }
    public function insert($data)
    {
        $item = [
            'hari'=>$data['hari'],
            'jammulai'=>$data['jammulai'],
            'jamselesai'=>$data['jamselesai'],
            'idkendaraan'=>$data['kendaraan']['idkendaraan'],
        ];
        $this->db->insert('jadwal', $item);
        $data['idjadwal'] = $this->db->insert_id();
        return $data;
    }
    public function update($data = null)
    {
        $jadwal = [
            'hari' => $data['hari'],
            'jadwal' => $data['jadwal'],
            'jammulai' => $data['jammulai'],
            'jamselesai' => $data['jamselesai'],
            'idkendaraan'=>$data['kendaraan']['idkendaraan'],
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
