<?php

class Model_Vendor extends CI_Model
{

    public function read($id = null)
    {
        if ($id === null) {
            $semua_data_vendor = $this->db->get("vendor")->result();
            return $semua_data_vendor;
        } else {
            $data_vendor_byid = $this->db->get_where('vendor', ['id' => $id])->result();
            return $data_vendor_byid;
        }
    }

    public function tambahVendor($data)
    {
        $this->db->insert('vendor', $data);
        return $this->db->affected_rows();
    }
    public function hapusVendor($id)
    {
        $this->db->delete('vendor', ['id' => $id]);
        return $this->db->affected_rows();
    }
    public function updateVendor($data, $id)
    {
        $this->db->update('vendor', $data, ['id' => $id]);
        return $this->db->affected_rows();
    }
}
