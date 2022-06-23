<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class NoteDetailTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\NoteDetail::factory(10)->create();
    }
}
