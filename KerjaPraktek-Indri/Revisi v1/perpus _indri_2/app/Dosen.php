<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dosen extends Model
{
    protected $table = 'dosens';
    protected $fillable = ['id', 'nidn', 'nama', 'tempat_lahir', 'tgl_lahir', 'jk', 'prodi'];

    public function transaksi()
    {
        return $this->hasMany(Transaksi::class);
    }
}
