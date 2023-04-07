@extends('layout.basic')    
<!-- START FORM -->
@section('konten')
 

      <form action='{{url('mahasiswa')}}' method='post'>
        @csrf
        <div class="my-3 p-3 bg-body rounded shadow-sm">
            <a href='{{url('mahasiswa')}}' class="btn btn-secondary"><< kembali </a>
            <div class="mb-3 row">
                <label for="nim" class="col-sm-2 col-form-label">NIM</label>
                <div class="col-sm-10">
                    <input type="number" class="form-control" name='nim' value="{{ Session::get('nim')}}" id="nim">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name='nama' value="{{ Session::get('nama')}}" id="nama">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="jurusan" class="col-sm-2 col-form-label">Jenis Kelamin</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name='jeniskelamin' value="{{ Session::get('jeniskelamin')}}" id="jeniskelamin">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="nama" class="col-sm-2 col-form-label">Tempat Lahir</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name='tmptlhr' value="{{ Session::get('tmptlhr')}}" id="tmptlhr">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="nama" class="col-sm-2 col-form-label">Tanggal Lahir</label>
                <div class="col-sm-10">
                    <input type="date" class="form-control" name='tgllhr' value="{{ Session::get('tgllhr')}}" id="tgllhr">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="nama" class="col-sm-2 col-form-label">Jurusan</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name='jurusan' value="{{ Session::get('jurusan')}}" id="jurusan">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="nama" class="col-sm-2 col-form-label">Lama Studi</label>
                <div class="col-sm-10">
                    <input type="number" class="form-control" name='lamastudi' value="{{ Session::get('lamastudi')}}" id="lamastudi">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="nama" class="col-sm-2 col-form-label">IPK</label>
                <div class="col-sm-10">
                    <input type="decimal" class="form-control" name='ipk' value="{{ Session::get('ipk')}}" id="ipk">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="jurusan" class="col-sm-2 col-form-label"></label>
                <div class="col-sm-10"><button type="submit" class="btn btn-primary" name="submit">SIMPAN</button></div>
            </div>
        </div>
    </form>
@endsection
        <!-- AKHIR FORM -->