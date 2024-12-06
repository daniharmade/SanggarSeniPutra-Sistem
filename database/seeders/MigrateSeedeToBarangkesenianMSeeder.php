<?php

namespace Database\Seeders;

use App\Models\BarangkesenianM;
use Illuminate\Database\Seeder;

class MigrateSeedeToBarangkesenianMSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        BarangkesenianM::create([
            'id'            => 1,
            'nama'          => 'Wayang',
            'jenis'         => 'Barang',
            'hargasewa'      => '200000',
            'deskripsi'      => 'Wayang',
            'stok'           => 100,
        ]);

        BarangkesenianM::create([
            'id'            => 2,
            'nama'          => 'Gamelan',
            'jenis'         => 'Barang',
            'hargasewa'     => '200000',
            'deskripsi'      => 'Gamelan',
            'stok'          => 100,
        ]);
    }
}
