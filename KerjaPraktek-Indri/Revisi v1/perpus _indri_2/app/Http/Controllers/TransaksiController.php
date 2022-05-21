<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Cart;
use App\Buku;
use App\Mahasiswa;
use App\Dosen;
use App\Transaksi;
use Carbon\Carbon;
use DateTime;
use Session;
use App\Kategori;
use App\TransaksiItem;
use Illuminate\Support\Facades\Redirect;
use Auth;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

class TransaksiController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        if (Auth::user()->level == 'user') {
            $datas = Transaksi::where('mahasiswa_id', Auth::user()->mahasiswa->id)
                ->get();
        } else {
            $datas = Transaksi::where('status', 'pinjam')->get();
            $bukus = Buku::where('jumlah_buku', '>', 0)->get();
        }
        return view('transaksi.index', compact('datas', 'bukus'));
    }

    public function create()
    {
        if ((Auth::user()->level == 'user') && (Auth::user()->id != $id)) {
            Alert::info('Oopss..', 'Anda dilarang masuk ke area ini.');
            return redirect()->to('/');
        }

        $getRow   = Transaksi::get();
        $rowCount = $getRow->count();

        $lastId = $getRow->first();

        if ($rowCount == 0) {
            $kode = "TR00001";
        } else {
            $format = $rowCount + 1;
            $kode = "TR0000" . $format;
        }

        $bukus = Buku::where('jumlah_buku', '>', 0)->get();

        $mahasiswas = Mahasiswa::get();
        $dosens = Dosen::get();
        $datas = DB::table('cart_buku')
            ->join('buku', 'cart_buku.id_buku', '=', 'buku.id')
            ->join('kategoris', 'cart_buku.id_kategori', '=', 'kategoris.id')
            ->select('cart_buku.id_cart', 'cart_buku.id_buku', 'cart_buku.qty', 'buku.judul', 'buku.isbn', 'kategoris.nama_kategori_buku')
            ->get()->all();

        return view('transaksi.create', compact('bukus', 'kode', 'mahasiswas', 'dosens', 'datas'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'kode_transaksi' => 'required|string|max:255',
            'tgl_pinjam'     => 'required|date',
            'tgl_kembali'    => 'required|date|after_or_equal:tgl_pinjam',

        ]);
        if ($request->get('tgl_pinjam') == $request->get('tgl_kembali')) {
            alert()->error('Gagal.', 'Tanggal Sama!')->persistent('Close');
            return redirect()->route('transaksi.index');
        }
        $datas = Cart::count();
        if ($datas == 0) {
            alert()->error('Gagal.', 'Tidak ada buku yang dipinjam!')->persistent('Close');
            return redirect()->route('transaksi.create');
        } else if ($request->get('anggota_nama') == '') {
            alert()->error('Gagal.', 'Pilih Peminjam Terlebih!')->persistent('Close');
            return redirect()->route('transaksi.create');
        } else {
            $transaksi = Transaksi::create([
                'kode_transaksi' => $request->get('kode_transaksi'),
                'tgl_pinjam'     => $request->get('tgl_pinjam'),
                'tgl_kembali'    => $request->get('tgl_kembali'),
                'buku_id'        => '1',
                'denda'          => '0',
                'tgl_pengembalian' => '0000-00-00',
                'terlambat' => '0',
                'mahasiswa_id'   => $request->get('mahasiswa_id'),
                'dosen_id'   => $request->get('dosen_id'),
                'ket'            => $request->get('ket'),
                'status'         => 'pinjam'
            ]);

            $data = Cart::get();
            $current_date_time = \Carbon\Carbon::now()->toDateTimeString();
            $id_transaksi = Transaksi::latest('id')->first();
            $item = [];
            foreach ($data as $d) {
                $item[] = [
                    'id_transaksi' => $id_transaksi->id,
                    'id_buku' => $d->id_buku,
                    'id_kategori' => $d->id_kategori,
                    'qty' => $d->qty,
                    'updated_at' => $current_date_time,
                    'created_at' => $current_date_time
                ];
            }
            $cek = DB::table('transaksi_items')->insert($item);
            Cart::where('id_user', Auth::user()->id == '1')->delete();

            alert()->success('Berhasil.', 'Buku telah dipinjam!')->persistent('Close');
            return redirect()->route('transaksi.index');
        }
    }

    public function show($id)
    {
        if ((Auth::user()->level == 'user') && (Auth::user()->id != $id)) {
            Alert::info('Oopss..', 'Anda dilarang masuk ke area ini.');
            return redirect()->to('/');
        }
        $mahas = DB::table('transaksis')
            ->join('mahasiswas', 'transaksis.mahasiswa_id', '=', 'mahasiswas.id')
            ->where('transaksis.id', $id)
            ->select('mahasiswas.nama')
            ->get();
        $doses = DB::table('transaksis')
            ->join('dosens', 'transaksis.dosen_id', '=', 'dosens.id')
            ->where('transaksis.id', $id)
            ->select('dosens.nama')
            ->get();
        $transaksi = Transaksi::findOrFail($id);
        $dendas = DB::table('transaksis')
            ->where('transaksis.id', $id)
            ->select('transaksis.*')
            ->get()->first();
        $data = DB::table('transaksi_items')
            ->join('buku', 'transaksi_items.id_buku', '=', 'buku.id')
            ->join('kategoris', 'transaksi_items.id_kategori', '=', 'kategoris.id')
            ->join('transaksis', 'transaksi_items.id_transaksi', '=', 'transaksis.id')
            ->where('transaksi_items.id_transaksi', $id)
            ->select('transaksi_items.*', 'buku.judul', 'kategoris.nama_kategori_buku', 'transaksis.*')
            ->get()->all();

        if ((Auth::user()->level == 'user') && (Auth::user()->mahasiswa->id != $data->mahasiswa_id)) {
            Alert::info('Oopss..', 'Anda dilarang masuk ke area ini.');
            return redirect()->to('/');
        }
        // Ngambil tanggal harus kembali
        $fdate = $transaksi->tgl_kembali;
        // Ngambil tanggal saat ini waktu kembali
        $tdate = date('Y-m-d');
        // Convertnya
        $datetime1 = new DateTime($fdate);
        $datetime2 = new DateTime($tdate);
        $interval = $datetime1->diff($datetime2);
        // Keterlambatan
        if ($datetime1 <= $datetime2) {
            $interval = $datetime1->diff($datetime2);
            $days = (int)$interval->format('%a');
            $denda = (($days) * 10000);
        } else {
            $denda = 0;
            $interval = $datetime1->diff($datetime2);
            $days = 0;
        }
        return view('transaksi.show', compact('data', 'transaksi', 'mahas', 'doses', 'dendas', 'denda', 'days'));
    }

    public function edit($id)
    {
        if ((Auth::user()->level == 'user') && (Auth::user()->id != $id)) {
            Alert::info('Oopss..', 'Anda dilarang masuk ke area ini.');
            return redirect()->to('/');
        }
        $data = Transaksi::findOrFail($id);

        if ((Auth::user()->level == 'user') && (Auth::user()->mahasiswa->id != $data->mahasiswa_id)) {
            Alert::info('Oopss..', 'Anda dilarang masuk ke area ini.');
            return redirect()->to('/');
        }

        return view('buku.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $transaksi = Transaksi::find($id);
        $data2 = DB::table('transaksi_items')
            ->join('buku', 'transaksi_items.id_buku', '=', 'buku.id')
            ->join('transaksis', 'transaksi_items.id_transaksi', '=', 'transaksis.id')
            ->where('transaksi_items.id_transaksi', $id)
            ->get();

        $tdate = date('Y-m-d');
        // Update statusnya
        $transaksi->update([
            'status' => 'kembali',
            'denda' => $request->get('denda'),
            'tgl_pengembalian' => $tdate,
            'terlambat' => $request->get('terlambat')
        ]);

        foreach ($data2 as $d) {
            $cek = Buku::where('id',  $d->id_buku)->update([
                'jumlah_buku' => $d->jumlah_buku + $d->qty
            ]);
        }

        alert()->success('Berhasil.', 'Buku telah dikembalikan!')->persistent('Close');
        return redirect()->route('transaksi.index');
    }

    public function destroy($id)
    {
        Transaksi::find($id)->delete();
        alert()->success('Berhasil.', 'Data telah dihapus!')->persistent('Close');
        return redirect()->route('transaksi.index');
    }

    public function showtransaksikembali()
    {
        if (Auth::user()->level == 'user') {
            $datas = Transaksi::where('mahasiswa_id', Auth::user()->mahasiswa->id)
                ->get();
        } else {
            $datas = Transaksi::where('status', 'kembali')->get();
            $bukus = Buku::where('jumlah_buku', '>', 0)->get();
        }
        return view('transaksi.index', compact('datas', 'bukus'));
    }
}
