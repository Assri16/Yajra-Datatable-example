@extends('layouts.app')

       
@section('content')


    
     <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-lg-2 col-xs-2">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3>{{$hadir}}</h3>

              <p>Hadir</p>
            </div>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-2 col-xs-2">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <h3>{{$lembur}}</h3>

              <p>Jam Lembur</p>
            </div>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-2 col-xs-2">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
              <h3>{{$remote}}</h3>

              <p>Hari Remote</p>
            </div>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-2 col-xs-2">
          <!-- small box -->
          <div class="small-box bg-red">
            <div class="inner">
              <h3>{{$outgoing}}</h3>

              <p>Kali Outgoing</p>
            </div>
          </div>
        </div>
        <div class="col-lg-2 col-xs-2">
          <!-- small box -->
          <div class="small-box bg-blue">
            <div class="inner">
              <h3>{{$sakit}}</h3>

              <p>Sakit</p>
            </div>
          </div>
        </div>
        <div class="col-lg-2 col-xs-2">
          <!-- small box -->
          <div class="small-box bg-orange">
            <div class="inner">
              <h3>{{$cuti}}</h3>

              <p>Kali Cuti Selama Setahun</p>
            </div>
          </div>
        </div>
           <section class="content-header">
      <h1>
        ISI PRESENSI
      </h1>
      
    </section>
        <!-- ./col -->
      </div>
      <!-- /.row -->
      <!-- Main row -->
      <div class="row">
        <!-- Left col -->
        <section class="col-lg-7 connectedSortable">
          <!-- Custom tabs (Charts with tabs)-->
        <div class="box box-solid bg-green-gradient">
            <div class="box-header">
              <i class="fa fa-calendar"></i>

              <h3 class="box-title">Calendar</h3>
              <!-- tools box -->
              <div class="pull-right box-tools">
                <!-- button with a dropdown -->
                <div class="btn-group">
                  <button type="button" class="btn btn-success btn-sm dropdown-toggle" data-toggle="dropdown">
                    <i class="fa fa-bars"></i></button>
                  <ul class="dropdown-menu pull-right" role="menu">
                    <li><a href="#">Add new event</a></li>
                    <li><a href="#">Clear events</a></li>
                    <li class="divider"></li>
                    <li><a href="#">View calendar</a></li>
                  </ul>
                </div>
                <button type="button" class="btn btn-success btn-sm" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-success btn-sm" data-widget="remove"><i class="fa fa-times"></i>
                </button>
              </div>
              <!-- /. tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body no-padding">
              <!--The calendar -->
              <div id="calendar" style="width: 100%"></div>
            </div>
            <!-- /.box-body -->
            <div class="box-footer text-black">
              <div class="row">
                <div class="col-sm-6">
                  <!-- Progress bars -->
                  <div class="clearfix">
                    <span class="pull-left">Task #1</span>
                    <small class="pull-right">90%</small>
                  </div>
                  <div class="progress xs">
                    <div class="progress-bar progress-bar-green" style="width: 90%;"></div>
                  </div>

                  <div class="clearfix">
                    <span class="pull-left">Task #2</span>
                    <small class="pull-right">70%</small>
                  </div>
                  <div class="progress xs">
                    <div class="progress-bar progress-bar-green" style="width: 70%;"></div>
                  </div>
                </div>
                <!-- /.col -->
                <div class="col-sm-6">
                  <div class="clearfix">
                    <span class="pull-left">Task #3</span>
                    <small class="pull-right">60%</small>
                  </div>
                  <div class="progress xs">
                    <div class="progress-bar progress-bar-green" style="width: 60%;"></div>
                  </div>

                  <div class="clearfix">
                    <span class="pull-left">Task #4</span>
                    <small class="pull-right">40%</small>
                  </div>
                  <div class="progress xs">
                    <div class="progress-bar progress-bar-green" style="width: 40%;"></div>
                  </div>
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->
            </div>
          </div>
        
      
          <!-- /.nav-tabs-custom -->
        </section>
        <!-- /.Left col -->
        <!-- right col (We are only adding the ID to make the widgets sortable)-->
        <section class="col-lg-5 connectedSortable">

          <!-- Map box -->
          <form method="post"  action="{{url('staff')}}">
                {{csrf_field()}}
                 
                <div class="form-group">
                  <label class="col-md-5 control-label" for="email">Jenis Absen</label>
                  <div class="col-md-7">
                    <select  onchange="yesnoCheck(this);" name="id_jenispresensi" id="" class="form-control">
                       <option 
                            value="1">Hadir</option>
                            <option 
                            value="2">Outgoing</option>
                            <option 
                            value="3">Remote</option>
                            <option 
                            value="4">Lembur</option>
                        </select>
                  </div>
                </div><br><br>
                <div class="form-group">
                  <label class="col-md-5 control-label" for="message">Jam Datang</label>
                  <div class="col-md-7">
                  <input id="iftidak" name="jam_datang" placeholder="07:00 AM" class="form-control" type="time"> 
                  </div>
                </div><br><br>
                <div class="form-group">
                  <label class="col-md-5 control-label" for="message">Jam Pulang</label>
                  <div class="col-md-7">
                  <input id="ifYa" name="jam_pulang" placeholder="04:00 PM" class="form-control" type="time"> 
                  </div>
                </div><br><br>
                <div class="form-group">
                  <label class="col-md-5 control-label" for="message">Deskripsi</label>
                  <div class="col-md-7">
                  <textarea id="ifNo" class="form-control" name="deskripsi" placeholder="Deskripsi" rows="5"></textarea>
                  </div>
                </div><br><br><br></br><br>
                 <div class="form-group" id="tempat" style="display: none;">
                 
                  <label class="col-md-5 control-label" for="message">Tempat</label>
                  <br>
                  <div class="col-md-7">
                 <input id="ifYes" name="tempat"  class="form-control" type="text"> 
                  </div>
                </div><br>
                <div class="row">
                  <br>
                <div class="col-md-5"></div>
                <div class="form-group col-md-4">
                    <button type="submit" class="btn btn-success" style="margin-left:38px">Simpan</button>
                </div>
            </div>
    </div><!--/-->
               
                
            </form>
          <!-- /.box -->
          <!-- /.box -->

        </section>
        <!-- right col -->
      </div>
      <!-- /.row (main row) -->

  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
   
<script type="text/javascript">

  (function() {
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>
<script>
    function yesnoCheck(that) {
        if (that.value == "2") {
          document.getElementById("tempat").style.display = "block";

        } else {
           document.getElementById("tempat").style.display = "none";
        }
    }
</script>

@endsection
