<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class WebsiteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $websites = [
            [
                'website_title'=>'Vromon Magazine',
                'website_url'=>'www.vromonmagazine.com',
                'description'=>'travel magazine vromon',
            ],
            [
                'website_title'=>'Facebook',
                'website_url'=>'www.facebook.com',
                'description'=>'Facebook! Social Media Platform',
            ],
        ];
        DB::table('websites')->insert($websites);
    }
}
