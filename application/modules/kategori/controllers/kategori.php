<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class kategori extends CI_Controller {

		public function index()
		{
			$parser = [
				'sidebar-kategori' => 'active',
				'sidebar-masterdata'=>'menu-open',
				'title' => 'Kategori | Dzul',
				'page_title' => 'Kategori Produk',
				'content' => $this->load->view('view', '', true)
			];
			$this->parser->parse('main/view', $parser);
		}

	}
?>