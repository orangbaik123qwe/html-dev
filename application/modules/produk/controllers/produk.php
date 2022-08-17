<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class produk extends CI_Controller {

		public function index()
		{
			$parser = [
				'sidebar-produk' => 'active',
				'sidebar-masterdata'=>'menu-open',
				'title' => 'Produk | Dzul',
				'page_title' => 'Produk',
				'content' => $this->load->view('view', '', true)
			];
			$this->parser->parse('main/view', $parser);
		}

	}
?>