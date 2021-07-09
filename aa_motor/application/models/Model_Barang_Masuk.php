<?php

class Model_Barang_Masuk extends CI_Model
{
    public function readall(){
        $this->db->select('barang_masuk.id,
                            barang_masuk.deskripsi,
                            barang.barang,
                            barang_masuk.jumlah,
                            petugas.nama,
                            barang_masuk.created');
        $this->db->from('barang_masuk');
        $this->db->join('barang','barang_masuk.id_barang = barang.id','inner');
        $this->db->join('petugas','barang_masuk.id_petugas = petugas.id','inner');
        $all_data_barang_masuk = $this->db->get()->result();
        return $all_data_barang_masuk;
    }
    public function readone($id = null){
        $this->db->select('barang_masuk.id,
                            barang_masuk.deskripsi,
                            barang.barang,
                            barang_masuk.jumlah,
                            petugas.nama,
                            barang_masuk.created');
        $this->db->from('barang_masuk');
        $this->db->join('barang','barang_masuk.id_barang = barang.id','inner');
        $this->db->join('petugas','barang_masuk.id_petugas = petugas.id','inner');
        $this->db->where(array('barang_masuk.id' => $id));
        $byId_data_barang_masuk = $this->db->get()->result();
        return $byId_data_barang_masuk;
    }

    public function tambahBarangMasuk($data)
    {
        $this->db->insert('barang_masuk', $data);
        return $this->db->affected_rows();
    }
    public function hapusBarangMasuk($id)
    {
        $this->db->delete('barang_masuk', ['id' => $id]);
        return $this->db->affected_rows();
    }
    public function updateBarangMasuk($data, $id)
    {
        $this->db->update('barang_masuk', $data, ['id' => $id]);
        return $this->db->affected_rows();
    }
}
