<?php

namespace App\Http\Controllers;
use Auth;
use App\User;
use App\Kategori;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        if(Auth::user()->level == 'user') {
            Alert::info('Oopss..', 'Anda dilarang masuk ke area ini.');
            return redirect()->to('/');
        }

        $datas = Kategori::get();
        return view('kategori.index', compact('datas'));
    }

    public function create()
    {
        if(Auth::user()->level == 'user') {
            Alert::info('Oopss..', 'Anda dilarang masuk ke area ini.');
            return redirect()->to('/');
        }

        return view('kategori.create');
    }


    public function store(Request $request)
    {
        $this->validate($request, [
            'nama_kategori_buku' => 'required|string|max:255'
        ]);
            
        Kategori::create([
                'nama_kategori_buku' => $request->get('nama_kategori_buku')
               
            ]);

        alert()->success('Berhasil.','Data telah ditambahkan!');

        return redirect()->route('kategori.index');

    }

    public function show($id)
    {
        if(Auth::user()->level == 'user') {
                Alert::info('Oopss..', 'Anda dilarang masuk ke area ini.');
                return redirect()->to('/');
        }

        $data = Kategori::findOrFail($id);

        return view('kategori.show', compact('data'));
    }

    public function edit($id)
    {   
        if(Auth::user()->level == 'user') {
                Alert::info('Oopss..', 'Anda dilarang masuk ke area ini.');
                return redirect()->to('/');
        }

        $data = Kategori::findOrFail($id);
        return view('kategori.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        Kategori::find($id)->update([
             'nama_kategori_buku' => $request->get('nama_kategori_buku')
                ]);

        alert()->success('Berhasil.','Data telah diubah!');
        return redirect()->route('kategori.index');
    }
    public function destroy($id)
    {
        Kategori::find($id)->delete();
        alert()->success('Berhasil.','Data telah dihapus!');
        return redirect()->route('kategori.index');
    }
}
