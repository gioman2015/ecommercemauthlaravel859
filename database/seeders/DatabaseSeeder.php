<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
/* use DB; */

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        \App\Models\Admin::factory()->create();

        $this->call(BrandSeeder::class);
        $this->call(CategorySeeder::class);
        $this->call(ShipDivisionSeeder::class);
        $this->call(ShipDistrictSeeder::class);
        $this->call(MessagesSeeder::class);
        $this->call(ProductSeeder::class);

    }
}
