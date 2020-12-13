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
                $days = '+ '.$value->paket['jumlahkali'] . ' days';
                $value->tanggalselesai = date('Y-m-d', strtotime($value->tanggalmulai. $days));
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
            $days = '+ '.$siswa['paket']['jumlahkali'] . ' days';
            $siswa['tanggalselesai'] = date('Y-m-d', strtotime($siswa['tanggalmulai']. $days));
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
            $siswa['jadwal'] = $this->db->get_where('jadwal', ['idjadwal'=>$siswa['idjadwal']])->row_object();
            return $siswa;
        }
    }

    public function grafik()
    {
        $siswas = $this->db->get('siswa')->result();
        $data =[
            'pria'=> 0,
            'wanita' =>0
        ];
        $usia = [
            '17-20'=>0,
            '21-24'=>0,
            '25-28'=>0,
            '29-31'=>0,
            '32-35'=>0,
            '36-39'=>0,
            '40-43'=>0,

        ];
        foreach ($siswas as $key => $value) {
            if($value->gender=='Pria')
                $data['pria'] += 1;
            else 
                $data['wanita'] += 1;
            
        }
        $item =[];
        foreach ($siswas as $key => $value) {
            $tanggal = new DateTime($value->tanggallahir); 
            $sekarang = new DateTime();
            $perbedaan = $tanggal->diff($sekarang);

            if($perbedaan->y >= 17 && $perbedaan->y <= 20)
                $usia['17-20'] += 1;
            else if($perbedaan->y >= 21 && $perbedaan->y <= 24)
                $usia['21-24'] += 1;
            else if($perbedaan->y >= 25 && $perbedaan->y <= 28)
                $usia['25-28'] += 1;
            else if($perbedaan->y >= 29 && $perbedaan->y <= 31)
                $usia['29-31'] += 1;
            else if($perbedaan->y >= 32 && $perbedaan->y <= 35)
                $usia['32-35'] += 1;
            else if($perbedaan->y >= 36 && $perbedaan->y <= 39)
                $usia['36-39'] += 1;
            else if($perbedaan->y >= 40 && $perbedaan->y <= 43)
                $usia['40-43'] += 1;
            
        }
        $param=['usia'=>$usia,'gender'=>$data];
        return $param;
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
            'gender' => $data['gender'],
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
            'gender' => $data['gender'],
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
