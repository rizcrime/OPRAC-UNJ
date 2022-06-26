<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert(
            [
                [
                    "name" => "as Dosen",
                    "email" => "dosen@gmail.com",
                    "role" => '1',
                    "email_verified_at" => Carbon::now()->toDateTimeString(),
                    "password" => Hash::make("testpass"),
                    "remember_token" => "",
                    "created_at" => Carbon::now()->toDateTimeString(),
                    "updated_at" => Carbon::now()->toDateTimeString()
                ],
                [
                    "name" => "as Pembimbing",
                    "email" => "pembimbing@gmail.com",
                    "role" => '2',
                    "email_verified_at" => Carbon::now()->toDateTimeString(),
                    "password" => Hash::make("testpass"),
                    "remember_token" => "",
                    "created_at" => Carbon::now()->toDateTimeString(),
                    "updated_at" => Carbon::now()->toDateTimeString()
                ],
                [
                    "name" => "as Mahasiswa_1",
                    "email" => "mahasiswa1@gmail.com",
                    "role" => '3',
                    "email_verified_at" => Carbon::now()->toDateTimeString(),
                    "password" => Hash::make("testpass"),
                    "remember_token" => "",
                    "created_at" => Carbon::now()->toDateTimeString(),
                    "updated_at" => Carbon::now()->toDateTimeString()
                ],
                [
                    "name" => "as Mahasiswa_2",
                    "email" => "mahasiswa2@gmail.com",
                    "role" => '3',
                    "email_verified_at" => Carbon::now()->toDateTimeString(),
                    "password" => Hash::make("testpass"),
                    "remember_token" => "",
                    "created_at" => Carbon::now()->toDateTimeString(),
                    "updated_at" => Carbon::now()->toDateTimeString()
                ],
            ]
        );
    }
}
