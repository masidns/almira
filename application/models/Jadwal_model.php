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
    public function selectjadwal($idjadwal = null)
    {
        $datasiswa = [];
        $siswas = $this->db->get('siswa')->result();
            foreach ($siswas as $key => $value) {
                
                $value->paket = $this->db->get_where('paket', ['idpaket' => $value->idpaket])->row_object();
                $days = '+ '.$value->paket->jumlahkali . ' days';
                $value->tanggalselesai = date('Y-m-d', strtotime($value->tanggalmulai. $days));
                $result = $this->db->get_where('pembayaran', ['idsiswa' => $value->idsiswa]);
                $value->num = $result->num_rows();
                $value->pembayaran = $result->result();
                $value->jadwal = $this->db->get_where('jadwal', ['idjadwal'=>$value->idjadwal])->row_object();
                $value->penilaian = $this->db->query("SELECT
                    `penilaian`.`idpenilaian`,
                    `penilaian`.`idsiswa`,
                    `penilaian`.`idkriterianilai`,
                    `penilaian`.`idstaf`,
                    `penilaian`.`hasil`,
                    `penilaian`.`Keterangan`,
                    `kriterianilai`.`listkriteria`,
                    `staf`.`namastaf`
                FROM
                    `kriterianilai`
                    LEFT JOIN `penilaian` ON `penilaian`.`idkriterianilai` =
                    `kriterianilai`.`idkriterianilai`
                    LEFT JOIN `staf` ON `staf`.`idstaf` = `penilaian`.`idstaf` WHERE penilaian.idsiswa = $value->idsiswa")->result();

                $value->roles = $this->db->query("SELECT
                    `rule`.`idrule`,
                    `rule`.`rule`
                FROM
                    `user`
                    LEFT JOIN `userrule` ON `userrule`.`iduser` = `user`.`iduser`
                    LEFT JOIN `rule` ON `rule`.`idrule` = `userrule`.`idrule` WHERE user.iduser = $value->iduser")->row_array();
                $value->persyaratan = $this->db->query("SELECT
                    `persyaratan`.`namapersyaratan`,
                    `detailpersyaratan`.`iddetaipersyaratan`,
                    `detailpersyaratan`.`berkas`
                FROM
                    `persyaratan`
                    LEFT JOIN `detailpersyaratan` ON `detailpersyaratan`.`idpersyaratan` =
                    `persyaratan`.`idpersyaratan` WHERE detailpersyaratan.idsiswa = $value->idsiswa")->result();
                if($value->tanggalselesai>date('Y-m-d')){
                    array_push($datasiswa, $value);
                }
            }
            return $datasiswa;
    }
    public function insert($data)
    {
        $item = [
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
