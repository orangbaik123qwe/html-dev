<?php
defined('BASEPATH') or exit('No direct script access allowed');

class m_login extends CI_Model

{
    private $table = 'tb_user';

    public function cek_login($where)
    {
        return $this->db->get_where(($this->table), $where);
    }

    public function getUser($username)
    {
        $this->db->select("*");
        $this->db->where('user_username', $username);
        $query = $this->db->get($this->table);
        return $query->result_array();
    }
}