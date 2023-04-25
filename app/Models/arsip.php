<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class arsip extends Model
{
    protected $table = 'arsip';
    protected $primary_key = 'id';
    protected $fillable = ['id','plat_nomor','tanggal_masuk','jam_masuk','id_ruang','status','biaya','menginap','tanggal_keluar','jam_keluar'];

    public function ruang() {

        return $this->belongsTo(ruang::class, 'id_ruang');
    }
}

