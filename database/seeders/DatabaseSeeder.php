<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Role;
use App\Models\Passtype;
use App\Models\Status;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        Role::insert([
            'name' => 'admin',
        ]);
        Role::insert([
            'name' => 'operator',
        ]);

        User::insert([
            'login' => 'admin',
            'password' => Hash::make('Admin2019'),
            'role_id' => 1,
        ]);
        User::insert([
            'login' => 'operator',
            'password' => Hash::make('Operator2019'),
            'role_id' => 2,
        ]);

        Status::insert([
            'name' => 'Рассматривается',
        ]);
        Status::insert([
            'name' => 'Одобрена',
        ]);
        Status::insert([
            'name' => 'Отклонена',
        ]);
        Status::insert([
            'name' => 'Пропуск готов',
        ]);

        Passtype::insert([
            'name' => 'Временный',
        ]);
        Passtype::insert([
            'name' => 'Постоянный',
        ]);

    }
}
