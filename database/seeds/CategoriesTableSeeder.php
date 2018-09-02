<?php

use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            'name' => 'Iphone',
        ]);

        DB::table('categories')->insert([
            'name' => 'Samsung',
        ]);

        DB::table('categories')->insert([
            'name' => 'Xiaomi',
        ]);

        DB::table('categories')->insert([
            'name' => 'Oppo',
        ]);

        DB::table('categories')->insert([
            'name' => 'Meizu',
        ]);
        DB::table('categories')->insert([
            'name' => 'Sony',
        ]);
    }
}