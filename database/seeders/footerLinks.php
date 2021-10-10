<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class footerLinks extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $links = [

          [
          'id' => 1,
          'footer_link_title' => 'Twitter',
          'footer_link' => 'https://www.twitter.com'
        ],


        [
          'id' => 2,
          'footer_link_title' => 'Instagram',
          'footer_link' => 'https://www.instagram.com'
        ],
        [
          'id' => 3,
          'footer_link_title' => 'Facebook',
          'footer_link' => 'https://www.facebook.com'
        ],
        [
          'id' => 4,
          'footer_link_title' => 'GitHub',
          'footer_link' => 'https://www.github.com'
        ]

      ];
        foreach ($links as $link) {
          DB::table('footer_links')->insert($link);
        }

    }
}
