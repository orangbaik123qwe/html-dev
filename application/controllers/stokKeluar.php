<?php
defined('BASEPATH') or exit('No direct script access allowed');

class stokKeluar extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();

        if ($this->session->userdata('status') != "login" && $this->session->userdata('user_role') != "admin") {
            redirect(base_url('login'));
        }

        $this->load->model('stokKeluarModel');
        date_default_timezone_set('Asia/Jakarta');
    }

    public function index()
    {
        $this->load->view('template/header');
        $this->load->view('template/sidebar', [
            'active' => 'stokKeluar'
        ]);
        $this->load->view('template/navbar');
        $this->load->view('stokKeluar/view');
        $this->load->view('template/footer');
    }

    public function loadTable()
    {
        if ($this->input->is_ajax_request() == true) {
            $this->load->model('stokKeluarModel', 'stokKeluar');
            $list = $this->stokKeluar->loadTable();
            $data = array();
            $no = $_POST['start'];
            foreach ($list as $field) {

                $no++;
                $row = array();

                // $tomboledit = "<button type=\"button\" onclick=\"onEdit('" . $field->stokMasuk_id . "')\" class=\"btn btn-sm btn-outline-warning\" title=\"Edit\">
                //         <i class=\"fa fa-pen\"></i>
                //     </button>";
                // $tombolhapus = "<button type=\"button\" onclick=\"onDelete('" . $field->stokMasuk_id . "')\" class=\"btn btn-sm btn-outline-danger\" title=\"Hapus\">
                //         <i class=\"fa fa-trash\"></i>
                //     </button>";

                // $supplier = "<div class=\"row\">
                //         <span class=\"fw-bolder\">$field->supplier_nama</span>
                //         <span style=\"text-secondary\">$field->supplier_telepon</span>
                //     </div>";

                $time = date("H:i", strtotime($field->stok_keluar_tanggal));
                $date = date("d/m/Y", strtotime($field->stok_keluar_tanggal));
                $tanggal = "<div class=\"row\">
                        <span class=\"fw-bolder\">$date</span>
                        <span style=\"text-secondary\">$time</span>
                    </div>";

                $row[] = $no;
                $row[] = $field->barang_kode;
                $row[] = $field->barang_nama;
                $row[] = $tanggal;
                $row[] = $field->stok_keluar_jumlah;
                $row[] = $field->stok_keluar_keterangan;
                // $row[] = $supplier;
                $data[] = $row;
            }

            $output = array(
                "draw" => $_POST['draw'],
                "recordsTotal" => $this->stokKeluar->count_all(),
                "recordsFiltered" => $this->stokKeluar->count_filtered(),
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

        $id = $this->input->post('stokMasuk_id');
        $data = [
            'stok_keluar_id'                 => $id ? $id : $genId,
            'stok_keluar_tanggal'            => date("Y-m-d H:i:s", strtotime($this->input->post('stok_keluar_tgl_full'))),
            'stok_keluar_barang_id'          => $this->input->post('stok_keluar_barang_id'),
            'stok_keluar_jumlah'             => $this->input->post('stok_keluar_jumlah'),
            'stok_keluar_keterangan'         => $this->input->post('stok_keluar_keterangan'),
        ];
        // print_r($data); exit;

        $dataStok   = [
            'barang_id' => $data['stok_keluar_barang_id'],
            'qty'       => $data['stok_keluar_jumlah']
        ];
        $insert     = $this->stokKeluarModel->insert($data);

        $response['success'] = $insert ? true : false;
        if ($response['success'] == true) {
            $updateStok = $this->stokKeluarModel->updateStok($dataStok);
            $response['success'] = $updateStok ? true : false;
        }
        echo json_encode($response);
    }
}
