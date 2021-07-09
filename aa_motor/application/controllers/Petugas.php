<?php

require APPPATH . 'libraries/REST_Controller.php';

class Petugas extends REST_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Model_Petugas', 'Petugas');
    }

    public function index_get()
    {
        $id = $this->get('id');
        if ($id === null) {
            $data = $this->Petugas->read();
        } else {
            $data = $this->Petugas->read($id);
        }
        if ($data) {
            $this->response(
                [
                    'status' => true,
                    'data_petugas' => $data
                ],
                REST_Controller::HTTP_OK
            );
        } else {
            $this->response(
                [
                    'status' => false,
                    'data_petugas' => 'id petugas tidak ditemukan'
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
            if ($this->Petugas->tambahPetugas($data) > 0) {
                $this->response(
                    [
                        'status' => true,
                        'message' => 'data petugas berhasil ditambahkan'
                    ],
                    REST_Controller::HTTP_CREATED
                );
            } else {
                $this->response(
                    [
                        'status' => false,
                        'message' => 'Gagal menambahkan data petugas'
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
            if ($this->Petugas->updatePetugas($data, $id) > 0) {
                $this->response(
                    [
                        'status' => true,
                        'message' => 'data Petugas dengan id : ' . $id . ' berhasil diupdate'
                    ],
                    REST_Controller::HTTP_OK
                );
            } else {
                $this->response(
                    [
                        'status' => false,
                        'message' => 'data Petugas dengan id : ' . $id . ' tidak ditemukan'
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
            if ($this->Petugas->hapusPetugas($id) > 0) {
                $this->response(
                    [
                        'status' => true,
                        'message' => 'data Petugas dengan id : ' . $id . ' berhasil dihapus'
                    ],
                    REST_Controller::HTTP_OK
                );
            } else {
                $this->response(
                    [
                        'status' => false,
                        'message' => 'data Petugas dengan id : ' . $id . ' tidak ditemukan'
                    ],
                    REST_Controller::HTTP_BAD_REQUEST
                );
            }
        }
    }
}
