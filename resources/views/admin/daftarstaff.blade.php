@extends('layouts.app')

       
@section('content')
    <!-- ini juga wajib, meta name="_token" -->
    <meta name="_token" content="{!! csrf_token() !!}"/>
    <section class="content-header">
      <h1>
        DAFTAR STAFF
      </h1>
      <br>
      <section>
        <div class="row">
                            <div class="col-md-12">
                                <div class="box box-default collapsed-box box-solid">
                                    <div class="box-header with-border">
                                        <h3 class="box-title">Pencarian</h3>

                                        <div class="box-tools pull-right">
                                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i>
                                            </button>
                                        </div>
                                        <!-- /.box-tools -->
                                    </div>
                                    <!-- /.box-header -->
                                    <div class="box-body">
                                        <form method="GET" action="http://localhost/presensi2/public/admin" accept-charset="UTF-8" class="form-horizontal" role="search" style="margin-right: 0px">
                                           <div class="form-group">
                                                <label for="name" class="col-md-4 control-label">Status</label>
                                                <div class="col-md-6">
                                                    <select name="location_id" class="form-control js-example-basic-single" style="width: 100%">
                                                        <option value="">-=Status=-</option>
                                                        <option value="1">Aktif</option>
                                                        <option value="2">Tidak Aktif</option>
                                                      </select>                                     
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="name" class="col-md-4 control-label">Tipe Staff</label>
                                                <div class="col-md-6">
                                                    <select name="city_id" class="form-control js-example-basic-single" style="width: 100%">
                                                        <option value="">-=Tipe Staff=-</option>
                                                         <option value="1">Permanen</option>
                                                        <option value="2">Kontrak</option>
                                                         <option value="3">Magang</option>
                                                        <option value="4">Paruh Waktu</option>
                                                                                                                    
                                                                                                            </select>                                     
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="name" class="col-md-4 control-label">Departemen</label>
                                                <div class="col-md-6">
                                                    <select name="city_id" class="form-control js-example-basic-single" style="width: 100%">
                                                        <option value="">-=Departemen=-</option>
                                                                                                                    
                                                                                                            </select>                                     
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <div class="col-md-offset-4 col-md-4">
                                                    <button class="btn btn-primary" type="submit">
                                                        <i class="fa fa-search"></i> Cari
                                                    </button>
                                                </div>
                                            </div>

                                        </form>
                                    </div>
                                </div>
                            </div>
      </section>
      <br>
      <section>
        <div>
                            <div class="col-md-6">
                                                             <a  href="" class="btn btn-success " title="Tambah ">
                                    <i class="fa fa-plus" aria-hidden="true"></i> Tambah
                                </a> 
      </section>
      <br>
      <br>
      <br>
      <section>
        <div class="box-body">
          
        </div>
      </section>
    </section>

 <section>
        <div class="box-body">
          <!-- kalau pake yajra datatable, kita gak perlu bikin body table nya. jadi cuma <thead> aja
            body nya nanti diatur sama controller nya.
             Dan <th> nya juga harus cocok jumlah nya. sama dengan columns di javascript datatable nya 
              di columns ada 6 array. maka <th> di <thead> nya juga harus ada 6. kalo ga cocok. pasti ada error

                setelah thead udah siap. langsung bikin controller nya
          -->
          <table  id="percobaan" class="table table-bordered table-striped">
            <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama<br>(Job Title)</th>
                                        <th>Tipe</th>
                                        <th>Departemen</th>
                                        <th>Status</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                
          </table>
        </div>
      </section>
<script type="text/javascript">
  //ajaxsetup ini wajib, biar gak error kena csrf nya
$.ajaxSetup({
     headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
  });

//ini oTable  udah paham insya allah
        var oTable = $('#percobaan').DataTable({
            processing: true,
            serverSide: true,
            ajax: {
                url: '{{ url("admin") }}'
                method: "POST",
                data: function(d){
                  d.status = $("#status").val();
                  d.id_tipe = $("#id_tipe").val();
                  d.id_departemen = $("#id_departemen").val();
                }
            },
            columns: [
                { data: "DT_Row_Index", name: "DT_Row_Index", orderable: true },
                {data: 'karyawan', name: 'karyawan'}, //ini kan seharusnya dibawahnya ada jabatan mas  kayak berada disatu kolom nah itu di data sini gimana? 
                {data: 'tipe', name: 'tipe'},
                {data: 'id_departemen', name: 'id_departemen'},
                {data: 'status', name: 'status'},
                {data: 'action', name: 'action' , orderable: false , searchable: false},
            ],
        });

    var data;

//dibawah ini fungsi nya dia. ketika table percobaan di klik, trus dia juga mengecek, element mana yang di click. 
//dalam hal ini #buttonnonaktif yang di klik
//maka variable data nya diisi satu data row penuh. untuk cek nya nanti bisa di console.log (data) aja
    $("#percobaan").on('click','#buttonnonaktif',function(){
      data = oTable.row($(this).parents('tr')).data() // ini mengambil data dari tombol yang di klik
      changeStatus(data.id, 'nonaktifkan') // jalankan fungsi changestatus dengan parameter id dan tipe
    })

//ini deteksi tombol button aktif di tablenya
    $("#percobaan").on('click','#buttonaktif',function(){
      data = oTable.row($(this).parents('tr')).data()
      changeStatus(data.id, 'aktifkan')
    })


//fungsi post data
    function changeStatus(id, tipe) {
      $.ajax({
        type: "POST",
        url: "admin",
        data: { 
          id: id,
          tipe: tipe
        },
        datatype: "text",
        success: function (response) {
          //jika data berhasil di proses, maka table nya di refresh
          oTable.ajax.reload()
        }
      })
    }

</script>
@endsection