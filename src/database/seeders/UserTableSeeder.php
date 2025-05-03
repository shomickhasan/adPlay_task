<?php

namespace Database\Seeders;

use App\Enums\Status;
use App\Models\Permission;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserTableSeeder extends Seeder
{

    public function run(): void
    {
        User::updateOrCreate([
            'full_name'=> 'admin',
            'user_name' => 'admin',
            'slug' => Str::slug('admin'),
            'status' => Status::Active,
            'password' => Hash::make('123456'),
        ]);
    }
}
