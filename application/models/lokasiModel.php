<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class lokasiModel extends CI_Model {
        public function getLokasiData()
        {
            $this->db->where([
                'lokasi_deleted_at' => null,
            ]);
            $query = $this->db->get('tb_lokasi')->result_array();
            return $query;
        }
    }
