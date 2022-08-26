<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();

        $this->load->model('userModel');
        date_default_timezone_set('Asia/Jakarta');
    }

    public function index()
    {
        $this->load->view('template/header');
        $this->load->view('template/sidebar', [
            'active' => 'user'
        ]);
        $this->load->view('template/navbar');
        $this->load->view('user/view');
        $this->load->view('template/footer');
    }

    public function loadTable()
    {
        if ($this->input->is_ajax_request() == true) {
            $this->load->model('userModel', 'user');
            $list = $this->user->loadTable();
            $data = array();
            $no = $_POST['start'];
            foreach ($list as $field) {

                $no++;
                $row = array();

                $img = '';

                if ($field->user_pp) {
                    $img = base_url('uploads/user/' . $field->user_pp);
                } else {
                    $img = base_url('assets/image/no-image.png');
                }

                $tomboledit = "<button type=\"button\" onclick=\"onEdit('" . $field->user_id . "')\" class=\"btn btn-sm btn-outline-warning\" title=\"Edit\">
                        <i class=\"fa fa-pen\"></i>
                    </button>";
                $tombolhapus = "<button type=\"button\" onclick=\"onDelete('" . $field->user_id . "')\" class=\"btn btn-sm btn-outline-danger\" title=\"Hapus\">
                        <i class=\"fa fa-trash\"></i>
                    </button>";

                $nama = "<div class=\"row\">
                        <div style=\"height: 75px; width: 100px\">
                            <img src=\"$img\" class=\"rounded-3\" style=\"width: 100%; height: 100%; object-fit: cover\">
                        </div>
                        <span class=\"mt-2\">$field->user_nama</span>
                    </div>";

                $row[] = $no;
                $row[] = $nama;
                $row[] = $field->user_username;
                $row[] = $field->user_role;
                $row[] = $tomboledit . ' ' . $tombolhapus;
                $data[] = $row;
            }

            $output = array(
                "draw" => $_POST['draw'],
                "recordsTotal" => $this->user->count_all(),
                "recordsFiltered" => $this->user->count_filtered(),
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

        $id = $this->input->post('user_id');
        $password = $this->input->post('user_password');
        $file_name = round(microtime(true)) . $_FILES['user_pp']['name'];

        $data = [
            'user_id'               => $id ? $id : $genId,
            'user_username'         => $this->input->post('user_username'),
            // 'user_password'         => password_hash($password, PASSWORD_DEFAULT),
            'user_nama'             => $this->input->post('user_nama'),
            'user_role'             => $this->input->post('user_role'),
            // 'user_pp'               => $_FILES['user_pp']['name'] ? $file_name : null,
            'user_created_at'       => date("Y-m-d H:i:s")

        ];

        //check value password & pp
        if ($password) {
            $data['user_password'] = password_hash($password, PASSWORD_DEFAULT);
        }
        if ($_FILES['user_pp']['name']) {
            $data['user_pp'] = $file_name;
        }

        if ($id == '') {
            if (!empty($_FILES['user_pp']['name'])) {
                $upload = $this->_do_upload();
                $_FILES['user_pp'] = $upload;
            }

            $insert = $this->userModel->insert($data);
            $response['success'] = $insert ? true : false;
        } else {
            if (!empty($_FILES['user_pp']['name'])) {
                $upload = $this->_do_upload();
                $_FILES['user_pp'] = $upload;
            }

            $update = $this->userModel->update($id, $data);
            $response['success'] = $update ? true : false;
        }
        echo json_encode($response);
    }

    private function _do_upload()
    {
        $config['upload_path']          = './uploads/user/';
        $config['allowed_types']        = 'gif|jpg|png';
        $config['max_size']             = 3000; //set max size allowed in Kilobyte
        $config['max_width']            = 3000; // set max width image allowed
        $config['max_height']           = 3000; // set max height allowed
        $config['file_name']            = round(microtime(true)) . $_FILES['user_pp']['name']; //just milisecond timestamp fot unique name

        $this->load->library('upload', $config);
        if (!$this->upload->do_upload('user_pp')) //upload and validate
        {
            $data['inputerror'][] = 'user_pp';
            $data['error_string'][] = 'Upload error: ' . $this->upload->display_errors('', ''); //show ajax error
            $data['status'] = FALSE;
            echo json_encode($data);
        }
        return $this->upload->data('file_name');
    }

    public function onEdit()
    {
        $id = $this->input->post('id');
        $operation = $this->userModel->edit($id);
        echo json_encode($operation);
    }

    public function destroy()
    {
        $id = $this->input->post('id');
        $operation = $this->userModel->destroy($id);
        $response = [
            'success' => $operation ? true : false
        ];
        echo json_encode($response);
    }

    public function getUserData()
    {
        $operation = $this->userModel->getUserData();
        echo json_encode($operation);
    }
}
