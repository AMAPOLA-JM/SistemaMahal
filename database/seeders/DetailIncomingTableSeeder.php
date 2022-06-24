<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DetailIncomingTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\DetailIncoming::factory(10)->create();
    }
}
