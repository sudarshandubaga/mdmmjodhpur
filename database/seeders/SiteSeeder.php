<?php

namespace Database\Seeders;

use App\Models\Site;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SiteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $site = new Site();
        $site->title = "Maharshi Dadhichi Mahila Mahavidyalaya";
        $site->email = "info@mdmmjodhpur.org";
        $site->save();
    }
}
