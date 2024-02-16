@extends('layout.main')
@section('content')
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
          <div class="col-sm-6">
            <h1 class="m-0 mb-3">Histori Presensi</h1>
          </div>
        </div>
      <div class="p-3 bg-body rounded shadow-sm" >
        <!-- FORM PENCARIAN -->
        <div class="pb-3 d-flex justify-content-between">
          <div>
            <form class="d-flex" action="{{ url('rekap') }}" method="get">
              <input class="form-control me-1" type="hidden" name="katakunci" value="{{ Request::get('katakunci') }}" placeholder="Masukkan kata kunci" aria-label="Search">
              <input type="hidden" name="filterBulan" value="{{ $filterBulan }}" >
              <input type="hidden" name="export" value="excel" >
              
              <select class="form-control" id="filter" onchange="ganti()" style="width: 150px">
                <option value="_ALL_">Semua</option>
              </select>
              <button class="btn btn-success" type="submit">Download</button>
          </form>
          </div>

          <form class="d-flex" action="{{ url('rekap') }}" method="get">
              <input class="form-control me-1" style="width: 190px" type="search" name="katakunci" value="{{ Request::get('katakunci') }}" placeholder="Masukkan kata kunci" aria-label="Search">
              <input type="hidden" name="filterBulan" value="{{ $filterBulan }}" >
              <div class="input-group-append">
                <button class="btn btn-secondary" type="submit">
                    <i class="fas fa-search"></i> Cari
                </button>
            </div>
          </form>
        </div>

        <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
        <script type="text/javascript">
            
            // Mendapatkan tanggal saat ini
            var currentDate = new Date();

            // Inisialisasi array untuk menyimpan nama bulan
            var monthNames = [
                "Januari", "Februari", "Maret",
                "April", "Mei", "Juni", "Juli",
                "Agustus", "September", "Oktober",
                "November", "Desember"
            ];

            // Inisialisasi array untuk menyimpan 12 bulan terakhir
            var last12Months = [];
            var flag = false

            // Loop untuk mendapatkan 12 bulan terakhir
            for (var i = 0; i < 12; i++) {
                // Menggunakan metode getMonth() untuk mendapatkan indeks bulan
                var monthIndex = currentDate.getMonth() - i;

                // Jika indeks bulan menjadi negatif, kita menggeser tahun ke belakang
                if (monthIndex < 0) {
                    monthIndex = 12 + monthIndex;
                    currentDate.setFullYear(currentDate.getFullYear());
                }

                // Menambahkan bulan ke dalam array
                var yr = currentDate.getFullYear()
                var mn1 = monthIndex + 1
                if((last12Months[i - 1] != null && last12Months[i - 1].index < mn1) || flag){
                  yr = yr - 1
                  flag = true
                }

                console.log(mn1)
                last12Months.push({
                    index: mn1, // Ditambah 1 karena indeks bulan dimulai dari 0
                    value: yr + "-" + ((mn1 < 10) ? "0" : "") + mn1,
                    name: monthNames[monthIndex],
                    year: yr
                });
            }

            // Menampilkan hasil
            console.log(last12Months);

            for(var j = 0; j < last12Months.length; j++){
              var selected = true
              if(last12Months[j].value == "{{ Request::get('katakunci') }}"){
                selected = false
              }
              var newOption = $('<option>', {
                value: last12Months[j].value,
                text: last12Months[j].name + " " + last12Months[j].year
              });
              $("#filter").append(newOption)
            }

            var selectedFilter = "{{ $filterBulan }}"
            console.log(selectedFilter)
            document.getElementById("filter").value = selectedFilter

            function ganti(){
              var bulan = $("#filter").val()
              console.log(bulan)
              // Mendapatkan URL saat ini
              var currentUrl = new URL(window.location.href);

              // Mendapatkan parameter kueri saat ini
              var queryParams = new URLSearchParams(currentUrl.search);

              // Menambah atau memperbarui parameter kueri
              queryParams.set('filterBulan', bulan);

              // Menetapkan parameter kueri yang telah diubah ke URL
              currentUrl.search = queryParams.toString();

              // Mereload halaman dengan URL yang telah diperbarui
              window.location.href = currentUrl.href;

            }

        </script>
        
        <!-- TOMBOL TAMBAH DATA -->
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
                <?php $i = $data->firstItem() ?>
                @foreach ($data as $item)
                <tr style="text-align: center;">
                    <td>{{ $i }}</td>
                    <td>{{ $item->tanggal }}</td>
                    <td>{{ $item->siswa_nama }}</td>
                    {{-- <td style="text-align: center;">
                      <a href="{{ url('siswa/'.$item->id.'/edit') }}" class="btn btn-warning btn-sm " style="color: white;"><i class="fas fa-edit"></i> Edit</a>
                    </td> --}}
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