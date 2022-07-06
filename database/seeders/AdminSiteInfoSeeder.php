<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AdminSiteInfoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('admin_site_infos')->insert([
            'admin_brand' => NULL,
            'footer' => "<p>All Rights Reserved &copy; 2022 By Division of Laguna <a class='text-success' href='https://github.com/CarlCaraan'>Team</a></p>",
        ]);
    }
}
