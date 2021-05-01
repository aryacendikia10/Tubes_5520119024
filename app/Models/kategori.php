<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class kategori extends Model
{
    protected $fillable = [ 
        "nama", 
        "ket" 
    ]; 

    public function kategoris(){
        return $this->hasMany(Kategori::class);
    }
}
