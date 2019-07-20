<?php

use Illuminate\Database\Seeder;

class PlatformsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        \App\Platform::create([
            'name' => 'GitHub'
        ]);

        \App\Platform::create([
            'name' => 'BitBucket'
        ]);

        \App\Platform::create([
            'name' => 'GitLab'
        ]);

    }
}
