<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class QueueSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Queue::factory(1)->create();
    }
}
