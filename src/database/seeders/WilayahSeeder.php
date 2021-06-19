<?php

namespace Database\Seeders;

use DB;
use Illuminate\Database\Seeder;

class WilayahSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('wilayahs')->insert([
            'kode_wilayah' => 'BNI001',
            'nama_wilayah' => 'Jakarta Barat',
            'created_at' => \Carbon\Carbon::now('Asia/Jakarta'),
        ]);
    }
}