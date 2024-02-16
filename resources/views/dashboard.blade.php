@extends('layout.main')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Dashboard</h1>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3>{{$ref_siswa}}</h3>
                <p>Total Siswa</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              <a class="small-box-footer"><i class="fas "></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                {{-- <h3>53<sup style="font-size: 20px">%</sup></h3> --}}
                <h3>{{$ref_today}}</h3>
                <p>Kunjungan Hari ini</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              <a class="small-box-footer"><i class="fas "></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3 style="color: white;">{{$ref_month}}</h3>
                <p style="color: white;">Kunjungan Bulan Ini</p>
              </div>
              <div class="icon">
                <i class="ion ion-pie-graph"></i>
              </div>
              <a class="small-box-footer" style="color: white !important;"><i class="fas "></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3>{{$ref_all}}</h3>
                <p>Total Kunjungan</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              <a class="small-box-footer"><i class="fas "></i></a>
            </div>
          </div>
        </div>
        <!-- Main row -->
        <div class="row">
          <section class="col-lg-7">
            <!-- Custom tabs (Charts with tabs)-->
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">
                  <i class="fas fa-qrcode mr-1"></i>
                  Scan Qr Code
                </h3>
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content p-0">
                  <!-- Morris chart - Sales -->
                  <div class="chart tab-pane active" id="revenue-chart" >
                      <div id="reader" style="position: relative" height= 600px;></div>
                   </div>
                </div>
              </div><!-- /.card-body -->
            </div>
            <!-- /.card -->
          </section>
          <section class="col-lg-5 ">
            <!-- Map card -->
            <div class="card bg-gradient-primary" >
              <div class="card-header border-0 d-flex justify-content-between">
                <h3 class="card-title">
                  <i class="fas fa-map-marker-alt mr-1"></i>
                  Visitors
                </h3>
                {{-- <p class="ml-auto">{{ date("d-m-Y H:i")}}</p> --}}
              </div>
              
              <div class="card-body">
                <div id="" style="height: 250px; width: 100%;">
                  <input type="hidden" id="result">
                  <h2 id="result2" style="color: white; font-family: 'Times New Roman', Times, serif; text-align: center;"></h2>                
                </div>
              </div>
            </div>
          </section>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>

  <form action="{{ url('absen') }}" method="post" style="display: none;" id="form-absen">
    @csrf 
    <input name="token" id="token">
    <button type="submit" style="display: none;"></button>
  </form>

<script src="https://unpkg.com/html5-qrcode" type="text/javascript"></script>
<script>
    var gToken


    function onScanSuccess(decodedText, decodedResult) {
    // handle the scanned code as you like, for example:
    // console.log(`Code matched = ${decodedText}`, decodedResult);
    $("#result").val(decodedText)
    console.log(decodedText)
    absen(decodedText)
  }

  function absen(decodedText){
    // document.getElementById("token").value = decodedText
    // console.log(document.getElementById("token").value)
    // //return
    // document.getElementById("form-absen").submit()

  fetch("{{ url('absen') }}", {
    method: 'POST',
    headers: {
      'Content-Type': 'application/json',
    },
    body: JSON.stringify({
      token: decodedText,
      _token: '{{ csrf_token() }}'
    }),
    })
    .then(response => {
      if(gToken == decodedText){
        // alert("Anda sudah memindai QR code tersebut")
        return
      }
      gToken = decodedText
      if (!response.ok) {
        throw new Error(`HTTP error! Status: ${response.status}`);
      }

      // Periksa kode status untuk menentukan sukses atau error
      if (response.status === 200) {
        return response.json().then(data => {
          console.log('Absen berhasil:', data.success);
          $("#result2").text(data.success[1])
        });
      }
      // else if (response.status === 400) {
      //   return response.json().then(data => {
      //     console.error('Kesalahan:', data.error);
      //     // Lakukan sesuatu dengan respons error
      //   });
      // }
    })
    .catch(error => {
      // Tangani kesalahan jika pengiriman gagal atau respons tidak dapat di-handle
      console.error('Ada kesalahan:', error);
  });


  }


  function onScanFailure(error) {
    // handle scan failure, usually better to ignore and keep scanning.
    // for example:
    console.warn(`Code scan error = ${error}`);
  }

  let html5QrcodeScanner = new Html5QrcodeScanner(
    "reader",
    { fps: 10, qrbox: {width: 250, height: 250} },
    /* verbose= */ false);
  html5QrcodeScanner.render(onScanSuccess, onScanFailure);
</script>
@endsection
