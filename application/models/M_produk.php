<?php
class M_produk extends CI_Model
{

    public function get_produk()
    {
        return $this->db->get('user_crud');
        //perintah diatas sama seperti select *from tbl_produk
    }

    // public function get_produk_by_foto($name_foto)
    // {
    //     return $this->db->get_where('user_crud', array('name_foto' => $name_foto));
    // }

    public function get_data_by_id($id)
    {
        return $this->db->get_where('user_crud', array('id' => $id));
    }


    public function insert_produk($data)
    {
        $this->db->insert('user_crud', $data);
    }

    public function update_produk($data, $id)
    {
        $this->db->where('id', $id);
        $this->db->update('user_crud', $data);
    }

    public function hapus_produk($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('user_crud');
    }
}
