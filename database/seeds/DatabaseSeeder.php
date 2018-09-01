<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         $this->call(LocalsTableSeeder::class);
         $this->call(LevelsTableSeeder::class);
         $this->call(SlidesTableSeeder::class);
         $this->call(UsersTableSeeder::class);
         $this->call(CategoriesTableSeeder::class);
         $this->call(ManufacturesTableSeeder::class);
         $this->call(ProductsTableSeeder::class);
         $this->call(ImagesTableSeeder::class);
         $this->call(RespondsTableSeeder::class);
         $this->call(NewsTableSeeder::class);
         $this->call(RatingsTableSeeder::class);
    }
}
