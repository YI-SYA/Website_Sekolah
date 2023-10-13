<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use \App\Siswa;
use \App\Informasi;
class DashboardController extends Controller
{
public function index(){
 $jml_siswa = \App\Models\Siswa::getJumlahSiswaPerTahun();
 $data_siswa = \App\Models\Siswa::all();
 $data_informasi = \App\Models\Informasi::latest()->first();
 return view('dashboards.index', compact('jml_siswa'), ['data_siswa' => $data_siswa,'data_informasi' => $data_informasi]);
 }

}

