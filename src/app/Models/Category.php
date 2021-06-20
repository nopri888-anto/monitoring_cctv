<?php

namespace App\Models;

use App\Models\Parameter;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $table = 'categories';

    public function parameter()
    {
        return $this->hasMany(Parameter::class);
    }

}