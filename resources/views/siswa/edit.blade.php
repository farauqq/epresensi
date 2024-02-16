@extends('layout.main')
@section('content')
{{-- @if ($errors->any())
    
@endif
<div class="pt-3">
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $item)
                <li>{{$item}}</li>
            @endforeach
        </ul>
    </div>
</div> --}}
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <!-- general form elements -->
            <div class="card">
              <div class="card-header" style="background-color: #0C4C93;">
                <h3 class="card-title" style="color: white">Edit Data Siswa</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
                <div class="card-body">
                  <form action="{{ url('siswa/' .$data->id) }}" method="post">
                    @method('PUT')
                    @csrf 
                  <div class="form-group">
                    <label>Nama</label>
                    <input type="text" id="nama" name="nama" value="{{ $data->nama }}" class="form-control" placeholder="Nama Lengkap" required>
                    {{-- <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email"> --}}
                  </div>
                  <div class="form-group">
                    <label>Email </label>
                    <input type="text" id="email" name="email" value="{{ $data->email }}" class="form-control" placeholder="Email" required>
                  </div>
                  <div class="form-group">
                    <label>Password</label>
                    <input type="password" id="password" name="password" class="form-control" placeholder="Password">
                    </div>
                  <div class="form-group">
                    <label>Alamat</label>
                    <textarea id="alamat" name="alamat" class="form-control" placeholder="Alamat" required>{{ $data->alamat }}</textarea>
                  </div>
                  <div class="form-group">
                    <label>Tanggal Lahir</label>
                    <input type="date" id="tgllhr" name="tgllhr" value="{{ $data->tgllhr }}" class="form-control" required>
                  </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Simpan</button>
                  <a href="{{Route('siswa.index')}}" class="btn btn-danger btn-xl " style="color: white;">Batal</a>                    
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
@endsection

