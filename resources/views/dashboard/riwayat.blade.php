
@extends('dashboard/layout')

@section('riwayat','active')

@section('content')
    <!-- Content -->

    <div class="container-xxl flex-grow-1 container-p-y">

      <h4 class="fw-bold py-3 mb-4">
        <span class="text-muted fw-light">Menu /</span>
        Riwayat
      </h4>

      @if (session()->has('success'))
          <div class="alert alert-primary alert-dismissible fade show" role="alert">
              {{ session('success') }}
          </div>
      @endif

      <div class="card">
        <div class="row">
          <div class="col-md-8"><h5 class="card-header">Riwayat Peminjaman</h5></div>
          <div class="col-md-4 d-flex justify-content-end">
            <a href="/export-excel"><button type="button" class="btn btn-primary m-3">Export XLS</button></a>
          </div>
        </div>
        <div class="table-responsive text-wrap">
          <table class="table">
            <thead>
              <tr>
                <th>Prodi</th>
                <th>Mata Kuliah</th>
                <th>Dosen</th>
                <th>Ruang</th>
                <th>Waktu Pinjam</th>
                <th>Waktu Kembali</th>
                <th>Peminjam</th>
                <th>Stambuk</th>
                <th>Kelengkapan</th>
              </tr>
            </thead>
            <tbody class="table-border-bottom-0">
              
              @foreach($peminjaman as $pinjam)
              <tr>
                <td>{{ ucwords($pinjam->programstudi->nama) }}</td>
                <td>{{ ucwords($pinjam->matakuliah) }}</td>
                <td>{{ ucwords($pinjam->dosen) }}</td>
                <td><span class="badge bg-label-primary me-1">{{ $pinjam->ruang }}</span></td>
                <td>{{ $pinjam->created_at }}</td>
                <td>{{ $pinjam->waktu_pengembalian }}</td>
                <td>{{ ucwords($pinjam->nama) }}</td>
                <td>{{ ucwords($pinjam->stambuk) }}</td>
                
                <td>
                  @if ($pinjam->item_infocus === 1)
                      <span class="badge bg-label-primary me-1">INF</span>
                  @endif
                  @if ($pinjam->item_power === 1)
                      <span class="badge bg-label-primary me-1">PWR</span>  
                  @endif
                  @if ($pinjam->item_hdmi === 1)
                  <span class="badge bg-label-primary me-1">HDMI</span>
                  @endif
                  @if ($pinjam->item_cok === 1)
                      <span class="badge bg-label-primary me-1">COK</span>
                  @endif
                  @if ($pinjam->item_penyangga === 1)
                      <span class="badge bg-label-primary me-1">PNY</span>
                  @endif
                </td>
              </tr>
              @endforeach
              @if (count($peminjaman) == 0)
                  <tr>
                    <td colspan="8" class="text-center">Belum ada riwayat peminjaman.</td>
                  </tr>
              @endif
            </tbody>
          </table>
          <div class="m-3">
            {{ $peminjaman->links() }}
          </div>
        </div>
        
      </div>


    </div>
    <!-- / Content -->

@endsection