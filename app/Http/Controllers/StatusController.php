<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\karyawan;

class StatusController extends Controller
{
    public function ubah(Request $request)
    {
        $karyawan = \App\karyawan::find($request->id);

        if ($request->tipe == 'nonaktifkan') {
        	$karyawan->status = 'tidak aktif';	
        } else {
        	$karyawan->status = 'aktif';
        }
        $karyawan->update();

       return $request->tipe;
    }
    public function aktif($id)
    {
        $karyawan = \App\karyawan::find($id);
        $karyawan->status = 'aktif';
        $karyawan->update();

       return redirect('admin');
    }
}
