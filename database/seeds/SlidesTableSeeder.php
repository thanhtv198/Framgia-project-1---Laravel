<?php

use Illuminate\Database\Seeder;

class SlidesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $limit = 5;
        for ($i = 1; $i < $limit; $i++) {
            DB::table('slides')->insert([
                'title' => 'điện thoại iPhone 8 64GB chính hãng ',
                'avatar' => 'banner'.$i.'.jpg',
            ]);
        }
    }
}
