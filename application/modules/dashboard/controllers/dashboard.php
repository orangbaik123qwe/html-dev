<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class dashboard extends CI_Controller {

		public function index()
		{
			$parser = [
				'sidebar-dashboard' => 'active',
				'title' => ' Dashboard | Dzul',
				'page_title' => 'Dashboard',
				'content' => $this->load->view('view', '', true)
			];
			$this->parser->parse('main/view', $parser);
		}

	}
?>