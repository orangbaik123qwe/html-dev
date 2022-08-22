<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Barang extends CI_Controller {

    public function __construct()
    {
        parent::__construct();

        $this->load->model('barangModel');
        date_default_timezone_set('Asia/Jakarta');
    }

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

                $img = '';

                if ($field->barang_gambar) {
                    $img = base_url('uploads/barang/' . $field->barang_gambar);
                }else{
                    $img = base_url('assets/image/no-image.png');
                }

                $tomboledit = "<button type=\"button\" onclick=\"onEdit('" . $field->barang_id . "')\" class=\"btn btn-sm btn-outline-warning\" title=\"Edit\">
                        <i class=\"fa fa-pen\"></i>
                    </button>";
                $tombolhapus = "<button type=\"button\" onclick=\"onDelete('" . $field->barang_id . "')\" class=\"btn btn-sm btn-outline-danger\" title=\"Hapus\">
                        <i class=\"fa fa-trash\"></i>
                    </button>";

                $nama = "<div class=\"row\">
                        <div style=\"height: 75px; width: 100px\">
                            <img src=\"$img\" class=\"rounded-3\" style=\"width: 100%; height: 100%; object-fit: cover\">
                        </div>
                        <span class=\"mt-2\">$field->barang_nama</span>
                    </div>";

                $row[] = $no;
                $row[] = $field->barang_kode;
                $row[] = $nama;
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

    public function save()
    {
        $genId =  substr(md5(mt_rand()), 0, 32);
        $response = [];

        $id = $this->input->post('barang_id');
        $file_name = round(microtime(true) * 1000) . $_FILES['barang_gambar']['name'];
        $data = [
            'barang_id'             => $id ? $id : $genId,
            'barang_kode'           => $this->input->post('barang_kode'),
            'barang_nama'           => $this->input->post('barang_nama'),
            'barang_harga_kulak'    => $this->input->post('barang_harga_kulak'),
            'barang_harga_jual'     => $this->input->post('barang_harga_jual'),
            'barang_margin'         => $this->input->post('barang_margin'),
            'barang_deskripsi'      => $this->input->post('barang_deskripsi'),
            'barang_supplier_id'    => $this->input->post('barang_supplier_id'),
            'barang_lokasi_id'      => $this->input->post('barang_lokasi_id'),
            'barang_gambar'         => $_FILES['barang_gambar']['name'] ? $file_name : null, //set file name ke variable image
            'barang_created_at'     => date("Y-m-d H:i:s")
        ];
        // print_r($_FILES['barang_gambar']); exit;
        if ($id == '') {
            if (!empty($_FILES['barang_gambar']['name'])) {
                $upload = $this->_do_upload();
                $_FILES['barang_gambar'] = $upload;
            }

            $insert = $this->barangModel->insert($data);
            $response['success'] = $insert ? true : false;
        } else {
            if (!empty($_FILES['barang_gambar']['name'])) {
                $upload = $this->_do_upload();
                $_FILES['barang_gambar'] = $upload;
            }

            $update = $this->barangModel->update($id, $data);
            $response['success'] = $update ? true : false;
        }
        echo json_encode($response);
    }


    private function _do_upload()
    {
        $config['upload_path']          = './uploads/barang/';
        $config['allowed_types']        = 'gif|jpg|png';
        $config['max_size']             = 3000; //set max size allowed in Kilobyte
        $config['max_width']            = 3000; // set max width image allowed
        $config['max_height']           = 3000; // set max height allowed
        $config['file_name']            = round(microtime(true) * 1000) . $_FILES['barang_gambar']['name']; //just milisecond timestamp fot unique name

        $this->load->library('upload', $config);
        if (!$this->upload->do_upload('barang_gambar')) //upload and validate
        {
            $data['inputerror'][] = 'barang_gambar';
            $data['error_string'][] = 'Upload error: ' . $this->upload->display_errors('', ''); //show ajax error
            $data['status'] = FALSE;
            echo json_encode($data);
        }
        return $this->upload->data('file_name');
    }

    public function onEdit()
    {
        $id = $this->input->post('id');
        $operation = $this->barangModel->edit($id);
        echo json_encode($operation);
    }

    public function destroy()
    {
        $id = $this->input->post('id');
        $operation = $this->barangModel->destroy($id);
        $response = [
            'success' => $operation ? true : false
        ];
        echo json_encode($response);
    }

    public function getBarangData()
    {
        $operation = $this->barangModel->getBarangData();
        echo json_encode($operation);
    }
}
?>
