@extends('layout.main')
@section('content')
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
          <div class="col-sm-6">
            <h1 class="m-0 mb-3">Data Siswa</h1>
          </div>
        </div>
      <div class="p-3 bg-body rounded shadow-sm" >        
        <!-- FORM PENCARIAN -->
        <div class="pb-3 d-flex justify-content-between">
          <div>
              <a href='{{url('siswa/create')}}' class="btn btn-primary">+ Tambah Data</a>
          </div>
          <form class="d-flex" action="{{ url('siswa') }}" method="get">
              <div class="input-group" style="max-width: 300px;">
                <input class="form-control" type="search" name="katakunci" value="{{ Request::get('katakunci') }}" placeholder="Masukkan kata kunci" aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-secondary" type="submit">
                        <i class="fas fa-search"></i> Cari
                    </button>
                </div>
            </div>
          </form>
        </div>
      
        <div class="table-responsive">
          <table class="table table-bordered">
            <thead>
                <tr style="text-align: center;">
                    <th>No</th>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Alamat</th>
                    <th>Tanggal Lahir</th>
                    <th>Aksi</th>
                  </tr>
            </thead>
            <tbody>
                <?php $i = $data->firstItem() ?>
                @foreach ($data as $item)
                <tr style="text-align: center;">
                    <td>{{ $i }}</td>
                    <td>{{ $item->nama }}</td>
                    <td>{{ $item->email }}</td>
                    <td>{{ $item->alamat }}</td>
                    <td>{{date('d-m-y', strtotime($item->tgllhr))  }}</td>
                    <td style="text-align: center;">
                      <a href="{{ url('siswa/'.$item->id.'/edit') }}" class="btn btn-warning btn-sm " style="color: white;"><i class="fas fa-edit"></i> Edit</a>                    
                        <form onsubmit="return confirm('Yakin akan menghapus data?')" class="d-inline" action="{{ url('siswa/' .$item->id) }}" method="post">
                            @csrf
                            @method('DELETE')
                            <button type="submit" name="submit" class="btn btn-danger btn-sm"><i class="fas fa-trash" ></i> Delete</button>
                        </form>
                    </td>
                </tr>
                <?php $i++?>
                @endforeach
            </tbody>
        </table>
        </div>
        {{ $data->withQueryString()->links() }}
      </div>
    </div>
  </div>
@endsection