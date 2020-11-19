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
                $value->pembayaran = $this->db->get_where('pembayaran', ['idsiswa' => $value->idsiswa])->row_array();
                $value->roles = $this->db->query("SELECT
                    `rule`.`idrule`,
                    `rule`.`rule`
                FROM
                    `user`
                    LEFT JOIN `userrule` ON `userrule`.`iduser` = `user`.`iduser`
                    LEFT JOIN `rule` ON `rule`.`idrule` = `userrule`.`idrule` WHERE user.iduser = $value->iduser")->row_array();
            }
            return $siswas;
        } else {
            $siswa = $this->db->get_where('siswa', ['idsiswa' => $idsiswa])->row_array();
            $siswa['paket'] = $this->db->get_where('paket', ['idpaket' => $siswa['idpaket']])->row_array();
            $siswa['pembayaran'] = $this->db->get_where('pembayaran', ['idsiswa' => $idsiswa])->row_array();
            $iduser = $siswa['iduser'];
            $siswa['roles'] = $this->db->query("SELECT
                `rule`.`idrule`,
                `rule`.`rule`
            FROM
                `user`
                LEFT JOIN `userrule` ON `userrule`.`iduser` = `user`.`iduser`
                LEFT JOIN `rule` ON `rule`.`idrule` = `userrule`.`idrule` WHERE user.iduser = $iduser")->row_array();
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

}

/* End of file Siswa_model.php */
