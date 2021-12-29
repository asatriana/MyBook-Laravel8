<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pegawai;
 
use PDF;

//use App\NamaModel;

//Panduan Custom Controller
//Load model yang akan kalian gunakan pada controller ini dengan mengganti 'NamaModel' di atas dengan nama model kalian
//Ubah semua 'NamaModel' sesuai dengan nama model yang kalian gunakan pada controller ini
//Ubah semua 'namamode' sesuai dengan nama model yang kalian gunakan pada controller ini (huruf kecil semua)
//Sesuaikan validate rule sesuai kebutuhan

class PegawaiController extends Controller
{
    private $route = 'pegawai.'; //misal di folder view/book/data jadi tulis aja book.data. kalau di folder view/book berarti tulis aja book.

    public function index()
    {
        $data = Pegawai::all(); 

        return view($this->route . 'index', compact('data')); 
    }

    public function cetak_pdf()
    {
    	$pegawai = Pegawai::all();
 
    	$pdf = PDF::loadview($this->route .'pdf',['pegawai'=>$pegawai]);
    	return $pdf->download('laporan-pegawai-pdf');
    }


    // public function create()
    // {
        // return view($this->route . 'create'); 
    // }

    // public function store(Request $request)
    // {
        // $request->validate([
            // 'nama' => 'rule', 
            // '....' => '....',
            // '....' => '....',
        // ]); 

        // NamaModel::create($request->all()); 

        // return redirect()->route($this->route . 'index')
            // ->with('success', 'Berhasil'); 
    // }

    // public function show(NamaModel $namamodel)
    // {
        // return view($this->route . 'detail', compact('namamodel')); 
    // }

    // public function edit(NamaModel $namamodel)
    // {
        // return view($this->route . 'edit', compact('namamodel')); 
    // }

    // public function update(Request $request, NamaModel $namamodel)
    // {
        // $request->validate([
            // 'nama' => 'rule', 
            // '....' => '....',
            // '....' => '....', 
        // ]); 

        // $namamodel->update($request->all()); 

        // return redirect()->route($this->route . 'index')
            // ->with('success', 'Berhasil'); 
    // }

    // public function destroy(NamaModel $namamodel)
    // {
        // $namamodel->delete(); 

        // return redirect()->route($this->route . 'index')
            // ->with('success', 'Berhasil'); 
    // }
}
