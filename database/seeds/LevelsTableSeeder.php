<?php

use Illuminate\Database\Seeder;

class LevelsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('levels')->insert([
            'role' => 'supper admin',
        ]);
        DB::table('levels')->insert([
            'role' => 'manager',
        ]);
        DB::table('levels')->insert([
            'role' => 'member',
        ]);
    }
}
