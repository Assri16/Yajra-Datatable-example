<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\jenisabsen;
use App\presensi;

class PresenceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $hadir = DB::table('presensis')->where('id_jenispresensi', 1)->count();
        // ->groupBy(DB::raw("MONTH(tanggalabsen)"))
        $outgoing = DB::table('presensis')->where('id_jenispresensi', 2)->count();
        $remote = DB::table('presensis')->where('id_jenispresensi', 3)->count();
        $lembur = DB::table('presensis')->where('id_jenispresensi', 4)->count();
        $sakit = DB::table('presensis')->where('sakit', 1)->count();
        $cuti = DB::table('presensis')->where('cuti', 1)->count();
        $presensi = presensi::all();
        $jenisabsen = jenisabsen::all();

        return view('staff.presensi', compact('presensi','jenisabsen','hadir','outgoing','remote','lembur','sakit','cuti'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
     presensi::create([
   
            'id_jenispresensi' => request('id_jenispresensi'),
            'jam_datang' => request('jam_datang'),
            'jam_pulang' => request('jam_pulang'),
            'deskripsi' => request('deskripsi'),
            'tempat' => request('tempat'),
        ]);
        
        return redirect()->route('staff.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
