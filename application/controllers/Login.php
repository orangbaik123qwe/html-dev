<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

    public function __construct()
    {
        parent::__construct();

        $this->load->model('loginModel');
        date_default_timezone_set('Asia/Jakarta');
    }

	public function index()
	{
		$this->load->view('login/view');
	}

    public function aksi_login()
    {
        $username = $this->input->post('user_username');
        $password = $this->input->post('user_password');
        $where = array(
            'user_username' => $username,
            'user_password' => $password
        );

        // print_r($where);exit;
        $getUser = $this->loginModel->getUser($username);
        if ($getUser) {
            if (password_verify($password, $getUser[0]['user_password'])) {
                $data_session = array(
                    'user_id'       => $getUser[0]['user_id'],
                    'user_username' => $getUser[0]['user_username'],
                    'user_nama'     => $getUser[0]['user_nama'],
                    'user_role'     => $getUser[0]['user_role'],
                    'status'        => 'login',
                );

                $this->session->set_userdata($data_session);

                $message = $data_session ? "Berhasil Login" : "Gagal Login";
                
                echo json_encode([
                    'success' => true,
                    'cek' => $data_session,
                    'message' => $message
                ]);
            } else {
                echo json_encode([
                    'success' => false,
                    'message' => 'Username atau Password Anda Tidak Sesuai'
                ]);
            }
        } else {
            echo json_encode([
                'success' => false,
                'message' => 'Akun anda belum terdaftar'
            ]);
        }
    }


    public function logout()
    {
        $this->session->sess_destroy();
        redirect(base_url('login'));
    }
}
?>