<?php

namespace Database\Seeders;

use App\Models\Databank;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DataBanksSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $databanks = [
            [
                'teller_id' => '2',
                'nama_bank' => 'TPS Siomo',
                'alamat'    => 'Simo Sidomulyo',
                'harga' => '20000',
                'tgl_bergabung' => 0,
                'lat' => '112.7150342,14z',
                'long' => '-7.2664907',
                'path' => '1703604467.jpg'
            ],
            [
                'teller_id' => '3',
                'nama_bank' => 'TPS Rukun',
                'alamat'    => 'Simo Rukun',
                'harga' => '20000',
                'tgl_bergabung' => 1,
                'lat' => '112.7150342,14z',
                'long' => '-7.2664907',
                'path' => '1703604467.jpg'
            ],
        ];

        foreach ($databanks as $key => $databank) {
            Databank::create($databank);
        }
    }
}
