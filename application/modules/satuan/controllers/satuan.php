<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class satuan extends CI_Controller {

		public function index()
		{
			$parser = [
				'sidebar-satuan' => 'active',
				'sidebar-masterdata'=>'menu-open',
				'title' => ' Satuan | Dzul',
				'page_title' => 'Satuan Produk',
				'content' => $this->load->view('view', '', true)
			];
			$this->parser->parse('main/view', $parser);
		}

	}
?>