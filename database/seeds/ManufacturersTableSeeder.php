<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Str;

class ManufacturersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $items_array = [
            'SEGA',
            'Sony',
            'Nintendo',
            'Microsoft',
            'Atari.',
          ];
          $faker = Faker::create();
          foreach ($items_array as $key => $item) {
            $title = $item;
            $slug = Str::slug($title);
            DB::table('manufacturers')->insert([
              'title' => $title,
              'slug' => $slug,
              'description' => $faker->text(100)
            ]);
          }
    }
}
