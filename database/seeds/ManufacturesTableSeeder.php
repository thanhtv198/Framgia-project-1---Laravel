<?php

use Illuminate\Database\Seeder;

class ManufacturesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('manufactures')->insert([
            'name'=> 'Apple',
        ]);
        DB::table('manufactures')->insert([
            'name'=> 'Google',
        ]);
        DB::table('manufactures')->insert([
            'name'=> 'Sony',
        ]);
        DB::table('manufactures')->insert([
            'name'=> 'Nokia',
        ]);
    }
}