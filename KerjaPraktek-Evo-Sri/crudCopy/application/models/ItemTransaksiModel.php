<?php

class ItemTransaksiModel extends CI_Model{
    var $table = "item_transaksi";
    var $primaryKey = "id";

    public function insert($data){
        return $this->db->insert($this->table, $data);
    }

    public function insertBatch($data){
        return $this->db->insert_batch($this->table, $data);
    }
    public function getAll(){
        return $this->db->get($this->table)->result();
    }

    public function getByPrimaryKey($id){
        $this->db->where($this->primaryKey, $id);
        return $this->db->get($this->table)->row();
    }

    public function update($id, $data){
        $this->db->where($this->primaryKey, $id);
        return $this->db->update($this->table, $data);
    }

    public function delete($id){
        return $this->db->where(array("id" => $id))->delete($this->table);

    }
}





































}