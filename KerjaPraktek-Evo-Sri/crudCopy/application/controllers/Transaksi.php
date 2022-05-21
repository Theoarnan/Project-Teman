<?php

class TransaksiModel extends CI_Controller{
    public function __construct(){
        parent::__construct();
    //    isLogin();
       $this->load->model("TransaksiModel");
    }

    public function index(){
        $transaksi  = $this->TransaksiModel->getAll();
        $data = array(
            "header" => "Dashboard",
            "page"  => content/transaksi/v_v_list_transaksi,
            "transaksi" => $transaksi
        );
        $this->load->view("layout/main", $data);
    
    }
}