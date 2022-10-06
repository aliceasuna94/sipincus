
@extends('dashboard/layout')

@section('dashboard','active')

@section('content')
    <!-- Content -->

    <div class="container-xxl flex-grow-1 container-p-y">


      <div class="row">

        <div >
          <div class="card">
            <div class="d-flex align-items-end row">
              <div class="col-sm-7">
                <div class="card-body">
                  <h5 class="card-title text-primary">Selamat Datang Calon Sarjana! 🎉</h5>
                  <p class="mb-4">
                    Sipincus adalah Sistem Peminjaman Infocus untuk Mahasiswa Jurusan Matematika FMIPA Universitas Tadulako. Sebelum anda meminjam Infocus / Proyektor, mahasiswa <span class="fw-bold">wajib</span> mengisi formulir peminjaman setiap matakuliah. 
                  </p>

                  <a href="/peminjaman" class="btn btn-sm btn-outline-primary">Pinjam Sekarang</a>
                </div>
              </div>
              <div class="col-sm-5 text-center text-sm-left">
                <div class="card-body pb-0 px-0 px-md-4">
                  <img
                    src="img/illustrations/man-with-laptop-light.png"
                    height="140"
                    alt="View Badge User"
                    data-app-dark-img="illustrations/man-with-laptop-dark.png"
                    data-app-light-img="illustrations/man-with-laptop-light.png"
                  />
                </div>
              </div>
            </div>
          </div>
        </div>


      </div>


    </div>
    <!-- / Content -->

@endsection