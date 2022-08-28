<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if ($this->session->userdata('status') != "login" && $this->session->userdata('user_role') != "admin") {
			redirect(base_url('login'));
		}
		date_default_timezone_set('Asia/Jakarta');
	}

	public function index()
	{
		$this->load->view('template/header');
		$this->load->view('template/sidebar',[
            'active' => 'dashboard'
        ]);
		$this->load->view('template/navbar');
		$this->load->view('dashboard/view');
		$this->load->view('template/footer');
	}
}
?>
