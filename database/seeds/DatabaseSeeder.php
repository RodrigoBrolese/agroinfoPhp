<?php

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
        $this->call(ChargeTypeTableSeeder::class);
        $this->call(CountrysTableSeeder::class);
        $this->call(StatesTableSeeder::class);
        $this->call(CitysTableSeeder::class);
    }
}
