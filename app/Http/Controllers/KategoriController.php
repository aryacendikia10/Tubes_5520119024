<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class KategoriController extends Controller
{
    public function index() 
    { 
        $data =Kategori::paginate(10); 
        $tampil['data'] = $data; 
        return view("kategori.index", $tampil); 
    } 
    public function create() 
    { 
        return view("kategori.create"); 
    } 
    
    public function store(Request $request) 
    { 
            $this->validate($request, [ 
            'nama' => 'required', 
            'ket' => 'required' 
        ]); 
        $data = Kategori::create($request->all()); 
        return redirect()->route("kategori.index")->with( 
            "success", 
            "Data berhasil disimpan." 
        ); 
    }
    public function show($kela) 
    { 
    // 
    } 
    
    public function edit($kela) 
    { 
        $data = Kategori::findOrFail($kela); 
            return view("kategori.edit", $data); 
        } 
    public function update(Request $request, $kela) 
    { 
    //validasi inputan 
        $this->validate($request, [ 
            'nama' => 'required', 
            'ket' => 'required' 
    ]); 
        $data = kategori::findOrFail($kela); 
        $data->nama = $request->nama; 
        $data->ket = $request->ket; 
        $data->save(); 
        return redirect()->route("kategori.index")->with( 
            "success", 
            "Data berhasil diubah." 
        ); 
    } 
    
    public function destroy($kela) 
    { 
        $data = Kategori::findOrFail($kela); 
        $data->delete(); 
    }
}
