<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Dosen;
use App\User;
use Carbon\Carbon;
use Session;
use Illuminate\Support\Facades\Redirect;
use Auth;
use DB;
use RealRashid\SweetAlert\Facades\Alert;

class DosenController extends Controller
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

        $datas = Dosen::get();
        return view('dosen.index', compact('datas'));
    }

    public function create()
    {
        if (Auth::user()->level == 'user') {
            Alert::info('Oopss..', 'Anda dilarang masuk ke area ini.');
            return redirect()->to('/');
        }


        return view('dosen.create');
    }

    public function store(Request $request)
    {
        $count = Dosen::where('nidn', $request->input('nidn'))->count();

        if ($count > 0) {
            Session::flash('message', 'Already exist!');
            Session::flash('message_type', 'danger');
            return redirect()->to('dosen');
        }

        $this->validate($request, [
            'nama' => 'required|string|max:255',
            'nidn' => 'required|string|max:20|unique:dosens'
        ]);
        Dosen::create([
            'tempat_lahir' => $request->get('tempat_lahir'),
            'nidn' => $request->get('nidn'),
            'nama' => $request->get('nama'),
            'tgl_lahir' => $request->get('tgl_lahir'),
            'jk' => $request->get('jk'),
            'prodi' => $request->get('program_studi')
        ]);
        alert()->success('Berhasil.', 'Data telah ditambahkan!');
        return redirect()->route('dosen.index');
    }

    public function show($id)
    {
        if ((Auth::user()->level == 'user') && (Auth::user()->id != $id)) {
            Alert::info('Oopss..', 'Anda dilarang masuk ke area ini.');
            return redirect()->to('/');
        }

        $data = Dosen::findOrFail($id);

        return view('dosen.show', compact('data'));
    }

    public function edit($id)
    {
        if ((Auth::user()->level == 'user') && (Auth::user()->id != $id)) {
            Alert::info('Oopss..', 'Anda dilarang masuk ke area ini.');
            return redirect()->to('/');
        }

        $data = Dosen::findOrFail($id);
        $users = User::get();
        return view('dosen.edit', compact('data', 'users'));
    }

    public function update(Request $request, $id)
    {
        // Dosen::find($id)->update($request->all());
        Dosen::find($id)->update([
            'tempat_lahir' => $request->get('tempat_lahir'),
            'nidn' => $request->get('nidn'),
            'nama' => $request->get('nama'),
            'tgl_lahir' => $request->get('tgl_lahir'),
            'jk' => $request->get('jk'),
            'prodi' => $request->get('prodi')
        ]);

        alert()->success('Berhasil.', 'Data telah diubah!');
        return redirect()->to('dosen');
    }

    public function destroy($id)
    {
        Dosen::find($id)->delete();
        alert()->success('Berhasil.', 'Data telah dihapus!');
        return redirect()->route('dosen.index');
    }
}
