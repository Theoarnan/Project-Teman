<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TransaksiItem extends Model
{
    //
    protected $table = 'transaksi_items';
    protected $fillable = ['id_transaksi', 'id_buku', 'id_kategori', 'qty', 'updated_at', 'created_at'];
}
