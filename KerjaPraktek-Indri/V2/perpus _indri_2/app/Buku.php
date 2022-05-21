<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Buku extends Model
{
    protected $table = 'buku';
    protected $fillable = ['judul', 'isbn', 'penerbit', 'pengarang', 'tahun_terbit', 'jumlah_buku', 'kategori_id', 'deskripsi', 'cover'];

    /**
     * Method One To Many 
     */
    public function transaksi()
    {
    	return $this->hasMany(Transaksi::class);
    }

    public function kategori()
    {
    	return $this->belongsTo(Kategori::class);
    }

    // public function kategori()
    // {
    // 	return $this->hasOne('App\Kategori', 'id', 'kategori_id');
    // }
    
}
