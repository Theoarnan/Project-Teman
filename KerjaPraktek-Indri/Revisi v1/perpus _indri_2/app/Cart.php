<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    //
    protected $table = 'cart_buku';
    protected $fillable = ['id_buku', 'id_kategori', 'qty', 'id_user'];

}
