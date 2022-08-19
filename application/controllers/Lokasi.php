<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Lokasi extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->model('lokasiModel');
        date_default_timezone_set('Asia/Jakarta');
    }

    public function getLokasiData()
    {
        $operation = $this->lokasiModel->getLokasiData();
        echo json_encode($operation);
    }
}
