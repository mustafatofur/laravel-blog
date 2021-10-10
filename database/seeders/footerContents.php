<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class footerContents extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('footer_contents')->insert([
          'footer_title' => 'Footer Title',
          'footer_content' => 'Footer Content Here',
          'footer_main_link_title' => 'Links',
          'copyright' => 'Copyright 2021'
        ]);
    }
}
