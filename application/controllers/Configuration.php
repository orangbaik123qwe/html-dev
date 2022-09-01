<?php
defined('BASEPATH') or exit('No direct script access allowed');

class configuration extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('status') != "login") {
            redirect(base_url('login'));
        }

        $this->load->model('configurationModel');
    }

    public function index()
    {
        $this->load->view('template/header');
        $this->load->view('template/sidebar', [
            'active' => 'configuration'
        ]);
        $this->load->view('template/navbar');
        $this->load->view('configuration/view');
        $this->load->view('template/footer');
    }

    public function getNama()
    {
        $id = 'd41d8cd98f00b204e9600998ecf8427e';
        $operation = $this->configurationModel->getNama($id);
        echo json_encode($operation);
    }

    public function getAlamat()
    {
        $id = 'd41d8cd98f00b204e9700998ecf8427e';
        $operation = $this->configurationModel->getAlamat($id);
        echo json_encode($operation);
    }

    public function getTelp()
    {
        $id = 'd41d8cd98f00b204e9800998ecf8427e';
        $operation = $this->configurationModel->getTelp($id);
        echo json_encode($operation);
    }

    public function saveNama()
    {
        $id     = 'd41d8cd98f00b204e9600998ecf8427e';
        $nama   = $this->input->post('nama');
        $operation  = $this->configurationModel->saveNama($id, $nama);
        $response   = [
            'success' => $operation ? true : false
        ];
        echo json_encode($response);
    }

    public function saveAlamat()
    {
        $id     = 'd41d8cd98f00b204e9700998ecf8427e';
        $alamat = $this->input->post('alamat');
        $operation  = $this->configurationModel->saveAlamat($id, $alamat);
        $response   = [
            'success' => $operation ? true : false
        ];
        echo json_encode($response);
    }

    public function saveTelp()
    {
        $id     = 'd41d8cd98f00b204e9800998ecf8427e';
        $telp = $this->input->post('telp');
        $operation  = $this->configurationModel->saveTelp($id, $telp);
        $response   = [
            'success' => $operation ? true : false
        ];
        echo json_encode($response);
    }
}
