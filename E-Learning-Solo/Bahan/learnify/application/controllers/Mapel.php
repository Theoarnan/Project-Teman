<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Mapel extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->session->set_flashdata('not-login', 'Gagal!');
		if (!$this->session->userdata('email')) {
			redirect('welcome/admin');
		}
		$this->load->model('M_Mapel');
	}

	public function index()
	{
		$listMapel = $this->M_Mapel->getAll();
		$data = array(
			"page" => "admin/data_mapel",
			"data" => $listMapel
		);
		$this->load->view('admin/index', $data);
	}

	public function add_mapel()
	{

		$data["page"] = "admin/add_mapel";
		$this->load->view('admin/index', $data);
	}

	public function tambah_mapel()
	{
		$this->form_validation->set_rules('nama_mapel', 'Nama Mapel', 'required|trim|min_length[1]', [
			'required' => 'Harap isi kolom Nama Mapel.',
			'min_length' => 'Nama Mapel terlalu pendek.',
		]);

		if ($this->form_validation->run() == false) {
			redirect('mapel/add_mapel');
		} else {
			$data = array(
				'nama_mapel' => $this->input->post('nama_mapel'),
				'kelas_id' => $this->input->post('nama_guru')
			);
			$this->M_Mapel->insert($data);
			$this->session->set_flashdata('success-reg', 'Berhasil!');
			redirect(base_url('mapel/add_mapel'));
		}
	}

	public function update_mapel($id)
	{
		$listMapel = $this->M_Mapel->getByPrimaryKey($id);
		$data["page"] = "admin/update_mapel";
		$data["data"] = $listMapel;
		$this->load->view('admin/index', $data);
	}

	public function updated_mapel()
	{
		$this->form_validation->set_rules('nama_mapel', 'Nama Mapel', 'required|trim|min_length[1]', [
			'required' => 'Harap isi kolom Nama Mapel.',
			'min_length' => 'Nama Mapel terlalu pendek.',
		]);

		if ($this->form_validation->run() == false) {
			redirect('mapel/update_mapel');
		} else {
			$id = $this->input->post('id');
			$data = array(
				'nama_mapel' => $this->input->post('nama_mapel'),
				'kelas_id' => $this->input->post('nama_guru')
			);
			$this->M_Mapel->update($id, $data);
			$this->session->set_flashdata('success-reg', 'Berhasil!');
			redirect(base_url('mapel'));
		}
	}

	public function delete_mapel($id)
	{
		$this->M_Mapel->delete($id);
		$this->session->set_flashdata('user-delete', 'berhasil');
		redirect('mapel');
	}
}
