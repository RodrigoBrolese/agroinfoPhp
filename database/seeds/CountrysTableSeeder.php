<?php

use Illuminate\Database\Seeder;

class CountrysTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::insert("
            insert into countrys (name, initials) values ('Brasil', 'br');
        ");

    }
}
