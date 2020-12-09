<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Siswa_model extends CI_Model
{
    public function select($idsiswa = null)
    {
        if ($idsiswa == null) {
            $siswas = $this->db->get('siswa')->result();
            foreach ($siswas as $key => $value) {
                $value->paket = $this->db->get_where('paket', ['idpaket' => $value->idpaket])->row_array();
                $result = $this->db->get_where('pembayaran', ['idsiswa' => $value->idsiswa]);
                $value->num = $result->num_rows();
                $value->pembayaran = $result->result();
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
            }
            return $siswas;
        } else {
            $siswa = $this->db->get_where('siswa', ['idsiswa' => $idsiswa])->row_array();
            $siswa['paket'] = $this->db->get_where('paket', ['idpaket' => $siswa['idpaket']])->row_array();
            $siswa['pembayaran'] = $this->db->get_where('pembayaran', ['idsiswa' => $idsiswa])->result();
            $siswa['penilaian'] = $this->db->query("SELECT
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
                LEFT JOIN `staf` ON `staf`.`idstaf` = `penilaian`.`idstaf` WHERE penilaian.idsiswa = $idsiswa")->result();
            $iduser = $siswa['iduser'];
            $siswa['roles'] = $this->db->query("SELECT
                `rule`.`idrule`,
                `rule`.`rule`
            FROM
                `user`
                LEFT JOIN `userrule` ON `userrule`.`iduser` = `user`.`iduser`
                LEFT JOIN `rule` ON `rule`.`idrule` = `userrule`.`idrule` WHERE user.iduser = $iduser")->row_array();
            $siswa['persyaratan'] = $this->db->query("SELECT
                `persyaratan`.`namapersyaratan`,
                `detailpersyaratan`.`iddetaipersyaratan`,
                `detailpersyaratan`.`berkas`
            FROM
                `persyaratan`
                LEFT JOIN `detailpersyaratan` ON `detailpersyaratan`.`idpersyaratan` =
                `persyaratan`.`idpersyaratan` WHERE detailpersyaratan.idsiswa = $idsiswa")->result();
            return $siswa;
        }
    }
    public function insert($data)
    {
        $this->db->trans_begin();
        $user = [
            'username' => $data['email'],
            'password' => md5($data['password']),
        ];
        $this->db->insert('user', $user);
        $data['iduser'] = $this->db->insert_id();
        $role = [
            'iduser' => $data['iduser'],
            'idrule' => $data['roles']['idrule'],
        ];
        $this->db->insert('userrule', $role);
        $siswa = [
            'idpaket' => $data['paket']['idpaket'],
            'namasiswa' => $data['namasiswa'],
            'alamatsiswa' => $data['alamatsiswa'],
            'tempatlahir' => $data['tempatlahir'],
            'tanggallahir' => $data['tanggallahir'],
            'email' => $data['email'],
            'notlpn' => $data['notlpn'],
            'iduser' => $data['iduser'],
        ];
        $this->db->insert('siswa', $siswa);
        $data['idsiswa'] = $this->db->insert_id();
        if ($this->db->trans_status()) {
            $this->db->trans_commit();
            $data['pembayaran'] = [];
            return $data;
        } else {
            $this->db->trans_rollback();
            return false;
        }
    }
    public function register($data)
    {
        $this->load->model('Persyaratan_model');

        $file = $_FILES;
        $this->db->trans_begin();
        $user = [
            'username' => $data['email'],
            'password' => md5($data['password']),
        ];
        $this->db->insert('user', $user);
        $data['iduser'] = $this->db->insert_id();
        $role = [
            'iduser' => $data['iduser'],
            'idrule' => 2,
        ];
        $this->db->insert('userrule', $role);
        $siswa = [
            'idpaket' => $data['idpaket'],
            'namasiswa' => $data['namasiswa'],
            'alamatsiswa' => $data['alamatsiswa'],
            'tempatlahir' => $data['tempatlahir'],
            'tanggallahir' => $data['tanggallahir'],
            'email' => $data['email'],
            'notlpn' => $data['notlpn'],
            'iduser' => $data['iduser'],
            'idjadwal' => $data['idjadwal'],
            'status' => 'Pendaftaran',
            'tanggalmulai' => $data['tanggalmulai'],
            'tanggaldaftar' => date('Y-m-d'),
        ];
        $this->db->insert('siswa', $siswa);
        $data['idsiswa'] = $this->db->insert_id();
        $pembayaran = [
            'idsiswa' => $data['idsiswa'],
            'nominal' => $data['jenisbayar'] == 'DP' ? $data['nominaldp'] : $data['nominal'],
            'jenis' => $data['jenisbayar'],
            'order_id' => $data['order_id'],
            'status' => 'Proses',
        ];
        $this->db->insert('pembayaran', $pembayaran);
        $pembayaran['idpembayaran'] = $this->db->insert_id();
        $data['detailpembayaran'] = $pembayaran;
        $persyaratan = $this->Persyaratan_model->select();
        $data['persyaratan'] = [];
        foreach ($persyaratan as $key => $value) {
            $itemFile = $_FILES[str_replace(' ', '', $value->namapersyaratan)];
            if ($itemFile != null) {
                $config['upload_path'] = './public/berkas';
                $config['allowed_types'] = 'gif|jpg|png|pdf';
                $config['max_size'] = 5000;
                $config['encrypt_name'] = true;

                $this->load->library('upload', $config);
                if ($this->upload->do_upload(str_replace(' ', '', $value->namapersyaratan))) {
                    $itemPersyaratan = [
                        'idsiswa' => $data['idsiswa'],
                        'idpersyaratan' => $value->idpersyaratan,
                        'berkas' => $this->upload->data()['file_name'],
                    ];
                    $this->db->insert('detailpersyaratan', $itemPersyaratan);
                    $itemPersyaratan['iddetailpersyaratan'] = $this->db->insert_id();
                    array_push($data['persyaratan'], $itemPersyaratan);
                }
            }
        }
        if ($this->db->trans_status()) {
            $this->db->trans_commit();
            return $data;
        } else {
            $this->db->trans_rollback();
            return false;
        }
    }

    public function updatePembayaran($data)
    {
        $item = [
            'tgl_bayar' => $data['transaction_time'],
            'status' => $data['transaction_status'],
        ];
        $this->db->where('idpembayaran', $data['idpembayaran']);
        return $this->db->update('pembayaran', $item);

    }
    public function update($data = null)
    {
        $siswa = [
            'idpaket' => $data['paket']['idpaket'],
            'namasiswa' => $data['namasiswa'],
            'alamatsiswa' => $data['alamatsiswa'],
            'tempatlahir' => $data['tempatlahir'],
            'tanggallahir' => $data['tanggallahir'],
            'email' => $data['email'],
            'notlpn' => $data['notlpn'],
            'iduser' => $data['iduser'],
        ];
        $this->db->where('idsiswa', $data['idsiswa']);
        $result = $this->db->update('siswa', $siswa);
        if ($result) {
            $siswa['paket'] = $this->db->get_where('paket', ['idpaket' => $data['idpaket']])->row_array();
        }
        return $data;
    }
    public function delete($iduser)
    {
        $this->db->where('iduser', $iduser);
        return $this->db->delete('user');
    }
    public function selectlaporan($data)
    {
        $awal = $data['awal'];
        $akhir = $data['akhir'];
        $siswas = $this->db->query("SELECT * FROM siswa where tanggaldaftar > '$awal' AND tanggaldaftar < '$akhir'")->result();
        foreach ($siswas as $key => $value) {
            $value->paket = $this->db->get_where('paket', ['idpaket' => $value->idpaket])->row_array();
            $result = $this->db->get_where('pembayaran', ['idsiswa' => $value->idsiswa]);
            $value->num = $result->num_rows();
            $value->pembayaran = $result->result();
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
        }
        return $siswas;
    }
}

/* End of file Siswa_model.php */
