<?php

namespace Database\Seeders;

use App\Models\Kriteria;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class KriteriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $userData = [
            [
                'kd_kriteria' => 'C1',
                'nm_kriteria'=> 'Nilai IPS/ IPK',
                'bobot'=> 0.5,
                'jenis'=> 'Benefit'
            ],
            [
                'kd_kriteria' => 'C2',
                'nm_kriteria'=> 'Keaktifan Organisasi',
                'bobot'=> 0.2,
                'jenis'=> 'Benefit'
            ],
            [
                'kd_kriteria' => 'C3',
                'nm_kriteria'=> 'Prestasi Akademik',
                'bobot'=> 0.15,
                'jenis'=> 'Benefit'
            ],
            [
                'kd_kriteria' => 'C4',
                'nm_kriteria'=> 'Prestasi Non Akademik',
                'bobot'=> 0.1,
                'jenis'=> 'Benefit'
            ],
            [
                'kd_kriteria' => 'C5',
                'nm_kriteria'=> 'Sertifikat Kursus/ Bootcamp',
                'bobot'=> 0.05,
                'jenis'=> 'Benefit'
            ],
            
        ];

        foreach($userData as $key => $val){
            Kriteria::create($val);
        }
    }
}
