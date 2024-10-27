<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    public function run()
    {
         // Inserindo o usuário e pegando o ID gerado
        $userId = DB::table('users')->insertGetId([
            'name' => 'system',
            'email' => 'system@votocerto.com',
            'password' => Hash::make('password'),
            'img_profile' => 'profile_images/image_default.jpg',
            'position' => 99,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Usando o ID para fazer uma nova inserção, por exemplo, na tabela 'user_setting'
        DB::table('user_setting')->insert([
            'user_id' => $userId,
            'max_create_election' => 2, // exemplo de valor
            'created_at' => now(),
            'updated_at' => now(),
        ]);

    }
}
