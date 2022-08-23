<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller {

	public function index()
	{
		$this->load->view('template/header');
		$this->load->view('template/sidebar',[
            'active' => ''
        ]);
		$this->load->view('template/navbar');
		$this->load->view('template/content');
		$this->load->view('template/footer');
	}
}
