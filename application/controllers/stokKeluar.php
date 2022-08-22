<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class stokKeluar extends CI_Controller {

    public function __construct()
    {
        parent::__construct();

        $this->load->model('stokKeluarModel');
        date_default_timezone_set('Asia/Jakarta');
    }

	public function index()
	{
		$this->load->view('template/header');
		$this->load->view('template/sidebar',[
            'active' => 'stokKeluar'
        ]);
		$this->load->view('template/navbar');
		$this->load->view('stokKeluar/view');
		$this->load->view('template/footer');
	}
}

?>