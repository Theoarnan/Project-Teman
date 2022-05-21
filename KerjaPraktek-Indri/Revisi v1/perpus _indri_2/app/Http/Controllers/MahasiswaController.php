<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Mahasiswa;
use Carbon\Carbon;
use Session;
use Illuminate\Support\Facades\Redirect;
use Auth;
use DB;
use RealRashid\SweetAlert\Facades\Alert;

class MahasiswaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        if (Auth::user()->level == 'user') {
            Alert::info('Oopss..', 'Anda dilarang masuk ke area ini.');
            return redirect()->to('/');
        }

        $datas = Mahasiswa::get();
        return view('mahasiswa.index', compact('datas'));
    }

    public function create()
    {
        if (Auth::user()->level == 'user') {
            Alert::info('Oopss..', 'Anda dilarang masuk ke area ini.');
            return redirect()->to('/');
        }

        $users = User::WhereNotExists(function ($query) {
            $query->select(DB::raw(1))
                ->from('mahasiswas')
                ->whereRaw('mahasiswas.user_id = users.id');
        })->get();
        return view('mahasiswa.create', compact('users'));
    }

    public function store(Request $request)
    {
        $count = Mahasiswa::where('nim', $request->input('nim'))->count();

        if ($count > 0) {
            Session::flash('message', 'Already exist!');
            Session::flash('message_type', 'danger');
            return redirect()->to('mahasiswa');
        }

        $this->validate($request, [
            'nama' => 'required|string|max:255',
            'nim' => 'required|string|max:20|min:8|unique:mahasiswas',
            'email' => 'required|email|unique:mahasiswas'
        ]);
        Mahasiswa::create([
            'user_id' => Auth::user()->id,
            'nim' => $request->get('nim'),
            'nama' => $request->get('nama'),
            'tgl_lahir' => $request->get('tgl_lahir'),
            'jk' => $request->get('jk'),
            'alamat_mahasiswa' => $request->get('alamat_mahasiswa'),
            'email' => $request->get('email'),
            'prodi' => $request->get('prodi')
        ]);
        alert()->success('Berhasil.', 'Data telah ditambahkan!');
        return redirect()->route('mahasiswa.index');
    }

    public function show($id)
    {
        if ((Auth::user()->level == 'user') && (Auth::user()->id != $id)) {
            Alert::info('Oopss..', 'Anda dilarang masuk ke area ini.');
            return redirect()->to('/');
        }

        $data = Mahasiswa::findOrFail($id);

        return view('mahasiswa.show', compact('data'));
    }

    public function edit($id)
    {
        if ((Auth::user()->level == 'user') && (Auth::user()->id != $id)) {
            Alert::info('Oopss..', 'Anda dilarang masuk ke area ini.');
            return redirect()->to('/');
        }

        $data = Mahasiswa::findOrFail($id);
        $users = User::get();
        return view('mahasiswa.edit', compact('data', 'users'));
    }

    public function update(Request $request, $id)
    {
        // Mahasiswa::find($id)->update($request->all());
        Mahasiswa::find($id)->update([
            'user_id' => Auth::user()->id,
            'nim' => $request->get('nim'),
            'nama' => $request->get('nama'),
            'tgl_lahir' => $request->get('tgl_lahir'),
            'jk' => $request->get('jk'),
            'alamat_mahasiswa' => $request->get('alamat_mahasiswa'),
            'email' => $request->get('email'),
            'prodi' => $request->get('prodi')
        ]);

        alert()->success('Berhasil.', 'Data telah diubah!');
        return redirect()->to('mahasiswa');
    }

    public function destroy($id)
    {
        Mahasiswa::find($id)->delete();
        alert()->success('Berhasil.', 'Data telah dihapus!');
        return redirect()->route('mahasiswa.index');
    }
}
