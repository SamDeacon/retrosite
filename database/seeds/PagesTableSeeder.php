<?php

use Models\Page;
use Illuminate\Database\Seeder;

class PagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $pages = [
            [
                'title' => 'About Page',
                'slug' => 'about-page',
                'excerpt' => 'Short Excerpt of the About Page',
                'body' => '<p>Lorem ipsum, dolor sit amet consectetur adipisicing elit.</p><p>Qui ipsum ipsam, est totam alias voluptates, consequuntur corporis temporibus molestias iusto a deleniti voluptatem ea quam necessitatibus recusandae adipisci, quibusdam nam.</p>',
                'image' => 'uploads/about-page.jpg',
                'meta_description'  => 'about page meta_description | Retroshrine',
                'meta_keywords'  => 'about page meta_description | Retroshrine'
            ],
            [
                'title' => 'Contact Page',
                'slug' => 'contact-page',
                'excerpt' => 'Contact Retroshrine',
                'body' => '<p>Lorem Contact Retroshrine ipsum, dolor sit amet consectetur adipisicing elit.</p><p>Qui ipsum ipsam, est totam alias voluptates, consequuntur corporis temporibus molestias iusto a deleniti voluptatem ea quam necessitatibus recusandae adipisci, quibusdam nam.</p>',
                'image' => 'uploads/contact-page.jpg',
                'meta_description'  => 'contact page meta_description | Retroshrine',
                'meta_keywords'  => 'contact page meta_description | Retroshrine'
            ],

        ];
        DB::table('pages')->insert($pages);
    }
}
