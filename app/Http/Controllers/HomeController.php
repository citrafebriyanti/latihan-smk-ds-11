<?php

namespace App\Http\Controllers;


use App\Models\Kelas;
use App\Models\Siswa;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        $jumlahkelas=kelas::count();
        $jumlahsiswa=siswa::count();
        
        return view('home.index',['jumlahkelas'=>$jumlahkelas,'jumlahsiswa'=>$jumlahsiswa]);
        
}
}
