<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Supplier extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        if ($this->session->userdata('status') != "login" && $this->session->userdata('user_role') != "admin") {
            redirect(base_url('login'));
        }
       
        $this->load->model('supplierModel');
        date_default_timezone_set('Asia/Jakarta');
    }

    public function index()
    {
        $this->load->view('template/header');
        $this->load->view('template/sidebar', [
            'active' => 'supplier'
        ]);
        $this->load->view('template/navbar');
        $this->load->view('supplier/view');
        $this->load->view('template/footer');
    }

    public function loadTable()
    {
        if ($this->input->is_ajax_request() == true) {
            $this->load->model('supplierModel', 'supplier');
            $list = $this->supplier->loadTable();
            $data = array();
            $no = $_POST['start'];
            foreach ($list as $field) {

                $no++;
                $row = array();

                $tomboledit = "<button type=\"button\" onclick=\"onEdit('" . $field->supplier_id . "')\" class=\"btn btn-sm btn-outline-warning\" title=\"Edit\">
                        <i class=\"fa fa-pen\"></i>
                    </button>";
                $tombolhapus = "<button type=\"button\" onclick=\"onDelete('" . $field->supplier_id . "')\" class=\"btn btn-sm btn-outline-danger\" title=\"Hapus\">
                        <i class=\"fa fa-trash\"></i>
                    </button>";

                $row[] = $no;
                $row[] = $field->supplier_kode;
                $row[] = $field->supplier_nama;
                $row[] = $field->supplier_telepon;
                $row[] = $field->supplier_deskripsi;
                $row[] = $tomboledit . ' ' . $tombolhapus;
                $data[] = $row;
            }

            $output = array(
                "draw" => $_POST['draw'],
                "recordsTotal" => $this->supplier->count_all(),
                "recordsFiltered" => $this->supplier->count_filtered(),
                "data" => $data,
            );
            //output dalam format JSON
            echo json_encode($output);
        } else {
            exit('Maaf data tidak bisa ditampilkan');
        }
    }

    public function save()
    {
        $genId =  substr(md5(mt_rand()), 0, 32);
        $response = [];

        $id = $this->input->post('supplier_id');
        $data = [
            'supplier_id'                   => $id ? $id : $genId,
            'supplier_kode'                 => $this->input->post('supplier_kode'),
            'supplier_nama'                 => $this->input->post('supplier_nama'),
            'supplier_telepon'              => $this->input->post('supplier_telepon'),
            'supplier_deskripsi'            => $this->input->post('supplier_deskripsi'),
        ];
        // print_r($data); exit;
        if ($id == '') {
            $operation = $this->supplierModel->insert($data);
            $response['success'] = $operation ? true : false;
        } else {

            $operation = $this->supplierModel->update($id, $data);
            $response['success'] = $operation ? true : false;
        }

        $response['success'] = $operation ? true : false;
        echo json_encode($response);
    }

    public function onEdit()
    {
        $id = $this->input->post('id');
        $operation = $this->supplierModel->edit($id);
        echo json_encode($operation);
    }

    public function destroy()
    {
        $id = $this->input->post('id');
        $operation = $this->supplierModel->destroy($id);
        $response = [
            'success' => $operation ? true : false
        ];
        echo json_encode($response);
    }


    public function getSupplierData()
    {
        $operation = $this->supplierModel->getSupplierData();
        echo json_encode($operation);
    }
}
