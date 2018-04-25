<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class jenisabsen extends Model
{
     protected $fillable = [
        'jenisabsen',
    ];

    public function presensi()
    {
        return $this->belongsTo('App\presensi', 'id_jenispresensi');
    }
}
