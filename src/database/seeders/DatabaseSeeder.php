<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Database\Seeders\UserTableSeeder;

class DatabaseSeeder extends Seeder
{

    public function run(): void
    {
        $this->call([
            UserTableSeeder::class,
        ]);
    }
}
