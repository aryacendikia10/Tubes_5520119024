<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class barang extends Model
{
    protected $primaryKey = 'id';
    protected $fillable = [ 
        'nama',
        'qty',
        'merks_id',
        'kategoris_id',
        'harga',
        'foto',
    ]; 

    public function kategories(){
        return $this->belongsTo(Kategori::class);
    }

    public function merks(){
        return $this->belongsTo(Merk::class);
    }
}
