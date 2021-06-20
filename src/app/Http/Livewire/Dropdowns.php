<?php

namespace App\Http\Livewire;

use App\Models\Cabang;
use App\Models\Wilayah;
use Livewire\Component;

class Dropdowns extends Component
{
    public $wilayahs;
    public $cabangs;

    public function mount($selectedWilayah = null)
    {
        $this->wilayahs = Wilayah::all();
        $this->cabangs = collect();
        $this->$selectedWilayah = $selectedWilayah;

        if (!is_null($selectedWilayah)) {
            $cabang = Cabang::with('wilayah')->find($selectedWilayah);
            if ($cabang) {
                $this->cabangs = Cabang::where('wilayah_id', $cabang->wilayah_id)->get();
                $this->selectedCabang = $cabang->wilayah_id;
            }
        }
    }

    public function render()
    {
        return view('livewire.dropdowns');
    }

    public function updateSelectedWilayah($cabang)
    {
        $this->cabang = Cabang::where('wilayah_id', $cabang)->get();
    }

    public function updateSelectedCabang($wilayah)
    {
        if (!is_null($cabang)) {
            $this->cabang = Cabang::where('wilayah_id', $wilayah)->get();
        }
    }

}