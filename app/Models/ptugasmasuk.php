<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ptugasmasuk extends Model
{
   
    protected $table = 'ptugasmasuk';
    protected $primaryKey = 'id';
    protected $fillable = [
        'id','plat_nomor','tanggal_masuk','jam_masuk','id_ruang','biaya','menginap','tanggal_keluar','jam_keluar'];

    public function ruang() {

        return $this->belongsTo(ruang::class, 'id_ruang');
    }

}
