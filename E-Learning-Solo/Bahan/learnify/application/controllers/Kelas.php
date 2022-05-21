<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kelas extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->session->set_flashdata('not-login', 'Gagal!');
		// if (!$this->session->userdata('email')) {
		// 	redirect('welcome/admin');
		// }
		$this->load->model('M_Kelas');
	}

	public function index()
	{
		$listMapel = $this->M_Kelas->getAll();
		$data = array(
			"page" => "admin/data_kelas",
			"data" => $listMapel
		);
		$this->load->view('admin/index', $data);
	}

	public function add_kelas()
	{

		$data["page"] = "admin/add_kelas";
		$this->load->view('admin/index', $data);
	}

	public function tambah_kelas()
	{
		$this->form_validation->set_rules('nama_kelas', 'Nama Kelas', 'required|trim|min_length[1]', [
			'required' => 'Harap isi kolom Nama Kelas.',
			'min_length' => 'Nama Kelas terlalu pendek.',
		]);

		if ($this->form_validation->run() == false) {
			redirect('kelas/add_kelas');
		} else {
			$data = array(
				'kelas' => $this->input->post('nama_kelas'),

			);
			$this->M_Kelas->insert($data);
			$this->session->set_flashdata('success-reg', 'Berhasil!');
			redirect(base_url('kelas/add_kelas'));
		}
	}

	public function update_kelas($id)
	{
		$listKelas = $this->M_Kelas->getByPrimaryKey($id);
		$data["page"] = "admin/update_kelas";
		$data["data"] = $listKelas;
		$this->load->view('admin/index', $data);
	}

	public function updated_kelas()
	{
		$this->form_validation->set_rules('nama_kelas', 'Nama Kelas', 'required|trim|min_length[1]', [
			'required' => 'Harap isi kolom Nama Kelas.',
			'min_length' => 'Nama Kelas terlalu pendek.',
		]);

		if ($this->form_validation->run() == false) {
			redirect('mapel/add_kelas');
		} else {
			$id = $this->input->post('id');
			$data = array(
				'kelas' => $this->input->post('nama_kelas'),
			);
			$this->M_Kelas->update($id, $data);
			$this->session->set_flashdata('success-reg', 'Berhasil!');
			redirect(base_url('kelas'));
		}
	}
	public function delete_kelas($id)
	{
		$this->M_Kelas->delete($id);
		$this->session->set_flashdata('user-delete', 'berhasil');
		redirect(base_url('kelas'));
	}
}
