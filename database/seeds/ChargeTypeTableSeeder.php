<?php

use Illuminate\Database\Seeder;

class ChargeTypeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('charge_types')->insert(
            [
                'name' => 'unity',
                'initials' => 'un',
            ]
        );

        DB::table('charge_types')->insert(
            [
                'name' => 'kilo',
                'initials' => 'kg',
            ]
        );
    }
}
