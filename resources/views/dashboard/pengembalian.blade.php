
@extends('dashboard/layout')

@section('pengembalian','active')

@section('content')
    <!-- Content -->

    <div class="container-xxl flex-grow-1 container-p-y">
      <h4 class="fw-bold py-3 mb-4">
        <span class="text-muted fw-light">Menu /</span>
        Pengembalian
      </h4>
      @if ($errors->any())
            <div class="alert alert-danger">
                    @foreach ($errors->all() as $error)
                        <p class="mb-1" style="line-height: initial;">{{ $error }}</p>
                    @endforeach
            </div>
      @endif
      @if (session()->has('success'))
        <div class="alert alert-primary alert-dismissible fade show" role="alert">
            {{ session('success') }}
        </div>
      @endif
      <div class="card">
        <h5 class="card-header">Semua Peminjaman</h5>
        <div class="table-responsive text-wrap">
          <table class="table">
            <thead>
              <tr>
                <th>Prodi</th>
                <th>Mata Kuliah</th>
                <th>Dosen</th>
                <th>Waktu Peminjaman</th>
                <th>Infocus</th>
                <th>Peminjam</th>
                <th>Ruang</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody class="table-border-bottom-0">
              
              @foreach($peminjaman as $pinjam)
              <tr>
                <td>{{ ucwords($pinjam->programstudi->nama) }}</td>
                <td><strong>{{ ucwords($pinjam->matakuliah) }}</strong></td>
                <td>{{ ucwords($pinjam->dosen) }}</td>
                <td>{{ $pinjam->created_at }}</td>
                <td class="text-center">{{ $pinjam->kode_infocus }}</td>
                <td>{{ ucwords($pinjam->nama) }}</td>
                
                <td><span class="badge bg-label-primary me-1">{{ $pinjam->ruang }}</span></td>
                <td>
                  <button type="button" class="btn btn-sm btn-primary" onclick="kembalikan('{{$pinjam->id}}')">KEMBALIKAN</button>
                </td>
              </tr>
              @endforeach
              @if (count($peminjaman) == 0)
                  <tr>
                    <td colspan="8" class="text-center">Tidak ada infocus terpakai.</td>
                  </tr>
              @endif

            </tbody>
          </table>
        </div>
      </div>


    </div>
    <!-- / Content -->

  <form action="/pengembalian" method="post">
    @csrf
    <!-- / POPUP -->
    <div class="mt-3">
      <button class="btn btn-primary" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasEnd" aria-controls="offcanvasEnd" style="visibility: hidden;" id="tampilkantoggle">Toggle End</button>
      <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasEnd" aria-labelledby="offcanvasEndLabel" style="visibility: hidden;" aria-hidden="true">
        <div class="offcanvas-header">
          <h5 id="offcanvasEndLabel" class="offcanvas-title">Konfirmasi Pengembalian !</h5>
          <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body my-auto mx-0 flex-grow-0">
          <div class="card mb-4">
            <h5 class="card-header">Kelengkapan Barang</h5>
            <!-- Checkboxes and Radios -->
            <div class="card-body">
              <div class="row gy-3">
                <div class="col-md">
                  <small class="text-light fw-semibold">Centang Barang Kembali</small>

                  <div class="form-check mt-3">
                    <input class="form-check-input" type="checkbox" value="1" name="item_infocus" id="defaultCheck1">
                    <label class="form-check-label" for="defaultCheck1">
                      Infocus
                    </label>
                  </div>

                  <div class="form-check mt-3">
                    <input class="form-check-input" type="checkbox" value="1" name="item_power" id="defaultCheck2">
                    <label class="form-check-label" for="defaultCheck2">
                      Kabel Power
                    </label>
                  </div>

                  <div class="form-check mt-3">
                    <input class="form-check-input" type="checkbox" value="1" name="item_hdmi" id="defaultCheck3">
                    <label class="form-check-label" for="defaultCheck3">
                      Kabel Konektor / HDMI
                    </label>
                  </div>

                  <div class="form-check mt-3">
                    <input class="form-check-input" type="checkbox" value="1" name="item_cok" id="defaultCheck4">
                    <label class="form-check-label" for="defaultCheck4">
                      Kabel Colokan / Cok
                    </label>
                  </div>

                  <div class="form-check mt-3">
                    <input class="form-check-input" type="checkbox" value="1" name="item_penyangga" id="defaultCheck5">
                    <label class="form-check-label" for="defaultCheck5">
                      Besi Penyangga Infocus
                    </label>
                  </div>
                  
                </div>

              </div>
            </div>
            <hr class="m-0">
            <!-- Inline Checkboxes -->
            <div class="card-body">
              <div class="row gy-3">
                <div class="col-md">
                  <small class="text-light fw-semibold d-block">Konfirmasi ?</small>
                  <div class="form-check form-check-inline mt-3">
                    <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1">
                    <label class="form-check-label" for="inlineCheckbox1">Saya telah mencentang dan memastikan kelengkapan infokus dengan benar.</label>
                  </div>

                </div>
                
              </div>
            </div>
            <hr class="m-0">
            
          </div>

          <button type="button" class="btn btn-primary mb-2 d-grid w-100" onclick="lanjutKembalikan()">Continue</button>
          <button type="button" class="btn btn-label-secondary d-grid w-100" data-bs-dismiss="offcanvas">Cancel</button>

        </div>
      </div>
    </div>
    <input type="hidden" name="id" id="uid">
    <input type="submit" value="" id="buttonpengembalian" hidden>
  </form>

    <script>
      function kembalikan(e) {
        document.getElementById("defaultCheck1").checked = false;
        document.getElementById("defaultCheck2").checked = false;
        document.getElementById("defaultCheck3").checked = false;
        document.getElementById("defaultCheck4").checked = false;
        document.getElementById("defaultCheck5").checked = false;
        document.getElementById("uid"). value = e;

        document.getElementById("tampilkantoggle").click();
      }

      function lanjutKembalikan() {

        var konfirmasi =  document.getElementById("inlineCheckbox1").checked;
        var inf =  document.getElementById("defaultCheck1").checked;
        console.log(konfirmasi);

        if (konfirmasi === false) {
           alert("Harap centang konfirmasi!");
        } else {
           if (inf === false) {
            alert("Harap Centang Infocus !");
           } else {
            document.getElementById("buttonpengembalian").click();
           }
        }
        
      }
    </script>
@endsection