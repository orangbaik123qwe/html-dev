<?php
defined('BASEPATH') or exit('No direct script access allowed');

class userModel extends CI_Model
{
    var $table = "tb_user";
    var $column_order = [
        null,
        'user_id',
        'user_username',
        'user_password',
        'user_nama',
        'user_pp',
        'user_role',
        'user_created_at',
        'user_updated_at',
        'user_deleted_at',
        null
    ]; //Sesuaikan dengan field

    var $column_search = [
        'user_username',
        'user_nama'
    ]; //field yang diizin untuk pencarian 

    var $order = [
        'user_id' => 'asc'
    ]; // default order 

    private function loadTable_query()
    {
        $this->db->from($this->table);

        $i = 0;

        foreach ($this->column_search as $item) // looping awal
        {
            if ($_POST['search']['value']) // jika datatable mengirimkan pencarian dengan metode POST
            {

                if ($i === 0) // looping awal
                {
                    $this->db->group_start();
                    $this->db->like($item, $_POST['search']['value']);
                } else {
                    $this->db->or_like($item, $_POST['search']['value']);
                }

                if (count($this->column_search) - 1 == $i)
                    $this->db->group_end();
            }
            $i++;
        }

        if (isset($_POST['order'])) {
            $this->db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } else if (isset($this->order)) {
            $order = $this->order;
            $this->db->order_by(key($order), $order[key($order)]);
        }
    }

    function count_filtered()
    {
        $this->loadTable_query();
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function count_all()
    {
        $this->db->from($this->table);
        return $this->db->count_all_results();
    }

    public function loadTable()
    {
        $this->loadTable_query();
        if ($_POST['length'] != -1)
            $this->db->limit($_POST['length'], $_POST['start']);
        $this->db->where([
            'user_deleted_at' => null
        ]);
        $query = $this->db->get();
        return $query->result();
    }

    public function insert($data)
    {
        $data['user_created_at'] = date('Y-m-d H:i:s');
        return $this->db->insert('tb_user', $data);
    }

    public function update($id, $data)
    {
        $data['user_updated_at'] = date('Y-m-d H:i:s');
        $this->db->where([
            'user_id' => $id
        ]);
        return $this->db->update('tb_user', $data);
    }

    public function edit($id)
    {
        $this->db->where([
            'user_id' => $id
        ]);
        $query = $this->db->get('tb_user');
        return $query->result_array();
    }

    public function destroy($id)
    {
        $data['user_deleted_at'] = date('Y-m-d H:i:s');
        $this->db->where([
            'user_id' => $id
        ]);
        return $this->db->update('tb_user', $data);
    }

    public function getUserData()
    {
        $this->db->where([
            'user_deleted_at' => null,
        ]);
        $query = $this->db->get('tb_user')->result_array();
        return $query;
    }
}
