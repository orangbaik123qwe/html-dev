<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class stokMasukModel extends CI_Model {
		var $table = "v_stok_masuk";
		var $column_order = [
			null,
			'stok_masuk_id',
			'stok_masuk_barang_id',
			'stok_masuk_jumlah',
			'stok_masuk_keterangan',
			'stok_masuk_supplier',
			'stok_masuk_tanggal',
			'barang_kode',
			'barang_nama',
			'barang_gambar',
			'barang_deskripsi',
			'supplier_kode',
			'supplier_nama',
			'supplier_telepon',
			null
		]; //Sesuaikan dengan field

		var $column_search = [
            'stok_masuk_jumlah',
            'stok_masuk_keterangan',
            'stok_masuk_supplier',
            'stok_masuk_tanggal',
            'barang_kode',
            'barang_nama',
            'barang_deskripsi',
            'supplier_kode',
            'supplier_nama',
            'supplier_telepon',
		]; //field yang diizin untuk pencarian 

		var $order = [
			'stok_masuk_tanggal' => 'desc'
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
			// $this->db->where([
			// 	'stok_masuk_deleted_at' => null
			// ]);
			$query = $this->db->get();
			return $query->result();
		}

		
        public function insert($data)
		{
			return $this->db->insert('tb_stok_masuk', $data);
		}

		public function updateStok($dataStok)
		{
			$getProduk = $this->db->where([
				'barang_id' => $dataStok['barang_id']
			]);
			$getProduk = $this->db->get('tb_barang')->result_array();

			$newStok = (int)$getProduk[0]['barang_stok'] + (int)$dataStok['qty'];

			$dataNew = [
				'barang_stok' => $newStok
			];

			$query = $this->db->where([
				'barang_id' => $dataStok['barang_id']
			]);
			$query = $this->db->update('tb_barang', $dataNew);
			return $query;
			// print_r($newStok); exit;
		}
        
    }
