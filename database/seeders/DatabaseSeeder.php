<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UserTableSeeder::class);
        $this->call(CategoryTableSeeder::class);
        $this->call(ClientTableSeeder::class);
        $this->call(SupplierTableSeeder::class);
        $this->call(BrandTableSeeder::class);
        $this->call(NoteSaleTableSeeder::class);
        $this->call(IncomingTableSeeder::class);
        $this->call(ItemTableSeeder::class);
        $this->call(DetailIncomingTableSeeder::class);
        $this->call(NoteDetailTableSeeder::class);
        //\App\Models\User::factory(10)->create();
    }
}
