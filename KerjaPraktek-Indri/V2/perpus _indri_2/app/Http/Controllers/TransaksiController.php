<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\User;
use App\Buku;
use App\Mahasiswa;
use App\Transaksi;
use Carbon\Carbon;
use Session;
use Illuminate\Support\Facades\Redirect;
use Auth;
use DB;
use RealRashid\SweetAlert\Facades\Alert;

class TransaksiController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        if(Auth::user()->level == 'user')
        {
            $datas = Transaksi::where('mahasiswa_id', Auth::user()->mahasiswa->id)
                                ->get();
        } else {
            $datas = Transaksi::get();
        }
        return view('transaksi.index', compact('datas'));
    }

    public function create()
    {
        
        $getRow   = Transaksi::orderBy('id', 'DESC')->get();
        $rowCount = $getRow->count();
        
        $lastId = $getRow->first();

        $kode = "TR00001";
        
        if ($rowCount > 0) {
            if ($lastId->id < 9) {
                    $kode = "TR0000".''.($lastId->id + 1);
            } else if ($lastId->id < 99) {
                    $kode = "TR000".''.($lastId->id + 1);
            } else if ($lastId->id < 999) {
                    $kode = "TR00".''.($lastId->id + 1);
            } else if ($lastId->id < 9999) {
                    $kode = "TR0".''.($lastId->id + 1);
            } else {
                    $kode = "TR".''.($lastId->id + 1);
            }
        }

        $bukus = Buku::where('jumlah_buku', '>', 0)->get();
        $mahasiswas = Mahasiswa::get();
        return view('transaksi.create', compact('bukus', 'kode', 'mahasiswas'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'kode_transaksi' => 'required|string|max:255',
            'tgl_pinjam'     => 'required',
            'tgl_kembali'    => 'required',
            'buku_id'        => 'required',
            'mahasiswa_id'     => 'required',

        ]);

        $transaksi = Transaksi::create([
                'kode_transaksi' => $request->get('kode_transaksi'),
                'tgl_pinjam'     => $request->get('tgl_pinjam'),
                'tgl_kembali'    => $request->get('tgl_kembali'),
                'buku_id'        => $request->get('buku_id'),
                'mahasiswa_id'     => $request->get('mahasiswa_id'),
                'ket'            => $request->get('ket'),
                'status'         => 'pinjam'
            ]);

        $transaksi->buku->where('id', $transaksi->buku_id)
                        ->update([
                            'jumlah_buku' => ($transaksi->buku->jumlah_buku - 1),
                            ]);

        alert()->success('Berhasil.','Buku telah dipinjam!')->persistent('Close');
        return redirect()->route('transaksi.index');

    }

    public function show($id)
    {
        $data = Transaksi::findOrFail($id);

        if((Auth::user()->level == 'user') && (Auth::user()->mahasiswa->id != $data->mahasiswa_id)) {
                Alert::info('Oopss..', 'Anda dilarang masuk ke area ini.');
                return redirect()->to('/');
        }

        return view('transaksi.show', compact('data'));
    }

    public function edit($id)
    {   
        $data = Transaksi::findOrFail($id);

        if((Auth::user()->level == 'user') && (Auth::user()->mahasiswa->id != $data->mahasiswa_id)) {
                Alert::info('Oopss..', 'Anda dilarang masuk ke area ini.');
                return redirect()->to('/');
        }

        return view('buku.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $transaksi = Transaksi::find($id);

        $transaksi->update([
                'status' => 'kembali'
                ]);

        $transaksi->buku->where('id', $transaksi->buku->id)
                        ->update([
                            'jumlah_buku' => ($transaksi->buku->jumlah_buku + 1),
                            ]);

        alert()->success('Berhasil.','Buku telah dikembalikan!')->persistent('Close');
        return redirect()->route('transaksi.index');
    }

    public function destroy($id)
    {
        Transaksi::find($id)->delete();
        alert()->success('Berhasil.','Data telah dihapus!')->persistent('Close');
        return redirect()->route('transaksi.index');
    }
}
