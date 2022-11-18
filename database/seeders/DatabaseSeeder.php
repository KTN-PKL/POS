<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        DB::table('users')->insert([
            'name' => 'Admin',
            'username' => 'admin',
            'level' => 2,
            'foto' => 'admin.png',
            'telepon' => '081214141414',
            'alamatuser' => 'Subang',
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        ]);

        DB::table('tokos')->insert([
            'tnama' => 'Toko Hemat',
            'talamat' => 'Jl Brigjen Katamso, Subang',
            'thp' => '081214141414',
            'tpemilik' => 'admin.png',
            'twebsite' => 'hemat.ac.id',
            'temail' => 'hemat@gmail.com',

        ]);

        DB::table('pengaturans')->insert([
            'tgambar' => '1.png',
            'tfooter' => 'Struk Toko Hemat',
            'tdiskonrp' => 'enable',
            'tdiskonpersen' => 'enable',
            'tpajakrp' => 'enable',
            'tpajakpersen' => 'enable',
            
        ]);
    }
}