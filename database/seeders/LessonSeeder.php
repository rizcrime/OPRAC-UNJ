<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class LessonSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('lessons')->insert(
            [
                [
                    "name" => "pelayanan prima",
                    "created_at" => Carbon::now()->toDateTimeString(),
                    "updated_at" => Carbon::now()->toDateTimeString()
                ],[
                    "name" => "public relations",
                    "created_at" => Carbon::now()->toDateTimeString(),
                    "updated_at" => Carbon::now()->toDateTimeString()
                ],
                [
                    "name" => "pengelolaan kas kecil",
                    "created_at" => Carbon::now()->toDateTimeString(),
                    "updated_at" => Carbon::now()->toDateTimeString()
                ],
                [
                    "name" => "pengelolaan rapat",
                    "created_at" => Carbon::now()->toDateTimeString(),
                    "updated_at" => Carbon::now()->toDateTimeString()
                ],
                [
                    "name" => "presentasi",
                    "created_at" => Carbon::now()->toDateTimeString(),
                    "updated_at" => Carbon::now()->toDateTimeString()
                ],
                [
                    "name" => "pengelolaan kearsipan",
                    "created_at" => Carbon::now()->toDateTimeString(),
                    "updated_at" => Carbon::now()->toDateTimeString()
                ],
                [
                    "name" => "pengelolaan dokumen",
                    "created_at" => Carbon::now()->toDateTimeString(),
                    "updated_at" => Carbon::now()->toDateTimeString()
                ],
                [
                    "name" => "korespondensi",
                    "created_at" => Carbon::now()->toDateTimeString(),
                    "updated_at" => Carbon::now()->toDateTimeString()
                ],
                [
                    "name" => "peneglolaan informasi",
                    "created_at" => Carbon::now()->toDateTimeString(),
                    "updated_at" => Carbon::now()->toDateTimeString()
                ],
                [
                    "name" => "penanganan telepon",
                    "created_at" => Carbon::now()->toDateTimeString(),
                    "updated_at" => Carbon::now()->toDateTimeString()
                ],
                [
                    "name" => "penanganan tamu",
                    "created_at" => Carbon::now()->toDateTimeString(),
                    "updated_at" => Carbon::now()->toDateTimeString()
                ],
                [
                    "name" => "pengelolaan jadwal kegiatan kerja pimpinan",
                    "created_at" => Carbon::now()->toDateTimeString(),
                    "updated_at" => Carbon::now()->toDateTimeString()
                ],
                [
                    "name" => "pekerjaan kantor",
                    "created_at" => Carbon::now()->toDateTimeString(),
                    "updated_at" => Carbon::now()->toDateTimeString()
                ],
                [
                    "name" => "konsep dasar administrasi perkantoran",
                    "created_at" => Carbon::now()->toDateTimeString(),
                    "updated_at" => Carbon::now()->toDateTimeString()
                ],
            ]
        );
    }
}
