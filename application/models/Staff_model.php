<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Staff_model extends CI_Model
{
    public function select($idstaf = null)
    {
        if ($idstaf == null) {
            $data = $this->db->query("SELECT
            `staf`.`idstaf`,
            `staf`.`namastaf`,
            `staf`.`alamat`,
            `staf`.`tlpn`,
            `staf`.`email`,
            `staf`.`iduser`,
            `user`.`password`
          FROM
            `staf`
            LEFT JOIN `user` ON `user`.`iduser` = `staf`.`iduser`")->result();
            foreach ($data as $key => $value) {
                $value->roles = $this->db->query("SELECT
                    `rule`.`idrule`,
                    `rule`.`rule`
                FROM
                    `user`
                    LEFT JOIN `userrule` ON `userrule`.`iduser` = `user`.`iduser`
                    LEFT JOIN `rule` ON `rule`.`idrule` = `userrule`.`idrule` WHERE user.iduser = $value->iduser")->row_array();
            }
            return $data;
        } else {
            $data = $this->db->query("SELECT
                `staf`.`idstaf`,
                `staf`.`namastaf`,
                `staf`.`alamat`,
                `staf`.`tlpn`,
                `staf`.`email`,
                `staf`.`iduser`,
                `user`.`password`
            FROM
                `staf`
                LEFT JOIN `user` ON `user`.`iduser` = `staf`.`iduser` WHERE idstaf = '$idstaf'")->row_array();
            $iduser = $data['iduser'];
            $data['roles'] = $this->db->query("SELECT
                `rule`.`idrule`,
                `rule`.`rule`
            FROM
                `user`
                LEFT JOIN `userrule` ON `userrule`.`iduser` = `user`.`iduser`
                LEFT JOIN `rule` ON `rule`.`idrule` = `userrule`.`idrule` WHERE user.iduser = $iduser")->row_array();

            return $data;
        }
    }
    public function insert($data)
    {
        $this->db->trans_begin();
        $user = [
            'username' => $data['email'],
            'password' => md5($data['email']),
        ];
        $this->db->insert('user', $user);
        $iduser = $this->db->insert_id();
        $role = [
            'iduser' => $iduser,
            'idrule' => $data['roles']['idrule'],
        ];
        $this->db->insert('userrule', $role);
        $staf = [
            'namastaf' => $data['namastaf'],
            'alamat' => $data['alamat'],
            'tlpn' => $data['tlpn'],
            'email' => $data['email'],
            'iduser' => $iduser,
        ];
        $this->db->insert('staf', $staf);
        $data['idstaf'] = $this->db->insert_id();
        $data['iduser'] = $iduser;
        if ($this->db->trans_status()) {
            $this->db->trans_commit();
            return $data;
        } else {
            $this->db->trans_rollback();
            return false;
        }
    }
    public function update($data)
    {
        $this->db->trans_begin();
        $this->db->where('iduser', $data['iduser']);
        $this->db->delete('userrule');
        $role = [
            'iduser' => $data['iduser'],
            'idrule' => $data['roles']['idrule'],
        ];
        $this->db->insert('userrule', $role);
        $staf = [
            'namastaf' => $data['namastaf'],
            'alamat' => $data['alamat'],
            'tlpn' => $data['tlpn'],
            'email' => $data['email'],
            'iduser' => $data['iduser'],
        ];
        $this->db->where('idstaf', $data['idstaf']);
        $this->db->update('staf', $staf);
        if ($this->db->trans_status()) {
            $this->db->trans_commit();
            return $data;
        } else {
            $this->db->trans_rollback();
            return false;
        }
    }
    public function delete($iduser)
    {
        $this->db->where('iduser', $iduser);
        return $this->db->delete('user');
    }

}

/* End of file ModelName.php */
