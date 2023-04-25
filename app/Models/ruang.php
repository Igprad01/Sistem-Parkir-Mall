<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ruang extends Model
{
    protected $table = 'ruang';
    protected $primary_key = 'id';
    protected $fillable = [
        'id','ruang','status'
    ];

     public function ptugasmasuk() {

        return $this->hasMany(ptugasmasuk::class, 'id_ruang');
    }

    public function arsip() {

        return $this->hasMany(arsip::class, 'id_ruang');
        
    }


    
}
