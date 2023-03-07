<?php

namespace Database\Seeders;

use App\Models\jobApplication;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class JobApplicationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $JobApplication= jobApplication::factory(5)->create();
    }
}
