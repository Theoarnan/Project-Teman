<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    protected $table = 'transaksi';
    protected $fillable = ['kode_transaksi', 'mahasiswa_id', 'buku_id', 'tgl_pinjam', 'tgl_kembali', 'status', 'ket'];

    public function mahasiswa()
    {
    	return $this->belongsTo(Mahasiswa::class);
    }

    public function buku()
    {
    	return $this->belongsTo(Buku::class);
    }
}
