<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Outlet extends Model
{
    use HasFactory;

    protected $table = 'outlets';

    public function wilayah()
    {
        return $this->belongsToMany(Wilayah::class, 'wilayahs', 'wilayah_id', 'id');
    }
}