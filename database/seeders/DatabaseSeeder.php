<?php

namespace Database\Seeders;

use App\Models\Prodi;
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
        Prodi::create(['kode'=>44201, 'nama'=>'matematika']);
        Prodi::create(['kode'=>44202, 'nama'=>'statistika']);
        Prodi::create(['kode'=>45201, 'nama'=>'kimia']);
        Prodi::create(['kode'=>46201, 'nama'=>'biologi']);
        Prodi::create(['kode'=>48201, 'nama'=>'farmasi']);
        Prodi::create(['kode'=>47201, 'nama'=>'fisika']);
        Prodi::create(['kode'=>33201, 'nama'=>'geofisika']);
    }
}
