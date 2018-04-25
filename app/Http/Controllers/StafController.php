<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use App\karyawan;

class StafController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //if request ajax ini fungsi nya, jika ada method ajax yang masuk ke route ini, maka di eksekusi disini
        //jadi disini manfaatnya, kita hanya pakai 1 route dan 1 controller. (khusus web non SPA)
        //mas kalau nambah button lagi di action ya tinggaldi return kan?
        //betul
        // diatasnya if itu ngga masalah kan?
        //begini sih

        //harus didefinisikan di  if  nya dulu ya mas?
        //iya bikin variable dulu buat nampung element nya, trus di dalam if nya dia ambil dari variable tadi
        //lanjut ya ?

        //lanjut
        //ada addColumn dan editColumn
        //addColumn itu contohnya seperti action dan tipe, karyawan ini juga. jadi dia gak ada di table database nya.
        //makanya kita bikin sebuah kolom dengan nama itu

        //kalo editcolumn, kita mengedit value dari sebuah field dari table nya. contoh begini
        //merubah  isi  dari coloumn itu ya mas?
        // iya

        //kalo addcolumn kita bikin kolom, yang mana tidak ada di table nya. seperti action tadi
        //->addIndexColumn()
        //ini buat bikin index kolom

          //->rawColumns(['karyawan','action'])
        //kalo yang ini, fungsi nya. susah dijelaskan. praktek nya gini wwkkw
        //me render html

        //ada yang bingung ?

        //orderable itu buat sortingnya kan mas?
        //iya
        //trus kemarin kan samean buat yang button 1 hide show kan. itu kenapa ngak dipake mas?

        //karena untuk table body / konten nya di handle di backend / di controller nya. diaddcolumn nya

        if($request->ajax())
        {
          $karyawan = karyawan::all();
          return Datatables::of($karyawan)
          //->editColumn('status',function($karyawan){
            //return $karyawan->status .' tes';
          //})
          ->addColumn('karyawan',function($karyawan){
            return "
                " . $karyawan->nama_karyawan . "<br>" . $karyawan->id_jabatan . "
            ";
          })
          ->addColumn('tipe', function(){
            return '';
          })
          //disini

          //jadi dia langsung baca, jika status nya aktif, maka muncul button nonaktif
          // kalo status nonaktif, maka tampil button aktif

          //saya searching dari kemarin nggak dapet mas tutorial kayak samean gini. wkwkwk  
          //kebanyakan ya kemarin itu pake onclick

          //iya karena kemarin kan handle body table nya di view, jadi kita ngatur nya disana
          //nah ini kita atur tombol nya dari controller.

          //setau saya caranya emang gini sih. karena yajra, konten nya dimainin di controller, jadi semua nya harus lewat controller sini
          //owalah gitu toh wkwkwk paham paham wes
          // make true itu biar kenapa mas 
          //gak tau, emang dari yajra nya gitu wrikwk

          // trus dia juga nggak perlu di compact kayak yang lain ya mas 
          // karna nggak ada tbody di htmlnya?

          //iya gak perlu tbody. jadi gak perlu compact. tapi kalau pengen passing variable dari controller ke view, ya tetep pake compact. tapi kalo table gak perlu di compact
          //compact kan melempar data dari controller ke view. sedangkan yajra ini mengambil data dari controller.

          //i see sekarang semakin jelas
          //dari tadi samean  coding aku nggak fokus mas. beh 


          ->addColumn('action', function($karyawan){
            $button = '
                <a href="" class="btn btn-primary">Ubah</a>
                <a href="" class="btn btn-warning">detail</a>
                <a href="" class="btn btn-success">Rekapitulasi</a>
            ';
            
            if ($karyawan->status == 'aktif') {
                return '
                    ' . $button . '
                    <button id="buttonnonaktif" class="btn btn-danger btn-sm" onclick="return confirm(&quot;Confirm Apakah anda ingin menonaktifkan karyawan?&quot;)">Non-aktifkan</button>
                ';
            } else {
                return '
                    ' . $button . '
                    <button id="buttonaktif" class="btn btn-success btn-sm" onclick="return confirm(&quot;Confirm Apakah anda ingin mengaktifkan karyawan?&quot;)">Aktifkan</button>
                ';
            }
          })
          ->addIndexColumn()
          ->rawColumns(['karyawan','action'])
          ->make(true);
        }

        return view('admin.daftarstaff');
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
    public function store(Request $request)
    {
        //
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
 
    }
}
