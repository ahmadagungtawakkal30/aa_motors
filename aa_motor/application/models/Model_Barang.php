<?php

class Model_Barang extends CI_Model
{
    // public function getBarang($nama = null)
    // {
    //     if ($nama === null) {
    //         $semua_data_barang = $this->db->get("barang")->result();
    //         return $semua_data_barang;
    //     } else {
    //         $data_barang_byNamaBarang = $this->db->get_where('barang', ['id' => $nama])->result();
    //         return $data_barang_byNamaBarang;
    //     }
    // }


    public function getAll()
    {
        $this->db->select('*');
        $this->db->from('barang');
        $this->db->order_by('barang', 'ASC');
        $data = $this->db->get()->result();
        return $data;
    }
    public function getNama($mantap = null)
    {
        $this->db->select('*');
        $this->db->from('barang');
        $this->db->like('barang', $mantap);
        $this->db->order_by('barang', 'ASC');

        $data = $this->db->get()->result();
        return $data;
    }

    public function tambahBarang($data)
    {
        $this->db->insert('barang', $data);
        return $this->db->affected_rows();
    }
    public function hapusBarang($id)
    {
        $this->db->delete('barang', ['id' => $id]);
        return $this->db->affected_rows();
    }
    public function updateBarang($data, $id)
    {
        $this->db->update('barang', $data, ['id' => $id]);
        return $this->db->affected_rows();
    }
}
