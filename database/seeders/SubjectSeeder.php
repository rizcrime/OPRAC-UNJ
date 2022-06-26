<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class SubjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('subjects')->insert(
            [
                [
                    'title' => 'Giat usaha UMKM',
                    'file' => 'http://www.africau.edu/images/default/sample.pdf',
                    'description' => 'Spending dan Revenue persentase',
                    'classroom' => '1',
                    'created_at' => Carbon::now()->toDateTimeString(),
                    'updated_at' => Carbon::now()->toDateTimeString()
                ],
                [
                    'title' => 'Peningkatan pada tahap POS',
                    'file' => 'http://www.africau.edu/images/default/sample.pdf',
                    'description' => 'SOP dan KPI tolak ukur dalam skalabilitas',
                    'classroom' => '1',
                    'created_at' => Carbon::now()->toDateTimeString(),
                    'updated_at' => Carbon::now()->toDateTimeString()
                ],
                [
                    'title' => 'Pembekalan Materi ke-1',
                    'file' => 'https://www.orimi.com/pdf-test.pdf',
                    'description' => 'Tiingkat pertama akan dibawakan oleh bapak Subagyo',
                    'classroom' => '2',
                    'created_at' => Carbon::now()->toDateTimeString(),
                    'updated_at' => Carbon::now()->toDateTimeString()
                ],
                [
                    'title' => 'Pembekalan Materi ke-2 dan ke-3',
                    'file' => 'https://www.orimi.com/pdf-test.pdf',
                    'description' => 'Penilaian akan dilakukan oleh warga sekitar, diharapkan membawa bekal ilmu pasti',
                    'classroom' => '2',
                    'created_at' => Carbon::now()->toDateTimeString(),
                    'updated_at' => Carbon::now()->toDateTimeString()
                ],
            ]
        );
    }
}
