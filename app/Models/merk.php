<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class merk extends Model
{
    protected $fillable = [ 
        "nama", 
        "ket" 
    ]; 

    public function merks(){
        return $this->hasMany(Merk::class);
    }
}
