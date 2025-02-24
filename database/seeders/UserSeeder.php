<?php

namespace Database\Seeders;

use DB;
use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $userID = DB::table("users")->insertGetId(
            [
                'name' => "Андрей",
                'email' => "asmi046@gmail.com",
                'phone' => "+7(903)633-08-01",
                'rang' => "Администратор",
                'password' => Hash::make("123"),
                'email_verified_at' => date("Y-m-d H:i:s"),
            ]
        );

        $userID = DB::table("users")->insertGetId(
            [
                'name' => "Резникова Наталья",
                'email' => "Reznikova2007@yandex.ru",
                'phone' => "+7(951)336-55-04",
                'rang' => "Администратор",
                'password' => Hash::make("123"),
                'email_verified_at' => date("Y-m-d H:i:s"),
            ]
        );

        $userID = DB::table("users")->insertGetId(
            [
                'name' => "Неваленной Олег",
                'email' => "mr.nevalennoy@mail.ru",
                'phone' => "+7(910)311-88-78",
                'rang' => "Менеджер",
                'password' => Hash::make("123"),
                'email_verified_at' => date("Y-m-d H:i:s"),
            ]
        );

    }
}
