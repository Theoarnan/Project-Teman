<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Softskill extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        // check_admin();

        $this->load->model("SoftskillModel");
        $this->load->model("JenisModel");
        $this->load->model("TingkatModel");

    }
    public function index()
    {
        //1. Ambil data dari model
        $softskillList = $this->SoftskillModel->getAll();
        //2. Kirimkan data ke view
        $data = array(
            "softskillList" => $softskillList,
            "title" =>"Softskill",
            "header" => "Data softskill",
            "list" => "list Softskill",
            "page" => "content/softskill/list"
        );
        // $this->load->view("nama_halaman",$variableYangDikirim)
       return $this->load->view("layout/main", $data);
    }
    public function tambah()
    {
        $jenis = $this->JenisModel->getAll();
        $tingkat = $this->TingkatModel->getAll();
        $data = array(
            "title" =>" Softskill",
            "list" => "list Softskill",
            "page" => "content/softskill/v_form_tambah",
            "header" => "Tambah Data softskill",
            "jenis" => $jenis,
            "tingkat" => $tingkat,
        );

        return $this->load->view("layout/main", $data);
    }
    public function proses_simpan()
	{
		$softskill = array(
            $nm_kegiatan = $this->input->post("nm_kegiatan", true),
            $tgl_kegiatan = $this->input->post("tgl_kegiatan", true),
            $kat_kegiatan = $this->input->post("kat_kegiatan", true),
            $poin_kegiatan = $this->input->post("poin_kegiatan", true),
            $gambar = $this->input->post("gambar", true),
        );
            
			
		
		$id = $this->SoftskillModel->insertGetId($softskill);
		if ($id > 0) {
			$uploadGambar = $this->uploadGambar("gambar");

			if ($uploadGambar["result"] == "success") {
				$dataUpdate = array(
					"gambar" => $uploadGambar["file"]["file_name"],
				);
				$this->SoftskillModel->update($id, $dataUpdate);
			}
		}
		redirect("softskill");
	}


    public function edit($id)
    {
        $softskill = $this->SoftskillModel->getByPrimaryKey($id);
        $data = array(
            "softskill" => $softskill,
            "title" => " softskill",
            "list" => "list Softskill",
            "page" => "content/softskill/v_form_ubah",
            "header" => "Tambah Data softskill",
        );
        return $this->load->view("layout/main", $data);
    }
    public function prosesTambah()
    {
        $id_softskill = $this->input->post("id_softskill", true);
        $nm_kegiatan = $this->input->post("nm_kegiatan", true);
        $tgl_kegiatan = $this->input->post("tgl_kegiatan", true);
        $kat_kegiatan = $this->input->post("kat_kegiatan", true);
        $poin_kegiatan = $this->input->post("poin_kegiatan", true);
        $gambar = $this->input->post("gambar", true);
        $prestasi = $this->input->post();
        if ($prestasi == "juara 1"){

        }

        $softskill = array(
            "id_softskill" => $id_softskill,
            "nm_kegiatan" => $nm_kegiatan,
            "tgl_kegiatan" =>$tgl_kegiatan,
            "kat_kegiatan" => $kat_kegiatan,
            "poin_kegiatan" =>$poin_kegiatan,
            "gambar" =>$gambar
        );
        $this->SoftskillModel->insertData($softskill);
        redirect("softskill");
    }
    public function delete($id)
    {
        $softskill = $this->SoftskillModel->getByPrimaryKey($id);
        $data = array(
            "softskill" => $softskill,
            "title" => " softskill",
            "list" => "list Softskill",
            "page" => "content/softskill/v_form_hapus",
            "header" => "Tambah Data softskill",
        );
       return $this->load->view("layout/main", $data);
    }
    public function prosesHapus($id)
    {
        $this->SoftskillModel->deleteData($id);
        redirect("softskill");
    }

    public function prosesEdit()
    {
        $id_softskill = $this->input->post("id_softskill", true);
        $nm_kegiatan = $this->input->post("nm_kegiatan", true);
        $tgl_kegiatan = $this->input->post("tgl_kegiatan", true);
        $kat_kegiatan = $this->input->post("kat_kegiatan", true);
        $poin_kegiatan = $this->input->post("poin_kegiatan", true);
        $gambar = $this->input->post("gambar", true);
        $softskill = array(
            "id_softskill" => $id_softskill,
            "nm_kegiatan" => $nm_kegiatan,
            "tgl_kegiatan" =>$tgl_kegiatan,
            "kat_kegiatan" => $kat_kegiatan,
            "poin_kegiatan" =>$poin_kegiatan,
            "gambar" =>$gambar
        );
        $this->SoftskillModel->updateData($id_softskill, $softskill);
        redirect("softskill");
    }
}
