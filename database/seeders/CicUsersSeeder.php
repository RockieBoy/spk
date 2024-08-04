<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class CicUsersSeeder extends Seeder
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
                'name' => 'Administrator',
                'email'=> 'administrator@gmail.com',
                'role'=> 'superadmin',
                'password'=> bcrypt('12345')
            ],
            [
                'name' => 'Dosen',
                'email'=> 'dosen@gmail.com',
                'role'=> 'dosen',
                'password'=> bcrypt('12345')
            ],
            [
                'name' => 'Mahasiswa',
                'email'=> 'mahasiswa@gmail.com',
                'role'=> 'mahasiswa',
                'password'=> bcrypt('12345')
            ]
        ];

        foreach($userData as $key => $val){
            User::create($val);
        }
    }
}
