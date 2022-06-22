<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert(
            [
                [
                    "name" => "dosen",
                    "kode" => "1",
                    "created_at" => Carbon::now()->toDateTimeString(),
                    "updated_at" => Carbon::now()->toDateTimeString()
                ],
                [
                    "name" => "pembibing",
                    "kode" => "2",
                    "created_at" => Carbon::now()->toDateTimeString(),
                    "updated_at" => Carbon::now()->toDateTimeString()
                ],
                [
                    "name" => "mahasiswa",
                    "kode" => "3",
                    "created_at" => Carbon::now()->toDateTimeString(),
                    "updated_at" => Carbon::now()->toDateTimeString()
                ],
            ]
        );
    }
}
