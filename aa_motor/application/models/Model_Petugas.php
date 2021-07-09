<?php

class Model_Petugas extends CI_Model
{

    public function read($id = null)
    {
        if ($id === null) {
            $semua_data_petugas = $this->db->get("petugas")->result();
            return $semua_data_petugas;
        } else {
            $data_petugas_byid = $this->db->get_where('petugas', ['id' => $id])->result();
            return $data_petugas_byid;
        }
    }

    public function tambahPetugas($data)
    {
        $this->db->insert('petugas', $data);
        return $this->db->affected_rows();
    }
    public function hapusPetugas($id)
    {
        $this->db->delete('petugas', ['id' => $id]);
        return $this->db->affected_rows();
    }
    public function updatePetugas($data, $id)
    {
        $this->db->update('petugas', $data, ['id' => $id]);
        return $this->db->affected_rows();
    }
}
