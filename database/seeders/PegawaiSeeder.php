<?php

namespace Database\Seeders;

use App\Models\Pegawai;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PegawaiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $pegawais = [
            [
                'lokasi_id' => '0',
                'nama_pegawai' => 'Pegawai 1',
                'tempat_lahir' => 'Surabaya',
                'tgl_bergabung' => '2023-08-30',
                'no_hp' => '085733554634',
                'alamat' => 'Surabaya',
            ],
            [
                'lokasi_id' => '0',
                'nama_pegawai' => 'Pegawai 2',
                'tempat_lahir' => 'Surabaya',
                'tgl_bergabung' => '2023-08-30',
                'no_hp' => '085733554634',
                'alamat' => 'Surabaya',
            ],
        ];

        foreach ($pegawais as $key => $pegawai) {
            Pegawai::create($pegawai);
        }
    }
}
