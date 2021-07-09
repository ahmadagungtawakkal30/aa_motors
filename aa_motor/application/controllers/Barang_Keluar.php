<?php

require APPPATH . 'libraries/REST_Controller.php';

class Barang_Keluar extends REST_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Model_Barang_Keluar', 'Keluar');
    }

    public function index_get()
    {
        $id = $this->get('id');
        if ($id) {
            $data = $this->Keluar->readone($id);
        } else {
            $data = $this->Keluar->readall();
        }

        if ($data) {
            $this->response(
                [
                    'status' => true,
                    'data_barang' => $data
                ],
                REST_Controller::HTTP_OK
            );
        } else {
            $this->response(
                [
                    'status' => false,
                    'data_barang' => "Data barang tidak ditemukan"
                ],
                REST_Controller::HTTP_NOT_FOUND
            );
        }
    }

    public function index_post()
    {
        $id = $this->post('id');
        $deskripsi = $this->post('deskripsi');
        $id_barang = $this->post('id_barang');
        $jumlah = $this->post('jumlah');
        $id_vendor = $this->post('id_vendor');
        $data = [
            'id' => $id,
            'deskripsi' => $deskripsi,
            'id_barang' => $id_barang,
            'jumlah' => $jumlah,
            'id_vendor' => $id_vendor
        ];
        if ($id === null || $deskripsi === null || $id_barang === null || $jumlah === null || $id_vendor === null) {
            $this->response(
                [
                    'status' => false,
                    'message' => 'data yang dikirimkan tidak boleh ada yang kosong'
                ],
                REST_Controller::HTTP_BAD_REQUEST
            );
        } else {
            if ($this->Keluar->tambahBarangKeluar($data) > 0) {
                $this->response(
                    [
                        'status' => true,
                        'message' => 'data berhasil ditambahkan'
                    ],
                    REST_Controller::HTTP_CREATED
                );
            } else {
                $this->response(
                    [
                        'status' => false,
                        'message' => 'Gagal menambahkan data'
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
            'deskripsi' => $this->put('deskripsi'),
            'id_barang' => $this->put('id_barang'),
            'jumlah' => $this->put('jumlah'),
            'id_vendor' => $this->put('id_vendor')
        ];
        if ($id === null) {
            $this->response(
                [
                    'status' => false,
                    'message' => 'silahkan isi id barang keluar'
                ],
                REST_Controller::HTTP_BAD_REQUEST
            );
        } else {
            if ($this->Keluar->updateBarangKeluar($data, $id) > 0) {
                $this->response(
                    [
                        'status' => true,
                        'message' => 'data barang keluar dengan id : ' . $id . ' berhasil diupdate'
                    ],
                    REST_Controller::HTTP_OK
                );
            } else {
                $this->response(
                    [
                        'status' => false,
                        'message' => 'data barang keluar dengan id : ' . $id . ' tidak ditemukan'
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
                    'message' => 'Silahkan isi id barang keluar yang akan di hapus'
                ],
                REST_Controller::HTTP_BAD_REQUEST
            );
        } else {
            if ($this->Keluar->hapusBarangKeluar($id) > 0) {
                $this->response(
                    [
                        'status' => true,
                        'message' => 'data barang keluar dengan id : ' . $id . ' berhasil dihapus'
                    ],
                    REST_Controller::HTTP_OK
                );
            } else {
                $this->response(
                    [
                        'status' => false,
                        'message' => 'data barang dengan id : ' . $id . ' tidak ditemukan'
                    ],
                    REST_Controller::HTTP_BAD_REQUEST
                );
            }
        }
    }
}
