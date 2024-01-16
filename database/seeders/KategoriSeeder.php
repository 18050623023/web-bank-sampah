<?php

namespace Database\Seeders;

use App\Models\Kategorie;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class KategoriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $kategories = [
            [
                'kategori_sampah' => 'Plastik',
                'harga_pergram' => '10',
                'point' => 1,
                'ton' => '100',
            ],
            [
                'kategori_sampah' => 'Kardus',
                'harga_pergram' => '10',
                'point' => 1,
                'ton' => '100',
            ],
        ];

        foreach ($kategories as $key => $kategori) {
            Kategorie::create($kategori);
        }
    }
}
