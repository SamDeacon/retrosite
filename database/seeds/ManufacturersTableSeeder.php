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
            ['SEGA', 'sega', 'Do me a favour, plug me into a Sega', 'sega-logo.png'],
            ['Sony', 'sony', 'Do Not Underestimate The Power Of PlayStation', 'sony-logo.png'],
            ['Nintendo', 'nintendo', 'Now you\'re playing with power, SUPER POWER!', 'nintendo-logo.png'],
            ['Microsoft', 'microsoft', 'Life is short. Play more.', 'xbox-logo.png'],
            ['Atari', 'atari', 'Have you played Atari today?', 'atari-logo.png'],
          ];
          $faker = Faker::create();
          foreach ($items_array as $key => $item) {
            DB::table('manufacturers')->insert([
              'title' => $item[0],
              'slug' => $item[1],
              'description' => $item[2],
              'tagline' => $item[2],
              'logo' => $item[3],
            ]);
          }
    }
}
