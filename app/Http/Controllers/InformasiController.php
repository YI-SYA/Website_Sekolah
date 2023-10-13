<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Informasi;
class InformasiController extends Controller
{
public function index()
 {
 $data_informasi = \App\Models\Informasi::all();
 return view('informasi.index', ['data_informasi' => $data_informasi]);
 }
 public function create(Request $request)
 {
 $data = $request->all();
 $check = \App\Models\Informasi::create($data);
 if(!$check){
 $arr = array('msg' => 'Gagal simpan dengan Ajax', 'status' => false);
 }else{
 $arr = array('msg' => 'Sukses simpan dengan Ajax', 'status' => true);
 }
 return Response()->json($arr);
 }
 public function edit($id)
 {
 $informasi = \App\Models\Informasi::find($id);
 return view('informasi/edit', ['informasi' => $informasi]);
 }
 public function update(Request $request, $id)
 {
 $informasi = \App\Models\Informasi::find($id);
 $informasi->update($request->all());
 return redirect('/informasi')->with('sukses', 'Data berhasil di-update.');
 }
 public function delete($id)
 {
 $informasi = \App\Models\Informasi::find($id);
 $informasi->delete($informasi);
 return redirect('/informasi')->with('sukses', 'Data berhasil di-delete.');
 }
}
