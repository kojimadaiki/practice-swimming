<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\Practice;

class PracticesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Practice::factory()->count(15)->create();
    }
}
