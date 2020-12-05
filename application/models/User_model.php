<?php

defined('BASEPATH') or exit('No direct script access allowed');

class User_model extends CI_Model
{
    public function select()
    {
        $data = $this->db->query("SELECT
        *
    FROM
        `user`
        LEFT JOIN `userrule` ON `userrule`.`iduser` = `user`.`iduser`
        LEFT JOIN `rule` ON `rule`.`idrule` = `userrule`.`idrule`")->result();
        return $data;
    }

    public function login($data)
    {
        $username = $data['username'];
        $password = md5($data['password']);
        $result = $this->db->query("SELECT
            *
        FROM
            `user`
            LEFT JOIN `userrule` ON `userrule`.`iduser` = `user`.`iduser`
            LEFT JOIN `rule` ON `rule`.`idrule` = `userrule`.`idrule` WHERE username='$username' AND password='$password'")->row_array();
        if($result != null){
            if($result['rule']=='Admin'){
                $staf = $this->db->get_where('staf', ['iduser'=>$result['iduser']])->row_array();
                $staf['rule'] = $result;
                return $staf;
            }else if($result['rule']=='Staf'){
                $staf = $this->db->get_where('staf', ['iduser'=>$result['iduser']])->row_array();
                $staf['rule'] = $result;
                return $staf;
            }else{
                $siswa = $this->db->get_where('siswa', ['iduser'=>$result['iduser']])->row_array();
                $siswa['rule']= $result;
                return $siswa;
            }
        }else{
            return false;
        }
    }

    public function update($data)
    {

    }

    public function delete($id)
    {

    }

}

/* End of file User_model.php */
