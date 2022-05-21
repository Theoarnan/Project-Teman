<?php

class SoftSkillModel extends CI_Model {
    var $table = "softskill";
    var $primaryKey = "id_softskill";

    public function insertData($data){
        return $this->db->insert($this->table, $data);
    }
    public function getAll() {
        return $this->db->get($this->table)->result();
    }
    public function getByPrimaryKey($id) {
        $this->db->where($this->primaryKey, $id);
        return $this->db->get($this->table)->row();
    }
    public function updateData($id, $data){
        $this->db->where($this->primaryKey, $id);
        return $this->db->update($this->table, $data);
    }
    public function deleteData($id){
        $this->db->where($this->primaryKey, $id);
        return $this->db->delete($this->table);
    }
    
}

