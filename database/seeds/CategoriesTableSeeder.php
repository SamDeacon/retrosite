<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Str;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $items_array = [
            ['Web Design', 'web-design', 'Web Design category description to be added here'],
            ['Technology', 'Technology', 'Technology category description to be added here'],
            ['Gaming News', 'gamin-news', 'Gaming News category description to be added here'],
            ['Sega', 'sega', 'Sega category description to be added here'],
            ['Nintendo', 'nintendo', 'Nintendo description to be added here'],
            ['Sony', 'sony', 'Sony description to be added here'],
            ['Xbox', 'xbox', 'Xbox description to be added here'],
            ['Consoles', 'consoles', 'Consoles description to be added here'],
            ['Retro Collections', 'retro-collections', 'Retro Collections description to be added here'],
            ['Emmulators', 'emmulators', 'Emmulators description to be added here'],
            ['Reviews', 'reviews', 'Reviews description to be added here'],
            ['Cheats', 'cheats', 'Cheats description to be added here'],
            ['Guides / Walkthroughs', 'guides-and-walkthroughs', 'Guides / Walkthroughs description to be added here'],
            ['Videos', 'videos', 'Videos description to be added here'],
          ];
          $faker = Faker::create();
          foreach ($items_array as $key => $item) {
            DB::table('categories')->insert([
              'title' => $item[0],
              'slug' => $item[1],
              'description' => $item[2],
              'thumbnail' => 'thumbnail-placeholder.jpg',
            ]);
          }
    }
}
