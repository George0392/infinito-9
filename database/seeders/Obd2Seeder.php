<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\Obd2;

class Obd2Seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $fallas = Obd2::factory(200)->create();
    }
}
