<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Jurusan;
use App\Models\Siswa;
use Illuminate\Database\Seeder;

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

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        Jurusan::create([
            'name'=>'Rekayasa Perangkat Lunak'
        ]);

        Jurusan::create([
            'name'=>'Teknik Bisnis Sepeda Motor'
        ]);

        Jurusan::create([
            'name'=>'Teknik Kendaraan Ringan'
        ]);

        Jurusan::create([
            'name'=>'Akuntansi dan Keuangan Lembaga'
        ]);

        Siswa::factory(20)->create();
    }
}
