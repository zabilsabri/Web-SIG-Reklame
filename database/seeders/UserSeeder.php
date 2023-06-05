<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [
            ['id' => 1, 'nama' => 'Admin', 'email' => 'admin@gmail.com', 'password' => Hash::make('123'), 'alamat' => 'alamat1', 'no_telp' => '123', 'role' => 'Admin'],
            ['id' => 2, 'nama' => 'Pimpinan', 'email' => 'pimpinan@gmail.com', 'password' => Hash::make('123'), 'alamat' => 'alamat2', 'no_telp' => '234', 'role' => 'Pimpinan'],
        ];

        foreach ($users as $key => $v) {
            User::create([
                'id' => $v['id'],
                'nama' => $v['nama'],
                'email' => $v['email'],
                'password' => $v['password'],
                'alamat' => $v['alamat'],
                'no_telp' => $v['no_telp'],
                'role' => $v['role'],
            ]);
        };
    }
}
