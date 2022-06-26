<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class EvaluationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('assignments')->insert(
            [
                [
                    'subject' => '1',
                    'title' => 'Tugas UMKM',
                    'description' => 'Kumpulkan dengan foto dan audio record',
                    'due' => '2022-07-01 00:00:00',
                    'created_at' => Carbon::now()->toDateTimeString(),
                    'updated_at' => Carbon::now()->toDateTimeString()
                ],
                [
                    'subject' => '1',
                    'title' => 'UMK Migrasi Data',
                    'description' => 'Pastikan hasil migrasi dalam bentuk .pdf atau .png',
                    'due' => '2022-07-02 00:00:00',
                    'created_at' => Carbon::now()->toDateTimeString(),
                    'updated_at' => Carbon::now()->toDateTimeString()
                ],
                [
                    'subject' => '2',
                    'title' => 'Pembawaan video skalabilitas',
                    'description' => 'Durasi minimal 20 menit',
                    'due' => '2022-07-12 00:00:00',
                    'created_at' => Carbon::now()->toDateTimeString(),
                    'updated_at' => Carbon::now()->toDateTimeString()
                ],
                [
                    'subject' => '3',
                    'title' => 'Foto kegiatan dalam interval /1 hari',
                    'description' => 'Gambar haruslah jelas disertai caption keterangan',
                    'due' => '2022-06-30 00:00:00',
                    'created_at' => Carbon::now()->toDateTimeString(),
                    'updated_at' => Carbon::now()->toDateTimeString()
                ],
                [
                    'subject' => '4',
                    'title' => 'Hasil akhir KKN dalam makalah',
                    'description' => 'Sekapur sirih is required',
                    'due' => '2022-07-22 00:00:00',
                    'created_at' => Carbon::now()->toDateTimeString(),
                    'updated_at' => Carbon::now()->toDateTimeString()
                ],
            ]
        );

        DB::table('collect_assign')->insert(
            [
                [
                    'assignment' => '1',
                    'collector' => '3',
                    'file' => 'Spending dan Revenue persentase',
                    'proof' => 'http://www.africau.edu/images/default/sample.pdf',
                    'proof_2' => 'http://www.africau.edu/images/default/sample.pdf',
                    'score' => '90',
                    'score_2' => '77',
                    'created_at' => Carbon::now()->toDateTimeString(),
                    'updated_at' => Carbon::now()->toDateTimeString()
                ],
                [
                    'assignment' => '2',
                    'collector' => '3',
                    'file' => 'Spending dan Revenue persentase',
                    'proof' => 'http://www.africau.edu/images/default/sample.pdf',
                    'proof_2' => 'http://www.africau.edu/images/default/sample.pdf',
                    'score' => '88',
                    'score_2' => '20',
                    'created_at' => Carbon::now()->toDateTimeString(),
                    'updated_at' => Carbon::now()->toDateTimeString()
                ],
            ]
        );
    }
}
