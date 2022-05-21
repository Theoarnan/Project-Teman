<?php

namespace App\Http\Controllers;

use App\Buku;
use App\Transaksi;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;


class LaporanController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function transaksi()
    {
        if (Auth::user()->level == 'user') {
            Alert::info('Oopss..', 'Anda dilarang masuk ke area ini.');
            return redirect()->to('/');
        }
        return view('laporan.transaksi');
    }


    public function transaksiPdf(Request $request)
    {
        if (Auth::user()->level == 'user') {
            Alert::info('Oopss..', 'Anda dilarang masuk ke area ini.');
            return redirect()->to('/');
        }
        $q = Transaksi::query();

        if ($request->get('status')) {
            if ($request->get('status') == 'pinjam') {
                $q->where('status', 'pinjam');
            } else {
                $q->where('status', 'kembali');
            }
        }

        if (Auth::user()->level == 'user') {
            $q->where('anggota_id', Auth::user()->anggota->id);
        }
        $statu = $request->get('status');
        if ($statu == '') {
            $statu = 'Semua Transaksi';
        }
        $datas = $q->get();

        // return view('laporan.transaksi_pdf', compact('datas'));
        $pdf = PDF::loadView('laporan.transaksi_pdf', ['datas' => $datas, 'status' => $statu]);
        return $pdf->download('laporan_transaksi_' . date('Y-m-d_H-i-s') . '.pdf');
    }

    public function buku()
    {
        if (Auth::user()->level == 'user') {
            Alert::info('Oopss..', 'Anda dilarang masuk ke area ini.');
            return redirect()->to('/');
        }
        return view('laporan.buku');
    }

    public function bukuPdf()
    {
        if (Auth::user()->level == 'user') {
            Alert::info('Oopss..', 'Anda dilarang masuk ke area ini.');
            return redirect()->to('/');
        }
        $statu = 'Buku';
        $datas = Buku::all();
        $pdf = PDF::loadView('laporan.buku_pdf',  ['datas' => $datas, 'status' => $statu]);
        return $pdf->download('laporan_buku_' . date('Y-m-d_H-i-s') . '.pdf');
    }
}
