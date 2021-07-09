<?php

class Model_Barang_Keluar extends CI_Model
{
    public function readall()
    {
        $this->db->select('barang_keluar.id,
                            barang_keluar.deskripsi,
                            barang.barang,
                            barang_keluar.jumlah,
                            vendor.nama,
                            barang_keluar.created');
        $this->db->from('barang_keluar');
        $this->db->join('barang', 'barang_keluar.id_barang = barang.id', 'inner');
        $this->db->join('vendor', 'barang_keluar.id_vendor = vendor.id', 'inner');
        $all_data_barang_keluar = $this->db->get()->result();
        return $all_data_barang_keluar;
    }
    public function readone($id = null)
    {
        $this->db->select('barang_keluar.id,
                            barang_keluar.deskripsi,
                            barang.barang,
                            barang_keluar.jumlah,
                            vendor.nama,
                            barang_keluar.created');
        $this->db->from('barang_keluar');
        $this->db->join('barang', 'barang_keluar.id_barang = barang.id', 'inner');
        $this->db->join('vendor', 'barang_keluar.id_vendor = vendor.id', 'inner');
        $this->db->where(array('barang_keluar.id' => $id));
        $byId_data_barang_keluar = $this->db->get()->result();
        return $byId_data_barang_keluar;
    }

    public function tambahBarangkeluar($data)
    {
        $this->db->insert('barang_keluar', $data);
        return $this->db->affected_rows();
    }
    public function hapusBarangkeluar($id)
    {
        $this->db->delete('barang_keluar', ['id' => $id]);
        return $this->db->affected_rows();
    }
    public function updateBarangkeluar($data, $id)
    {
        $this->db->update('barang_keluar', $data, ['id' => $id]);
        return $this->db->affected_rows();
    }
}
