<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class ClassroomSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('classrooms')->insert(
            [
                [
                    'logo' => 'https://s.kaskus.id/images/2016/07/03/4877201_20160703111540.jpg',
                    'classname' => 'PT Usaha Mandiri Prima',
                    'members' => '1,2,3',
                    'lesson' => '1',
                    'link_g_meet' => 'https://gmeet.com/new',
                    'created_at' => Carbon::now()->toDateTimeString(),
                    'updated_at' => Carbon::now()->toDateTimeString()
                ],
                [
                    'logo' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRkhwdFtdqnV8uf0ShY_UHiGkJywNOgYceXPg&usqp=CAU',
                    'classname' => 'Persiapan KKN di desa KONOHA',
                    'members' => '1,2,4',
                    'lesson' => '14',
                    'link_g_meet' => 'https://gmeet.com/new2',
                    'created_at' => Carbon::now()->toDateTimeString(),
                    'updated_at' => Carbon::now()->toDateTimeString()
                ],
            ]
        );
    }
}
