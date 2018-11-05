<?php

use Illuminate\Database\Seeder;

/**
 * Class ClientSeeder
 */
class ClientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\Client::class, 5)->create();
    }
}
