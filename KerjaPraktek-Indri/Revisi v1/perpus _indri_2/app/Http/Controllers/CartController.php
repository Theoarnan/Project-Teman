<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Buku;
use App\User;
use App\Cart;
use Carbon\Carbon;
use Session;
use Illuminate\Support\Facades\Redirect;
use Auth;
use DB;
use RealRashid\SweetAlert\Facades\Alert;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::user()->level == 'user') {
            Alert::info('Oopss..', 'Anda dilarang masuk ke area ini.');
            return redirect()->to('/');
        }
        $datas = Cart::get();
        return view('transaksi.cart', compact('datas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = Buku::where('id', $request->get('id'))->first();

        $id = DB::table('cart_buku')
            ->join('buku', 'cart_buku.id_buku', '=', 'buku.id')
            ->where('buku.isbn', $request->get('isbn'))
            ->select('buku.isbn', 'buku.*', 'cart_buku.*')
            ->get()->first();
        // Tabel Transaksi Baru
        if ($id != null) {
            if ($id->isbn == $request->get('isbn')) {
                Cart::where('id_buku', $request->get('id'))->update([
                    'qty' => $id->qty + $request->get('qty')
                ]);
                Buku::where('id', $request->get('id'))->update([
                    'jumlah_buku' => $data->jumlah_buku - $request->get('qty')
                ]);
            }
        } else {
            Cart::create([
                'id_buku' => $data->id,
                'id_kategori' => $data->kategori_id,
                'id_user' => Auth::user()->id,
                'qty' => $request->get('qty'),
            ]);

            Buku::where('id', $request->get('id'))->update([
                'jumlah_buku' => $data->jumlah_buku - $request->get('qty')
            ]);
        }
       
        // alert()->success('Berhasil.', 'Data telah ditambahkan!');
        // return view('transaksi.create');

        return response()->json([
            "data" => "sukses"
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {;
    }
    // $request->get('id')
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, Request $request)
    {

        $id_buku = Buku::where('id', $request->get('id_buku'))->get()->first();
        $id_cart = Cart::where('id_cart', $id)->get()->first();
        Buku::where('id', $request->get('id_buku'))->update([
            'jumlah_buku' => $id_buku->jumlah_buku + $id_cart->qty
        ]);
        Cart::where('id_cart', $id)->delete();
        alert()->success('Berhasil.', 'Data telah dihapus!');
        return response()->json([
            "data" => "sukses"
        ]);
    }
}
