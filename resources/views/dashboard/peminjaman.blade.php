
@extends('dashboard/layout')

@section('peminjaman','active')

@section('content')
    <!-- Content -->

    <div class="container-xxl flex-grow-1 container-p-y">
      <h4 class="fw-bold py-3 mb-4">
        <span class="text-muted fw-light">Menu /</span>
        Peminjaman
      </h4>
      <form action="/peminjaman" method="post">
        @csrf
      <div class="row">
        @if ($errors->any())
            <div class="alert alert-danger">
                    @foreach ($errors->all() as $error)
                        <p class="mb-1" style="line-height: initial;">{{ $error }}</p>
                    @endforeach
            </div>
        @endif
        <!-- Form controls -->
        <div class="col-md-6">
          <div class="card mb-4">
            <h5 class="card-header">Data Perkuliahan</h5>
            <div class="card-body">

              
              <div class="mb-3">
                <label for="prodi" class="form-label">PROGRAM STUDI</label>
                <select class="form-select" id="prodi" name="prodi" aria-label="Default select example" onchange="selectprodi(this)">
                  <option value="">-- Pilih Program Studi --</option>
                  <option value="44201">MATEMATIKA</option>
                  <option value="44202">STATISTIKA</option>
                  <option value="45201">KIMIA</option>
                  <option value="46201">BIOLOGI</option>
                  <option value="48201">FARMASI</option>
                  <option value="47201">FISIKA</option>
                  <option value="33201">GEOFISIKA</option>
                </select>
              </div>

              <div class="mb-3">
                <label for="matakuliah" class="form-label">MATA KULIAH</label>
                <input type="text" name="matakuliah" id="matakuliah" class="form-control text-uppercase">
                </select>
              </div>

              <div class="mb-3">
                <label for="dosen" class="form-label">DOSEN PENGAJAR</label>
                <input type="text" name="dosen" id="dosen" class="form-control text-uppercase">
              </div>

              <div class="mb-3">
                <label for="ruang" class="form-label">RUANG KULIAH</label>
                <select class="form-select" id="ruang" name="ruang">
                    <option value="">-- Pilih Ruang Kuliah --</option>
                    <option value="fm 01">FM 01</option>
                    <option value="fm 02">FM 02</option>
                    <option value="fm 03">FM 03</option>
                    <option value="fm 04">FM 04</option>
                    <option value="fm 05">FM 05</option>
                    <option value="fm 06">FM 06</option>
                    <option value="fm 07">FM 07</option>
                    <option value="fm 08">FM 08</option>
                    <option value="fm 09">FM 09</option>
                    <option value="fm 10">FM 010</option>
                    <option value="labmath">Labkom Matematika</option>
                    <option value="labstat">Labkom Statistika</option>
                    <option value="labter">Lab. Terapan</option>
                </select>
              </div>
            </div>
          </div>
        </div>
      
        <!-- Input Sizing -->
        <div class="col-md-6">
          <div class="card mb-4">
            <div class="card-body">
              <div class="mb-1">
                <label for="ruang" class="form-label">KODE INFOCUS</label>
                <select class="form-select" id="kode_infocus" name="kode_infocus" aria-label="Default select example">
                    <option value="">-- Pilih Kode Infocus --</option>
                    <option value="1">A</option>
                    <option value="2">B</option>
                    <option value="3">C</option>
                    <option value="4">D</option>
                    <option value="5">E</option>
                </select>
              </div>
            </div>
          </div>
          <div class="card mb-4">
            <h5 class="card-header">Data Peminjam</h5>
            <div class="card-body">

              <div class="mb-3">
                <label for="pengambil" class="form-label">Nama</label>
                <input id="pengambil" name="nama" class="form-control" type="text" placeholder="ex. Moh. Elon Musk">
              </div>

              <div class="mb-1">
                <label for="stambuk" class="form-label">NIM / Stambuk</label>
                <input id="stambuk" name="stambuk" class="form-control" type="text" placeholder="ex. G20122001">
              </div>

            </div>
          </div>
          <button type="button" class="btn btn-primary w-100" onclick="lanjutkan()">Pinjam</button>
        </div>
      
      
      </div>

      <input type="submit" value="submit" id="submit" hidden>
    </form>

    </div>
    <!-- / Content -->

     

<script>

function lanjutkan() {
    var prodi = document.getElementById('prodi').value ;
    var matakuliah = document.getElementById('matakuliah').value ;
    var dosen = document.getElementById('dosen').value ;
    var ruang = document.getElementById('ruang').value ;
    var pengambil = document.getElementById('pengambil').value ;
    var stambuk = document.getElementById('stambuk').value ;
    if (prodi === '') {
        alert("Pilih program studi terlebih dahulu.");
    } else {
        if (matakuliah === '') {
            alert("Isi mata kuliah terlebih dahulu.");
        } else {
            if (dosen === '') {
                alert("Isi dosen terlebih dahulu.");
            } else {
                if (ruang === '') {
                    alert("Pilih ruangan terlebih dahulu.");
                } else {
                    if (pengambil.length < 3) {
                        alert('Nama pengambil harus lebih dari 2 huruf.');
                    } else {
                        if (stambuk.length !== 9) {
                            alert('Stambuk harus sesuai format contoh: G20122001');
                        } else {
                            lanjutPinjam(prodi,matakuliah,dosen,ruang,pengambil,stambuk);
                        }
                    }
                }
            }
        }
    }
}

function lanjutPinjam(a,b,c,d,e,f) {
    document.getElementById('submit').click();
}

</script>

@endsection