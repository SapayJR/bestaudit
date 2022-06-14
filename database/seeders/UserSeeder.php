<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $users = [
            [
                'id' => 101,
                'uuid' => 'tony-uuid-uuid-uuid-uuid',
                'firstname' => 'Tony',
                'lastname' => 'Sapay',
                'email' => 'tony.sapay@gmail.com',
                'phone' => '998911902494',
                'birthday' => '1991-08-10',
                'gender' => 'male',
                'email_verified_at' => now(),
                'phone_verified_at' => now(),
                'password' => bcrypt('qwerty123'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 102,
                'uuid' => 'jonny-uuid-uuid-uuid-uuid',
                'firstname' => 'Jonny',
                'lastname' => 'Cache',
                'email' => 'jony.cache@gmail.com',
                'phone' => '998911902595',
                'birthday' => '1991-08-10',
                'gender' => 'male',
                'email_verified_at' => now(),
                'phone_verified_at' => now(),
                'password' => bcrypt('qwerty123'),
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ];

        foreach ($users as $user) {
            User::updateOrInsert(['id' => $user['id']],$user);
        }
    }
}
