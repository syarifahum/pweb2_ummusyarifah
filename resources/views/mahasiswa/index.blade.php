@extends('layout.home1')       
        <!-- START DATA -->
        @section('konten')
        <div class="my-3 p-3 bg-body rounded shadow-sm">
            <!-- FORM PENCARIAN -->
            <div class="pb-3">
              <form class="d-flex" action="{{url('mahasiswa')}}" method="get">
                  <input class="form-control me-1" type="search" name="katakunci" value="{{ Request::get('katakunci') }}" placeholder="Masukkan kata kunci" aria-label="Search">
                  <button class="btn btn-secondary" type="submit">Cari</button>
              </form>
            </div>
            
            <!-- TOMBOL TAMBAH DATA -->
            <div class="pb-4">
                @if(auth()->user()->is_admin==1)
              <a href='{{url('mahasiswa/create')}}' class="btn btn-primary">+ Tambah Data</a>
            </div>
            @endif
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th class="col-md-1">No</th>
                        <th class="col-md-2">NIM</th>
                        <th class="col-md-2">Nama</th>
                        <th class="col-md-2">Jenis Kelamin</th>
                        <th class="col-md-2">Tempat lahir</th>
                        <th class="col-md-2">Tanggal Lahir</th>
                        <th class="col-md-2">Jurusan</th>
                        <th class="col-md-2">Lama Studi</th>
                        <th class="col-md-2">IPK</th>
                        @if(auth()->user()->is_admin==1)
                        <th class="col-md-3">Aksi</th>
                        @endif
                    </tr>
                </thead>
                <tbody>
                    <?php $i= $data->firstItem() ?> 
                    @foreach ($data as $item)
                    <tr>
                        <td>{{ $i }}</td>
                        <td>{{ $item->nim}} </td>
                        <td>{{ $item->nama}}</td>
                        <td>{{ $item->jeniskelamin}}</td>
                        <td>{{ $item->tmptlhr}}</td>
                        <td>{{ $item->tgllhr}}</td>
                        <td>{{ $item->jurusan}}</td>
                        <td>{{ $item->lamastudi}}</td>
                        <td>{{ $item->ipk}}</td>
                        @if(auth()->user()->is_admin==1)
                        <td>
                            <a href='{{url('mahasiswa/'.$item->nim.'/edit')}}' class="btn btn-warning btn-sm">Edit</a>
                            <form onsubmit="return confirm('Yakin akan menghapus data??')" class="d-inline" action="{{url ('mahasiswa/'.$item->nim)}}" method="post">
                                @csrf
                                @method('DELETE')
                            <button type="submit" name="submit" class="btn btn-danger btn-sm">Del</button>
                            </form>
                           
                        </td>
                        @endif
                    </tr>  
                    <?php $i++ ?>
                    @endforeach
                   
                </tbody>
            </table>
        {{ $data->withQueryString()->links()}}   
      </div>
        @endsection
       
          <!-- AKHIR DATA -->
