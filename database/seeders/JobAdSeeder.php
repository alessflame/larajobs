<?php

namespace Database\Seeders;

use App\Models\JobAd;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class JobAdSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $jobAd= JobAd::factory()->count(10)->create();
    }
}
