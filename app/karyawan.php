<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class karyawan extends Model
{
   protected $fillable = [
        'nama_karyawan',
        'username',
        'password',
        'email',
        'no_hp',
        'no_identitas',
        'id_jabatan',
        'id_departemen',
        'status',

    ];
}
