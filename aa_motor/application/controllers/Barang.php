<?php

require APPPATH . 'libraries/REST_Controller.php';

class Barang extends REST_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Model_Barang', 'bra');
    }

    public function index_get()
    {
        $mantap = $this->get('barang');
        if ($mantap === null) {
            $data['barang'] = $this->bra->getAll();
        } else {
            $data['barang'] = $this->bra->getNama($mantap);
        }
        if ($data) {
            $this->load->view('vi/head', $data);
            $this->load->view('vi/vi_barang', $data);
            $this->load->view('vi/footer', $data);
            // $this->response(
            //     [
            //         'status' => true,
            //         'data_barang' => $data
            //     ],
            //     REST_Controller::HTTP_OK
            // );
        } else {
            $this->response(
                [
                    'status' => false,
                    'data_barang' => 'barang tidak ditemukan'
                ],
                REST_Controller::HTTP_BAD_REQUEST
            );
        }
    }

    public function index_post()
    {
        $id = $this->post('id');
        $barang = $this->post('barang');
        $stok = $this->post('stok');
        $harga = $this->post('harga');
        // $created = date('Y-m-d H:i:s');
        // $modified = date('Y-m-d H:i:s');
        $data = [
            'id' => $id,
            'barang' => $barang,
            'stok' => $stok,
            'harga' => $harga
            // 'created' => $created
            // 'modified' => $modified
        ];
        if ($id === null || $barang === null || $stok === null || $harga === null) {
            $this->response(
                [
                    'status' => false,
                    'message' => 'data yang dikirimkan tidak boleh ada yang kosong'
                ],
                REST_Controller::HTTP_BAD_REQUEST
            );
        } else {
            if ($this->bra->tambahBarang($data) > 0) {
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
            if ($this->bra->hapusBarang($id) > 0) {
                $this->response(
                    [
                        'status' => true,
                        'message' => 'data barang dengan id : ' . $id . ' berhasil dihapus'
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

    public function index_put()
    {
        $id = $this->put('id');
        $data = [
            'barang' => $this->put('barang'),
            'stok' => $this->put('stok'),
            'harga' => $this->put('harga'),
            'modified' => date('Y-m-d H:i:s')
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
            if ($this->bra->updateBarang($data, $id) > 0) {
                $this->response(
                    [
                        'status' => true,
                        'message' => 'data barang dengan id : ' . $id . ' berhasil diupdate'
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
