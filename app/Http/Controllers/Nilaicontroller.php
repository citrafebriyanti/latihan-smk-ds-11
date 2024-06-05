<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Nilai;
use App\Models\Siswa;

class Nilaicontroller extends Controller
{
    public function index(){
    //    $dataNilai= Nilai::join('siswa','nilai.siswa_id','=','siswa.id')->get();

      $dataNilai= Nilai::select('*','nilai.id as nilai_id')->join('siswa','nilai.siswa_id','=','siswa.id')->get();
        return view('nilai.index',['dataNilai'=>$dataNilai]);
    }
    public function tambah(){
        $datasiswa=Siswa::get();
        return view('nilai.tambah',['datasiswa'=>$datasiswa]);
    }
    public function aksi_tambah(Request $request){
        $request->validate(['siswa_id'=> 'required','nilai'=>'required|numeric'
    ]);
    if ($request->nilai > 100 || $request->nilai <0){
        return redirect()->back()->with(['validasi_nilai'=>'Nilai tidak bisa lebih dari 100 dan tidak bisa kurang dari 0']);
    }
    Nilai::insert(['siswa_id'=>$request->siswa_id,'nilai'=>$request->nilai]);
        return redirect()->route('nilai')->with('pesan','Data berhasi di tambahkan');
    
        
    
        

    }
    public function hapus($id){
        Nilai::where('id',$id)->delete();
        return redirect()->route('nilai')->with('hapus','Data berhasil dihapus');
    }
    public function edit($id){
        echo $id;
        $nilai=Nilai::where('id',$id)->first();
        $datasiswa =siswa::get();
        return view('nilai.edit',['datasiswa'=>$datasiswa,'nilai'=>$nilai]);

    }
    public function aksi_edit(Request $request,$id){
        Nilai::where('id',$id)->update(['siswa_id'=>$request->siswa_id,'nilai'=>$request->nilai]);
        return redirect()->route('nilai')->with('edit','Data berhasil di edit');

    }
}

