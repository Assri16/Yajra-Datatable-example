<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class presensi extends Model
{
    protected $fillable = [
        
        'id_jenispresensi',
        'jam_datang',
        'jam_pulang',
        'deskripsi',
        'tempat',

    ];
     
        public function jenisabsen()
    {
        return $this->belongsTo('App\jenisabsen', 'id');
    }
 public function scopejenisabsen($query, $id_jenisabsen)
    {
        return $query->where('id_jenispresensi', $id_jenispresensi);
    }
}
