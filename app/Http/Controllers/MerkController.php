<?php

namespace App\Http\Controllers;

use App\Models\Merk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class MerkController extends Controller
{
    public function index() 
    { 
        $data =Merk::paginate(10); 
        $tampil['data'] = $data; 
        return view("merk.index", $tampil); 
    } 
    public function create() 
    { 
        return view("merk.create"); 
    } 
    
    public function store(Request $request) 
    { 
            $this->validate($request, [ 
            'nama' => 'required', 
            'ket' => 'required' 
        ]); 
        $data = Merk::create($request->all()); 
        return redirect()->route("merk.index")->with( 
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
        $data = Merk::findOrFail($kela); 
            return view("merk.edit", $data); 
        } 
    public function update(Request $request, $kela) 
    { 
    //validasi inputan 
        $this->validate($request, [ 
            'nama' => 'required', 
            'ket' => 'required' 
    ]); 
        $data = Merk::findOrFail($kela); 
        $data->nama = $request->nama; 
        $data->ket = $request->ket; 
        $data->save(); 
        return redirect()->route("merk.index")->with( 
            "success", 
            "Data berhasil diubah." 
        ); 
    } 
    
    public function destroy($kela) 
    { 
        $data = Merk::findOrFail($kela); 
        $data->delete(); 
    } 
}
