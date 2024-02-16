@extends('layout.main')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      
    </section>
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-3">
            <div class="card card-widget widget-user">
              <!-- Add the bg color to the header using any of the bg-* classes -->
              <div class="widget-user-header text-white"
                   style="background: url('{{asset('adminLTE/dist/img/lib2.jpg') }}')  center center; background-size: 100%;">
                <h5 class="widget-user-desc text-center" style="color: black;" ><strong>PERPUSTAKAAN<br> SMA N 1 MEJOBO</strong></h5>
              </div>
              <div class="widget-user-image">
                <img class="img-circle" src="{{asset('adminLTE/dist/img/ab.png') }}" alt="User Avatar">
              </div>
              <div class="card-footer">
                <div class="card-content text-center" >
                  <h3><strong>{{ $data->nama }}</strong></h3>
                  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" style="margin-bottom: 50px;">
                    Lihat Qr Code
                  </button>
                </div>
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel"></h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                        <div class="visible-print text-center">
                          {{-- {!! QrCode::size(200)->generate(Request::url()); !!} --}}
                          {!! QrCode::size(200)->generate($code); !!}
                          <p>Arahkan pada scanner</p>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
          <div class="col-md-9">
            <div class="card">
              <div class="card-body">
                <div class="tab-content">
                  <!-- /.tab-pane -->

                  <div id="settings">
                    <form action="{{ url('siswa/' .$data->id) }}" method="get" class="form-horizontal">
                      @method('PUT')
                      @csrf 
                      <div class="form-group row" style="margin-top: 30px;">
                        <label class="col-sm-2 col-form-label">Nama</label>
                        <div class="col-sm-10">
                          <div id="nama" name="nama" class="form-control">{{ $data->nama }}</div>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
                        <div class="col-sm-10">
                          <div id="email" name="email" class="form-control">{{ $data->email }}</div>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputName2" class="col-sm-2 col-form-label">Alamat</label>
                        <div class="col-sm-10">
                          <div id="alamat" name="alamat" class="form-control">{{ $data->alamat }}</div>
                        </div>
                      </div>
                      <div class="form-group row" style="margin-bottom: 55px;">
                        <label for="inputSkills" class="col-sm-2 col-form-label">Tanggal Lahir</label>
                        <div class="col-sm-10">
                          <div class="form-control" id="tgllhr" name="tgllhr" >{{date('d-m-y', strtotime($data->tgllhr))  }}</div>
                        </div>
                      </div>
                    </form>
                  </div>
                  <!-- /.tab-pane -->
                </div>
                <!-- /.tab-content -->
              </div><!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->

        @if(Session::get("siswa")->role == "siswa")
        <div class="card">
          <div class="card-header">
            <h5 class="card-title"><strong>Histori Presensi</strong></h5>
          </div>
            <div class="table-responsive">
              <table class="table table-bordered">
                <thead>
                    <tr style="text-align: center;">
                        <th>No</th>
                        <th>Tanggal</th>
                        <th>Nama</th>
                      </tr>
                </thead>
                <tbody>
                    <?php $i = $absen->firstItem() ?>
                    @foreach ($absen as $item)
                    <tr style="text-align: center;">
                        <td>{{ $i }}</td>
                        <td>{{ $item->tanggal }}</td>
                        <td>{{ $item->siswa_nama }}</td>
                    </tr>
                    <?php $i++?>
                    @endforeach
                </tbody>
            </table>
            </div>
            {{ $absen->withQueryString()->links() }}
          </div>
        </div>
        @endif
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
@endsection