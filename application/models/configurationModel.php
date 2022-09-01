<?php
defined('BASEPATH') or exit('No direct script access allowed');

class configurationModel extends CI_Model
{

    public function getNama($id)
    {
        $this->db->where([
            'conf_id' => $id
        ]);
        $query = $this->db->get('tb_config');
        return $query->result_array();
    }

    public function getAlamat($id)
    {
        $this->db->where([
            'conf_id' => $id
        ]);
        $query = $this->db->get('tb_config');
        return $query->result_array();
    }

    public function getTelp($id)
    {
        $this->db->where([
            'conf_id' => $id
        ]);
        $query = $this->db->get('tb_config');
        return $query->result_array();
    }

    public function saveNama($id, $nama)
    {
        $data = [
            'conf_value' => $nama
        ];
        $this->db->where([
            'conf_id' => $id
        ]);
        $query = $this->db->update('tb_config', $data);
        return $query;
    }

    public function saveAlamat($id, $alamat)
    {
        $data = [
            'conf_value' => $alamat
        ];
        $this->db->where([
            'conf_id' => $id
        ]);
        $query = $this->db->update('tb_config', $data);
        return $query;
    }

    public function saveTelp($id, $telp)
    {
        $data = [
            'conf_value' => $telp
        ];
        $this->db->where([
            'conf_id' => $id
        ]);
        $query = $this->db->update('tb_config', $data);
        return $query;
    }
}
