<?php

class M_Mapel extends CI_Model
{
	var $table = "mapel";
	var $primaryKey = "id";

	public function insert($data)
	{
		return $this->db->insert($this->table, $data);
	}

	public function getAll()
	{
		return $this->db->get($this->table)->result();
	}

	public function getByPrimaryKey($id)
	{
		$this->db->where($this->primaryKey, $id);
		return $this->db->get($this->table)->row();
	}

	public function getById($id)
	{
		$this->db->select('m.*');
		$this->db->from('mapel as m');
		$this->db->join('kelas', 'm.kelas_id = kelas.id');
		$this->db->where('m.kelas_id', $id);
		return $this->db->group_by('m.id')->get($this->table)->result();
	}

	public function update($id, $data)
	{
		$this->db->where($this->primaryKey, $id);
		return $this->db->update($this->table, $data);
	}

	public function delete($id)
	{
		$this->db->where($this->primaryKey, $id);
		return $this->db->delete($this->table);
	}
}
