<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    protected $table = 'transaksis';
    protected $fillable = ['kode_transaksi', 'mahasiswa_id', 'dosen_id', 'buku_id', 'denda', 'tgl_pinjam', 'tgl_kembali', 'tgl_pengembalian', 'terlambat', 'status', 'ket'];

    public function mahasiswa()
    {
        return $this->belongsTo(Mahasiswa::class);
    }

    public function dosen()
    {
        return $this->belongsTo(Dosen::class);
    }

    public function buku()
    {
        return $this->belongsTo(Buku::class);
    }
}
