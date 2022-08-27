<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

    public function __construct()
    {
        parent::__construct();

        // $this->load->model('barangModel');
        date_default_timezone_set('Asia/Jakarta');
    }

	public function index()
	{
		$this->load->view('login/view');
	}
}
?>