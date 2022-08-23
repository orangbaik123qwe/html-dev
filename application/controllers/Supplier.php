<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Supplier extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
       
        $this->load->model('supplierModel');
        date_default_timezone_set('Asia/Jakarta');
    }

    public function getSupplierData()
    {
        $operation = $this->supplierModel->getSupplierData();
        echo json_encode($operation);
    }
}
