<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User; 
use App\Models\Barang; 
use App\Models\Merk; 
use App\Models\Kategori;
use Illuminate\Support\Facades\Storage;
use Hash;

class BarangController extends Controller
{
    public function index() 
    { 
        $data = Barang::paginate(10); 
        $kategori = Kategori::all();
        $merk = Merk::all();
        foreach ($data as $item) { 
            $item->merk = Merk::find($item->merks_id); 
            $item->kategori = Kategori::find($item->kategoris_id);  
        } 
        $tampil['data'] = $data; 

        return view("barang.index", compact('data', 'kategori', 'merk'));
    } 

    public function create() 
    { 

        $data['merk'] = Merk::get(); 
        $data['kategori'] = Kategori::get(); 
        return view("barang.create",$data); 
    } 

    public function store(Request $request) 
    { 
        $barang = new Barang;

        if ($request->hasFile('foto')) {
            $extension = $request->file('foto')->extension();

            $filename = 'foto_barang_'.time().'.'.$extension;

            $request->file('foto')->storeAs(
                'public/foto_barang', $filename
            );

            $barang->foto = $filename;
        }

        $barang->nama = $request->get('nama');
        $barang->kategoris_id = $request->get('kategoris_id');
        $barang->merks_id = $request->get('merks_id');
        $barang->harga = $request->get('harga');
        $barang->qty = $request->get('qty');
        
        $barang->save();
        return redirect()->route("barang.index")->with( 
            "success", 
            "Data berhasil disimpan." 
        ); 
 } 
    public function show($barang) 
    { 
    // 
    } 

    public function edit($barang) 
    { 
        $data = Barang::findOrFail($barang); 
        $data->merk = Merk::get(); 
        $data->kategori = Kategori::get(); 

        return view("barang.edit", $data); 
    } 
    public function update(Request $request, $barang) 
    { 
        $barang = Barang::findOrFail($barang); 
        if ($request->hasFile('foto')) {
            $extension = $request->file('foto')->extension();

            $filename = 'foto_barang_'.time().'.'.$extension;

            $request->file('foto')->storeAs(
                'public/foto_barang', $filename
            );

            Storage::delete('public/foto_barang/'.$request->get('old_foto'));

            $barang->foto = $filename;
        }
        $barang->nama = $request->get('nama');
        $barang->kategoris_id = $request->get('kategoris_id');
        $barang->merks_id = $request->get('merks_id');
        $barang->harga = $request->get('harga');
        $barang->qty = $request->get('qty');

        

        $barang->save();
        
        return redirect()->route("barang.index")->with( 
        "success", 
        "Data berhasil diubah." 
    ); 
    } 
    
    public function destroy($barang) 
    { 
        $databarang = Barang::findOrFail($barang); 
        $databarang->delete(); 
    } 
}
