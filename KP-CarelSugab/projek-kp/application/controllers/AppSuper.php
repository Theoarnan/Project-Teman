<?php
// require 'kint.phar';

class AppSuper extends CI_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->model(array("ModelItemFormat", "AuthModel","ModelNomerator", "modelCustomer", "ModelJenisKertas", "ModelPerforasi","modelPegawai", "ModelOrder" , "ModelTransaksi", "ModelBending", "ModelItemTransaksi", "ModelFormat", "ModelUv"));
		// isLogin();
		checkOnLogin();
	}

	public function index() {
		$listCustomer = $this->modelCustomer->getAll();
		$listPegawai = $this->modelPegawai->getAll();
		$listBending = $this->ModelBending->getAll();
		$listFormat = $this->ModelFormat->getAll();
		$listFormatAll = $this->ModelItemFormat->getAll();
		$listOrder = $this->ModelOrder->getAll();
		$listUV = $this->ModelUv->getAll();
		$listNomerator = $this->ModelNomerator->getAll();
		$listJenisKertas = $this->ModelJenisKertas->getAll();
		$listPerforasi = $this->ModelPerforasi->getAll();
		$data = array(
			"header" => "App",
			"page" => "contentSuper/app/v_form_app",
			"customers" => $listCustomer,
			"bendings" => $listBending,
			"pegawais" => $listPegawai,
			"orders" => $listOrder,
			"formatss" => $listFormatAll,
			"uvs" => $listUV,
			"nomerators" => $listNomerator,
			"jnskertass" => $listJenisKertas,
			"perforasis" => $listPerforasi,
			"formats" => $listFormat
		);
		$this->load->view("layoutSuper/dashboard", $data);
	}

	public function proses_transaksi() {
		$str_item_transaksi = $this->input->post("item_transaksi");
		$itemTransaksi = json_decode($str_item_transaksi);
		//1.cari dulu nilai terbesar dari id yang terakhir
		$queryMaxId = "select ifnull(max(nomor),0) as max from transaksi "
			. "WHERE MONTH(tanggal_transaksi) = MONTH(NOW()) AND YEAR(tanggal_transaksi)=YEAR(NOW())";
		$max = $this->db->query($queryMaxId)->row()->max;
		$max = (int) $max;
		// "TRX/2020/04/0120"
		$strPad = str_pad($max + 1, 4, "0", STR_PAD_LEFT);
		$noTransaksi = "TRX/" . date("Y/m") . "/" . $strPad;
		$dataTransaksi = array(
			"no_transaksi" => $noTransaksi,
			"tanggal_transaksi" => date("Y-m-d H:i:s"),
			"nomor" => ($max + 1)
		);
		$idTransaksi = $this->ModelTransaksi->insertGetId($dataTransaksi);
		//inputkan item transaksi
		$index = 0;
		foreach ($itemTransaksi as $item) {
			$itemTransaksi[$index++]->id_transaksi = $idTransaksi;
		}
		$result = $this->ModelItemTransaksi->insertBatch($itemTransaksi);
		echo $result;
	}

	public function proses_simpan(){
//		$data = array(
//			"kode_kustomer" => $this->input->post('kd_kustomer'),
//			"nama_toko" => $this->input->post('nama_toko'),
//			"alamat_toko" => $this->input->post('alamat_toko'),
//			"no_order" => $this->input->post('no-order'),
//			"no_po" => $this->input->post('no-po'),
//			"no_pr" => $this->input->post('no-pr'),
//			"tgl_order" => $this->input->post('tgl_order'),
//			"tgl_minta_kirim" => $this->input->post('tgl_kirim'),
//			"rangkap" => $this->input->post('rangkap'),
//			"jml_satuan_order" => $this->input->post('jml_order'),
//			"buku" => $this->input->post('buku'),
//			"set_buku" => $this->input->post('set_buku'),
//			"kd_cabang" => $this->input->post('kd_cabang'),
//			"nama_sales" => $this->input->post('nama_sales'),
//			"jabatan" => $this->input->post('jabatan'),
//			"offset_sablon_polos" => $this->input->post('offset_sablon_polos'),
//			"perforasi" => $this->input->post('perforasi'),
//			"nomerator" => $this->input->post('nomerator'),
//			"warna_nomerator" => $this->input->post('warna_nomerator'),
//			"bending" => $this->input->post('bending'),
//			"uv_vernish_laminating" => $this->input->post('uv_vernish_laminating'),
//			"foil" => $this->input->post('foil'),
//			"degel" => $this->input->post('degel'),
//			"catatan" => $this->input->post('catatan'),
//		);
//		var_dump($data);
//		die();

		$paramsCustomer = json_decode($this->input->post("dataFormat"));
		$data = $paramsCustomer->item_data;
		var_dump($data);
		die();
		$dataSimpan = array();
        foreach ($data as $item){
            $dataSimpan[] = array(
                //Nama field -> nama objek -> Field object
                "format" => $item->format,
                "jns_kertas" => $item->jns_kertas,
                "warna_kertas" => $item->warna_kertas,
                "warna_tinta" => $item->warna_tinta,
                "jumlah_order" => $item->jumlah_order,
                "id_format" => $item->id_format
            );
        }
        $this->ModelOrder->insertBatch($dataSimpan);
//		$itemTransaksi = json_decode($str_item_transaksi);
		$this->ModelOrder->insert($paramsCustomer);
		if ($this->db->affected_rows() > 0) {
			$data = array("success" => true);
		} else {
			$data = array("success" => false);
		}
		echo json_encode($data);
		
//		$itemCust = json_encode($data);
//		var_dump($itemCust);
//		die();
//		$index = 0;
//		foreach ($itemTransaksi as $item) {
//			$itemTransaksi[$index++]->id_transaksi = $idTransaksi;
//		}
//		$dataFormat = array(
//	"no_order" => $this->input->post('no-'),
//			"no_order" => $this->input->post('no-order'),
//			"format" => $this->input->post('format'),
//			"jns_kertas" => $this->input->post('jns_kertas'),
//			"warna_kertas" => $this->input->post('warna_kertas'),
//			"warna_tinta" => $this->input->post('warna_tinta'),
//			"jumlah_order" => $this->input->post('jumlah_order')
//		);

//		$idTransaksi = $this->ModelOrder->insertGetId($data);
		//inputkan item transaksi
//		$index = 0;
//		foreach ($itemTransaksi as $item) {
//			$itemTransaksi[$index++]->id_format = $idTransaksi;
//		}
//		$result = $this->ModelItemTransaksi->insertBatch($itemTransaksi);
//		echo $result;
//		$result = $this->ModelItemFormat->insertBatch($itemTransaksi);

//		$this->ModelItemFormat->insert($str_item_transaksi);
//		$this->ModelOrder->insert($paramsCustomer);
////		echo $result;
//		redirect("Transaksi");
	}

	public function prosesSimpan(){
		$str_item_transaksi = $this->input->post("cet_table_format");
		$str_item_custommer = $this->input->post("cet_table_custommer");
		$dataFormat = array(
//			"no_order" => $this->input->post('no-'),
			"no_order" => $this->input->post('no-order'),
			"format" => $this->input->post('format'),
			"jns_kertas" => $this->input->post('jns_kertas'),
			"warna_kertas" => $this->input->post('warna_kertas'),
			"warna_tinta" => $this->input->post('warna_tinta'),
			"jumlah_order" => $this->input->post('jumlah_order')
		);
		$this->ModelItemFormat->insertBatch($dataFormat);

		$itemFormat = json_decode($str_item_transaksi);
		$itemCustommer = json_decode($str_item_custommer);
		$idTransaksi = $this->ModelItemFormat->insertGetId($dataFormat);
		//inputkan item transaksi
		$index = 0;
		foreach ($itemFormat as $item) {
			$itemFormat[$index++]->id_format = $idTransaksi;
		}
		$result = $this->ModelItemFormat->insertBatch($itemFormat);
		echo $result;
	}
}
