<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class barangModel extends CI_Model {
		var $table = "v_barang";
		var $column_order = [
			null,
			'barang_id',
			'barang_kode',
			'barang_nama',
			'barang_harga_kulak',
			'barang_harga_jual',
			'barang_margin',
			'barang_stok',
			'barang_deskripsi',
			'barang_gambar',
			'barang_supplier_id',
			'barang_lokasi_id',
            'barang_created_at',
            'barang_updated_at',
            'barang_deleted_at',
			'supplier_kode',
			'supplier_nama',
			'supplier_telepon',
			'lokasi_kode',
			'lokasi_nama',
			null
		]; //Sesuaikan dengan field

		var $column_search = [
            'barang_kode',
            'barang_nama',
            'barang_harga_kulak',
            'barang_harga_jual',
            'barang_margin',
            'barang_stok',
            'barang_deskripsi',
            'supplier_kode',
            'supplier_nama',
            'supplier_telepon',
            'lokasi_kode',
            'lokasi_nama',
		]; //field yang diizin untuk pencarian 

		var $order = [
			'barang_kode' => 'asc'
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
				'barang_deleted_at' => null
			]);
			$query = $this->db->get();
			return $query->result();
		}

        public function insert($data)
		{
			return $this->db->insert('tb_barang', $data);
		}
        
		public function update($id,$data)
		{
			$this->db->where([
				'barang_id' => $id
			]);
			return $this->db->update('tb_barang', $data);
		}

        public function edit($id)
		{
			$this->db->where([
				'barang_id' => $id
			]);
			$query = $this->db->get('tb_barang');
			return $query->result_array();
		}

		public function destroy($id)
		{
			$data['barang_deleted_at'] = date('Y-m-d H:i:s');
			$this->db->where([
				'barang_id' => $id
			]);
			return $this->db->update('tb_barang', $data);
		}
    }
?>