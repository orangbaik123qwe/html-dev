<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class supplierModel extends CI_Model {
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