<?php
class Makanan_model extends CI_Model
{
    public $table = 'makanan';
    public $id = 'makanan.id';
    public function get($id = null)
    {
        if ($id == null) {
            return $this->db->get($this->table)->result_array();
        } else {
            return $this->db->get_where($this->table, ['id' => $id])->result_array();
        }
    }
}