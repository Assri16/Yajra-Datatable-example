<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\jenisabsen;
use App\presensi;

class PresensiController extends Controller
{
     public function presensi()
    {
    	$hadir = DB::table('presensis')->where('id_jenispresensi', 1)->groupBy(DB::raw("MONTH(tanggalabsen)"))->count();
    	$outgoing = DB::table('presensis')->where('id_jenispresensi', 2)->groupBy(DB::raw("MONTH(tanggalabsen)"))->count();
    	$remote = DB::table('presensis')->where('id_jenispresensi', 3)->groupBy(DB::raw("MONTH(tanggalabsen)"))->count();
    	$lembur = DB::table('presensis')->where('id_jenispresensi', 4)->groupBy(DB::raw("MONTH(tanggalabsen)"))->count();
        $presensi = presensi::all();
        $jenisabsen = jenisabsen::all();

        return view('staff.presensi', compact('presensi','jenisabsen','hadir','outgoing','remote','lembur'));
    }

    public function store()
    {
	 presensi::create([
   
            'id_jenispresensi' => request('id_jenispresensi'),
            'jam_datang' => request('jam_datang'),
            'jam_pulang' => request('jam_pulang'),
            'deskripsi' => request('deskripsi'),
            'tempat' => request('tempat'),
        ]);
        
        return redirect()->route('');
    }
}
