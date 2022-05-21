<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->model(array('M_Kelas', 'M_Mapel', 'M_Tugas'));
		// $this->session->set_flashdata('not-login', 'Gagal!');
		// if (!$this->session->userdata('email')) {
		//     redirect('welcome');
	}

	public function index()
	{
		$data['user'] = $this->db->get_where('siswa', ['email' =>
		$this->session->userdata('email')])->row_array();
		$f['page'] = 'user/menu_kelas';
		$list = $this->M_Kelas->getAll();
		$f['data'] = $list;
		// d($data);
		// die;
		$this->load->view('user/index', $f);
		$this->load->view('template/footer');
	}

	public function manu_mapel($id)
	{
		$data['user'] = $this->db->get_where('siswa', ['email' =>
		$this->session->userdata('email')])->row_array();
		$data['page'] = 'user/menu_mapel';
		$list = $this->M_Mapel->getById($id);
		$data['data'] = $list;

		$this->load->view('user/index', $data);
		$this->load->view('template/footer');
	}

	public function materi_mapel($id)
	{
		$data['user'] = $this->db->get_where('siswa', ['email' =>
		$this->session->userdata('email')])->row_array();
		$list = $this->M_Tugas->getTugas($id);
		$listMateri = $this->M_Tugas->getMateri($id);
		$data = array(
			'page' => 'user/list_materi',
			'datas' => $list,
			'materi' => $listMateri
		);
		$this->load->view('user/index', $data);
		$this->load->view('template/footer');
	}

	public function materi_soal($id)
	{
		$user = $this->session->userdata('user_id');
		$cekKerjakan = $this->M_Tugas->cek($user, $id);
		if ($cekKerjakan == '') {
			$data['user'] = $this->db->get_where('siswa', ['email' =>
			$this->session->userdata('email')])->row_array();
			$listSoal = $this->M_Tugas->getDetail($id)->result();
			$listSoals = $this->M_Tugas->getTotal($id);
			$data = array(
				'page' => 'user/list_soal',
				'soal' => $listSoal,
				'jumlah' => $listSoals,
				'id_tugas' => $id
			);
			$this->load->view('user/index', $data);
			$this->load->view('template/footer');
		} else {
			$hasil = $this->M_Tugas->getHasil($user, $id);
			$data['nilai'] = $hasil->nilai;
			$data['salah'] = $hasil->salah;
			$data['benar'] = $hasil->benar;
			$data['kosong'] = $hasil->kosong;
			$data['hasil']  = number_format($hasil->nilai, 2);
			$data['jumlah_soal']  = '';
			$data['page'] = 'user/hasil';
			d($data);
			$this->load->view('user/index', $data);
			$this->load->view('template/footer');
			// redirect(base_url('user'));
		}
	}



	public function materi_detail($id)
	{
		$data['user'] = $this->db->get_where('siswa', ['email' =>
		$this->session->userdata('email')])->row_array();
		$listMateri = $this->M_Tugas->getMateri($id);
		$data = array(
			'page' => 'user/detail_materi',
			'detail' => $listMateri
		);
		$this->load->view('user/index', $data);
		$this->load->view('template/footer');
	}

	// Add Menu
	public function submit_jawaban()
	{
		if (!empty($this->input->post('pilihan'))) {
			$this->session->set_flashdata('error-reg', 'Tidak Mengisi jawaban apapun!');
		}
		$pilihan    = $this->input->post("pilihan");
		$id_soal    = $this->input->post("id");
		$jumlah     = $this->input->post("jumlah");
		$score    = 0;
		$benar    = 0;
		$salah    = 0;
		$kosong    = 0;
		for ($i = 0; $i < $jumlah; $i++) {
			$nomor    = $id_soal[$i];
			if (empty($pilihan[$nomor])) {
				$kosong++;
			} else {
				$jawaban    = $pilihan[$nomor];
				$cek = $this->M_Tugas->cekKunci($nomor, $jawaban);
				if ($cek) {
					$benar++;
				} else {
					$salah++;
				}
			}
		}
		$score    = 100 / $jumlah * $benar;
		$hasil    = number_format($score, 2);
		// d($$score, $pilihan, $id_soal, $benar, $salah, $kosong);
		// die;
		$history = array(
			"siswa_id" => $this->session->userdata('user_id'),
			"nilai" => $score,
			"benar" => $benar,
			"salah" => $salah,
			"kosong" => $kosong,
			"tugas_id" =>  $this->input->post("id_tugas"),
			"is_kerjakan" => "1"
		);
		$this->M_Tugas->add_history($history);
		$data = array(
			'jumlah_soal' => $jumlah,
			'benar' => $benar,
			'salah' => $salah,
			'kosong' => $kosong,
			'nilai' => $score,
			'hasil' => $hasil,
			'page' => 'user/hasil'
		);
		$this->load->view('user/index', $data);
		$this->load->view('template/footer');
	}

	// Add Menu
	public function getKelas()
	{

		$this->M_Kelas->getAll();
	}

	public function kelas10()
	{
		$data['user'] = $this->db->get_where('siswa', ['email' =>
		$this->session->userdata('email')])->row_array();

		$this->load->view('user/kelas10');
		$this->load->view('template/footer');
	}

	public function kelas11()
	{
		$data['user'] = $this->db->get_where('siswa', ['email' =>
		$this->session->userdata('email')])->row_array();

		$this->load->view('user/kelas11');
		$this->load->view('template/footer');
	}

	public function kelas12()
	{
		$data['user'] = $this->db->get_where('siswa', ['email' =>
		$this->session->userdata('email')])->row_array();

		$this->load->view('user/kelas12');
		$this->load->view('template/footer');
	}

	public function registration()
	{
		$this->load->view('user/registration');
		$this->load->view('template/footer');
	}

	public function registration_act()
	{
		$this->form_validation->set_rules('nama', 'Nama', 'required|trim|min_length[4]', [
			'required' => 'Harap isi kolom username.',
			'min_length' => 'Nama terlalu pendek.',
		]);
		$this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[siswa.email]', [
			'is_unique' => 'Email ini telah digunakan!',
			'required' => 'Harap isi kolom email.',
			'valid_email' => 'Masukan email yang valid.',
		]);
		$this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[6]|matches[retype_password]', [
			'required' => 'Harap isi kolom Password.',
			'matches' => 'Password tidak sama!',
			'min_length' => 'Password terlalu pendek',
		]);
		$this->form_validation->set_rules('retype_password', 'Password', 'required|trim|matches[password]', [
			'matches' => 'Password tidak sama!',
		]);

		if ($this->form_validation->run() == false) {
			$this->load->view('template/nav');
			$this->load->view('user/registration');
			$this->load->view('template/footer');
		} else {
			$email = $this->input->post('email', true);
			$data = [
				'nama' => htmlspecialchars($this->input->post('nama', true)),
				'email' => htmlspecialchars($email),
				'image' => 'default.jpg',
				'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
				'is_active' => 1,
				'date_created' => time(),
			];

			//siapkan token

			// $token = base64_encode(random_bytes(32));
			// $user_token = [
			//     'email' => $email,
			//     'token' => $token,
			//     'date_created' => time(),
			// ];

			$this->db->insert('siswa', $data);
			// $this->db->insert('token', $user_token);

			// $this->_sendEmail($token, 'verify');

			$this->session->set_flashdata('success-reg', 'Berhasil!');
			redirect(base_url('welcome'));
		}
	}

	private function _sendEmail($token, $type)
	{
		$config = [
			'protocol' => 'smtp',
			'smtp_host' => 'ssl://smtp.googlemail.com',
			'smtp_user' => 'ini email disini',
			'smtp_pass' => 'Isi Password gmail disini',
			'smtp_port' => 465,
			'mailtype' => 'html',
			'charset' => 'utf-8',
			'newline' => "\r\n",
		];

		$this->email->initialize($config);

		$data = array(
			'name' => 'syauqi',
			'link' => ' ' . base_url() . 'welcome/verify?email=' . $this->input->post('email') . '& token' . urlencode($token) . '"',
		);

		$this->email->from('LearnifyEducations@gmail.com', 'Learnify');
		$this->email->to($this->input->post('email'));

		if ($type == 'verify') {
			$link =
				$this->email->subject('Verifikasi Akun');
			$body = $this->load->view('template/email-template.php', $data, true);
			$this->email->message($body);
		} else {
		}

		if ($this->email->send()) {
			return true;
		} else {
			echo $this->email->print_debugger();
			die();
		}
	}
}
