<?php

class M_Tugas extends CI_Model
{
	var $table = "tugas";
	var $primaryKey = "id";

	public function getAll($id = null)
	{
		$this->db->select('tugas.*, guru.nama_guru, guru.nip');
		$this->db->from('tugas');
		$this->db->join('guru', 'tugas.guru_id = guru.nip');
		$this->db->where('is_active', '1');
		if ($id != null) {
			$this->db->where('tugas.id', $id);
			return $this->db->get()->row();
		} else {
			return $this->db->get();
		}
	}

	public function insert($data)
	{
		return $this->db->insert($this->table, $data);
	}

	public function add_history($data)
	{
		return $this->db->insert('hisitory_tugas', $data);
	}

	public function update($id, $data)
	{
		$this->db->where($this->primaryKey, $id);
		return $this->db->update($this->table, $data);
	}

	public function update_pilihan($id, $data)
	{
		$this->db->where('pertanyaan_id', $id);
		return $this->db->update('tugas_pilihan', $data);
	}

	public function update_pertanyaan($id, $data)
	{
		$this->db->where($this->primaryKey, $id);
		return $this->db->update('tugas_pertanyaan', $data);
	}



	public function delete($id)
	{
		$this->db->where($this->primaryKey, $id);
		// return $this->db->update($this->table, 'is_active', 0);
		return $this->db->update($this->table, ['is_active' => 0]);
	}

	public function insertGetId($data)
	{
		$this->db->insert('tugas_pertanyaan', $data);
		return $this->db->insert_id();
	}

	public function insertBatch($data)
	{
		return $this->db->insert('tugas_pilihan', $data);
	}

	public function getDetail($id)
	{
		$this->db->select('tugas_pertanyaan.*, tugas_pilihan.*');
		$this->db->from('tugas_pertanyaan');
		$this->db->join('tugas_pilihan', 'tugas_pilihan.pertanyaan_id = tugas_pertanyaan.id');
		$this->db->where('tugas_pertanyaan.tugas_id', $id);

		return $this->db->get();
	}

	public function getTugas($id)
	{
		$this->db->select('tugas.*');
		$this->db->from('tugas');
		$this->db->join('mapel', 'tugas.mapel_id = mapel.id');
		$this->db->where('tugas.mapel_id', $id);
		$this->db->where('tugas.tampil', 1);
		$this->db->where('tugas.is_active', 1);
		return $this->db->get()->result();
	}

	public function getMateri($id)
	{
		$this->db->select('materi.*');
		$this->db->from('materi');
		$this->db->where('materi.nama_mapel', $id);
		return $this->db->get()->result();
	}

	public function updateTugas($id)
	{
		$this->db->select('tugas_pertanyaan.*, tugas_pilihan.*');
		$this->db->from('tugas_pertanyaan');
		$this->db->join('tugas_pilihan', 'tugas_pilihan.pertanyaan_id = tugas_pertanyaan.id');
		$this->db->where('tugas_pertanyaan.tugas_id', $id);
		return $this->db->get();
	}

	public function cekKunci($nomor, $jawaban)
	{
		$query = "SELECT * FROM tugas_pilihan WHERE pertanyaan_id='$nomor' AND kunci='$jawaban'";
		$result = $this->db->query($query);
		return $result->num_rows();
	}

	public function cek($idUser, $idTugas)
	{
		$query = "SELECT * FROM hisitory_tugas WHERE siswa_id='$idUser' AND tugas_id='$idTugas'";
		$result = $this->db->query($query);
		return $result->num_rows();
	}

	public function getHasil($idUser, $idTugas)
	{
		$query = "SELECT * FROM hisitory_tugas WHERE siswa_id='$idUser' AND tugas_id='$idTugas'";
		$result = $this->db->query($query);
		return $result->row();
	}

	public function getTotal($id = null)
	{
		$this->db->select('tugas_pertanyaan.*, tugas_pilihan.*');
		$this->db->from('tugas_pertanyaan');
		$this->db->join('tugas_pilihan', 'tugas_pilihan.pertanyaan_id = tugas_pertanyaan.id');
		$this->db->where('tugas_pertanyaan.tugas_id', $id);
		return $this->db->get()->num_rows();
	}


	public function getSoalSoal($id)
	{
		$this->db->select('tugas_pertanyaan.*, tugas_pilihan.pilihan_a, tugas_pilihan.pilihan_b, tugas_pilihan.pilihan_c, tugas_pilihan.pilihan_d, tugas_pilihan.pilihan_e, tugas_pilihan.kunci, tugas_pilihan.alasan');
		$this->db->from('tugas');
		$this->db->join('tugas_pertanyaan', 'tugas_pertanyaan.tugas_id = tugas.id');
		$this->db->join('tugas_pilihan', 'tugas_pilihan.pertanyaan_id = tugas_pertanyaan.id');
		$this->db->where('tugas.mapel_id', $id);
		return $this->db->get()->row();
	}

	public function getDetailSoal($id)
	{
		$this->db->select('tugas_pertanyaan.*, tugas_pilihan.pilihan_a, tugas_pilihan.pilihan_b, tugas_pilihan.pilihan_c, tugas_pilihan.pilihan_d, tugas_pilihan.pilihan_e, tugas_pilihan.kunci, tugas_pilihan.alasan');
		$this->db->from('tugas_pertanyaan');
		$this->db->join('tugas_pilihan', 'tugas_pilihan.pertanyaan_id = tugas_pertanyaan.id');
		$this->db->where('tugas_pertanyaan.id', $id);
		return $this->db->get()->row();
	}

	public function deleteSoal($id)
	{
		$this->db->select('tugas_pertanyaan.*, tugas_pilihan.*');
		$this->db->from('tugas_pertanyaan');
		$this->db->join('tugas_pilihan', 'tugas_pilihan.pertanyaan_id = tugas_pertanyaan.id');
		$this->db->where('tugas_pertanyaan.id', $id);
		return $this->db->delete();
	}

	public function getDetailJawaban($id)
	{
		$this->db->select('tugas_pertanyaan.*, tugas_pilihan.*');
		$this->db->from('tugas_pertanyaan');
		$this->db->join('tugas_pilihan', 'tugas_pilihan.pertanyaan_id = tugas_pertanyaan.id');
		$this->db->where('tugas_pertanyaan.tugas_id', $id);
		return $this->db->order_by('tugas_pertanyaan.id')->get();
	}
}
