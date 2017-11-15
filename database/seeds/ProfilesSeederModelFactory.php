<?php

use Illuminate\Database\Seeder;

class ProfilesSeederModelFactory extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $profile = factory(\App\profile::class,15)->create();
    }
}
