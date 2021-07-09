<?php

require APPPATH . 'libraries/REST_Controller.php';

class Vendor extends REST_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Model_Vendor', 'Vendor');
    }

    public function index_get()
    {
        $id = $this->get('id');
        if ($id === null) {
            $data = $this->Vendor->read();
        } else {
            $data = $this->Vendor->read($id);
        }
        if ($data) {
            $this->response(
                [
                    'status' => true,
                    'data_vendor' => $data
                ],
                REST_Controller::HTTP_OK
            );
        } else {
            $this->response(
                [
                    'status' => false,
                    'data_vendor' => 'id vendor tidak ditemukan'
                ],
                REST_Controller::HTTP_BAD_REQUEST
            );
        }
    }

    public function index_post()
    {
        $id = $this->post('id');
        $nama = $this->post('nama');
        $alamat = $this->post('alamat');
        $no_telp = $this->post('no_telp');
        $data = [
            'id' => $id,
            'nama' => $nama,
            'alamat' => $alamat,
            'no_telp' => $no_telp
        ];
        if ($id === null || $nama === null || $alamat === null || $no_telp === null) {
            $this->response(
                [
                    'status' => false,
                    'message' => 'data yang anda inputkan ada yang yang kosong'
                ],
                REST_Controller::HTTP_BAD_REQUEST
            );
        } else {
            if ($this->Vendor->tambahVendor($data) > 0) {
                $this->response(
                    [
                        'status' => true,
                        'message' => 'data vendor berhasil ditambahkan'
                    ],
                    REST_Controller::HTTP_CREATED
                );
            } else {
                $this->response(
                    [
                        'status' => false,
                        'message' => 'Gagal menambahkan data vendor'
                    ],
                    REST_Controller::HTTP_BAD_REQUEST
                );
            }
        }
    }

    public function index_put()
    {
        $id = $this->put('id');
        $data = [
            'nama' => $this->put('nama'),
            'alamat' => $this->put('alamat'),
            'no_telp' => $this->put('no_telp')
        ];
        if ($id === null) {
            $this->response(
                [
                    'status' => false,
                    'message' => 'id tidak boleh kosong'
                ],
                REST_Controller::HTTP_BAD_REQUEST
            );
        } else {
            if ($this->Vendor->updateVendor($data, $id) > 0) {
                $this->response(
                    [
                        'status' => true,
                        'message' => 'data vendor dengan id : ' . $id . ' berhasil diupdate'
                    ],
                    REST_Controller::HTTP_OK
                );
            } else {
                $this->response(
                    [
                        'status' => false,
                        'message' => 'data vendor dengan id : ' . $id . ' tidak ditemukan'
                    ],
                    REST_Controller::HTTP_BAD_REQUEST
                );
            }
        }
    }

    public function index_delete()
    {
        $id = $this->delete('id');
        if ($id === null) {
            $this->response(
                [
                    'status' => false,
                    'message' => 'id tidak boleh kosong'
                ],
                REST_Controller::HTTP_BAD_REQUEST
            );
        } else {
            if ($this->Vendor->hapusVendor($id) > 0) {
                $this->response(
                    [
                        'status' => true,
                        'message' => 'data vendor dengan id : ' . $id . ' berhasil dihapus'
                    ],
                    REST_Controller::HTTP_OK
                );
            } else {
                $this->response(
                    [
                        'status' => false,
                        'message' => 'data vendor dengan id : ' . $id . ' tidak ditemukan'
                    ],
                    REST_Controller::HTTP_BAD_REQUEST
                );
            }
        }
    }
}
