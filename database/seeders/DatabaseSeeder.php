<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Admins\Admin;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Admins\Admin::factory(1)->create();
    }
}
