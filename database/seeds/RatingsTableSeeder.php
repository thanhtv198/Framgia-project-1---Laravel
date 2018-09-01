<?php

use Illuminate\Database\Seeder;

class RatingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $limit = 5;
        for ($i = 1; $i <= $limit; $i++) {
            DB::table('ratings')->insert([
                'rating' => $i,
                'rateable_id' => $i,
                'rateable_type' => 'App\Models\Product',
                'user_id' => $i,
            ]);
        }
        for ($i = 1; $i <= $limit; $i++) {
            DB::table('ratings')->insert([
                'rating' => $i,
                'rateable_id' => $i + 5,
                'rateable_type' => 'App\Models\Product',
                'user_id' => $i + 1,
            ]);
        }
        for ($i = 1; $i <= $limit; $i++) {
            DB::table('ratings')->insert([
                'rating' => $i,
                'rateable_id' => $i + 10,
                'rateable_type' => 'App\Models\Product',
                'user_id' => $i,
            ]);
        }
        for ($i = 1; $i <= $limit; $i++) {
            DB::table('ratings')->insert([
                'rating' => $i,
                'rateable_id' => $i + 15,
                'rateable_type' => 'App\Models\Product',
                'user_id' => $i + 1,
            ]);
        }
    }
}
