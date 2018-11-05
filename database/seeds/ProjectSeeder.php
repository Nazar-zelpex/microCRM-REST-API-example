<?php

use Illuminate\Database\Seeder;

/**
 * Class ProjectSeeder
 */
class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\Project::class, 5)->create();
    }
}
