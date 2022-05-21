<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Tugas extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->session->set_flashdata('not-login', 'Gagal!');
		if (!$this->session->userdata('email')) {
			redirect('welcome/admin');
		}
		$this->load->model('M_Tugas');
	}

	public function index()
	{
		$listTugas = $this->M_Tugas->getAll()->result();
		$data = array(
			"page" => "admin/data_tugas",
			"data" => $listTugas
		);
		$this->load->view('admin/index', $data);
	}

	public function add_tugas()
	{
		$data = array(
			"page" => "admin/add_tugas",
		);
		$this->load->view('admin/index', $data);
	}

	public function update_tugas($id)
	{
		$listTugas = $this->M_Tugas->getAll($id);
		$data = array(
			"page" => "admin/update_tugas",
			"data" => $listTugas
		);
		$this->load->view('admin/index', $data);
	}

	public function tambah_tugas()
	{
		$this->form_validation->set_rules('nama_tugas', 'Judul Tugas', 'required|trim|min_length[4]', [
			'required' => 'Harap isi kolom Judul Tugas.',
			'min_length' => 'Judul Terlalu Singkat',
		]);

		$this->form_validation->set_rules('durasi', 'Durasi', 'required|trim', [
			'required' => 'Harap isi kolom Durasi',
		]);

		$this->form_validation->set_rules('info', 'Info Tugas', 'required|trim|min_length[1]', [
			'required' => 'Harap isi kolom Info Tugas.',
			'min_length' => 'Info terlalu pendek.',
		]);

		if ($this->form_validation->run() == false) {
			redirect('tugas/tambah_tugas');
		} else {
			$data = [
				'guru_id' => htmlspecialchars($this->input->post('nama_guru', true)),
				'nama_tugas' => htmlspecialchars($this->input->post('nama_tugas', true)),
				'jenis_tugas' => htmlspecialchars($this->input->post('type', true)),
				'durasi_pengerjaan' => htmlspecialchars($this->input->post('durasi', true)),
				'info_tugas' => htmlspecialchars($this->input->post('info', true)),
				'is_active' => htmlspecialchars($this->input->post('status', true)),
				'tampil' => 0,
				'mapel_id' => $this->input->post('nama_gurus')
			];

			$this->M_Tugas->insert($data);
			$this->session->set_flashdata('success-reg', 'Berhasil!');
			redirect(base_url('tugas'));
		}
	}

	public function updated_tugas()
	{
		$this->form_validation->set_rules('nama_tugas', 'Judul Tugas', 'required|trim|min_length[4]', [
			'required' => 'Harap isi kolom Judul Tugas.',
			'min_length' => 'Judul Terlalu Singkat',
		]);

		$this->form_validation->set_rules('durasi', 'Durasi', 'required|trim', [
			'required' => 'Harap isi kolom Durasi',
		]);

		$this->form_validation->set_rules('info', 'Info Tugas', 'required|trim|min_length[1]', [
			'required' => 'Harap isi kolom Info Tugas.',
			'min_length' => 'Info terlalu pendek.',
		]);

		if ($this->form_validation->run() == false) {
			redirect('tugas/update_tugas');
		} else {
			$id = $this->input->post('id', true);
			if ($this->input->post('nama_gurus') == '') {
				$data = [
					'guru_id' => htmlspecialchars($this->input->post('nama_guru', true)),
					'nama_tugas' => htmlspecialchars($this->input->post('nama_tugas', true)),
					'jenis_tugas' => htmlspecialchars($this->input->post('type', true)),
					'durasi_pengerjaan' => htmlspecialchars($this->input->post('durasi', true)),
					'info_tugas' => htmlspecialchars($this->input->post('info', true)),
					'is_active' => htmlspecialchars($this->input->post('status', true)),
					'tampil' => 0,
					// 'mapel_id' => $this->input->post('nama_gurus')
				];
			} else {
				$data = [
					'guru_id' => htmlspecialchars($this->input->post('nama_guru', true)),
					'nama_tugas' => htmlspecialchars($this->input->post('nama_tugas', true)),
					'jenis_tugas' => htmlspecialchars($this->input->post('type', true)),
					'durasi_pengerjaan' => htmlspecialchars($this->input->post('durasi', true)),
					'info_tugas' => htmlspecialchars($this->input->post('info', true)),
					'is_active' => htmlspecialchars($this->input->post('status', true)),
					'tampil' => 0,
					'mapel_id' => $this->input->post('nama_gurus')
				];
			}


			$this->M_Tugas->update($id, $data);
			$this->session->set_flashdata('success-reg', 'Berhasil!');
			redirect(base_url('tugas'));
		}
	}

	public function detailtugas($id)
	{
		$list = $this->M_Tugas->getAll($id);
		$listSoal = $this->M_Tugas->getDetail($id)->result();

		$data['data'] = $list;
		$data['soal'] = $listSoal;
		$data['page'] = 'admin/detail_tugas';
		$this->load->view('admin/index', $data);
	}

	public function update_soal($id)
	{
		$listSoal = $this->M_Tugas->getDetailSoal($id);
		$data['data'] = $listSoal;
		$data['page'] = 'admin/update_soal';
		$this->load->view('admin/index', $data);
	}

	public function terbitkan($id, $status)
	{
		if ($status == 0) {
			$params = array(
				'tampil' => 1
			);
		} else {
			$params = array(
				'tampil' => 0
			);
		}
		$terbitkan = $this->M_Tugas->update($id, $params);
		$this->session->set_flashdata('success-reg', 'Berhasil!');
		redirect(base_url('tugas'));
	}

	public function updated_soal()
	{
		$this->form_validation->set_rules('pertanyaan', 'Pertanyaan', 'required|trim|min_length[4]', [
			'required' => 'Harap isi kolom Pertanyaan.',
			'min_length' => 'Pertanyaan terlalu singkat',
		]);

		$this->form_validation->set_rules('bobot', 'Bobot Nilai', 'required|trim', [
			'required' => 'Harap isi kolom Bobot Nilai Pertanyaan',
		]);

		$this->form_validation->set_rules('jawaban1', 'Jawaban A', 'required|trim', [
			'required' => 'Harap isi kolom Jawaban A',
		]);

		$this->form_validation->set_rules('jawaban2', 'Jawaban B', 'required|trim', [
			'required' => 'Harap isi kolom Jawaban B',
		]);

		$this->form_validation->set_rules('jawaban3', 'Jawaban C', 'required|trim', [
			'required' => 'Harap isi kolom Jawaban C',
		]);

		$this->form_validation->set_rules('jawaban4', 'Jawaban D', 'required|trim', [
			'required' => 'Harap isi kolom Jawaban D',
		]);

		$this->form_validation->set_rules('jawaban5', 'Jawaban E', 'required|trim', [
			'required' => 'Harap isi kolom Jawaban E',
		]);

		$this->form_validation->set_rules('kunci', 'Kunci Jawaban', 'required|trim', [
			'required' => 'Harap isi kolom Kunci Jawaban',
		]);

		$this->form_validation->set_rules('alasan', 'Alasan', 'required|trim', [
			'required' => 'Harap isi kolom Kunci Jawaban',
		]);

		if ($this->form_validation->run() == false) {
			redirect('admin/add_soal');
		} else {
			$id =  $this->input->post('id');
			$gambar = $_FILES['image']['name'];
			$config['allowed_types'] = 'jpg|png|gif|jfif';
			$config['max_size'] = '4096';
			$config['upload_path'] = './assets/upload_soal';
			$this->load->library('upload', $config);
			//berhasil
			$gambarLama = $this->M_Tugas->getDetailSoal($id);
			if ($gambar != '') {
				if ($this->upload->do_upload('image')) {
					$gambarBaru = $this->upload->data('file_name');
				} else {
					echo $this->upload->display_errors();
				}
			} else {
				$gambarBaru = $gambarLama->gambar;
			}

			$datas = array(
				'bobot' => $this->input->post('bobot'),
				'pertanyaan' => $this->input->post('pertanyaan'),
				'gambar' => $gambarBaru
			);
			$this->M_Tugas->update_pertanyaan($id, $datas);
			$row = array(
				'pilihan_a' => $this->input->post('jawaban1'),
				'pilihan_b' => $this->input->post('jawaban2'),
				'pilihan_c' => $this->input->post('jawaban3'),
				'pilihan_d' => $this->input->post('jawaban4'),
				'pilihan_e' => $this->input->post('jawaban5'),
				'kunci' => $this->input->post('kunci'),
				'alasan' => $this->input->post('alasan'),
			);

			$this->M_Tugas->update_pilihan($id, $row);
			$this->session->set_flashdata('success-reg', 'Berhasil!');
			redirect(base_url('tugas'));
		}
	}

	public function delete_soal($id)
	{
		$this->M_Tugas->deleteSoal($id);
		$this->session->set_flashdata('user-delete', 'berhasil');
		redirect('admin');
	}

	public function delete_tugas($id)
	{
		$this->M_Tugas->delete($id);
		$this->session->set_flashdata('user-delete', 'berhasil');
		redirect('admin');
	}

	public function add_soal($id)
	{
		$data['id'] = $id;
		$data['page'] = 'admin/add_soal';
		$this->load->view('admin/index', $data);
	}

	public function tambah_soal()
	{
		$this->form_validation->set_rules('pertanyaan', 'Pertanyaan', 'required|trim|min_length[4]', [
			'required' => 'Harap isi kolom Pertanyaan.',
			'min_length' => 'Pertanyaan terlalu singkat',
		]);

		$this->form_validation->set_rules('bobot', 'Bobot Nilai', 'required|trim', [
			'required' => 'Harap isi kolom Bobot Nilai Pertanyaan',
		]);

		$this->form_validation->set_rules('jawaban1', 'Jawaban A', 'required|trim', [
			'required' => 'Harap isi kolom Jawaban A',
		]);

		$this->form_validation->set_rules('jawaban2', 'Jawaban B', 'required|trim', [
			'required' => 'Harap isi kolom Jawaban B',
		]);

		$this->form_validation->set_rules('jawaban3', 'Jawaban C', 'required|trim', [
			'required' => 'Harap isi kolom Jawaban C',
		]);

		$this->form_validation->set_rules('jawaban4', 'Jawaban D', 'required|trim', [
			'required' => 'Harap isi kolom Jawaban D',
		]);

		$this->form_validation->set_rules('jawaban5', 'Jawaban E', 'required|trim', [
			'required' => 'Harap isi kolom Jawaban E',
		]);

		$this->form_validation->set_rules('kunci', 'Kunci Jawaban', 'required|trim', [
			'required' => 'Harap isi kolom Kunci Jawaban',
		]);

		$this->form_validation->set_rules('alasan', 'Alasan', 'required|trim', [
			'required' => 'Harap isi kolom Alasan',
		]);

		if ($this->form_validation->run() == false) {
			redirect('admin/add_soal');
		} else {
			//
			$gambar = $_FILES['image']['name'];
			$config['allowed_types'] = 'jpg|png|gif|jfif';
			$config['max_size'] = '4096';
			$config['upload_path'] = './assets/upload_soal';

			$this->load->library('upload', $config);
			//berhasil
			if ($this->upload->do_upload('image')) {
				$gambarBaru = $this->upload->data('file_name');
				// $this->db->set('image', $gambarBaru);
			} else {
				echo $this->upload->display_errors();
			}
			$datas = array(
				'bobot' => $this->input->post('bobot'),
				'pertanyaan' => $this->input->post('pertanyaan'),
				'gambar' => $gambarBaru,
				'tugas_id' => $this->input->post('id')
			);
			$id_pertanyaan = $this->M_Tugas->insertGetId($datas);
			$row = array(
				'pertanyaan_id' => $id_pertanyaan,
				'pilihan_a' => $this->input->post('jawaban1'),
				'pilihan_b' => $this->input->post('jawaban2'),
				'pilihan_c' => $this->input->post('jawaban3'),
				'pilihan_d' => $this->input->post('jawaban4'),
				'pilihan_e' => $this->input->post('jawaban5'),
				'kunci' => $this->input->post('kunci'),
				'alasan' => $this->input->post('alasan'),
			);

			$this->M_Tugas->insertBatch($row);
			$this->session->set_flashdata('success-reg', 'Berhasil!');
			redirect(base_url('tugas/detailtugas/' . $this->input->post('id')));
		}
	}
}
