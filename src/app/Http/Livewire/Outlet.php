<?php

namespace App\Http\Livewire;

use App\Models\Cabang;
use App\Models\Wilayah;
use Livewire\Component;

class Outlet extends Component
{
    public $wilayah;
    public $cabang;
    public $cabangs = [];

    public function render()
    {
        if (!empty($this->wilayah)) {
            $this->cabangs = Cabang::where('wilayah_id', $this->wilayah)->get();
        }
        return view('livewire.outlet')
            ->withWilayahs(Wilayah::orderBy('nama_wilayah')->get());
    }
}