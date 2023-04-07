<?php

namespace App\Http\Controllers;

use App\Models\mahasiswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class mahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $katakunci = $request->katakunci;
        $jumlahbaris = 10;
        if(strlen($katakunci)){ //pencarian
            $data = mahasiswa::where('nim','like',"%$katakunci%")
            ->orWhere('nama','like',"%$katakunci%")
            ->orWhere('jurusan','like',"%$katakunci%")
            ->paginate($jumlahbaris); //halaman
        }else{
            $data=mahasiswa::orderBy('nim','desc')->paginate($jumlahbaris);
        }
       
        return view('mahasiswa.index')->with('data',$data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('mahasiswa/create');
    }

   
    /**
     * Store a newly created resource in storage.
     *  @param \Illumiate\Http\Request
   * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Session::flash('nim',$request->nim);
        Session::flash('nama',$request->nama);
        Session::flash('jeniskelamin',$request->jeniskelamin);
        Session::flash('tmptlhr',$request->tmptlhr);
        Session::flash('tgllhr',$request->tgllhr);
        Session::flash('jurusan',$request->jurusan);
        Session::flash('lamastudi',$request->lamastudi);
        Session::flash('ipk',$request->ipk);
        
        $request->validate([
            'nim'=>'required|numeric|unique:mahasiswa,nim',
            'nama'=>'required',
            'jeniskelamin'=>'required',
            'tmptlhr'=>'required',
            'tgllhr'=>'required',
            'jurusan'=>'required',
            'lamastudi'=>'required',
            'ipk'=>'required',
        ],[
            'nim.required'=>'NIM wajib diisi',
            'nim.numeric'=>'NIM wajib numerik',
            'nim.unique'=>'NIM yang diisikan sudah ada pada database',
            'nama.required'=>'NIM wajib diisi',
            'jeniskelamin.required'=>'Jenis Kelamin wajib diisi',
            'tmptlhr.required'=>'Tempat Lahir wajib diisi',
            'tgllhr.required'=>'Tanggal Lahir wajib diisi',
            'jurusan.required'=>'Jurusan wajib diisi',
            'lamastudi.required'=>'Lama Studi wajib diisi',
            'ipk.required'=>'IPK wajib diisi',
        ]);

        $data = [
            'nim'=>$request->nim,
            'nama'=>$request->nama,
            'jeniskelamin'=>$request->jeniskelamin,
            'tmptlhr'=>$request->tmptlhr,
            'tgllhr'=>$request->tgllhr,
            'jurusan'=>$request->jurusan,
            'lamastudi'=>$request->lamastudi,
            'ipk'=>$request->ipk,
        ];
        mahasiswa::create($data);
        return redirect()->to('mahasiswa')->with('success','Berhasil menambahkan data');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = mahasiswa::where('nim',$id)->first();

        return view ('mahasiswa.edit')->with('data',$data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([

            'nama'=>'required',
            'jeniskelamin'=>'required',
            'tmptlhr'=>'required',
            'tgllhr'=>'required',
            'jurusan'=>'required',
            'lamastudi'=>'required',
            'ipk'=>'required',
        ],[
            'nama.required'=>'NIM wajib diisi',
            'jeniskelamin.required'=>'Jenis Kelamin wajib diisi',
            'tmptlhr.required'=>'Tempat Lahir wajib diisi',
            'tgllhr.required'=>'Tanggal Lahir wajib diisi',
            'jurusan.required'=>'Jurusan wajib diisi',
            'lamastudi.required'=>'Lama Studi wajib diisi',
            'ipk.required'=>'IPK wajib diisi',
        ]);

        $data = [
            
            'nama'=>$request->nama,
            'jeniskelamin'=>$request->jeniskelamin,
            'tmptlhr'=>$request->tmptlhr,
            'tgllhr'=>$request->tgllhr,
            'jurusan'=>$request->jurusan,
            'lamastudi'=>$request->lamastudi,
            'ipk'=>$request->ipk,
        ];
        mahasiswa::where('nim',$id)->update($data);
        return redirect()->to('mahasiswa')->with('success','Berhasil update data');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        mahasiswa ::where('nim',$id)->delete();
        return redirect()->to('mahasiswa')->with('success','Berhasil melakukan delete data');
    }
}
