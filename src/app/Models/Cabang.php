<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cabang extends Model
{
    use HasFactory;

    protected $table = 'cabangs';

    public function wilayah()
    {
        return $this->belongTo(Wilayah::class);
    }

    public function outlet()
    {
        return $this->hasMany(Outlet::class);
    }
}