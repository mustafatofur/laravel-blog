<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SettingsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('settings')->insert([
        'id' => 1,
        'title' => 'Laravel Blog',
        'description' => 'This blog built with laravel. ',
        'keywords' => 'you,can,write,keywords,here,with,commas',
        'logo' => 'logo.png',
        'favicon' => 'favicon.png',
        'url' => route('home'),
        'analytics' => '<!-- Global Site Tag (gtag.js) - Google Analytics -->',
        'created_at' => date("Y-m-d H:i:s"),
        'updated_at' => date("Y-m-d H:i:s")
      ]);
    }
}
