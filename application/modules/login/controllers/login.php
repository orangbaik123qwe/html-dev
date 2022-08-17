<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class login extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        $this->load->model('m_login');
        $this->load->library('session');
    }

	public function index()
	{
		$this->load->view('login/view');
	}

	function aksi_login()
    {
        $username = $this->input->post('user_username');
        $password = $this->input->post('user_password');
        $where = array(
            'user_username' => $username,
            'user_password' => $password
        );  

        $getUser = $this->m_login->getUser($username);
        // print_r($getUser);

        $cek = $this->m_login->cek_login($where)->num_rows();
        if ($cek) {

            $data_session = array(
                'nama' => $username,
                'status' => 'login',
                // 'role' => $getUser['user_role'],
            );

            $this->session->set_userdata($data_session);

            $message = $data_session ? "Berhasil Login" : "Gagal Login";
            
            echo json_encode([
                'cek' => $data_session,
                'message' => $message
                // 'role' => $getUser
            ]);
        }
    }


    function logout()
    {
        $this->session->sess_destroy();
        redirect(base_url('login'));
    }

}
?>