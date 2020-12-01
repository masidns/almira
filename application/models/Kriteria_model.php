<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Kriteria_model extends CI_Model
{
    public function select($idkriterianilai = null)
    {
        if ($idkriterianilai == null) {
            return $this->db->get('kriterianilai')->result();
        } else {
            return $this->db->get_where('kriterianilai', ['idkriterianilai' => $idkriterianilai])->row_array();
        }
    }
    public function insert($data)
    {
        $this->db->insert('kriterianilai', $data);
        $data['idkriterianilai'] = $this->db->insert_id();
        return $data;
    }
    public function update($data = null)
    {
        $kriterianilai = [
            'listkriteria' => $data['listkriteria'],
        ];
        $this->db->where('idkriterianilai', $data['idkriterianilai']);
        $this->db->update('kriterianilai', $kriterianilai);
        return $data;
    }
    public function delete($idkriterianilai)
    {
        $this->db->where('idkriterianilai', $idkriterianilai);
        return $this->db->delete('kriterianilai');
    }
}

/* End of file kriterianilai_model.php */
