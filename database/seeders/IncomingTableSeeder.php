<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class IncomingTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Incoming::factory(10)->create();
    }
}
