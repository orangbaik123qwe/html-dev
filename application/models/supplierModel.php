<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class supplierModel extends CI_Model {
        var $table = "tb_supplier";
		var $column_order = [
			null,
			'supplier_id',
			'supplier_kode',
			'supplier_nama',
			'supplier_telepon',
			'supplier_deskripsi',
            'supplier_created_at',
            'supplier_updated_at',
            'supplier_deleted_at',
			null
		]; //Sesuaikan dengan field

		var $column_search = [
            'supplier_id',
            'supplier_kode',
            'supplier_nama',
            'supplier_telepon',
            'supplier_deskripsi',
            'supplier_created_at',
            'supplier_updated_at',
		]; //field yang diizin untuk pencarian 

		var $order = [
			'supplier_kode' => 'asc'
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
			$this->db->where([
				'supplier_deleted_at' => null
			]);
			$query = $this->db->get();
			return $query->num_rows();
		}

		public function count_all()
		{	
			$this->db->where([
				'supplier_deleted_at' => null
			]);
			$this->db->from($this->table);
			return $this->db->count_all_results();
		}

		public function loadTable()
		{
			$this->loadTable_query();
			if ($_POST['length'] != -1)
			$this->db->limit($_POST['length'], $_POST['start']);
			$this->db->where([
				'supplier_deleted_at' => null
			]);
			$query = $this->db->get();
			return $query->result();
		}

        public function insert($data)
        {
            $data['supplier_created_at'] = date('Y-m-d H:i:s');
            return $this->db->insert('tb_supplier', $data);
        }

        public function update($id, $data)
        {
            $data['supplier_updated_at'] = date('Y-m-d H:i:s');
            $this->db->where([
                'supplier_id' => $id
            ]);
            return $this->db->update('tb_supplier', $data);
        }

        public function edit($id)
        {
            $this->db->where([
                'supplier_id' => $id
            ]);
            $query = $this->db->get('tb_supplier');
            return $query->result_array();
        }

        public function destroy($id)
        {
            $data['supplier_deleted_at'] = date('Y-m-d H:i:s');
            $this->db->where([
                'supplier_id' => $id
            ]);
            return $this->db->update('tb_supplier', $data);
        }

        public function getSupplierData()
        {
            $this->db->where([
                'supplier_deleted_at' => null,
            ]);
            $query = $this->db->get('tb_supplier')->result_array();
            return $query;
        }
    }
?>