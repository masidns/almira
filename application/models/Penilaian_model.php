<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Penilaian_model extends CI_Model
{
    public function select($idpenilaian = null)
    {
        if ($idpenilaian == null) {
            return $this->db->get('penilaian')->result();
        } else {
            return $this->db->get_where('penilaian', ['idpenilaian' => $idpenilaian])->row_array();
        }
    }
    public function insert($data)
    {
        $result = [];
        $this->db->trans_begin();
        foreach ($data['nilai'] as $key => $value) {
            $item = [
                'idsiswa'=>$data['idsiswa'],
                'idkriterianilai'=>$value['idkriterianilai'],
                'idstaf'=>$value['staf']['idstaf'],
                'hasil'=>$value['nilai']['hasil'],
                'keterangan'=>$value['nilai']['keterangan'],
            ];
            $this->db->insert('penilaian', $item);
            $item['idpenilaian'] = $this->db->insert_id();
            $item['listkriteria'] = $value['listkriteria'];
            $item['namastaf'] = $value['staf']['namastaf'];
            array_push($result, $item);
        }
        if($this->db->trans_status()){
            $this->db->trans_commit();
            return $result;
        }else{
            $this->db->trans_rollback();
            return false;
        }
    }
    public function update($data = null)
    {
        $penilaian = [
            'namapenilaian' => $data['namapenilaian'],
            'hargapenilaian' => $data['hargapenilaian'],
            'ketpenilaian' => $data['ketpenilaian'],
            'jumlahkali' => $data['jumlahkali'],
            'durasiwaktu' => $data['durasiwaktu'],
        ];
        $this->db->where('idpenilaian', $data['idpenilaian']);
        $this->db->update('penilaian', $penilaian);
        return $data;
    }
    public function delete($idpenilaian)
    {
        $this->db->where('idpenilaian', $idpenilaian);
        return $this->db->delete('penilaian');
    }
}

/* End of file penilaian_model.php */
