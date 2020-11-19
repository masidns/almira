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
        $data = $this->db->query("SELECT
            *
        FROM
            `user`
            LEFT JOIN `userrule` ON `userrule`.`iduser` = `user`.`iduser`
            LEFT JOIN `rule` ON `rule`.`idrule` = `userrule`.`idrule` WHERE username='$usernaem' AND password='$password'")->result();
        return $data;
    }

    public function update($data)
    {

    }

    public function delete($id)
    {

    }

}

/* End of file User_model.php */
