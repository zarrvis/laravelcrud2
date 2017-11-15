<?php

use Illuminate\Database\Seeder;

class ProfilesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create('id_ID');
        $limit = 30;
        for ($i=0; $i < $limit; $i++) {
          DB::table('profiles')->insert([
            'name' => $faker->name,
            'phone' => $faker->phoneNumber,
            'email' => $faker->unique()->email,
            'address' => $faker->address
          ]);
        }
    }
}
