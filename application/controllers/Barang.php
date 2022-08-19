<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Barang extends CI_Controller {

	public function index()
	{
		$this->load->view('template/header');
		$this->load->view('template/sidebar',[
            'active' => 'barang'
        ]);
		$this->load->view('template/navbar');
		$this->load->view('barang/view');
		$this->load->view('template/footer');
	}

    public function loadTable()
    {
        if ($this->input->is_ajax_request() == true) {
            $this->load->model('barangModel', 'barang');
            $list = $this->barang->loadTable();
            $data = array();
            $no = $_POST['start'];
            foreach ($list as $field) {

                $no++;
                $row = array();

                $tomboledit = "<button type=\"button\" onclick=\"onEdit('" . $field->barang_id . "')\" class=\"btn btn-sm btn-outline-warning\" title=\"Edit\">
                        <i class=\"fa fa-pen\"></i>
                    </button>";
                $tombolhapus = "<button type=\"button\" onclick=\"onDelete('" . $field->barang_id . "')\" class=\"btn btn-sm btn-outline-danger\" title=\"Hapus\">
                        <i class=\"fa fa-trash\"></i>
                    </button>";

                $row[] = $no;
                $row[] = $field->barang_kode;
                $row[] = $field->barang_nama;
                $row[] = $field->barang_harga_kulak;
                $row[] = $field->barang_harga_jual;
                $row[] = $field->barang_margin;
                $row[] = $field->barang_stok;
                $row[] = $field->barang_deskripsi;
                $row[] = $field->supplier_nama;
                $row[] = $field->lokasi_nama;
                $row[] = $tomboledit . ' ' . $tombolhapus;
                $data[] = $row;
            }

            $output = array(
                "draw" => $_POST['draw'],
                "recordsTotal" => $this->barang->count_all(),
                "recordsFiltered" => $this->barang->count_filtered(),
                "data" => $data,
            );
            //output dalam format JSON
            echo json_encode($output);
        } else {
            exit('Maaf data tidak bisa ditampilkan');
        }
    }
}
?>
