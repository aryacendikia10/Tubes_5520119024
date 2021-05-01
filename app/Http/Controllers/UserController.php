<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User; 
use App\Models\Barang; 
use App\Models\Merk; 
use App\Models\Kategori;
use Illuminate\Support\Facades\Storage;
use Hash;

class UserController extends Controller
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

        return view("barang.UserIndex", compact('data', 'kategori', 'merk'));
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
        return redirect()->route("user/barang.UserIndex")->with( 
            "success", 
            "Data berhasil disimpan." 
        ); 
 } 
    public function show($barang) 
    { 
    // 
    }
}
