<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\Owner;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Owner::factory(100)->create();
    }
}
