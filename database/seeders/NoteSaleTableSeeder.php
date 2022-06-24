<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class NoteSaleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\NoteSale::factory(10)->create();
    }
}
