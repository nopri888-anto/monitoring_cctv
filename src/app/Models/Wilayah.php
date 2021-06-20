<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wilayah extends Model
{
    use HasFactory;

    protected $table = 'wilayahs';

    public function cabang()
    {
        return $this->hasMany(Cabang::class);
    }

    public function outlet()
    {
        return $this->hasMany(Outlet::class);
    }
}